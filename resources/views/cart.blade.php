@extends('adminMaster')
@section('title')
	Transaction History
@endsection('title')

@section('content')
<br>
<br>
	<center>
	<h1>Transaction History</h1>
	@if(isset($cart))
	<form method = "POST" action = "/pay" enctype="multipart/form-data">
	{{csrf_field()}}
	<table width="50%">
		<?php $count = 0?>
		<tr>
			<td><p align="center">Image</p></td>
			<td><p align="center">Name</p></td>
			<td><p align="center">Quantity</p></td>
			<td><p align="center">Price</p></td>
			<td><p align="center">Sub Total</p></td>
		</tr>
		<tr>
				<td colspan="4"><hr></td>
		</tr>
		@foreach($cart as $c)
		<tr>
			<?php $shoeId = explode('#',$c->cartId) ?>
			<?php $idx = array_search($shoeId[1], $shoesIds->all())?>
			<input type="hidden" name="shoesId[{{$count}}]" value = "{{$shoeId[1]}}">
			<input type="hidden" name="qty[{{$count}}]" value = "{{$c->qty}}">
			<td><img src="../{{$shoes[$idx]->image}}" width="250"></td>
			<td>{{$shoes[$idx]->name}}</td>
			<td>{{$c->qty}}</td>
			<td>{{$shoes[$idx]->price - ($shoes[$idx]->price * $shoes[$idx]->discount / 100)}}</td>
			<td>{{$shoes[$idx]->price - ($shoes[$idx]->price * $shoes[$idx]->discount / 100) * $c->qty}}</td>
			<td><a href="/deleteCart/{{$shoeId[1]}}"><p align="center"><input type="button" value = "Delete" style="width: 80px; background-color: #c11717; color:white;" class="form-control"></p></a></td>
			<?php $count++ ?>
		</tr>
		<tr>
				<td colspan="4"><hr></td>
		</tr>
		@endforeach
		<tr><td><input type="submit" value="submit"></td></tr>
	</table>
	@endif
	</form>
</body>
</html>