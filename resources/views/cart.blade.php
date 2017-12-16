<!DOCTYPE html>
<html>
<head>
	<title>CART</title>
</head>
<body>
	@if(isset($cart))
	<form method = "POST" action = "/pay" enctype="multipart/form-data">
	{{csrf_field()}}
	<table border="1">
		<?php $count = 0?>
		<tr><th>image</th><th>name</th><th>quantity</th><th>price</th><th>subtotal</th></tr>
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
			<td><a href="/deleteCart/{{$shoeId[1]}}">Delete</a></td>
			<?php $count++ ?>
		</tr>
		@endforeach
		<tr><td><input type="submit" value="submit"></td></tr>
	</table>
	@endif
	</form>
</body>
</html>