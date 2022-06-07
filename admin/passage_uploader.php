<?php 
require "../config/db.php";   
$name = $_SESSION['name']; 
$user_token = $_SESSION['token']; 
$_SESSION['page_2'] = "question_uploader.php";

//CALLING SAVED SUBJECTS BY USER FROM DATABASE
$result =$conn->query("SELECT * FROM subject_tbl WHERE user_token='$user_token'");
$total_course = $result->num_rows;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $sch_name;?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
	<?php include "header.php" ;?>
  <?php include "admin_navbar.php" ;?> 
<div class="container">
               
<div class="row">  
    <div class="col-lg-10 container ftco-animate" style="overflow-x:auto; margin-bottom:20px;
        padding:10px; border-radius:20px; border-bottom: 2px solid <?php echo $header_col;?>;
         box-shadow:grey 1px 5px 10px 0px">
                <form action="exam_upload_pro.php" method="post">
                    <h5 class="text-center alert alert-info">Create Passage:</h5>
                    <textarea name="passageText" 
                    class="form-control ckeditor" 
                    placeholder="Type your text here" 
                    cols="30" 
                    rows="2"></textarea>
               
                    <?php 
                    $sub = $conn->query("SELECT * FROM subject_tbl WHERE user_token ='$user_token'");
                    ?>
                    <div class="row">
                        <div class="col-lg-4 form-group mt-2">
                            <select class="form-control" name="course_code" required>
                                <option value="">Select Course Code</option>
                                <?php
                                    while($row = $sub->fetch_assoc()){ ?>
                                    <option value="<?= $row['course_code']; ?>"><?= $row['subject']; ?> :: <?= $row['course_code']; ?>
                                <?php } ?>
                                </option>
                            </select>
                        </div>

                        <div class="col-lg-4 form-group mt-2">
                            <input type="number" class="form-control" placeholder="From what question number?" name="from" min="1" required/>
                        </div>

                        <div class="col-lg-4 form-group mt-2">
                            <input type="number" class="form-control" placeholder="To which question number?" min="1" name="to" required/>
                        </div>

                    </div>

                        <div class="" align="right">
                            <input type="submit" class="btn btn-primary" name="passage" value="Upload" required/>
                        </div>
                </form>
            </div>
      </div>
</div>


<?php include "footer.php";?>