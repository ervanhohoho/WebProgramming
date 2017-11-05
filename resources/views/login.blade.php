<!DOCTYPE html>
<html>
@extends('layouts.master')
<head>
	<title>Login</title>
</head>
<body>
@yield('navbar')
	<div class="wrapper">
	<form action="/login" method="POST" enctype="multipart/form-data" class="form-signin">
	{{csrf_field()}}
      <center><h2 class="form-signin-heading">Login</h2></center>
      <input type="text" class="form-control" name="email" placeholder="Email" required="" autofocus="" />
      <br> 
      <input type="password" class="form-control" name="password" placeholder="Password" required=""/> 
      <label class="checkbox">
        <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
      </label>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Log In</button>   
      </form>
  </div>
		@if(isset($errors))
			@foreach($errors->all() as $e)
				{{$e}}
				<br>
			@endforeach
		@endif
		@if(isset($status))
			{{$status}}
		@endif
</body>
</html>