@extends('layout')

@section('content')
<form action="/sup" method="post" enctype="multipart/form-data" class="signup_form">
@csrf
    <?php echo public_path(); ?>
    <h2>Time:  {{$date}}</h2>
    <h1>Sign up</h1>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" name="signup_email" class="form-control" placeholder="Enter email" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" name="signup_pass" class="form-control" placeholder="Enter password" id="pwd">
  </div>

   <!-- Upload image input-->
  <label class="form-label" for="customFile">Default file input example</label>
  <input type="file" class="form-control" id="customFile" name="profPic" />  


  @if ($errors->any()) <!--$errors variable is shared with all of your application's views by the Illuminate\View\Middleware\ShareErrorsFromSession middleware, which is provided by the web middleware group.-->
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  <!--<div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox"> Remember me
    </label>
  </div>-->
  <button type="submit" class="btn btn-primary">Submit</button>
</form> 

@endsection 
