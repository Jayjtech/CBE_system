<?php 
require "../config/db.php";
$page_2 = $_SESSION['page_2'];
if(isset($_POST['submit'])){
    $course_code = mysqli_real_escape_string($conn,$_POST['course_code']);
    $term = mysqli_real_escape_string($conn,$_POST['term']);
$_SESSION['term'] = $term;
    if($term == "First Term"){
      $quest_tbl = "ft_exam_type_a";
      $answer_tbl = "ft_answer_type_a";
  }
  if($term == "Second Term"){
      $quest_tbl = "st_exam_type_a";
      $answer_tbl = "st_answer_type_a";
  }
  if($term == "Third Term"){
      $quest_tbl = "tt_exam_type_a";
      $answer_tbl = "tt_answer_type_a";
  }

    $_SESSION['course_code'] = $course_code;
    $quest = $conn->query("SELECT * FROM $quest_tbl WHERE course_code = '$course_code' AND session='$current_session' ORDER BY question_number ASC");
    $total_result = $quest->num_rows;
   

}else{
    $course_code = $_SESSION['course_code'];
    $query = $conn->query("SELECT * FROM $quest_tbl WHERE course_code = '$course_code' AND session='$current_session'");
    $total_result = $query->num_rows;
}

// $_SESSION['term'] = $term;

if($_SESSION['term'] == "First Term"){
  $quest_tbl = "ft_exam_type_a";
  $answer_tbl = "ft_answer_type_a";
}
if($_SESSION['term'] == "Second Term"){
  $quest_tbl = "st_exam_type_a";
  $answer_tbl = "st_answer_type_a";
}
if($_SESSION['term'] == "Third Term"){
  $quest_tbl = "tt_exam_type_a";
  $answer_tbl = "tt_answer_type_a";
}
$detail = $conn->query("SELECT * FROM $quest_tbl WHERE course_code = '$course_code' AND session='$current_session'");
$clas = $detail->fetch_assoc();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $sch_name; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include "header.php" ;?>
    <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="question_uploader.php" class="nav-link">Back</a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link">Log Out</a></li>
        </ul>
    </div>
    </div>
    </nav>

    <?php 
if($total_result <= 0){
    echo "<div class='container alert alert-warning'>No question has been uploaded with this course code!</div><br><br>";
}else{
?>

    <div class="container" style='display:inline-flex; width:50%;margin:30px auto; margin-left:10%;'>
        <a href="edit_question_pro?delete=<?php echo $course_code;?>" style='' class=" btn btn-danger">Delete
            Questions</a>
        <a href="questions?course_code=<?php echo $course_code;?>" style='' class=" btn btn-primary">Edit Questions</a>
        <a href="../question_pdf.php" class=" btn btn-success">Create PDF</a>
    </div>
    <div class="container mb-5" style="color:black;box-shadow:grey 1px 3px 6px ;">
        <h2 class="text-center"><?php echo $clas['class'];?> <?php echo $term;?> <?php echo $clas['subject'];?>
            Questions
            for <?php echo $clas['session'];?> Session </h2>
        <?php 
    //Select Questions from database
    while($row = $quest->fetch_assoc()):?>
        <div class="container">
            <span><?php echo $row['question_number'];?>. <?php echo $row['text'];?></span>

            <?php
      //Select options from database
      $question_number = $row['question_number'];
      $ans = $conn->query("SELECT * FROM $answer_tbl WHERE course_code='$course_code' AND question_number=$question_number");
    while($row = $ans->fetch_assoc()){?>
            <span>(<?php echo $row['alpha_opt'];?>) </span>
            <span><?php echo $row['text'];?></span>
            <?php } ?>
        </div>
        <?php endwhile;?>

        <?php 
}
?>
    </div>
    <?php include "footer.php";?>