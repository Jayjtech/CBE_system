<?php 
require "../config/db.php";       
if($_SESSION['position'] !== "Principal") {
  header('location: teacher_profile.php');
}
$tm_tbl =$conn->query("SELECT * FROM $time_table");
$total_tm_tbl = $tm_tbl->num_rows;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $sch_name;?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
	<?php include "header.php" ;?>
  <?php include "admin_navbar.php" ;?>
<body>
  <div class="container mb-5">
                <?php
                  if(isset($_SESSION['message'])): ?>
                  <div class="alert alert-<?=$_SESSION['msg_type']?>">
                  <?php
                  echo $_SESSION['message'];
                  unset($_SESSION['message']);
                  ?>
                </div>
              <?php endif ?>
        <div class="row">
            <div class="col-lg-6 ftco-animate" style="overflow-x:auto;
        padding:10px; border-radius:20px; border-bottom: 2px solid <?php echo $header_col;?>;
         box-shadow:grey 1px 5px 10px 0px;">
          <?php
  if($total_tm_tbl <= 0){
    echo "<div class='container alert alert-warning' style='width:50%;margin:0 auto;'> $current_term
    Exam Time table is empty!</div>";
  }else{
  ?>
<h4 class="text-center"><?php echo $current_term;?> Exam Time Table</h4>
  <div class="container Scrollbar" style='height:200px;overflow-x:auto;'> 
<table class="table" border='1'>
        
            <thead>
                    <tr>
                        <th style='text-align:center;'>Class</th>
                        <th style='text-align:center;'>Subject</th>
                        <th style='text-align:center;'>Session</th>
                        <th style='text-align:center;'>Course Code</th>
                        <th style='text-align:center;'>Day</th>
                        <th style='text-align:center;'>Period</th>
                    </tr>
            </thead>
            
<?php

while($row = $tm_tbl->fetch_assoc()):?>
    <tr>
        <td style='text-align:center;'><strong><?php echo $row['class']; ?></strong></td>
        <td style='text-align:center;'><?php echo $row['subject']; ?></td>
        <td style='text-align:center;'><?php echo $row['session']; ?></td>
        <td style='text-align:center;'><?php echo $row['course_code']; ?></td>
        <td style='text-align:center;'><?php echo $row['day']; ?></td>
        <td style='text-align:center;'><?php echo $row['exam_order']; ?></td>
        <?php $gen_code = $row['gen_code'];?>
<?php endwhile; ?>
</tr>
        </table>
  </div>
  <div class="ftco-animate" style="overflow-x:auto; margin-bottom:20px;">
      <a href="exam_controller_pro.php?delete=<?php echo $gen_code;?>" style='' class=" btn btn-danger">Delete Time Table</a>
      <a href="../tm_tbl_pdf.php" style='' class=" btn btn-success">Create PDF</a>
  </div>
  <?php }?>
                <form action="exam_controller_pro.php" method="post" enctype="multipart/form-data">
                <a href="../export/export.php?table=<?php echo $time_table; ?>" class="col-lg-5" style="font-size:15px;color:#000;">Click here to Export time table Format 
        <span class="icon-download"></span></a>
                    <h4 class="text-center">Upload Exam Time Table</h4>
                <hr>
                <div class="form-group">  
                      <label>Select CSV File:</label>
                      <input class="btn btn-primary" style="width:80%;" type="file" name="file" required/>
                      <input type="hidden" name="session" value="<?php echo $current_session;?>">
                </div>
            
                <div class="form-group">  
                      <input type="submit" class="btn btn-success" name="submit" value="Upload">
                </div>
                </form>
            </div>
  
            <div class="col-lg-6 ftco-animate" style="overflow-x:auto;
        padding:10px; border-radius:20px; border-bottom: 2px solid <?php echo $header_col;?>;
         box-shadow:grey 1px 5px 10px 0px;">
                <form action="exam_controller_pro.php" method="post" enctype="multipart/form-data">
              <h3 class="text-center">Set Exam for the current period</h3>
        <table class="table" border='1'>
        <h4 class="text-center">Current Exam DAY and PERIOD</h4>
            <thead>
                    <tr>
                        <th>DAY</th>
                        <th>PERIOD</th>
                    </tr>
            </thead>

<?php
$result =$conn->query("SELECT * FROM exam_controller");
while($row = $result->fetch_assoc()):?>
    <tr>
        <td><strong><?php echo $row['day']; ?></strong></td>
        <td><strong><?php echo $row['exam_order']; ?></strong></td>
<?php endwhile; ?>
</tr>
        </table>

                    <h4 class="text-center">Set Exam Date</h4>
                    <p>Set Exam for the Day and publish</p>
                    <hr>
                    <div class="form-group">  
                      <select class="form-control" name="day" required>
                        <option value="">Select Exam Day</option>
                        <option value="null">Null</option>
                        <option value="day_1">day_1</option>
                        <option value="day_2">day_2</option>
			<option value="day_3">day_3</option>
                        <option value="day_4">day_4</option>
                        <option value="day_5">day_5</option>
                        <option value="day_6">day_6</option>
                        <option value="day_7">day_7</option>
                        <option value="day_8">day_8</option>
                        <option value="day_9">day_9</option>
                        <option value="day_10">day_10</option>
                        <option value="day_11">day_11</option>
                        <option value="day_12">day_12</option>
                        <option value="day_13">day_13</option>
                        <option value="day_14">day_14</option>
                      </select>
                </div>
                <hr>

                <div class="form-group">  
                      <select class="form-control" name="exam_order" required>
                        <option value="">Select Exam Order</option>
                        <option value="null">Null</option>
                        <option value="FIRST">FIRST</option>
                        <option value="SECOND">SECOND</option>
                        <option value="THIRD">THIRD</option>
                        <option value="FOURTH">FOURTH</option>
                        <option value="FIFTH">FIFTH</option>
                        
                      </select>
                </div>
                <hr>
                <div class="form-group">
                    <input type="submit" class="btn btn-info" value="Publish" name="publish">
                </div>

                    
                </form>
            </div>
      </div>
</div>
</div>
</div>
<?php include "footer.php";?>