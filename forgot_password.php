<?php
require_once 'controllers/authcontroller.php';
//require_once 'reset.php';
error_reporting(0);
$firstname = "";
$username = "";
$email = "";
$errors = array();
$errors1 = array();
$token="";

if(isset($_POST['forgot-password'])){
    $firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pass = md5($firstname.$email);
    $token = md5($pass.$username);
   
     //To ensure that no two users have thesame username
     $tokennameQuery = "SELECT * FROM student WHERE token='$token' LIMIT 1";
     $stmt = $conn->prepare($tokennameQuery);
     $stmt->bind_param('s', $tokenname);
     $stmt->execute();
     $result = $stmt->get_result();
     $userCount = $result->num_rows;
     $stmt->close();
   
     
    $paragraph = "<p><strong>User Confirmed!</strong></h3>
                        <div> </div>";

    $result = $conn->query("SELECT * FROM student WHERE token = '$token' LIMIT 1");
                        while($row = $result->fetch_array())
                         {
                            $_SESSION['student'] = $row['token'];           
                        }
                        $token = $_SESSION['student'];

        if($userCount === 0){
            $errors['token'] = "User details not found!"; 
        }else{
                         
            header("location:reset.php");   
        }                           
}
 
?>



    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verify Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootsrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="shortcut icon" href="https://maxcdn.bootstrapcdn.com/bootsrap/3.3.6/" type="image/x-icon">
    <?php include "header.php" ;?>
    <?php include "navbar.php" ;?>
    
    <?php include "header_2.php";?>
    <!-- END nav -->
    
</head>
<body>

    <section>
     <h1 class="text-center" style="max-width:90%; font-size:25px;">User details verification</h1>
 <div class="container" style="width:90%; margin-top: 50px; ">
                 
        <div class="form-group">
                 
                 </div>
        </div>
    </div>

    <?php
    if($userCount == 0){
?>
    <div class="container ftco-animate" style="max-width: 90%; margin-bottom: 150px;">  
            
            <div class="container" style="max-width: 90%;">            
                <p class="alert-warning" style=" padding:10px; border-radius:10px;">
                 Please ensure that you fill in the exact details you submitted on your Admission Form.</p>
            </div>

    <form action="" method="post">
    <div class="container" style="max-width:90%;">
    <?php if(count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <?php foreach($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                     <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
    </div>

    <div class="container" style="max-width:90%;">
        <div class="form-group">
            <input type="text" class="form-control" name="firstname" placeholder="Student's firstname"  required/>
        </div>
    </div>
    
    <div class="container" style="max-width:90%;">
        <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Student's username"  required/>
        </div>
    </div>

    <div class="container" style="max-width:90%;">
        <div class="form-group">
            <input type="text" class="form-control" name="email" placeholder="Student's email" required/>
        </div>
    </div>

    <div class="container" style="max-width:90%;">
        <div class="form-group">
            <input type="submit" name="forgot-password" class="btn btn-primary" value="Verify Details">
            <?php if($userCount === 0){?>
                <a class="btn btn-success" href="forgot_password.php">Try Again <<</a>
           <?php }?>
        </div>
    </div>
    </form>
    </div>
<?php 
}
?>
</section>


<section>
    <?php include "footer.php" ;?>
</section>