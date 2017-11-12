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
	<table border = 0 cellpadding="5">
     <tr><td> <center><h2 class="form-signin-heading">Login</h2></center></td></tr>
      <tr><td><input type="text" class="form-control" name="email" placeholder="Email" required="" autofocus="" style="width: 300px;" /></td></tr>
      <tr><td><input type="password" class="form-control" name="password" placeholder="Password" required=""/> </td></tr>
      <tr><td width="100%">
        <div style="width: 10px; display: inline-block;" align = "left"><input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe" style="width: 10px; display: inline-block;"></div> <p style="display: inline-block;">Remember me</p>
      </td></tr>
      <tr><td><button class="btn btn-lg btn-primary btn-block" type="submit">Log In</button></td></tr>
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