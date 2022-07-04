<?php
require "../config/db.php";
if ($_SESSION['page'] == "p_profile.php") {
    $page = "exam-controller";
} else {
    $page = "exam-controller";
}

if (isset($_POST["submit"])) {
    $session = mysqli_real_escape_string($conn, $_POST['session']);
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
                $subject  =  mysqli_real_escape_string($conn, $line[0]);
                $course_code  =  mysqli_real_escape_string($conn, $line[1]);
                $day_code  =  mysqli_real_escape_string($conn, $line[2]);
                $exam_order  =  mysqli_real_escape_string($conn, $line[3]);

                $day = 'DAY-' . substr($day_code, 1, 2);

                switch ($exam_order) {
                    case "1":
                        $period = "First";
                        break;
                    case "2":
                        $period = "Second";
                        break;
                    case "3":
                        $period = "Third";
                        break;
                    case "4":
                        $period = "Fourth";
                        break;
                    case "5":
                        $period = "Fifth";
                        break;
                }

                $cl = substr($course_code, 3, 1);
                //FOR SECONDARY SCHOOL
                if ($cl == 1) {
                    $class = "JSS-1";
                }
                if ($cl == 2) {
                    $class = "JSS-2";
                }
                if ($cl == 3) {
                    $class = "JSS-3";
                }
                if ($cl == 4) {
                    $class = "SSS-1";
                }
                if ($cl == 5) {
                    $class = "SSS-2";
                }
                if ($cl == 6) {
                    $class = "SSS-3";
                }

                if ($subject != '') {
                    //To ensure that Thesame class is not uploaded over and again
                    $classQuery = $conn->query("SELECT * FROM $time_table WHERE course_code='$course_code' AND class='$class' AND day='$day' AND exam_order='$period'");

                    if ($classQuery->num_rows > 0) {
                        $_SESSION['message'] = "Sorry please Check the list, a couple of lines have thesame content!";
                        $_SESSION['msg_type'] = "error";
                        $_SESSION['remedy'] = "";
                        $_SESSION['btn'] = "Ok";
                        header("location: $page");
                    } else if ($Count == 0) {
                        $gen_code = 1;
                        $query = "INSERT INTO $time_table (subject, session, class, course_code, day, exam_order, gen_code)
                        VALUES ('$subject', '$session', '$class', '$course_code', '$day', '$period', '$gen_code')";
                        mysqli_query($conn, $query);

                        $_SESSION['message'] = "Time table has been Uploaded!";
                        $_SESSION['msg_type'] = "success";
                        $_SESSION['remedy'] = "";
                        $_SESSION['btn'] = "Ok";
                        header("location: $page");
                    }
                }
            }
        }
    }
    // Close opened CSV file
    fclose($csvFile);
}


if (isset($_POST['publish'])) {
    $exam_day = mysqli_real_escape_string($conn, $_POST['day']);
    $exam_order = mysqli_real_escape_string($conn, $_POST['exam_order']);

    $conn->query("UPDATE $exam_crtl_tbl SET day='$exam_day', exam_order='$exam_order', term='$current_term'");
    $_SESSION['message'] = "$exam_day and $exam_order period has been Published!";
    $_SESSION['msg_type'] = "success";
    $_SESSION['remedy'] = "";
    $_SESSION['btn'] = "Okay";
    header("location: $page");
}

if (isset($_GET['delete'])) {
    $gen_code = $_GET['delete'];

    $del = $conn->query("DELETE FROM $time_table WHERE session='$current_session'");

    if ($del) {
        $_SESSION['message'] = "$current_term [$current_session] Time table has been deleted!";
        $_SESSION['msg_type'] = "success";
        $_SESSION['remedy'] = "";
        $_SESSION['btn'] = "Okay";

        header("location: $page");
    }
}
