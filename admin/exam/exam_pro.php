<?php
require "../../config/db.php";
$option = "";
$course_code = $_SESSION['course_code'];
$day_subject = $_SESSION['day_subject'];
$my_class = $_SESSION['class'];
$username = $_SESSION['username'];
$adm_no = $_SESSION['adm_no'];
$answer_tbl = $_SESSION['answer_tbl'];
$exam_quest = $_SESSION['exam_quest'];
//SET TOTAL NUMBER OF QUESTION
$res = $conn->query("SELECT * FROM $exam_table 
WHERE course_code = '$course_code' AND session='$current_session' AND class='$my_class'");
//GET NUMBER OF ROWS
$total_question = $res->num_rows;


if(isset($_POST['next'])){
   $number = mysqli_real_escape_string($conn,$_POST['number']);
   $id = mysqli_real_escape_string($conn,$_POST['choice']);
   $next = $number+1;
    $username = $_SESSION['username'];
    $adm_no = $_SESSION['adm_no'];

    $solution = $conn->query("SELECT * FROM $answer_tbl WHERE id = '$id' AND course_code='$course_code' AND class='$my_class'");
    while($row = $solution->fetch_assoc()){
        $ans = $row['alpha_opt'];
        $selected_choice = $row['is_correct'];
    }
    
    $query1 = $conn->query("SELECT * FROM $answer_sheet WHERE 
    username='$username' AND adm_no='$adm_no' AND course_code = '$course_code'");
    while($row = $query1->fetch_assoc()){
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
   $query2 = $conn->query("UPDATE $answer_sheet SET obj_score ='$total_score', Q$number='$selected_choice', Qid$number='$ans' 
   WHERE username='$username' AND adm_no='$adm_no' AND course_code = '$course_code'") 
    or die($conn->error);
  
    //SUBTRACT TIME ALREADY USED AND UPDATE DURATION ON DATABASE
    $diff_in_seconds = $_SESSION['diff_in_seconds']; 
    $tm_remaining = $diff_in_seconds/60;
    if($tm_remaining > 1){
    $tm_rem = $conn->query("UPDATE $answer_sheet SET duration = '$tm_remaining' WHERE class ='$my_class' 
    AND adm_no = '$adm_no' AND course_code='$course_code'");
    }
}

//CHECK
if($number == $total_question){
    header("location: questions.php?n=$total_question");
    exit();
}else{
    header("location: questions.php?n=$next");
}

if(isset($_POST['submit'])){
    $status = "DONE";
    $query1 = $conn->query("SELECT * FROM $answer_sheet WHERE 
    username='$username' AND adm_no='$adm_no' AND course_code = '$course_code'");
    while($row = $query1->fetch_assoc()){
        //CALCULATING TOTAL SCORE AFTER CLICKING THE SUBMIT BUTTON
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
   $query2 = $conn->query("UPDATE $answer_sheet SET obj_score='$total_score', status='$status' 
   WHERE username='$username' AND adm_no='$adm_no' AND course_code = '$course_code'") 
    or die($conn->error);
    header("location: ../../register_subject.php");

    }

    //IF EXAM TIME HAS BEEN UPDATED TO ZERO(0) ON THE DATABASE
    $query = $conn->query("SELECT * FROM $answer_sheet WHERE class='$my_class'
     AND course_code='$course_code' AND adm_no='$adm_no'");
    while ($row = $query->fetch_assoc()) {
    $duration = $row['duration'];
    }

?>