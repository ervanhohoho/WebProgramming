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
<div style= "display: block; overflow: auto; margin-top: 15vw;">
	<center>
	<table border = 0>
		<form action ="/register" method = "POST" enctype="multipart/form-data">

		{{csrf_field()}}
			<tr><td><h1><center>REGISTER</center></h1></td></tr>
			<tr><td><input type= "text" placeholder="name" name="name"></td></tr>
			<tr><td><input type = "text" placeholder="email" name = "email"></td></tr>
			<tr><td><input type="password" placeholder="password" name="password"></td></tr>
			<tr><td><input type="file" name="profilepicture"></td></tr>
			<tr><td><input type="text" name="gender" placeholder="gender"></td></tr>
			<tr><td><input type="date" name="dob" placeholder="DOB"></td></tr>
			<tr><td><input type="text" name="address" placeholder="Address"></td></tr>
			<tr><td><input type="submit" value = "Register"></td></tr>
		</form>
		<tr><td><a href='/loginView'>click here to login</a></td></tr>
	</table>
	</center>
</div>
</body>
</html>