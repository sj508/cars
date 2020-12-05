<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="{{ URL::to('public/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ URL::to('public/css/owl.carousel.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ URL::to('public/css/jquery-ui.css')}}">
<link rel="stylesheet" type="text/css" href="{{ URL::to('public/css/style.css')}}">
<link rel="stylesheet" type="text/css" href="{{ URL::to('public/css/all.min.css')}}">
<link rel="stylesheet" href="{{ URL::to('public/css/flexslider.css')}}" type="text/css" media="screen" />
<script type="text/javascript" src="{{ URL::to('public/js/jquery-2.2.4.min.js')}}"></script>

<title>Car Dealer</title>
</head>
<body>

<header>
<div class="top_header">
  <div class="container">
    <div class="row">
      
      <div class="col-md-7  text-right">

        
         @if($user = Auth::guard('customer')->user())
          <a href="{{url('userlogout')}}" class="login-btn">Logout</a>
         <a class="login-btn" style="color: white;"><i class="fa fa-user" aria-hidden="true"></i> {{ $user->user_name }}</a> 
                
        @else
          <a href="{{url('registration')}}" class="login-btn">Register</a>
          <a href="{{url('user_login')}}" class="login-btn">Login</a>
          <a href="{{url('/')}}" class="login-btn">Home</a>
        @endif
      </div>
    </div>
  </div>
 
</div>
</header>

