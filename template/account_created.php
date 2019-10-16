<?php
include '../db/db_config.php';
include '../db/verify_registration.php';
?>
<html lang="en">
<head>
    <title>Account aangemaakt</title>
    <?php include 'config.php'; ?>
</head>
<body>
<br />
<div class="card mx-auto" style="width: 30rem;">
    <div class="card-body">
        <h5 class="card-title">Vers : Hallo jij?</h5>
        <h6 class="card-subtitle mb-2 text-secondary">Stap 4/4</h6>
        <div class="container">
            <img style="margin-left: 6em;" src="../style/images/images.png" id="icon" alt="User Icon" />
            <h6 style="margin-left: 10em;" class="card-subtitle mb-2 text-secondary"><?php echo $_SESSION["login_user"] ?></h6>
            <p style="margin-left: 13em;" class="small">Game wizard - Level 1</p>
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                    <span class="glyphicon glyphicon-star"></span>
                </div>
            </div>
        </div>
        <br>
        <a style="margin-left:10em;" href="/template/dashboard.php" class="btn btn-primary align-self-center" role="button">Naar het dashboard</a>
    </div>
</div>
</body>
</html>
