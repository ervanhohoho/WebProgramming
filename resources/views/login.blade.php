<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
<form action="/login" method="POST">
{{csrf_field()}}
	<input type="text" name="email" placeholder = "email"><br>
	<input type = "password" name = "password" placeholder="password">
	<input type="submit">
</form>
@if(isset($status))
	echo $status
@endif
</body>
</html>