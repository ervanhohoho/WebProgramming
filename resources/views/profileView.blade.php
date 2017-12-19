<!DOCTYPE html>
<html>
@extends('userMaster')

@section('title')
Profile
@endsection
@section('content')
	<center>
		<div class="wrapper">
		<form action ="/doUpdateUser" method = "POST" enctype="multipart/form-data" class="form-signin">
		{{csrf_field()}}
		<?php $start = date('Y-m-d', strtotime('-10 years'))?>
		<input type="hidden" name="start_date" value = "{{$start}}">
		<input type="hidden" name="id" value = "{{Auth::user()->userId}}">
		<table border = 0 cellpadding="5">
			<tr><td><h2 class="form-signin-heading"><center>Profile</center></h2></td></tr>
			<tr><td><img src="../{{Auth::user()->profilePicture}}" width = "300" align="center"></div></td></tr>
			<tr><td><input type= "text" class="form-control" value="{{Auth::user()->name}}" name="name"></td></tr>
			<tr><td><input type = "email" class="form-control" value="{{Auth::user()->email}}" name = "email"></td></tr>
			<tr><td><input type="file" name="picture"></td></tr>
			<tr><td width="100%" align="center">
				@if(Auth::user()->gender == "Male")
				<div style="padding: 0 15%; display: inline-block;">
					<label><input type="radio" class="form-control" name="gender" value = "Male" checked>Male</label>
				</div>
				<div style="padding: 0 15%; display: inline-block;">
					<label><input type="radio" class="form-control" name="gender" value = "Female" style="right: 25%">Female</label>
				</div></td>
				@else
				<div style="padding: 0 15%; display: inline-block;">
					<label><input type="radio" class="form-control" name="gender" value = "Male">Male</label>
				</div>
				<div style="padding: 0 15%; display: inline-block;">
					<label><input type="radio" class="form-control" name="gender" value = "Female" style="right: 25%" checked>Female</label>
				</div></td>
				@endif
			</td></tr>
			<tr><td><input type="date" class="form-control" name="dob" value = "{{Auth::user()->DOB}}"></td></tr>
			<tr><td><textarea name = "address" style="width: 100%;">{{Auth::user()->address}}</textarea></td></tr>
			<tr><td><input type="submit" class="btn btn-lg btn-primary btn-block" value = "Edit Profile"></td></tr>
				<tr><td>

			<!-- untuk menunjukkan error -->
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