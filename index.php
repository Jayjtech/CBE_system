<?php 
require_once 'controllers/authcontroller.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <title><?php echo $sch_name; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
	<?php include "header.php" ;?>
    <?php include "navbar.php" ;?>
    <!-- END nav -->
    <?php include "header_2.php";?>
    <h3  class="text-center">Welcome to <?php echo $sch_name?></h3>
    <h4 class="text-center"><?php echo $sch_name2?></h4>
    <marquee direction="right" style="margin-top:25px;font-size:20px;"><p><strong>Current Term:</strong> <?php echo $current_term; ?></p></marquee>
    <div class="container ftco-animate">
        <div class="row">
            <div class="col-md-4 offset-md-4 form-div">
                <form action="" method="post">
                    <h3 class="text-center">Student Login</h3>
                   
                    <?php if(count($errors) > 0): ?>
                    <div class="ftco-animate alert alert-danger">
                        <?php foreach($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                     <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                    
                    <div class="form-group">
                    <i  class="fas fa-user"></i> <label for="username">Username or Email</label>
                        <input type="text" name="username" value="<?php echo $username; ?>" class="form-control form-control-lg">
                    </div>

                   
                    <div class="form-group">
                    <i  class="fas fa-lock"></i> <label for="password">Password</label>
                        <input type="password" name="password" class="form-control form-control-lg">
                    </div>
                    
                    <div class="form-group">
                        <select name="term" class="form-control" required>
                            <option value="First Term">First Term</option>
                            <option value="Second Term">Second Term</option>
                            <option value="Third Term">Third Term</option>
                        </select>
                    </div>
                    

                    <div class="form-group">
                   <select name="session" class="form-control" required>
                       <option value="">Select Session</option>
                       <?php
                       $query = $conn->query("SELECT * FROM sch_session");
                       while($row = $query->fetch_assoc()){
                       ?>
                       <option value="<?php echo $row['session'];?>"><?php echo $row['session'];}?></option>
                   </select>
                    </div>
                    
                   
                    <div class="form-group">
                       <input type="submit" class="btn btn-primary " value="Login" name="login-btn">
                    </div>
                    <p class="text-center">Not yet a member?<a href="signup"> Sign up</a></p>
                    <div style="font-size: 0.8em; text-align: center;">
                    <a href="forgot_password.php">Forgot your password?</a></div>
                </form>
            </div>
        </div>
    </div>


  
    <br><br>
    <?php include "footer.php" ;?>