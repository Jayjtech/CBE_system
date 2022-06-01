<?php
 require "student_pro.php";
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Admin Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <link rel="stylesheet" href="css/modals.css">
    <link rel="stylesheet" href="css/log.css">
    <script src="js/java.js"></script>
    <?php include "header.php" ;?>
    
	<?php include "admin_navbar.php" ;?>

	     
<!-- END nav -->



<br><br><br>
<style>
 .avatar 
{
    width:50px;
    height:50px;
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

<div class="" style="margin: 3px 10px 10px 10px; font-size:10px;">
    
     <h1 class="text-center">Student Details</h1>

        <table class="table">
            <thead>
                    <tr>
                        <th>Name</th>
                        <th>UserN</th>
                        <th>Img</th>
                        <th>Class</th>
                        <th>DOB.</th>
                        <th>Reg D.</th>
                        <th>Parent's name</th>
                        <th>Tel.</th>
                        <th>Email</th>
                        <th>Ref.</th>
                        <th>S. of O</th>
                        <th>L.G.A.</th>
                        <th>Religion</th>
                        <th>Msg.</th>
                        <th colspan="2">Action</th>
                    </tr>
            </thead>

 
       
<?php
$result =$conn->query("SELECT * FROM student");
while($row = $result->fetch_assoc()):?>
    <tr>
        <td>
            <strong><?php echo $row['surname']; ?></strong>
            <strong><?php echo $row['firstname']; ?></strong>
            <strong><?php echo $row['middlename']; ?></strong>
        </td>
        <td><strong><?php echo $row['username']; ?></strong></td>
        <td><img class="pic" src="<?php echo $row['p_image']; ?>"></td>
        <td><strong><?php echo $row['class']; ?></strong></td>
        <td><strong><?php echo $row['birth_date']; ?></strong></td>
        <td><strong><?php echo $row['reg_date']; ?></strong></td>
        <td><strong><?php echo $row['pname']; ?></strong></td>
        <td><strong><?php echo $row['phone']; ?></strong></td>
        <td><strong><?php echo $row['email']; ?></strong></td>
        <td><strong><?php echo $row['reference']; ?></strong></td>
        <td><strong><?php echo $row['state']; ?></strong></td>
        <td><strong><?php echo $row['localgov']; ?></strong></td>
        <td><strong><?php echo $row['religion']; ?></strong></td>
        <td><strong><?php echo $row['reason']; ?></strong></td>
        <td>
            <a style="font-size:12px;" href="student_pro.php?delete=<?php echo $row['username']; ?>" class="btn btn-danger">Delete</a>
        </td>
    </tr>
<?php endwhile; ?>
        </table>
    </div>
    



    <section class="" style="">
<?php include "profile_footer.php"; ?>
  </section>

  


     