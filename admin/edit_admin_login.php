<?php
 require "../config/db.php";
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Admin Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script type="text/javascript">
	        function previewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("teach_img").files[0]);

            oFReader.onload = function (oFREvent) {
                document.getElementById("uploadPreview").src = oFREvent.target.result;
            };
		};
        
    </script>

	<?php include "header.php" ;?>
	<?php include "admin_navbar.php" ;?>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item active"><a href="index.php" class="nav-link pl-0">Home</a></li>
			</ul>
	      </div>
	    </div>
	  </nav>
<!-- END nav -->



<style>
 .avatar 
{
    max-width:30%;
    max-height:30%;
    border: 1px solid green;
	margin-left: px;
	border-radius: 10px;
}

</style>


<?php
if(isset($_SESSION['message'])): ?>

    <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
    </div>
    <?php endif ?>
<br><br><br>

<div class="justify-content-center" style="margin-top: 20px;">
    <form action="admin_controller.php" method="POST" >
    <div style="border: 1px solid black; border-radius:15px; padding:20px;">
    <!--hidden message for update-->
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <!--end of hidden mesage-->
    <div class="form-group" style="width: 90%; margin:0 auto;">
    <label for="">Admin Name</label>
        <input type="text" class="form-control" value="<?php echo $admin_name; ?>" 
        placeholder="Enter Admin Name..." name="admin_name"/>
    </div>
    
    <div class="form-group" style="width: 90%; margin:0 auto;">
    <label for="">Admin Username</label>
        <input type="text" class="form-control" value="<?php echo $admin_uname; ?>" 
        placeholder="Enter Admin Username..." name="admin_uname"/>
    </div>

    <div class="form-group" style="width: 90%; margin:0 auto;">
    <label for="">Admin Password </label>
        <input type="password" class="form-control" value="<?php echo $admin_pass; ?>" 
        placeholder="Enter Admin Password Name..." name="admin_pass"/>
    </div>

    <div class="form-group" style="width: 90%; margin:0 auto;">
    <label for="">Repeat Admin Password </label>
        <input type="password" class="form-control" value="<?php echo $re_admin_pass; ?>" 
        placeholder="Enter Admin Password Name..." name="re_admin_pass"/>
    </div>

    <div class="form-group" style="width: 90%;  margin:0 auto;">
    <?php
        if ($update == true):
    ?>
        <button type="submit" class="btn btn-info" name="update">Update</button>
        <?php else: ?>   
        <button type="submit" class="btn btn-primary" name="save">Save</button>
        <?php endif ?>
    </div>
</div>
    </form>
    </div>
    </div>