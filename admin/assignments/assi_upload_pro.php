<?php  
 require "../config/db.php";
 $questions = "question";
 $answers ="answer";

if(isset($_POST["submit"]))
{
    $category = mysqli_real_escape_string($conn,$_POST['category']);
    $class = mysqli_real_escape_string($conn,$_POST['class']);
    $teacher = mysqli_real_escape_string($conn,$_POST['teacher']);
    $subject = mysqli_real_escape_string($conn,$_POST['subject']);

    $query = $conn->query("SELECT * FROM subject_tbl WHERE class= '$class' AND subject = '$subject'");
    while($row = $query->fetch_assoc()){
        $course_code = $row['course_code'];
    }
   
    if($category == $questions){
       	
 if($_FILES['file']['name'])
 {
  $filename = explode(".", $_FILES['file']['name']);
  if($filename[1] == 'csv')
  {
   $handle = fopen($_FILES['file']['tmp_name'], "r");
   while($data = fgetcsv($handle))//handling csv file 
   {
     
    $question_number = mysqli_real_escape_string($conn, $data[0]);  
    $question_text = mysqli_real_escape_string($conn, $data[1]);

   
    //To ensure that Thesame class is not uploaded over and again
    $classQuery = "SELECT * FROM $exam_table WHERE subject=? AND class=? AND question_number=? LIMIT 1";
    $stmt = $conn->prepare($classQuery);
    $stmt->bind_param('ssi', $subject, $class, $question_number);
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
    $query = "INSERT INTO $exam_table (session, teacher, subject, course_code, class, question_number, text)
     VALUES ('$current_session','$teacher', '$subject', '$course_code', '$class', '$question_number','$question_text')";
    mysqli_query($conn, $query);

    $_SESSION['message'] = "Questions has been Uploaded!";
   $_SESSION['msg_type'] = "success";//Message saved background
   header("location: question_uploader.php");
            }
       }
   
    }
 }
}

       if($category == $answers){
        if($_FILES['file']['name'])
        {
         $filename = explode(".", $_FILES['file']['name']);
         if($filename[1] == 'csv')
         {
          $handle = fopen($_FILES['file']['tmp_name'], "r");
          while($data = fgetcsv($handle))//handling csv file 
          {
            
            $question_number = mysqli_real_escape_string($conn, $data[0]);  
            $is_correct = mysqli_real_escape_string($conn, $data[1]);
            $alpha_opt = mysqli_real_escape_string($conn, $data[2]);
            $answer_text = mysqli_real_escape_string($conn, $data[3]);
           
              //To ensure that Thesame class is not uploaded over and again
             $answerQuery = "SELECT * FROM $answer_table WHERE subject=? AND class=? AND text=? AND question_number=? LIMIT 1";
             $stmt = $conn->prepare($answerQuery);
             $stmt->bind_param('ssss', $subject, $class, $answer_text, $question_number);
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
           $query = "INSERT INTO $answer_table (session, teacher, subject, course_code,  class, question_number, is_correct, alpha_opt, text)
            VALUES ('$current_session','$teacher', '$subject', '$course_code', '$class', '$question_number', '$is_correct', '$alpha_opt', '$answer_text')";
           mysqli_query($conn, $query);
       
           $_SESSION['message'] = "Answer has been Uploaded!";
          $_SESSION['msg_type'] = "success";//Message saved background
          header("location: question_uploader.php");
            }

         }
      }
   }
}
   fclose($handle);
   
   
  

 
  }

?>