<?php
include "../config/db.php";

if (isset($_POST['save'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $position = mysqli_real_escape_string($conn, $_POST['position']);
    $name_col = mysqli_real_escape_string($conn, $_POST['name_col']);
    $name_font = mysqli_real_escape_string($conn, $_POST['name_font']);
    $para = mysqli_real_escape_string($conn, $_POST['para']);
    $para_color = mysqli_real_escape_string($conn, $_POST['para_color']);
    $position_col = mysqli_real_escape_string($conn, $_POST['position_col']);
    $position_font = mysqli_real_escape_string($conn, $_POST['position_font']);
    $para_font = mysqli_real_escape_string($conn, $_POST['para_font']);
    $facebk = mysqli_real_escape_string($conn, $_POST['facebk']);
    $instagram = mysqli_real_escape_string($conn, $_POST['instagram']);
    $whatsapp = mysqli_real_escape_string($conn, $_POST['whatsapp']);

    $img_name = $_FILES['image']['name'];
    $img_size = $_FILES['image']['size'];
    $img_tmp = $_FILES['image']['tmp_name'];

    $directory = 'upload2/';
    $target_file = $directory . $img_name;

    move_uploaded_file($img_tmp, $target_file);

    $conn->query("INSERT INTO  sch_teachers (name, position, image, name_col, name_font, para, para_color, para_font, position_col, position_font, 
    facebk, instagram, whatsapp) 
    VALUES('$name', '$position', '$target_file','$name_col', '$name_font', '$para', '$para_color', '$para_font', '$position_col', '$position_font',
    '$facebk', '$instagram', '$whatsapp')")
        or die($conn->error);

    $_SESSION['message'] = "Teacher's Info has been saved!";
    $_SESSION['msg_type'] = "success"; //Message saved background

    header("location: teacher.php");
}

if (isset($_GET['delete'])) {
    $tch_id = $_GET['delete'];
    $conn->query("DELETE FROM sch_teachers WHERE tch_id=$tch_id");

    $_SESSION['message'] = "Teacher's Info has been deleted!";
    $_SESSION['msg_type'] = "danger"; //Message delete background

    header("location: teacher.php");
}


if (isset($_POST['update'])) {
    $tch_id = mysqli_real_escape_string($conn, $_POST['tch_id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $position = mysqli_real_escape_string($conn, $_POST['position']);
    $name_col = mysqli_real_escape_string($conn, $_POST['name_col']);
    $name_font = mysqli_real_escape_string($conn, $_POST['name_font']);
    $para = mysqli_real_escape_string($conn, $_POST['para']);
    $para_color = mysqli_real_escape_string($conn, $_POST['para_color']);
    $position_col = mysqli_real_escape_string($conn, $_POST['position_col']);
    $position_font = mysqli_real_escape_string($conn, $_POST['position_font']);
    $para_font = mysqli_real_escape_string($conn, $_POST['para_font']);
    $facebk = mysqli_real_escape_string($conn, $_POST['facebk']);
    $instagram = mysqli_real_escape_string($conn, $_POST['instagram']);
    $whatsapp = mysqli_real_escape_string($conn, $_POST['whatsapp']);

    $img_name = $_FILES['image']['name'];
    $img_size = $_FILES['image']['size'];
    $img_tmp = $_FILES['image']['tmp_name'];

    $directory = 'upload2/';
    $target_file = $directory . $img_name;

    move_uploaded_file($img_tmp, $target_file);

    $conn->query("UPDATE sch_teachers SET name='$name', position='$position', 
    name_col='$name_col', para='$para', name_font='$name_font', para_color='$para_color',
    position_font='$position_font', position_col='$position_col',
    facebk='$facebk', instagram='$instagram', whatsapp='$whatsapp', para_font='$para_font', 
    image='$target_file' WHERE tch_id=$tch_id") or die($conn->error);

    $_SESSION['message'] = "Teacher's Info has been updated!";
    $_SESSION['msg_type'] = "warning"; //Message update background

    header("location: teacher.php");
}




if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $surname = mysqli_real_escape_string($conn, $_POST['surname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $position = mysqli_real_escape_string($conn, $_POST['position']);
    $key = md5($name . $email);
    $token = md5($surname . $key);

    //Ensure that all field are filled.
    $tokenQuery = $conn->query("SELECT * FROM $t_reg_key_tbl WHERE email='$email'");
    if ($tokenQuery->num_rows == 0) {
        $conn->query("INSERT INTO  $t_reg_key_tbl (name, surname, email, token, position)
         VALUES('$name', '$surname', '$email', '$token','$position')");

        $_SESSION['message'] = "Token has been Created!";
        $_SESSION['msg_type'] = "success";
        $_SESSION['remedy'] = "Navigate to the sign up page to sign up";
    } else {
        $_SESSION['message'] = "This email already exit!";
        $_SESSION['msg_type'] = "warning";
        $_SESSION['remedy'] = "Choose another email";
    }
    header("location: create-token");
}

if (isset($_GET['del_staff'])) {
    $token = $_GET['del_staff'];
    $delete = $conn->query("DELETE FROM $admin_tbl WHERE token = '$token'");
    if ($delete) {
        $conn->query("DELETE FROM subject_tbl WHERE token = '$token'");
        $_SESSION['message'] = "Staff record has been deleted!";
        $_SESSION['msg_type'] = "success";
        $_SESSION['btn'] = "Ok";
        header("location: staff");
    } else {
        $_SESSION['message'] = "Staff record could not be deleted!";
        $_SESSION['msg_type'] = "error";
        $_SESSION['btn'] = "Ok";
        header("location: staff");
    }
}


if (isset($_POST["update_staff"])) {
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
                $name   =  mysqli_real_escape_string($conn, $line[0]);
                $surname  =  mysqli_real_escape_string($conn, $line[1]);
                $email  =  mysqli_real_escape_string($conn, $line[2]);
                $username  =  mysqli_real_escape_string($conn, $line[3]);
                $phone  =  mysqli_real_escape_string($conn, $line[4]);
                $gender  =  mysqli_real_escape_string($conn, $line[5]);
                $assignedClass  =  mysqli_real_escape_string($conn, $line[6]);
                $keyp  =  mysqli_real_escape_string($conn, $line[7]);
                $token  =  mysqli_real_escape_string($conn, $line[8]);

                $select = $conn->query("SELECT * FROM $admin_tbl WHERE token ='$token'");
                while ($row = $select->fetch_assoc()) {
                    $same_class = $row['assignedClass'];
                    $same_keyp = $row['keyp'];
                }

                if (
                    $gender == "MALE" || $gender == "male" || $gender == "Male"
                ) {
                    $gender = "Male";
                } else if ($gender == "FEMALE" || $gender == "female" || $gender == "Female") {
                    $gender = "Female";
                } else {
                    $gender = "Null";
                }

                if ($assignedClass == "JSS-1" || $assignedClass == "1" || $assignedClass == "jss-1" || $assignedClass == "jss1" || $assignedClass == "jss-1" || $assignedClass == "js1" || $assignedClass == "j1") {
                    $assignedClass = "JSS-1";
                } else if ($assignedClass == "JSS-2" || $assignedClass == "2" || $assignedClass == "jss-2" || $assignedClass == "jss2" || $assignedClass == "jss-2" || $assignedClass == "js2" || $assignedClass == "j2") {
                    $assignedClass = "JSS-2";
                } else if ($assignedClass == "JSS-3" || $assignedClass == "3" || $assignedClass == "jss-3" || $assignedClass == "jss3" || $assignedClass == "jss-3" || $assignedClass == "js3" || $assignedClass == "j3") {
                    $assignedClass = "JSS-3";
                } else if ($assignedClass == "SSS-1" || $assignedClass == "4" || $assignedClass == "sss-1" || $assignedClass == "sss1" || $assignedClass == "sss-1" || $assignedClass == "ss1" || $assignedClass == "s1") {
                    $assignedClass = "SSS-1";
                } else if ($assignedClass == "SSS-2" || $assignedClass == "5" || $assignedClass == "sss-2" || $assignedClass == "sss2" || $assignedClass == "sss-2" || $assignedClass == "ss2" || $assignedClass == "s2") {
                    $assignedClass = "SSS-2";
                } else if ($assignedClass == "SSS-3" || $assignedClass == "6" || $assignedClass == "sss-3" || $assignedClass == "sss3" || $assignedClass == "sss-3" || $assignedClass == "ss3" || $assignedClass == "s3") {
                    $assignedClass = "SSS-3";
                } else if ($assignedClass == "") {
                    $assignedClass = $same_class;
                }

                if (empty($keyp)) {
                    $keyp = $same_keyp;
                }
                $hash_password = substr(md5($keyp), 5);

                $update = $conn->query("UPDATE $admin_tbl SET 
                   name = '$name',
                   surname = '$surname',
                   gender = '$gender',
                   username = '$username',
                   phone = '$phone',
                   email = '$email',
                   keyp = '$keyp',
                   assignedClass = '$assignedClass',
                   password = '$hash_password'
                   WHERE token = '$token'
                   ");
                if ($update) {
                    $_SESSION['message'] = "Staff details have been updated!";
                    $_SESSION['msg_type'] = "success";
                    $_SESSION['remedy'] = "";
                    $_SESSION['btn'] = "Ok";
                    header("location: staff");
                } else {
                    $_SESSION['message'] = "An error occured during the process!";
                    $_SESSION['msg_type'] = "error";
                    $_SESSION['btn'] = "Ok";
                    header("location: staff");
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
