@extends('userMaster')
@section('title')
	Transaction History
@endsection('title')

@section('content')
<br>
<br>
	<center>
	<h1>Your Cart</h1>
	@if(isset($cart))
	<form method = "POST" action = "/pay" enctype="multipart/form-data">
	{{csrf_field()}}
	<table width="50%" border="0">
		<?php $count = 0?>
		<?php $totalqty = 0?>
		<?php $totalprice = 0?>
		<tr>
			<td><p align="center">Image</p></td>
			<td><p align="center">Name</p></td>
			<td><p align="center">Qty</p></td>
			<td><p align="center">Price</p></td>
			<td><p align="center">Sub Total</p></td>
			<td> </td>
		</tr>
		<tr>
				<td colspan="6"><hr></td>
		</tr>
		@foreach($cart as $c)
		<tr>
			<?php $shoeId = explode('#',$c->cartId) ?>
			<?php $idx = array_search($shoeId[1], $shoesIds->all())?>
			<input type="hidden" name="shoesId[{{$count}}]" value = "{{$shoeId[1]}}">
			<input type="hidden" name="qty[{{$count}}]" value = "{{$c->qty}}">
			<?php $totalqty += $c->qty ?>
			<?php $totalprice += ($shoes[$idx]->price - ($shoes[$idx]->price * $shoes[$idx]->discount / 100)) * $c->qty ?>
			<td width="30%"><center><img src="../{{$shoes[$idx]->image}}" height="30%"></center></td>
			<td><p align="center">{{$shoes[$idx]->name}}</p></td>
			<td><p align="center">{{$c->qty}}</p></td>
			<td><p align="center">{{$shoes[$idx]->price - ($shoes[$idx]->price * $shoes[$idx]->discount / 100)}}</p></td>
			<td><p align="center">{{($shoes[$idx]->price - ($shoes[$idx]->price * $shoes[$idx]->discount / 100)) * $c->qty}}</p></td>
			<td><a href="/deleteCart/{{$shoeId[1]}}"><p align="center"><input type="button" value = "Delete" style="width: 80px; background-color: #c11717; color:white;" class="form-control"></p></a></td>
			<?php $count++ ?>
		</tr>
		<tr>
				<td colspan="6"><hr></td>
		</tr>
		@endforeach
		<tr>
			<td colspan="6"><h4 style="display: inline-block;padding: 0 5px;"><br><br><br><br><br>Total Quantity : {{$totalqty}} | </h4><h4 style="color: #c11717; display: inline-block;padding: 0 5px;"> Grand Total : {{$totalprice}}</h4><h4 style="display: inline-block;">|</h4></td>
		</tr>
		<tr><td colspan="6"><hr></td></tr>
		<tr>
			<td colspan="3">Input Payment : <input type="number" name="amount" class="form-control" style=" width: 230px ; display: inline-block;"></td>
			<td colspan="3"><input type="submit" value = "Complete the Payment" style="background-color: #3498DB; color:white; display: inline-block;" class="form-control"></td>
		</tr>
	</table>
</center>
	@endif
	</form>
</body>
</html>