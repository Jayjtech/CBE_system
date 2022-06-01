<?php
require_once __DIR__ . '/vendor/autoload.php';
require "config/db.php";
$my_class = $_SESSION['class'];
$username = $_SESSION['username'];
$adm_no = $_SESSION['adm_no'];
$date = date('d-m-y');
$time = time('h/m/s');

$session = $_SESSION['session'];
$term = $_SESSION['term'];

if($_SESSION['term'] == "First Term"){
    $header = "First Term Result Sheet";
    $result_tbl = "ft_answer_sheet";
}

if($_SESSION['term'] == "Second Term"){
    $header = "Second Term Result Sheet";
    $result_tbl = "st_answer_sheet";
}

if($_SESSION['term'] == "Third Term"){
    $header = "Third Term Result Sheet";
    $result_tbl = "tt_answer_sheet";
}
$evaluations = $conn->query("SELECT * FROM evaluation WHERE adm_no= '$adm_no' AND term='$term'
    AND session = '$session'");
    while($row = $evaluations->fetch_assoc()){
        $overall_score = $row['overall_score'];
        $out_of = $row['out_of'];
        $percent_score = $row['percent_score'];
        $t_comment = $row['t_comment'];
        $p_comment = $row['p_comment'];
        $n_absent = $row['n_absent'];
        $n_present = $row['n_present'];
        $position = $row['position'];
        $status = $row['status'];
    }

$result = $conn->query("SELECT * FROM $result_tbl WHERE username='$username'AND adm_no='$adm_no'");  

//create PDF
$mpdf = new \Mpdf\Mpdf();

//create new pdf
$data ="";
$data .= "<div style='background:lightgrey;padding:5px;'>
    <span><img style='width:20%; float:left;' src='admin/".$sch_logo."'></span>
        <span><h3 style='width:75%; margin-left:10px;'><span>" .$sch_name."</span> <span><br>".$header."</span></h3><span>
        <div style='margin:0 auto;width:70%;'>".$sch_address."</div>
        <div style='margin:0 auto;width:70%;text-align:center;'>Tel: ".$sch_phone."/".$sch_phone2." <br/>Email: ".$sch_email."</div>
        </div>";

$data .= "<div><span>Print date: <em>".$date."</em></span></div>";

$data .= "<div style=''>
<div style='width:60%;padding:10px;border:1px solid grey;float:left;padding:5px;display:inline-flex;'>
        <h5  style='background:#c0c0c0; padding:10px;border-radius:10px;'> 1. BIO DATA</h5>
        <div style='width:60%;float:left;'>
           <div><strong>Name: </strong><span>".$_SESSION['fullname']."</span></div>
           <div><strong>Class: </strong>" .$_SESSION['class']."</div>
           <div><strong>Adm No.: </strong>" .$_SESSION['adm_no']."</div>
            </div>
        <div style='width:40%;float:left;'>
            <img style='width:80%;height:70%; border:1px solid purple; float:left;border-radius:15px;' 
            src='".$_SESSION['p_image']."'>
        </div>
        </div>
   
<div style='width:30%;margin-left:50%;border:1px solid grey;float:right;padding:5px;'>
<h5 style='background:#c0c0c0; padding:10px;border-radius:10px;'> 2. ATTENDANCE</h5>
<div style='overflow-x:auto;background:#ffa07a;'>
   <table class='table' border=1>
        <thead>
            <tr>
                <th>No of times Absent</th>
                <th>No of times Present</th>
            </tr>
        </thead>
        <tr>     
            <td style='text-align:center;'>".$n_absent."</td>
            <td style='text-align:center;'>".$n_present."</td>
        </tr>
   </table>
</div>
</div>
</div>
";

   
$data .="
<div style=''>
    <div style='background:#fffafa;border:1px solid grey;padding:10px;margin-top:10px;padding:5px;'>
    <h5 style='background:#c0c0c0; padding:10px;border-radius:10px;'> 3. ACADEMIC PERFORMANCE</h5>
        <div  style=''>
<table border=1 style='width:100%;'>
    <thead>
        <tr>
            <th>Subject</th>
            <th>Course Code</th>
            <th>CA</th>
            <th>Exam</th>
            <th>Total</th>
            <th>Teacher</th>
            <th>Grade</th>
            <th>Remarks</th>
        </tr>
    </thead>";
    while($row = $result->fetch_assoc()):
  $data.="  
        <tr> 
           <td style='text-align:center;'>".$row['subject']."</td>
           <td style='text-align:center;'>".$row['course_code']."</td>
           <td style='text-align:center;'>".$row['test']."</td>
           <td style='text-align:center;'>".$row['exam_total']."</td>
           <td style='text-align:center;'>".$row['total']."</td>
           <td style='text-align:center;'>".$row['teacher']."</td>
           <td style='background:" .$row['color'].";text-align:center;padding:10px;border-radius:10px;'>".$row['grade']."</td>
           <td style='text-align:center;'>".$row['remark']."</td>
        </tr>";
    endwhile;
$data.="</table>
</div>
</div>
</div>
";
   
$data.="
<div style='border:1px solid grey;margin-top:10px;padding:5px;'>
<h5 style='background:#c0c0c0; padding:10px;border-radius:10px;'> 4. EVALUATION</h5>
<div style='background:#faf0e6;padding:10px;border-radius:10px;'>
<table border=1 style='width:90%;margin:0 auto;'>
     <thead>
         <tr>
             <th>Overall Score</th>
             <th>Out of</th>
             <th>Percent Score</th>
             <th>Position</th>
             <th>Status</th>
         </tr>
     </thead>
     <tr>
         <td style='text-align:center;'>$overall_score</td>
         <td style='text-align:center;'>$out_of</td>
         <td style='text-align:center;'>$percent_score%</td>
         <td style='text-align:center;'>$position</td>
         <td style='text-align:center;'>$status</td>
     </tr>
</table>
    </div>    
</div>    
";

$data.="
            <div style='border:1px solid grey;margin-top:10px;padding:5px;'>
            <h5 style='background:#c0c0c0;padding:10px;border-radius:10px;'> 5. COMMENT</h5>
                    <div style='width:45%;float:left;background:#faf0e6;padding:10px;border-radius:10px;margin-right:5px;'>
                        <h5>Principal's comment</h5>
                        <p>$p_comment</p>
                    </div>

                    <div style='width:45%;float:right;background:#faf0e6;padding:10px;border-radius:10px;'>
                        <h5>Teacher's comment</h5>
                        <p>$t_comment</p>
                    </div>
            </div>
";

$mpdf->WriteHTML($data);
$mpdf->Output();
?>
