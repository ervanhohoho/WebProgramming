@extends('adminMaster')

@section('title')
	Transaction Detail
@endsection('title')

@section('content')
<br>
<br>
	<center>
	<h1>Transaction Detail</h1>
	<table width="50%">
		<tr>
			<td width="33%"><p align="center">Shoes</p></td>
			<td width="33%"><p align="center">Price</p></td>
			<td width="33%"><p align="center">Qty</p></td>
		</tr>
		<tr>
				<td colspan="3"><hr></td>
		</tr>
	<?php $totalQty = 0 ?>
	<?php $grandTotal = 0 ?>
	@foreach($details as $d)
		<?php $shoeId = explode('#',$d->detailTransactionId); ?>
		<?php $idx = array_search($shoeId, $shoesids->all()) ?>
		<?php $totalQty += $d->qty ?>
		<?php $grandTotal += $shoes[$idx]->price * $d->qty ?>
		<tr>
			<td><p align="center">{{$shoes[$idx]->name}}</p></td>
			<td><p align="center">{{$shoes[$idx]->price}}</p></td>
			<td><p align="center">{{$d->qty}}</p></td>
		</tr>
		<tr>
				<td colspan="3"><hr></td>
		</tr>
	@endforeach
	<tr>
			<td colspan="3"><h4 style="display: inline-block;padding: 0 5px;"><br><br><br><br><br>Total Quantity : {{$totalQty}} | </h4><h4 style="color: #c11717; display: inline-block;padding: 0 5px;"> Grand Total : {{$grandTotal}}</h4><h4 style="display: inline-block;">|</h4></td>
		</tr>
		<tr>
			<td colspan="3"><a href="/transactionHistory"><center><input type="buton" value = "Back" style="width: 300px;background-color: #3498DB; color:white; display: inline-block;" class="form-control"></center></a></td>
		</tr>
	</table>
</body>
</html>