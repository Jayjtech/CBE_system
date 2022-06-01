<?php  
 require "../config/db.php";
$questions = "question";
 $answers ="answer";
 $instructions ="instruction";
if(isset($_POST["submit"]))
{
  
    $category = mysqli_real_escape_string($conn,$_POST['category']);
    $teacher = mysqli_real_escape_string($conn,$_POST['teacher']);
    $course_code = mysqli_real_escape_string($conn,$_POST['course_code']);
    //$term = mysqli_real_escape_string($conn,$_POST['term']);
    if($category == $questions){
    $query = $conn->query("SELECT * FROM subject_tbl WHERE course_code = '$course_code'");
    while($row = $query->fetch_assoc()){
        $class = $row['class'];
        $subject = $row['subject'];
    }
   
   
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
              // Get row data
              $question_number   =  mysqli_real_escape_string($conn, $line[0]);
              $question_text  =  mysqli_real_escape_string($conn, $line[1]);
              $quest_code = "ID$question_number";
      
    //questions
    // if($question_number == 1){$quest_no_type_B = 30;}if($question_number == 2){$quest_no_type_B = 29;} 
    // if($question_number == 3){$quest_no_type_B = 28;}if($question_number == 4){$quest_no_type_B = 27;}
    // if($question_number == 5){$quest_no_type_B = 26;}if($question_number == 6){$quest_no_type_B = 25;}
    // if($question_number == 7){$quest_no_type_B = 24;}if($question_number == 8){$quest_no_type_B = 23;}
    // if($question_number == 9){$quest_no_type_B = 22;}if($question_number == 10){$quest_no_type_B = 21;}
    // if($question_number == 11){$quest_no_type_B = 20;}if($question_number == 12){$quest_no_type_B = 19;}
    // if($question_number == 13){$quest_no_type_B = 18;}if($question_number == 14){$quest_no_type_B = 17;}
    // if($question_number == 15){$quest_no_type_B = 16;}if($question_number == 16){$quest_no_type_B = 15;}
    // if($question_number == 17){$quest_no_type_B = 14;}if($question_number == 18){$quest_no_type_B = 13;}
    // if($question_number == 19){$quest_no_type_B = 12;}if($question_number == 20){$quest_no_type_B = 11;}
    // if($question_number == 21){$quest_no_type_B = 10;}if($question_number == 22){$quest_no_type_B = 9;}
    // if($question_number == 23){$quest_no_type_B = 8;}if($question_number == 24){$quest_no_type_B = 7;}
    // if($question_number == 25){$quest_no_type_B = 6;}if($question_number == 26){$quest_no_type_B = 5;}
    // if($question_number == 27){$quest_no_type_B = 4;}if($question_number == 28){$quest_no_type_B = 3;}
    // if($question_number == 29){$quest_no_type_B = 2;}if($question_number == 30){$quest_no_type_B = 1;}
    
 
    // if($question_number == 1){$quest_no_type_C = 20;}if($question_number == 2){$quest_no_type_C = 19;} 
    // if($question_number == 3){$quest_no_type_C = 18;}if($question_number == 4){$quest_no_type_C = 17;}
    // if($question_number == 5){$quest_no_type_C = 16;}if($question_number == 6){$quest_no_type_C = 15;}
    // if($question_number == 7){$quest_no_type_C = 14;}if($question_number == 8){$quest_no_type_C = 13;}
    // if($question_number == 9){$quest_no_type_C = 12;}if($question_number == 10){$quest_no_type_C = 11;}
    // if($question_number == 11){$quest_no_type_C = 10;}if($question_number == 12){$quest_no_type_C = 9;}
    // if($question_number == 13){$quest_no_type_C = 8;}if($question_number == 14){$quest_no_type_C = 7;}
    // if($question_number == 15){$quest_no_type_C = 6;}if($question_number == 16){$quest_no_type_C = 5;}
    // if($question_number == 17){$quest_no_type_C = 4;}if($question_number == 18){$quest_no_type_C = 3;}
    // if($question_number == 19){$quest_no_type_C = 2;}if($question_number == 20){$quest_no_type_C = 1;}
    // if($question_number == 21){$quest_no_type_C = 30;}if($question_number == 22){$quest_no_type_C = 29;}
    // if($question_number == 23){$quest_no_type_C = 28;}if($question_number == 24){$quest_no_type_C = 27;}
    // if($question_number == 25){$quest_no_type_C = 26;}if($question_number == 26){$quest_no_type_C = 25;}
    // if($question_number == 27){$quest_no_type_C = 24;}if($question_number == 28){$quest_no_type_C = 23;}
    // if($question_number == 29){$quest_no_type_C = 22;}if($question_number == 30){$quest_no_type_C = 21;}
  

    //TEST MODE
    if($question_number == 1){$quest_no_type_B = 3;}if($question_number == 2){$quest_no_type_B = 4;}
    if($question_number == 3){$quest_no_type_B = 5;}if($question_number == 4){$quest_no_type_B = 1;}
    if($question_number == 5){$quest_no_type_B = 2;}

    if($question_number == 1){$quest_no_type_C = 5;}if($question_number == 2){$quest_no_type_C = 4;}
    if($question_number == 3){$quest_no_type_C = 3;}if($question_number == 4){$quest_no_type_C = 2;}
    if($question_number == 5){$quest_no_type_C = 1;}
   
   
    //To ensure that Thesame class is not uploaded over and again
    $classQuery = "SELECT * FROM $exam_tbl_A WHERE subject=? AND class=? AND session=? AND question_number=? LIMIT 1";
    $stmt = $conn->prepare($classQuery);
    $stmt->bind_param('sssi', $subject, $class, $current_session, $question_number);
    $stmt->execute();
    $result = $stmt->get_result();
    $Count = $result->num_rows;
    $stmt->close();
    if($Count > 0){
        $_SESSION['message'] = "Sorry, Question Number already exist, please start from the next Question Number!";
   $_SESSION['msg_type'] = "danger";//Message saved background
   header("location: question_uploader.php");

    }
    //insert data from CSV file 
    if($Count === 0) {
    $query_a = "INSERT INTO $exam_tbl_A (session, teacher, subject, course_code, class, question_number, text, quest_code)
     VALUES ('$current_session','$teacher', '$subject', '$course_code', '$class', '$question_number','$question_text', '$quest_code')";
    mysqli_query($conn, $query_a);

    $query_b = "INSERT INTO $exam_tbl_B (session, teacher, subject, course_code, class, question_number, text, quest_code)
     VALUES ('$current_session','$teacher', '$subject', '$course_code', '$class', '$quest_no_type_B','$question_text', '$quest_code')";
    mysqli_query($conn, $query_b);

    $query_c = "INSERT INTO $exam_tbl_C (session, teacher, subject, course_code, class, question_number, text, quest_code)
     VALUES ('$current_session','$teacher', '$subject', '$course_code', '$class', '$quest_no_type_C','$question_text', '$quest_code')";
    mysqli_query($conn, $query_c);

    $_SESSION['message'] = "Questions has been Uploaded!";
   $_SESSION['msg_type'] = "success";//Message saved background
   header("location: question_uploader.php");
           }
       }
   
    }
 }
}

   // Close opened CSV file
   fclose($csvFile);
   
  }







  if(isset($_POST["submit"]))
{
  
    $category = mysqli_real_escape_string($conn,$_POST['category']);
    $teacher = mysqli_real_escape_string($conn,$_POST['teacher']);
    $course_code = mysqli_real_escape_string($conn,$_POST['course_code']);
    //$term = mysqli_real_escape_string($conn,$_POST['term']);
    if($category == $answers){
    $query = $conn->query("SELECT * FROM subject_tbl WHERE course_code = '$course_code'");
    while($row = $query->fetch_assoc()){
        $class = $row['class'];
        $subject = $row['subject'];
    }

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
              // Get row data
              $question_number   =  mysqli_real_escape_string($conn, $line[0]);
              $is_correct  =  mysqli_real_escape_string($conn, $line[1]);
              $alpha_opt  =  mysqli_real_escape_string($conn, $line[2]);
              $answer_text  =  mysqli_real_escape_string($conn, $line[3]);
              $quest_code = "ID$question_number";

    // if($question_number == 1){$quest_no_type_B = 30;}if($question_number == 2){$quest_no_type_B = 29;} 
    // if($question_number == 3){$quest_no_type_B = 28;}if($question_number == 4){$quest_no_type_B = 27;}
    // if($question_number == 5){$quest_no_type_B = 26;}if($question_number == 6){$quest_no_type_B = 25;}
    // if($question_number == 7){$quest_no_type_B = 24;}if($question_number == 8){$quest_no_type_B = 23;}
    // if($question_number == 9){$quest_no_type_B = 22;}if($question_number == 10){$quest_no_type_B = 21;}
    // if($question_number == 11){$quest_no_type_B = 20;}if($question_number == 12){$quest_no_type_B = 19;}
    // if($question_number == 13){$quest_no_type_B = 18;}if($question_number == 14){$quest_no_type_B = 17;}
    // if($question_number == 15){$quest_no_type_B = 16;}if($question_number == 16){$quest_no_type_B = 15;}
    // if($question_number == 17){$quest_no_type_B = 14;}if($question_number == 18){$quest_no_type_B = 13;}
    // if($question_number == 19){$quest_no_type_B = 12;}if($question_number == 20){$quest_no_type_B = 11;}
    // if($question_number == 21){$quest_no_type_B = 10;}if($question_number == 22){$quest_no_type_B = 9;}
    // if($question_number == 23){$quest_no_type_B = 8;}if($question_number == 24){$quest_no_type_B = 7;}
    // if($question_number == 25){$quest_no_type_B = 6;}if($question_number == 26){$quest_no_type_B = 5;}
    // if($question_number == 27){$quest_no_type_B = 4;}if($question_number == 28){$quest_no_type_B = 3;}
    // if($question_number == 29){$quest_no_type_B = 2;}if($question_number == 30){$quest_no_type_B = 1;}
    
 
    // if($question_number == 1){$quest_no_type_C = 20;}if($question_number == 2){$quest_no_type_C = 19;} 
    // if($question_number == 3){$quest_no_type_C = 18;}if($question_number == 4){$quest_no_type_C = 17;}
    // if($question_number == 5){$quest_no_type_C = 16;}if($question_number == 6){$quest_no_type_C = 15;}
    // if($question_number == 7){$quest_no_type_C = 14;}if($question_number == 8){$quest_no_type_C = 13;}
    // if($question_number == 9){$quest_no_type_C = 12;}if($question_number == 10){$quest_no_type_C = 11;}
    // if($question_number == 11){$quest_no_type_C = 10;}if($question_number == 12){$quest_no_type_C = 9;}
    // if($question_number == 13){$quest_no_type_C = 8;}if($question_number == 14){$quest_no_type_C = 7;}
    // if($question_number == 15){$quest_no_type_C = 6;}if($question_number == 16){$quest_no_type_C = 5;}
    // if($question_number == 17){$quest_no_type_C = 4;}if($question_number == 18){$quest_no_type_C = 3;}
    // if($question_number == 19){$quest_no_type_C = 2;}if($question_number == 20){$quest_no_type_C = 1;}
    // if($question_number == 21){$quest_no_type_C = 30;}if($question_number == 22){$quest_no_type_C = 29;}
    // if($question_number == 23){$quest_no_type_C = 28;}if($question_number == 24){$quest_no_type_C = 27;}
    // if($question_number == 25){$quest_no_type_C = 26;}if($question_number == 26){$quest_no_type_C = 25;}
    // if($question_number == 27){$quest_no_type_C = 24;}if($question_number == 28){$quest_no_type_C = 23;}
    // if($question_number == 29){$quest_no_type_C = 22;}if($question_number == 30){$quest_no_type_C = 21;}


    //TEST MODE
    if($question_number == 1){$quest_no_type_B = 3;}if($question_number == 2){$quest_no_type_B = 4;}
    if($question_number == 3){$quest_no_type_B = 5;}if($question_number == 4){$quest_no_type_B = 1;}
    if($question_number == 5){$quest_no_type_B = 2;}

    if($question_number == 1){$quest_no_type_C = 5;}if($question_number == 2){$quest_no_type_C = 4;}
    if($question_number == 3){$quest_no_type_C = 3;}if($question_number == 4){$quest_no_type_C = 2;}
    if($question_number == 5){$quest_no_type_C = 1;}

    
              //To ensure that Thesame class is not uploaded over and again
             $answerQuery = "SELECT * FROM $answer_tbl_A WHERE subject=? AND class=? AND session=? AND text=? AND question_number=? LIMIT 1";
             $stmt = $conn->prepare($answerQuery);
             $stmt->bind_param('sssss', $subject, $class, $current_session, $answer_text, $question_number);
             $stmt->execute();
             $result = $stmt->get_result();
             $Count = $result->num_rows;
             $stmt->close();
             if($Count > 0){
                 $_SESSION['message'] = "Sorry, Answer already exist!";
            $_SESSION['msg_type'] = "danger";//Message saved background
            header("location: question_uploader.php");

             }
             if($Count === 0){
           //insert data from CSV file 
           $query_a = "INSERT INTO $answer_tbl_A (session, teacher, subject, course_code,  class, question_number, is_correct, alpha_opt, text, quest_code)
            VALUES ('$current_session','$teacher', '$subject', '$course_code', '$class', '$question_number', '$is_correct', '$alpha_opt', '$answer_text', '$quest_code')";
           mysqli_query($conn, $query_a);

           $query_b = "INSERT INTO $answer_tbl_B (session, teacher, subject, course_code,  class, question_number, is_correct, alpha_opt, text, quest_code)
            VALUES ('$current_session','$teacher', '$subject', '$course_code', '$class', '$quest_no_type_B', '$is_correct', '$alpha_opt', '$answer_text', '$quest_code')";
           mysqli_query($conn, $query_b);

           $query_c = "INSERT INTO $answer_tbl_C (session, teacher, subject, course_code,  class, question_number, is_correct, alpha_opt, text, quest_code)
            VALUES ('$current_session','$teacher', '$subject', '$course_code', '$class', '$quest_no_type_C', '$is_correct', '$alpha_opt', '$answer_text', '$quest_code')";
           mysqli_query($conn, $query_c);
       
           $_SESSION['message'] = "Answer has been Uploaded!";
          $_SESSION['msg_type'] = "success";//Message saved background
          header("location: question_uploader.php");
            }

         }
      }
   }
}
   // Close opened CSV file
   fclose($csvFile);
   
  }


  if(isset($_POST["submit_instruction"]))
{
    //$term = mysqli_real_escape_string($conn,$_POST['term']);
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
              // Get row data
             
              $instruction1 = mysqli_real_escape_string($conn, $line[0]);  
              $instruction2 = mysqli_real_escape_string($conn, $line[1]);
              $instruction3 = mysqli_real_escape_string($conn, $line[2]);
              $instruction4 = mysqli_real_escape_string($conn, $line[3]);
              $instruction5 = mysqli_real_escape_string($conn, $line[4]);


             }
           
         //insert data from CSV file 
       $conn->query("UPDATE instruction_tbl SET instruction1='$instruction1', instruction2='$instruction2',
       instruction3='$instruction3', instruction4='$instruction4', instruction5='$instruction5' WHERE id=1") or die($conn->error);
      $_SESSION['message'] = "File has been Uploaded!";
     $_SESSION['msg_type'] = "success";//Message saved background
     header("location: question_uploader.php");
            

         }
      }
   }

   // Close opened CSV file
   fclose($csvFile);
   
  





  if(isset($_GET['delete']))
{
    $teacher = $_SESSION['name'];
    $id = $_GET['delete'];
    $course_code = $_GET['course_code'];
    $conn->query("DELETE FROM subject_tbl WHERE id=$id") or die($conn->error());
    $conn->query("DELETE FROM $exam_tbl_A WHERE course_code='$course_code' AND teacher='$teacher'") or die($conn->error());
    $conn->query("DELETE FROM $exam_tbl_B WHERE course_code='$course_code' AND teacher='$teacher'") or die($conn->error());
    $conn->query("DELETE FROM $exam_tbl_C WHERE course_code='$course_code' AND teacher='$teacher'") or die($conn->error());
    $conn->query("DELETE FROM $answer_tbl_A WHERE course_code='$course_code' AND teacher='$teacher'") or die($conn->error());
    $conn->query("DELETE FROM $answer_tbl_B WHERE course_code='$course_code' AND teacher='$teacher'") or die($conn->error());
    $conn->query("DELETE FROM $answer_tbl_C WHERE course_code='$course_code' AND teacher='$teacher'") or die($conn->error());
    $_SESSION['message'] = "Subject has been deleted!";
    $_SESSION['msg_type'] = "success";
    $_SESSION['remedy'] = "";
    $_SESSION['btn'] = "Ok";
    header("location: question-uploader");
}

?>