<!DOCTYPE html>
<html>
@extends('adminMaster')
@section('title')
	Insert Brand
@endsection('title')

@section('content')
<br>
<br>
	<center>
	<h1>User List</h1>
	<table width="50%">
		<tr>
			<td><p align="center">ID</p></td>
			<td><p align="center">User Name</p></td>
		<tr>
				<td colspan="4"><hr></td>
		</tr>
	@if(isset($users))
		@foreach($users as $u)
			<tr>
				<td>
					<p align="center">{{$u->userId}}</p>
				</td>
				<td>
					<p align="center">{{$u->name}}</p>
				</td>
				<td><a href="/updateUserDetail/{{$u->userId}}"><p align="center"><input type="button" value = "Detail" style="width: 80px; background-color: #3498DB; color:white;" class="form-control"></p></a></td>
				<td><a href="/deleteUser/{{$u->userId}}"><p align="center"><input type="button" value = "Delete" style="width: 80px; background-color: #c11717; color:white;" class="form-control"></p></a></td>
			</tr>
			<tr>
				<td colspan="4"><hr></td>
			</tr>
		@endforeach
	@endif
	</table>

	</center>
@endsection
