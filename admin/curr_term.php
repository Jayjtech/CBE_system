<?php
require "../config/db.php";
error_reporting(0);
$session = "";
$sch_term = "";
$form_price = "";
$payment_key = "";
$errors = array();
$T_id = 0; //set hidden message defalt to 0
$update = false;


if (isset($_POST['update_period'])) {
    $session = mysqli_real_escape_string($conn, $_POST['session']);
    $sch_term = mysqli_real_escape_string($conn, $_POST['sch_term']);

    $update = $conn->query("UPDATE school_term SET session='$session', sch_term='$sch_term'");

    $_SESSION['message'] = "Changes have been successfully saved!";
    $_SESSION['msg_type'] = "success";
    $_SESSION['btn'] = "Ok";

    header("location: period-setting");
}


if (isset($_POST['save_class'])) {
    $class = mysqli_real_escape_string($conn, $_POST['class']);
    $check = $conn->query("SELECT * FROM class_tbl WHERE class='$class'");
    if ($check->num_rows == 0) {
        $conn->query("INSERT INTO  class_tbl (class) VALUES('$class')") or die($conn->error);

        $_SESSION['message'] = "Class has been added!";
        $_SESSION['msg_type'] = "success";
        $_SESSION['btn'] = "Ok";
        header("location: period-setting");
    } else {
        $_SESSION['message'] = "Class already exist!";
        $_SESSION['msg_type'] = "warining";
        $_SESSION['btn'] = "Ok";
        header("location: period-setting");
    }
}



if (isset($_POST['add_session'])) {
    $session = mysqli_real_escape_string($conn, $_POST['session']);
    $check = $conn->query("SELECT * FROM sch_session WHERE session='$session'");
    if ($check->num_rows == 0) {
        $conn->query("INSERT INTO  sch_session (session) VALUES('$session')");

        $_SESSION['message'] = "Session has been added!";
        $_SESSION['msg_type'] = "success";
        $_SESSION['btn'] = "Ok";
        header("location: period-setting");
    } else {
        $_SESSION['message'] = "Class already exist!";
        $_SESSION['msg_type'] = "warining";
        $_SESSION['btn'] = "Ok";
        header("location: period-setting");
    }
}





if (isset($_GET['delete_class'])) {
    $id = $_GET['delete_class'];
    $del = $conn->query("DELETE FROM class_tbl WHERE id=$id");
    if ($del) {
        $_SESSION['message'] = "Class has been deleted!";
        $_SESSION['msg_type'] = "success";
        $_SESSION['btn'] = "Ok";

        header("location: period-setting");
    } else {
        $_SESSION['message'] = "Class could not be deleted!";
        $_SESSION['msg_type'] = "error";
        $_SESSION['btn'] = "Ok";

        header("location: period-setting");
    }
}

if (isset($_GET['delete_session'])) {
    $id = $_GET['delete_session'];
    $del = $conn->query("DELETE FROM sch_session WHERE id=$id");
    if ($del) {
        $_SESSION['message'] = "Session has been deleted!";
        $_SESSION['msg_type'] = "success";
        $_SESSION['btn'] = "Ok";

        header("location: period-setting");
    } else {
        $_SESSION['message'] = "Session could not be deleted!";
        $_SESSION['msg_type'] = "error";
        $_SESSION['btn'] = "Ok";

        header("location: period-setting");
    }
}
