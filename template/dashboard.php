<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include 'config.php';
    include '../logic/MLAlgorithm.php';
    include '../db/db_config.php'
    ?>
    <title>Welcome at VERS</title>
    <link rel="stylesheet" href="../style/css/index.css">
    <link rel="stylesheet" href="../style/css/master.css">

</head>
<body>
<div class="container">
    <nav>
        <input type="checkbox" id="nav" class="hidden">
        <label for="nav" class="nav-btn">
            <i></i>
            <i></i>
            <i></i>
        </label>
        <div class="logo">
            <a href="homepage.html">VERS</a>
        </div>
        <div class="nav-wrapper">
            <ul>
                <li><a href="homepage.html">Home</a></li>
                <li><a href="testpagina.html">Testpagina</a></li>
            </ul>
        </div>
    </nav>
</div>
<div class="wrapper1">
    <div class="wrapper2">
        <h3> Test pagina </h3>
        <div class="wrapper3">
            <?php
            $confidence = calculate_confidence($member_list, "games", "strips");
            $advice = give_advice($member_list, $confidence, "games", "strips");
            get_members($member_list);
            print("<br/>");
            print("member 4, maybe you would also like: " . $advice);
            print("<br/>");
            $event = $member_list[3][0];


            $t = $db->query("SELECT * FROM events WHERE event_type = 'Muziek'");
            print_r($t['event_name']);


            members_events($db, $users);
//            print_r($member_list);
            ?>
        </div>
    </div>
</div>
</body>
</html>

