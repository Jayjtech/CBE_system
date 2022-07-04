<?php
require "../config/db.php";
$teacher = $_SESSION['name'];
$user_token = $_SESSION['token'];
if (isset($_POST["submit"])) {
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

                $name = mysqli_real_escape_string($conn, $line[0]);
                $adm_no = mysqli_real_escape_string($conn, $line[1]);
                $course_code = mysqli_real_escape_string($conn, $line[2]);
                $subject = mysqli_real_escape_string($conn, $line[3]);
                $session = mysqli_real_escape_string($conn, $line[4]);
                $CA1 = mysqli_real_escape_string($conn, $line[5]);
                $CA2 = mysqli_real_escape_string($conn, $line[6]);
                $CA3 = mysqli_real_escape_string($conn, $line[7]);
                $objective = mysqli_real_escape_string($conn, $line[8]);
                $essay_score = mysqli_real_escape_string($conn, $line[9]);

                $query = $conn->query("SELECT * FROM $answer_sheet WHERE adm_no= '$adm_no' AND course_code = '$course_code'");
                while ($row = $query->fetch_assoc()) {
                    $obj = $row['obj_score'];
                }
                //IF OBJECTIVE SCORE IS NOT EMPTY     
                if ($obj != 0) {
                    $obj_score = $obj;
                    //IF OBJECTIVE SCORE IS EMPTY THEN THE UPLOADED SCORE IS THE OBJECTIVE SCORE
                } else {
                    $obj_score = $objective;
                }
                $test = ($CA1 + $CA2 + $CA3);
                $exam_output = ($obj_score + $essay_score);
                $total = ($exam_output + $test);

                if ($total <= 39) {
                    $grade = "F9";
                    $remark = "Poor";
                    $color = "darkGreen";
                }

                if ($total == 40 || $total == 41 || $total == 42 || $total == 43 || $total == 43 || $total == 44) {
                    $grade = "D";
                    $remark = "Fair";
                    $color = "Red";
                }
                if ($total == 45 || $total == 46 || $total == 47 || $total == 48 || $total == 49) {
                    $grade = "C6";
                    $remark = "Fair";
                    $color = "Orange";
                }
                if ($total == 50 || $total == 51 || $total == 52 || $total == 53 || $total == 54 || $total == 55) {
                    $grade = "C4";
                    $remark = "Average";
                    $color = "Yellow";
                }
                if ($total == 56 || $total == 57 || $total == 58 || $total == 59 || $total == 60) {
                    $grade = "B3";
                    $remark = "Good";
                    $color = "Yellow";
                }
                if ($total == 61 || $total == 62 || $total == 63 || $total == 64) {
                    $grade = "B2";
                    $remark = "Good";
                    $color = "LightSeaGreen";
                }
                if ($total == 65 || $total == 66 || $total == 67 || $total == 68 || $total == 69) {
                    $grade = "B";
                    $remark = "Good";
                    $color = "LightSeaGreen";
                }
                if ($total == 70 || $total == 71 || $total == 72 || $total == 73 || $total == 74) {
                    $grade = "A";
                    $remark = "Good";
                    $color = "Lime";
                }
                if ($total == 75 || $total == 76 || $total == 77 || $total == 78 || $total == 79) {
                    $grade = "A";
                    $remark = "V.Good";
                    $color = "green";
                    $color = "LimeGreen";
                }
                if ($total >= 80) {
                    $grade = "A";
                    $remark = "Excellent";
                    $color = "darkGreen";
                }

                //insert data from CSV file 
                $query = $conn->query("UPDATE $answer_sheet SET CA1='$CA1', CA2='$CA2', CA3='$CA3', test='$test', obj_score ='$obj_score', essay_score='$essay_score',
    grade='$grade', total='$total', exam_total = '$exam_output', remark='$remark', color='$color'
   WHERE adm_no='$adm_no' AND teacher_token = '$user_token' AND course_code = '$course_code' AND session='$session'")
                    or die($conn->error);
                if ($query) {
                    $_SESSION['message'] = "Result has been Uploaded!";
                    $_SESSION['msg_type'] = "success";
                    $_SESSION['btn'] = "Ok";
                    header("location: prepare-result");
                } else {
                    $_SESSION['message'] = "Result could not be Uploaded!";
                    $_SESSION['msg_type'] = "error";
                    $_SESSION['btn'] = "Ok";
                    header("location: prepare-result");
                }
            }
        }
    }
    // Close opened CSV file
    fclose($csvFile);
}



if (isset($_POST['comment'])) {
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
                //DATA FROM EXCEL TABLE...
                $name = mysqli_real_escape_string($conn, $line[0]);
                $adm_no = mysqli_real_escape_string($conn, $line[1]);
                $class = mysqli_real_escape_string($conn, $line[2]);
                $term = mysqli_real_escape_string($conn, $line[3]);
                $session = mysqli_real_escape_string($conn, $line[4]);
                $n_absent = mysqli_real_escape_string($conn, $line[5]);
                $n_present = mysqli_real_escape_string($conn, $line[6]);
                $punctuality = mysqli_real_escape_string($conn, $line[7]);
                $attentiveness = mysqli_real_escape_string($conn, $line[8]);
                $neatness = mysqli_real_escape_string($conn, $line[9]);
                $honesty = mysqli_real_escape_string($conn, $line[10]);
                $relationship = mysqli_real_escape_string($conn, $line[11]);
                $skills = mysqli_real_escape_string($conn, $line[12]);
                $sport = mysqli_real_escape_string($conn, $line[13]);
                $clubs = mysqli_real_escape_string($conn, $line[14]);
                $fluency = mysqli_real_escape_string($conn, $line[15]);
                $handwriting = mysqli_real_escape_string($conn, $line[16]);
                $pos = mysqli_real_escape_string($conn, $line[17]);
                $t_comment = mysqli_real_escape_string($conn, $line[18]);
                $prom = mysqli_real_escape_string($conn, $line[19]);

                switch ($term) {
                    case "First Term":
                        $answer_sheet = "ft_answer_sheet";
                        break;
                    case "Second Term":
                        $answer_sheet = "st_answer_sheet";
                        break;
                    case "Third Term":
                        $answer_sheet = "tt_answer_sheet";
                        break;
                }

                //POSITION
                if ($pos == 1) {
                    $position = "1st";
                }
                if ($pos == 2) {
                    $position = "2nd";
                }
                if ($pos == 3) {
                    $position = "3rd";
                }
                if ($pos == 4) {
                    $position = "4th";
                }
                if ($pos == 5) {
                    $position = "5th";
                }
                if ($pos == 6) {
                    $position = "6th";
                }
                if ($pos == 7) {
                    $position = "7th";
                }
                if ($pos == 8) {
                    $position = "8th";
                }
                if ($pos == 9) {
                    $position = "9th";
                }
                if ($pos == 10) {
                    $position = "10th";
                }
                if ($pos == 11) {
                    $position = "11th";
                }
                if ($pos == 12) {
                    $position = "12th";
                }
                if ($pos == 13) {
                    $position = "13th";
                }
                if ($pos == 14) {
                    $position = "14th";
                }
                if ($pos == 15) {
                    $position = "15th";
                }
                if ($pos == 16) {
                    $position = "16th";
                }
                if ($pos == 17) {
                    $position = "17th";
                }
                if ($pos == 18) {
                    $position = "18th";
                }
                if ($pos == 19) {
                    $position = "19th";
                }
                if ($pos == 20) {
                    $position = "20th";
                }
                if ($pos == 21) {
                    $position = "21st";
                }
                if ($pos == 22) {
                    $position = "22nd";
                }
                if ($pos == 23) {
                    $position = "23rd";
                }
                if ($pos == 24) {
                    $position = "24th";
                }
                if ($pos == 25) {
                    $position = "25th";
                }
                if ($pos == 26) {
                    $position = "26th";
                }
                if ($pos == 27) {
                    $position = "27th";
                }
                if ($pos == 28) {
                    $position = "28th";
                }
                if ($pos == 29) {
                    $position = "29th";
                }
                if ($pos == 30) {
                    $position = "30th";
                }
                if ($pos == 31) {
                    $position = "31st";
                }
                if ($pos == 32) {
                    $position = "32nd";
                }
                if ($pos == 33) {
                    $position = "33rd";
                }
                if ($pos == 34) {
                    $position = "34th";
                }
                if ($pos == 35) {
                    $position = "35th";
                }
                if ($pos == 36) {
                    $position = "36th";
                }
                if ($pos == 37) {
                    $position = "37th";
                }
                if ($pos == 38) {
                    $position = "38th";
                }
                if ($pos == 39) {
                    $position = "39th";
                }
                if ($pos == 40) {
                    $position = "40th";
                }
                if ($pos == 41) {
                    $position = "41st";
                }
                if ($pos == 42) {
                    $position = "42nd";
                }
                if ($pos == 43) {
                    $position = "43rd";
                }
                if ($pos == 44) {
                    $position = "44th";
                }
                if ($pos == 45) {
                    $position = "45th";
                }
                if ($pos == 46) {
                    $position = "46th";
                }
                if ($pos == 47) {
                    $position = "47th";
                }
                if ($pos == 48) {
                    $position = "48th";
                }
                if ($pos == 49) {
                    $position = "49th";
                }
                if ($pos == 50) {
                    $position = "50th";
                }
                if ($pos == 51) {
                    $position = "51st";
                }
                if ($pos == 52) {
                    $position = "52nd";
                }
                if ($pos == 53) {
                    $position = "53rd";
                }
                if ($pos == 54) {
                    $position = "54th";
                }
                if ($pos == 55) {
                    $position = "55th";
                }
                if ($pos == 56) {
                    $position = "56th";
                }
                if ($pos == 57) {
                    $position = "57th";
                }
                if ($pos == 58) {
                    $position = "58th";
                }
                if ($pos == 59) {
                    $position = "59th";
                }
                if ($pos == 60) {
                    $position = "60th";
                }



                if ($prom == 1 || $prom == "JSS-1") {
                    $promoted_to = "JSS-1";
                }
                if ($prom == 2 || $prom == "JSS-2") {
                    $promoted_to = "JSS-2";
                }
                if ($prom == 3 || $prom == "JSS-3") {
                    $promoted_to = "JSS-3";
                }
                if ($prom == 4 || $prom == "SSS-1") {
                    $promoted_to = "SSS-1";
                }
                if ($prom == 5 || $prom == "SSS-2") {
                    $promoted_to = "SSS-2";
                }
                if ($prom == 6 || $prom == "SSS-3") {
                    $promoted_to = "SSS-3";
                }

                //GETTING OVERALL SCORE FROM ALL COURSES 
                $check_total = $conn->query("SELECT SUM(total) AS sum FROM $answer_sheet WHERE adm_no= '$adm_no' AND session = '$session'");
                while ($row = $check_total->fetch_assoc()) {
                    $overall_score = $row['sum'];
                }

                //CALCULATION OF PERCENT SCORE
                $percent = $conn->query("SELECT out_of FROM evaluation WHERE adm_no= '$adm_no'
    AND session = '$session' AND term='$term'");
                while ($row = $percent->fetch_assoc()) {
                    $out_of = $row['out_of'];
                }

                $percent_score = (($overall_score / $out_of) * 100);


                //ELSE...
                //insert data from CSV file 
                $query = $conn->query("UPDATE evaluation SET overall_score ='$overall_score', percent_score='$percent_score',
    n_absent='$n_absent', n_present ='$n_present', position='$position', t_comment='$t_comment', 
    punctuality='$punctuality', attentiveness ='$attentiveness', neatness='$neatness', honesty='$honesty', 
    relationship='$relationship', skills ='$skills', sport='$sport', clubs='$clubs', fluency='$fluency', handwriting='$handwriting', 
    t_comment='$t_comment', position='$position', promoted_to='$promoted_to' WHERE adm_no='$adm_no'  AND  session='$session' AND term='$term'")
                    or die($conn->error);

                $update = $conn->query("UPDATE student SET class='$promoted_to' WHERE adm_no='$adm_no'") or die($conn->error);
                $_SESSION['message'] = "Data have been saved!";
                $_SESSION['msg_type'] = "success";
                $_SESSION['remedy'] = "";
                $_SESSION['btn'] = "Okay";
                header("location: prepare-result");
            }
        }
    }
    // Close opened CSV file
    fclose($csvFile);
}


if (isset($_POST['p-comment'])) {
    $term = mysqli_real_escape_string($conn, $_POST['term']);
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
                //DATA FROM EXCEL TABLE...
                $adm_no = mysqli_real_escape_string($conn, $line[0]);
                $p_comment = mysqli_real_escape_string($conn, $line[1]);

                //To CHECK IF THE SUBMITTED SESSION AND TERM EXIST
                $secondQuery = "SELECT * FROM evaluation WHERE session=? AND term=? ";
                $stmt = $conn->prepare($secondQuery);
                $stmt->bind_param('ss', $session, $current_term);
                $stmt->execute();
                $result = $stmt->get_result();
                $sch_period = $result->num_rows;
                $stmt->close();

                //IF THE PERIOD DOES NOT EXIST...
                if ($sch_period == 0) {
                    $_SESSION['message'] = "This School period does not exist!";
                    $_SESSION['msg_type'] = "danger"; //Message saved background
                    header("location: pre_result.php");
                } else {
                    //ELSE...
                    //insert data from CSV file 
                    $query = $conn->query("UPDATE evaluation SET p_comment ='$p_comment' WHERE adm_no='$adm_no' AND term='$term' AND session='$session'")
                        or die($conn->error);
                    $_SESSION['message'] = "Comments have been Uploaded!";
                    $_SESSION['msg_type'] = "success"; //Message saved background
                    header("location: pre_result.php");
                }
            }
        }
    }
    // Close opened CSV file
    fclose($csvFile);
}





//POSITION AND STATUS
if (isset($_POST['upload'])) {
    $term = mysqli_real_escape_string($conn, $_POST['term']);
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
                //DATA FROM EXCEL TABLE...
                $adm_no = mysqli_real_escape_string($conn, $line[0]);
                $position = mysqli_real_escape_string($conn, $line[1]);

                //To CHECK IF THE SUBMITTED SESSION AND TERM EXIST
                $secondQuery = "SELECT * FROM evaluation WHERE session=? AND term=? LIMIT 1";
                $stmt = $conn->prepare($secondQuery);
                $stmt->bind_param('ss', $session, $term);
                $stmt->execute();
                $result = $stmt->get_result();
                $sch_period = $result->num_rows;
                $stmt->close();

                //IF THE PERIOD DOES NOT EXIST...
                if ($sch_period <= 0) {
                    $_SESSION['message'] = "This School period does not exist!";
                    $_SESSION['msg_type'] = "danger"; //Message saved background
                    header("location: pre_result.php");
                } else {
                    //ELSE...
                    //insert data from CSV file 
                    $query = $conn->query("UPDATE evaluation SET position ='$position' WHERE adm_no='$adm_no' AND term='$term' AND session='$session'")
                        or die($conn->error);
                    $_SESSION['message'] = "Comments have been Uploaded!";
                    $_SESSION['msg_type'] = "success"; //Message saved background
                    header("location: upload_student_position.php");
                }
            }
        }
    }

    // Close opened CSV file
    fclose($csvFile);
}
