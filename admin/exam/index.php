<?php
require "../../config/db.php";
$my_class = $_SESSION['class'];
$status = "UNDONE";
$username = $_SESSION['username'];
$adm_no = $_SESSION['adm_no'];
$day_subject = "";
$session = $_SESSION['session'];
//SELECT THE SUBJECT FOR THAT PARTICULAR DAY AND PERIOD
$subject = $conn->query("SELECT * FROM $time_table WHERE day='$day' AND exam_order='$exam_order' AND class='$my_class'");
while ($row = $subject->fetch_assoc()) {
    $day_subject = $row['subject'];
    $course_code = $row['course_code'];
}
if (!$course_code) {
    $_SESSION['message'] = "Time table has not been set for this academic period!";
    $_SESSION['msg_type'] = "error";
    $_SESSION['remedy'] = "";
    $_SESSION['btn'] = "Okay";
    header("location:../../register_subject.php");
} else {

    $subject = $conn->query("SELECT * FROM subject_tbl WHERE course_code='$course_code' AND class='$my_class'");
    while ($row = $subject->fetch_assoc()) {
        $unit_score = $row['course_unit'];
    }

    $check = $conn->query("SELECT * FROM $answer_sheet WHERE session='$session' AND adm_no='$adm_no' AND course_code='$course_code'");
    while ($row = $check->fetch_assoc()) {
        $my_status = $row['status'];
        $paper_type = $row['paper_type'];
    }

    //PAPER TYPE SAVED IN SESSION
    $_SESSION['paper_type'] = $paper_type;

    //IF EXAM HAS ALREADY BEEN TAKEN AND SUBMITTED 
    if ($my_status != $status) {
        if ($_SESSION['page'] == "question_page") {
            $_SESSION['message'] = "Your Exam time is over and your answers have been submitted successfully!";
            $_SESSION['msg_type'] = "success";
            $_SESSION['remedy'] = "";
            $_SESSION['btn'] = "Okay";

            header("location:../../register_subject.php");
        } else if ($_SESSION['page'] != "question_page") {
            $_SESSION['message'] = "Sorry, you have already taken $day_subject and your answers have been submitted!";
            $_SESSION['msg_type'] = "warning";
            $_SESSION['remedy'] = "";
            $_SESSION['btn'] = "Okay";
            header("location:../../register_subject.php");
        }
    } else {

        $_SESSION['course_code'] = $course_code;
        $_SESSION['day_subject'] = $day_subject;

        //GET QUESTIONS
        $result = $conn->query("SELECT * FROM $exam_table WHERE course_code='$course_code' AND session='$current_session'");
        //GET RESULT
        $total_question = $result->num_rows;

        //EXAM TIMER
        $duration = "";

        $res = $conn->query("SELECT * FROM $answer_sheet WHERE adm_no='$adm_no' AND session='$session' AND course_code='$course_code'");
        while ($row = $res->fetch_assoc()) {
            $duration = $row['duration'];
        }
        $_SESSION["duration"] = $duration;
        $_SESSION["start_time"] = date("Y-m-d H:i:s");
        $instructions = $conn->query("SELECT * FROM $instruction_tbl");
    }
?>



    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Exam</title>
        <link rel="stylesheet" href="css/exam.css">
        <?php include "header.php"; ?>
        <?php include "exam_navbar.php"; ?>

        <div class="container mb-5" style="color:#000;margin:0 auto;background-image:url(../<?php echo $sch_logo; ?>);background-position: center;
  background-repeat: no-repeat;background-size: 100% 100%;">
            <div class="container ftco-animate" style="background-color:rgba(225,225,225,0.7);border-radius:15px;">

                <?php
                //To ensure that Thesame class is not uploaded over and again
                $classQuery = "SELECT * FROM $answer_sheet WHERE username=? AND adm_no=? AND class=? AND course_code=? LIMIT 1";
                $stmt = $conn->prepare($classQuery);
                $stmt->bind_param('ssss', $username, $adm_no, $my_class, $course_code);
                $stmt->execute();
                $result = $stmt->get_result();
                $Count = $result->num_rows;
                $stmt->close();
                if ($Count == 0) {
                    echo "<div><p>You haven't registered for this subject, Click <a href='../../register_subject.php'>Here to register</a></p></div>";
                } else {
                ?>

                    <div class="header">
                        <h1 class="text-center"><?php echo $sch_name; ?></h1><br>
                        <div class="container" style="display:inline-flex; overflow-x:auto;"><br>
                            <P><strong>Name: </strong><?php echo $_SESSION['fullname']; ?></P>
                            <P style="margin-left:10px;"><strong>Class: </strong><?php echo $_SESSION['class']; ?></P>
                            <P style="margin-left:10px;"><strong>Admission Number: </strong><?php echo $_SESSION['adm_no']; ?></P>
                            <P style="margin-left:10px;"><strong>Subject: </strong><?php echo $day_subject; ?>::<?php echo $course_code; ?></P>
                            <hr><br><br>
                        </div>
                    </div>

                    <div class="justify-content-center" style="margin:0 auto;">
                        <?php
                        if ($total_question == 0) {
                            echo "<div class='container'><p>You have No Exam for this period</p></div>";
                        } else {
                        ?>
                            <h3>Instructions:</h3>
                            <?php
                            while ($row = $instructions->fetch_assoc()) :
                                $exam_date = $row['exam_date'];
                            ?>
                                <ul>
                                    <li><?php echo $row['instruction1']; ?></li>
                                    <li><?php echo $row['instruction2']; ?></li>
                                    <li><?php echo $row['instruction3']; ?></li>
                                    <li><?php echo $row['instruction4']; ?></li>
                                    <li><?php echo $row['instruction5']; ?></li>
                                </ul>


                            <?php endwhile; ?>
                            <ul>
                                <li><strong>Number of Questions:</strong> <?php echo $total_question; ?></li>
                                <li><strong>Paper Type:</strong> <?php echo $paper_type; ?></li>
                                <li><strong>Each question carries:</strong> <?php echo $unit_score; ?> <?php if ($unit_score == 1) {
                                                                                                            echo "Mark";
                                                                                                        } else {
                                                                                                            echo "Marks";
                                                                                                        } ?></li>
                                <li><strong>Estimated Time:</strong> <?php echo $duration; ?> <?php if ($duration == 1) {
                                                                                                    echo "minute";
                                                                                                } else {
                                                                                                    echo "minutes";
                                                                                                } ?></li>
                                <li><strong>Examination Date:</strong> <?php echo $exam_date; ?></li>
                            </ul>



                            <a href="questions?n=1" class="start btn btn-success">Start Exam</a>
                    </div>
        <?php }
                    }
                } ?>
            </div>
        </div>

        <?php include "footer.php"; ?>