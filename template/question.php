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
if($_POST['answer']) {
    $answer = $_POST['answer'];
    $answer = explode("_", $answer);
    $question_number = $answer[1];
    $answer = $answer[0];
    $username = $_SESSION["login_user"];
    echo $_SESSION["login_user"];
    $user_check_query = "SELECT user_id FROM users WHERE username='$username' LIMIT 1";
    $result = $db->query($user_check_query);
    if($result->num_rows > 0) {
        $user_id = mysqli_fetch_assoc($result);
        $answer_add_query = 'INSERT INTO answers (user_id, questionnumber, answer) VALUES ("' . $user_id["user_id"] . '","' . $question_number . '", "' . $answer .'")';
        if($db->query($answer_add_query) === TRUE) {
            header('location: dashboard.php');
        }
    } else {
        echo 'Er is iets fout gegaan. ' . mysqli_close($db);
    }
}
?>
<body>
<br>
<div class="card mx-auto" style="width: 22rem;">
    <div class="card-body">
        <h5 class="card-title">Vers</h5>
        <h6 class="card-subtitle mb-2 text-secondary">Stap 2/3</h6>
        <form id="form-id" action="" method="post">
            <div class="form-group">
                <label for="name">Welke categorieën vind je verder leuk?</label>
                <br/>
                <br/>
                <button type="submit" class="btn btn-secondary" value="strips_1" name="answer" onClick="this.disabled=true;">
                    Strips
                </button>

                <button type="submit" class="btn btn-secondary" value="films_2" name="answer" onClick="this.disabled=true;">
                    Films
                </button>
                <br/>
                <br/>
                <button type="submit" class="btn btn-secondary" value="kunst_3" name="answer" onClick="this.disabled=true;">
                    Kunst
                </button>

                <button type="submit" class="btn btn-secondary" value="sport_4" name="answer" onClick="this.disabled=true;">
                    Sport
                </button>
                <br/>
                <br/>
                <button type="submit" class="btn btn-secondary" value="theater_5" name="answer" onClick="this.disabled=true;">
                    Theater
                </button>

                <button type="submit" class="btn btn-secondary" value="muziek_6" name="answer" onClick="this.disabled=true;">
                    Muziek
                </button>
                <br/>
                <br/>
                <button type="submit" class="btn btn-secondary" value="games_7" name="answer" onClick="this.disabled=true;">
                    Games
                </button>

                <button type="submit" class="btn btn-secondary" value="literatuur_8" name="answer" onClick="this.disabled=true;">
                    Literatuur
                </button>
                <br/>
                <br/>
                <button type="submit" class="btn btn-secondary" value="fotografie_9" name="answer" onClick="this.disabled=true;">
                    Fotografie
                </button>
                <button type="submit" class="btn btn-secondary" value="onbekend_10" name="answer" onClick="this.disabled=true;">
                    Ik weet het niet
                </button>
                <br/>
                <br/>
        </form>
        <br>
    </div>
</div>
</body>
</html>
