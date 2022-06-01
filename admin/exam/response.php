<?php
require "../../config/db.php";
$course_code = $_SESSION['course_code'];
$day_subject = $_SESSION['day_subject'];
$my_class = $_SESSION['class'];
$username = $_SESSION['username'];


$my_class = $_SESSION['class'];
$adm_no = $_SESSION['adm_no'];
$from_time1 = date('Y-m-d H:i:s');
$to_time1 = $_SESSION["end_time"];

$timefirst = strtotime($from_time1);
$timesecond = strtotime($to_time1);

$diff_in_seconds = $timesecond-$timefirst;
$btn ="";
//Background colors for Exam time
$duration = $_SESSION['duration'];
$_SESSION['diff_in_seconds'] = $diff_in_seconds;

if($diff_in_seconds >= round(20/100*($duration*60))){
    $btn = "btn btn-success";
}

if($diff_in_seconds <= round(20/100*($duration*60))){
    $btn = "btn btn-danger";
}
if($diff_in_seconds > 0){ 
echo "<span>Remaining Time: </span><div style='font-size:25px;' class='$btn'>".gmdate("H:i:s", $diff_in_seconds)."</div>";
}


if($diff_in_seconds <= 0){ 
    $status = "DONE";
    $query1 = $conn->query("SELECT * FROM $answer_sheet WHERE 
    username='$username' AND adm_no='$adm_no' AND course_code='$course_code'");
    while($row = $query1->fetch_assoc()){
        //CALCULATING TOTAL SCORE AFTER CHECKING IF DURATION HAS BEEN UPDATED TO ZERO
        $score =($row['Q1']+$row['Q2']+$row['Q3']+$row['Q4']+$row['Q5']+$row['Q6']+$row['Q7']+$row['Q8']+$row['Q9']+$row['Q10']+
        $row['Q11']+$row['Q12']+$row['Q13']+$row['Q14']+$row['Q15']+$row['Q16']+$row['Q17']+$row['Q18']+$row['Q19']+$row['Q20']+
        $row['Q21']+$row['Q22']+$row['Q23']+$row['Q24']+$row['Q25']+$row['Q26']+$row['Q27']+$row['Q28']+$row['Q29']+$row['Q30']+
        $row['Q31']+$row['Q32']+$row['Q33']+$row['Q34']+$row['Q35']+$row['Q36']+$row['Q37']+$row['Q38']+$row['Q39']+$row['Q40']+
        $row['Q41']+$row['Q42']+$row['Q43']+$row['Q44']+$row['Q45']+$row['Q46']+$row['Q47']+$row['Q48']+$row['Q49']+$row['Q50']+
        $row['Q51']+$row['Q52']+$row['Q53']+$row['Q54']+$row['Q55']+$row['Q56']+$row['Q57']+$row['Q58']+$row['Q59']+$row['Q60']+
        $row['Q61']+$row['Q62']+$row['Q63']+$row['Q64']+$row['Q65']+$row['Q66']+$row['Q67']+$row['Q68']+$row['Q69']+$row['Q70']+
        $row['Q71']+$row['Q72']+$row['Q73']+$row['Q74']+$row['Q75']+$row['Q76']+$row['Q77']+$row['Q78']+$row['Q79']+$row['Q80']+
        $row['Q81']+$row['Q82']+$row['Q83']+$row['Q84']+$row['Q85']+$row['Q86']+$row['Q87']+$row['Q88']+$row['Q89']+$row['Q90']+
        $row['Q91']+$row['Q92']+$row['Q93']+$row['Q94']+$row['Q95']+$row['Q96']+$row['Q97']+$row['Q98']+$row['Q99']+$row['Q100']
    );
    }
    $unit = $conn->query("SELECT * FROM subject_tbl WHERE course_code = '$course_code'");
    while($row = $unit->fetch_assoc()){
        $course_unit = $row['course_unit'];
    }
    $total_score = ($score*$course_unit);
   $query2 = $conn->query("UPDATE $answer_sheet SET duration = 0, obj_score='$total_score', status='$status' 
   WHERE username='$username' AND class ='$my_class' AND adm_no='$adm_no'") 
    or die($conn->error);
    echo "<div class='$btn'>Exam time is over and your answers have been submitted!</div>";
   }
?>