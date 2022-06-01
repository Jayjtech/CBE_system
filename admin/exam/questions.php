<?php
require "../../config/db.php";
$course_code = $_SESSION['course_code'];
$day_subject = $_SESSION['day_subject'];
$my_class = $_SESSION['class'];
$username = $_SESSION['username'];
$adm_no = $_SESSION['adm_no'];
$_SESSION['page'] = "question_page";

$end_time = $end_time = date('Y-m-d H:i:s', 
strtotime('+'.$_SESSION['duration'].'minutes', strtotime($_SESSION['start_time'])));

$_SESSION['end_time'] = $end_time;
//SET QUESTION NUMBER
$number = (int) $_GET['n'];

$paper_type = $_SESSION['paper_type'];

if($paper_type == "Type A"){
    $exam_quest = $exam_tbl_A;
    $answer_tbl = $answer_tbl_A;
}
if($paper_type == "Type B"){
    $exam_quest = $exam_tbl_B;
    $answer_tbl = $answer_tbl_B;
}
if($paper_type == "Type C"){
    $exam_quest = $exam_tbl_C;
    $answer_tbl = $answer_tbl_C;
}
$_SESSION['answer_tbl'] = $answer_tbl;
$_SESSION['exam_quest'] = $exam_quest;
//GET QUESTIONS
$result = $conn->query("SELECT * FROM $exam_quest WHERE question_number = $number AND
 course_code='$course_code' AND session='$current_session' AND class='$my_class'");
//GET RESULT
$question = $result->fetch_assoc();

//GET $answer_tbl
$choice = $conn->query("SELECT * FROM $answer_tbl WHERE question_number = $number AND
course_code='$course_code' AND session='$current_session' AND class='$my_class'");

$result_1 = $conn->query("SELECT * FROM $exam_quest 
WHERE course_code='$course_code' AND session='$current_session' AND class='$my_class'");
//GET RESULT
$total_question = $result_1->num_rows;

$query = $conn->query("SELECT * FROM $answer_sheet where class='$my_class' AND course_code='$course_code'");
while ($row = $query->fetch_assoc()) {
    $duration = $row['duration'];
}
if($duration == 0){
    header("location:index.php");
}

?>

<script>
setInterval(function(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET","response.php",false);
    xmlhttp.send(null);
    document.getElementById("response").innerHTML = xmlhttp.responseText;
},1000);
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $sch_name; ?></title>
    <link rel="stylesheet" href="css/exam.css">
    <?php include "header.php";?>
    <?php include "exam_navbar.php";?>

    <div class="container ftco-animate" style="margin-top:5px; background:grey;padding:50px;border-radius:15px;
     margin-bottom:100px; max-width:90%; color:#000;">
   
        <div class="header">
            <h1 class="text-center"><?php echo $sch_name; ?> CBT System.</h1>
            <div class="container" style="display:inline-flex; overflow-x:auto;"><br>
            <P><strong>Name: </strong><?php echo $_SESSION['fullname'];?></P>
                <P style="margin-left:10px;"><strong>Class: </strong><?php echo $_SESSION['class'];?></P>
                <P style="margin-left:10px;"><strong>Admission Number: </strong><?php echo $_SESSION['adm_no'];?></P>
                <P style="margin-left:10px;"><strong>Subject: </strong><?php echo $day_subject;?>::<?php echo $course_code;?></P>

            <hr><br><br>
            </div>
        </div>
            

<div class="row">
            <div class="col-lg-8" style="background-color:rgba(225,225,225,0.7);border-radius:15px;
            box-shadow:grey 1px 3px 3px 1px;padding:10px;border-radius:15px;">
                
            <div class="current">Question <?php echo $question['question_number'] ;?>
                         of <?php echo $total_question;?> <span style="margin-left:30%;" id="response"></span></div>
                         
               <?php 
                    $quest_img = $conn->query("SELECT quest_img FROM $exam_quest WHERE question_number='$number'");
                    $countImg = $quest_img->num_rows;
                    while($row = $quest_img->fetch_assoc()){
                        $question_img = $row['quest_img'];
                    }
                    if($question_img !== ""){
                        ?>
                        <div class="row">
                        <div class="container col-lg-6">
                        <?php echo $question['question_number'] ;?>.
                        <P><?php echo $question['text'];?></p>
                        <img src="<?php echo $question_img;?>" style="<?php if($question['text'] !== ""){echo "width:90%;height:30%;";}else{echo "width:100%;height:50%;";}?>">
                        </div>
                        <?php
                    }else{
               ?>
                    <p class="question"><?php echo $question['question_number'] ;?>. <?php echo $question['text'];?></p>
           
                <?php 
                }
                ?>

        <form action="exam_pro.php" method="post" class="<?php if($question_img !== ""){echo "col-lg-6 mt-5";}?>">
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
        </div>
        <?php if($question_img !== ""){echo "</div>";}?>
<hr>
<div class="col-lg-4">
<div class="container" style="background-color:rgba(225,225,225,0.7);border-radius:15px;box-shadow:grey 1px 3px 3px 1px; padding:10px; border-radius:15px;">
    <p style="margin-top: 10px;"><strong>Questions:</strong></p>
    <?php
        //LIST OF QUESTION NUMBER ACORDINGLY
        $quest_list = $conn->query("SELECT * FROM $exam_quest 
        WHERE course_code='$course_code' AND session='$current_session' AND class='$my_class' ORDER BY question_number ASC");  
        while($row = $quest_list->fetch_assoc()):
            $quest = $row["question_number"]; 
    ?>
       
    <a class="question_nav" style="border-right:none; padding-right:15px;" href="questions.php?n=<?php echo $row['question_number'];?>">
    <?php  echo $row['question_number'];?></a>
       <div class="question_nav" style="border-left:none; margin-left:-8px;">
           <?php
           //LIST OPTIONS CHOSEN DURING EXAM FOR EACH QUESTION 
       $alphabet = $conn->query("SELECT * FROM $answer_sheet WHERE username='$username'AND adm_no='$adm_no' AND course_code='$course_code'");  
        while($row = $alphabet->fetch_assoc()){
             echo $row["Qid$quest"];
        }
            ?> 
       </div>
       <?php endwhile;?><br>
       <div class="form-group" style="margin-top:20px;margin-left:70%;">
           <input type="submit" name="submit" class="btn btn-success" value="Submit">
       </div> 
    </div> 
    </div> 
</div>
</div>
       
</form>
    </div>
    </div>
    </div>
<?php include "footer.php"; ?>

  