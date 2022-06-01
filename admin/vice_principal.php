<?php 
require 'admin_controller.php';
$position = "Vice Principal";
$username = $_SESSION['username'];
$_SESSION['page'] = "p_profile.php";
if($_SESSION['position'] !== $position) {
    header('location: admin_login.php');
}else{
    $title = $conn->query("SELECT * FROM admin_table WHERE username='$username'");
    while($row = $title->fetch_assoc()){
        $gender = $row['gender'];
    }
$mr = "Male";
$mrs = "Female";
    if($gender == $mr){
        $title = "Mr. ";
    }else{
        $title = "Mrs. ";
    }
?>
<!DOCTYPE html>
 <head style="flex-wrapper:wrap; min-width:30px;">
    <title>My Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootsrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="shortcut icon" href="https://maxcdn.bootstrapcdn.com/bootsrap/3.3.6/" type="image/x-icon">
    <link rel="stylesheet" href="css/modals.css">
   
    <script src="js/java.js"></script>
    <?php include "header.php" ;?>
    <?php include "t_sidebar.php";?>
	   <!-- END NAV    -->
       <section>
    <div class="col-lg-6 container" >
        <h4 class="text-center">
        Welcome back <strong style="text-transform: capitalize;">
        <?php echo $title; ?> <?php echo $_SESSION['name']; ?> <br></strong></h4></div>
    <div>
 </section>      
          
    <section>
<!--My profile details-->
<main class="container" id="Scrollbar" style="flex-wrap:wrap; 
margin-top: 50px; margin-bottom: 400px; margin-left:15%; margin-right:10px; max-width:70%;">   
    <div class="container" style="max-width: 100%;">
        <div>
            <div class="modals_close-bar">
                <button class="btn btn-danger" onclick="toggleClose()" style="font-weight: bold; max-width: 100%; 
                margin-left:300px;">X</button>
            </div>
             

        <div class="form-group" style="border-bottom: 1px solid purple;max-width: 100%; min-width: 10px;">
            <p><strong>Name : </strong><?php echo $title; ?><?php echo  $_SESSION['surname'];?> <?php echo  $_SESSION['name'];?> </p>
        </div> 

        <div class="form-group" style="border-bottom: 1px solid purple;max-width: 100%; min-width: 10px;">
            <p><strong>Post : </strong><?php echo $_SESSION['position']; ?></p>
        </div> 

        <div class="form-group" style="border-bottom: 1px solid purple;max-width: 100%; min-width: 10px;">
            <p><strong>Username :  </strong><?php echo $_SESSION['username']; ?></p>
        </div> 

        <div class="form-group" style="border-bottom: 1px solid purple;max-width: 100%; min-width: 10px;">
            <p><strong>Gender :  </strong><?php echo $_SESSION['gender']; ?></p>
        </div> 

        <div class="form-group" style="border-bottom: 1px solid purple;max-width: 100%; min-width: 10px;">
            <p><strong>Email :  </strong><?php echo $_SESSION['email']; ?></p>
        </div> 
            
        </div>
        </div>
    </main>
 </section> 




    <section style="float: right; width:100%;">
        <?php include "footer.php" ;?>
    </section>

    <?php
}
?>