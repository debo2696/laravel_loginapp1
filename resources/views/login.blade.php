@extends('layout')

@section('content')

<script>

  /*function getMessage() 
  {
    
    $.ajax
    (
      {
        type:'POST',
        url:'/login/pst',
        data:{{}}
        success:function(data) 
        {
          alert(data);
          //$("#msg").html(data.msg);
        }
    });
  }*/

  
</script>

  <div id="msg">Not logged in </div>

<form action="/login/pst" method="post" class=login_form>
@csrf
    <h1>Sign In</h1>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" id="login_email" name="login_email" class="form-control" placeholder="Enter email" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" id="login_pass" name="login_pass" class="form-control" placeholder="Enter password" id="pwd">
  </div>
  <!--<div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox"> Remember me
    </label>
  </div>-->
  <button type="button" id="loginbtn" class="btn btn-primary">Submit</button>
</form> 

@endsection 
