<?php
include '../db/db_config.php';
session_start();
?>
<html>
<head>
    <link href="../style/css/event_types.css" rel="stylesheet">
    <?php include 'config.php'; ?>
</head>
<?php
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
            header("location: /index.php");
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
<br>
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
                <a href="question_two.php">
                    <button type="button" class="btn btn-secondary" name="comics">
                        Strips
                    </button>
                </a>
                <a href="question_two.php">
                    <button type="button" class="btn btn-secondary" name="movies">
                        Films
                    </button>
                </a>
            <br/>
            <br/>
                <a href="question_two.php">
                    <button type="button" class="btn btn-secondary" name="art">
                        Kunst
                    </button>
                </a>
                <a href="question_two.php">
                    <button type="button" class="btn btn-secondary" name="sport">
                        Sport
                    </button>
                </a>
            <br/>
            <br/>
                <a href="question_two.php">
                    <button type="button" class="btn btn-secondary" name="drama">
                        Theater
                    </button>
                </a>
                <a href="question_two.php">
                    <button type="button" class="btn btn-secondary" name="music">
                        Muziek
                    </button>
                </a>
            <br/>
            <br/>
                <a href="question_two.php">
                    <button type="button" class="btn btn-secondary" name="games">
                        Games
                    </button>
                </a>
                <a href="question_two.php">
                    <button type="button" class="btn btn-secondary" name="literature">
                        Literatuur
                    </button>
                </a>
            <br/>
            <br/>
                <a href="question_two.php">
                    <button type="button" class="btn btn-secondary" name="photo">
                        Fotografie
                    </button>
                </a>
                <a href="question_two.php">
                    <button type="button" class="btn btn-secondary" name="unknown">
                        Ik weet het niet
                    </button>
                </a>
            <br/>
        </form>
        <br>
    </div>
</div>
</body>
</html>
