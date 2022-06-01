<?php
error_reporting(0);
require_once 'config/db.php';
$errors = array();
$token="";
$password="";
$passwordConf="";
$token = $_SESSION['student'];
if(isset($_POST['reset']))
{
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $passwordConf = mysqli_real_escape_string($conn,$_POST['passwordConf']);


if(empty($password)){
    $errors['password'] = "Password required!";
}
//if password and confirm pass. do not match
if($password !== $passwordConf){
    $errors['password'] = "The two passwords do not match!";
}

//To ensure that no two users have thesame username
$tokennameQuery = "SELECT * FROM student WHERE token='$token' LIMIT 1";
$stmt = $conn->prepare($tokennameQuery);
$stmt->bind_param('s', $tokenname);
$stmt->execute();
$result = $stmt->get_result();
$userCount = $result->num_rows;
$stmt->close();

if($userCount === 0){
   $errors['token'] = "Invalid Reset Code!"; 
}

if(count($errors) === 0) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    

    $query = $conn->query("UPDATE student SET password='$password' WHERE token='$token'") or die($conn->error);
    $message['success'] ="You have successfully reset your password!";
    
    }

    

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Reset Password</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootsrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="shortcut icon" href="https://maxcdn.bootstrapcdn.com/bootsrap/3.3.6/" type="image/x-icon">
    <?php include "header.php" ;?>
    <?php include "navbar.php" ;?>
    
    <?php include "header_2.php";?>
    
    
</head>
<body>
        <div class="container ftco-animate" style="width:50%; margin-top: 50px; margin-bottom: 150px;">
        <h1 class="text-center" style="max-width:90%; font-size:25px;">Reset Your Password</h1>
            <div class="container">
            <?php if(count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <?php foreach($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                     <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                    <?php if(count($message) > 0): ?>
                    <div class="alert alert-success">
                        <?php foreach($message as $good): ?>
                        <li><?php echo $good; ?></li>
                     <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
<?php
    if(!$query){
?>
                <form action="" method="POST">
                <div class="container" style="width: 90%; ">
                    <div class="form-group">
                        <input class="form-control" type="password" name="token" readonly value="<?php echo $token;?>" >
                    </div>
                </div>
               <div class="container" style="width:90%; ">
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Input New Password">
                    </div>
                </div>
                <div class="container" style="width:90%; ">
                    <div class="form-group">
                        <input class="form-control" type="password" name="passwordConf" placeholder="Confirm New Password">
                    </div>
                </div>
                <div class="container" style="width:50%; ">
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="reset" value="Reset Your Password">
                    </div>
                    </div>
                 </form>
    <?php }?>
            </div>
            </div>

<section>
    <?php include "footer.php" ;?>
</section>