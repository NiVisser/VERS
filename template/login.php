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

    $sql = "SELECT Username FROM username WHERE Username = '$myusername' and Password = '$mypassword'";
    $result = mysqli_query($db,$sql);

    $rows = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row

    if($rows == 1) {
        $_SESSION['login_user'] = $myusername;

        header("location: ../index.php");
    }else {
        $myusername = '';
        $mypassword = '';
        $error = true;
    }
}
?>
<div class="wrapper fadeInDown">
    <div class="fadeIn first">
        <img src="../style/images/images.png" id="icon" alt="User Icon" />
        <h1>Login pagina</h1>
    </div>

    <div id="formContent">
        <!-- Login Form -->
        <form action="" method="post">
            <input type="text" id="login" class="fadeIn second" name="username" placeholder="login" required>
            <input type="text" id="password" class="fadeIn third" name="password" placeholder="password" required>
            <input type="submit" class="fadeIn fourth btn btn-primary" value="Log In">
        </form>
        <?php
        if($error) {
            echo '<div id="formError">
                <p class="text-danger">Verkeerd wachtwoord of gebruikersnaam</p>
            </div>';
        }
        if(isset($_SESSION['redirected']) and $_SESSION['redirected']) {
            echo '<div id="formError">
                    <p class="text-danger">Uw bent op deze pagina terecht gekomen, omdat u eerst ingelogd moet zijn om uw gekozen pagina te bezoeken.</p>
                </div>';
            session_destroy();
        }
        ?>
    </div>

</div>
</body>
</html>






