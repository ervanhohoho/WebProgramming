@extends('adminMaster')

@section('title')
	Transaction List
@endsection('title')

@section('content')
<br>
<br>
	<center>
	<h1>Transaction List</h1>
	@if(isset($transactions))
	<table width="50%" border="0">
		<tr>
			<td><p align="center">ID</p></td>
			<td><p align="center">Email</p></td>
			<td><p align="center">Date</p></td>
			<td><p align="center">Status</p></td>
		</tr>
		<tr>
				<td colspan="6"><hr></td>
		</tr>
		@foreach($transactions as $t)
		<?php $idx = array_search($t->userId, $userids->all()) ?>
		<tr>
			<td><p align="center">{{$t->transactionId}}</p></td>
			<td><p align="center">{{$users[$idx]->email}}</p></td>
			<td><p align="center">{{$t->transactionDateTime}}</p></td>
			<td><p align="center">Success</p></td>
			<td><a href="/detailTransaction/{{$t->transactionId}}"><p align="center"><input type="button" value = "Detail" style="width: 80px; background-color: #3498DB; color:white;" class="form-control"></p></a></td>
			<td><a href="/deleteTransaction/{{$t->transactionId}}"><p align="center"><input type="button" value = "Delete" style="width: 80px; background-color: #c11717; color:white;" class="form-control"></p></a></td>
		</tr>
		<tr>
				<td colspan="6"><hr></td>
		</tr>
		@endforeach	
	@endif
	</table>
	</center>
@endsection
