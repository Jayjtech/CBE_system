<?php 
require_once 'admin_controller.php';
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $sch_name;?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
	<?php include "header.php" ;?>
  <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="<?php echo $_SESSION['page'];?>" class="nav-link pl-0">Back</a></li>
                <li class="nav-item active"><a href="../index.php" class="nav-link pl-0">Home</a></li>
                <li class="nav-item active"><a href="admin_login.php" class="nav-link pl-0">Login</a></li>
	        	<li class="nav-item active"><a href="admin_signup.php" class="nav-link pl-0">Staff Sign Up</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    <div class="ftco-animate container" style="margin-top:50px;">
        <div class="row">
            <div class="col-md-4 offset-md-4 form-div">
                <form action="" method="post">
                    <h3 class="text-center">Admin Sign-Up</h3>
                   
                    <?php if(count($errors) > 0): ?>
                    <div class="ftco-animate alert alert-danger">
                        <?php foreach($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                     <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                    
            <?php
                  if(isset($_SESSION['message'])): ?>
                  <div class="ftco-animate alert alert-<?=$_SESSION['msg_type']?>">
                  <?php
                  echo $_SESSION['message'];
                  unset($_SESSION['message']);
                  ?>
                </div>
              <?php endif ?>
              
              <div class="form-group">  
                      <select class="form-control" name="name" required>
                        <option value="">Select Your Name</option>
                        <?php 
                        $class = $conn->query("SELECT * FROM teacher_reg_key");
                          while($row = $class->fetch_assoc()){
                        ?>
                          <option value="<?php echo $row['name'];?>"><?php echo $row['name'];}?>  
                        </option>
                      </select>
                </div>

              <div class="form-group">  
                      <select class="form-control" name="surname" required>
                        <option value="">Select Your Surname</option>
                        <?php 
                        $class = $conn->query("SELECT * FROM teacher_reg_key");
                          while($row = $class->fetch_assoc()){
                        ?>
                          <option value="<?php echo $row['surname'];?>"><?php echo $row['surname'];}?> 
                        </option>
                      </select>
                </div>

                    <div class="form-group">
                        <input type="text" name="username" placeholder="Your Username..." value="<?php echo $username; ?>" class="form-control form-control-lg">
                    </div>

                    <div class="form-group">  
                      <select class="form-control" name="email" required>
                        <option value="">Select Your Email</option>
                        <?php 
                        $class = $conn->query("SELECT * FROM teacher_reg_key");
                          while($row = $class->fetch_assoc()){
                        ?>
                          <option value="<?php echo $row['email'];?>"><?php echo $row['email'];}?></option>
                      </select>
                </div>


                    <div class="form-group">
                        <select class="form-control" name="gender" required>
                            <option value="">Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                   
                    <div class="form-group">
                        <input type="password" name="password"  placeholder="Password" value="<?php echo $password; ?>" class="form-control form-control-lg">
                    </div>

                    <div class="form-group">
                        <input type="password" name="passwordConf" placeholder="Confirm password" value="<?php echo $password; ?>" class="form-control form-control-lg">
                    </div>
                   
                    <div class="form-group">
                       <input type="submit" class="btn btn-primary " value="Sign Up" name="register">
                    </div>
                  
                </form>
            </div>
        </div>
    </div>
    <br><br>
    <?php include "footer.php";?>
