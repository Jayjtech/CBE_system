<?php
require "../config/db.php";
error_reporting(0);
$course_code = ""; $text = "";$ans_text = ""; $alpha_opt = "";
$errors = array(); $Q_id = 0;//set hidden message default to 0
$update = false; 

$course_code = $_SESSION['course_code'];

        if(isset($_POST['upload_quest_img']))
		{
            $quest_code = $_POST['quest_code'];
            $img_name = $_FILES['quest_img']['name'];
            $img_size = $_FILES['quest_img']['size'];
            $img_tmp = $_FILES['quest_img']['tmp_name'];
            
            $directory = 'question_images/';
            $target_file = $directory.$img_name;
        
            move_uploaded_file($img_tmp,$target_file);
            $conn->query("UPDATE $exam_tbl_A SET quest_img='$target_file' WHERE quest_code='$quest_code'") or die($conn->error);
            $conn->query("UPDATE $exam_tbl_B SET quest_img='$target_file' WHERE quest_code='$quest_code'") or die($conn->error);
            $conn->query("UPDATE $exam_tbl_C SET quest_img='$target_file' WHERE quest_code='$quest_code'") or die($conn->error);
			
            $_SESSION['message'] = "Question Image has been uploaded!";
            $_SESSION['msg_type'] = "success";//Message Published background
        
            header("location: edit_question.php");
        }


if(isset($_GET['delete']))
{
    $course_code = $_GET['delete'];
    $conn->query("DELETE FROM $exam_tbl_A WHERE course_code='$course_code'") or die($conn->error());
    $conn->query("DELETE FROM $exam_tbl_B WHERE course_code='$course_code'") or die($conn->error());
    $conn->query("DELETE FROM $exam_tbl_C WHERE course_code='$course_code'") or die($conn->error());
    $conn->query("DELETE FROM $answer_tbl_A WHERE course_code='$course_code'") or die($conn->error());
    $conn->query("DELETE FROM $answer_tbl_B WHERE course_code='$course_code'") or die($conn->error());
    $conn->query("DELETE FROM $answer_tbl_C WHERE course_code='$course_code'") or die($conn->error());
    
    $_SESSION['message'] = "Questions has been deleted!";
    $_SESSION['msg_type'] = "danger";//Message delete background

    header("location: search.php");
}

if(isset($_POST['update_question'])){
    $teacher = $_SESSION['name'];
    $alpha_opt = mysqli_real_escape_string($conn, $_POST['alpha_opt']);
    $quest_code = mysqli_real_escape_string($conn, $_POST['quest_code']);
    $course_code = mysqli_real_escape_string($conn, $_POST['course_code']);
    $question_text = mysqli_real_escape_string($conn, $_POST['displayQ']);
    $ans_textA = mysqli_real_escape_string($conn, $_POST['displayA']);
    $ans_textB = mysqli_real_escape_string($conn, $_POST['displayB']);
    $ans_textC = mysqli_real_escape_string($conn, $_POST['displayC']);
    $ans_textD = mysqli_real_escape_string($conn, $_POST['displayD']);
    $ans_textE = mysqli_real_escape_string($conn, $_POST['displayE']);
    $_SESSION['quest_code'] = $quest_code;
    $_SESSION['course_code'] = $course_code;
    if($question_text){
        $conn->query("UPDATE $exam_tbl_A SET text='$question_text' WHERE quest_code='$quest_code'
        AND course_code='$course_code' AND teacher='$teacher'") or die($conn->error);

        $conn->query("UPDATE $exam_tbl_B SET text='$question_text' WHERE quest_code='$quest_code'
        AND course_code='$course_code' AND teacher='$teacher'") or die($conn->error);

        $conn->query("UPDATE $exam_tbl_C SET text='$question_text' WHERE quest_code='$quest_code'
        AND course_code='$course_code' AND teacher='$teacher'") or die($conn->error);
    }

    if($ans_textA){
        $conn->query("UPDATE $answer_tbl_A SET text='$ans_textA' WHERE quest_code='$quest_code'
        AND course_code='$course_code' AND teacher='$teacher' AND alpha_opt='$alpha_opt'") or die($conn->error);

        $conn->query("UPDATE $answer_tbl_B SET text='$ans_textA' WHERE quest_code='$quest_code'
        AND course_code='$course_code' AND teacher='$teacher' AND alpha_opt='$alpha_opt'") or die($conn->error);

        $conn->query("UPDATE $answer_tbl_C SET text='$ans_textA' WHERE quest_code='$quest_code'
        AND course_code='$course_code' AND teacher='$teacher' AND alpha_opt='$alpha_opt'") or die($conn->error);

    }

    if($ans_textB){
        $conn->query("UPDATE $answer_tbl_A SET text='$ans_textB' WHERE quest_code='$quest_code'
        AND course_code='$course_code' AND teacher='$teacher' AND alpha_opt='$alpha_opt'") or die($conn->error);

        $conn->query("UPDATE $answer_tbl_B SET text='$ans_textB' WHERE quest_code='$quest_code'
        AND course_code='$course_code' AND teacher='$teacher' AND alpha_opt='$alpha_opt'") or die($conn->error);

        $conn->query("UPDATE $answer_tbl_C SET text='$ans_textB' WHERE quest_code='$quest_code'
        AND course_code='$course_code' AND teacher='$teacher' AND alpha_opt='$alpha_opt'") or die($conn->error);

    }

    if($ans_textC){
        $conn->query("UPDATE $answer_tbl_A SET text='$ans_textC' WHERE quest_code='$quest_code'
        AND course_code='$course_code' AND teacher='$teacher' AND alpha_opt='$alpha_opt'") or die($conn->error);

        $conn->query("UPDATE $answer_tbl_B SET text='$ans_textC' WHERE quest_code='$quest_code'
        AND course_code='$course_code' AND teacher='$teacher' AND alpha_opt='$alpha_opt'") or die($conn->error);

        $conn->query("UPDATE $answer_tbl_C SET text='$ans_textC' WHERE quest_code='$quest_code'
        AND course_code='$course_code' AND teacher='$teacher' AND alpha_opt='$alpha_opt'") or die($conn->error);

    }

    if($ans_textD){
        $conn->query("UPDATE $answer_tbl_A SET text='$ans_textD' WHERE quest_code='$quest_code'
        AND course_code='$course_code' AND teacher='$teacher' AND alpha_opt='$alpha_opt'") or die($conn->error);

        $conn->query("UPDATE $answer_tbl_B SET text='$ans_textD' WHERE quest_code='$quest_code'
        AND course_code='$course_code' AND teacher='$teacher' AND alpha_opt='$alpha_opt'") or die($conn->error);

        $conn->query("UPDATE $answer_tbl_C SET text='$ans_textD' WHERE quest_code='$quest_code'
        AND course_code='$course_code' AND teacher='$teacher' AND alpha_opt='$alpha_opt'") or die($conn->error);

    }

    if($ans_textE){
        $conn->query("UPDATE $answer_tbl_A SET text='$ans_textE' WHERE quest_code='$quest_code'
        AND course_code='$course_code' AND teacher='$teacher' AND alpha_opt='$alpha_opt'") or die($conn->error);

        $conn->query("UPDATE $answer_tbl_B SET text='$ans_textE' WHERE quest_code='$quest_code'
        AND course_code='$course_code' AND teacher='$teacher' AND alpha_opt='$alpha_opt'") or die($conn->error);

        $conn->query("UPDATE $answer_tbl_C SET text='$ans_textE' WHERE quest_code='$quest_code'
        AND course_code='$course_code' AND teacher='$teacher' AND alpha_opt='$alpha_opt'") or die($conn->error);

   
    }
$_SESSION['message'] = "<strong><em>Update was successful!</em></strong>";
$_SESSION['msg_type'] = "success";
header("location:edit_quest_single.php");
}