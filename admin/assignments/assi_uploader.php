<?php 
require "../config/db.php";    
$name = $_SESSION['name']; 
  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Alpha Care Merryland</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
	<?php include "header.php" ;?>
  <?php include "admin_navbar.php" ;?>
<body> 
<div class="container" style="margin-top:100px; ">
                <?php
                  if(isset($_SESSION['message'])): ?>
                  <div class="alert alert-<?=$_SESSION['msg_type']?>">
                  <?php
                  echo $_SESSION['message'];
                  unset($_SESSION['message']);
                  ?>
                </div>
              <?php endif ?>
<div class="row mb-5">  
  <div class="col-md-6 " >
                  <div class="alert alert-warning">
                    <p>You need to add the subject you offer before you can upload the questions</p>
                 </div>
            <div class="ftco-footer-widget mb-5 ml-md-4">
            <div class="" style="border:1px solid black; padding:15px; border-radius:15px;">
                <form action="add_subject.php" method="post" enctype="multipart/form-data">
                    <h4 class="text-center">Add subject to Database</h4>
                    <hr>
                    <div class="form-group">  
                      <input class="form-control" type="hidden" value="<?php echo $name;?>" name="teacher" required/>
                </div>
                

                <div class="form-group"> 
                        <label>Subject:</label> 
                      <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                </div>
                  <hr>

                  <div class="form-group"> 
                        <label>Course Code:</label> 
                      <input type="text" name="course_code" class="form-control" placeholder="Course code" required>
                </div>

                <div class="form-group">  
                      <select class="form-control" name="class">
                        <option value="">Select Class</option>
                        <?php 
                        $class = $conn->query("SELECT * FROM class_tbl");
                          while($row = $class->fetch_assoc()){
                        ?>
                          <option value="<?php echo $row['class'];?>"><?php echo $row['class'];}?> 
                        </option>row
                      </select>
                </div>
                  <hr>
                <div class="form-group">  
                      <input type="submit" class="btn btn-success" name="add" value="Add Subject">
                </div>

                </form>
            </div>
      </div>
</div>

<div class="col-md-6 ">
    <div class="ftco-footer-widget mb-5">
            <div class="" style="border:1px solid black; padding:15px; border-radius:15px;">
                <form action="exam_upload_pro.php" method="post" enctype="multipart/form-data">
                    <h4 class="text-center">Import Questions Text and Answer in Excel Format:</h4>
                    <hr>
                    <p class="text-center text-warning"><strong>Note:</strong> 
                  <em>Excel csv <strong>Question</strong> table must be in this format</em></p>
            <div class="container" style="overflow-x:auto;">
                <table class="table">
                    <tr>
                        <th>Question Number</th>
                        <th>Question</th>
                       
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>What is the full meaning of ICT?</td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>____ is the fastest ...</td>
                    </tr>
                </table>
                </div>

                <p class="text-center text-warning"><strong>Note:</strong> 
                  <em>Excel csv <strong>Answer</strong> table must be in this format</em>
                  <p>If option is correct, score must be 1, then set the score of wrong options to 0</p></p>
            <div class="container" style="overflow-x:auto;">
                <table class="table">
                    <tr>
                        <th>Question Number</th>
                        <th>Score (0/1)</th>
                        <th>Option</th>
                        <th>Answer text</th>
                    </tr>
                           
                    <tr>
                        <td>1</td>
                        <td>0</td>
                        <td>A</td>
                        <td>Informal Community ...</td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>1</td>
                        <td>B</td>
                        <td>Information Communication Technology</td>
                    </tr>
                </table>
                </div>
                <hr>
                <div class="form-group">  
                      <label>Select CSV File:</label>
                      <input class="btn btn-primary" style="width:80%;" type="file" name="file" required/>
                </div>

                <div class="form-group">  
                      <select class="form-control" name="category" required>
                        <option value="">Select Category</option>
                        <option value="question">Questions</option>
                        <option value="answer">Answers</option>
                      </select>
                </div>

                <div class="form-group">  
                      <input type="hidden" name="teacher" class="form-control" value="<?php echo $name;?>"> 
                </div>

                <div class="form-group">  
                      <select class="form-control" name="subject" required>
                        <option value="">Select Subject</option>
                        <?php 
                        $sub = $conn->query("SELECT * FROM subject_tbl WHERE teacher ='$name'");
                          while($row = $sub->fetch_assoc()){
                        ?>
                          <option value="<?php echo $row['subject'];?>"><?php echo $row['subject'];?> 
                           :: <?php echo $row['course_code'];}?>
                        </option>row
                      </select>
                </div>

            
                <div class="form-group">  
                      <select class="form-control" name="class" required>
                        <option value="">Select Class</option>
                        <?php 
                        $class = $conn->query("SELECT * FROM class_tbl");
                          while($row = $class->fetch_assoc()){
                        ?>
                          <option value="<?php echo $row['class'];?>"><?php echo $row['class'];}?> 
                        </option>
                      </select>
                </div>

                  <hr>
                <div class="form-group">  
                      <input type="submit" class="btn btn-success" name="submit" value="Upload">
                </div>

                </form>
            </div>
      </div>
</div>

</div>
</div>
<?php include "footer.php";?>