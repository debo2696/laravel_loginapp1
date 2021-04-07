<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; //Wrote  
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Carbon\Carbon;
//use Illuminate\Support\Str;

class Users extends Controller
{
    public function fcnlist(Request $req)
    {
        //$user=User::all();
        $user = DB::table('users')->simplePaginate(2);
        Paginator::useBootstrap();
        //Session::get('logData');
        /*$sql="SELECT *FROM alphabet LIMIT " . $page_first_result . ',' . $results_per_page;"
        DB::statement($sql);*/
        $value=$req->session()->get('logData');
        $seseml=$value[0]['login_email'];         
        return view('userlist',['user'=>$user],['eml'=>$seseml]); //Array
    }
    public function fcnsignup()
    {
        $current = Carbon::now();
        return view('create',['date'=>$current]); //string
    }
    public function postlogin(Request $req)
    {
       //print $req->login_email;die();
       /*$login_email=$_REQUEST['login_email'];
       $login_pass=$_REQUEST['login_pass'];
       print $login_email.'----'.$login_pass;die();*/
        User::select ('*')->where
        (
            [
                ['email','=',$req->login_email],
                ['password','=',md5($req->login_pass)],    
            ]
        )->get();
        echo "Logged In";
        $user=User::all();
        $req->session()->put('logData',[$req->input()]);
        //fcnlist();
        //return $this->fcnlist();
        /*return view("userlist");*/
        /*$v=str_is('*_'.$req->login_email.'.'.'.jpg',$req->login_email);
        print_r($v);*/ 
        $msg = "Logged in.";
        return response()->json(array('msg'=> $msg), 200); 
        //return redirect('list');
    }
    public function postsignup(Request $req)
    {
        //print_r($req->signup_email);
        $validated = $req->validate([
            'signup_email' => 'required',
            'signup_pass' => 'required',
            'profPic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $dt=Carbon::now();
        $date=$dt->toDateString();
       // echo $req->profPic->name;
//echo '<pre>';print_r($_FILES);echo '</pre>';die();
        $destinationPath =public_path().'/'.'images';
        $file = $req->profPic;
        //$file_name = $_FILES['profPic']['name'];//For getting filename from server
        //$file_name=$date.'_'.$req->signup_email.'.'.'jpg';
        $file_name=$req->signup_email.'.'.'jpg';
        // echo '<pre>';print_r($_FILES);echo '</pre>';
        $target_file=$destinationPath.'/'.$file_name;
        //$imgName = $date.'.'.$req->profPic->extension();
        //$imgName = date('d_m_y').'.'.$req->profPic.'.'.'jpg';
        //$file->move($destinationPath , $imgName);
        move_uploaded_file($req->profPic, $target_file);
        //move_uploaded_file($file_name, $destinationPath.'/'.$name); 
        //$req->profPic->move(public_path('images'), $imgName);
        $user=new User;
        $user->email=$req->signup_email;
        $user->password=md5($req->signup_pass);
        $result=$user->save();
        if($result)
        {
            return view('login');
        }
    }
    public function logout()
    {
        echo "Session Destroyed";
        Session::flush();
    }
    public function assocarray()
    {
        $levels = array( "0" => "Super User", "1" => "Administrator", "10" => "10", "20" => 20, "30" => "30", "40" => "40", "50" => "50", "99" => "99 News homepage" );
        return view("assoc_arr",['levels'=>$levels]);   
    }
    public function postcked(Request $req)
    {
        $value=$req->session()->get('logData');
        //$eid=DB::select('"select id from users where email=".$req->login_email');
        $eid = DB::table('users')->where('email', $value[0]['login_email'])->value('id');
        //echo now();die();// 2021-04-01 06:10:29
        //$eid = DB::table('users')->where('email', $value[0]['login_email'])->select('id')->get(); //gives {['id':18]}
        //echo $eid;
        /*$jst=array_keys((array)$eid);
        foreach($jst as $j){ echo $j;}   
        echo $eid->{'id'};
        echo gettype($eid);die();*/
        $cktext=$req->wysiwyg_editor;
        $data=array('ck_text'=>$cktext,'e_id'=>$eid);
        DB::table('ckeditor_tbl')->insert($data);
        return "Value inserted";
    }
    public function listcked(Request $req)
    {
        $cked_res=DB::table('ckeditor_tbl')->get();
        return view ('ck_editor_listing',['cklist'=>$cked_res]);
    }
    /*public function loginajx(Request $req)
    {
           
    }*/
    public function fcnauto(Request $req)
    {
        return view('autocomplete');
    }
    public function fetch(Request $req)
    {
        if($req->get('query'))
        {
            $query = $req->get('query');
            $data = DB::table('users')
                ->where('email', 'LIKE', "%{$query}%")
                ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach($data as $row)
            {
                $output .= '
                <li><a href="#">'.$row->email.'</a></li>
                ';
            }
            $output .= '</ul>';
            echo $output;
        }
    }
}