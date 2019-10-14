<?php
//$events = array("Games" => array("Strips", "Strips", "Strips",
//    "Films", "Films", "Kunst"));
//
//$the_values = array_count_values($events["Games"]);
//$all_values = count($events["Games"]);
//
//
//// freq of strips
//$strips = $the_values["Strips"];
//
//// support of strips
//$support = $strips / $all_values;
//
//
//// freq of films
//$films = $the_values["Films"];
//
//$confidence = $films / $strips;
//
//
//print_r($the_values["Strips"]);
//print("<br>");
//print_r($all_values);
//print("<br>");
//print_r($support);
//print("<br>");
//
//print_r($confidence);

//$member_1 = array("Games", "Strips");
//$member_2 = array("Games", "Strips");
//$member_3 = array("Games", "Strips");
//$member_4 = array("Games", "Films");
//$member_5 = array("Kunst", "Strips");
//$member_6 = array("Kunst", "Strips");
//$member_7 = array("Kunst", "Strips");
//$member_8 = array("Kunst", "Films");
//
//$members = array_merge($member_1, $member_2, $member_3);
//
//print_r($members);

//$members = array("member_1" => array("Games", "Strips"));

$members["member_1"] = array("Games", "Strips");
$members["member_2"] = array("Games", "Strips");
$members["member_3"] = array("Games", "Strips");
$members["member_4"] = array("Games", "Films");
$members["member_5"] = array("Kunst", "Strips");
$members["member_6"] = array("Kunst", "Strips");
$members["member_7"] = array("Kunst", "Strips");
$members["member_8"] = array("Kunst", "Films");

print_r($members);
print("<br>");



// def calculate_support
$games = 0;
$kunst = 0;
$total = 0;
$strips = 0;
foreach ($members as $value) {
    $total += 1;
    if ($value[0] == "Games" or $value[1] == "Games") {
        $games += 1;
    }
    if ($value[0] == "Kunst" or $value[1] == "Kunst") {
        $kunst += 1;
    }
    if ($value[0] == "Strips" or $value[1] == "Strips") {
        $strips += 1;
    }
}

$support_games = $games / $total;
$support_strips = $strips / $total;

print("support: " . $support_games);
print("<br>");
print("support strips: " . $support_strips);

// def calculate_confidence
$support_games_strips = 0;
foreach ($members as $value) {
    $total += 1;
    if ($value[0] == "Games" and $value[1] == "Strips" or $value[0] == "Strips" and $value[1] == "Games") {
        $support_games_strips += 1;
    }
}

$support_games_strips_lift = $support_games_strips / $total;


$confidence = $support_games_strips / $games;

print($support_games_strips);
print("<br>");
print("confidence: " . $confidence);
print("<br>");


$lift = $confidence / $support_strips;








//print($games);
//print("<br>");
//print($strips);
//print("<br>");
print("lift: " . $lift);
//print("<br>");
//print($support_games * $support_strips);
//print("<br>");
//print($support_games_strips_lift);

print("<br>");

foreach ($members as $value) {
    if ($confidence > 0.6) {
        if ($value[0] == "Games" or $value[1] == "Games" and $value[0] == "Strips" or $value[1] == "Strips") {
            if ($value[0] != "Strips" and $value[1] != "Strips")
                print("Go read a strip");
        }
    }
}




//$members["member_3"];
//$members["member_4"];
//$members["member_5"];
//$members["member_6"];
//$members["member_7"];
//$members["member_8"];





//class MLAlgorithm {
//    private $freq = array();
//    private $data = array();
//
//    private $threshold = 2;
//    private $lift = 1;
//    private $confidence = 0;
//}
//$events_2 = array("Games" => "Movies");



