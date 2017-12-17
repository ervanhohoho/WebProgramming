@extends('adminMaster')
@section('title')
	Update Brand
@endsection('title')

@section('content')
<br>
<br>
	<center>
	<h1>Brand List</h1>
@if(isset($brands))
<table width="50%" border="0">
	<tr>
		<td width="25%"><p align="center">ID</p></td>
			<td width="25%"><p align="center">Brand Name</p></td>
			<td width="25%"> </td>
			<td width="25%"> </td>
	</tr>
	<tr>
				<td colspan="4"><hr></td>
	</tr>
	@foreach($brands as $b)
	<tr>
		<td><p align="center">{{$b->brandId}}</p></td>
		<td><p align="center">{{$b->brandName}}</p></td>
		<td><a href="/updateBrandDetail/{{$b->brandId}}"><center><input type="submit" value = "Detail" style="background-color: #3498DB; width: 100px; color:white; display: inline-block;" class="form-control"></center></a></td>
		<td><a href="/deleteBrand/{{$b->brandId}}"><center><input type="submit" value = "Delete" style="background-color: #c11717; width: 100px; color:white; display: inline-block;" class="form-control"></center></a></td>
	</tr>
		<tr>
				<td colspan="4"><hr></td>
	</tr>
	@endforeach
</table>
@endif
</body>
</html>