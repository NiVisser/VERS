<?php
session_start();
if (!isset($_SESSION["login_user"])) {
    $_SESSION["redirected"] = true;
    header("Location: ./template/login.php");
    exit();
}
