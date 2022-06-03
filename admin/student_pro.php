<?php
require "../config/db.php";
error_reporting(0);
$errors = array(); //set hidden message defalt to 0
$update = false; 


if(isset($_GET['adm_no'])){
   $adm_no = $_GET['adm_no'];
   $result = $conn->query("SELECT * FROM student WHERE adm_no = '$adm_no'");
    while($row = $result->fetch_assoc()){
      $p_image = $row['p_image'];
    }

   if(unlink('../'.$p_image)){
      $conn->query("DELETE FROM student WHERE adm_no = '$adm_no'");
      $conn->query("DELETE FROM $answer_sheet WHERE adm_no = '$adm_no'");
      $conn->query("DELETE FROM $evaluation_tbl WHERE adm_no = '$adm_no'");
      $_SESSION['message'] = "Student's record has been deleted!";
      $_SESSION['msg_type'] = "success";
      $_SESSION['btn'] = "Ok";
      header("location: students");
   }else{
      $conn->query("DELETE FROM student WHERE adm_no = '$adm_no'");
      $conn->query("DELETE FROM $answer_sheet WHERE adm_no = '$adm_no'"); 

      $_SESSION['message'] = "Student's image record could not be deleted but other details have been deleted!";
      $_SESSION['msg_type'] = "error";
      $_SESSION['btn'] = "Ok";
      header("location: students");
   }
    

}

if(isset($_GET['Delete'])){
   $result = $conn->query("SELECT * FROM student");
   while($res = $result->fetch_assoc()){
      $adm_no= $res['adm_no'];
      $p_image= $res['p_image'];

      unlink('../'.$p_image);
      $conn->query("DELETE FROM student WHERE adm_no = '$adm_no'");
      $conn->query("DELETE FROM $answer_sheet WHERE adm_no = '$adm_no'");
      $conn->query("DELETE FROM $evaluation_tbl WHERE adm_no = '$adm_no'");

      $_SESSION['message'] = "All students have been deleted!";
      $_SESSION['msg_type'] = "success";
      $_SESSION['btn'] = "Ok";
      header("location: students");
   }
}





