<?php
include "../config/db.php";
$questions = "question";
$answers = "answer";
$instructions = "instruction";
//Teacher's token id very important here
$user_token = $_SESSION['token'];

if (isset($_POST['passage'])) {
    $passage = mysqli_real_escape_string($conn, $_POST['passageText']);
    $from = mysqli_real_escape_string($conn, $_POST['from']);
    $to = mysqli_real_escape_string($conn, $_POST['to']);
    $course_code = $_POST['course_code'];

    $query = $conn->query("SELECT * FROM subject_tbl WHERE course_code = '$course_code'");
    while ($row = $query->fetch_assoc()) {
        $class = $row['class'];
        $subject = $row['subject'];
        $no_of_quest = $row['no_of_quest'];
    }

    for ($from = 1; $from <= $to; $from++) {
        $question_number = $from;
        $quest_code = 'ID' . $question_number;

        // NEEDED TO SHUFFLE QUESTION NUMBERS
        include "q_type.php";

        $check = $conn->query("SELECT * FROM $exam_tbl_A WHERE course_code='$course_code' AND class='$class' AND session='$current_session' AND question_number=$question_number");

        if ($check->num_rows == 0) {
            $query_a = "INSERT INTO $exam_tbl_A (session, user_token, subject, course_code, class, question_number, text, quest_code)
            VALUES ('$current_session','$user_token', '$subject', '$course_code', '$class', '$question_number','$passage', '$quest_code')";
            mysqli_query($conn, $query_a);

            $query_b = "INSERT INTO $exam_tbl_B (session, user_token, subject, course_code, class, question_number, text, quest_code)
            VALUES ('$current_session','$user_token', '$subject', '$course_code', '$class', '$quest_no_type_B','$passage', '$quest_code')";
            mysqli_query($conn, $query_b);

            $query_c = "INSERT INTO $exam_tbl_C (session, user_token, subject, course_code, class, question_number, text, quest_code)
            VALUES ('$current_session','$user_token', '$subject', '$course_code', '$class', '$quest_no_type_C','$passage', '$quest_code')";
            mysqli_query($conn, $query_c);
            //    CREATE SPACE FOR ANSWERS FROM A-D

            //FOR TYPE A
            $query_a = "INSERT INTO $answer_tbl_A (session, user_token, subject, course_code,  class, question_number, alpha_opt, quest_code)
            VALUES ('$current_session','$user_token', '$subject', '$course_code', '$class', '$question_number', 'A', '$quest_code')";
            mysqli_query($conn, $query_a);
            $query_a = "INSERT INTO $answer_tbl_A (session, user_token, subject, course_code,  class, question_number, alpha_opt, quest_code)
            VALUES ('$current_session','$user_token', '$subject', '$course_code', '$class', '$question_number','B', '$quest_code')";
            mysqli_query($conn, $query_a);
            $query_a = "INSERT INTO $answer_tbl_A (session, user_token, subject, course_code,  class, question_number, alpha_opt, quest_code)
            VALUES ('$current_session','$user_token', '$subject', '$course_code', '$class', '$question_number', 'C', '$quest_code')";
            mysqli_query($conn, $query_a);
            $query_a = "INSERT INTO $answer_tbl_A (session, user_token, subject, course_code,  class, question_number, alpha_opt, quest_code)
            VALUES ('$current_session','$user_token', '$subject', '$course_code', '$class', '$question_number', 'D', '$quest_code')";
            mysqli_query($conn, $query_a);


            //FOR TYPE B
            $query_b = "INSERT INTO $answer_tbl_B (session, user_token, subject, course_code,  class, question_number, alpha_opt, quest_code)
            VALUES ('$current_session','$user_token', '$subject', '$course_code', '$class', '$quest_no_type_B', 'A', '$quest_code')";
            mysqli_query($conn, $query_b);
            $query_b = "INSERT INTO $answer_tbl_B (session, user_token, subject, course_code,  class, question_number, alpha_opt, quest_code)
            VALUES ('$current_session','$user_token', '$subject', '$course_code', '$class', '$quest_no_type_B', 'B', '$quest_code')";
            mysqli_query($conn, $query_b);
            $query_b = "INSERT INTO $answer_tbl_B (session, user_token, subject, course_code,  class, question_number, alpha_opt, quest_code)
            VALUES ('$current_session','$user_token', '$subject', '$course_code', '$class', '$quest_no_type_B', 'C', '$quest_code')";
            mysqli_query($conn, $query_b);
            $query_b = "INSERT INTO $answer_tbl_B (session, user_token, subject, course_code,  class, question_number, alpha_opt, quest_code)
            VALUES ('$current_session','$user_token', '$subject', '$course_code', '$class', '$quest_no_type_B', 'D', '$quest_code')";
            mysqli_query($conn, $query_b);


            // FOR TYPE C
            $query_c = "INSERT INTO $answer_tbl_C (session, user_token, subject, course_code,  class, question_number, alpha_opt, quest_code)
            VALUES ('$current_session','$user_token', '$subject', '$course_code', '$class', '$quest_no_type_C', 'A', '$quest_code')";
            mysqli_query($conn, $query_c);
            $query_c = "INSERT INTO $answer_tbl_C (session, user_token, subject, course_code,  class, question_number, alpha_opt, quest_code)
            VALUES ('$current_session','$user_token', '$subject', '$course_code', '$class', '$quest_no_type_C', 'B', '$quest_code')";
            mysqli_query($conn, $query_c);
            $query_c = "INSERT INTO $answer_tbl_C (session, user_token, subject, course_code,  class, question_number, alpha_opt, quest_code)
            VALUES ('$current_session','$user_token', '$subject', '$course_code', '$class', '$quest_no_type_C', 'C', '$quest_code')";
            mysqli_query($conn, $query_c);
            $query_c = "INSERT INTO $answer_tbl_C (session, user_token, subject, course_code,  class, question_number, alpha_opt,  quest_code)
            VALUES ('$current_session','$user_token', '$subject', '$course_code', '$class', '$quest_no_type_C', 'D', '$quest_code')";
            mysqli_query($conn, $query_c);

            $_SESSION['message'] = "Passage has been Uploaded!";
            $_SESSION['msg_type'] = "success";
            $_SESSION['btn'] = "Ok";
            header("location: passage-uploader");
        } else {
            // error message
            $_SESSION['message'] = "An error occured during the process!";
            $_SESSION['msg_type'] = "error";
            $_SESSION['btn'] = "Ok";
            header("location: passage-uploader");
        }
    }
}
// exit();

if (isset($_POST["submit"])) {
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $course_code = mysqli_real_escape_string($conn, $_POST['course_code']);


    $query = $conn->query("SELECT * FROM subject_tbl WHERE course_code = '$course_code'");
    while ($row = $query->fetch_assoc()) {
        $class = $row['class'];
        $subject = $row['subject'];
        $no_of_quest = $row['no_of_quest'];
    }

    if ($category == $questions) {
        // Allowed mime types
        $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');

        // Validate whether selected file is a CSV file
        if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) {

            // If the file is uploaded
            if (is_uploaded_file($_FILES['file']['tmp_name'])) {

                // Open uploaded CSV file with read-only mode
                $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
                // Skip the first line
                fgetcsv($csvFile);

                // Parse data from CSV file line by line
                while (($line = fgetcsv($csvFile)) !== FALSE) {

                    // Get row data
                    $question_number   =  mysqli_real_escape_string($conn, $line[0]);
                    $question_text  =  mysqli_real_escape_string($conn, $line[1]);
                    $quest_code = "ID$question_number";

                    // NEEDED TO SHUFFLE QUESTION NUMBERS
                    include "q_type.php";


                    //To ensure that Thesame class is not uploaded over and again
                    $checkQuestion = $conn->query("SELECT * FROM $exam_tbl_A WHERE course_code='$course_code' AND session='$current_session' AND question_number='$question_number'");

                    //insert data from CSV file 
                    if ($checkQuestion->num_rows == 0) {
                        $query_a = "INSERT INTO $exam_tbl_A (session, user_token, subject, course_code, class, question_number, text, quest_code)
     VALUES ('$current_session','$user_token', '$subject', '$course_code', '$class', '$question_number','$question_text', '$quest_code')";
                        mysqli_query($conn, $query_a);

                        $query_b = "INSERT INTO $exam_tbl_B (session, user_token, subject, course_code, class, question_number, text, quest_code)
     VALUES ('$current_session','$user_token', '$subject', '$course_code', '$class', '$quest_no_type_B','$question_text', '$quest_code')";
                        mysqli_query($conn, $query_b);

                        $query_c = "INSERT INTO $exam_tbl_C (session, user_token, subject, course_code, class, question_number, text, quest_code)
     VALUES ('$current_session','$user_token', '$subject', '$course_code', '$class', '$quest_no_type_C','$question_text', '$quest_code')";
                        mysqli_query($conn, $query_c);
                if($query_c){
                    $_SESSION['message'] = "Questions has been Uploaded!";
                    $_SESSION['msg_type'] = "success";
                    $_SESSION['btn'] = "Ok";
                    header("location: question-uploader");
                    }else{
                        $_SESSION['message'] = "Questions could not be Uploaded!";
                        $_SESSION['msg_type'] = "error";
                        $_SESSION['btn'] = "Ok";
                        header("location: question-uploader");
                    }
                        
                    } else {
                        $_SESSION['message'] = "Questions already exist!";
                        $_SESSION['msg_type'] = "warning";
                        $_SESSION['btn'] = "Ok";
                        header("location: question-uploader");
                    }
                }
            }
        }
    }




    if ($category == $answers) {
        $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
        // Validate whether selected file is a CSV file
        if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) {

            // If the file is uploaded
            if (is_uploaded_file($_FILES['file']['tmp_name'])) {

                // Open uploaded CSV file with read-only mode
                $csvFile = fopen($_FILES['file']['tmp_name'], 'r');

                // Skip the first line
                fgetcsv($csvFile);

                // Parse data from CSV file line by line
                while (($line = fgetcsv($csvFile)) !== FALSE) {
                    // Get row data
                    $question_number   =  mysqli_real_escape_string($conn, $line[0]);
                    $is_correct  =  mysqli_real_escape_string($conn, $line[1]);
                    $alpha_opt  =  mysqli_real_escape_string($conn, $line[2]);
                    $answer_text  =  mysqli_real_escape_string($conn, $line[3]);
                    $quest_code = "ID$question_number";

                    // NEEDED TO SHUFFLE QUESTION NUMBERS
                    include "q_type.php";

                    //To ensure that Thesame class is not uploaded over and again
                    $answerQuery = $conn->query("SELECT * FROM $answer_tbl_A WHERE course_code='$course_code' AND session='$current_session' AND text='$answer_text' AND question_number='$question_number'");

                    // echo $answerQuery->num_rows;
                    // exit();
                    if ($answerQuery->num_rows == 0) {
                        //insert data from CSV file 
                        $query_a = "INSERT INTO $answer_tbl_A (session, user_token, subject, course_code,  class, question_number, is_correct, alpha_opt, text, quest_code)
            VALUES ('$current_session','$user_token', '$subject', '$course_code', '$class', '$question_number', '$is_correct', '$alpha_opt', '$answer_text', '$quest_code')";
                        mysqli_query($conn, $query_a);

                        $query_b = "INSERT INTO $answer_tbl_B (session, user_token, subject, course_code,  class, question_number, is_correct, alpha_opt, text, quest_code)
            VALUES ('$current_session','$user_token', '$subject', '$course_code', '$class', '$quest_no_type_B', '$is_correct', '$alpha_opt', '$answer_text', '$quest_code')";
                        mysqli_query($conn, $query_b);

                        $query_c = "INSERT INTO $answer_tbl_C (session, user_token, subject, course_code,  class, question_number, is_correct, alpha_opt, text, quest_code)
            VALUES ('$current_session','$user_token', '$subject', '$course_code', '$class', '$quest_no_type_C', '$is_correct', '$alpha_opt', '$answer_text', '$quest_code')";
                        mysqli_query($conn, $query_c);

                        $_SESSION['message'] = "Answer has been Uploaded!";
                        $_SESSION['msg_type'] = "success";
                        $_SESSION['btn'] = "Ok";
                        header("location: question-uploader");
                    } else {
                        $_SESSION['message'] = "Answers already exist!";
                        $_SESSION['msg_type'] = "warning";
                        $_SESSION['btn'] = "Ok";
                        header("location: question-uploader");
                    }
                }
            }
        }
    }
    // Close opened CSV file
    fclose($csvFile);
}


if (isset($_POST["submit_instruction"])) {
    //$term = mysqli_real_escape_string($conn,$_POST['term']);
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    // Validate whether selected file is a CSV file
    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) {

        // If the file is uploaded
        if (is_uploaded_file($_FILES['file']['tmp_name'])) {

            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');

            // Skip the first line
            fgetcsv($csvFile);

            // Parse data from CSV file line by line
            while (($line = fgetcsv($csvFile)) !== FALSE) {
                // Get row data

                $instruction1 = mysqli_real_escape_string($conn, $line[0]);
                $instruction2 = mysqli_real_escape_string($conn, $line[1]);
                $instruction3 = mysqli_real_escape_string($conn, $line[2]);
                $instruction4 = mysqli_real_escape_string($conn, $line[3]);
                $instruction5 = mysqli_real_escape_string($conn, $line[4]);
            }

            //insert data from CSV file 
            $conn->query("UPDATE instruction_tbl SET instruction1='$instruction1', instruction2='$instruction2',
       instruction3='$instruction3', instruction4='$instruction4', instruction5='$instruction5' WHERE id=1") or die($conn->error);
            $_SESSION['message'] = "File has been Uploaded!";
            $_SESSION['msg_type'] = "success";
            $_SESSION['btn'] = "Ok";
            header("location: question-uploader");
        }
    }
    // Close opened CSV file
    fclose($csvFile);
}









if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $course_code = $_GET['course_code'];
    $querya = $conn->query("DELETE FROM subject_tbl WHERE id=$id") or die($conn->error);
    $queryb = $conn->query("DELETE FROM $exam_tbl_A WHERE course_code='$course_code' AND user_token='$user_token'");
    $queryc = $conn->query("DELETE FROM $exam_tbl_B WHERE course_code='$course_code' AND user_token='$user_token'");
    $queryd = $conn->query("DELETE FROM $exam_tbl_C WHERE course_code='$course_code' AND user_token='$user_token'");
    $querye = $conn->query("DELETE FROM $answer_tbl_A WHERE course_code='$course_code' AND user_token='$user_token'");
    $queryf = $conn->query("DELETE FROM $answer_tbl_B WHERE course_code='$course_code' AND user_token='$user_token'");
    $queryg = $conn->query("DELETE FROM $answer_tbl_C WHERE course_code='$course_code' AND user_token='$user_token'");

    $_SESSION['message'] = "Subject has been deleted!";
    $_SESSION['msg_type'] = "success";
    $_SESSION['remedy'] = "";
    $_SESSION['btn'] = "Ok";
    header("location: question-uploader");
}