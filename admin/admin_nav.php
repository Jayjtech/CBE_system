<?php
require_once 'admin_controller.php';
 $position = "Proprietor";
 if($_SESSION['position'] !== $position) {
    header('location: admin_login.php');
}else{
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Admin Navigator</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/modals.css">
    <link rel="stylesheet" href="css/log.css">
    <script src="js/java.js"></script>
    <?php include "header.php" ;?>
    
    <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="logout.php" class="nav-link">Log Out</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
<!-- <End of Navbar> -->
	     
<div class="container" style="margin-top:50px;">
<h3 class="text-center" style="max-width:70%; margin:0 auto;">Welcome to <?php echo $sch_name;?> Administration Navigator</h3><br>
    <div class="row ftco-animate" >
    <div class="col-lg-6 ftco-animate" style="text-align:center;">
    <h4 class="text-center">Admin</h4>
        <div class="form-group">
            <a class="btn btn-danger" style="font-size:12px;" href="reset_admin.php">Change Admin Username and Password</a>
        </div>

        <div class="form-group">
            <a class="btn btn-info" style="font-size:12px;" href="my_teachers.php">Create token for my Staff</a>
        </div>

        <div class="form-group">
            <a class="btn btn-info" style="font-size:12px;" href="teacher_details.php">Staff Details</a>
        </div>

        <div class="form-group">
            <a class="btn btn-success" style="font-size:12px;" href="edit_sch_details.php">Edit School Informations</a>
        </div>

        <div class="form-group">
            <a class="btn btn-warning" style="font-size:12px;" href="term_updator.php">Update Session & Term</a>
        </div>
    </div>
  
     <div class="col-lg-6 ftco-animate" style="text-align:center;">
        <h4 class="text-center">Documents and Files</h4>
       
        <div class="form-group">
            <a class="btn btn-success" style="font-size:12px;" href="question_uploader.php">Upload Exam Questions</a>
        </div>

        <div class="form-group">
            <a class="btn btn-dark" style="font-size:12px;" href="exam_controller.php">Exam Controller</a>
        </div>

        <div class="form-group">
            <a class="btn btn-success" style="font-size:12px;" href="pre_result.php">Prepare My student's results</a>
        </div>

        <div class="form-group">
            <a class="btn btn-success" style="font-size:12px;" href="student.php">Students</a>
        </div>
    </div>

        

    </div>
</div>

<?php 

 }
?>
<br><br><br>

<?php include "footer.php";?>