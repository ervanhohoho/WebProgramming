<!DOCTYPE html>
<html>
@extends('master')

@section('title')
Register
@endsection
@section('content')
	<center>
	<div class="wrapper">
	<form action = "/doUpdateShoe" method = "POST" enctype="multipart/form-data" class="form-signin">
		<table>
		{{csrf_field()}}
		<tr><td><h2 class="form-signin-heading"><center>Update Shoes</center></h2></td></tr>
		<input type="hidden" name = "id" value = "{{$shoes->shoesId}}">
		<tr><td><img src="{{$shoes->image}}"></td></tr>
		<tr><td><input type="file" name="image" value="{{$shoes->image}}"></td></tr>
		<tr><td>Name : <input type="text" class="form-control" name = "name" value="{{$shoes->name}}"></td></tr>
		<tr><td>Brand = {{$shoes->brandId}}</td></tr>
		<tr><td><select name = "brandId" class="form-control">
			@if(isset($brands))
				@foreach($brands as $b)
					<option value = "{{$b->brandId}}">
						{{$b->brandName}}</option>
				@endforeach
			@endif
		</select></td></tr>
		<tr><td>Description : <input type="text" class="form-control" name = "description" value="{{$shoes->description}}"></td></tr>
		<tr><td>Price : <input type="text" class="form-control" name = "price" value="{{$shoes->price}}"></td></tr>
		<tr><td>Discount : <input type="text" class="form-control" name = "discount" value="{{$shoes->discount}}"></td></tr>
		<tr><td>Stock : <input type="text" class="form-control" name="stock" value = "{{$shoes->stock}}"></td></tr>
		<tr><td><input type="submit" class="btn btn-lg btn-primary btn-block" value="Edit Shoes"></td></tr>
	</form>
	</table>
	</center>
@endsection