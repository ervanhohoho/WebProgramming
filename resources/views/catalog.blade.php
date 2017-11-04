<!DOCTYPE html>
<html>
<head>
	<title>Catalog</title>
</head>
<body>
	@if(isset($data))
		@foreach($data as $d)
			<img src="{{$d->image}}" width="100">
			<br>
			<hr>
		@endforeach
	@endif
	{{$data->links()}}
</body>
</html>