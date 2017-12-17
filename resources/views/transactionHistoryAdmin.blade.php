@extends('adminMaster')

@section('title')
	Transaction History
@endsection('title')

@section('content')
<br>
<br>
	<center>
	<h1>Transaction History</h1>
	@if(isset($transactions))
	<table width="50%">
		<tr>
			<td><p align="center">ID</p></td>
			<td><p align="center">Email</p></td>
			<td><p align="center">Date</p></td>
			<td><p align="center">Status</p></td>
		</tr>
		<tr>
				<td colspan="4"><hr></td>
		</tr>
		@foreach($transactions as $t)
		<?php $idx = array_search($t->userId, $userids->all()) ?>
		<tr>
			<td><p align="center">{{$t->transactionId}}</p></td>
			<td><p align="center">{{$users[$idx]->email}}</p></td>
			<td><p align="center">{{$t->transactionDateTime}}</p></td>
			<td><p align="center">Success</p></td>
			<td><a href="/detailTransaction/{{$t->transactionId}}"><p align="center"><input type="button" value = "Detail" style="width: 80px; background-color: #c11717; color:white;" class="form-control"></p></a></td>
		</tr>
		<tr>
				<td colspan="4"><hr></td>
		</tr>
		@endforeach	
	@endif
	</table>
	</center>
@endsection
