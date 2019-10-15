<?php
$members["member_1"] = array("Games", "Strips");
$members["member_2"] = array("Games", "Strips");
$members["member_3"] = array("Games", "Strips");
$members["member_4"] = array("Games", "Films");
$members["member_5"] = array("Kunst", "Strips");
$members["member_6"] = array("Kunst", "Strips");
$members["member_7"] = array("Kunst", "Strips");
$members["member_8"] = array("Kunst", "Films");

//print_r($members);
print("<br>");


// def calculate_support
$games = 0;
$kunst = 0;
$total = 0;
$strips = 0;
$event_type = 0;
//function calculate_support($members, $total, $games, $kunst, $strips) {
//    foreach ($members as $value) {
//        $total += 1;
//        if ($value[0] == "Games" or $value[1] == "Games") {
//            $games += 1;
//        }
//        if ($value[0] == "Kunst" or $value[1] == "Kunst") {
//            $kunst += 1;
//        }
//        if ($value[0] == "Strips" or $value[1] == "Strips") {
//            $strips += 1;
//        }
//    }
//}


function calculate_support($members, $event_type) {
    $total = 0;
    $nr_of_event_types = 0;
    foreach ($members as $value) {
        $total += 1;
        if ($value[0] == $event_type or $value[1] == $event_type) {
            $nr_of_event_types += 1;
        }
    }
    return $nr_of_event_types / $total;
}

calculate_support($members, "Games");

//calculate_support($members, $total, $games, $kunst, $strips);


//$support_games = $games / $total;
//$support_strips = $strips / $total;

//print("support: " . $support_games);
//print("<br>");
//print("support strips: " . $support_strips);

// def calculate_confidence
$support_games_strips = 0;
foreach ($members as $value) {
    $total += 1;
    if ($value[0] == "Games" and $value[1] == "Strips" or $value[0] == "Strips" and $value[1] == "Games") {
        $support_games_strips += 1;
    }
}

$support_games_strips_lift = $support_games_strips / $total;


//$confidence = $support_games_strips / $games;

//print($support_games_strips);
print("<br>");
print("confidence: " . $confidence);
print("<br>");


//$lift = $confidence / $support_strips;




//print("lift: " . $lift);


print("<br>");

foreach ($members as $value) {
    if ($confidence > 0.6) {
        if ($value[0] == "Games" or $value[1] == "Games" and $value[0] == "Strips" or $value[1] == "Strips") {
            if ($value[0] != "Strips" and $value[1] != "Strips")
                print("Go read a strip");
        }
    }
}

