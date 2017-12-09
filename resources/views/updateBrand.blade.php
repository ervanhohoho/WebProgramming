<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
@if(isset($brands))
<table>
	@foreach($brands as $b)
	<tr>
		<td>{{$b->brandName}}</td>
		<td><a href="/updateBrandDetail/{{$b->brandId}}"><input type="button" value = "Detail"></a> 
			<a href="/deleteBrand/{{$b->brandId}}"><input type="button" value="Delete"></a></td>
	</tr>
	@endforeach
</table>
@endif
</body>
</html>