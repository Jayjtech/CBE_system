<?php
require "../config/db.php";
//error_reporting(0);
$errors = array(); $class = "";//set hclassden message defalt to 0

if(isset($_POST['standardize']))
{
    $class = mysqli_real_escape_string($conn, $_POST['class']);
    $query = $conn->query("SELECT * FROM $time_table WHERE class = '$class'");
    $total_sub = $query->num_rows;
    
    $overall = ($total_sub * 100);
    $conn->query("UPDATE evaluation SET out_of='$overall' WHERE class='$class'") 
    or die($conn->error);
    $_SESSION['message'] = "<em>Expected overall score for <strong>$class</strong> has been standardized to<strong>$overall</strong>!</em>";
    $_SESSION['msg_type'] = "success";//Message delete background
    header("location: pre_result.php");
}
