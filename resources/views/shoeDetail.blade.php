<!DOCTYPE html>
<html>
@extends('userMaster')

@section('title')
	Shoe Details
@endsection('title')

@section('content')
	<center>
	<div class="wrapper">
	<form method="GET" action="/addToCart" class="form-signin" style="  max-width: 600px;
		<input type="hidden" name="id" value="{{$shoe->shoesId}}">
	<table>
		<tr><td colspan="6"><h2 class="form-signin-heading"><center>{{$shoe->name}}</center></h2></td></tr>
		<tr><td colspan="6"><center><img src="../{{$shoe->image}}" width="40%" height="40%"></center></td>
		<tr><td colspan="2" ><b><p align="center">Price : {{$shoe->price}}</p></b></td>
			<td colspan="2"><b><p align="center">Discount : {{$shoe->discount}}</p></b></td>
			<td colspan="2"><b><p align="center">Stock : {{$shoe->stock}}</p></b></td>
		</tr>
		<tr><td colspan="6"><b>Description : </b><br><p align="justify">{{$shoe->description}}</p></td></tr>
		<tr><td colspan="6"><b>Comments : </b><br><hr style=" border-color:#c11717"><br>No comments to display<br><br></td></tr>
		<tr><td colspan="3"><b>Qty : </b><input type="number" name="qty" class="form-control" style=" width: 150px ; display: inline-block;"></td>
			<td colspan="3"><p align="center"><input type="submit" value = "Add to Cart" style="width: 200px; background-color: #c11717; color:white; display: inline-block;" class="form-control"></p></td>
		</tr>
		<tr><td colspan="3"><input type="text"  placeholder="Your comment here" class="form-control" style=" width: 250px;"></td>
			<td colspan="3"><p align="center"><input type="button" value = "Insert Comment" style="width: 200px; background-color: #3498DB; color:white; display: inline-block;" class="form-control"></p></td>
		</tr>
	</table>
	</form>
</div>
</center>
</body>
</html>