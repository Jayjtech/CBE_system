<?php
require "config/db.php";
$term = $_SESSION['term'];
$session = $_SESSION['session'];

if (isset($_POST['register'])) {
    $class = mysqli_real_escape_string($conn, $_POST['class']);
    $course_code = mysqli_real_escape_string($conn, $_POST['course_code']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $adm_no = mysqli_real_escape_string($conn, $_POST['adm_no']);
    $code = mysqli_real_escape_string($conn, $_POST['code']);
    $status = "UNDONE";

    if ($session != $current_session) {
        $_SESSION['message'] = "Registeration is closed for $session!";
        $_SESSION['msg_type'] = "error";
        header("location: dashboard");
    } else {
        if ($term != $current_term) {
            $_SESSION['message'] = "You can't register $term subjects now!";
            $_SESSION['msg_type'] = "error";
            header("location: dashboard");
        } else {
            //SELECTING PAPER TYPE
            $type_A = "Type A";
            $type_B = "Type B";
            $type_C = "Type C";

            switch ($code) {
                case 1:
                    $paper_type = $type_A;
                    break;
                case 2:
                    $paper_type = $type_B;
                    break;
                case 3:
                    $paper_type = $type_C;
                    break;
            }


            $query = $conn->query("SELECT * FROM $subject_tbl WHERE class = '$class' AND course_code = '$course_code'");
            while ($row = $query->fetch_assoc()) {
                $teacher = $row['teacher'];
                $teacher_token = $row['user_token'];
                $subject = $row['subject'];
                $duration = $row['duration'];
            }
            //To ensure that Thesame subject is not registered over and again
            $subjectQuery = $conn->query("SELECT * FROM $answer_sheet WHERE course_code='$course_code' AND class='$class' AND adm_no='$adm_no' AND session='$session'");

            if ($subjectQuery->num_rows > 0) {
                $_SESSION['message'] = "You have registered $subject!";
                $_SESSION['msg_type'] = "warning";
                $_SESSION['remedy'] = "";
                $_SESSION['btn'] = "Ok";
                header("location: dashboard");
            } else {


                //To ensure that Thesame subject is not registered over and again
                $evaQuery = $conn->query("SELECT * FROM $evaluation_tbl WHERE class='$class' AND adm_no='$adm_no' AND term='$term' AND session='$session'");
                $evaluate = $evaQuery->num_rows;

                // $check = substr('2021/2022', 5 , 4);
                if ($Count == 0) {
                    if ($evaluate == 0) {
                        $query_1 = $conn->query("INSERT INTO  $evaluation_tbl (fullname, class, adm_no, term, session) 
            VALUES('$fullname', '$class', '$adm_no', '$term', '$session')") or die($conn->error);
                    }


                    if ($term ==  "First Term") {
                        $insert = $conn->query("INSERT INTO  $answer_sheet (fullname, class, subject, course_code, paper_type, duration, username, adm_no, session, teacher, teacher_token, status) 
        VALUES('$fullname', '$class', '$subject', '$course_code', '$paper_type', '$duration', '$username', '$adm_no', '$session', '$teacher', '$teacher_token', '$status')")
                            or die($conn->error);
                    }

                    if ($term ==  "Second Term") {
                        // TO SELECT PREVIOUS TERM'S SCORE FOR CUMULATIVE
                        $ft_CD = substr($course_code, 0, 5) . '1';
                        $check = $conn->query("SELECT * FROM $prev_answer_sheet WHERE course_code='$ft_CD' AND class='$class' AND session='$session' AND adm_no='$adm_no'");
                        $FTS = $check->fetch_assoc();
                        $ft_score = $FTS['total'];


                        $insert = $conn->query("INSERT INTO  $answer_sheet (fullname, class, subject, course_code, paper_type, duration, username, adm_no, ft_score, session, teacher, teacher_token, status) 
        VALUES('$fullname', '$class', '$subject', '$course_code', '$paper_type', '$duration', '$username', '$adm_no', '$ft_score', '$session', '$teacher', '$teacher_token', '$status')")
                            or die($conn->error);
                    }

                    if ($term ==  "Third Term") {
                        // TO SELECT PREVIOUS TERM'S SCORE FOR CUMULATIVE
                        $st_CD = substr($course_code, 0, 5) . '2';
                        $check2 = $conn->query("SELECT * FROM $prev_answer_sheet WHERE course_code='$st_CD' AND class='$class' AND session='$session' AND adm_no='$adm_no'");
                        $STS = $check2->fetch_assoc();
                        $ft_score = $STS['ft_score'];
                        $st_score = $STS['total'];

                        $insert = $conn->query("INSERT INTO  $answer_sheet (fullname, class, subject, course_code, paper_type, duration, username, adm_no, ft_score, st_score, session, teacher, teacher_token, status) 
        VALUES('$fullname', '$class', '$subject', '$course_code', '$paper_type', '$duration', '$username', '$adm_no', '$ft_score', '$st_score', '$session', '$teacher', '$teacher_token', '$status')");
                    }



                    if ($insert) {
                        //COUNT THE NUMBER OF SUBJECT REGISTERED BY THE STUDENT
                        $findOverall = $conn->query("SELECT * FROM $answer_sheet WHERE adm_no='$adm_no' AND session='$session'");
                        $subNo = $findOverall->num_rows;

                        // OVERALL SCORE IS EQUAL TO NUMBER OF SUBJECT REGISTERED MULTIPLIED BY 100
                        $overall = ($subNo * 100);
                        //UPDATE EVALUATION TABLE
                        $updateEva = $conn->query("UPDATE $evaluation_tbl SET out_of='$overall' WHERE adm_no='$adm_no'");
                    }

                    $_SESSION['message'] = "You have successfully registered $subject!";
                    $_SESSION['msg_type'] = "success";
                    $_SESSION['remedy'] = "";
                    $_SESSION['btn'] = "Ok";

                    header("location: dashboard");
                }
            }
        }
    }
}



if (isset($_GET['delete'])) {
    $A_id = $_GET['delete'];
    $findAdm_no = $conn->query("SELECT * FROM $answer_sheet WHERE A_id='$A_id'");
    while ($row = $findAdm_no->fetch_assoc()) {
        $adm_no = $row['adm_no'];
        $session = $row['session'];
    }

    if ($findAdm_no) {
        $del = $conn->query("DELETE FROM $answer_sheet WHERE A_id=$A_id");
    }

    if ($del) {
        //COUNT THE NUMBER OF SUBJECT REGISTERED BY THE STUDENT
        $findOverall = $conn->query("SELECT * FROM $answer_sheet WHERE adm_no='$adm_no' AND session='$session'");
        $subNo = $findOverall->num_rows;

        // OVERALL SCORE IS EQUAL TO NUMBER OF SUBJECT REGISTERED MULTIPLIED BY 100
        $overall = ($subNo * 100);
        //UPDATE EVALUATION TABLE
        $updateEva = $conn->query("UPDATE evaluation SET out_of='$overall' WHERE adm_no='$adm_no'");
    }
    $_SESSION['message'] = "Your details on subject table has been deleted!";
    $_SESSION['msg_type'] = "success";
    $_SESSION['remedy'] = "";
    $_SESSION['btn'] = "Ok";
    header("location: dashboard");
}


if (isset($_POST['update'])) {
    $A_id = mysqli_real_escape_string($conn, $_POST['A_id']);
    $class = mysqli_real_escape_string($conn, $_POST['class']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $adm_no = mysqli_real_escape_string($conn, $_POST['adm_no']);


    $conn->query("UPDATE $answer_sheet SET class = '$class', subject = '$subject',
    username = '$username', adm_no = '$adm_no' WHERE A_id=$A_id");
    $_SESSION['message'] = "$subject has been updated!";
    $_SESSION['msg_type'] = "warning";

    header("location: dashboard");
}
