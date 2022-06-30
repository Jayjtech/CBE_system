<?php
require "../config/db.php";
if ($_SESSION['position'] == "Treasurer" || $_SESSION['position'] == "Vice Principal" || $_SESSION['position'] == "Teacher") {
  header('location: logout');
}
$tm_tbl = $conn->query("SELECT * FROM $time_table where session='$current_session'");
$total_tm_tbl = $tm_tbl->num_rows;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title><?php echo $sch_name; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <?php include "header.php"; ?>
  <?php include "admin_navbar.php"; ?>

<body>
  <div class="container mb-5">
    <span><strong>Academic Period:</strong><?= $current_term; ?> [<?= $current_session; ?>]</span>
    <div class="row">
      <div class="col-lg-6 ftco-animate" style="overflow-x:auto;
        padding:10px; border-radius:20px; border-bottom: 2px solid <?php echo $header_col; ?>;
         box-shadow:grey 1px 5px 10px 0px;">
        <?php
        if ($total_tm_tbl <= 0) {
          echo "<div class='container alert alert-warning' style='width:100%;margin:0 auto;'> $current_term
    Exam Time table is empty!</div>";
        } else {
        ?>
          <h4 class="text-center"><?php echo $current_term; ?> Exam Time Table</h4>
          <div class="container Scrollbar" style='height:200px;overflow-x:auto;'>
            <table class="table" border='1'>

              <thead>
                <tr>
                  <th class="text-center" style="background:rgba(209, 23, 60,0.5);color:#fff;border:2px solid #000;"'>Class</th>
                        <th class="text-center" style="background:rgba(209, 23, 60,0.5);color:#fff;border:2px solid #000;"'>Subject</th>
                  <th class="text-center" style="background:rgba(209, 23, 60,0.5);color:#fff;border:2px solid #000;"'>Session</th>
                        <th class="text-center" style="background:rgba(209, 23, 60,0.5);color:#fff;border:2px solid #000;"'>Course Code</th>
                  <th class="text-center" style="background:rgba(209, 23, 60,0.5);color:#fff;border:2px solid #000;"'>Day</th>
                        <th class="text-center" style="background:rgba(209, 23, 60,0.5);color:#fff;border:2px solid #000;"'>Period</th>
                </tr>
              </thead>

              <?php

              while ($row = $tm_tbl->fetch_assoc()) : ?>
                <tr>
                  <td style='text-align:center;'><strong><?php echo $row['class']; ?></strong></td>
                  <td style='text-align:center;'><?php echo $row['subject']; ?></td>
                  <td style='text-align:center;'><?php echo $row['session']; ?></td>
                  <td style='text-align:center;'><?php echo $row['course_code']; ?></td>
                  <td style='text-align:center;'><?php echo $row['day']; ?></td>
                  <td style='text-align:center;'><?php echo $row['exam_order']; ?></td>
                  <?php $gen_code = $row['gen_code']; ?>
                <?php endwhile; ?>
                </tr>
            </table>
          </div>
          <div class="ftco-animate" style="overflow-x:auto; margin-bottom:20px;">
            <a href="exam_controller_pro.php?delete=<?php echo $gen_code; ?>" style='' class=" btn btn-danger">Delete Time Table</a>
            <a href="../tm_tbl_pdf.php" class=" btn btn-success">Create PDF</a>
          </div>
        <?php } ?>
        <form action="exam_controller_pro.php" method="post" enctype="multipart/form-data">
          <a href="../export/export.php?table=<?php echo $time_table; ?>" class="col-lg-5" style="font-size:15px;color:#000;">Click here to Export time table Format
            <span class="icon-download"></span></a>
          <h4 class="text-center">Upload Exam Time Table</h4>
          <hr>
          <div class="form-group">
            <label>Select CSV File:</label>
            <input class="btn btn-primary" style="width:80%;" type="file" name="file" required />
            <input type="hidden" name="session" value="<?php echo $current_session; ?>">
          </div>

          <div class="form-group">
            <input type="submit" class="btn btn-success" name="submit" value="Upload">
          </div>
        </form>
      </div>

      <div class="col-lg-6 ftco-animate" style="overflow-x:auto;
        padding:10px; border-radius:20px; border-bottom: 2px solid <?php echo $header_col; ?>;
         box-shadow:grey 1px 5px 10px 0px;">
        <form action="exam_controller_pro.php" method="post" enctype="multipart/form-data">
          <h3 class="text-center">Set Exam for the current period</h3>
          <table class="table" border='1'>
            <h4 class="text-center">Current Exam DAY and PERIOD</h4>
            <thead>
              <tr>
                <th>DAY</th>
                <th>PERIOD</th>
              </tr>
            </thead>

            <?php
            $result = $conn->query("SELECT * FROM exam_controller");
            while ($row = $result->fetch_assoc()) : ?>
              <tr>
                <td><strong><?php echo $row['day']; ?></strong></td>
                <td><strong><?php echo $row['exam_order']; ?></strong></td>
              <?php endwhile; ?>
              </tr>
          </table>

          <h4 class="text-center">Set Exam Date</h4>
          <p>Set Exam for the Day and publish</p>
          <hr>
          <div class="form-group">
            <select class="form-control" name="day" required>
              <option value="">Select Exam Day</option>
              <option value="null">Null</option>
              <option value="DAY-1">DAY-1</option>
              <option value="DAY-2">DAY-2</option>
              <option value="DAY-3">DAY-3</option>
              <option value="DAY-4">DAY-4</option>
              <option value="DAY-5">DAY-5</option>
              <option value="DAY-6">DAY-6</option>
              <option value="DAY-7">DAY-7</option>
              <option value="DAY-8">DAY-8</option>
              <option value="DAY-9">DAY-9</option>
              <option value="DAY-10">DAY-10</option>
              <option value="DAY-11">DAY-11</option>
              <option value="DAY-12">DAY-12</option>
              <option value="DAY-13">DAY-13</option>
              <option value="DAY-14">DAY-14</option>
            </select>
          </div>
          <hr>

          <div class="form-group">
            <select class="form-control" name="exam_order" required>
              <option value="">Select Exam Order</option>
              <option value="null">Null</option>
              <option value="First">First</option>
              <option value="Second">Second</option>
              <option value="Third">Third</option>
              <option value="Fourth">Fourth</option>
              <option value="Fifth">Fifth</option>

            </select>
          </div>
          <hr>
          <div class="form-group">
            <input type="submit" class="btn btn-info" value="Publish" name="publish">
          </div>


        </form>
      </div>
    </div>
  </div>
  </div>
  </div>
  <?php include "footer.php"; ?>