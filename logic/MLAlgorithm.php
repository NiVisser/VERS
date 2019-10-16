<?php

include '../db/db_config.php';

//$members["member_1"] = array("Games", "Strips");
//$members["member_2"] = array("Games", "Strips");
//$members["member_3"] = array("Games", "Strips");
//$members["member_4"] = array("Games", "Films");
//$members["member_5"] = array("Kunst", "Strips");
//$members["member_6"] = array("Kunst", "Strips");
//$members["member_7"] = array("Kunst", "Strips");
//$members["member_8"] = array("Kunst", "Films");



$res = $db->query("SELECT COUNT(user_id) FROM users");
$user_row = $res->fetch_row();
$users = $user_row[0];


function members_events($db, $users) {
    $member_list = array();
    for ($i = 1; $i <= $users; $i++) {
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
    return $member_list;
}

$member_list = members_events($db, $users);


function get_members($member_list) {
    $i = 1;
    foreach ($member_list as $member) {
        print("Member " . $i . ": " . $member[0] . ", " . $member[1]);
        $i++;
        print("<br/>");
    }
}


function calculate_confidence($member_list, $event_type_one, $event_type_two) {
    $friends = 50;
    $support_one_two = 0;
    $nr_of_event_one_types = 0;
    foreach ($member_list as $value) {
        if ($value[0] == $event_type_one or $value[1] == $event_type_one) {
            $nr_of_event_one_types += 1;
        }
        if ($value[0] == $event_type_one and $value[1] == $event_type_two or $value[0] == $event_type_two and $value[1] == $event_type_one) {
            $support_one_two += 1;
        }
    }
    if ($friends < 50) {
        return $support_one_two / $nr_of_event_one_types;
    } else {
        return ($support_one_two / $nr_of_event_one_types) + 0.1;
    }
}


$confidence = calculate_confidence($member_list, "games", "strips");


function give_advice($member_list, $confidence, $event_type_one, $event_type_two) {
    $threshold = 0.8;
    foreach ($member_list as $value) {
        if ($confidence > $threshold) {
            if ($value[0] == $event_type_one or $value[1] == $event_type_one and $value[0] == $event_type_two or $value[1] == $event_type_two) {
                if ($value[0] != $event_type_two and $value[1] != $event_type_two)
                    return $event_type_two;
            }
        }
    }
}


give_advice($member_list, $confidence, "games", "strips");

