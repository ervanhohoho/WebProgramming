<!DOCTYPE html>
<html>
@extends('userMaster')

@section('title')
Profile
@endsection
@section('content')
	<center>
		<div class="wrapper">
		<form action ="/" method = "POST" enctype="multipart/form-data" class="form-signin">
		{{csrf_field()}}
		<?php $start = date('Y-m-d', strtotime('-10 years'))?>
		<input type="hidden" name="start_date" value = "{{$start}}">
		<table border = 0 cellpadding="5">
			<tr><td><h2 class="form-signin-heading"><center>Profile</center></h2></td></tr>
			<tr><td><input type= "text" class="form-control" placeholder="name" name="name"></td></tr>
			<tr><td><input type = "email" class="form-control" placeholder="email" name = "email"></td></tr>
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
			<tr><td><input type="submit" class="btn btn-lg btn-primary btn-block" value = "Edit Profile"></td></tr>
				<tr><td>
			@if(isset($errors))
			@foreach($errors->all() as $e)
				{{$e}}<br>
			@endforeach
			@endif
		</td></tr>
		</table>
		</form>
		</div>
</div>
	</center>
@endsection