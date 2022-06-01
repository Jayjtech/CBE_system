<?php
require "../config/db.php";
if(isset($_POST['upload_pdf']))
{    
      $category = mysqli_real_escape_string($conn,$_POST['category']);
      $name = mysqli_real_escape_string($conn,$_POST['name']);
      $course_code = mysqli_real_escape_string($conn,$_POST['course_code']);
      $title = mysqli_real_escape_string($conn,$_POST['title']);
  
      $query = $conn->query("SELECT * FROM subject_tbl WHERE course_code = '$course_code'");
      while($row = $query->fetch_assoc()){
          $class = $row['class'];
          $subject = $row['subject'];
      }
     
     
 $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="pdf_folder/";
 
 // new file size in KB
 $new_size = $file_size/1024;  
 // new file size in KB
 
 // make file name in lower case
 $new_file_name = strtolower($file);
 // make file name in lower case
 
 $final_file=str_replace(' ','-',$new_file_name);
 
 if(move_uploaded_file($file_loc,$folder.$final_file))
 {
  $sql = $conn->query("INSERT INTO pdf_files (file, type, size, category, name, class, title, subject, course_code, term, session)
   VALUES('$final_file','$file_type','$new_size', '$category', '$name', '$class', '$title', '$subject', '$course_code', '$current_term', '$current_session')");

if($sql){
      $_SESSION['message'] = "$category has been Uploaded!";
      $_SESSION['msg_type'] = "success";//Message saved background
      header("location: pdf_uploader.php");
}
  ?>
  <?php
  }
 }

?>
