<!DOCTYPE html>
<html>
@extends('adminMaster')
@section('title')
	Insert Brand
@endsection('title')

@section('content')
		<div class="wrapper">
	<form action="/doInsertBrand" method="GET" enctype="multipart/form-data" class="form-signin">
	<table border = 0 cellpadding="5">
     <tr><td> <center><h2 class="form-signin-heading">Insert Brand</h2></center></td></tr>
      <tr><td><input type="text" class="form-control" name="brandName" placeholder="Brand" required="" autofocus="" style="width: 300px;" /></td></tr>
      <tr><td><button class="btn btn-lg btn-primary btn-block" type="submit">Insert Brand</button></td></tr>
      </form>
  </div>

	@if(isset($errors))
	@foreach($errors->all() as $e)
	{{$e}}
	@endforeach
	@endif
@endsection
