<?php
require_once __DIR__ . '/vendor/autoload.php';
require "config/db.php";
$date = date('d-m-y');
$time = time('h/m/s');
$course_code = $_SESSION['course_code'];

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
//calling questtions from database
$quest = $conn->query("SELECT * FROM $quest_tbl WHERE course_code = '$course_code'");
$detail = $conn->query("SELECT * FROM $quest_tbl WHERE course_code = '$course_code'");
$clas = $detail->fetch_assoc();
     
//create PDF
$mpdf = new \Mpdf\Mpdf();

//create new pdf
$data ="";
$data .= "<div style='background:lightgrey;padding:5px;'>
    <span><img style='width:20%; float:left;' src='admin/".$sch_logo."'></span>
        <span><h2 style='width:100%; margin-left:10px;'><span>" .$sch_name."</span> <br/>".$_SESSION['term']." Examination Questions </h2><span><hr/>
        <div style='margin:0 auto;width:70%;'>".$sch_address."</div>
        <div style='margin:0 auto;width:70%;text-align:center;'>Tel: ".$sch_phone."/".$sch_phone2." <br/>Email: ".$sch_email."</div>
        </div>";
$data.="<div>Class: ".$clas['class']."</div>";
$data.="<div>Session: ".$clas['session']."</div><br><br><strong>Questions:</strong>";


    while($row = $quest->fetch_assoc()):

  $data.="<div><span>".$row['question_number']."<span>. " .$row['text']."</span>";
//         //Select options from database
         $question_number = $row['question_number'];
         $ans = $conn->query("SELECT * FROM $answer_tbl WHERE 
         course_code='$course_code' AND question_number='$question_number'");
        while($row = $ans->fetch_assoc()){
        
            $data .= " (<span>" .$row['alpha_opt']."<span>) " .$row['text']. "</span>";
        }
    $data.="</div>";
    endwhile;



$mpdf->WriteHTML($data);
$mpdf->Output();
?>
