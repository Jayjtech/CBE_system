<?php
require "../config/db.php";
error_reporting(0);
$class = ""; 

if(isset($_POST['save'])){
    $class = mysqli_real_escape_string($conn,$_POST['class']);

//To ensure that Thesame class is not uploaded over and again
$classQuery = "SELECT * FROM class_tbl WHERE class=? LIMIT 1";
$stmt = $conn->prepare($classQuery);
$stmt->bind_param('s', $class);
$stmt->execute();
$result = $stmt->get_result();
$Count = $result->num_rows;
$stmt->close();
    if($Count > 0){
        $_SESSION['message'] = "Class already exist!";
    $_SESSION['msg_type'] = "danger";//Message delete background

    header("location: term_updator.php");
    }
    
    if($Count == 0) {
    $conn->query("INSERT INTO  class_tbl (class) VALUES('$class')") 
    or die($conn->error);
    $_SESSION['message'] = "Class has been Added!";
    $_SESSION['msg_type'] = "success";//Message saved background

    header("location: term_updator.php");
    }
}




if(isset($_GET['delete']))
{
    $id = $_GET['delete'];
    $conn->query("DELETE FROM class_tbl WHERE id=$id") or die($conn->error());
    
    $_SESSION['message'] = "Class has been deleted!";
    $_SESSION['msg_type'] = "danger";//Message delete background

    header("location: term_updator.php");
}
