<?php
 require "curr_term.php";
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

<div class="row">
<div class="col-lg-6">
                <?php
                  if(isset($_SESSION['message'])): ?>
                  <div class="alert alert-<?=$_SESSION['msg_type']?>">
                  <?php
                  echo $_SESSION['message'];
                  unset($_SESSION['message']);
                  ?>
                </div>
              <?php endif ?>

    <div class="ftco-animate " style="margin-bottom:20px;
        padding:10px; border-radius:20px; border-bottom: 2px solid <?php echo $header_col;?>;
         box-shadow:grey 1px 5px 10px 0px;">
        <form action="term_updator.php" method="POST" >
        <h4 class="text-center">Update Current Session and Term</h4>
        <p>Click Edit on the display table to Update</p>
<div class="" style="overflow-x:auto;" >
<h3 class="text-center">School Current Session and Term</h3>
        <table class="table">
            <thead>
                    <tr>
                        <th>C. Session</th>
                        <th>C. Term</th>
                        <th>Action</th>
                    </tr>
            </thead>

 
       
<?php
$result =$conn->query("SELECT * FROM school_term");
while($row = $result->fetch_assoc()):?>
    <tr>
        <td><strong><?php echo $row['session']; ?></strong></td>
        <td><strong><?php echo $row['sch_term']; ?></strong></td>
        <td>
            <a style="font-size:12px;" href="term_updator.php?edit=<?php echo $row['T_id']; ?>" class="btn btn-info">Edit</a>
        </td>
    </tr>
<?php endwhile; ?>
        </table>
    </div>
            <!--hidden message for update-->
            <input type="hidden" name="T_id" value="<?php echo $T_id; ?>">
            <!--end of hidden mesage-->

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


            <div class="form-group" style=" ">
                <select name="sch_term" class="form-control" required>
                    <option value="<?php echo $sch_term; ?>">Select Term</option>
                    <option value="First Term">First Term</option>
                    <option value="Second Term">Second Term</option>
                    <option value="Third Term">Third Term</option>
                </select>
            </div>
            
            <div class="form-group" style="">
            <?php
                if ($update == true):
            ?>
                <button type="submit" class="btn btn-info" name="update">Update</button>
                <?php else: ?>   
                <button style="display:none; margin-left: 50px;" type="submit" class="btn btn-primary" name="save">Publish</button>
                <?php endif ?>
            </div>
            </form>
        </div>
    </div>
    
    <div class="col-lg-6">
        <div class="ftco-animate Scrollbar" style="margin-bottom:20px;
        padding:10px; border-radius:20px; border-bottom: 2px solid <?php echo $header_col;?>;
         box-shadow:grey 1px 5px 10px 0px; height:400px;">
        <form action="class.php" method="POST" >
        <h4 class="text-center">Add class</h4>
            <!--hidden message for update-->
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <!--end of hidden mesage-->

            <div class="form-group" style=" ">
                <select name="class" class="form-control" required>
                    <option value="<?php echo $sch_term; ?>">Select Class</option>
                    <option value="Daycare">Daycare</option>
                    <option value="Creche">Creche</option>
                    <option value="Kindergaten-I">Kindergaten-I</option>
                    <option value="Kindergaten-II">Kindergaten-II</option>
                    <option value="Nursery-I">Nursery-I</option>
                    <option value="Nursery-II">Nursery-II</option>
                    <option value="Primary-1">Primary-1</option>
                    <option value="Primary-2">Primary-2</option>
                    <option value="Primary-3">Primary-3</option>
                    <option value="Primary-4">Primary-4</option>
                    <option value="Primary-5">Primary-5</option>
                    <option value="JSS-1">JSS-1</option>
                    <option value="JSS-2">JSS-2</option>
                    <option value="JSS-3">JSS-3</option>
                    <option value="SSS-1">SSS-1</option>
                    <option value="SSS-2">SSS-2</option>
                    <option value="SSS-3">SSS-3</option>
                </select>
            </div>

            
            <div class="form-group" style="max-width: 90%;">
                <button style=" margin-left: 50px;" type="submit" class="btn btn-primary" name="save">Add Class</button>
            </div>
                    <table class="table" border="1">
                        <thead>
                            <th>Class</th>
                            <th>Action</th>
                        </thead>
                        <?php 
                        $class = $conn->query("SELECT * FROM class_tbl");
                        while($row = $class->fetch_assoc()){
                            ?>
                            <tr>
                                <td><?php echo $row['class'];?></td>
                                <td>
                                    <a style="font-size:12px;" href="class.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
            </form>
                </div>
        </div>
        
        <div class="container col-lg-6 ">
        <div class="ftco-animate Scrollbar" style="margin-bottom:20px;
        padding:10px; border-radius:20px; border-bottom: 2px solid <?php echo $header_col;?>;
         box-shadow:grey 1px 5px 10px 0px; height:400px;">
        <form action="session.php" method="POST" >
        <h4 class="text-center">Add New Session</h4>
            <!--hidden message for update-->
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <!--end of hidden mesage-->

            <div class="form-group" style="max-width: 90%; ">
                <input type="text" class="form-control" name="session" placeholder="New session" required>
            </div>

            
            <div class="form-group" style="max-width: 90%;">
                <button style=" margin-left: 50px;" type="submit" class="btn btn-primary" name="add_session">Add Session</button>
            </div>

           
            <table class="table" border="1">
                        <thead>
                            <th>Class</th>
                            <th>Action</th>
                        </thead>
                        <?php 
                        $class = $conn->query("SELECT * FROM sch_session");
                        while($row = $class->fetch_assoc()){
                            ?>
                            <tr>
                                <td><?php echo $row['session'];?></td>
                                <td>
                                    <a style="font-size:12px;" href="class.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
            </form>
                </div>
        </div>
    </div>

    </div>


    
  

        </div>
</div>
<section class="" style="">
<?php include "footer.php"; ?>
  </section>

  