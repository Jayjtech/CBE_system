<?php 
require "../config/db.php";      
$name = $_SESSION['name']; 
$_SESSION['page'] = "question_uploader.php";

$query = $conn->query("SELECT * FROM $answer_sheet WHERE teacher = '$name' AND session = '$current_session'");
$total_result = $query->num_rows;
$query_1 = $conn->query("SELECT * FROM class_tbl");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Alpha Care Merryland</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
	<?php include "header.php" ;?>
  <?php include "admin_navbar.php" ;?> 
<div class="container">
                <?php
                  if(isset($_SESSION['message'])): ?>
                  <div class="alert alert-<?=$_SESSION['msg_type']?>">
                  <?php
                  echo $_SESSION['message'];
                  unset($_SESSION['message']);
                  ?>
                </div>
              <?php endif ?>

  <h5 class="text-center alert alert-info">Result Table</h5>
<div class="container Scrollbar mb-5ftco-animate" style="overflow-x:auto; margin-bottom:20px;
        padding:10px; border-radius:20px; border-bottom: 2px solid <?php echo $header_col;?>;
         box-shadow:grey 1px 5px 10px 0px;height:400px;">
    <?php 
    if($total_result == 0){
      echo "<div class='container text-center mt-5 ftco-animate alert alert-warning' style='width:70%; margin:0 auto;'>
      $current_session Exam has not yet been taken</div>";
    }else{
    ?>
        <table class="table" border='1'>
            <thead>
                    <tr>
                        <th class="text-center" style="background:rgba(209, 23, 60,0.5);color:#fff;border:2px solid #000;">Class</th>
                        <th class="text-center" style="background:rgba(209, 23, 60,0.5);color:#fff;border:2px solid #000;">Username</th>
                        <th class="text-center" style="background:rgba(209, 23, 60,0.5);color:#fff;border:2px solid #000;">Admission No.</th>
                        <th class="text-center" style="background:rgba(209, 23, 60,0.5);color:#fff;border:2px solid #000;">Subject</th>
                        <th class="text-center" style="background:rgba(209, 23, 60,0.5);color:#fff;border:2px solid #000;">Course code</th>
                        <th class="text-center" style="background:rgba(209, 23, 60,0.5);color:#fff;border:2px solid #000;">Session</th>
                        <th class="text-center" style="background:rgba(209, 23, 60,0.5);color:#fff;border:2px solid #000;">Test Score</th>
                        <th class="text-center" style="background:rgba(209, 23, 60,0.5);color:#fff;border:2px solid #000;">Ojective</th>
                        <th class="text-center" style="background:rgba(209, 23, 60,0.5);color:#fff;border:2px solid #000;">Theory</th>
                        <th class="text-center" style="background:rgba(209, 23, 60,0.5);color:#fff;border:2px solid #000;">Total</th>
                        <th class="text-center" style="background:rgba(209, 23, 60,0.5);color:#fff;border:2px solid #000;">Grade</th>
                        <th class="text-center" style="background:rgba(209, 23, 60,0.5);color:#fff;border:2px solid #000;">Remark</th>
                    </tr>
             </thead>
<?php  
    while($row = $query->fetch_assoc()):
       ?>
    <tr>
        <td style="text-align:center;"><strong><?php echo $row['class']; ?></strong></td>
        <td style="text-align:center;"><?php echo $row['username']; ?></td>
        <td style="text-align:center;"><?php echo $row['adm_no']; ?></td>
        <td style="text-align:center;"><?php echo $row['subject']; ?></td>
        <td style="text-align:center;"><?php echo $row['course_code']; ?></td>
        <td style="text-align:center;"><?php echo $row['session']; ?></td>
        <td style="text-align:center;"><?php echo $row['test']; ?></td>
        <td style="text-align:center;"><?php echo $row['obj_score']; ?></td>
        <td style="text-align:center;"><?php echo $row['essay_score']; ?></td>
        <td style="text-align:center;"><?php echo $row['total']; ?></td>
        <td style="text-align:center;"><strong style="background:<?php echo $row['color'];?>;padding:10px;border-radius:10px;"><?php echo $row['grade']; ?></strong></td>
        <td style="text-align:center;"><strong style="background:<?php echo $row['color'];?>;padding:10px;border-radius:10px;"><?php echo $row['remark']; ?></strong></td>
    </tr>
    <?php endwhile;?>
        </table>
    <?php } ?>
    </div>
     
 
<div class="row mb-5">  
<div class="col-lg-6 ftco-animate" style="overflow-x:auto; margin-bottom:20px;
        padding:10px; border-radius:20px; border-bottom: 2px solid <?php echo $header_col;?>;
         box-shadow:grey 1px 5px 10px 0px;">
                <form action="result_pro.php" method="post" enctype="multipart/form-data">
                    <h5 class="text-center alert alert-info">Import Student's Score in Excel Format:</h5>
                    <a href="../export/export.php?table=<?php echo $answer_sheet; ?>" class="col-lg-5" style="font-size:15px;color:#000;">Click here to Export table Format 
        <span class="icon-download"></span></a>
           
                <hr>
                <div class="form-group">  
                      <label>Select CSV File:</label>
                      <input class="btn btn-primary" style="width:80%;" type="file" name="file" required/>
                </div>

                <div class="form-group">  
                      <input type="submit" class="btn btn-success" name="submit" value="Upload">
                </div>

                </form>
            </div>
            <br><br>

            <div class="col-lg-6 ftco-animate" style="overflow-x:auto; margin-bottom:20px;
        padding:10px; border-radius:20px; border-bottom: 2px solid <?php echo $header_col;?>;
         box-shadow:grey 1px 5px 10px 0px;">
                <form action="result_pro.php" method="post" enctype="multipart/form-data">
                    <h5 class="text-center alert alert-info">Upload attendance, comment, student's position etc.:</h5>
                    <hr>
                    <a href="../export/export.php?table=evaluation" class="col-lg-5" style="font-size:15px;color:#000;">Click here to Export table Format 
        <span class="icon-download"></span></a>
                <hr>
                <div class="form-group">  
                      <label>Select CSV File:</label>
                      <input class="btn btn-primary" style="width:80%;" type="file" name="file" required/>
                </div>
               
                <div class="form-group">  
                      <input type="submit" class="btn btn-success" name="comment" value="Upload">
                </div>
                </form>
          </div>
      
          <div class="col-lg-5ftco-animate" style="overflow-x:auto; margin-bottom:20px;
        padding:10px; border-radius:20px; border-bottom: 2px solid <?php echo $header_col;?>;
         box-shadow:grey 1px 5px 10px 0px;">
                    <h5 class="text-center alert alert-info">Calculate Exam default total for each class:</h5>
                    <hr>
            <div class="container" style="overflow-x:auto;">
                <table class="table" border='1'>
                    <tr>
                        <th class="text-center">Class</th>
                        <th class="text-center" colspan='2'>Action</th>
                    </tr>
        <?php  
    while($row = $query_1->fetch_assoc()):
       ?>
                    <tr>
                        <td><?php echo $row['class']; ?></td>
                        <td align=center>
                        <form action="evaluation.php" id="standardize_form" method="POST">
                                <input type="hidden" name="class" value="<?php echo $row['class'];?>">
                                <input type="submit" class="btn-secondary" name="standardize" value="Standardize">
                            </form>
                        </td>
                    </tr>
  <?php endwhile;?>
                </table>
                </div>
            </div>
<br><br>
<?php if($_SESSION['position'] == "Principal")
{
?>
        <!-- PRINCIPAL'S COMMENT -->
            <div class="ftco-animate" style="overflow-x:auto; margin-bottom:20px;
        padding:10px; border-radius:20px; border-bottom: 2px solid <?php echo $header_col;?>;
         box-shadow:grey 1px 5px 10px 0px;">
                <form action="result_pro.php" method="post" enctype="multipart/form-data">
                    <h5 class="text-center alert alert-info">Upload Comment</h5>
                    <hr>
    <a href="../export/export.php?table=p_evaluation" class="col-lg-5" style="font-size:15px;color:#000;">Click here to Export table Format 
        <span class="icon-download"></span></a>
                           
                <hr>
                <div class="form-group">  
                      <label>Select CSV File:</label>
                      <input class="btn btn-primary" style="width:80%;" type="file" name="file" required/>
                </div>

                <div class="form-group">  
                      <input type="submit" class="btn btn-success" name="p-comment" value="Upload">
                </div>

                </form>
            </div>
        <?php } ?>

        <?php if($_SESSION['position'] == "Head Teacher")
{
?>
        <!-- PRINCIPAL'S COMMENT -->
            <div class="ftco-animate" style="overflow-x:auto; margin-bottom:20px;
        padding:10px; border-radius:20px; border-bottom: 2px solid <?php echo $header_col;?>;
         box-shadow:grey 1px 5px 10px 0px;">
                <form action="result_pro.php" method="post" enctype="multipart/form-data">
                    <h5 class="text-center alert alert-info">Upload Comment</h5>
                    <hr>
                    <p class="text-center text-warning"><strong>Note:</strong> 
                  <em>Excel csv <strong>Comment</strong> table must be in this format</em></p>
            <div class="container" style="overflow-x:auto;">
                <table class="table" border='1'>
                    <tr>
                        <th>Admission Number</th>
                        <th>Comment</th>
                    </tr>

                    <tr>
                        <td>12341234</td>
                        <td>A wonderful result, keep it up!</td>
                    </tr>

                    <tr>
                        <td>34343434</td>
                        <td>You need to work hard</td>
                    </tr>
                </table>
                </div>

               
                <hr>
                <div class="form-group">  
                      <label>Select CSV File:</label>
                      <input class="btn btn-primary" style="width:80%;" type="file" name="file" required/>
                </div>

                <div class="form-group">
                   <select name="session" class="form-control" required>
                       <option value="">Select Session</option>
                       <?php
                       $query_2 = $conn->query("SELECT * FROM sch_session");
                       while($row = $query_2->fetch_assoc()){
                       ?>
                       <option value="<?php echo $row['session'];?>"><?php echo $row['session'];}?></option>
                   </select>
                    </div>

                    <div class="form-group">
                        <select name="term" class="form-control" required>
                            <option value="First Term">First Term</option>
                            <option value="Second Term">Second Term</option>
                            <option value="Third Term">Third Term</option>
                        </select>
                    </div>

                <div class="form-group">  
                      <input type="submit" class="btn btn-success" name="p-comment" value="Upload">
                </div>

                </form>
            </div>
        <?php } ?>
          </div>
           
</div>


            
</div>
</div>
<?php include "footer.php";?>