<?php include '../db/db_config.php'?>
<html>
<head>
    <?php include 'config.php'; ?>
</head>
<?php
session_start();
if(isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($db, $_POST['name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $date_of_birth = mysqli_real_escape_string($db, $_POST['date']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    $user_check_query = "SELECT Username, Email FROM username WHERE Username='$username' OR Email='$email' LIMIT 1";
    if ($db->query($user_check_query)->num_rows == 0) {
        $user_add_query = 'INSERT INTO Username (Username, Password, isAmbassador, Email, Dateofbirth, Picture, Points) VALUES ("' . $username . '","' . $password . '",'. '0,"' . $email . '",' .  $date_of_birth . "," . '"test.jpg"' . "," .  '0' . ")";
        if ($db->query($user_add_query) === TRUE) {
            $_SESSION['name'] = $username;
            $_SESSION["login_user"] = $username;
            header("location: /template/question_one.php");
        } else {
            echo "Error: " . $user_add_query . "<br>" . $db->error;
        }
    }
    else {
        echo "
            <br>
            <div class='row'>
                <div class='col-md-4 offset-md-4 align-self-center alert alert-warning'>
                    Gebruiker: $username of <br> E-mail: $email bestaat al.
                </div>
            </div>
         ";
    }
}
?>
<body>
<br />
<div class="card mx-auto" style="width: 22rem;">
    <div class="card-body">
        <h5 class="card-title">Vers</h5>
        <h6 class="card-subtitle mb-2 text-secondary">Stap 1/4</h6>
        <form method="post">
            <div class="form-group">
                <label for="name">Hoe heet je?</label>
                <input class="form-control" name="name" placeholder="naam" required>
            </div>

            <div class="form-group">
                <label for="date">Wanneer ben je jarig?</label>
                <input type="date" class="form-control" name="date" placeholder="24-11-1995">
            </div>

            <div class="form-group">
                <label for="email">Wat is je e-mailadres?</label>
                <input type="email" class="form-control" name="email" placeholder="afra@forumvers.nl">
            </div>
            <div class="form-group">
                <label for="password">Verzin een wachtwoord</label>
                <input type="password" class="form-control" name="password" placeholder="Fluitsnoepjes" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
        <a href="#" class="card-link">< Terug</a>
    </div>
</div>
</body>
</html>
