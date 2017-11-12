<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/logo-nav.css" rel="stylesheet">
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
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
              <a class="navbar-brand" href="/">
          <img src="asset/logo.png" width="30" height="30" alt="">
        </a>
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
              <a class="nav-link" href="/loginView">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/registerView">Register</a>
            </li>
          </ul>
        </div>
      </div>  
    </nav>
    
    @yield('content')

    <footer class="container-fluid text-center">
        <div class="fixed-bottom" style="margin-top:25px; background-color:LightGray;">
            <br>
            <p>SneakeLLs © 2017| your daily dose | follow us</p> 
        </div>
  </footer>
</body>
</html>