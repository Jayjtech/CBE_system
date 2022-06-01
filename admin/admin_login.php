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
	        	<li class="nav-item active"><a href="../index.php" class="nav-link pl-0">Home</a></li>
	        	<li class="nav-item active"><a href="admin_signup.php" class="nav-link pl-0">Staff Sign Up</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    <h3  class="text-center">Welcome to <?php echo $sch_name?></h3>
    <h4 class="text-center"><?php echo $sch_name2?></h4>

    <div class="container ftco-animate" style="margin-top:50px;">
        <div class="row">
            <div class="col-md-4 offset-md-4 form-div">
                <form action="" method="post">
                    <h3 class="text-center">Staff Login</h3>
                   
                    <?php if(count($errors) > 0): ?>
                    <div class="alert alert-danger">
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
                    <label for="username">Username</label>
                        <input type="text" name="username" value="<?php echo $username; ?>" class="form-control form-control-lg">
                    </div>

                   
                    <div class="form-group">
                    <label for="password">Password</label>
                        <input type="password" name="password" class="form-control form-control-lg">
                    </div>

                    <div class="form-group">
                    </i> <label for="password">Select Post</label>
                        <select class="form-control" name="position" required>
                            <option value="Proprietor">Proprietor</option>
                            <option value="Principal">Principal</option>
                            <option value="Vice Principal">Vice Principal</option>
                            <option value="Head Teacher">Head Teacher</option>
                            <option value="Teacher">Teacher</option>
                        </select>
                    </div>
                    
                   
                    <div class="form-group">
                       <input type="submit" class="btn btn-primary " value="Login" name="login-btn">
                    </div>
                  
                </form>
            </div>
        </div>
    </div>
    <br><br>
    
    <?php include "footer.php";?>