<?php include '../db/db_config.php'?>
<html>
<head>
    <?php include 'config.php'; ?>
</head>
<?php
session_start();
echo $_POST['name'];
if(isset($_POST['name'])) {
    var_dump($_POST['date'] . ' ' . gettype($_POST['date']));
    $username = mysqli_real_escape_string($db, $_POST['name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $date_of_birth = date_create_from_format("d-m-Y h:i:s", $_POST['date']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    $user_check_query = "SELECT Username, Email FROM username WHERE Username='$username' OR Email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    echo '<h1>hallo</h1>';
    if($user) { //user exists
        if($user['Username'] === $username or $user['Email'] === $email) {
            echo 'Gebruiker bestaat al.';
            header("location: registration.php");
        }
        else {
            $user_add_query = "INSERT INTO username (Username, Password, Email, Dateofbirth, Picture, Points) 
  			  VALUES('$username', '$password', '$email', $date_of_birth, '', 0)";
            echo mysqli_query($db, $user_add_query);
            $_SESSION['name'] = $username;
            header("location: ../index.php");

        }
    }
}
?>
<body>
<div class="card mx-auto" style="width: 22rem;">
    <div class="card-body">
        <h5 class="card-title">Vers</h5>
        <h6 class="card-subtitle mb-2 text-secondary">Stap 3/4</h6>
        <form action="" method="post">
            <div class="form-group">
                <label for="name">Hoe heet je?</label>
                <input class="form-control" id="name" placeholder="Wat is je naam?">
            </div>

            <div class="form-group">
                <label for="date">Wanneer ben je jarig?</label>
                <input type="date" class="form-control" id="date" placeholder="24-11-1995">
            </div>

            <div class="form-group">
                <label for="email">Wat is je e-mailadres?</label>
                <input type="email" class="form-control" id="email" placeholder="afra@forumvers.nl">
            </div>
            <div class="form-group">
                <label for="password">Verzin een wachtwoord</label>
                <input type="password" class="form-control" id="password" placeholder="Bijv. Fluitsnoepjes">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
        <a href="#" class="card-link">< Terug</a>
    </div>
</div>
</body>
</html>