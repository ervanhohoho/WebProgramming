<!DOCTYPE html>
<html>
<head>
	<title>CART</title>
</head>
<body>
	@if(isset($cart))
		@foreach($cart as $key=>$value)
			{{$shoes[$key-1]->name}}
			{{$value}}
		@endforeach
	@endif
</body>
</html>