<?php
require "../config/db.php";
$name = $_SESSION['name'];
$user_token = $_SESSION['token'];
$_SESSION['page_2'] = "question_uploader.php";


switch ($current_term) {
  case "First Term":
    $s_term = 1;
    break;
  case "Second Term":
    $s_term = 2;
    break;
  case "Third Term":
    $s_term = 3;
    break;
}
//CALLING SAVED SUBJECTS BY USER FROM DATABASE
$result = $conn->query("SELECT * FROM subject_tbl WHERE user_token='$user_token' AND term='$s_term'");
$total_course = $result->num_rows;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title><?php echo $sch_name; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <?php include "header.php"; ?>
  <?php include "admin_navbar.php"; ?>
  <div class="container">
    <span><strong>Academic Period:</strong><?= $current_term; ?> [<?= $current_session; ?>]</span>
    <div class="row">
      <div class="col-lg-6 ftco-animate">
        <form action="search" method="POST" class="searchform alert alert-info order-lg-last">
          <h5>Search Questions</h5>
          <div class="row">
            <div class="form-group col-lg-5 ftco-animate">
              <select class="form-control" name="course_code" required>
                <option value="">Course Code</option>
                <?php
                $class = $conn->query("SELECT * FROM subject_tbl WHERE user_token='$user_token' AND term='$s_term'");
                while ($row = $class->fetch_assoc()) {
                ?>
                  <option value="<?php echo $row['course_code']; ?>"><?php echo $row['course_code'];
                                                                    } ?>
                  </option>
              </select>
            </div>

            <div class="form-group col-lg-5 ftco-animate">
              <select class="form-control" name="term" required>
                <option value="">Term</option>
                <option value="First Term">First Term</option>
                <option value="Second Term">Second Term</option>
                <option value="Third Term">Third Term</option>
              </select>
            </div>

            <div class="form-group col-lg-2 ftco-animate">
              <button type="submit" name="submit" style="cursor:pointer;font-size:25px;" class="btn btn-success">
                <span class="ion-ios-search"></span></button>
            </div>
          </div>
        </form>
        <div class="alert alert-warning">
          <p>You need to add the subjects you take before you can upload questions...</p>
        </div>

        <div class="ftco-animate" style="overflow-x:auto; margin-bottom:20px;
        padding:10px; border-radius:20px; border-bottom: 2px solid <?php echo $header_col; ?>;
         box-shadow:grey 1px 5px 10px 0px;">
          <?php
          if ($total_course !== 0) {
          ?>
            <!-- SUBJECT TABLE -->
            <div class="ftco-animate" style="overflow-x:auto;">
              <h5 class="text-center alert alert-info">Uploaded Subjects</h5>
              <div class="Scrollbar" style="height:200px;">
                <table class="table table-bordered" border="1">
                  <thead>
                    <tr>
                      <th class="text-center" style="background:rgba(209, 23, 60,0.5);color:#fff;border:2px solid #000;">Subject</th>
                      <th class="text-center" style="background:rgba(209, 23, 60,0.5);color:#fff;border:2px solid #000;">Course Code</th>
                      <th class="text-center" style="background:rgba(209, 23, 60,0.5);color:#fff;border:2px solid #000;">Action</th>
                    </tr>
                  </thead>

                  <?php
                  while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                      <?php $course_code = $row['course_code']; ?>
                      <td style="text-align:center;"><?php echo $row['subject']; ?></td>
                      <td style="text-align:center;"><?php echo $row['course_code']; ?></td>
                      <td>
                        <a style="font-size:25px;" href="exam_upload_pro.php?delete=<?php echo $row['id']; ?>&course_code=<?php echo $course_code; ?>">
                          <span style="color:red;text-align:center;cursor:pointer;" class="icon-delete"></span></a>
                      </td>
                    </tr>
                  <?php endwhile; ?>
                </table>
              </div>
            </div>
          <?php } ?>
          <h5 class="text-center alert alert-info">Add subject to Database</h5>
          <form action="add_subject.php" method="post" enctype="multipart/form-data" class="row">
            <div class="form-group">
              <input class="form-control" type="hidden" value="<?php echo $name; ?>" name="teacher" required />
              <input class="form-control" type="hidden" value="<?php echo $user_token; ?>" name="user_token" reuser_tokenquired />
            </div>


            <div class="form-group col-lg-6">
              <input type="text" name="subject" class="form-control" placeholder="Subject" required>
            </div>
            <hr>

            <div class="form-group col-lg-6">
              <input type="text" name="course_code" class="form-control" placeholder="Course code" required>
            </div>

            <div class="form-group col-lg-6">
              <input type="text" name="course_unit" class="form-control" placeholder="Score per question" required>
            </div>

            <div class="form-group col-lg-6">
              <input type="number" name="duration" class="form-control" placeholder="Set Exam duration in minutes" required>
            </div>

            <div class="form-group col-lg-6">
              <select class="form-control" name="no_of_quest" required>
                <option value="">How many question?</option>
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="40">40</option>
                <option value="50">50</option>
                <option value="60">60</option>
                <option value="70">70</option>
                <option value="80">80</option>
                <option value="90">90</option>
                <option value="100">100</option>
              </select>
            </div>


            <div class="form-group col-lg-6">
              <input type="submit" class="btn btn-success" name="add" value="Add Subject">
            </div>

          </form>
        </div>
      </div>

      <div class="col-lg-6 container ftco-animate" style="overflow-x:auto; margin-bottom:20px;
        padding:10px; border-radius:20px; border-bottom: 2px solid <?php echo $header_col; ?>;
         box-shadow:grey 1px 5px 10px 0px">
        <div class="container mb-3">
          <p>Passage uploader</p>
          <a href="passage-uploader" class="btn btn-success">Upload a passage</a>
        </div>
        <form action="exam_upload_pro.php" method="post" enctype="multipart/form-data">
          <h5 class="text-center alert alert-info">Import Questions Text and Answer in Excel Format:</h5>
          <a href="../export/export.php?table=<?php echo $exam_table; ?>" class="col-lg-5" style="font-size:15px;color:#000;">Click here to Export Exam Question table Format
            <span class="icon-download"></span></a><br>
          <a href="../export/export.php?table=<?php echo $answer_table; ?>" class="col-lg-5" style="font-size:15px;">Click here to Export Answer table Format
            <span class="icon-download"></span></a>
          <hr>
          <p class="text-center text-warning"><strong>Note:</strong>
            <em>Excel csv <strong>Question</strong> table must be in this format</em>
          </p>

          <p class="text-center text-warning"><strong>Note:</strong>
          <p>If option is correct, score must be 1, then set the score of wrong options to 0</p>
          </p>
          <hr>
          <div class="form-group">
            <label>Select CSV File:</label>
            <input class="btn btn-primary" style="width:80%;" type="file" name="file" required />
          </div>

          <div class="form-group">
            <select class="form-control category" name="category" required>
              <option value="">Select Category</option>
              <option value="question">Questions</option>
              <option value="answer">Answers</option>
            </select>
          </div>

          <div class="form-group">
            <select class="form-control course_code" name="course_code" required>
              <option value="">Select Course code</option>
              <?php
              $sub = $conn->query("SELECT * FROM subject_tbl WHERE user_token ='$user_token' AND term='$s_term'");
              while ($row = $sub->fetch_assoc()) :
                echo '
                                <option value="' . $row['course_code'] . '">' . $row['subject'] . ' :: ' . $row['course_code'] . ' :: ' . $row['no_of_quest'] . ' question slots
                            ';
              endwhile;
              echo '
                            </option>';
              ?>

            </select>
          </div>

          <div class="form-group hiddedResponse"></div>

          <hr>
          <div class="form-group">
            <input type="submit" class="btn btn-success" name="submit" value="Upload">
          </div>

        </form>
        <?php
        if ($_SESSION['position'] == "Proprietor") {

        ?>
          <form action="exam_upload_pro.php" method="post" enctype="multipart/form-data">
            <a href="../export/export.php?table=instruction_tbl" class="col-lg-5" style="font-size:15px;color:#000;">Click here to Export Exam Question table Format
              <span class="icon-download"></span></a><br>
            <h5 class="text-center alert alert-info">Upload Exam Instructions:</h5>
            <hr>

            <div class="form-group">
              <label>Select CSV File:</label>
              <input class="btn btn-primary" style="width:80%;" type="file" name="file" required />
            </div>

            <hr>
            <div class="form-group">
              <input type="submit" class="btn btn-success" name="submit_instruction" value="Upload">
            </div>

          </form>
        <?php
        }
        ?>
      </div>
    </div>
  </div>

  </div>
  </div>
  <?php include "footer.php"; ?>