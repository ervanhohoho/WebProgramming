<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/logo-nav.css')}}" rel="stylesheet">
    <style type="text/css">
        
    </style>
  </head>

  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
              <a class="navbar-brand" href="/">
          <img src="asset/logo.png" width="30" height="30" alt="">
        </a>
         <ul class="navbar-nav ml-auto">
         <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Shoes
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="/insertShoe">Insert Shoes</a></li>
          <li><a href="/updateShoe">Update Shoes</a></li>
        </ul>
      </li>
       <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Brand
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href=/insertBrand>Insert Brand</a></li>
          <li><a href="/updateBrand">Update Brand</a></li>
        </ul>
      </li>
       <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">User
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="/insertUser">Insert User</a></li>
          <li><a href="/updateUser">Update User</a></li>
        </ul>
      </li>
       <li><a href="#">Transaction</a></li>
        </ul>
      <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
          <li class="nav-item">
             <a class="nav-link"><p id="datez"><script>
  function convertDate(inputFormat) {
  function pad(s) { return (s < 10) ? '0' + s : s; }
  var d = new Date(inputFormat);
  return [pad(d.getDate()), pad(d.getMonth()+1), d.getFullYear()].join('/');
}
document.getElementById("datez").innerHTML=convertDate(Date());
</script> </p></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/loginView">Hi, admin</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/logout" name="logout">Logout</a>
            </li>
          </ul>
        </div>
      </div>  
    </nav>
    <!-- Navigation -->
   <div class = "body-idx">
    <!-- Page Content -->
    <!-- /.container -->
    @yield('content')
    <!-- Bootstrap core JavaScript -->
     </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!--<footer class="container-fluid text-center">
        <div class="fixed-bottom" style="margin-top:25px; background-color:LightGray;">
            <br>
            <p>SneakeLLs © 2017| your daily dose | follow us</p> 
        </div>
  </footer>-->
</body>
</html>