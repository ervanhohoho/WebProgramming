<!DOCTYPE html>
<html>
@extends('layouts.master')
<head>
	<title>Register</title>
</head>
<body>
@if(isset($users))
	@foreach($users as $u)
	{{$u->name}}
	<br>
	@endforeach
@endif
@yield('navbar')
	<center>
		<div class="wrapper">
		<form action ="/register" method = "POST" enctype="multipart/form-data" class="form-signin">
		{{csrf_field()}}
		<table border = 0 cellpadding="5">
			<tr><td><h2 class="form-signin-heading"><center>Register</center></h2></td></tr>
			<tr><td><input type= "text" class="form-control" placeholder="name" name="name"></td></tr>
			<tr><td><input type = "text" class="form-control" placeholder="email" name = "email"></td></tr>
			<tr><td><input type="password" class="form-control" placeholder="password" name="password"></td></tr>
			<tr><td><input type="file" name="profilepicture"></td></tr>
			<tr><td><input type="text" class="form-control" name="gender" placeholder="gender"></td></tr>
			<tr><td><input type="date" class="form-control" name="dob" placeholder="DOB"></td></tr>
			<tr><td><input type="text" class="form-control" name="address" placeholder="Address"></td></tr>
			<tr><td><input type="submit" class="btn btn-lg btn-primary btn-block" value = "Register"></td></tr>
		</form>
		</div>
		<tr><td><a href='/loginView'>click here to login</a></td></tr>
	</table>
	</center>
</div>
</body>
</html>