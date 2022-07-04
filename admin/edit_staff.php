<?php
require "../config/db.php";
$errors = array(); //set hidden message defalt to 0
$update = false;


if (isset($_POST['reset_button'])) {
   $token = $_POST['token'];
   $password = mysqli_real_escape_string($conn, $_POST['pwd']);
   $Cpwd = mysqli_real_escape_string($conn, $_POST['Cpwd']);
   $result = $conn->query("SELECT * FROM admin_table WHERE token = '$token'");
   while ($row = $result->fetch_assoc()) {
      $id = $row['id'];
      $email = $row['email'];
      $name = $row['name'];
   }


   if ($password != $Cpwd) {
      $_SESSION['message'] = "The two password do not match!";
      $_SESSION['msg_type'] = "warning";
      $_SESSION['remedy'] = "";
      $_SESSION['btn'] = "Okay";
      header("location:teacher_details.php");
   } else {
      $password = password_hash($password, PASSWORD_DEFAULT);
      $query = $conn->query("UPDATE admin_table SET password='$password' WHERE token='$token' AND email='$email'");
      if ($query) {
         $_SESSION['message'] = "Password reset was successful!";
         $_SESSION['msg_type'] = "success";
         $_SESSION['remedy'] = "";
         $_SESSION['btn'] = "Okay";
         header("location:staff");
      }
   }
}


if (isset($_POST['pick'])) {
   $token = $_POST['token'];
   $result = $conn->query("SELECT * FROM admin_table WHERE token = '$token'");
   while ($row = $result->fetch_assoc()) {
      $id = $row['id'];
      $email = $row['email'];
      $name = $row['name'];
   }

   $query = $conn->query("DELETE FROM admin_table WHERE id = $id AND token='$token' AND email='$email'");
   $query1 = $conn->query("DELETE FROM subject_tbl WHERE name='$name'");
   if ($query1) {
      $_SESSION['message'] = "Staff's record has been deleted!";
      $_SESSION['msg_type'] = "success";
      $_SESSION['remedy'] = "";
      $_SESSION['btn'] = "Okay";
      header("location:staff");
   }
}


if (isset($_GET['Delete'])) {
   $admin = "Proprietor";
   $conn->query("DELETE FROM admin_table WHERE position != '$admin'");
   $_SESSION['message'] = "Staffs' records have been deleted!";
   $_SESSION['msg_type'] = "success";
   $_SESSION['remedy'] = "";
   $_SESSION['btn'] = "Okay";

   header("location:staff");
}
