<?php
define('BASE_URL', '');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '1234');
define('DB_NAME', 'cbe_system');

error_reporting(0);

// TABLES
$evaluation_tbl = "evaluation";
$subject_tbl = "subject_tbl";
$instruction_tbl = "instruction_tbl";
$result_checker_tbl = "result_checker";

session_start();
