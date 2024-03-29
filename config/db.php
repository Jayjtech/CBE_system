<?php
include 'constants.php';

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS);

$query = "CREATE DATABASE IF NOT EXISTS " . DB_NAME . "";

$run = mysqli_query($conn, $query);

if ($run) {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
}

include ".php";

//Declaration of Current School Terms
$res = $conn->query("SELECT * FROM school_term");
while ($row = $res->fetch_assoc()) {
    $current_term = $row['sch_term'];
    $current_session = $row['session'];
}

$exam = $conn->query("SELECT * FROM exam_controller");
while ($row = $exam->fetch_assoc()) {
    $exam_day = $row['day'];
    $term = $row['term'];
    $exam_order = $row['exam_order'];
}

//School Details from the database
$res1 = $conn->query("SELECT * FROM school_details");
while ($row = $res1->fetch_assoc()) {
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
    $header_txt_col = $row['header_txt_col'];
    $header_col = $row['header_col'];
    $sch_logo = $row['sch_logo'];
}


//DECLARATION OF SCHOOL TERMS
$first_term = "First Term";
$second_term = "Second Term";
$third_term = "Third Term";

//DECLARATION OF QUESTION AND ANSWER TABLES FOR EACH TERM
if ($current_term == "First Term") {
    $exam_tbl_A = "ft_exam_type_a";
    $exam_tbl_B = "ft_exam_type_b";
    $exam_tbl_C = "ft_exam_type_c";
    $answer_tbl_A = "ft_answer_type_a";
    $answer_tbl_B = "ft_answer_type_b";
    $answer_tbl_C = "ft_answer_type_c";
    // EXAM TABLES
    $exam_table = "ft_exam_type_a";
    $answer_table = "ft_answer_type_a";
    // ANSWER SHEET
    $answer_sheet = "ft_answer_sheet";
    $prev_answer_sheet = null;
    // TIME TABLE
    $time_table = "subject_time_table";
}

if ($current_term == "Second Term") {
    $exam_tbl_A = "st_exam_type_a";
    $exam_tbl_B = "st_exam_type_b";
    $exam_tbl_C = "st_exam_type_c";
    $answer_tbl_A = "st_answer_type_a";
    $answer_tbl_B = "st_answer_type_b";
    $answer_tbl_C = "st_answer_type_c";
    // EXAM TABLES
    $exam_table = "st_exam_type_a";
    $answer_table = "st_answer_type_a";
    // ANSWER SHEET
    $answer_sheet = "st_answer_sheet";
    $prev_answer_sheet = "ft_answer_sheet";
    // TIME TABLE
    $time_table = "subject_time_table_2";
}

if ($current_term == "Third Term") {
    $exam_tbl_A = "tt_exam_type_a";
    $exam_tbl_B = "tt_exam_type_b";
    $exam_tbl_C = "tt_exam_type_c";
    $answer_tbl_A = "tt_answer_type_a";
    $answer_tbl_B = "tt_answer_type_b";
    $answer_tbl_C = "tt_answer_type_c";
    // EXAM TABLES
    $exam_table = "tt_exam_type_a";
    $answer_table = "tt_answer_type_a";
    // ANSWER SHEET
    $answer_sheet = "tt_answer_sheet";
    $prev_answer_sheet = "st_answer_sheet";
    // TIME TABLE
    $time_table = "subject_time_table_3";
}