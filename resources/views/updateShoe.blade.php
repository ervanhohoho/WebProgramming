<html lang="en">
@extends('adminMaster')
@section('title')
Update Shoes
@endsection
@section('content')
    <!-- Page Content -->
    <div class="container-data">

        <!-- Page Heading -->

        <!-- /.row -->
        <form action="/viewData" method = "GET">
            <center>
            <input type="text" name="search" style = "width: 47% ;border-radius: 5px; display: inline-block; " class="form-control" placeholder="Search by name, brand">
            <input type="submit" value = "Search" style="width: 80px; display: inline-block;" class="form-control">
            <input type="button" value = "Name" style="width: 80px; display: inline-block; border-color: #3498DB; color:#3498DB;" class="form-control">
            </center>
        </form>
        <!-- Projects Row -->
        <center>
        <div style = "width: 60vw; margin: 0px 12vw;">
        @if(isset($shoes))
			@foreach($shoes as $d)
	            <div class="col-md-3 ml-md-auto">
	                	<div style =  "display: block; background-image: url({{$d->image}}); background-size:contain; height: 40%; background-repeat:  no-repeat;">
	                    </div>
	                     <p align="left" style = "display: block; font-weight: bold;"> {{$d->name}}
	                     <input type="button" value = "Display" style="width: 80px; background-color: #3498DB; color:white;" class="form-control"><br>
                         <a href = "/updateShoeEdit/{{$d->shoesId}}"><input type="button" value="update" class="form-control" style="width: 80px; background-color: #c11717; color:white;"></a>
                        </p>
	            </div>
 <!-- /.row -->
	        @endforeach
		@endif
         </div>
         </center>
         <br>
        <!-- Pagination -->
        <div style = "width: 100%; text-align: center;">
            {{$shoes->links()}}
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
@endsection