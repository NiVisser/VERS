<?php include '../db/db_config.php'?>
<html>
<head>
    <link href="../style/css/event_types.css" rel="stylesheet">
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
        <h6 class="card-subtitle mb-2 text-secondary">Stap 1/4</h6>
        <form action="" method="post">
            <div class="form-group">
                <label for="name">Welke categorieën vind je leuk?</label>
                <br/>
                <br/>
<!--                <input class="button" type="button" id="button0" style="color:black; width:100px; height: 50px" margin: 20px/>-->
                <button type="button" class="btn btn-secondary">
                Strips
            </button>
            <button type="button" class="btn btn-secondary">
                Films
            </button>
            <br/>
            <br/>
            <button type="button" class="btn btn-secondary">
                Kunst
            </button>
            <button type="button" class="btn btn-secondary">
                Sport
            </button>
            <br/>
            <br/>
            <button type="button" class="btn btn-secondary">
                Theater
            </button>
            <button type="button" class="btn btn-secondary">
                Muziek
            </button>
            <br/>
            <br/>
            <button type="button" class="btn btn-secondary">
                Games
            </button>
            <button type="button" class="btn btn-secondary">
                Literatuur
            </button>
            <br/>
            <br/>
            <button type="button" class="btn btn-secondary">
                Fotografie
            </button>
            <button type="button" class="btn btn-secondary">
                Ik weet het niet
            </button>
            <br/>
            <br/>
                <br/>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
        <a href="#" class="card-link">< Terug</a>
    </div>
</div>
</body>
</html>
