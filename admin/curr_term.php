<?php
require "../config/db.php";
error_reporting(0);
$session = ""; $sch_term = ""; $form_price =""; $payment_key = ""; $errors = array(); $T_id = 0;//set hidden message defalt to 0
$update = false; 


if (isset($_GET['edit'])){
    $T_id = $_GET['edit'];
    $update = true;
    $result = $conn->query("SELECT * FROM school_term WHERE T_id=$T_id") or die($conn->error());
        if (count($result)==1){
        $row = $result->fetch_array();
        $sch_term = $row['sch_term'];
        $session = $row['session'];
       
    }
}



if (isset($_POST['update']))
{
    $T_id = mysqli_real_escape_string($conn,$_POST['T_id']);
    $session = mysqli_real_escape_string($conn,$_POST['session']);
    $sch_term = mysqli_real_escape_string($conn,$_POST['sch_term']);

    if($sch_term == 'First Term'){
        $code = 1;
    }
    if($sch_term == 'Second Term'){
        $code = 2;
    }
    if($sch_term == 'Third Term'){
        $code = 3;
    }


    
    $conn->query("UPDATE school_term SET session='$session', sch_term='$sch_term' WHERE T_id=$T_id") or die($conn->error);

    $_SESSION['message'] = "Changes has been successfully made!";
    $_SESSION['msg_type'] = "warning";//Message update background

    header("location: term_updator.php");
}
