<?php
require_once '../config/db.php';
$errors = array();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Admin password reset</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php include "header.php" ;?>
	<?php include "admin_navbar.php" ;?>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item active"><a href="../index.php" class="nav-link pl-0">Home</a></li>
			</ul>
	      </div>
	    </div>
	  </nav>
<!-- END nav -->

<body>

    <section>
     

    <div class="ftco-animate col-lg-6 mt-5 mb-5" style="margin:0 auto;">
        <h4 class="text-center alert alert-info">Admin Password Reset</h4>   
            <div class="container">            
                <p class="alert-warning" style=" padding:10px; border-radius:10px;">
                 Confirm Previous Administration details.</p>
            </div>

    <form action="reset_admin_pro.php" method="post">
    <?php if(count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <?php foreach($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                     <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Name"  required/>
        </div>
    
        <div class="form-group">
            <input type="text" class="form-control" name="surname" placeholder="Surname"  required/>
        </div>

        <div class="form-group">
            <input type="text" class="form-control" name="email" placeholder="Email" required/>
        </div>

        <div class="form-group">
            <input type="submit" name="forgot-password" class="btn btn-primary" value="Verify Details">
        </div>
    </form>
    </div>

</section>


<section>
    <?php include "footer.php" ;?>
</section>