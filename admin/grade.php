<?php
$cl = substr($course_code, 3, 1);
//FOR SECONDARY SCHOOL
if ($cl == 1) {
    $class = "JSS-1";
}
if ($cl == 2) {
    $class = "JSS-2";
}
if ($cl == 3) {
    $class = "JSS-3";
}
if ($cl == 4) {
    $class = "SSS-1";
}
if ($cl == 5) {
    $class = "SSS-2";
}
if ($cl == 6) {
    $class = "SSS-3";
}
//POSITION
if ($pos == 1) {
    $position = "1st";
}
if ($pos == 2) {
    $position = "2nd";
}
if ($pos == 3) {
    $position = "3rd";
}
if ($pos == 4) {
    $position = "4th";
}
if ($pos == 5) {
    $position = "5th";
}
if ($pos == 6) {
    $position = "6th";
}
if ($pos == 7) {
    $position = "7th";
}
if ($pos == 8) {
    $position = "8th";
}
if ($pos == 9) {
    $position = "9th";
}
if ($pos == 10) {
    $position = "10th";
}
if ($pos == 11) {
    $position = "11th";
}
if ($pos == 12) {
    $position = "12th";
}
if ($pos == 13) {
    $position = "13th";
}
if ($pos == 14) {
    $position = "14th";
}
if ($pos == 15) {
    $position = "15th";
}
if ($pos == 16) {
    $position = "16th";
}
if ($pos == 17) {
    $position = "17th";
}
if ($pos == 18) {
    $position = "18th";
}
if ($pos == 19) {
    $position = "19th";
}
if ($pos == 20) {
    $position = "20th";
}
if ($pos == 21) {
    $position = "21st";
}
if ($pos == 22) {
    $position = "22nd";
}
if ($pos == 23) {
    $position = "23rd";
}
if ($pos == 24) {
    $position = "24th";
}
if ($pos == 25) {
    $position = "25th";
}
if ($pos == 26) {
    $position = "26th";
}
if ($pos == 27) {
    $position = "27th";
}
if ($pos == 28) {
    $position = "28th";
}
if ($pos == 29) {
    $position = "29th";
}
if ($pos == 30) {
    $position = "30th";
}
if ($pos == 31) {
    $position = "31st";
}
if ($pos == 32) {
    $position = "32nd";
}
if ($pos == 33) {
    $position = "33rd";
}
if ($pos == 34) {
    $position = "34th";
}
if ($pos == 35) {
    $position = "35th";
}
if ($pos == 36) {
    $position = "36th";
}
if ($pos == 37) {
    $position = "37th";
}
if ($pos == 38) {
    $position = "38th";
}
if ($pos == 39) {
    $position = "39th";
}
if ($pos == 40) {
    $position = "40th";
}
if ($pos == 41) {
    $position = "41st";
}
if ($pos == 42) {
    $position = "42nd";
}
if ($pos == 43) {
    $position = "43rd";
}
if ($pos == 44) {
    $position = "44th";
}
if ($pos == 45) {
    $position = "45th";
}
if ($pos == 46) {
    $position = "46th";
}
if ($pos == 47) {
    $position = "47th";
}
if ($pos == 48) {
    $position = "48th";
}
if ($pos == 49) {
    $position = "49th";
}
if ($pos == 50) {
    $position = "50th";
}
if ($pos == 51) {
    $position = "51st";
}
if ($pos == 52) {
    $position = "52nd";
}
if ($pos == 53) {
    $position = "53rd";
}
if ($pos == 54) {
    $position = "54th";
}
if ($pos == 55) {
    $position = "55th";
}
if ($pos == 56) {
    $position = "56th";
}
if ($pos == 57) {
    $position = "57th";
}
if ($pos == 58) {
    $position = "58th";
}
if ($pos == 59) {
    $position = "59th";
}
if ($pos == 60) {
    $position = "60th";
}


$query = $conn->query("SELECT * FROM $answer_sheet WHERE adm_no= '$adm_no' AND course_code = '$course_code'");
while ($row = $query->fetch_assoc()) {
    $obj = $row['obj_score'];
}
//IF OBJECTIVE SCORE IS NOT EMPTY     
if ($obj != $objective) {
    $obj_score = $objective;
    //IF OBJECTIVE SCORE IS EMPTY THEN THE UPLOADED SCORE IS THE OBJECTIVE SCORE
} else {
    $obj_score = $obj;
}
// if ($obj != 0) {
//     $obj_score = $obj;
//     //IF OBJECTIVE SCORE IS EMPTY THEN THE UPLOADED SCORE IS THE OBJECTIVE SCORE
// } else {
//     $obj_score = $objective;
// }
$test = ($CA1 + $CA2 + $CA3);
$exam_output = ($obj_score + $essay_score);
$total = ($exam_output + $test);

// if ($total <= 39) {
//     $grade = "F9";
//     $remark = "Poor";
//     $color = "darkGreen";
// }

// if ($total == 40 || $total == 41 || $total == 42 || $total == 43 || $total == 43 || $total == 44) {
//     $grade = "D";
//     $remark = "Fair";
//     $color = "Red";
// }
// if ($total == 45 || $total == 46 || $total == 47 || $total == 48 || $total == 49) {
//     $grade = "C6";
//     $remark = "Fair";
//     $color = "Orange";
// }
// if ($total == 50 || $total == 51 || $total == 52 || $total == 53 || $total == 54 || $total == 55) {
//     $grade = "C4";
//     $remark = "Average";
//     $color = "Yellow";
// }
// if ($total == 56 || $total == 57 || $total == 58 || $total == 59 || $total == 60) {
//     $grade = "B3";
//     $remark = "Good";
//     $color = "Yellow";
// }
// if ($total == 61 || $total == 62 || $total == 63 || $total == 64) {
//     $grade = "B2";
//     $remark = "Good";
//     $color = "LightSeaGreen";
// }
// if ($total == 65 || $total == 66 || $total == 67 || $total == 68 || $total == 69) {
//     $grade = "B";
//     $remark = "Good";
//     $color = "LightSeaGreen";
// }
// if ($total == 70 || $total == 71 || $total == 72 || $total == 73 || $total == 74) {
//     $grade = "A";
//     $remark = "Good";
//     $color = "Lime";
// }
// if ($total == 75 || $total == 76 || $total == 77 || $total == 78 || $total == 79) {
//     $grade = "A";
//     $remark = "V.Good";
//     $color = "green";
//     $color = "LimeGreen";
// }
// if ($total >= 80) {
//     $grade = "A";
//     $remark = "Excellent";
//     $color = "darkGreen";
// }

if ($class == 'SSS-1' || $class == 'SSS-2' || $class == 'SSS-3') {
    if ($total <= 39) {
        $grade = "F9";
        $remark = "Poor";
        $color = "Red";
    } else if ($total == 40 || $total == 41 || $total == 42 || $total == 43 || $total == 43 || $total == 44) {
        $grade = "E8";
        $remark = "Fair";
        $color = "Red";
    } else if ($total == 45 || $total == 46 || $total == 47 || $total == 48 || $total == 49) {
        $grade = "D7";
        $remark = "Pass";
        $color = "Orange";
    } else if ($total == 50 || $total == 51 || $total == 52 || $total == 53 || $total == 54 || $total == 55 || $total == 56 || $total == 57 || $total == 58 || $total == 59) {
        $grade = "C6";
        $remark = "Credit";
        $color = "Yellow";
    } else if (
        $total == 60 || $total == 61 || $total == 62 || $total == 63 || $total == 64
    ) {
        $grade = "C5";
        $remark = "Credit";
        $color = "LightSeaGreen";
    } else if ($total == 65 || $total == 66 || $total == 67 || $total == 68 || $total == 69) {
        $grade = "C4";
        $remark = "Credit";
        $color = "LightSeaGreen";
    } else if ($total == 70 || $total == 71 || $total == 72 || $total == 73 || $total == 74) {
        $grade = "B3";
        $remark = "V.Good";
        $color = "Lime";
    } else if ($total == 75 || $total == 76 || $total == 77 || $total == 78 || $total == 79) {
        $grade = "B2";
        $remark = "Distinction";
        $color = "green";
        $color = "LimeGreen";
    } else if ($total >= 80) {
        $grade = "A";
        $remark = "Excellent";
        $color = "darkGreen";
    }
} else if (
    $class == 'JSS-1' || $class == 'JSS-2' || $class == 'JSS-3'
) {
    if ($total <= 39) {
        $grade = "E";
        $remark = "Poor";
        $color = "Red";
    } else if (
        $total == 40 || $total == 41 || $total == 42 || $total == 43 || $total == 43 || $total == 44 || $total == 45 || $total == 46 || $total == 47 || $total == 48 || $total == 49
    ) {
        $grade = "D";
        $remark = "Average";
        $color = "Orange";
    } else if ($total == 50 || $total == 51 || $total == 52 || $total == 53 || $total == 54 || $total == 55 || $total == 56 || $total == 57 || $total == 58 || $total == 59) {
        $grade = "C";
        $remark = "Good";
        $color = "Yellow";
    } else if (
        $total == 60 || $total == 61 || $total == 62 || $total == 63 || $total == 64 || $total == 65 || $total == 66 || $total == 67 || $total == 68 || $total == 69
    ) {
        $grade = "B";
        $remark = "V.Good";
        $color = "Green";
    } else if ($total >= 70) {
        $grade = "A";
        $remark = "Excellent";
        $color = "darkGreen";
    } else {
        $grade = "";
        $remark = "";
        $color = "";
    }
}
