<?php
require "reg_subject_pro.php";
$class = $_SESSION['class'];
$username = $_SESSION['username'];
$fullname = $_SESSION['fullname'];
$adm_no = $_SESSION['adm_no'];
$session = $_SESSION['session'];
$logterm = $_SESSION['term'];

//THIS IS A REQUIREMENT FOR SELECTING ONLY COURSES THAT BELONGS TO THE TERM THE STUDENT LOGIN TO.
if ($logterm == "First Term") {
  $tm = 1;
  $dash_time_table = "subject_time_table";
  $result_tbl = "ft_answer_sheet";
}
if ($logterm == "Second Term") {
  $tm = 2;
  $dash_time_table = "subject_time_table_2";
  $result_tbl = "st_answer_sheet";
}
if ($logterm == "Third Term") {
  $tm = 3;
  $dash_time_table = "subject_time_table_3";
  $result_tbl = "tt_answer_sheet";
}

$tm_tbl = $conn->query("SELECT * FROM $dash_time_table WHERE class='$class' AND session = '$session'");
$total_tm_tbl = $tm_tbl->num_rows;


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title><?= $sch_name; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <?php include "header.php"; ?>
  <div class="collapse navbar-collapse" id="ftco-nav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item"><a href="index.php" class="nav-link">Back</a></li>
      <li class="nav-item"><a href="profile_logout.php" class="nav-link">Log Out</a></li>
    </ul>
  </div>
  </div>
  </nav>
  <section class="container">
    <div class="container">
      <h4 class="text-center">Welcome back <?= $_SESSION['fullname']; ?> [<?= $_SESSION['adm_no']; ?>] </h4>
      <span><strong>Class:</strong> <?= $_SESSION['class']; ?></span><br>
      <span><strong>Log Term & Session:</strong> <?= $logterm; ?> [<?= $session; ?>]</span></br>
      <span><strong>Current Term & Session:</strong> <?= $current_term; ?> [<?= $current_session; ?>]</span>
    </div>
  </section>
  <?php
  //CALLING OF REGISTERED SUBJECTS
  $reg_subj = $conn->query("SELECT * FROM $result_tbl WHERE adm_no = '$adm_no' AND session = '$session'");
  $subj = $reg_subj->num_rows;
  if ($subj == 0) {
    echo "<div class='container'><h5 class='text-center'>You haven't registered any subject for $logterm $session</h5></div>";
  } else {
  ?>
    <div class="row" style="width:90%; margin:0 auto;">
      <div class="col-lg-9 ftco-animate" style="overflow-x:auto; margin-bottom:20px;
        padding:10px; border-radius:20px; border-bottom: 2px solid <?= $header_col; ?>;
         box-shadow:grey 1px 5px 10px 0px;">
        <h5 class="text-center alert alert-success"><?= $logterm; ?> Registered Subjects</h5>
        <table class="table" border='1'>
          <thead>
            <tr>
              <th class="text-center" style="background:rgba(209, 23, 60,0.5);color:#fff;border:2px solid #000;">Subject</th>
              <th class="text-center" style="background:rgba(209, 23, 60,0.5);color:#fff;border:2px solid #000;">Session</th>
              <th class="text-center" style="background:rgba(209, 23, 60,0.5);color:#fff;border:2px solid #000;">Term</th>
              <th class="text-center" style="background:rgba(209, 23, 60,0.5);color:#fff;border:2px solid #000;">Teacher</th>
              <th class="text-center" style="background:rgba(209, 23, 60,0.5);color:#fff;border:2px solid #000;">Action</th>
            </tr>
          </thead>



          <?php
          $result = $conn->query("SELECT * FROM $result_tbl WHERE adm_no='$adm_no' AND session = '$session'");
          while ($row = $result->fetch_assoc()) : ?>
            <tr>
              <td style="text-align:center;"><strong><?= $row['subject']; ?>[<?= $row['course_code']; ?>]</strong></td>
              <td style="text-align:center;"><strong><?= $row['session']; ?></strong></td>
              <td style="text-align:center;"><strong><?= $logterm; ?></strong></td>
              <td style="text-align:center;"><strong><?= $row['teacher']; ?></strong></td>
              <td style="text-align:center;">
                <a style="font-size:30px;" href="reg_subject_pro.php?delete=<?= $row['A_id']; ?>">

                  <?php
                  if ($row['status'] == 'UNDONE')
                    echo '<span style="color:red;" class="icon-trash"></span></a>';
                  ?>

              </td>

            <?php endwhile; ?>
            </tr>
        </table>
      </div>

      <div class="col-lg-3 ftco-animate" style="overflow-x:auto; margin-bottom:20px;
        padding:10px; border-radius:20px; border-bottom: 2px solid <?= $header_col; ?>;
         box-shadow:grey 1px 5px 10px 0px;">
        <h5 class="text-center alert alert-success">Subjects already taken in <?= $logterm; ?></h5>
        <table class="table" border='1'>
          <thead>
            <tr>
              <th>Subject</th>
              <th>Status</th>
            </tr>
          </thead>



          <?php
          $result = $conn->query("SELECT * FROM $result_tbl WHERE adm_no='$adm_no' AND session = '$session'");
          while ($row = $result->fetch_assoc()) : ?>
            <tr>
              <td style="text-align:center;"><strong><?= $row['subject']; ?></strong></td>
              <td style="text-align:center;"><strong><?= $row['status']; ?></strong></td>
            <?php endwhile; ?>
            </tr><?php } ?>
        </table>
      </div>
      <hr>

      <div class="row" style="width:100%;margin:0 auto;">
        <div class="col-lg-3 ">
          <div class="container">

            <div class="ftco-animate" style="margin-bottom:20px;
        padding:10px; border-radius:20px; border-bottom: 2px solid <?= $header_col; ?>;
         box-shadow:grey 1px 5px 10px 0px;">
              <h5 class="text-center alert alert-success">Enroll for Exam</h5>
              <form action="reg_subject_pro.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="A_id" value="<?= $A_id; ?>">
                <div class="form-group">
                  <select class="form-control" name="subject" required>
                    <option value="">Select Subject</option>
                    <?php
                    $sub = $conn->query("SELECT * FROM subject_tbl WHERE class='$class' AND term='$tm'");
                    while ($row = $sub->fetch_assoc()) {
                    ?>
                      <option value="<?= $row['subject']; ?>"><?= $row['subject']; ?>-<?= $row['course_code'];
                                                                                    } ?> </option>
                  </select>
                </div>
                <hr>

                <div class="form-group">
                  <input type="hidden" name="class" value="<?= $_SESSION['class']; ?>">
                </div>

                <div class="form-group">
                  <input type="hidden" name="term" value="<?= $logterm; ?>">
                </div>

                <div class="form-group">
                  <input type="hidden" name="username" value="<?= $_SESSION['username']; ?>">
                </div>

                <div class="form-group">
                  <input type="hidden" name="fullname" value="<?= $_SESSION['fullname']; ?>">
                </div>

                <div class="form-group">
                  <input type="hidden" name="adm_no" value="<?= $_SESSION['adm_no']; ?>">
                </div>

                <div class="form-group">
                  <input type="hidden" name="code" value="<?php
                                                          $query = $conn->query("SELECT paper_type FROM $answer_sheet WHERE class='$class'");
                                                          while ($row = $query->fetch_assoc()) {
                                                            $paper_type = $row['paper_type'];
                                                          }
                                                          if ($paper_type == "") {
                                                            echo 1;
                                                          }
                                                          if ($paper_type == "Type A") {
                                                            echo 2;
                                                          }
                                                          if ($paper_type == "Type B") {
                                                            echo 3;
                                                          }
                                                          if ($paper_type == "Type C") {
                                                            echo 1;
                                                          }
                                                          ?>">
                </div>

                <div class="form-group">

                  <input type="submit" class="btn btn-dark" name="register" value="Enroll">

                </div>

                <a href="admin/exam/index.php" class="btn btn-success">Proceed to Exam Page</a>
              </form>
            </div>

            <!-- SEE RESULT -->
            <div class="mt-5">
              <div class="ftco-animate" style="margin-bottom:20px;
        padding:10px; border-radius:20px; border-bottom: 2px solid <?= $header_col; ?>;
         box-shadow:grey 1px 5px 10px 0px;">
                <!-- <form action="result" method="POST">
                  <h5 class="text-center alert alert-success">Check Result</h5>
                  <div class="form-group">
                    <select name="term" class="form-control">
                      <option value="First Term">First Term</option>
                      <option value="Second Term">Second Term</option>
                      <option value="Third Term">Third Term</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <input type="submit" class="btn btn-warning" name="check_result" value="Check Result">
                  </div>
                </form> -->
                <h5 class="text-center alert alert-success">Check Result</h5>
                <a href="result" class="btn btn-warning">Check result</a>

              </div>
            </div>
            <!-- END OF RESULT -->

          </div>
        </div>

        <?php
        if ($total_tm_tbl <= 0) {
          echo "<div class='container alert alert-warning' style='width:50%;margin:0 auto;'> $logterm
    Exam Time table is empty!</div>";
        } else {
        ?>
          <div class="col-lg-9 ftco-animate" style="overflow-x:auto; margin-bottom:20px;
        padding:10px; border-radius:20px; border-bottom: 2px solid <?= $header_col; ?>;
         box-shadow:grey 1px 5px 10px 0px;">
            <h5 class="text-center alert alert-info"><?= $logterm; ?> Exam Time Table</h5>
            <div class=" Scrollbar" style='height:300px;overflow-x:auto;'>
              <table class="table" border='1'>

                <thead>
                  <tr>
                    <th class="text-center" style="background:rgba(209, 23, 60,0.5);color:#fff;border:2px solid #000;">Class</th>
                    <th class="text-center" style="background:rgba(209, 23, 60,0.5);color:#fff;border:2px solid #000;">Subject</th>
                    <th class="text-center" style="background:rgba(209, 23, 60,0.5);color:#fff;border:2px solid #000;">Course Code</th>
                    <th class="text-center" style="background:rgba(209, 23, 60,0.5);color:#fff;border:2px solid #000;">Day</th>
                    <th class="text-center" style="background:rgba(209, 23, 60,0.5);color:#fff;border:2px solid #000;">Period</th>
                  </tr>
                </thead>

                <?php

                while ($row = $tm_tbl->fetch_assoc()) : ?>
                  <tr>
                    <td style='text-align:center;'><strong><?= $row['class']; ?></strong></td>
                    <td style='text-align:center;'><?= $row['subject']; ?></td>
                    <td style='text-align:center;'><?= $row['course_code']; ?></td>
                    <td style='text-align:center;'><?= $row['day']; ?></td>
                    <td style='text-align:center;'><?= $row['exam_order']; ?></td>
                    <?php $gen_code = $row['gen_code']; ?>
                  <?php endwhile; ?>
                  </tr>
              </table>

            </div>
            <div class="container" style='display:inline-flex; width:50%;margin:30px auto; margin-left:20%;'>
              <a href="p_tm_tbl_pdf.php" class="btn btn-success">Create Time Table PDF</a>
            </div>
          <?php } ?>
          </div>
      </div>
    </div>

    </div>
    </div>
    <br><br><br>
    <?php include "footer.php"; ?>