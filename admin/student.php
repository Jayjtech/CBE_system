<?php
 require "../config/db.php";
 error_reporting(0);
 $result =$conn->query("SELECT * FROM student");
 $countRes = $result->num_rows;
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



    
<h4 class="text-center">Student Details</h4>
<div class="container Scrollbar ftco-animate" style="overflow-x:auto; font-size:15px;">

<?php
if(isset($_SESSION['message'])): ?>

    <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
    </div>
    <?php endif ?>
    <?php 
    if ($countRes == 0){
        echo "<div class='alert alert-danger'>Student's table is Empty!</div>";
    }else{
    ?>
    <a href="student_pro.php?Delete=1" class="btn btn-danger">Delete all</a>
        <table class="table" border="1">
            <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>UserN</th>
                        <th>Phone Number</th>
                        <th>Gender</th>
                        <th>key</th>
                        <th>Img</th>
                        <th>Class</th>
                        <th>Reg D./ Session</th>
                        <th colspan="2">Action</th>
                    </tr>
            </thead>

 
            <?php echo $row['p_image']; ?>       
<?php
while($row = $result->fetch_assoc()):?>
    <tr>
        <td><?php echo $row['fullname']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['username']; ?></td>
        <td><?php echo $row['phone']; ?></td>
        <td><?php echo $row['gender']; ?></td>
        <td><?php echo $row['keyp']; ?></td>
        <td><img class="pic" src="../<?php echo $row['p_image']; ?>"></td>
        <td><?php echo $row['class']; ?></td>
        <td><?php echo $row['reg_date']; ?> / <?php echo $row['session']; ?></td>
        <td>
            <form action="student_pro.php" method="post">
                <input style="display:none;" type="text" name="user" value="<?php echo $row['username'];?>">
                <input class="btn btn-danger" style="font-size:10px;" type="submit" name="pick" value="Delete">
            </form>
        </td>
    </tr>
<?php endwhile; ?>
        </table>
    </div>
    
<section>
<?php 
    }
    echo "</div>"
?>
<br><br>

<?php include "footer.php"; ?>
  

  


     