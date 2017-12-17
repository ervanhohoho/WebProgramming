@extends('adminMaster')
@section('title')
	Update Brand
@endsection('title')

@section('content')
<br>
<br>
	<center>
	<form method="POST" action="/doUpdateBrand" class="form-signin">
		{{csrf_field()}}
		<input type="hidden" name = "id" value = "{{$brand->brandId}}">
		<table border = 0 cellpadding="5">
			<tr><td><h2 class="form-signin-heading"><center>Update Brand</center></h2></td></tr>
			<tr>
				<td><input type="text" name="brandName" value = "{{$brand->brandName}}" class="form-control"></td>
			</tr>
			<tr>
				<td><input type="submit" value = "Update Brand" style=" background-color: #c11717; color:white;" class="form-control"></td>
			</tr>
		</table>
	</form>
</body>
</html>