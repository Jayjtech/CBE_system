<?php
require '../config/db.php';

//if user clicks on the sign up button
if (isset($_POST['register'])) {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $class = mysqli_real_escape_string($conn, $_POST['class']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $passwordConf = mysqli_real_escape_string($conn, $_POST['passwordConf']);
    $reg_date = date("d/m/y");
    $adm_no = rand(100000, 999999);

    //Profile Image code
    $img_name = $_FILES['p_image']['name'];
    $img_size = $_FILES['p_image']['size'];
    $img_tmp = $_FILES['p_image']['tmp_name'];

    $directory = '../profile_images/';
    $target_file = $directory . $img_name;
    $target_file = 'profile_images/' . $img_name;
    if ($password != $passwordConf) {
        $_SESSION['message'] = "The two passwords does not match!";
        $_SESSION['msg_type'] = "warning";
        $_SESSION['remedy'] = "";
        $_SESSION['btn'] = "Ok";
        header('location: ../login');
    }

    //To ensure that no two users have thesame email address
    $emailQuery = $conn->query("SELECT * FROM $student_tbl WHERE email='$email' AND username = '$username'");
    if ($emailQuery->num_rows > 0) {
        $_SESSION['message'] = "The email or username already exit!";
        $_SESSION['msg_type'] = "warning";
        $_SESSION['remedy'] = "Choose another username and email";
        $_SESSION['btn'] = "Ok";
        header('location: ../signup');
    }

    $hash_password = substr(md5($password), 5);

    move_uploaded_file($img_tmp, $directory . $img_name);

    $sql = $conn->query("INSERT INTO $student_tbl (reg_date, fullname, username, class, gender, email, phone, password, adm_no, session, p_image, keyp) 
         VALUES ('$reg_date', '$fullname', '$username', '$class', '$gender', '$email', '$phone', '$hash_password', '$adm_no', '$current_session', '$target_file', '$password')");
    //login user
    $_SESSION["username"] =  $username;
    $_SESSION['email'] = $email;
    $_SESSION['fullname'] = $fullname;
    $_SESSION['class'] = $class;
    $_SESSION['reg_date'] = $reg_date;
    $_SESSION['email'] = $email;
    $_SESSION['phone'] = $phone;
    $_SESSION['gender'] = $gender;
    $_SESSION['adm_no'] = $adm_no;
    $_SESSION['term'] = $current_term;
    $_SESSION['session'] = $current_session;

    $_SESSION['message'] = "Welcome $fullname!";
    $_SESSION['msg_type'] = "success";
    $_SESSION['remedy'] = "";
    $_SESSION['btn'] = "Ok";
    header('location: ../dashboard');
} else {
    $_SESSION['message'] = "Database error!";
    $_SESSION['msg_type'] = "error";
    $_SESSION['remedy'] = "";
    $_SESSION['btn'] = "Ok";
    header('location: ../signup');
}



//if user clicks login button
if (isset($_POST['login-btn'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $session = mysqli_real_escape_string($conn, $_POST['session']);
    $term = mysqli_real_escape_string($conn, $_POST['term']);

    $_SESSION['term'] = $term;
    $_SESSION['session'] = $session;
    $password = substr(md5($password), 5);
    $sql = $conn->query("SELECT * FROM student WHERE password = '$password' AND (email = '$username' OR username = '$username')");
    if ($sql->num_rows == 0) {
        $_SESSION['message'] = "User does not exist!";
        $_SESSION['msg_type'] = "error";
        $_SESSION['remedy'] = "";
        $_SESSION['btn'] = "Ok";
        header('location: ../login');
    } else {
        while ($user = $sql->fetch_assoc()) {
            //login success
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['fullname'] = $user['fullname'];
            $_SESSION['class'] = $user['class'];
            $_SESSION['reg_date'] = $user['reg_date'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['phone'] = $user['phone'];
            $_SESSION['p_image'] = $user['p_image'];
            $_SESSION['gender'] = $user['gender'];
            $_SESSION['adm_no'] = $user['adm_no'];
            $password = $user['password'];
            $_SESSION['term'] = $term;
            $_SESSION['session'] = $session;

            $fullname = $user['fullname'];
            $adm_no = $user['adm_no'];
        }



        /**CREATE RESULT CHECKER IF NOT EXIST */
        $code = substr($session, 2, 2) . '' . substr($term, 0, 1) . '' . rand(100000, 999999);
        $res_checker = $conn->query("SELECT * FROM $result_checker_tbl WHERE adm_no ='$adm_no' AND term='$term' AND session='$session'");
        if ($res_checker->num_rows == 0) {
            $create = $conn->query("INSERT INTO $result_checker_tbl (adm_no, term, session, code, fullname) 
                    VALUES('$adm_no','$term', '$session', '$code', '$fullname')");
        }
        $_SESSION['message'] = "Welcome back $fullname!";
        $_SESSION['msg_type'] = "success";
        $_SESSION['remedy'] = "";
        $_SESSION['btn'] = "Ok";
        header('location: ../dashboard');
    }
}
