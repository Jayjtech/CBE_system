<?php
error_reporting(0);
require "config/db.php";
//CHECK RESULT FOR THE REQUESTED TERM AND SESSION
if(isset($_POST['check_result'])){
    $term = mysqli_real_escape_string($conn,$_POST['term']);
}

$my_class = $_SESSION['class'];
$_SESSION['term'] = $term;
$username = $_SESSION['username'];
$adm_no = $_SESSION['adm_no'];
$session = $_SESSION['session'];

if($term == "First Term"){
    $header = "First Term Result Sheet $session";
    $result_tbl = "ft_answer_sheet";
}

if($term == "Second Term"){
    $header = "Second Term Result Sheet $session";
    $result_tbl = "st_answer_sheet";
}

if($term == "Third Term"){
    $header = "Third Term Result Sheet $session";
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Result</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootsrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="shortcut icon" href="https://maxcdn.bootstrapcdn.com/bootsrap/3.3.6/" type="image/x-icon">
    <?php include "header.php" ;?>
    <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item active"><a href="dashboard" class="nav-link pl-0">Back</a></li>
			</ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <?php
       $result = $conn->query("SELECT * FROM $result_tbl WHERE username='$username' AND adm_no='$adm_no' AND session='$session'");  
       ?>
<h2 class="text-center alert alert-success"><?php echo $header;?></h2>
<div style="width:90%; margin:0 auto;">
<div class="row" style="margin:0 auto;">
    <div class="mt-2 col-lg-4" style="background:#faf0e6;padding:10px;border-radius:10px;border-right:1px solid grey;">
            <h5 class="" style="background:#c0c0c0;">1. BIO DATA</h5>
            <div class="container" style="overflow-x:auto;">
               <h5><strong>Name:</strong> <?php echo $_SESSION['fullname'];?></h5>
               <h5><strong>Class:</strong> <?php echo $_SESSION['class'];?></h5>
               <h5><strong>Admission Number:</strong> <?php echo $_SESSION['adm_no'];?></h5>
               <h5><strong>Parent / Guardian's Name:</strong> <?php echo $_SESSION['pname'];?></h5>
            </div>
<hr>
<br>
<h5 class="" style="background:#c0c0c0;">2. ATTENDANCE</h5>
            <div class="container" style="overflow-x:auto;background:#ffa07a;">
               <table class="table" border='1'>
                    <thead>
                        <tr>
                            <th>No of times Absent</th>
                            <th>No of times Present</th>
                        </tr>
                    </thead>
                    <tr>
                        <td><?php echo $n_absent;?></td>
                        <td><?php echo $n_present;?></td>
                    </tr>
               </table>
            </div>

    </div>

          

           

    <div class="mt-2 col-lg-8">
    <div class="container" style="background:#fffafa;padding:10px;border-radius:10px;">
    <h5 class="" style="background:#c0c0c0;">4. ACADEMIC PERFORMANCE</h5>
        <div class="container" style="overflow-x:auto;">
                <table class="table" border='1'>
                <thead style="background:#ffa07a;">
                        <tr>
                            <th>SUBJECT</th>
                            <th>Course Code</th>
                            <th>CA</th>
                            <th>Exam</th>
                            <th>Total</th>
                            <th>Teacher</th>
                            <th>Grade</th>
                            <th>Remarks</th>
                        </tr>
                </thead>
        <?php 
        while($row = $result->fetch_assoc()):
       ?>
                         <tr>
                             <td style="background:#ffa07a;"><?php echo $row["subject"]; ?></td>
                             <td><?php echo $row["course_code"]; ?></td>
                             <td><?php echo $row["test"]; ?></td>
                             <td><?php echo $row["exam_total"]; ?></td>
                             <td><?php echo $row["total"]; ?></td>
                             <td><?php echo $row["teacher"]; ?></td>
                             <td><strong style="background:<?php echo $row['color'];?>;padding:10px;border-radius:10px;"><?php echo $row["grade"]; ?></strong></td>
                             <td><strong style="background:<?php echo $row['color'];?>;padding:10px;border-radius:10px;"><?php echo $row["remark"]; ?></strong></td>
                         </tr>
            <?php endwhile;?>
            </table>
        </div>
    </div>
  
        <hr>
<br>

    <div class="container" style="overflow-x:auto;">
            <h5 class="" style="background:#c0c0c0;">5. EVALUATION</h5>
               <div class="container row">
               <div class="col-lg-6" style="background:#faf0e6;padding:10px;border-radius:10px;margin-right:5px;">
               <table class="table" border='1'>
                    <thead>
                        <tr>
                            <th>Overall Score</th>
                            <th>Out of</th>
                            <th>Percent Score</th>
                            <th>Position</th>
                        </tr>
                    </thead>
                    <tr>
                        <td><?php echo $overall_score;?></td>
                        <td><?php echo $out_of;?></td>
                        <td><?php echo $percent_score;?>%</td>
                        <td><?php echo $position;?></td>
                    </tr>
               </table>
            </div>   
        

                    <div class="col-lg-5" style="background:#faf0e6;padding:10px;border-radius:10px;">
                        <h5 class="text-center">Status</h5>
                        <p style='background:lightgreen;padding:10px;border-radius:5px;text-align:center;font-weight:bold;'>Promoted</p>
                        <p style='background:lightgreen;padding:10px;border-radius:5px;text-align:center;font-weight:bold;'>To Repeat</p>
                        <p style='background:lightgreen;padding:10px;border-radius:5px;text-align:center;font-weight:bold;'>To withdraw</p>
                    </div>
               </div>
          
 
             
    
            <hr>
<br>

            <div class="container" style="overflow-x:auto;">
            <h5 class="" style="background:#c0c0c0;">6. COMMENT</h5>
               <div class="container row">
                    <div class="col-lg-6" style="background:#faf0e6;padding:10px;border-radius:10px;margin-right:5px;">
                        <h5 class="text-center">Principal's comment</h5>
                        <p><?php echo $p_comment;?></p>
                    </div>

                    <div class="col-lg-5" style="background:#faf0e6;padding:10px;border-radius:10px;">
                        <h5 class="text-center">Teacher's comment</h5>
                        <p><?php echo $t_comment;?></p>
                    </div>
               </div>
            </div>    
    


         

    </div>
   </div>
</div>
</div>

<div class="container">
    <a href="result_pdf.php" class="btn btn-success">Create PDF</a>
</div>



<br><br><br><br>
    <section style="float: right; width:100%;">
    <?php include "footer.php" ;?>
    </section>