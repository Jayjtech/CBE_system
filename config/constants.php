<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'cbe_system');
define('BASE_URL', 'https://localhost/cbe_system-v1');

$hostname = DB_HOST;
$username = DB_USER;
$password = DB_PASS;
$db_name = DB_NAME;

error_reporting(0);
session_start();
// TABLES
$evaluation_tbl = "evaluation";
$subject_tbl = "subject_tbl";
$instruction_tbl = "instruction_tbl";
$result_checker_tbl = "result_checker";
$admin_tbl = "admin_table";
$class_tbl = "class_tbl";
$exam_crtl_tbl = "exam_controller";
$school_details_tbl = "school_details";
$school_period_tbl = "school_term";
$sch_session_tbl = "sch_session";
$student_tbl = "student";
$t_reg_key_tbl = "teacher_reg_key";

$mailer_email = "";
$mailer_psw = "";