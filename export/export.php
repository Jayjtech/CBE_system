<?php
require "../config/db.php";
$user_token = $_SESSION['token'];

if ($_GET['table'] == $answer_sheet) {
     $course_code = $_GET['course_code'];
     header('Content-Type: text/csv; charset=utf-8');
     header('Content-Disposition: attachment; filename=Score-sheet.csv');
     $output = fopen("php://output", "w");
     fputcsv($output, array('Student Name', 'Admission NO', 'Course Code', 'Subject', 'Session', 'CA1', 'CA2', 'CA3', 'Objective', 'Theory'));
     $query = "SELECT fullname, adm_no, course_code, subject, session, CA1, CA2, CA3, obj_score, essay_score 
     FROM $answer_sheet WHERE teacher_token='$user_token' AND course_code='$course_code' AND session='$current_session' ORDER BY class DESC";
     $result = mysqli_query($conn, $query);

     while ($row = mysqli_fetch_assoc($result)) {
          fputcsv($output, $row);
     }
     fclose($output);
}


if ($_GET['table'] == "evaluation") {
     header('Content-Type: text/csv; charset=utf-8');
     header('Content-Disposition: attachment; filename=data.csv');
     $output = fopen("php://output", "w");
     fputcsv($output, array(
          'Student Name', 'Admission NO', 'Class', 'Term', 'Session', 'No Absent', 'No Present',
          'Position', 'Comment from Teacher'
     ));

     $query = "SELECT fullname, adm_no, class, term, session, n_absent, n_present, position, t_comment FROM evaluation WHERE session='$current_session' AND term='$current_term'";
     $result = mysqli_query($conn, $query);
     while ($row = mysqli_fetch_assoc($result)) {
          fputcsv($output, $row);
     }
     fclose($output);
}

if ($_GET['table'] == "p_evaluation") {
     header('Content-Type: text/csv; charset=utf-8');
     header('Content-Disposition: attachment; filename=data.csv');
     $output = fopen("php://output", "w");
     fputcsv($output, array('Student Name', 'Admission NO', 'Class', 'Term', 'Session', 'Comment from Principal'));

     $query = "SELECT fullname, adm_no, class, term, session, p_comment FROM evaluation WHERE session='$current_session' AND term='$current_term'";
     $result = mysqli_query($conn, $query);
     while ($row = mysqli_fetch_assoc($result)) {
          fputcsv($output, $row);
     }
     fclose($output);
}

if ($_GET['table'] == $time_table) {
     header('Content-Type: text/csv; charset=utf-8');
     header('Content-Disposition: attachment; filename=Time-table.csv');
     $output = fopen("php://output", "w");
     fputcsv($output, array('SUBJECT', 'COURSE CODE', 'EXAM DAY', 'EXAM PERIOD'));
     $query = "SELECT subject, course_code, day, exam_order FROM $time_table WHERE session='$current_session'";
     $result = mysqli_query($conn, $query);
     while ($row = mysqli_fetch_assoc($result)) {
          fputcsv($output, $row);
     }
     fclose($output);
}


if ($_GET['table'] == $answer_table) {
     $teacher = $_SESSION['name'];
     header('Content-Type: text/csv; charset=utf-8');
     header('Content-Disposition: attachment; filename=Answer-formart.csv');
     $output = fopen("php://output", "w");
     fputcsv($output, array('Quesion Number', 'Right(1)/Wrong(0)', 'Options', 'Answer Text'));
     $query = "SELECT question_number, is_correct, alpha_opt, text FROM $answer_table WHERE session='$current_session' AND teacher='$teacher'";
     $result = mysqli_query($conn, $query);
     while ($row = mysqli_fetch_assoc($result)) {
          fputcsv($output, $row);
     }
     fclose($output);
}

if ($_GET['table'] == $exam_table) {
     $teacher = $_SESSION['name'];
     header('Content-Type: text/csv; charset=utf-8');
     header('Content-Disposition: attachment; filename=Question-format.csv');
     $output = fopen("php://output", "w");
     fputcsv($output, array('Question Number', 'Question Text'));
     $query = "SELECT question_number, text FROM $exam_table WHERE session='$current_session' AND teacher='$teacher'";
     $result = mysqli_query($conn, $query);
     while ($row = mysqli_fetch_assoc($result)) {
          fputcsv($output, $row);
     }
     fclose($output);
}

if ($_GET['table'] == 'instruction_tbl') {
     $teacher = $_SESSION['name'];
     header('Content-Type: text/csv; charset=utf-8');
     header('Content-Disposition: attachment; filename=Instruction.csv');
     $output = fopen("php://output", "w");
     fputcsv($output, array('Instruction 1', 'Instruction 2', 'Instruction 3', 'Instruction 4', 'Instruction 5'));
     $query = "SELECT instruction1, instruction2, instruction3, instruction4, instruction5 FROM instruction_tbl";
     $result = mysqli_query($conn, $query);
     while ($row = mysqli_fetch_assoc($result)) {
          fputcsv($output, $row);
     }
     fclose($output);
}
