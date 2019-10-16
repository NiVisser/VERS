<?php
include '../db/db_config.php';
include '../db/verify_registration.php';
?>
<html>
<head>
    <link href="../style/css/event_types.css" rel="stylesheet">
    <?php include 'config.php'; ?>
</head>
<body>
<br>
<?php
if(isset($_POST['answers'])) {
    $answers = $_POST['answers'];
    foreach ($answers as $answer) {
        $answer = explode("_", $answer);
        $question_number = $answer[1];
        $answer = $answer[0];
        $username = $_SESSION["login_user"];
        $user_check_query = "SELECT user_id FROM users WHERE username='$username' LIMIT 1";
        $result = $db->query($user_check_query);
        if($result->num_rows > 0) {
            $user_id = mysqli_fetch_assoc($result);
            $answer_add_query = 'INSERT INTO answers (user_id, questionnumber, answer) VALUES ("' . $user_id["user_id"] . '","' . $question_number . '", "' . $answer .'")';
            if($db->query($answer_add_query) === TRUE) {
                echo "Gelukt!";
            }
        } else {
            echo 'Gebruiker bestaat niet.' . mysqli_close($db);
        }
    }
    header('location: account_created.php');
}
?>
<div class="card mx-auto" style="width: 22rem;">
    <div class="card-body">
        <h5 class="card-title">Vers</h5>
        <h6 class="card-subtitle mb-2 text-secondary">Stap 2/3</h6>
        <form id="form-id" style="margin-left: 20px;" action="" method="post">
            <div class="row">
                <div class="col">
                    <input type="checkbox" id="strips_check" class="form-check-input" name="answers[]" value="strips_1">Strips
                </div>
                <div class="col">
                    <input type="checkbox" id="film_check" class="form-check-input" name="answers[]" value="films_2">Films
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="checkbox" id="kunst_check" class="form-check-input" name="answers[]" value="kunst_3">Kunst
                </div>
                <div class="col">
                    <input type="checkbox" id="sport_check" class="form-check-input" name="answers[]" value="sport_4">Sport
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="checkbox" id="theater_check" class="form-check-input" name="answers[]" value="theater_5">Theater
                </div>
                <div class="col">
                    <input type="checkbox" id="muziek_check" class="form-check-input" name="answers[]" value="muziek_6">Muziek
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="checkbox" id="games_check" class="form-check-input" name="answers[]" value="games_7">Games
                </div>
                <div class="col">
                    <input type="checkbox" id="literatuur_check" class="form-check-input" name="answers[]" value="literatuur_8">Literatuur
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="checkbox" id="fotografie_check" class="form-check-input" name="answers[]" value="fotografie_9">Fotografie
                </div>
                <div class="col">
                    <input type="checkbox" id="unknown_check" class="form-check-input" name="answers[]" value="onbekend_10">Ik weet het niet
                </div>
            </div>
            <div class="row">
                <div class="col justify-content-center align-self-center">
                    <button type="submit" style="margin-top: 17px;" class="btn btn-secondary" value="submit" name="submit">Verder</button>
                </div>
            </div>
        </form>
    </div>
</div>


<!---->
<!--<div class="card mx-auto" style="width: 22rem;">-->
<!--    <div class="card-body">-->
<!--        <h5 class="card-title">Vers</h5>-->
<!--        <h6 class="card-subtitle mb-2 text-secondary">Stap 2/3</h6>-->
<!--        <form id="form-id" action="" method="post">-->
<!--            <div class="form-group">-->
<!--                <label for="name">Welke categorieën vind je verder leuk?</label>-->
<!--                <br/>-->
<!--                <br/>-->
<!--                <button type="submit" class="btn btn-secondary" value="strips_1" name="answer" onclick="--><?php //$_SESSION['strips'] = 'strips_1' ?><!--">-->
<!--                    Strips-->
<!--                </button>-->
<!---->
<!--                <button type="submit" class="btn btn-secondary" value="films_2" name="answer" onClick="--><?php //$_SESSION['films'] = 'films_2' ?><!--">-->
<!--                    Films-->
<!--                </button>-->
<!--                <br/>-->
<!--                <br/>-->
<!--                <button type="submit" class="btn btn-secondary" value="kunst_3" name="answer" onClick="this.disabled=true;">-->
<!--                    Kunst-->
<!--                </button>-->
<!---->
<!--                <button type="submit" class="btn btn-secondary" value="sport_4" name="answer" onClick="this.disabled=true;">-->
<!--                    Sport-->
<!--                </button>-->
<!--                <br/>-->
<!--                <br/>-->
<!--                <button type="submit" class="btn btn-secondary" value="theater_5" name="answer" onClick="this.disabled=true;">-->
<!--                    Theater-->
<!--                </button>-->
<!---->
<!--                <button type="submit" class="btn btn-secondary" value="muziek_6" name="answer" onClick="this.disabled=true;">-->
<!--                    Muziek-->
<!--                </button>-->
<!--                <br/>-->
<!--                <br/>-->
<!--                <button type="submit" class="btn btn-secondary" value="games_7" name="answer" onClick="this.disabled=true;">-->
<!--                    Games-->
<!--                </button>-->
<!---->
<!--                <button type="submit" class="btn btn-secondary" value="literatuur_8" name="answer" onClick="this.disabled=true;">-->
<!--                    Literatuur-->
<!--                </button>-->
<!--                <br/>-->
<!--                <br/>-->
<!--                <button type="submit" class="btn btn-secondary" value="fotografie_9" name="answer" onClick="this.disabled=true;">-->
<!--                    Fotografie-->
<!--                </button>-->
<!--                <button type="submit" class="btn btn-secondary" value="onbekend_10" name="answer" onClick="this.disabled=true;">-->
<!--                    Ik weet het niet-->
<!--                </button>-->
<!--                <br/>-->
<!--                <br/>-->
<!--        </form>-->
<!--        <br>-->
<!--    </div>-->
<!--</div>-->
</body>
</html>
