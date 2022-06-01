<?php
session_start();
require 'constants.php';
error_reporting(0);

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);


if ($conn->connect_error) {
    die('Database error:' .$conn->connect_error);
}

//Declaration of Current School Terms
$res = $conn->query("SELECT * FROM school_term");
while($row = $res->fetch_assoc()){
    $current_term = $row['sch_term'];
    $current_session = $row['session'];
}   

$exam = $conn->query("SELECT * FROM exam_controller");
while($row = $exam->fetch_assoc()){
    $day = $row['day'];
    $term = $row['term'];
    $exam_order = $row['exam_order'];
}   

//School Details from the database
$res1 = $conn->query("SELECT * FROM school_details");
while($row = $res1->fetch_assoc()){
    $id = $row['id'];
    $sch_name = $row['sch_name'];
    $sch_name2 = $row['sch_name2'];
    $sch_phone = $row['sch_phone'];
    $sch_phone2 = $row['sch_phone2'];
    $sch_email = $row['sch_email'];
    $sch_facebook = $row['sch_facebook'];
    $sch_whatsapp = $row['sch_whatsapp'];
    $sch_twitter = $row['sch_twitter'];
    $sch_instagram = $row['sch_instagram'];
    $sch_address = $row['sch_address'];
    $sch_name_col = $row['sch_name_col'];
    $sch_name_col_2 = $row['sch_name_col_2'];
    $sch_name_font = $row['sch_name_font'];
    $sch_name_font_2 = $row['sch_name_font_2'];
}








$resu = $conn->query("SELECT * FROM header_footer");
while($row = $resu->fetch_assoc()){
    $header_col = $row['header_col'];
    $footer_col = $row['footer_col'];
    $header_txt_col = $row['header_txt_col'];
    $footer_txt_col = $row['footer_txt_col'];
   
}




//select school logo form database
$res8 = $conn->query("SELECT * FROM school_logo");
while($row = $res8->fetch_assoc()){
    $sch_logo = $row['image'];
    $logo_width = $row['logo_width'];
    $logo_height = $row['logo_height'];
}

//DECLARATION OF SCHOOL TERMS
$first_term = "First Term";
$second_term = "Second Term";
$third_term = "Third Term";

    //DECLARATION OF QUESTION AND ANSWER TABLES FOR EACH TERM
    if($current_term == "First Term"){
        $exam_tbl_A = "ft_exam_type_A";
        $exam_tbl_B = "ft_exam_type_B";
        $exam_tbl_C = "ft_exam_type_C";
        $answer_tbl_A = "ft_answer_type_A";
        $answer_tbl_B = "ft_answer_type_B";
        $answer_tbl_C = "ft_answer_type_C";
     }
     
     if($current_term == "Second Term"){
        $exam_tbl_A = "st_exam_type_A";
        $exam_tbl_B = "st_exam_type_B";
        $exam_tbl_C = "st_exam_type_C";
        $answer_tbl_A = "st_answer_type_A";
        $answer_tbl_B = "st_answer_type_B";
        $answer_tbl_C = "st_answer_type_C";
     }
     
     if($current_term == "Third Term"){
        $exam_tbl_A = "tt_exam_type_A";
        $exam_tbl_B = "tt_exam_type_B";
        $exam_tbl_C = "tt_exam_type_C";
        $answer_tbl_A = "tt_answer_type_A";
        $answer_tbl_B = "tt_answer_type_B";
        $answer_tbl_C = "tt_answer_type_C";
     }
     
     //EXAM TABLE
     if($current_term == "First Term"){
        $exam_table = "ft_exam_type_A";
        $answer_table = "ft_answer_type_A";
    }
    if($current_term == "Second Term"){
        $exam_table = "st_exam_type_A";
        $answer_table = "st_answer_type_A";
    }
    if($current_term == "Third Term"){
        $exam_table = "tt_exam_type_A";
        $answer_table = "tt_answer_type_A";
    }
  
//ANSWER SHEET
 if($current_term == $first_term){
    $answer_sheet = "ft_answer_sheet";
 }
 
 if($current_term == $second_term){
    $answer_sheet = "st_answer_sheet";
 }

 if($current_term == $third_term){
    $answer_sheet = "tt_answer_sheet";
 }
//TIME TABLE
 if($current_term == $first_term){
    $time_table = "subject_time_table";
 }
 
 if($current_term == $second_term){
    $time_table = "subject_time_table_2";
 }

 if($current_term == $third_term){
    $time_table = "subject_time_table_3";
 }
 
 
?>