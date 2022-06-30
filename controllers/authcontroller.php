<?php
error_reporting(0);
require 'config/db.php';

$errors = array();
$username = "";
$class = "";
$reference = "";
$email = "";
$day = "";
$password = "";
$firstname = "";
$pname = "";
$surname = "";
$birth_date = "";
$middlename = "";
$reg_date = "";
$preschl = "";
$preclass = "";
$rank = "";
$occupation = "";
$religion = "";
$localgov = "";
$state = "";
$reason = "";
$nationality = "";
$office_addr = "";
$home_addr = "";
$phone = "";
$month = "";
//if user clicks on the sign up button
if (isset($_POST['register'])) {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $class = mysqli_real_escape_string($conn, $_POST['class']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $keyp = $password;
    $passwordConf = mysqli_real_escape_string($conn, $_POST['passwordConf']);
    $reg_date = date("d/m/y");
    $adm_no = rand(100000, 999999);

    //Profile Image code
    $img_name = $_FILES['p_image']['name'];
    $img_size = $_FILES['p_image']['size'];
    $img_tmp = $_FILES['p_image']['tmp_name'];

    $directory = 'profile_images/';
    $target_file = $directory . $img_name;


    //VALIDATIONS FOR SIGNING UP
    if (empty($fullname)) {
        $errors['fullname'] = "Please fill in your fullname!";
    }

    if (empty($username)) {
        $errors['username'] = "Username is required!";
    }

    if (empty($phone)) {
        $errors['phone'] = "Phone Number is required!";
    }


    //Check if it is a valid email.
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Email address is invalid!";
    }
    //if email, password is empty
    if (empty($email)) {
        $errors['email'] = "Email required!";
    }
    if (empty($password)) {
        $errors['password'] = "Password required!";
    }

    //if password and confirm pass. do not match
    if ($password !== $passwordConf) {
        $errors['password'] = "The two passwords do not match!";
    }

    //To ensure that no two users have thesame email address
    $emailQuery = "SELECT * FROM student WHERE email=? LIMIT 1";
    $stmt = $conn->prepare($emailQuery);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();


    //To ensure that no two users have thesame username
    $usernameQuery = "SELECT * FROM student WHERE username=? LIMIT 1";
    $stmt = $conn->prepare($usernameQuery);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount3 = $result->num_rows;
    $stmt->close();

    //Proceed only if there is no error
    if ($userCount > 0) {
        $errors['email'] = "Email already exist!";
    }
    if ($userCount3 > 0) {
        $errors['email'] = "Username has already been used, choose another username!";
    }


    if (count($errors) === 0) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $pass = md5($firstname . $email);
        $token = md5($pass . $username);
        $verified = false;

        move_uploaded_file($img_tmp, $target_file);

        $sql = "INSERT INTO student (reg_date, fullname, username, class, gender, email, phone, password, adm_no, session, p_image, keyp) 
         VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssssssssssss', $reg_date, $fullname, $username, $class, $gender, $email, $phone, $password, $adm_no, $current_session, $target_file, $keyp);



        if ($stmt->execute()) {
            //login user
            $user_id = $conn->insert_id;
            $_SESSION['id'] = $user_id;
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

            $_SESSION['message'] = "You are now logged in!";
            $_SESSION['msg_type'] = "success";
            $_SESSION['btn'] = "Ok";
            header('location: dashboard');
        } else {
            $errors['db_error'] = "Database error: failed to register";
        }
    }
}

//if user clicks login button
if (isset($_POST['login-btn'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $session = mysqli_real_escape_string($conn, $_POST['session']);
    $term = mysqli_real_escape_string($conn, $_POST['term']);

    $_SESSION['term'] = $term;
    $_SESSION['session'] = $session;

    //validation
    if (empty($username)) {
        $errors['username'] = "Username required!";
    }
    if (empty($password)) {
        $errors['password'] = "Password required!";
    }
    if (empty($session)) {
        $errors['session'] = "Session required!";
    }

    if (count($errors) === 0) {
        $sql = "SELECT * FROM student WHERE email =? OR username=? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $username, $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {

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
            $_SESSION['term'] = $term;
            $_SESSION['session'] = $session;

            $fullname = $user['fullname'];
            $adm_no = $user['adm_no'];
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
            header('location: dashboard');
        } else {
            $_SESSION['message'] = "Wrong credentials!";
            $_SESSION['msg_type'] = "error";
            $_SESSION['remedy'] = "";
            $_SESSION['btn'] = "Ok";
            header('location: login');
        }
    }
}
