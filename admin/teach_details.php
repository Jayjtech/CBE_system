<?php
require "../config/db.php";
error_reporting(0);
$name = ""; $position = "";$para = "";$name_col = "";$name_font = "";
$position_col = ""; $position_font = "";$para_color = ""; $para_font = "";
 $image =""; $facebk =""; $instagram =""; $whatsapp =""; 
$errors = array(); $tch_id = 0;//set hidden message defalt to 0
$update = false; 


if(isset($_POST['save'])){
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $position = mysqli_real_escape_string($conn,$_POST['position']);
    $name_col = mysqli_real_escape_string($conn,$_POST['name_col']);
    $name_font = mysqli_real_escape_string($conn,$_POST['name_font']);
    $para = mysqli_real_escape_string($conn,$_POST['para']);
    $para_color = mysqli_real_escape_string($conn,$_POST['para_color']);
    $position_col = mysqli_real_escape_string($conn,$_POST['position_col']);
    $position_font = mysqli_real_escape_string($conn,$_POST['position_font']);
    $para_font = mysqli_real_escape_string($conn,$_POST['para_font']);
    $facebk = mysqli_real_escape_string($conn,$_POST['facebk']);
    $instagram = mysqli_real_escape_string($conn,$_POST['instagram']);
    $whatsapp = mysqli_real_escape_string($conn,$_POST['whatsapp']);
    
    $img_name = $_FILES['image']['name'];
    $img_size = $_FILES['image']['size'];
    $img_tmp = $_FILES['image']['tmp_name'];
    
    $directory = 'upload2/';
    $target_file = $directory.$img_name;

    move_uploaded_file($img_tmp,$target_file);

    $conn->query("INSERT INTO  sch_teachers (name, position, image, name_col, name_font, para, para_color, para_font, position_col, position_font, 
    facebk, instagram, whatsapp) 
    VALUES('$name', '$position', '$target_file','$name_col', '$name_font', '$para', '$para_color', '$para_font', '$position_col', '$position_font',
    '$facebk', '$instagram', '$whatsapp')") 
    or die($conn->error);

    $_SESSION['message'] = "Teacher's Info has been saved!";
    $_SESSION['msg_type'] = "success";//Message saved background

    header("location: teacher.php");
}





if (isset($_GET['edit'])){
    $tch_id = $_GET['edit'];
    $update = true;
    $result = $conn->query("SELECT * FROM sch_teachers WHERE tch_id=$tch_id") or die($conn->error());
        if (count($result)==1){
        $row = $result->fetch_array();
        $name = $row['name'];
        $position = $row['position'];
        $image = $row['image'];
        $name_col = $row['name_col'];
        $name_font = $row['name_font'];
        $para = $row['para'];
        $para_color = $row['para_color'];
        $position_col = $row['position_col'];
        $position_font = $row['position_font'];
    }
}


if(isset($_GET['delete']))
{
    $tch_id = $_GET['delete'];
    $conn->query("DELETE FROM sch_teachers WHERE tch_id=$tch_id") or die($conn->error());
    
    $_SESSION['message'] = "Teacher's Info has been deleted!";
    $_SESSION['msg_type'] = "danger";//Message delete background

    header("location: teacher.php");
}


if (isset($_POST['update']))
{
    $tch_id = mysqli_real_escape_string($conn,$_POST['tch_id']);
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $position = mysqli_real_escape_string($conn,$_POST['position']);
    $name_col = mysqli_real_escape_string($conn,$_POST['name_col']);
    $name_font = mysqli_real_escape_string($conn,$_POST['name_font']);
    $para = mysqli_real_escape_string($conn,$_POST['para']);
    $para_color = mysqli_real_escape_string($conn,$_POST['para_color']);
    $position_col = mysqli_real_escape_string($conn,$_POST['position_col']);
    $position_font = mysqli_real_escape_string($conn,$_POST['position_font']);
    $para_font = mysqli_real_escape_string($conn,$_POST['para_font']);
    $facebk = mysqli_real_escape_string($conn,$_POST['facebk']);
    $instagram = mysqli_real_escape_string($conn,$_POST['instagram']);
    $whatsapp = mysqli_real_escape_string($conn,$_POST['whatsapp']);
    
    $img_name = $_FILES['image']['name'];
    $img_size = $_FILES['image']['size'];
    $img_tmp = $_FILES['image']['tmp_name'];
    
    $directory = 'upload2/';
    $target_file = $directory.$img_name;

    move_uploaded_file($img_tmp,$target_file);

    $conn->query("UPDATE sch_teachers SET name='$name', position='$position', 
    name_col='$name_col', para='$para', name_font='$name_font', para_color='$para_color',
    position_font='$position_font', position_col='$position_col',
    facebk='$facebk', instagram='$instagram', whatsapp='$whatsapp', para_font='$para_font', 
    image='$target_file' WHERE tch_id=$tch_id") or die($conn->error);

    $_SESSION['message'] = "Teacher's Info has been updated!";
    $_SESSION['msg_type'] = "warning";//Message update background

    header("location: teacher.php");
}




if(isset($_POST['submit'])){
$name = mysqli_real_escape_string($conn,$_POST['name']); 
$surname = mysqli_real_escape_string($conn,$_POST['surname']); 
$email = mysqli_real_escape_string($conn,$_POST['email']);  
$position = mysqli_real_escape_string($conn,$_POST['position']);  
$key = md5($name.$email);
$token = md5($surname.$key);

//Ensure that all field are filled.
if(empty($name) OR empty($email) OR empty($surname))
{
    header('location: register_fee.php?error');
}else{
    $conn->query("INSERT INTO  teacher_reg_key (name, surname, email, token, position) VALUES('$name', '$surname', '$email', '$token','$position')") 
    or die($conn->error);

    $_SESSION['message'] = "Token has been Created!";
    $_SESSION['msg_type'] = "success";//Message saved background

    header("location: my_teachers.php");
    }
}
 ?>