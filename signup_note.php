<?php
require "config/db.php";
$fullname = $_SESSION["fullname"];
$email = $_SESSION["email"];
$phone = $_SESSION["phone"];
$username = $_SESSION["username"];
$page = "index.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Sign Up Note</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootsrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="shortcut icon" href="https://maxcdn.bootstrapcdn.com/bootsrap/3.3.6/" type="image/x-icon">
    <link rel="stylesheet" href="css/modals.css">
    
    <?php include "header.php" ;?>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item active"><a href="logout.php" class="nav-link pl-0">Log Out</a></li>
			</ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <div class="container" style="margin-bottom: 80px;">
    <div class="row justify-content-center" style="margin: 0 auto; margin-top: 50px; border: 1px solid purple;
    padding: 20px; border-radius: 15px; max-width:90%; background-color: #ffffe0; box-shadow: 1px 6px 8px 0px;">
        <div class="container" style="border: 1px solid purple; flex-wrap:wrap;
    padding: 20px; border-radius: 15px;"> <h2 class="text-center">
    <div class="alert-success" style="text-align:center;padding:20px; border-radius:10px;"> Hello <?php echo $fullname;?>, 
    you have successfully signed up!</div></p>
       <p class="text-center"><em style="max-width:30%;"><strong>Welcome to <?php echo $sch_name;?>, CBT system</strong></em></p>
       <br>Your Username: <?php echo $username; ?>
       <br>Your Email: <?php echo $email; ?>
        <br><a href="<?php echo $page;?>" class="btn btn-primary">Login</a>
   </div>
   </div>
   </div>

   <?php include "footer.php";?>