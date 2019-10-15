<?php
include '../db/db_config.php';
include '../db/verify_registration.php';
?>
<html>
<head>
    <link href="../style/css/event_types.css" rel="stylesheet">
    <?php include 'config.php'; ?>
</head>
<?php
if(isset($_POST['answer'])) {
    $answer = $_POST['answer'];
    $answer = explode("_", $answer);
    $question_number = $answer[1];
    $answer = $answer[0];
    $_SESSION['login_user'] = 'Jolijn';
    $username = $_SESSION["login_user"];

    $user_check_query = "SELECT Username FROM username WHERE Username='$username' LIMIT 1";
    echo query($user_check_query);
    if($db->query($user_check_query)->num_rows == 1) {

    }

    // $answer_add_query = 'INSERT INTO answer (user_id, questionnumber, answer) VALUES ("'$username'")';


//    $user_check_query = "SELECT Username, Email FROM username WHERE Username='$username' OR Email='$email' LIMIT 1";
//    if ($db->query($user_check_query)->num_rows == 0) {
//        $user_add_query = 'INSERT INTO Username (Username, Password, isAmbassador, Email, Dateofbirth, Picture, Points) VALUES ("' . $username . '","' . $password . '",'. '0,"' . $email . '",' .  $date_of_birth . "," . '"test.jpg"' . "," .  '0' . ")";
//        if ($db->query($user_add_query) === TRUE) {
//            $_SESSION['name'] = $username;
//            $_SESSION["login_user"] = $username;
//            header("location: /index.php");
//        } else {
//            echo "Error: " . $user_add_query . "<br>" . $db->error;
//        }
//    }
//    else {
//        echo "
//            <br>
//            <div class='row'>
//                <div class='col-md-4 offset-md-4 align-self-center alert alert-warning'>
//                    Gebruiker: $username of <br> E-mail: $email bestaat al.
//                </div>
//            </div>
//         ";
//    }
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
                    <button type="submit" class="btn btn-secondary" value="Strips_1" name="answer">
                        Strips
                    </button>

                    <button type="submit" class="btn btn-secondary" value="Films_2" name="answer">
                        Films
                    </button>
            <br/>
            <br/>
                    <button type="submit" class="btn btn-secondary" value="Kunst_3" name="answer">
                        Kunst
                    </button>

                    <button type="submit" class="btn btn-secondary" value="Sport_4" name="answer">
                        Sport
                    </button>
            <br/>
            <br/>
                    <button type="submit" class="btn btn-secondary" value="Theater_5" name="answer">
                        Theater
                    </button>

                    <button type="submit" class="btn btn-secondary" value="Muziek_6" name="answer">
                        Muziek
                    </button>
            <br/>
            <br/>
                <button type="submit" class="btn btn-secondary" value="Games_7" name="answer">
                    Games
                </button>

                <button type="submit" class="btn btn-secondary" value="Literatuur_8" name="answer">
                    Literatuur
                </button>
            <br/>
            <br/>
                <button type="submit" class="btn btn-secondary" value="Fotografie_9" name="answer">
                    Fotografie
                </button>
                <button type="submit" class="btn btn-secondary" value="Onbekend_10" name="answer">
                        Ik weet het niet
                </button>
                  <br/>
        </form>
        <br>
    </div>
</div>
</body>
</html>
