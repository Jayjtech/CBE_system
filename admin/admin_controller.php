<?php
include '../config/db.php';

$errors = array();
$username = "";
$password = "";
//if user clicks on the sign up button
if (isset($_POST['register'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $surname = mysqli_real_escape_string($conn, $_POST['surname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $keyp = $password;
    $passwordConf = mysqli_real_escape_string($conn, $_POST['passwordConf']);
    $key = md5($name . $email);
    $token = md5($surname . $key);


    if ($password != $passwordConf) {
        $_SESSION['message'] = "The two passwords does not match!";
        $_SESSION['msg_type'] = "warning";
        $_SESSION['remedy'] = "";
        $_SESSION['btn'] = "Ok";
        header('location: ../login');
    }
    $tokenQuery = $conn->query("SELECT * FROM $t_reg_key_tbl WHERE token ='$token' AND email='$email'");
    while ($row = $tokenQuery->fetch_assoc()) {
        $position = $row['position'];
    }
    //To ensure that no two users have thesame email address
    $emailQuery = $conn->query("SELECT * FROM $admin_tbl WHERE email='$email' OR username = '$username'");
    if ($emailQuery->num_rows > 0) {
        $_SESSION['message'] = "The email or username already exit!";
        $_SESSION['msg_type'] = "warning";
        $_SESSION['remedy'] = "Choose another username or email";
        $_SESSION['btn'] = "Ok";
        header('location: ../login');
    }

    $password = substr(md5($password), 5);
    if ($tokenQuery->num_rows != 0) {
        $sql = $conn->query("INSERT INTO $admin_tbl (name, username, surname, password, gender, email, phone, token, position, keyp) 
    VALUES ('$name', '$username', '$surname', '$password', '$gender', '$email', '$phone', '$token', '$position', '$keyp')");
    }
    if ($sql) {
        //login user
        $_SESSION["username"] =  $username;
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $name;
        $_SESSION['surname'] = $surname;
        $_SESSION['token'] = $token;
        $_SESSION['reg_date'] = $reg_date;
        $_SESSION['position'] = $position;
        $_SESSION['phone'] = $phone;
        $_SESSION['gender'] = $gender;


        $_SESSION['message'] = "You have successfully signed up!";
        $_SESSION['msg_type'] = "success";
        $_SESSION['remedy'] = "";
        $_SESSION['btn'] = "Ok";
        header('location: admin-login');
    } else {
        $_SESSION['message'] = "Database error!";
        $_SESSION['msg_type'] = "error";
        $_SESSION['remedy'] = "";
        $_SESSION['btn'] = "Ok";
        header('location: admin-signup');
    }
}

//if user clicks login button
if (isset($_POST['login-btn'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $position = mysqli_real_escape_string($conn, $_POST['position']);

    $_SESSION['position'] = $position;

    //SELECT USER
    $admin = "Proprietor";
    $princ = "Principal";
    $v_princ = "Vice Principal";
    $head_teacher = "Head Teacher";
    $teacher = "Teacher";
    $treasurer = "Treasurer";

    $password = substr(md5($password), 5);
    $sql = $conn->query("SELECT * FROM $admin_tbl WHERE password = '$password' AND (email = '$username' OR username = '$username' OR phone = '$username')");
    if ($sql->num_rows == 0) {
        $_SESSION['message'] = "User does not exist!";
        $_SESSION['msg_type'] = "error";
        $_SESSION['remedy'] = "";
        $_SESSION['btn'] = "Ok";
        header('location: admin-login');
    } else {
        while ($user = $sql->fetch_assoc()) {
            //login success
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['token'] = $user['token'];
            $_SESSION['surname'] = $user['surname'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['position'] = $user['position'];
            $_SESSION['gender'] = $user['gender'];
            $_SESSION['assignedClass'] = $user['assignedClass'];
            $name = $user['name'];
        }
        $_SESSION['message'] = "Welcome back $name!";
        $_SESSION['msg_type'] = "success";
        $_SESSION['remedy'] = "";
        $_SESSION['btn'] = "Ok";

        // if admin logs in...
        if ($position == $admin) {
            $redirect = "admin-nav";
        }

        // if teacher logs in...
        if ($position == $teacher) {
            $redirect = "teacher";
        }

        // if head teacher logs in...
        if ($position == $head_teacher) {
            $redirect = "teacher";
        }

        // if head Principal logs in...
        if ($position == $princ) {
            $redirect = "principal";
        }

        // if head Principal logs in...
        if ($position == $v_princ) {
            $redirect = "vice-principal";
        }
        if ($position == $treasurer) {
            $redirect = "treasurer";
        }
        header('location: ' . $redirect . '');
    }
}
