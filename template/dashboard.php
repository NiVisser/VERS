<?php
include '../logic/MLAlgorithm.php';
include '../db/verify.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include 'config.php';
    ?>
    <title>Welcome at VERS</title>
    <link rel="stylesheet" href="../style/css/master.css">

</head>
<body>
<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="/template/logout.php">Uitloggen</a>
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/template/logout.php">Uitloggen</a>
            </li>
        </ul>
    </div>
</nav>

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Hallo, <?php echo $_SESSION['login_user']; ?></h1>
        <p class="lead text-muted">Vandaag zijn er weer verschillende Aanbevelingen & Ontdekking voor je beschikbaar!</p>
    </div>
</section>


<div class="container">
    <div class="row">
        <div class="col">
        </div>
        <div class="col">
            <form class="form-inline" style="margin-left: 3em">
                <div class="form-group">
                    <button type="submit" name="recommended" value="recommended" class="btn btn-primary">Aanbevelingen</button>
                </div>
                <div class="form-group">
                    <button type="submit" name="suggestion" value="suggestion" class="btn btn-primary">Ontdek iets nieuws</button>
                </div>
            </form>
        </div>
        <div class="col">
        </div>
    </div>
</div>
<hr>

<?php
if(isset($_GET['recommended'])) {
    include '../functions/recommended.php';
}

if(isset($_GET['suggestion'])) {
    echo 'suggesties plz';
}


?>
</body>
</html>


<!--            --><?php
//            $confidence = calculate_confidence($member_list, "games", "strips");
//            $advice = give_advice($member_list, $confidence, "games", "strips");
//            get_members($member_list);
//            print("<br/>");
//            print("member 4, maybe you would also like: " . $advice);
//            print("<br/>");
//            $event = $member_list[3][0];
//
//
//            $t = $db->query("SELECT * FROM events WHERE event_type = 'Muziek'");
//            print_r($t['event_name']);
//
//
//            members_events($db, $users);
////            print_r($member_list);
?>

<?php
//$confidence = calculate_confidence($member_list, "games", "strips");
//$advice = give_advice($member_list, $confidence, "games", "strips");
//get_members($member_list);
//print("<br/>");
//print("member 4, maybe you would also like: " . $advice);
//print("<br/>");
//members_events($db, $users);
////            print_r($member_list);
?>

