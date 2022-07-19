<?php
include "../config/db.php";
$errors = array(); //set hidden message defalt to 0
$update = false;


if (isset($_GET['adm_no'])) {
   $adm_no = $_GET['adm_no'];
   $result = $conn->query("SELECT * FROM student WHERE adm_no = '$adm_no'");
   while ($row = $result->fetch_assoc()) {
      $p_image = $row['p_image'];
   }

   if (unlink('../' . $p_image)) {
      $conn->query("DELETE FROM student WHERE adm_no = '$adm_no'");
      $conn->query("DELETE FROM $answer_sheet WHERE adm_no = '$adm_no'");
      $conn->query("DELETE FROM $evaluation_tbl WHERE adm_no = '$adm_no'");
      $_SESSION['message'] = "Student's record has been deleted!";
      $_SESSION['msg_type'] = "success";
      $_SESSION['btn'] = "Ok";
      header("location: students");
   } else {
      $conn->query("DELETE FROM student WHERE adm_no = '$adm_no'");
      $conn->query("DELETE FROM $answer_sheet WHERE adm_no = '$adm_no'");

      $_SESSION['message'] = "Student's image record could not be deleted but other details have been deleted!";
      $_SESSION['msg_type'] = "error";
      $_SESSION['btn'] = "Ok";
      header("location: students");
   }
}



if (isset($_GET['Delete'])) {
   $result = $conn->query("SELECT * FROM student");
   while ($res = $result->fetch_assoc()) {
      $adm_no = $res['adm_no'];
      $p_image = $res['p_image'];

      unlink('../' . $p_image);
      $conn->query("DELETE FROM student WHERE adm_no = '$adm_no'");
      $conn->query("DELETE FROM $answer_sheet WHERE adm_no = '$adm_no'");
      $conn->query("DELETE FROM $evaluation_tbl WHERE adm_no = '$adm_no'");

      $_SESSION['message'] = "All students have been deleted!";
      $_SESSION['msg_type'] = "success";
      $_SESSION['btn'] = "Ok";
      header("location: students");
   }
}



if (isset($_POST["update_student"])) {
   // Allowed mime types
   $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');

   // Validate whether selected file is a CSV file
   if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) {

      // If the file is uploaded
      if (is_uploaded_file($_FILES['file']['tmp_name'])) {

         // Open uploaded CSV file with read-only mode
         $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
         // Skip the first line
         fgetcsv($csvFile);

         // Parse data from CSV file line by line
         while (($line = fgetcsv($csvFile)) !== FALSE) {
            // Get row data
            $fullname   =  mysqli_real_escape_string($conn, $line[0]);
            $adm_no  =  mysqli_real_escape_string($conn, $line[1]);
            $class  =  mysqli_real_escape_string($conn, $line[2]);
            $gender  =  mysqli_real_escape_string($conn, $line[3]);
            $username  =  mysqli_real_escape_string($conn, $line[4]);
            $phone  =  mysqli_real_escape_string($conn, $line[5]);
            $email  =  mysqli_real_escape_string($conn, $line[6]);
            $keyp  =  mysqli_real_escape_string($conn, $line[7]);

            $select = $conn->query("SELECT * FROM $student_tbl WHERE adm_no ='$adm_no'");
            while ($row = $select->fetch_assoc()) {
               $same_class = $row['class'];
               $same_keyp = $row['keyp'];
            }

            if ($gender == "MALE" || $gender == "male" || $gender == "Male") {
               $gender = "Male";
            } else if ($gender == "FEMALE" || $gender == "female" || $gender == "Female") {
               $gender = "Female";
            } else {
               $gender = "Null";
            }

            if ($class == "JSS-1" || $class == "1" || $class == "jss-1" || $class == "jss1" || $class == "jss-1" || $class == "js1" || $class == "j1") {
               $class = "JSS-1";
            } else if ($class == "JSS-2" || $class == "2" || $class == "jss-2" || $class == "jss2" || $class == "jss-2" || $class == "js2" || $class == "j2") {
               $class = "JSS-2";
            } else if ($class == "JSS-3" || $class == "3" || $class == "jss-3" || $class == "jss3" || $class == "jss-3" || $class == "js3" || $class == "j3") {
               $class = "JSS-3";
            } else if ($class == "SSS-1" || $class == "4" || $class == "sss-1" || $class == "sss1" || $class == "sss-1" || $class == "ss1" || $class == "s1") {
               $class = "SSS-1";
            } else if ($class == "SSS-2" || $class == "5" || $class == "sss-2" || $class == "sss2" || $class == "sss-2" || $class == "ss2" || $class == "s2") {
               $class = "SSS-2";
            } else if ($class == "SSS-3" || $class == "6" || $class == "sss-3" || $class == "sss3" || $class == "sss-3" || $class == "ss3" || $class == "s3") {
               $class = "SSS-3";
            } else if ($class == "") {
               $class = $same_class;
            }
            if (empty($keyp)) {
               $keyp = $same_keyp;
            }
            $hash_password = substr(md5($keyp), 5);

            $update = $conn->query("UPDATE $student_tbl SET 
                   fullname = '$fullname',
                   class = '$class',
                   gender = '$gender',
                   username = '$username',
                   phone = '$phone',
                   email = '$email',
                   keyp = '$keyp',
                   password = '$hash_password'
                   WHERE adm_no = '$adm_no'
                   ");
            if ($update) {
               $_SESSION['message'] = "Student details have been updated!";
               $_SESSION['msg_type'] = "success";
               $_SESSION['remedy'] = "";
               $_SESSION['btn'] = "Ok";
               header("location: students");
            } else {
               $_SESSION['message'] = "An error occured during the process!";
               $_SESSION['msg_type'] = "error";
               $_SESSION['btn'] = "Ok";
               header("location: students");
            }
         }
      }
   } else {
      $_SESSION['message'] = "Invalid file format!";
      $_SESSION['msg_type'] = "warning";
      $_SESSION['btn'] = "Ok";
      header("location: students");
   }
}
