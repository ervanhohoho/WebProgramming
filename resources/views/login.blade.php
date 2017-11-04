<!DOCTYPE html>
<html>
@extends('layouts.master')
<head>
	<title>Login</title>
</head>
<body>
@yield('navbar')
<form action="/login" method="POST" enctype="multipart/form-data">
{{csrf_field()}}
	<center>
	<table border = 0 style = "position: absolute;left: 0;top: 35%; width: 100%;text-align: center;font-size: 18px; z-index: 3;">
	<tr><td><h1>LOGIN</h1></td></tr>
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

</body>
</html>