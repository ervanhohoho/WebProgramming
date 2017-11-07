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
        <div class="row">
            <div class="col-lg-12">
                <center><h1 class="page-header">Catalogue</h1></center>
                <br>
            </div>
        </div>
        <!-- /.row -->
        <form action="/viewData" method = "GET">
            <center>
            <input type="text" name="search" style = "width: 25vw;border-radius: 25px;"> <input type="submit" value = "Search!" style="width: 100px; border-radius: 25px;">
            </center>
        </form>
        <!-- Projects Row -->
        <center>
        <div style = "width: 60vw; margin: 0px 12vw;" align="left">
        @if(isset($data))
			@foreach($data as $d)
	            <div class="col-md-3 ml-md-auto">
	                <a href="#">
	                	<div style =  " display: block; background-image: url({{$d->image}}); background-size:contain; height: 50%; background-repeat:  no-repeat; text-align: top;">
	                    </div>
	                     <p style = "display: block; text-align: top; height: 100px"> {{$d->name}}</p>
	                </a>
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