@extends('layout')

@section('content')
<div class=user_list>
<h1>User List</h1>


<div >
    <ul>
        @foreach($user as $u)
        <li><span>{{$u->id}}  </span><span>{{$u->email}}</span></li>
        @endforeach        
    </ul>
</div>
{{ $user->links() }}
</div>
@endsection 


