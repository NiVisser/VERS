<?php

include '../db/db_config.php';

$members["member_1"] = array("Games", "Strips");
$members["member_2"] = array("Games", "Strips");
$members["member_3"] = array("Games", "Strips");
$members["member_4"] = array("Games", "Films");
$members["member_5"] = array("Kunst", "Strips");
$members["member_6"] = array("Kunst", "Strips");
$members["member_7"] = array("Kunst", "Strips");
$members["member_8"] = array("Kunst", "Films");


$member_list = array();
for ($i = 1; $i <= 5; $i++) {
    $test = "SELECT answer_id, user_id, answer FROM answers WHERE user_id='$i'";
    $result = mysqli_query($db, $test);

    while($row = $result->fetch_assoc()) {
        if (empty($member_list[$row["user_id"]])) {
            $member_list[$row["user_id"]] = array($row["answer"]);
        } else {
            array_push($member_list[$row["user_id"]], $row["answer"]);
        }
    }
}

print("<br/>");
print("<br/>");
print("<br/>");
print("<br/>");

print("<br/>");
print("<br/>");
print("<br/>");
print("<br/>");
print("<br/>");
print("<br/>");

print("<br/>");
print("<br/>");
print("<br/>");
print("<br/>");
print("<br/>");
print("<br/>");

print("<br/>");
print("<br/>");
print("<br/>");
print("<br/>");
print("<br/>");
print("<br/>");

print("<br/>");
print("<br/>");
print("<br/>");
print("<br/>");
print("<br/>");
print("<br/>");

//$i = 1;
//$test = "SELECT answer_id, user_id, answer FROM answers WHERE user_id='$i'";
//$result = mysqli_query($db, $test);
//$member_list = array();
//
//while($row = $result->fetch_assoc()) {
//    if ($member_list == array()) {
//        $member_list[$row["user_id"]] = array($row["answer"]);
//    } else {
//        array_push($member_list[$row["user_id"]], $row["answer"]);
//    }
//}
//    array_push($member_list, $row["answer"][1]);
//    array_push($member_list, $row["answer"]);
//    echo $row["user_id"] . " - " . $row["answer"] . "<br>";
//    array_push($member_list["user_id"], $row["answer"]);


print_r($member_list);
print("<br/>");
print_r($members);

//print_r($result);

function get_members($members) {
    $i = 1;
    foreach ($members as $value) {
        print("member " . $i . ": " . $value[0] . ", " . $value[1]);
        $i++;
        print("<br/>");
    }
}


function calculate_confidence($members, $event_type_one, $event_type_two) {
    $support_one_two = 0;
    $nr_of_event_one_types = 0;
    foreach ($members as $value) {
        if ($value[0] == $event_type_one or $value[1] == $event_type_one) {
            $nr_of_event_one_types += 1;
        }
        if ($value[0] == $event_type_one and $value[1] == $event_type_two or $value[0] == $event_type_two and $value[1] == $event_type_one) {
            $support_one_two += 1;
        }
    }
    return $support_one_two / $nr_of_event_one_types;
}


$confidence = calculate_confidence($members, "Games", "Strips");


function give_advice($members, $confidence, $event_type_one, $event_type_two) {
    $threshold = 0.6;
    foreach ($members as $value) {
        if ($confidence > $threshold) {
            if ($value[0] == $event_type_one or $value[1] == $event_type_one and $value[0] == $event_type_two or $value[1] == $event_type_two) {
                if ($value[0] != $event_type_two and $value[1] != $event_type_two)
                    return $event_type_two;
            }
        }
    }
}


give_advice($members, $confidence, "Games", "Strips");

