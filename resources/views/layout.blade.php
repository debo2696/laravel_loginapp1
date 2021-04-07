<!DOCTYPE html>
<html lang="en">
<head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('css/custom.css')}}">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!--<link rel="stylesheet" href="{{asset('css/app.css')}}">-->  
</head>
<body>
<div class="header">
@section('header')


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="list">Users List</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="signup">Create Account</a>
      </li>
      <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="assoc">Associative Array</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <b9utton class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      @if(session()->has('logData'))
        <?php
          $prof_pth=Session::get('logData')[0]['login_email'].'.jpg';  
        ?>
        <a class="btn btn-outline-success my-2 my-sm-0" href="{{ url('out') }}" >Logout</a>
        <img src="{{asset('images/'.$prof_pth)}}" class="avatar" alt="alt text">        
      @endif
    </form>
  </div>
</nav>


@show
</div>

<div class="content">
@section('content')
<pre> Content part! </pre>
@show
</div>

<div class="footer">
@section('footer')
<pre> Footer part! </pre>

<script src="{{asset('js/app.js')}}"></script>  
@show
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$( document ).ready(function() {

  $("#loginbtn").click(function(){

    var login_email=$("#login_email").val();
    var login_pass=$("#login_pass").val();
    $.ajax
    (
      {
        type:'get',
        url:'login/pst',
        data:{login_email:login_email,login_pass:login_pass},
        success:function(data) 
        {
          //alert(data);
          $("#msg").html(data.msg);
        }
    });
  });

});
</script>
</body>
</html>