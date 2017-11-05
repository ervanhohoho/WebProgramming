<!DOCTYPE html>
<html>
@extends('layouts.master')
<head>
	<title>Login</title>
</head>
<body>
@yield('navbar')
<div style= "display: block; overflow: auto; margin-top: 15vw;">
	<form action="/login" method="POST" enctype="multipart/form-data">
	{{csrf_field()}}
		<center>
		<table border = 0>
		<tr><td><center><h1>LOGIN</h1></center></td></tr>
		<tr><td><input type="text" name="email" placeholder = "email""><br></td></tr>
		<tr><td><input type = "password" name = "password" placeholder="password"></td></tr>
		<tr><td><input type="submit"></td></tr>
		<tr><td>
		<font color = red>
		@if(isset($errors))
			@foreach($errors->all() as $e)
				{{$e}}
				<br>
			@endforeach
		@endif
		@if(isset($status))
			{{$status}}
		@endif
		</font>
		</td></tr>
		</table>
		</div>
		</center>
	</form>
</div>
</body>
</html>