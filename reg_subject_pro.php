<?php
require "config/db.php";
error_reporting(0);
$class = ""; $subject = "";$username = "";$adm_no = "";
$errors = array(); $A_id = 0;//set hidden message defalt to 0
$update = false; 
$term = $_SESSION['term'];
$session = $_SESSION['session'];


if(isset($_POST['register'])){
    $class = mysqli_real_escape_string($conn,$_POST['class']);
    $subject = mysqli_real_escape_string($conn,$_POST['subject']);
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $fullname = mysqli_real_escape_string($conn,$_POST['fullname']);
    $adm_no = mysqli_real_escape_string($conn,$_POST['adm_no']);
    $code = mysqli_real_escape_string($conn,$_POST['code']);
    $status = "UNDONE";

    if($session != $current_session){
        $_SESSION['message'] = "Registeration is closed for $session!";
        $_SESSION['msg_type'] = "error";
          header("location: dashboard");
    }else{
    if($term != $current_term){
        $_SESSION['message'] = "You can't register $term subjects now!";
        $_SESSION['msg_type'] = "error";
          header("location: dashboard");
    }else{
    //SELECTING PAPER TYPE
$type_A = "Type A"; 
$type_B = "Type B"; 
$type_C = "Type C"; 

if($code == 1){
    $paper_type = $type_A;
}
if($code == 2){
    $paper_type = $type_B;
}
if($code == 3){
    $paper_type = $type_C;
}


    $query = $conn->query("SELECT * FROM subject_tbl WHERE class= '$class' AND subject = '$subject'");
    while($row = $query->fetch_assoc()){
        $teacher = $row['teacher'];
        $teacher_token = $row['user_token'];
        $course_code = $row['course_code'];
        $duration = $row['duration'];
    }
//To ensure that Thesame subject is not registered over and again
$subjectQuery = "SELECT * FROM $answer_sheet WHERE subject=? AND class=? AND adm_no=? AND session=? LIMIT 1";
$stmt = $conn->prepare($subjectQuery);
$stmt->bind_param('ssss', $subject, $class, $adm_no, $session);
$stmt->execute();
$result = $stmt->get_result();
$Count = $result->num_rows;
$stmt->close();
if($Count > 0){
    $_SESSION['message'] = "You have registered $subject!";
    $_SESSION['msg_type'] = "warning";
    $_SESSION['remedy'] = "";
    $_SESSION['btn'] = "Ok";
    header("location: dashboard");
}

    //To ensure that Thesame subject is not registered over and again
    $evaQuery = $conn->query("SELECT * FROM evaluation WHERE username='$username' AND class='$class' AND adm_no='$adm_no' AND term='$term' AND session='$session'");
    $evaluate = $evaQuery->num_rows;
    
    // $check = substr('2021/2022', 5 , 4);
    if($Count == 0){
        if($evaluate == 0){
            $query_1 = $conn->query("INSERT INTO  evaluation (fullname,username, class, adm_no, term, session) 
            VALUES('$fullname', '$username', '$class', '$adm_no', '$term', '$session')") or die($conn->error);
        }

    $insert = $conn->query("INSERT INTO  $answer_sheet (fullname, class, subject, course_code, paper_type, duration, username, adm_no, session, teacher, teacher_token, status) 
    VALUES('$fullname', '$class', '$subject', '$course_code', '$paper_type', '$duration', '$username', '$adm_no', '$session', '$teacher', '$teacher_token', '$status')") 
    or die($conn->error);

    if($insert){
        //COUNT THE NUMBER OF SUBJECT REGISTERED BY THE STUDENT
        $findOverall = $conn->query("SELECT * FROM $answer_sheet WHERE adm_no='$adm_no' AND session='$session'") or die($conn->error());
        $subNo = $findOverall->num_rows;

        // OVERALL SCORE IS EQUAL TO NUMBER OF SUBJECT REGISTERED MULTIPLIED BY 100
        $overall = ($subNo*100);
        //UPDATE EVALUATION TABLE
        $updateEva = $conn->query("UPDATE evaluation SET out_of='$overall' WHERE adm_no='$adm_no'") or die($conn->error());
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


if (isset($_GET['edit'])){
    $A_id = $_GET['edit'];
    $update = true;
    $result = $conn->query("SELECT * FROM $answer_sheet WHERE A_id=$A_id") or die($conn->error());
        if (count($result)==1){
        $row = $result->fetch_array();
        $class = $row['class'];
        $subject = $row['subject'];
        $username = $row['username'];
        $adm_no = $row['adm_no'];
    }
}



if(isset($_GET['delete']))
{
    $A_id = $_GET['delete'];
    $findAdm_no = $conn->query("SELECT * FROM $answer_sheet WHERE A_id='$A_id'") or die($conn->error());
    while($row = $findAdm_no->fetch_assoc()){
        $adm_no = $row['adm_no'];
        $session = $row['session'];
    }
    if($findAdm_no){
        $del = $conn->query("DELETE FROM $answer_sheet WHERE A_id=$A_id") or die($conn->error());
    }
   
    if($del){
       //COUNT THE NUMBER OF SUBJECT REGISTERED BY THE STUDENT
       $findOverall = $conn->query("SELECT * FROM $answer_sheet WHERE adm_no='$adm_no' AND session='$session'") or die($conn->error());
       $subNo = $findOverall->num_rows;

       // OVERALL SCORE IS EQUAL TO NUMBER OF SUBJECT REGISTERED MULTIPLIED BY 100
       $overall = ($subNo*100);
       //UPDATE EVALUATION TABLE
       $updateEva = $conn->query("UPDATE evaluation SET out_of='$overall' WHERE adm_no='$adm_no'") or die($conn->error());
   }
    $_SESSION['message'] = "Your details on subject table has been deleted!";
    $_SESSION['msg_type'] = "success";
    $_SESSION['remedy'] = "";
    $_SESSION['btn'] = "Ok";
    header("location: dashboard");
}


if (isset($_POST['update']))
{
    $A_id = mysqli_real_escape_string($conn,$_POST['A_id']);
    $class = mysqli_real_escape_string($conn,$_POST['class']);
    $subject = mysqli_real_escape_string($conn,$_POST['subject']);
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $adm_no = mysqli_real_escape_string($conn,$_POST['adm_no']);
    
    
    $conn->query("UPDATE $answer_sheet SET class = '$class', subject = '$subject',
    username = '$username', adm_no = '$adm_no' WHERE A_id=$A_id") or die($conn->error);
    $_SESSION['message'] = "$subject has been updated!";
    $_SESSION['msg_type'] = "warning";//Message update background

    header("location: dashboard");
}
