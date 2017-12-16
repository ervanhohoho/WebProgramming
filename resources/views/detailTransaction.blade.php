<!DOCTYPE html>
<html>
<head>
	<title>detail</title>
</head>
<body>
	<table border = "1">
	
		<tr><th>Shoes</th> <th>Price</th> <th>Qty</th></tr>
	<?php $totalQty = 0 ?>
	<?php $grandTotal = 0 ?>
	@foreach($details as $d)
		<?php $shoeId = explode('#',$d->detailTransactionId); ?>
		<?php $idx = array_search($shoeId, $shoesids->all()) ?>
		<?php $totalQty += $d->qty ?>
		<?php $grandTotal += $shoes[$idx]->price * $d->qty ?>
		<tr>
			<td>{{$shoes[$idx]->name}}</td>
			<td>{{$shoes[$idx]->price}}</td>
			<td>{{$d->qty}}</td>
		</tr>
	@endforeach
	<tr><td>TotalQuantity</td><td colspan="2">{{$totalQty}}</td></tr>
	<tr><td>Grand Total</td><td colspan="2">{{$grandTotal}}</td></tr>
	</table>
	<a href="/transactionHistory"><button>Back</button></a>
</body>
</html>