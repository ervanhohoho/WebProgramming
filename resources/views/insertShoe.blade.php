<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table>
	<form action = "/doInsertShoe" method = "POST" enctype="multipart/form-data" class="form-signin">
		{{csrf_field()}}
	<tr><td><input type="text" name="name" placeholder="Name"></td></tr>
	<tr><td><input type="file" name="image"></td></tr>
	<tr><td><select name = "brand">
		@if(isset($brands))
			@foreach($brands as $b)
			<option value = "{{$b->brandId}}"> {{$b->brandName}}</option>
			@endforeach
		@endif
		</select></td></tr>
	<tr><td><input type="text" name="description"  placeholder="Description"></td></tr>
	<tr><td><input type="text" name="price"  placeholder="Input Price"></td></tr>
	<tr><td><input type="text" name="discount"  placeholder="Discount"></td></tr>
	<tr><td><input type="text" name="stock"  placeholder="Stock"></td></tr>
	<tr><td><input type="submit" value="Insert"></td></tr>
	</form>
	</table>
</body>
</html>