<html lang="en">
@extends('layouts.master')
<head>
    <title>Catalogue</title>
    <style type="text/css">
        .pagination
        {
            text-align: center;
            display: inline-block;
            left: 0; right: 0;
            margin: auto;
        }
        .pagination a:hover, a:visited, a:link, a:active
        {
            text-decoration: none;
        }
        .pagination li 
        {
            border: 2px solid rgba(0,0,0,0.1);
            padding-left: 10px;
            padding-right: 10px;
            padding-top: 5px;
            padding-bottom: 5px;
            text-align: center;
            display: inline-block;
            vertical-align: middle;
            background-color: white;
            border-radius: 6px;  
        }
    </style>
</head>
<body>

    @yield('navbar')

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
        @if(isset($data))
			@foreach($data as $d)
	            <div class="col-md-3 ml-md-auto">
	                	<div style =  "display: block; background-image: url({{$d->image}}); background-size:contain; height: 40%; background-repeat:  no-repeat;">
	                    </div>
	                     <p align="left" style = "display: block; font-weight: bold;"> {{$d->name}}</p>
                         <p align="left" style = "display: block;"><strike>harga asli</strike><br>harga diskon<br>Discount : XX%
                         <input type="button" value = "Display" style="width: 80px; background-color: #3498DB; color:white;" class="form-control"></p>
	            </div>
	        <!-- /.row -->
	        @endforeach
		@endif
         </div>
         </center>
         <br>
        <!-- Pagination -->
        <ul class="pagination" >
            {{$data->links()}}
        </ul>
        <!-- /.row -->
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body></html>