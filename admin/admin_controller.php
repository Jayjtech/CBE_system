<?php
//error_reporting(0);
require '../config/db.php';

$errors = array(); $username = ""; $password = "";
//if user clicks on the sign up button
if(isset($_POST['register'])){
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $surname = mysqli_real_escape_string($conn,$_POST['surname']);
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $gender = mysqli_real_escape_string($conn,$_POST['gender']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $passwordConf = mysqli_real_escape_string($conn,$_POST['passwordConf']);
    $key = md5($name.$email);
    $token = md5($surname.$key);

    $post = $conn->query("SELECT * FROM teacher_reg_key WHERE name='$name' AND email='$email'");
    while($row = $post->fetch_assoc()){
        $position = $row['position'];
    }
   //VALIDATIONS FOR SIGNING UP    
    if(empty($username)){
        $errors['username'] = "Username required!";
    }

    if(empty($password)){
        $errors['password'] = "Password required!";
    }
    //if password and confirm pass. do not match
    if($password !== $passwordConf){
        $errors['password'] = "The two passwords do not match!";
    }
//To ensure that no two users have thesame username
$usernameQuery = "SELECT * FROM admin_table WHERE username=? LIMIT 1";
$stmt = $conn->prepare($usernameQuery);
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();
$userCount3 = $result->num_rows;
$stmt->close();

if($userCount3 > 0){
    $errors['username'] = "Username has already been used, choose another username!";
}
//To ensure that no two users have thesame username
$emailQuery = "SELECT * FROM admin_table WHERE email=? LIMIT 1";
$stmt = $conn->prepare($emailQuery);
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();
$userCount_ = $result->num_rows;
$stmt->close();

if($userCount_ > 0){
    $errors['email'] = "Email has already been used!";
}

     //to verify payment
     $tokenQuery = "SELECT * FROM teacher_reg_key WHERE token =? LIMIT 1";
     $stmt = $conn->prepare($tokenQuery);
     $stmt->bind_param('s', $token);
     $stmt->execute();
     $result = $stmt->get_result();
     $tokenCount = $result->num_rows;
     $teacher = $result->fetch_assoc();
     $stmt->close();
     $teacher_token = $teacher['token'];

     if($token == $teacher_token){
    if(count($errors) === 0) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO admin_table (name, username, surname, password, gender, email, token, position) VALUES (?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssssssss', $name, $username, $surname, $password, $gender, $email, $token, $position);
        

        if ($stmt->execute()){
            //login user
            $user_id = $conn->insert_id;
            $_SESSION['id'] = $user_id;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['verified'] = $verified;

            $_SESSION['message'] = "You have successfully signed up, fill in the fields below to Log in!";
            $_SESSION['msg_type'] = "success";//Message saved background
           header("location: admin_login.php");
            exit(); 
          }else{
             $errors['db_error'] = "Database error: failed to register";
            }
         }
     }
   }

 //if user clicks login button
 if(isset($_POST['login-btn'])){
     $username = mysqli_real_escape_string($conn,$_POST['username']);
     $password = mysqli_real_escape_string($conn,$_POST['password']); 
     $position = mysqli_real_escape_string($conn,$_POST['position']);
     
     $_SESSION['position'] = $position;

    //SELECT USER
    $admin = "Proprietor";
    $princ = "Principal";
    $v_princ = "Vice Principal";
    $head_teacher = "Head Teacher";
    $teacher = "Teacher";
    $treasurer = "Treasurer";

    
     //validation
     if(empty($username)){
         $errors['username'] = "Username required!";
     }
     if(empty($password)){
         $errors['password'] = "Password required!";
     }
     if (count($errors) === 0) {
    $sql = "SELECT * FROM admin_table WHERE email =? OR username=? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt ->bind_param('ss', $username, $username);
    $stmt -> execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    
     if(password_verify($password, $user['password'])){
         //login success
             $_SESSION['id'] = $user['id'];
             $_SESSION['username'] = $user['username'];
             $_SESSION['name'] = $user['name'];
             $_SESSION['gender'] = $user['gender'];
             $_SESSION['email'] = $user['email'];
             $_SESSION['surname'] = $user['surname'];
             $_SESSION['position'] = $user['position'];
             //$_SESSION['position'] = $user['position'];
            
             // if admin logs in...
             if($position == $admin) {             
             header('location: admin_nav.php');
             exit(); 
             } 
             
             // if teacher logs in...
             if($position == $teacher) {              
               header('location: teacher_profile.php');
               exit(); 
               } 
                
            // if head teacher logs in...
            if($position == $head_teacher) {              
               header('location: teacher_profile.php');
               exit(); 
               } 

               // if head Principal logs in...
            if($position == $princ) {              
                header('location: p_profile.php');
                exit(); 
                } 

               // if head Principal logs in...
            if($position == $v_princ) {              
                header('location: vice_principal.php');
                exit(); 
                } 
            if($position == $treasurer) {              
                header('location: treasurer.php');
                exit(); 
                } 

     }else{
         $errors['login_fail'] = "Wrong credentials!";
     }
    }
 }
