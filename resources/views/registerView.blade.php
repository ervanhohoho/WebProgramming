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
	<table border = 0 style = "position: absolute;left: 0;top: 25%; width: 100%;text-align: center;font-size: 18px; z-index: 3;">
		<form action ="/register" method = "POST" enctype="multipart/form-data">

		{{csrf_field()}}
			<tr><td><h1>REGISTER </h1></td></tr>
			<tr><td><input type= "text" placeholder="name" name="name"></td></tr>
			<tr><td><input type = "text" placeholder="email" name = "email"></td></tr>
			<tr><td><input type="password" placeholder="password" name="password"></td></tr>
			<tr><td><input type="file" name="profilepicture"></td></tr>
			<tr><td><input type="text" name="gender" placeholder="gender"></td></tr>
			<tr><td><input type="text" name="dob" placeholder="DOB"></td></tr>
			<tr><td><input type="text" name="address" placeholder="Address"></td></tr>
			<tr><td><input type="submit" value = "Register"></td></tr>
		</form>
		<tr><td><a href='/loginView'>click here to login</a></tr></td>
	</table>

</body>
</html>