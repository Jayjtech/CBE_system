<?php
require "../config/db.php";
//error_reporting(0);
$firstname = "";
$name = "";
$email = "";
$errors = array();
$errors1 = array();
$token="";

if(isset($_POST['forgot-password'])){
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $surname = mysqli_real_escape_string($conn,$_POST['surname']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $key = md5($name.$email);
    $token = md5($surname.$key);
   
     //To ensure that no two users have thesame name
     $tokennameQuery = "SELECT * FROM admin_table WHERE token='$token' LIMIT 1";
     $stmt = $conn->prepare($tokennameQuery);
     $stmt->bind_param('s', $token);
     $stmt->execute();
     $result = $stmt->get_result();
     $userCount = $result->num_rows;
     $stmt->close();
   
     
    $paragraph = "<p><strong>User Confirmed!</strong></h3>
                        <div> </div>";

    $result = $conn->query("SELECT * FROM admin_table WHERE token = '$token' LIMIT 1");
                        while($row = $result->fetch_array())
                         {
                            $_SESSION['token'] = $row['token'];           
                        }
                        $token = $_SESSION['token'];

        if($userCount === 0){
            $errors['token'] = "User details not found!"; 
        }else{
                         
            header("location:reset_password.php");   
        }                           
}
 
?>