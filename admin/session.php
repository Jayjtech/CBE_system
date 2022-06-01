<?php
require "../config/db.php";
//error_reporting(0);
$session = ""; 

if(isset($_POST['add_session'])){
    $session = mysqli_real_escape_string($conn,$_POST['session']);

//To ensure that Thesame session is not uploaded over and again
$sessionQuery = "SELECT * FROM sch_session WHERE session=? LIMIT 1";
$stmt = $conn->prepare($sessionQuery);
$stmt->bind_param('s', $session);
$stmt->execute();
$result = $stmt->get_result();
$Count = $result->num_rows;
$stmt->close();
    if($Count > 0){
        $_SESSION['message'] = "Session already exist!";
    $_SESSION['msg_type'] = "danger";//Message delete background

    header("location: term_updator.php");
    }
    
    if($Count == 0) {
    $conn->query("INSERT INTO  sch_session (session) VALUES('$session')") 
    or die($conn->error);
    $_SESSION['message'] = "Session has been Added!";
    $_SESSION['msg_type'] = "success";//Message saved background

    header("location: term_updator.php");
    }
}


if(isset($_GET['delete']))
{
    $id = $_GET['delete'];
    $conn->query("DELETE FROM sch_session WHERE id=$id") or die($conn->error());
    
    $_SESSION['message'] = "Session has been deleted!";
    $_SESSION['msg_type'] = "danger";//Message delete background

    header("location: term_updator.php");
}
