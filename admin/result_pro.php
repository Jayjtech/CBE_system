<?php  
 require "../config/db.php";
 $teacher = $_SESSION['name'];
 $user_token = $_SESSION['token'];
if(isset($_POST["submit"]))
{
   // Allowed mime types
  $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
  // Validate whether selected file is a CSV file
  if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
      
      // If the file is uploaded
      if(is_uploaded_file($_FILES['file']['tmp_name'])){
          
          // Open uploaded CSV file with read-only mode
          $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
          
          // Skip the first line
          fgetcsv($csvFile);
          
          // Parse data from CSV file line by line
          while(($line = fgetcsv($csvFile)) !== FALSE){
     
    $name = mysqli_real_escape_string($conn, $line[0]);  
    $adm_no = mysqli_real_escape_string($conn, $line[1]);  
    $course_code = mysqli_real_escape_string($conn, $line[2]);
    $subject = mysqli_real_escape_string($conn, $line[3]);
    $session = mysqli_real_escape_string($conn, $line[4]);
    $CA1 = mysqli_real_escape_string($conn, $line[5]);
    $CA2 = mysqli_real_escape_string($conn, $line[6]);
    $CA3 = mysqli_real_escape_string($conn, $line[7]);
    $objective = mysqli_real_escape_string($conn, $line[8]);
    $essay_score = mysqli_real_escape_string($conn, $line[9]);
    
    $query = $conn->query("SELECT * FROM $answer_sheet WHERE adm_no= '$adm_no' AND course_code = '$course_code'");
    while($row = $query->fetch_assoc()){
        $obj = $row['obj_score'];
    }
   //IF OBJECTIVE SCORE IS NOT EMPTY     
    if($obj != 0){
        $obj_score = $obj;
     //IF OBJECTIVE SCORE IS EMPTY THEN THE UPLOADED SCORE IS THE OBJECTIVE SCORE
    }else{
        $obj_score = $objective;
    }
    $test = ($CA1+$CA2+$CA3);
    $exam_output = ($obj_score + $essay_score);
    $total = ($exam_output + $test);

   if($total <= 39){
    $grade = "F9";
    $remark = "Poor";
    $color = "darkGreen";
   }

   if($total == 40 || $total == 41 || $total == 42 || $total == 43 || $total == 43 || $total == 44){
    $grade = "D"; 
    $remark = "Fair";
    $color = "Red";
   }
   if($total == 45 || $total == 46 || $total == 47 || $total == 48 || $total == 49){
    $grade = "C6";
    $remark = "Fair";
    $color = "Orange";
   }
   if($total == 50 || $total == 51 || $total == 52 || $total == 53 || $total == 54 || $total == 55){
    $grade = "C4";
    $remark = "Average";
    $color = "Yellow";
   }
   if($total == 56 || $total == 57 || $total == 58 || $total == 59 || $total == 60){
    $grade = "B3"; 
    $remark = "Good";
    $color = "Yellow";
   }
   if($total == 61 || $total == 62 || $total == 63 || $total == 64){
    $grade = "B2";
    $remark = "Good";
    $color = "LightSeaGreen";
   }
   if($total == 65 || $total == 66 || $total == 67 || $total == 68 || $total == 69){
    $grade = "B";
    $remark = "Good";
    $color = "LightSeaGreen";
   }
   if($total == 70 || $total == 71 || $total == 72 || $total == 73 || $total == 74){
    $grade = "A";
    $remark = "Good";
    $color = "Lime";
   }
   if($total == 75 || $total == 76 || $total == 77 || $total == 78 || $total == 79){
    $grade = "A";
    $remark = "V.Good";
    $color = "green";
    $color = "LimeGreen";
   }
   if($total >= 80){
    $grade = "A";
    $remark = "Excellent";
    $color = "darkGreen";
   }

    //insert data from CSV file 
    $query = $conn->query("UPDATE $answer_sheet SET CA1='$CA1', CA2='$CA2', CA3='$CA3', test='$test', obj_score ='$obj_score', essay_score='$essay_score',
    grade='$grade', total='$total', exam_total = '$exam_output', remark='$remark', color='$color'
   WHERE adm_no='$adm_no' AND teacher_token = '$user_token' AND course_code = '$course_code' AND session='$session'") 
    or die($conn->error);
    if($query){
        $_SESSION['message'] = "Result has been Uploaded!";
        $_SESSION['msg_type'] = "success";
        $_SESSION['btn'] = "Ok";
        header("location: prepare-result");
    }else{
        $_SESSION['message'] = "Result could not be Uploaded!";
        $_SESSION['msg_type'] = "error";
        $_SESSION['btn'] = "Ok";
        header("location: prepare-result");
    }
    
            }
       }
   
    }
  // Close opened CSV file
  fclose($csvFile);
  }



  if(isset($_POST['comment'])){
  // Allowed mime types
  $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
  // Validate whether selected file is a CSV file
  if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
      
      // If the file is uploaded
      if(is_uploaded_file($_FILES['file']['tmp_name'])){
          
          // Open uploaded CSV file with read-only mode
          $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
          
          // Skip the first line
          fgetcsv($csvFile);
          
          // Parse data from CSV file line by line
          while(($line = fgetcsv($csvFile)) !== FALSE){
     //DATA FROM EXCEL TABLE...
    $name = mysqli_real_escape_string($conn, $line[0]);  
    $adm_no = mysqli_real_escape_string($conn, $line[1]);  
    $class = mysqli_real_escape_string($conn, $line[2]);
    $term = mysqli_real_escape_string($conn, $line[3]);
    $session = mysqli_real_escape_string($conn, $line[4]);
    $n_absent = mysqli_real_escape_string($conn, $line[5]);
    $n_present = mysqli_real_escape_string($conn, $line[6]);
    $position = mysqli_real_escape_string($conn, $line[7]);
    $t_comment = mysqli_real_escape_string($conn, $line[8]);
    

    //GETTING OVERALL SCORE FROM ALL COURSES 
    $check_total = $conn->query("SELECT SUM(total) AS sum FROM $answer_sheet WHERE adm_no= '$adm_no'
    AND session = '$session'");
    while($row = $check_total->fetch_assoc()){
        $overall_score = $row['sum'];
    }
    //CALCULATION OF PERCENT SCORE
    $percent = $conn->query("SELECT out_of FROM evaluation WHERE adm_no= '$adm_no'
    AND session = '$session' AND term='$term'");
    while($row = $percent->fetch_assoc()){
        $out_of = $row['out_of'];
    }

    $percent_score = (($overall_score/$out_of)*100);

 
    //ELSE...
    //insert data from CSV file 
    $query = $conn->query("UPDATE evaluation SET overall_score ='$overall_score', percent_score='$percent_score',
    n_absent='$n_absent', n_present ='$n_present', position='$position', t_comment='$t_comment' WHERE adm_no='$adm_no'  AND  session='$session' AND term='$term'") 
    or die($conn->error);
    $_SESSION['message'] = "Data has been Uploaded!";
    $_SESSION['msg_type'] = "success";//Message saved background
    header("location: pre_result.php");
            
        }
       }
   
    }
// Close opened CSV file
fclose($csvFile);
  }


  if(isset($_POST['p-comment'])){
    $term = mysqli_real_escape_string($conn,$_POST['term']);
    $session = mysqli_real_escape_string($conn,$_POST['session']);
  
  // Allowed mime types
  $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
  // Validate whether selected file is a CSV file
  if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
      
      // If the file is uploaded
      if(is_uploaded_file($_FILES['file']['tmp_name'])){
          
          // Open uploaded CSV file with read-only mode
          $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
          
          // Skip the first line
          fgetcsv($csvFile);
          
          // Parse data from CSV file line by line
          while(($line = fgetcsv($csvFile)) !== FALSE){
      //DATA FROM EXCEL TABLE...
     $adm_no = mysqli_real_escape_string($conn, $line[0]);  
     $p_comment = mysqli_real_escape_string($conn, $line[1]);
     
     //To CHECK IF THE SUBMITTED SESSION AND TERM EXIST
     $secondQuery = "SELECT * FROM evaluation WHERE session=? AND term=? ";
     $stmt = $conn->prepare($secondQuery);
     $stmt->bind_param('ss', $session, $current_term);
     $stmt->execute();
     $result = $stmt->get_result();
     $sch_period = $result->num_rows;
     $stmt->close();
         
 //IF THE PERIOD DOES NOT EXIST...
 if($sch_period == 0){
     $_SESSION['message'] = "This School period does not exist!";
     $_SESSION['msg_type'] = "danger";//Message saved background
    header("location: pre_result.php");
 }
 else{
     //ELSE...
     //insert data from CSV file 
     $query = $conn->query("UPDATE evaluation SET p_comment ='$p_comment' WHERE adm_no='$adm_no' AND term='$term' AND session='$session'") 
     or die($conn->error);
     $_SESSION['message'] = "Comments have been Uploaded!";
     $_SESSION['msg_type'] = "success";//Message saved background
     header("location: pre_result.php");
             }
         }
        }
    
     }
 // Close opened CSV file
 fclose($csvFile);
   }
 
  



    //POSITION AND STATUS
   if(isset($_POST['upload'])){
    $term = mysqli_real_escape_string($conn,$_POST['term']);
    $session = mysqli_real_escape_string($conn,$_POST['session']);
 
 
  // Allowed mime types
  $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
  // Validate whether selected file is a CSV file
  if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
      
      // If the file is uploaded
      if(is_uploaded_file($_FILES['file']['tmp_name'])){
          
          // Open uploaded CSV file with read-only mode
          $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
          
          // Skip the first line
          fgetcsv($csvFile);
          
          // Parse data from CSV file line by line
          while(($line = fgetcsv($csvFile)) !== FALSE){
      //DATA FROM EXCEL TABLE...
     $adm_no = mysqli_real_escape_string($conn, $line[0]);  
     $position = mysqli_real_escape_string($conn, $line[1]);
     
     //To CHECK IF THE SUBMITTED SESSION AND TERM EXIST
     $secondQuery = "SELECT * FROM evaluation WHERE session=? AND term=? LIMIT 1";
     $stmt = $conn->prepare($secondQuery);
     $stmt->bind_param('ss', $session, $term);
     $stmt->execute();
     $result = $stmt->get_result();
     $sch_period = $result->num_rows;
     $stmt->close();
         
 //IF THE PERIOD DOES NOT EXIST...
 if($sch_period <= 0){
     $_SESSION['message'] = "This School period does not exist!";
     $_SESSION['msg_type'] = "danger";//Message saved background
    header("location: pre_result.php");
 }
 else{
     //ELSE...
     //insert data from CSV file 
     $query = $conn->query("UPDATE evaluation SET position ='$position' WHERE adm_no='$adm_no' AND term='$term' AND session='$session'") 
     or die($conn->error);
     $_SESSION['message'] = "Comments have been Uploaded!";
     $_SESSION['msg_type'] = "success";//Message saved background
     header("location: upload_student_position.php");
             }
         }
        }
    
     }
  
 // Close opened CSV file
 fclose($csvFile);
   }
 
  
?>