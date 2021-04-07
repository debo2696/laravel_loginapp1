@extends('layout')

@section('content')

<form action="ins" method="post">
@csrf
    <h1>Sign In</h1>
  <div class="form-group">
    <label for="text">EID:</label>
    <input type="text" name="form_eid" class="form-control" placeholder="Enter email" id="email">
    <label for="text">Name:</label>
    <input type="text" name="form_name" class="form-control" placeholder="Enter email" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" name="login_pass" class="form-control" placeholder="Enter password" id="pwd">
  </div>
  <!--<div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox"> Remember me
    </label>
  </div>-->
  <button type="submit" class="btn btn-primary">Submit</button>
</form> 

@endsection 
