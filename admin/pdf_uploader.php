<?php 
require "../config/db.php"; 
    if($_SESSION['page'] == "admin_nav.php"){
      $name = $_SESSION['name']; 
    }

    if($_SESSION['page'] == "teacher_profile.php"){
      $name = $_SESSION['name']; 
    }

    if($_SESSION['page'] == "p_profile.php"){
      $name = $_SESSION['name']; 
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Pdf Uploader</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
	<?php include "header.php" ;?>
  <?php include "admin_navbar.php" ;?> 
<div class="row container">
<div  class="col-lg-6 container ftco-animate" style="border:1px solid black;padding:10px;background:#b0c4de;
border-radius:10px;">
<h4 class="text-center">Upload PDF files</h4>
 <form action="pdf_upload_pro.php" method="post" enctype="multipart/form-data">
                  <?php
                  if(isset($_SESSION['message'])): ?>
                  <div class="alert alert-<?=$_SESSION['msg_type']?>">
                  <?php
                  echo $_SESSION['message'];
                  unset($_SESSION['message']);
                  ?>
                </div>
              <?php endif ?>


 <div class="form-group">
      <input class="btn btn-primary" type="file" name="file"/>
 </div>

      <input type="hidden" name="name" value="<?php echo $name?>">

 <div class="form-group">
     <select name="category" class="form-control" required>
            <option value="">Select Category</option>
            <option value="Lesson Note">Lesson Note</option>
            <option value="Assignment">Assignment</option>
     </select>
 </div>
 
 <div class="form-group">
     <input type="text" name="title" class="form-control" placeholder="File title...">
 </div>

 <div class="form-group">  
            <select class="form-control" name="course_code" required>
             <option value="">Select Course Code</option>
            <?php 
            $sub = $conn->query("SELECT * FROM subject_tbl WHERE teacher ='$name'");
                  while($row = $sub->fetch_assoc()){
            ?>
                  <option value="<?php echo $row['course_code'];?>"><?php echo $row['subject'];?> 
                  :: <?php echo $row['course_code'];}?>
            </option>
            </select>
</div>


 <div class="form-group">
      <button type="submit" class="btn btn-primary" name="upload_pdf">upload</button>
 </div>
 </form>
    <br /><br />
    <?php
 if(isset($_GET['success']))
 {
  ?>
        <label class="alert alert-success">File Uploaded Successfully...  <a href="view.php">Click here to view file.</a></label>
        <?php
 }
 else if(isset($_GET['fail']))
 {
  ?>
        <label class="alert alert-danger">Problem While File Uploading !</label>
        <?php
 }
 ?>
</div>
</div>
<br><br><br>
<?php include "footer.php";?>
