<?php
include '../db/db_config.php';
include '../db/verify_registration.php';
?>
<html>
<head>
    <?php include 'config.php'; ?>
</head>
<body>
<br />
<div class="card mx-auto" style="width: 30rem;">
    <div class="card-body">
        <h5 class="card-title">Vers</h5>
        <h6 class="card-subtitle mb-2 text-secondary">Stap 4/4</h6>
        <div class="container">
            <img src="../style/images/images.png" id="icon" alt="User Icon" />
            <h6 class="card-subtitle mb-2 text-secondary"></h6>
            <p class="small">Game wizard - Level 1</p>
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
        <a href="/template/dashboard.php" class="btn btn-primary" role="button">Naar het dashboard</a>
    </div>
</div>
</body>
</html>
