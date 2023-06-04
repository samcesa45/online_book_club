@extends('layouts.app')
<style>
@import url('https://fonts.googleapis.com/css?family=Poppins:300,400,700');
body
{
	margin: 0;
	padding: 0;
}
section
{
	position: relative;
	width: 100%;
	height: 100vh;
	background:url(assets/img/login-bg.jpg);
  background-position: center;
  background-size: cover;
}
section .page
{
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%,-50%);
	width: 800px;
	height: 400px;
	background: #fff;
	border-radius: 5px;
	box-shadow: 0px 5px 20px rgba(0,0,0,0.5);
}
section .page .welcome
{
	position: absolute;
	top: 0;
	left: 0;
	width: 300px;
	height: 400px;
	border-top-left-radius:  5px;
	border-bottom-left-radius:  5px;
	background: #169E16;
	text-align: center;
	transition: 1s cubic-bezier(.95,.32,.37,1.31);
	z-index: 2;
}
section .page .welcome h2
{
	text-align: center;
	margin: 50px 0;
	font-family: 'Poppins';
	letter-spacing: 2px;
	color: #fff;
}
section .page .welcome p
{
	padding: 0 25px;
	text-align: center;
	font-family: 'Poppins';
	color: #fff;
	font-weight: 300;
}
section .page .welcome .sign_in
{
	margin: 30px 0;
	width: 150px;
	height: 40px;
	text-align: center;
	/* border-radius: 30px; */
	outline: none;
	border:none;
	background: transparent;
	border:1px solid #fff;
	font-family: 'Poppins';
	color: #fff;
	cursor: pointer;
	opacity: 1;
	visibility: visible;
	transition: .5s;
}
section .page .welcome .btn
{
	position: absolute;
	top: 57.5%;
	left: 25%;
	width: 150px;
	height: 40px;
	text-align: center;
	border-radius: 30px;
	outline: none;
	border:none;
	background: transparent;
	border:1px solid #fff;
	font-family: 'Poppins';
	color: #fff;
	cursor: pointer;
	opacity: 0;
	visibility: hidden;
}
section .page .welcome .btn.active
{
	opacity: 1;
	visibility: visible;
	transition: .5s;
	transition-delay: .5s;
}
section .page .welcome .sign_in.active
{
	opacity: 0;
	visibility: hidden;
	display: none;
	transition: .5s;
	transition-delay: .5s;
}
section .page .sign_up
{
	position: absolute;
	top: 0;
	left: 300px;
	width: 500px;
	height: 100%;
	text-align: center;
	transition: 1s cubic-bezier(.95,.32,.37,1.31);
	z-index: 1;
	opacity: 1;
	visibility: visible;
}
section .page .sign_up h2
{
	position: relative;
	margin: 50px 0;
	padding: 0;
	font-family: 'Poppins';
}
section .page .sign_up input
{
	margin: 5px 0;
	width: 300px;
	height: 30px;
	font-family: 'Poppins';
	color: #000;
	font-weight: 700;
}
section .page .sign_up input[type="text"],
section .page .sign_up input[type="email"],
section .page .sign_up input[type="password"]
{
	border:none;
	outline: none;
	border-bottom: 1px solid #000;
	transition: .5s;
}
section .page .sign_up input[type="text"]:focus,
section .page .sign_up input[type="email"]:focus,
section .page .sign_up input[type="password"]:focus
{
	border-bottom-color: #D50000;
	transition: .5s;
}
section .page .sign_up .up
{
	width: 150px;
	height: 40px;
	font-weight: 400;
	border:none;
	outline: none;
	background: #169E16;
	color: #fff;
	border-radius: 30px;
	transition: .5s;
	cursor: pointer;
}
section .page .sign_up .up:hover
{
	background: transparent;
	border:2px solid #169E16;
	color: #169E16;
	font-weight: 700;
}
section .page .welcome.active
{
	background: #000;
	color: #fff;
	left: 62.5%;
	border-top-left-radius: 0px;
	border-bottom-left-radius: 0px;
	border-top-right-radius: 5px;
	border-bottom-right-radius: 5px; 
	transition: 1s cubic-bezier(.95,.32,.37,1.31);
	z-index: 2;
}
section .page .sign_up.active
{
	left: 0;
	opacity: 0;
	visibility: hidden;
	transition: 1s cubic-bezier(.95,.32,.37,1.31);
}
section .page .login
{
	position: absolute;
	top: 0;
	left: 300px;
	width: 500px;
	height: 100%;
	text-align: center;
	opacity: 0;
	visibility: hidden;
}

section .page .login h2
{
	position: relative;
	margin: 50px 0;
	padding: 0;
	font-family: 'Poppins';
}
section .page .login input
{
	margin: 5px 0;
	width: 300px;
	height: 30px;
	font-family: 'Poppins';
	color: #000;
	font-weight: 700;
}
section .page .login input[type="email"],
section .page .login input[type="password"]
{
	border:none;
	outline: none;
	border-bottom: 1px solid #000;
	transition: .5s;
}
section .page .login input[type="email"]:focus,
section .page .login input[type="password"]:focus
{
	border-bottom-color: #2ecc71;
	transition: .5s;
}
section .page .login .in
{
	width: 150px;
	height: 40px;
	font-weight: 400;
	border:none;
	outline: none;
	background: #000;
	color: #fff;
	border-radius: 30px;
	transition: .5s;
	cursor: pointer;
}
section .page .login .in:hover
{
	background: transparent;
	border:2px solid #000;
	color: #000;
	font-weight: 700;
}
section .page .login.active
{
	left: 0;
	opacity: 1;
	visibility: visible;
	transition: 1s cubic-bezier(.95,.32,.37,1.31);
}
</style>

<script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>
<section>
	<div class="page">
		<div class="welcome">
			<h2>Welcome Back!</h2>
			<p>Signup to join Book Club?</p>
			<button class="sign_in">Sign In</button>
			<button class="btn">Sign Up</button>
		</div>
		<div class="sign_up">
			<form method="POST" action="{{route('register')}}">
        @csrf
			<h2>Sign Up your Account</h2>
			<input type="text" name="username" id="username" value="{{ old('username')}}" placeholder="Username" required><br>
			<input type="email" name="email" id="email" value="{{ old('email')}}" placeholder="Email" required><br>
			<input type="password" name="password" id="password" placeholder="Password" required><br>
			<input type="submit" name="signup" id="signup"  class="up">
		</form>
	</div>
	<div class="login">
    <form method="POST" action="{{route('login')}}">
      @csrf
			<h2>Login your Account</h2>
			<input type="email" name="email" id="email" value="{{ old('email')}}" placeholder="Email" required><br>
			<input type="password" name="password" id="password" placeholder="Password" required><br>
      <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
			<button type="submit" id="signin" class="in">Signin</button>
		</form>
		</div>
	</div>
</section>

<script type="text/javascript">
 	$(document).ready(function(){
   
		$('.sign_in').click(function(){
			$('.login').addClass('active')
			$('.welcome').addClass('active')
			$('.sign_in').addClass('active')
			$('.btn').addClass('active')
			$('.sign_up').addClass('active')
      $( "form" ).submit(function() {
        $('.spinner-border').show();
    });
		});
		$('.btn').click(function(){
			$('.sign_up').removeClass('active')
			$('.login').removeClass('active')
			$('.welcome').removeClass('active')
			$('.sign_up').removeClass('active')
			$('.btn').removeClass('active')
			$('.sign_in').removeClass('active')
      $( "form" ).submit(function() {
        $('.spinner-border').show();
    });
		});


    $( "form" ).submit(function() {
        $('.spinner-border').show();
    });
   
	});

</script>
