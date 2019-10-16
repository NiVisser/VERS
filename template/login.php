<?php
include("../db/db_config.php");
session_start();
$error = false;
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Login pagina</title>
    <link href="../style/css/login.css" rel="stylesheet">

    <?php include 'config.php' ?>
</head>
<body>

<?php

if(isset($_POST['username']) and isset($_POST['password'])) {
    // username and password sent from form
    $myusername = stripslashes($_REQUEST['username']);
    $mypassword = stripslashes($_REQUEST['password']);

    $myusername = mysqli_real_escape_string($db,$myusername);
    $mypassword = mysqli_real_escape_string($db,$mypassword);

    $sql = "SELECT username, password FROM users WHERE Username = '$myusername' and Password = '$mypassword'";
    $result = mysqli_query($db,$sql);

    $rows = mysqli_num_rows($result);
    // If result matched $myusername and $mypassword, table row must be 1 row
    if($rows == 1) {
        $_SESSION["login_user"] = $myusername;
        header("location: /index.php");
    }else {
        $error = true;
    }
}
?>
<br>
<div class="card mx-auto" style="width: 22rem;">
    <div class="card-body fadeIn first">
        <h5 class="card-title">Vers : Inloggen</h5>
        <img src="../style/images/images.png" id="icon" alt="User Icon" />
        <h6 class="card-subtitle mb-2 text-secondary">Login pagina</h6>
        <form method="post">
            <div class="form-group">
                <label for="name">Gebruikersnaam</label>
                <input class="form-control fadeIn second" name="username" placeholder="naam" required>
            </div>
            <div class="form-group">
                <label for="password">Wachtwoord</label>
                <input type="password" class="form-control fadeIn third" name="password" placeholder="*******" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <?php
            if($error) {
                echo '<div id="alert alert-primary">Verkeerd wachtwoord of gebruikersnaam</div>';
            }
            if(isset($_SESSION['redirected']) and $_SESSION['redirected']) {
                echo '<div id="alert alert-primary">
                    Uw bent op deze pagina terecht gekomen, omdat u eerst ingelogd moet zijn om uw gekozen pagina te bezoeken.
                </div>';
                session_destroy();
            }
            ?>
        </form>
        <h4>Nog geen account bij Forum Groningen?</h4>
        <a href="registration.php" class="text-muted"><button class="btn btn-secondary">Maak een account aan!</button></a>
    </div>
</div>

</body>
</html>






