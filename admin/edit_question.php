<?php
require "edit_question_pro.php";
$page_2 = $_SESSION['page'];
$_SESSION['page3'] = 'edit_question_pro';
$page = 'question-uploader';

if (isset($_GET['course_code'])) {
  $course_code = $_GET['course_code'];
} else {
  $course_code = $_SESSION['course_code'];
}
$quest = $conn->query("SELECT * FROM $exam_table  WHERE course_code='$course_code' ORDER BY question_number ASC");
$total_result = $quest->num_rows;

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title><?php echo $sch_name; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php include "header.php"; ?>
  <div class="collapse navbar-collapse" id="ftco-nav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item"><a href="<?php echo $page ?>" class="nav-link">Back</a></li>
      <li class="nav-item"><a href="logout" class="nav-link">Log Out</a></li>
    </ul>
  </div>
  </div>
  </nav>

  <div class="container" style="margin:0 auto;">
    <span><strong>Academic Period:</strong><?= $current_term; ?> [<?= $current_session; ?>]</span>
    <?php
    if (isset($_SESSION['message'])) : ?>

      <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
      </div>
    <?php endif ?>
    <div class="container Scrollbar" style="overflow-x:auto; font-size:12px;color:#000;">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Question</th>
            <th>Text</th>
            <th colspan="5">Answers</th>
          </tr>
        </thead>
        <?php
        while ($row = $quest->fetch_assoc()) : ?>
          <tr>
            <td><?php echo $row['question_number']; ?></td>
            <td><?php echo $row['text']; ?></td>
            <?php $ques_no = $row['question_number'];
            $quest_code = $row['quest_code'];
            $ans = $conn->query("SELECT * FROM $answer_table WHERE course_code='$course_code' AND question_number ='$ques_no'");
            while ($row = $ans->fetch_assoc()) {
            ?>
              <td><?php echo $row['text'];
                  $answer_text = $row['text'];
                  ?></td>
            <?php
            }
            ?>
            <td>
              <form action="edit_quest_single" method="POST">
                <input type="hidden" name="quest_code" value="<?php echo $quest_code; ?>">
                <input class="btn btn-primary" style="font-size:10px;" type="submit" name="edit" value="Edit">
              </form>
            </td>
          </tr>
        <?php endwhile; ?>
      </table>
    </div>

  </div>