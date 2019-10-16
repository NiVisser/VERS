<!DOCTYPE html>
<html lang="en">
<head>
      <?php include 'template/config.php'; ?>
      <title>Welcome at VERS</title>
      <link rel="stylesheet" href="style/css/index.css">
      <link rel="stylesheet" href="./style/css/master.css">
</head>
<body>
<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="/template/login.php">Login</a>
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/template/login.php">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/template/registration.php">Link</a>
            </li>
        </ul>
    </div>
</nav>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h1 class="display-3">Deze week uitgelicht</h1>
        <h4 class="font-weight-light"><i>The Adams Family</i></h4>
    </div>
    <div class="container" id="index-category">
        <span class="font-weight-normal">Categorie : Film</span>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col">
            <img id="index-opening-img" src="../style/images/images.png" id="icon" alt="User Icon" />
        </div>
        <div class="col" id="index-opening-text">
            <h2>Hey jij daar!</h2>
            <p class="font-weight-normal">Maak je een account met je eigen avatar en verzamel samen met anderen leuke kortingen en gratis extra's bij diverse evenementen!</p>
            <a href="template/registration.php" class="btn btn-primary">Schrijf je in!</a>
        </div>
    </div>
    <hr>
</div>
<div class="container">
    <footer>
        <p>© Vers 2019
    </footer>
</div>
</body>
</html>
