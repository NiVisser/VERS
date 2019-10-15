<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">

<head>
<?php include 'config.php' ?>
<link href="../style/css/master.css" rel="stylesheet">
	
  <!--
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard VERS</title>

  Bootstrap core CSS
  <link href="../style/css/bootstrapvoordedashboard/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  Custom styles for this template
  <link href="../style/css/bootstrapvoordedashboard/css/scrolling-nav.css" rel="stylesheet"> -->
</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Start Bootstrap</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#recommended">Aanbevolen voor jou</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3">Hello, world!</h1>
      <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
      <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p>
    </div>
  </div>

  <div class="container">
    <!-- Example row of columns -->
    <div class="row">
      <div class="col-md-4">
        <h2>Heading</h2>
        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
        <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>
      </div>
      <div class="col-md-4">
        <h2>Heading</h2>
        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
        <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>
      </div>
      <div class="col-md-4">
        <h2>Heading</h2>
        <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>
      </div>
    </div>

    <hr>

  </div> <!-- /container -->

</main>

</body>

</html>
=======
<?php
include 'db/verify.php';
session_start();
echo 'Welcome, ' . $_SESSION["login_user"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include 'config.php';
    include '../logic/MLAlgorithm.php'
    ?>
    <title>Welcome at VERS</title>
    <link rel="stylesheet" href="../style/css/index.css">
    <link rel="stylesheet" href="../style/css/master.css">

</head>
<body>
<div class="container">
    <nav>
        <input type="checkbox" id="nav" class="hidden">
        <label for="nav" class="nav-btn">
            <i></i>
            <i></i>
            <i></i>
        </label>
        <div class="logo">
            <a href="homepage.html">VERS</a>
        </div>
        <div class="nav-wrapper">
            <ul>
                <li><a href="homepage.html">Home</a></li>
                <li><a href="testpagina.html">Testpagina</a></li>
            </ul>
        </div>
    </nav>
</div>
<div class="wrapper1">
    <div class="wrapper2">
        <h3> Test pagina </h3>
        <div class="wrapper3">
            <?php
            $confidence = calculate_confidence($members, "Games", "Strips");
            $advice = give_advice($members, $confidence, "Games", "Strips");
            print($advice);
            ?>
        </div>
    </div>
</div>
</body>
</html>
>>>>>>> master
