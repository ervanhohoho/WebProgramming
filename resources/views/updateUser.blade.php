<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>userList</h1>
	<table>
	@if(isset($users))
		@foreach($users as $u)
			<tr>
				<td>
					{{$u->name}}
				</td>
				<td><a href="/updateUserDetail/{{$u->userId}}">Detail</a>
					<a href="/deleteUser/{{$u->userId}}">Delete</a></td>
			</tr>
		@endforeach
	@endif
	</table>
</body>
</html>