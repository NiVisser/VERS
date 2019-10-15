<?php
$members["member_1"] = array("Games", "Strips");
$members["member_2"] = array("Games", "Strips");
$members["member_3"] = array("Games", "Strips");
$members["member_4"] = array("Games", "Films");
$members["member_5"] = array("Kunst", "Strips");
$members["member_6"] = array("Kunst", "Strips");
$members["member_7"] = array("Kunst", "Strips");
$members["member_8"] = array("Kunst", "Films");


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
print("confidence: " . $confidence);
print("<br>");


function give_advice($members, $confidence, $event_type_one, $event_type_two) {
    $threshold = 0.6;
    foreach ($members as $value) {
        if ($confidence > $threshold) {
            if ($value[0] == $event_type_one or $value[1] == $event_type_one and $value[0] == $event_type_two or $value[1] == $event_type_two) {
                if ($value[0] != $event_type_two and $value[1] != $event_type_two)
                    print("Go read " . $event_type_two);
            }
        }
    }
}


give_advice($members, $confidence, "Games", "Strips");

