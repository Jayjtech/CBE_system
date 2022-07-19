<?php
include "../config/db.php";
if ($_POST['reset']) {
    $user_id = $_POST['user'];
    $user_type = $_POST['user_type'];
    $pswd = $_POST['pswd'];
    $rpswd = $_POST['rpswd'];


    if ($pswd == $rpswd) {
        $hash_password = substr(md5($pswd), 5);
        if ($user_type == "student") {
            $update = $conn->query("UPDATE $student_tbl SET password='$hash_password', keyp='$pswd', reset='0' WHERE adm_no = '$user_id'");
        } else {
            $update = $conn->query("UPDATE $admin_tbl SET password='$hash_password', keyp='$pswd', reset='0' WHERE token = '$user_id'");
        }

        if ($update) {
            $_SESSION['message'] = "Your password has been change successfully!";
            $_SESSION['msg_type'] = "success";
            $_SESSION['remedy'] = "You can now login with the new password";
            $_SESSION['btn'] = "Okay";
            header('location:../login');
        } else {
            $_SESSION['message'] = "An error occured during the process!";
            $_SESSION['msg_type'] = "error";
            $_SESSION['remedy'] = "Please try again";
            $_SESSION['btn'] = "Okay";
            header('location:reset_password_online?user=' . $user_id . '&user_type=' . base64_encode($user_type) . '');
        }
    } else {
        $_SESSION['message'] = "The two passwords do not match!";
        $_SESSION['msg_type'] = "warning";
        $_SESSION['remedy'] = "Please try again";
        $_SESSION['btn'] = "Okay";
        header('location:reset_password_online?user=' . $user_id . '&user_type=' . base64_encode($user_type) . '');
    }
}
