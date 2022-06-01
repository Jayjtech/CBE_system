<?php
require "../../config/db.php";
error_reporting(0);
// $question_number = ""; $question_text = "";$choice4 = "";$choice1 = "";$choice5 = "";
// $correct_choice = ""; $choice2 = ""; $choice3 ="";  
// $errors = array(); $v_id = 0;//set hidden message defalt to 0
// $update = false; 

//$conn = mysqli_conn("localhost", "root", "9221", "merrylandschool");


    $question_number = mysqli_real_escape_string($conn,$_POST['question_number']);
    $question_text = mysqli_real_escape_string($conn,$_POST['question_text']);
    $correct_choice = mysqli_real_escape_string($conn,$_POST['correct_choice']);
    $correct_code = "1";
    $choice1 = $_POST['choice1'];
    $choice2 = $_POST['choice2'];
    $choice3 = $_POST['choice3'];
    $choice4 = $_POST['choice4'];
    $choice5 = $_POST['choice5'];
    $optA = $_POST['optA'];
    $optB = $_POST['optB'];
    $optC = $_POST['optC'];
    $optD = $_POST['optD'];
    $optE = $_POST['optE'];
    
    if($correct_choice == $choice){
        $is_correct = 1;
    }else{
        $is_correct = 0;
    }

    $query = $conn->query("INSERT INTO  exam_questions (question_number, text) 
    VALUES('$question_number', '$question_text')") 
    or die($conn->error);


if($query){
$answer_array = array(
    "0" => array("$question_number", "$optA", "$choice1"),
    "1" => array("$question_number", "$optB", "$choice2"),
    "2" => array("$question_number", "$optC", "$choice3"),
    "3" => array("$question_number", "$optD", "$choice4"),
    "4" => array("$question_number", "$optE", "$choice5")
);


function option1($array, $conn){
    if(is_array($array)){
        foreach($array as $row => $value){
            $quest = mysqli_real_escape_string($conn, $value[0]);
            $option = mysqli_real_escape_string($conn, $value[1]);
            $text = mysqli_real_escape_string($conn, $value[2]);
            $sql = "INSERT INTO choices(question_number, alpha_opt, text) VALUES ('$quest', '$option', '$text')";
            mysqli_query($conn, $sql);
        }
    }
}

option1($answer_array, $conn);
    } 
    $query2 = $conn->query("UPDATE choices SET is_correct = '$correct_code' WHERE question_number='$question_number' AND alpha_opt='$correct_choice'");

    $_SESSION['message'] = "Question has been added!";
    $_SESSION['msg_type'] = "success";//Message saved background
    header("location: add.php");


