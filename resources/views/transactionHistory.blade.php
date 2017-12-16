<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	@if(isset($transactions))
	<table border="1">
		<tr><th>ID</th><th>Email</th><th>Date</th><th>Status</th></tr>
		@foreach($transactions as $t)
		<?php $idx = array_search($t->userId, $userids->all()) ?>
		<tr>
			<td>{{$t->transactionId}}</td>
			<td>{{$users[$idx]->email}}</td>
			<td>{{$t->transactionDateTime}}</td>
			<td>Success</td>
			<td><a href="/detailTransaction/{{$t->transactionId}}">Detail</a></td>
		</tr>
		@endforeach	
	</table>
	@endif
</body>
</html>