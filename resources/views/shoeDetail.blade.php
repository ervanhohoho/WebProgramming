<!DOCTYPE html>
<html>
<head>
	<title>Shoe Detail</title>
</head>
<body>
	<img src="../{{$shoe->image}}">
	<form method="GET" action="/addToCart">
	<table border="1">
		<input type="hidden" name="id" value="{{$shoe->shoesId}}">

		<tr><td colspan="3">{{$shoe->name}}</td></tr>
		<tr><td colspan="3">{{$shoe->description}}</td></tr>
		<tr><td>{{$shoe->price}}</td><td>{{$shoe->discount}}</td><td>{{$shoe->stock}}</td></tr>
		<tr><td colspan="3"><input type="text" name="qty"></td></tr>
		<tr><td colspan="3"><input type="submit" value="order"></td></tr>
	</table>
	</form>
</body>
</html>