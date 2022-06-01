<?php
require_once __DIR__ . '/vendor/autoload.php';
require "config/db.php";
$date = date('d-m-y');
$time = time('h/m/s');

$tm_tbl = $conn->query("SELECT * FROM $time_table");  

//create PDF
$mpdf = new \Mpdf\Mpdf();

//create new pdf
$data ="";

$data .= "<div style='background:lightgrey;padding:5px;'>
    <span><img style='width:20%; float:left;' src='admin/".$sch_logo."'></span>
        <span><h2 style='width:75%; margin-left:10px;'><span>" .$sch_name."</span> <span>".$header."</span></h2><span>
        <div style='margin:0 auto;width:70%;'>".$sch_address."</div>
        <div style='margin:0 auto;width:70%;text-align:center;'>Tel: ".$sch_phone."/".$sch_phone2." <br/>Email: ".$sch_email."</div>
        </div>";

$data .="
<div style=''>
    <div style='background:#fffafa;border:1px solid grey;padding:10px;margin-top:10px;padding:5px;'>
    <h5 style='background:#c0c0c0; padding:10px;border-radius:10px;'> $current_term Examination Time Table</h5>
        <div  style=''>
<table border=1 style='width:100%;'>
    <thead>
        <tr>
        <th style='text-align:center;'>Class</th>
        <th style='text-align:center;'>Subject</th>
        <th style='text-align:center;'>Session</th>
        <th style='text-align:center;'>Course Code</th>
        <th style='text-align:center;'>Day</th>
        <th style='text-align:center;'>Period</th>
        </tr>
    </thead>";
    while($row = $tm_tbl->fetch_assoc()):
  $data.="  
        <tr> 
           <td style='text-align:center;'>".$row['class']."</td>
           <td style='text-align:center;'>".$row['subject']."</td>
           <td style='text-align:center;'>".$row['session']."</td>
           <td style='text-align:center;'>".$row['course_code']."</td>
           <td style='text-align:center;'>".$row['day']."</td>
           <td style='text-align:center;'>".$row['exam_order']."</td>
        </tr>";
    endwhile;
$data.="</table>
</div>
</div>
</div>
";

$mpdf->WriteHTML($data);
$mpdf->Output();
?>
