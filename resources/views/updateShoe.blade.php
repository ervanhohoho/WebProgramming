<!DOCTYPE html>
<html>
<head>
	<title>update Shoe</title>
</head>
<body>
	<center>
        <div style = "width: 60vw; margin: 0px 12vw;">
        @if(isset($shoes))
			@foreach($shoes as $d)
	            <div class="col-md-3 ml-md-auto">
	                	<div style =  "display: block; background-image: url({{$d->image}}); background-size:contain; height: 40%; background-repeat:  no-repeat;">
	                    </div>
	                     <p align="left" style = "display: block; font-weight: bold;"> {{$d->name}}</p>
                         <a href = "/updateShoeEdit/{{$d->shoesId}}"><input type="button" value="update"></a>
                         <input type="button" value = "Display" style="width: 80px; background-color: #3498DB; color:white;" class="form-control"></p>
	            </div>
	        <!-- /.row -->
	        @endforeach
		@endif
        </div>
    </center>
</body>
</html>