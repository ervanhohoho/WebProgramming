<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>
@if(isset($users))
	@foreach($users as $u)
	{{$u->name}}
	<br>
	@endforeach
@endif

<form action ="/register" method = "GET">
	<input type= "text" placeholder="name" name="name">
	<br>
	<input type = "text" placeholder="email" name = "email">
	<br>
	<input type="password" placeholder="password" name="password">
	<br>
	<input type="text" name="profilepicture" placeholder="pp"><br>
	<input type="text" name="gender" placeholder="gender"><br>
	<input type="text" name="dob" placeholder="DOB"><br>
	<input type="text" name="address" placeholder="Address"><br>
	<input type="submit" value = "Register">
</form>
<a href='/loginView'>click here to login</a>
</body>
</html>