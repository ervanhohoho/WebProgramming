@extends('adminMaster')
@section('title')
	Edit User
@endsection
@section('content')
<div class = "wrapper">
	<center>
	<table>
		<form method = "POST" action = "/doUpdateUser" enctype="multipart/form-data">
			{{csrf_field()}}
			<tr><td><h2 class="form-signin-heading"><center>User Edit</center></h2></td></tr>
			<input type="hidden" name="id" value = "{{$user->userId}}">
			<tr><td><input type="text" name="name" value="{{$user->name}}"></td></tr>
			<tr><td><input type="text" name="email" value="{{$user->email}}"></td></tr>
			<tr><td><input type="file" name="picture"></td></tr>
			<tr><td>
				@if($user->gender == "Male")
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
			</tr>
			<tr><td><input type="date" name="dob" value="{{$user->DOB}}"></td></tr>
			<tr><td><textarea name = "address" style="width: 100%;">{{$user->address}}</textarea></td></tr>
			<tr><td><input type="submit" value="Edit User"></td></tr>
			@if(isset($errors))
			<tr><td>@foreach($errors->all() as $e) {{$e}} <br> @endforeach</td></tr>
			@endif
		</form>
	</table>
	</center>
</div>
@endsection