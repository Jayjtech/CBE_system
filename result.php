<?php

require "config/db.php";
//CHECK RESULT FOR THE REQUESTED TERM AND SESSION
if (isset($_POST['check_result'])) {
    $term = mysqli_real_escape_string($conn, $_POST['term']);
}

$my_class = $_SESSION['class'];
$_SESSION['term'] = $term;
$username = $_SESSION['username'];
$adm_no = $_SESSION['adm_no'];
$session = $_SESSION['session'];
if (!$_SESSION['adm_no']) {
    $_SESSION['message'] = 'Access denied!';
    $_SESSION['msg_type'] = 'warning';
    $_SESSION['remedy'] = 'Login to continue';
    $_SESSION['msg_type'] = 'Okay';
    header('location:login');
}
if ($term == "First Term") {
    $header = "First Term Result Sheet $session";
    $result_tbl = "ft_answer_sheet";
}

if ($term == "Second Term") {
    $header = "Second Term Result Sheet $session";
    $result_tbl = "st_answer_sheet";
}

if ($term == "Third Term") {
    $header = "Third Term Result Sheet $session";
    $result_tbl = "tt_answer_sheet";
}

$evaluations = $conn->query("SELECT * FROM evaluation WHERE adm_no= '$adm_no' AND term='$term'
    AND session = '$session'");
while ($row = $evaluations->fetch_assoc()) {
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
    <?php include "header.php"; ?>
    <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="dashboard" class="nav-link pl-0">Back</a></li>
        </ul>
    </div>
    </div>
    </nav>
    <!-- END nav -->

    <?php
    //$result = $conn->query("SELECT * FROM $result_tbl WHERE username='$username' AND adm_no='$adm_no' AND session='$session'");
    ?>


    <div class="container">
        <div class="row container">
            <div class="col-6">
                <h4 class="text-center">Check Result</h4>
                <form action="view-result">
                    <div class="form-group">
                        <input type="text" class="form-control" name="result_code" placeholder="Enter your result checker code" required>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-success" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>


    <br><br><br><br>
    <section style="float: right; width:100%;">
        <?php include "footer.php"; ?>
    </section>