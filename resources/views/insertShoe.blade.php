<!DOCTYPE html>
<html>
@extends('master')

@section('title')
Insert Shoes
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
	<form action = "/doInsertShoe" method = "POST" enctype="multipart/form-data" class="form-signin">
		<table border = 0 cellpadding="5">
		{{csrf_field()}}
		<tr><td><h2 class="form-signin-heading"><center>Insert Shoes</center></h2></td></tr>
	<tr><td><input type="text" class="form-control" name="name" placeholder="Name"></td></tr>
	<tr><td><input type="file" class="form-control" name="image"></td></tr>
	<tr><td><select class="form-control" name = "brand">
		@if(isset($brands))
			@foreach($brands as $b)
			<option value = "{{$b->brandId}}"> {{$b->brandName}}</option>
			@endforeach
		@endif
		</select></td></tr>
	<tr><td><input type="text" class="form-control" name="description"  placeholder="Description"></td></tr>
	<tr><td><input type="text" class="form-control" name="price"  placeholder="Input Price"></td></tr>
	<tr><td><input type="text" class="form-control" name="discount"  placeholder="Discount"></td></tr>
	<tr><td><input type="text" class="form-control" name="stock"  placeholder="Stock"></td></tr>
	<tr><td><input type="submit" class="btn btn-lg btn-primary btn-block" value="Insert"></td></tr>
	</table>
	</form>

			<tr><td>
			@if(isset($errors))
			@foreach($errors->all() as $e)
				{{$e}}<br>
			@endforeach
			@endif
		</td></tr>
	</center>
</div>
@endsection