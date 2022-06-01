<?php
require "../../config/db.php";
$course_code = $_SESSION['course_code'];
$day_subject = $_SESSION['day_subject'];
$my_class = $_SESSION['class'];
$username = $_SESSION['username'];
$adm_no = $_SESSION['reference'];
//require "database.php";
//SET QUESTION NUMBER
$number = (int) $_GET['n'];

//GET QUESTIONS
$result = $conn->query("SELECT * FROM $exam_table WHERE question_number = $number AND
 course_code='$course_code' AND session='$current_session' AND class='$my_class'");
//GET RESULT
$question = $result->fetch_assoc();

//GET $answer_table
$choice = $conn->query("SELECT * FROM $answer_table WHERE question_number = $number AND
course_code='$course_code' AND session='$current_session' AND class='$my_class'");

$result_1 = $conn->query("SELECT * FROM $exam_table 
WHERE course_code='$course_code' AND session='$current_session' AND class='$my_class'");
//GET RESULT
$total_question = $result_1->num_rows;

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alpha Care Examination</title>
    <link rel="stylesheet" href="css/exam.css">
    <?php include "header.php";?>
    <?php include "exam_navbar.php";?>

    <div class="container" style="margin-top:100px; margin-bottom:100px; max-width:90%; color:#000;">
        <div class="header">
            <h1 class="text-center"><?php echo $sch_name; ?> CBT System.</h1>
            <div class="container" style="display:inline-flex; overflow-x:auto;"><br>
                <P><strong>Name: </strong><?php echo $_SESSION['surname'];?> 
                <?php echo $_SESSION['firstname'];?> <?php echo $_SESSION['middlename'];?></P>
                <P style="margin-left:10px;"><strong>USERNAME: </strong><?php echo $username;?></P>
                <P style="margin-left:10px;"><strong>CLASS: </strong><?php echo $_SESSION['class'];?></P>
                <P style="margin-left:10px;"><strong>SUBJECT: </strong><?php echo $day_subject;?></P>
            <hr><br><br>
            </div>
        </div>
            <div class="justify-content-center" style="margin:0 auto; ">
                    <div class="current">Question <?php echo $question['question_number'] ;?> of <?php echo $total_question;?></div>
                    <p class="question"><?php echo $question['text'];?></p>
           
        <form action="exam_pro.php" method="post">
           <ul>
                <?php while($row = $choice->fetch_assoc()):
                    $text = $row['text'];
                    ?>

                <li class="answer"><input type="radio" name="choice" value="<?php echo $row['id'];?>">
                 <?php echo $row['alpha_opt'];?>.. <?php echo $row['text'];?></li>
                <?php endwhile;?>
            </ul>
            <input type="submit" class="btn btn-primary" name="next" Value="Select">
            <input type="hidden" name="number" value="<?php echo $number; ?>">

<hr>
<div class="container" style="background:#87cefa; padding:10px; border-radius:15px; margin-top:20px;">
    <p style="margin-top: 10px;"><strong>Questions:</strong></p>
    <?php
        $quest_list = $conn->query("SELECT * FROM $exam_table 
        WHERE course_code='$course_code' AND session='$current_session' AND class='$my_class'");  
        while($row = $quest_list->fetch_assoc()):
            $quest = $row["question_number"]; 
    ?>
       
    <a class="question_nav" style="border-right:none; padding-right:15px;" href="questions.php?n=<?php echo $row['question_number'];?>">
    <?php  echo $row['question_number'];?></a>
       <div class="question_nav" style="border-left:none; margin-left:-8px;">
           <?php
       $alphabet = $conn->query("SELECT * FROM $answer_sheet WHERE username='$username'AND adm_no='$adm_no' AND course_code='$course_code'");  
        while($row = $alphabet->fetch_assoc()){
             echo $row["Qid$quest"];
        }
            ?> 
       </div>
       <?php endwhile;?><br>
       <div class="form-group" style="margin-top:20px;margin-left:90%;">
           <input type="submit" name="submit" class="btn btn-success" value="Submit">
       </div> 
    </div> 
</div>
       
</form>
    </div>
    </div>
    </div>
<?php include "footer.php"; ?>

  