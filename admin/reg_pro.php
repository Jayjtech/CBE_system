<?php
require "../config/db.php";
//error_reporting(0);
?>



<?php
$firstname = ""; $surname ="";  $email =""; $purpose ="";  $errors = array(); $id = 0;//set hidden message defalt to 0
$update = false; 
//$conn = new conn("localhost", "root", "", "merrylandschool") or die(mysqli_error($conn));

if(isset($_POST['save'])){
    //Collect user's input from the form into regular variables
$firstname = mysqli_real_escape_string($conn,$_POST['firstname']); 
$surname = mysqli_real_escape_string($conn,$_POST['surname']); 
$email = mysqli_real_escape_string($conn,$_POST['email']);  
$purpose = "Registration Fee";
$time = time();
$day = date("dmY");
$reference = "ACPS$day$time";
$amount = $form_price;
$vkey = md5($firstname.$email);   

    $conn->query("INSERT INTO  reg_fee (firstname, surname, email, purpose, amount, vkey, reference) 
    VALUES('$firstname', '$surname', '$email', '$purpose', '$amount', '$vkey', '$reference')") 
    or die($conn->error);

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";//Message saved background

    header("location: student.php");
}



if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $conn->query("SELECT * FROM reg_fee WHERE id=$id") or die($conn->error());
        if (count($result)==1){
        $row = $result->fetch_array();
        $firstname = $row['firstname'];
        $surname = $row['surname'];
        $email = $row['email'];
        $purpose = $row['purpose'];
        $amount = $row['amount'];
        $vkey = $row['vkey'];
        $reference = $row['reference'];       
    }
}

if(isset($_GET['delete']))
{
    $id = $_GET['delete'];
    $conn->query("DELETE FROM reg_fee WHERE id=$id") or die($conn->error());
    
    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";//Message delete background

    header("location: student.php");
}

if (isset($_POST['update']))
{
    $id = $_POST['id'];
    $firstname = mysqli_real_escape_string($conn,$_POST['firstname']); 
    $surname = mysqli_real_escape_string($conn,$_POST['surname']); 
    $email = mysqli_real_escape_string($conn,$_POST['email']);  
    $purpose = "Registration Fee";
    $time = time();
    $day = date("dmY");
    $reference = "ACPS$day$time";
    $amount = $form_price;
    $vkey = md5($firstname.$email);   
    
    $conn->query("UPDATE reg_fee SET firstname ='$firstname', surname ='$surname', email ='$email', purpose ='$purpose', reference ='$reference' WHERE id=$id") or die($conn->error);

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";//Message update background

    header("location: student.php");
}


 
if(isset($_POST["manual-reg"]))
{
    if($_FILES['file']['name'])
    {
     $filename = explode(".", $_FILES['file']['name']);
     if($filename[1] == 'csv')
     {
      $handle = fopen($_FILES['file']['tmp_name'], "r");
      while($data = fgetcsv($handle))//handling csv file 
      {
    //DATA FROM EXCEL TABLE...
    $firstname = mysqli_real_escape_string($conn, $data[0]);  
    $surname = mysqli_real_escape_string($conn, $data[1]);
    $username = mysqli_real_escape_string($conn, $data[2]);
    $email = mysqli_real_escape_string($conn, $data[3]);
    $class = mysqli_real_escape_string($conn, $data[4]);
    $date = date('d/m/y');
    $ref = "ACPS";
    $id = uniqid();
    $reference = "$ref$id";
    $pass = md5($firstname.$email);
    $token = md5($pass.$username);
    
    //To CHECK IF THE SUBMITTED Email Already EXIST
    $userQuery = "SELECT * FROM student WHERE email=? LIMIT 1";
    $stmt = $conn->prepare($userQuery);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->num_rows;
    $stmt->close();
        
//IF email already EXIST...
if($user > 0){
    echo "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='shortcut icon' type='image/png' href='".$sch_logo."'>
    <link rel='stylesheet' href='../css/open-iconic-bootstrap.min.css'>
    <link rel='stylesheet' href='../css/animate.css'>
    
    <link rel='stylesheet' href='../css/owl.carousel.min.css'>
    <link rel='stylesheet' href='../css/owl.theme.default.min.css'>
    <link rel='stylesheet' href='../css/magnific-popup.css'>

    <link rel='stylesheet' href='../css/aos.css'>

    <link rel='stylesheet' href='../css/ionicons.min.css'>
    <link rel='stylesheet' href='../css/profile.css'>
    <link rel='stylesheet' href='../css/flaticon.css'>
    <link rel='stylesheet' href='../css/icomoon.css'>
    <link rel='stylesheet' href='../css/style.css'>
	<link rel='stylesheet' href='../css/animations.css'>
	<link rel='stylesheet' href='../css/modals.css'>
    <title>Error Message</title>
</head>
<body class='container alert alert-warning' style='margin:0px auto;padding:10px;margin-top:100px;width:50%;border-radius:20px;
border-bottom: 2px solid purple; box-shadow:grey 1px 5px 10px 0px;'>
    <p>$firstname $surname, $email already exist, please kindly choose another email!</p>
</body>
</html>";
}
    

//To CHECK IF THE SUBMITTED Email Already EXIST
$usernameQuery = "SELECT * FROM student WHERE username=? LIMIT 1";
$stmt = $conn->prepare($usernameQuery);
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();
$user2 = $result->num_rows;
$stmt->close();
    
//IF Username already EXIST...
if($user2 > 0){
echo "
<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='UTF-8'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<link rel='shortcut icon' type='image/png' href='".$sch_logo."'>
<link rel='stylesheet' href='../css/open-iconic-bootstrap.min.css'>
<link rel='stylesheet' href='../css/animate.css'>

<link rel='stylesheet' href='../css/owl.carousel.min.css'>
<link rel='stylesheet' href='../css/owl.theme.default.min.css'>
<link rel='stylesheet' href='../css/magnific-popup.css'>

<link rel='stylesheet' href='../css/aos.css'>

<link rel='stylesheet' href='../css/ionicons.min.css'>
<link rel='stylesheet' href='../css/profile.css'>
<link rel='stylesheet' href='../css/flaticon.css'>
<link rel='stylesheet' href='../css/icomoon.css'>
<link rel='stylesheet' href='../css/style.css'>
<link rel='stylesheet' href='../css/animations.css'>
<link rel='stylesheet' href='../css/modals.css'>
<title>Error Message</title>
</head>
<body class='container alert alert-warning' style='margin:0px auto;padding:10px;margin-top:100px;width:50%;border-radius:20px;
border-bottom: 2px solid purple; box-shadow:grey 1px 5px 10px 0px;'>
<p>$firstname $surname, <strong>$username</strong> already exist, please kindly choose another username!</p>
</body>
</html>";
}
else{
    //ELSE...
    //insert data from CSV file 
    $default_pass = "acps12";
    $password = password_hash($default_pass, PASSWORD_DEFAULT);
    $query = $conn->query("INSERT INTO  student (firstname, surname, username, email, class, reg_date, reference, token, session, password)
     VALUES('$firstname', '$surname', '$username', '$email', '$class', '$date', '$reference', '$token', '$current_session', '$password')") 
    or die($conn->error);

    $current_term_1 = "First Term";
    $current_term_2 = "Second Term";
    $current_term_3 = "Third Term";

//IF CURRENT TERM IS THESAME AS FIRST TERM
if($current_term == $current_term_1 ){
       //STUDENT PERSONAL FIRST TERM BILL
        $query1= "INSERT INTO my_bill (class, username, firstname, token, session)	
        VALUES ('$class', '$username', '$firstname', '$token', '$current_session')";
				if(!mysqli_query($conn, $query1)){
                die ('Error:' .mysqli_error($conn));
                    }
        //STUDENT PERSONAL SECOND TERM BILL
          $query2= "INSERT INTO second_term_bill (class, username, firstname, token, session)	
          VALUES ('$class', '$username', '$firstname', '$token', '$current_session')";
                  if(!mysqli_query($conn, $query2)){
                  die ('Error:' .mysqli_error($conn));
                      }


        //STUDENT PERSONAL THIRD TERM BILL
        $query3= "INSERT INTO third_term_bill (class, username, firstname, token, session)	
        VALUES ('$class', '$username', '$firstname', '$token', '$current_session')";
				if(!mysqli_query($conn, $query3)){
                die ('Error:' .mysqli_error($conn));
                
                }
    $_SESSION['message'] = "Students' Info have successfully been Uploaded!";
    $_SESSION['msg_type'] = "success";//Message saved background
    header("location: student.php");
            }

            if($current_term == $current_term_2 ){
                 //STUDENT PERSONAL SECOND TERM BILL
                   $query2= "INSERT INTO second_term_bill (class, username, firstname, token, session)	
                   VALUES ('$class', '$username', '$firstname', '$token', '$current_session')";
                           if(!mysqli_query($conn, $query2)){
                           die ('Error:' .mysqli_error($conn));
                               }
         
         
                 //STUDENT PERSONAL THIRD TERM BILL
                 $query3= "INSERT INTO third_term_bill (class, username, firstname, token, session)	
                 VALUES ('$class', '$username', '$firstname', '$token', '$current_session')";
                         if(!mysqli_query($conn, $query3)){
                         die ('Error:' .mysqli_error($conn));
                         
                         }
             $_SESSION['message'] = "Students' Info have successfully been Uploaded!";
             $_SESSION['msg_type'] = "success";//Message saved background
             header("location: student.php");
                     }

                     if($current_term == $current_term_3 ){
                        //STUDENT PERSONAL THIRD TERM BILL
                        $query3= "INSERT INTO third_term_bill (class, username, firstname, token, session)	
                        VALUES ('$class', '$username', '$firstname', '$token', '$current_session')";
                                if(!mysqli_query($conn, $query3)){
                                die ('Error:' .mysqli_error($conn));
                                
                                }
                    $_SESSION['message'] = "Students' Info have successfully been Uploaded!";
                    $_SESSION['msg_type'] = "success";//Message saved background
                    header("location: student.php");
                            }
            }
        }
 
       }
   
    }
 }
?>

<div class=""><a href="student.php" class="btn btn-primary">Back</a></div>