<?php
require_once __DIR__ . '/vendor/autoload.php';
require "config/db.php";
$my_class = $_SESSION['class'];
$username = $_SESSION['username'];
$adm_no = $_SESSION['adm_no'];
$date = date('d-m-y');

if ($_GET['result_code']) {
    $result_code = $_GET['result_code'];
    $checkResultPeriod = $conn->query("SELECT * FROM $result_checker_tbl WHERE code = '$result_code'");
    while ($row = $checkResultPeriod->fetch_assoc()) {
        $re_term = $row['term'];
        $re_session = $row['session'];
    }
    switch ($re_term) {
        case "First Term":
            $header = "First Term Result Sheet";
            $result_tbl = "ft_answer_sheet";
            break;
        case "Second Term":
            $header = "Second Term Result Sheet";
            $result_tbl = "st_answer_sheet";
            break;
        case "Third Term":
            $header = "Third Term Result Sheet";
            $result_tbl = "tt_answer_sheet";
            break;
    }
    $result = $conn->query("SELECT * FROM $result_tbl WHERE adm_no='$adm_no'");
    $thead = $conn->query("SELECT * FROM $result_tbl WHERE adm_no='$adm_no'");
    $th = $thead->fetch_assoc();

    $evaluations = $conn->query("SELECT * FROM $evaluation_tbl WHERE adm_no= '$adm_no' AND term='$re_term' AND session = '$re_session'");
    $firstTermevaluations = $conn->query("SELECT * FROM $evaluation_tbl WHERE adm_no= '$adm_no' AND term='First Term' AND session = '$re_session'");
    $SecondTermevaluations = $conn->query("SELECT * FROM $evaluation_tbl WHERE adm_no= '$adm_no' AND term='Second Term' AND session = '$re_session'");
    $ThirdTermevaluations = $conn->query("SELECT * FROM $evaluation_tbl WHERE adm_no= '$adm_no' AND term='Third Term' AND session = '$re_session'");
    $rowF = $firstTermevaluations->fetch_assoc();
    $firstPercent_score = $rowF['percent_score'];

    $rowS = $SecondTermevaluations->fetch_assoc();
    $secondPercent_score = $rowS['percent_score'];

    $rowT = $ThirdTermevaluations->fetch_assoc();
    $thirdPercent_score = $rowT['percent_score'];


    while ($row = $evaluations->fetch_assoc()) {
        $overall_score = $row['overall_score'];
        $out_of = $row['out_of'];
        $percent_score = $row['percent_score'];
        $t_comment = $row['t_comment'];
        $p_comment = $row['p_comment'];
        $n_absent = $row['n_absent'];
        $n_present = $row['n_present'];
        $punctuality = $row['punctuality'];
        $attentiveness = $row['attentiveness'];
        $neatness = $row['neatness'];
        $honesty = $row['honesty'];
        $relationship = $row['relationship'];
        $skills = $row['skills'];
        $sport = $row['sport'];
        $clubs = $row['clubs'];
        $fluency = $row['fluency'];
        $handwriting = $row['handwriting'];
        $position = $row['position'];
        $promoted_to = $row['promoted_to'];
        $next_term_date = $row['next_term_date'];
        $class = $row['class'];
    }

    // $get_n0_term = ($firstTermevaluations->num_rows + $SecondTermevaluations->num_rows + $ThirdTermevaluations->num_rows);
    // $sum123 = ($firstPercent_score + $secondPercent_score + $thirdPercent_score) / ($get_n0_term * 100);
    // $total_percent = ($sum123 * 100);
    //create PDF
    $mpdf = new \Mpdf\Mpdf();

    //create new pdf
    $data = '<!DOCTYPE html>
<html>
<head>
	<title>Result Sheet</title>
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700&subset=latin,latin-ext" rel="stylesheet" type="text/css">
	<!-- <link rel="stylesheet" href="sass/main.css" media="screen" charset="utf-8"/> -->
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta http-equiv="content-type" content="text-html; charset=utf-8">
	<link rel="stylesheet" href="pdf_style.css">
</head>
';
    $data .= '<body>
<header class="">
    <div class="container">
        <figure>
            <img class="" src="images/' . $sch_logo . '">
        </figure>
        <div class="company-address">
            <h2 class="title">' . $sch_name . '</h2>
            <p>
                ' . $sch_address . ',<br>
                ' . $sch_phone . '/' . $sch_phone2 . '. Email: ' . $sch_email . '
            </p>
        </div>
        
    </div>
</header>';

    $syntax = "Student's name";

    $data .= '<section style="margin-top:0;">
<div class="container">
    <div class="details clearfix">
        <div class="client left">
            <h1>Report for ' . $re_term . ' in ' . $_SESSION['session'] . '</h1>
            <p class="name">' . $syntax . ': ' . $_SESSION['fullname'] . ', Class:<u> ' . $class . ' </u></p>
            <p>Admission Number: ' . $_SESSION['adm_no'] . '</p>
            <p>Attendance: <u>' . $n_present . '</u> out of <u>' . ($n_absent + $n_present) . '</u></p>
        </div>
        <div class="data right">
        <img style="width:30%;height:25%; border:1px solid purple; float:left;border-radius:15px;" src="' . $_SESSION['p_image'] . '">
            <div class="date">
               <span> Print date: ' . $date . '</span><br>
               <span> Pin: ' . $result_code . '</span>
            </div>
        </div>
    </div>';

    $data .= '
<table border="0" cellspacing="0" cellpadding="0">
    <thead>
        <tr>
            <th style="text-align:center;" class="">Subject</th>
            <th style="text-align:center;" class="">CA1</th>
            <th style="text-align:center;" class="">CA2</th>
            <th style="text-align:center;" class="">CA3</th>
            <th style="text-align:center;" class="">Exam</th>
            <th style="text-align:center;" class="">AVR</th>
            ';
    if ($th['ft_score'] != "") {
        $data .= '<th style="text-align:center;" class="">FT</th>';
    }
    if ($th['st_score'] != "") {
        $data .= '<th style="text-align:center;" class="">ST</th>';
    }
    if ($re_term == "Third Term") {
        $data .= '<th style="text-align:center;" class="">TT</th>';
    }


    if ($re_term != "First Term") {
        $data .= ' <th style="text-align:center;" class="">T. Avr</th>';
    }
    $data .= '
            <th style="text-align:center;" class="">Position</th>
            <th style="text-align:center;" class="">Grade</th>
            <th style="text-align:center;" class="">Remarks</th>
        </tr>
    </thead>';
    while ($row = $result->fetch_assoc()) :
        $data .= '  	
    <tbody>
        <tr> 
           <td style="text-align:center;color:#000;">' . $row['subject'] . '(' . $row['course_code'] . ')</td>
           <td style="text-align:center;color:#000;">' . $row['CA1'] . '</td>
           <td style="text-align:center;color:#000;">' . $row['CA2'] . '</td>
           <td style="text-align:center;color:#000;">' . $row['CA3'] . '</td>
           <td style="text-align:center;color:#000;">' . $row['exam_total'] . '</td>
           <td style="text-align:center;color:#000;">' . $row['total'] . '</td>';
        if ($row['ft_score']) {
            $data .= '<td style="text-align:center;color:#000;">' . $row['ft_score'] . '</td>';
            $average = number_format(($row['total'] + $row['ft_score']) / 2);
        }
        if ($row['st_score']) {
            $data .= '<td style="text-align:center;color:#000;">' . $row['st_score'] . '</td>';
            $average = number_format(($row['st_score'] + $row['ft_score'] + $row['total']) / 3);
        }
        if ($re_term == "Third Term") {
            $data .= '<td style="text-align:center;color:#000;">' . $row['total'] . '</td>';
        }

        if ($re_term != "First Term") {
            $data .= ' <td style="text-align:center;color:#000;">' . $average . '</td>';
        }
        $data .= '
           <td style="text-align:center;color:#000;">' . $row['position'] . '</td>
           <td style="font-weight:bold;text-align:center;padding:10px;border-radius:10px;">' . $row['grade'] . '</td>
           <td style="text-align:center;">' . $row['remark'] . '</td>
        </tr>
    </tbody>';
    endwhile;
    $data .= '</table>';


    $data .= '
<div style="width:70%;margin-top:3px;">
<p class="name"><strong>EVALUATIONS</strong> </p>
<table border="0" cellspacing="0" cellpadding="0">
     <thead>
         <tr>
             <th style="text-align:center;">Overall Score</th>
             <th style="text-align:center;">Out of</th>
             <th style="text-align:center;">Percent Score</th>
             <th style="text-align:center;">Position</th>
         </tr>
     </thead>
     <tr>
         <td style="text-align:center;">' . $overall_score . '</td>
         <td style="text-align:center;">' . $out_of . '</td>
         <td style="text-align:center;">' . number_format($percent_score, 2) . ' %</td>
         <td style="text-align:center;">' . $position . '</td>
     </tr>
</table>   
</div>

<div style="width:70%;margin-top:10px;">
<p class="name"><strong>PREVIOUS RESULTS</strong> </p>
<table border="0" cellspacing="0" cellpadding="0">
     <thead>
         <tr>';
    if ($re_term == "First Term") {
        $data .= '<th style="text-align:center;">First Term</th>';
    }
    if ($re_term == "Second Term") {
        $data .= '<th style="text-align:center;">First Term</th>';
        $data .= '<th style="text-align:center;">Second Term</th>';
    }
    if ($re_term == "Third Term") {
        $data .= '<th style="text-align:center;">First Term</th>
            <th style="text-align:center;">Second Term</th>
            <th style="text-align:center;">Third Term</th>';
    }

    $data .= '
                 <th style="text-align:center;">Overall</th>
             </tr>
         </thead>
         <tr>';
    if ($re_term == "First Term") {
        $total_percent = ($firstPercent_score / 1);
        $data .= '<td style="text-align:center;">' . number_format($firstPercent_score, 2) . '%</td>';
    }
    if ($re_term == "Second Term") {
        $total_percent = (($firstPercent_score + $secondPercent_score) / 2);
        $data .= '<td style="text-align:center;">' . number_format($firstPercent_score, 2) . '%</td>
            <td style="text-align:center;">' . number_format($secondPercent_score, 2) . '%</td>';
    }
    if ($re_term == "Third Term") {
        $total_percent = (($firstPercent_score + $secondPercent_score + $thirdPercent_score) / 3);
        $data .= '<td style="text-align:center;">' . number_format($firstPercent_score, 2) . '%</td>
                 <td style="text-align:center;">' . number_format($secondPercent_score, 2) . '%</td>
             <td style="text-align:center;">' . number_format($thirdPercent_score, 2) . '%</td>';
    }

    $data .= '
             <td style="text-align:center;">' . number_format($total_percent, 2) . '%</td>
         </tr>
    </table>   
    </div>    
    ';

    $data .= '
   <div class="" style="margin-top:10px;">
           <div class="client left">
               <h1>Keys</h1>
               <p>5 - Excellent, 4 - V.good, 3 - Good, 2 - Fair, 1 - Poor.</p>
           </div>
    </div>
    ';

    $data .= '
<div style="width:45%; float:left; margin-top:20px;">
<p class="name"><strong>AFFECTIVE DOMAIN</strong></p>
<table border="0" cellspacing="0" cellpadding="0">
     <thead>
         <tr>
            <th style="text-align:left;" width:20%;>Punctuality</th>
            <th style="text-align:center;" width:10%;>' . $punctuality . '</th>
         </tr>
         <tr>
            <th style="text-align:left;"  width:20%;>Attentiveness</th>
            <th style="text-align:center;" width:10%;>' . $attentiveness . '</th>
         </tr>
         <tr>
            <th style="text-align:left;"  width:20%;>Neatness</th>
            <th style="text-align:center;" width:10%;>' . $neatness . '</th>
        </tr>
         <tr>
            <th style="text-align:left;" width:20%;>Honesty</th>
            <th style="text-align:center;" width:10%;>' . $honesty . '</th>
         </tr>
         <tr>
            <th style="text-align:left;"  width:20%;>Relationship with others</th>
            <th style="text-align:center;" width:10%;>' . $relationship . '</th>
         </tr>
         
     </thead>  
</table>   
</div>    
';

    $data .= '
<div style="width:45%; margin-left:; ">
<p class="name"><strong>PSYCHOMOTOR DOMAIN</strong></p>
<table border="0" cellspacing="0" cellpadding="0">
     <thead>
         <tr>
            <th style="text-align:left;background:#ad19a6;" width:20%;>Skills in Co-curriculars</th>
            <th style="text-align:center;" width:10%;>' . $skills . '</th>
         </tr>
         <tr>
            <th style="text-align:left;background:#ad19a6;"  width:20%;>Sports/Games</th>
            <th style="text-align:center;" width:10%;>' . $sport . '</th>
         </tr>
         <tr>
            <th style="text-align:left;background:#ad19a6;"  width:20%;>Clubs/Societies</th>
            <th style="text-align:center;" width:10%;>' . $clubs . '</th>
        </tr>
         <tr>
            <th style="text-align:left;background:#ad19a6;"  width:20%;>Fluency</th>
            <th style="text-align:center;" width:10%;>' . $fluency . '</th>
        </tr>
         <tr>
            <th style="text-align:left;background:#ad19a6;"  width:20%;>Handwriting</th>
            <th style="text-align:center;" width:10%;>' . $handwriting . '</th>
        </tr>
     </thead>  
</table>   
</div>    
';

    $syntaxT = "Teacher's";
    $syntaxP = "Principal's";
    // <p><strong>' . $syntaxP . ' Signature:</strong> <img class="" src="admin/' . $p_signature . '" width="100"> </p>
    $data .= '
<div class="" style="margin-top:20px;">
    <div class="details clearfix">
        <div class="client left">
            <p><strong>' . $syntaxT . ' comment:</strong> ' . $t_comment . ' </p>
            <p><strong>' . $syntaxP . ' comment:</strong> ' . $p_comment . ' </p>
            
        </div>
        <div class="data right">
            <div class="date">
                <p class="name"><strong>Promoted to:</strong> ' . $promoted_to . '</p>
                <p><strong>Next term begins:</strong> ' . $next_term_date . '</p>
            </div>
        </div>
    </div>
    ';

    $data .= '
<footer>
<div class="container">
    <div class="end">Statement of result was generated on a computer using a valid <b>result checker pin</b> and is valid without seal.</div>
</div>
</footer>
    ';
    $mpdf->WriteHTML($data);
    $mpdf->Output();
} else {
    $_SESSION['message'] = 'This is an invalid code';
    $_SESSION['msg_type'] = 'warning';
    $_SESSION['remedy'] = 'Use a valid result checker code';
    $_SESSION['btn'] = 'Okay';
    header('location: dashboard');
}

exit();
