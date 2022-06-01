<?php
require "../config/db.php";
error_reporting(0);
$errors = array(); //set hidden message defalt to 0
$update = false; 


if(isset($_POST['pick'])){
   $username = $_POST['user'];
   $result = $conn->query("SELECT * FROM student WHERE username = '$username'");
    while($row = $result->fetch_assoc()){
    $id = $row['id'];
    $email = $row['email'];
    $fullname = $row['fullname'];
    }

     $conn->query("DELETE FROM student WHERE id = $id AND username='$username' AND email='$email'") or die($conn->error());
     $conn->query("DELETE FROM $answer_sheet WHERE username='$username' AND fullname='$fullname'") or die($conn->error());
    
$_SESSION['message'] = "Student's record has been deleted!";
$_SESSION['msg_type'] = "danger";//Message delete background

header("location: student.php");

}

if(isset($_GET['Delete'])){
   $conn->query("DELETE FROM student WHERE id != ''") or die($conn->error());
   $_SESSION['message'] = "Student's records have been deleted!";
   $_SESSION['msg_type'] = "danger";//Message delete background

   header("location: student.php");
}





