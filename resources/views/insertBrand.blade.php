<!DOCTYPE html>
<html>
<head>
	<title>insert Brand</title>
</head>
<body>
	<form action = "/doInsertBrand" method = "GET">
		<input type="text" name="brandName" placeholder = "Brand Name"><br>
		<input type="submit">
	</form>

	@if(isset($errors))
	@foreach($errors->all() as $e)
	{{$e}}
	@endforeach
	@endif
</body>
</html>