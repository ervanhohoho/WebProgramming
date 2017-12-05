<!DOCTYPE html>
<html>
@extends('master')

@section('title')
Register
@endsection
@section('content')
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
			<tr><td width="100%" align="center">
				<div style="padding: 0 15%; display: inline-block;">
					<label><input type="radio" class="form-control" name="gender" value = "Male">Male</label>
				</div>
				<div style="padding: 0 15%; display: inline-block;">
					<label><input type="radio" class="form-control" name="gender" value = "Female" style="right: 25%">Female</label>
				</div>
			</td></tr>
			<tr><td><input type="date" class="form-control" name="dob" placeholder="DOB"></td></tr>
			<tr><td><textarea name = "address" placeholder="Address" style="width: 300px;"></textarea></td></tr>
			<tr><td align="left">
				<div align="left" width=100%><input type="checkbox" name="agree" style="width: 20px;">   I Agree to terms and conditions</td></tr></div>
			<tr><td><input type="submit" class="btn btn-lg btn-primary btn-block" value = "Register"></td></tr>
		</form>
		</div>
		<tr><td><a href='/loginView'>click here to login</a></td></tr>
		<tr><td>
			@if(isset($errors))
			@foreach($errors->all() as $e)
				{{$e}}<br>
			@endforeach
			@endif
		</td></tr>
	</table>

	</center>
</div>
@endsection