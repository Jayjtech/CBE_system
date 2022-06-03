<?php
require "../config/db.php";
$user_token = $_SESSION['token'];

if(isset($_POST['update_question'])){
    // IDs
    $quest_code = $_POST['quest_code'];
    $course_code = $_POST['course_code'];
    $quest_img = $_POST['quest_img'];

    //SESSION 
    $_SESSION['course_code'] = $course_code;

    // IMAGE FILE
    $img_name = $_FILES['quest_img']['name'];
    $img_size = $_FILES['quest_img']['size'];
    $img_tmp = $_FILES['quest_img']['tmp_name'];

    //  QUESTION
    $question_text = mysqli_real_escape_string($conn, $_POST['displayQ']);
    
    // ANSWER
    if(empty($_FILES['quest_img']['name'])){
        $target_dir = '';
        }else{
            $allowed_etx = array('png','jpg', 'jpeg', 'gif');
            //Get file extension 
            $file_ext = explode('.', $img_name);
            $file_ext = strtolower(end($file_ext));
            //CHECK IMAGE EXT
            if(in_array($file_ext, $allowed_etx)){
                // IMAGE DIRECTORY
                $target_dir = "q_images/${img_name}";
            }
        }
    
    if($img_size <= 1000000){
    // IF NO IMG IS UPLOADED, SET IT BACK TO THE PREVIOUS IMAGE
            if($target_dir == ""){
                $target_dir = $quest_img;
            }else{
                move_uploaded_file($img_tmp, 'exam/'.$target_dir);
            }
        // UPDATE QUESTION TEXT AND IMAGE
            $conn->query("UPDATE $exam_tbl_A SET quest_img='$target_dir', text='$question_text' WHERE quest_code='$quest_code' AND user_token='$user_token'") or die($conn->error);
            $conn->query("UPDATE $exam_tbl_B SET quest_img='$target_dir', text='$question_text' WHERE quest_code='$quest_code' AND user_token='$user_token'") or die($conn->error);
            $conn->query("UPDATE $exam_tbl_C SET quest_img='$target_dir', text='$question_text' WHERE quest_code='$quest_code' AND user_token='$user_token'") or die($conn->error);
            
    // UPDATE ANSWERS
    foreach($_POST['answer'] as $key => $value){
        $answer = $_POST['answer'][$key];
        $alpha_opt = $_POST['option'][$key];

        $conn->query("UPDATE $answer_tbl_A SET text='$answer' WHERE quest_code='$quest_code'
        AND course_code='$course_code' AND alpha_opt='$alpha_opt' AND user_token='$user_token'") or die($conn->error);

        $conn->query("UPDATE $answer_tbl_B SET text='$answer' WHERE quest_code='$quest_code'
        AND course_code='$course_code' AND alpha_opt='$alpha_opt' AND user_token='$user_token'") or die($conn->error);

        $conn->query("UPDATE $answer_tbl_C SET text='$answer' WHERE quest_code='$quest_code'
        AND course_code='$course_code' AND alpha_opt='$alpha_opt' AND user_token='$user_token'") or die($conn->error);
    }
    
    $_SESSION['message'] = "Question has been updated!";
    $_SESSION['msg_type'] = "success";//Message delete background
    $_SESSION['btn'] = "Ok";//Message delete background
    header('location: edit_quest_single');
    }else{
        $_SESSION['message'] = "Image size too large, no change has been made!";
        $_SESSION['msg_type'] = "error";//Message delete background
        $_SESSION['btn'] = "Ok";//Message delete background
        header("location: edit_quest_single");
    }
}
    

if(isset($_GET['delete']))
{
    $course_code = $_GET['delete'];
    $conn->query("DELETE FROM $exam_tbl_A WHERE course_code='$course_code'");
    $conn->query("DELETE FROM $exam_tbl_B WHERE course_code='$course_code'");
    $conn->query("DELETE FROM $exam_tbl_C WHERE course_code='$course_code'");
    $conn->query("DELETE FROM $answer_tbl_A WHERE course_code='$course_code'");
    $conn->query("DELETE FROM $answer_tbl_B WHERE course_code='$course_code'");
    $conn->query("DELETE FROM $answer_tbl_C WHERE course_code='$course_code'");
    
    $_SESSION['message'] = "Questions has been deleted!";
    $_SESSION['msg_type'] = "error";//Message delete background
    $_SESSION['btn'] = "Ok";//Message delete background

    header("location: search.php");
}

