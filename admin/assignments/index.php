<?php
require "../../config/db.php";
$my_class = $_SESSION['class'];
$status = "UNDONE";
$username = $_SESSION['username'];
$adm_no = $_SESSION['reference'];
$day_subject ="";
//SELECT THE SUBJECT FOR THAT PARTICULAR DAY AND PERIOD
$subject = $conn->query("SELECT * FROM $time_table WHERE day='$day' AND exam_order='$exam_order' AND class='$my_class'");
while($row = $subject->fetch_assoc()){
    $day_subject = $row['subject'];   
    $course_code = $row['course_code'];   
}

$check = $conn->query("SELECT * FROM $answer_sheet WHERE username='$username'AND adm_no='$adm_no' AND course_code='$course_code'");
while($row = $check->fetch_assoc()){
    $my_status = $row['status'];      
}
//IF EXAM HAS ALREADY BEEN TAKEN AND SUBMITTED BEFORE
 if($my_status !== $status){
    $_SESSION['message'] = "Sorry, you have taken <strong>$day_subject</strong> before!";
    $_SESSION['msg_type'] = "danger";//Message saved background
     header("location:../../register_subject.php");
 }else{

$_SESSION['course_code'] = $course_code;
$_SESSION['day_subject'] = $day_subject;

//GET QUESTIONS
$result = $conn->query("SELECT * FROM $exam_table 
WHERE course_code='$course_code' AND session='$current_session' AND class='$my_class'");
//GET RESULT
$total_question = $result->num_rows;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam</title>
    <link rel="stylesheet" href="css/exam.css">
    <?php include "header.php";?>
    <?php include "assi_navbar.php";?>

    <div class="container" style="margin-top:100px; max-width:90%; color:#000; margin-bottom:100px;">
    <?php
    //To ensure that Thesame class is not uploaded over and again
    $classQuery = "SELECT * FROM $answer_sheet WHERE username=? AND adm_no=? AND class=? AND course_code=? LIMIT 1";
    $stmt = $conn->prepare($classQuery);
    $stmt->bind_param('ssss', $username, $adm_no, $my_class, $course_code);
    $stmt->execute();
    $result = $stmt->get_result();
    $Count = $result->num_rows;
    $stmt->close();
    if($Count == 0){
     echo "<div><p>You haven't registered for this subject, Click <a href='../../register_subject.php'>Here to register</a></p></div>";
    }else{
    ?>
     <div class="header">
        <h1 class="text-center"><?php echo $sch_name; ?></h1><br>
        <div class="container" style="display:inline-flex; overflow-x:auto;"><br>
                <P><strong>Name: </strong><?php echo $_SESSION['surname'];?> 
                <?php echo $_SESSION['firstname'];?> <?php echo $_SESSION['middlename'];?></P>
                <P style="margin-left:10px;"><strong>USERNAME: </strong><?php echo $username;?></P>
                <P style="margin-left:10px;"><strong>CLASS: </strong><?php echo $_SESSION['class'];?></P>
                <P style="margin-left:10px;"><strong>SUBJECT: </strong><?php echo $day_subject;?></P>
        <div id="profilePic">
             <img class="avatar" src="../../<?php echo $_SESSION["p_image"];?>">
        </div> 
        <hr><br><br>
            </div>
    </div>
        
            <div class="justify-content-center" style="margin:0 auto;">
            <?php 
            if($total_question == 0){
                echo "<div class='container'><p>You have No Exam for this period</p></div>";
            }else{
            ?>
                    <p>This is a Multiple Choice Examination to test your Knowledge</p>
            <ul>
                <li><strong>Number of Questions:</strong> <?php echo $total_question ;?></li>
                <li><strong>Type:</strong> Multiple Choice</li>
                <li><strong>Estimated Time</strong> <?php echo $total_question * .5 ;?> minutes</li>
            </ul>
            <a href="questions.php?n=1" class="start btn btn-success">Start Exam</a>
            </div> 
            <?php }
            }
        }?>
    </div>
   