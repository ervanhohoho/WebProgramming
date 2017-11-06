<html lang="en">
@extends('layouts.master')
<head>
    <title>4 Col Portfolio - Start Bootstrap Template</title>
</head>
<body>

    @yield('navbar')

    <!-- Page Content -->
    <div class="container-data">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Catalogue
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Projects Row -->
        <div class="container">
        <div class="row">
        @if(isset($data))
			@foreach($data as $d)
	            <div class="col-md-3 ml-md-auto">
	                <a href="#">
	                	<div style =  " display: table-cell; background-image: url({{$d->image}}); width: 100px; height: 100px; background-size:contain; background-repeat:  no-repeat; text-align: top;">
	                    </div>
	                     <p style = "display: table-cell; text-align: top; height: 100px"> {{$d->name}}</p>
	                </a>
	            </div>
	        <!-- /.row -->
	        @endforeach
		@endif
        </div>
         </div>
        <!-- Pagination -->
        <center>
                <ul class="pagination">
                    {{$data->links()}}
                </ul>
        </center>
        <!-- /.row -->
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body></html>