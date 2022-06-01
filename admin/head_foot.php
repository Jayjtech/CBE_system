<?php
require "../config/db.php";
error_reporting(0);
$header_col = ""; $footer_col = ""; $header_txt_col = ""; $footer_txt_col = "";
$errors = array(); $hf_id = 0;//set hidden message defalt to 0
$update = false; 


if(isset($_POST['save'])){
    $header_col = mysqli_real_escape_string($conn,$_POST['header_col']);
    $footer_col = mysqli_real_escape_string($conn,$_POST['footer_col']);
    $header_txt_col = mysqli_real_escape_string($conn,$_POST['header_txt_col']);
    $footer_txt_col = mysqli_real_escape_string($conn,$_POST['footer_txt_col']);
       

    $conn->query("INSERT INTO  header_footer (header_col, footer_col, header_txt_col, footer_txt_col) 
    VALUES('$header_col', '$footer_col', '$header_txt_col', '$footer_txt_col')") 
    or die($conn->error);

    $_SESSION['message'] = "Header and Footer Color has been Published!";
    $_SESSION['msg_type'] = "success";//Message Published background

    header("location: edit_header_footer.php");
}





if (isset($_GET['edit'])){
    $hf_id = $_GET['edit'];
    $update = true;
    $result = $conn->query("SELECT * FROM header_footer WHERE hf_id=$hf_id") or die($conn->error());
        if (count($result)==1){
        $row = $result->fetch_array();
        $header_col = $row['header_col'];
        $footer_col = $row['footer_col'];
    }
}


if(isset($_GET['delete']))
{
    $hf_id = $_GET['delete'];
    $conn->query("DELETE FROM header_footer WHERE hf_id=$hf_id") or die($conn->error());
    
    $_SESSION['message'] = "Header and Footer Color has been deleted!";
    $_SESSION['msg_type'] = "danger";//Message delete background

    header("location: edit_header_footer.php");
}


if (isset($_POST['update']))
{
    $hf_id = mysqli_real_escape_string($conn,$_POST['hf_id']);
    $header_col = mysqli_real_escape_string($conn,$_POST['header_col']);
    $footer_col = mysqli_real_escape_string($conn,$_POST['footer_col']);
    $header_txt_col = mysqli_real_escape_string($conn,$_POST['header_txt_col']);
    $footer_txt_col = mysqli_real_escape_string($conn,$_POST['footer_txt_col']);
       

    $conn->query("UPDATE header_footer SET header_col='$header_col', footer_col='$footer_col',
    header_txt_col='$header_txt_col', footer_txt_col='$footer_txt_col' WHERE hf_id=$hf_id") or die($conn->error);

    $_SESSION['message'] = "Header and Footer Color has been updated!";
    $_SESSION['msg_type'] = "warning";//Message update background

    header("location: edit_header_footer.php");
}
