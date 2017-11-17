<!DOCTYPE html>
<html>
<head>
	<title>Shoe Edit</title>
</head>
<body>
	<table>
	<form action = "/doUpdateShoe" method = "POST" enctype="multipart/form-data">
		{{csrf_field()}}
		<input type="hidden" name = "id" value = "{{$shoes->shoesId}}">
		<tr><td><img src="{{$shoes->image}}"></td></tr>
		<tr><td><input type="file" name="image" value="{{$shoes->image}}"></td></tr>
		<tr><td>Name : <input type="text" name = "name" value="{{$shoes->name}}"></td></tr>
		<tr><td>Brand = {{$shoes->brandId}}</td></tr>
		<tr><td><select name = "brandId">
			@if(isset($brands))
				@foreach($brands as $b)
					<option value = "{{$b->brandId}}">
						{{$b->brandName}}</option>
				@endforeach
			@endif
		</select></td></tr>
		<tr><td>Description : <input type="text" name = "description" value="{{$shoes->description}}"></td></tr>
		<tr><td>Price : <input type="text" name = "price" value="{{$shoes->price}}"></td></tr>
		<tr><td>Discount : <input type="text" name = "discount" value="{{$shoes->discount}}"></td></tr>
		<tr><td>Stock : <input type="text" name="stock" value = "{{$shoes->stock}}"></td></tr>
		<tr><td><input type="submit"></td></tr>
	</form>
	</table>
</body>
</html>