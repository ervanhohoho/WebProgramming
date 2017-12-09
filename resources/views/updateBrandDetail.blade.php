<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Update Brand</h1>
	<form method="POST" action="/doUpdateBrand">
		{{csrf_field()}}
		<input type="hidden" name = "id" value = "{{$brand->brandId}}">
		<input type="text" name="brandName" value = "{{$brand->brandName}}">
		<input type="submit">
	</form>
</body>
</html>