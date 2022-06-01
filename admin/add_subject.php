<?php
require "../config/db.php";
error_reporting(0);
$teacher = "";$subject = "";$code = ""; $class="";
$errors = array(); $d_id = 0;//set hidden message defalt to 0
$update = false; 


if(isset($_POST['add'])){
    $teacher = mysqli_real_escape_string($conn,$_POST['teacher']);
    $subject = mysqli_real_escape_string($conn,$_POST['subject']);
    $course_code = mysqli_real_escape_string($conn,$_POST['course_code']);
    $course_unit = mysqli_real_escape_string($conn,$_POST['course_unit']);        
    $duration = mysqli_real_escape_string($conn,$_POST['duration']);        

    $term = substr($course_code,5,1);
    $cl = substr($course_code,3,1);

    //FOR SECONDARY SCHOOL
    if($cl == 1){$class = "JSS-1";}
    if($cl == 2){$class = "JSS-2";}
    if($cl == 3){$class = "JSS-3";}
    if($cl == 4){$class = "SSS-1";}
    if($cl == 5){$class = "SSS-2";}
    if($cl == 6){$class = "SSS-3";}
    
    $conn->query("INSERT INTO  subject_tbl (class, teacher, subject, course_code, term, course_unit, duration) 
    VALUES('$class', '$teacher', '$subject', '$course_code', '$term', '$course_unit', '$duration')") 
    or die($conn->error);

    $_SESSION['message'] = "$course_code has been Added!";
    $_SESSION['msg_type'] = "success";
    $_SESSION['remedy'] = "";
    $_SESSION['btn'] = "Ok";

    header("location: question-uploader");
}

