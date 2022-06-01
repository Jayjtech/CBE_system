<?php
require "../config/db.php";
error_reporting(0);
$sch_name = ""; $sch_name2 =""; $test_api = ""; $live_key =""; $sch_phone =""; $sch_phone2 =""; $sch_email =""; $sch_address ="";
$sch_name_font =""; $sch_name_col = ""; $sch_name_font_2 =""; $sch_name_col_2 = "";
$errors = array(); $id = 0;//set hidden message defalt to 0
$update = false; 


if(isset($_POST['save'])){
    $sch_name = mysqli_real_escape_string($conn,$_POST['sch_name']);
    $sch_name_font = mysqli_real_escape_string($conn,$_POST['sch_name_font']);
    $sch_name_col = mysqli_real_escape_string($conn,$_POST['sch_name_col']);
    $sch_name2 = mysqli_real_escape_string($conn,$_POST['sch_name2']);
    $sch_name_font_2 = mysqli_real_escape_string($conn,$_POST['sch_name_font_2']);
    $sch_name_col_2 = mysqli_real_escape_string($conn,$_POST['sch_name_col_2']);
    $sch_phone = mysqli_real_escape_string($conn,$_POST['sch_phone']);
    $sch_phone2 = mysqli_real_escape_string($conn,$_POST['sch_phone2']);
    $sch_email = mysqli_real_escape_string($conn,$_POST['sch_email']);
    $sch_facebook = mysqli_real_escape_string($conn,$_POST['sch_facebook']);
    $sch_whatsapp = mysqli_real_escape_string($conn,$_POST['sch_whatsapp']);
    $sch_instagram = mysqli_real_escape_string($conn,$_POST['sch_instagram']);
    $sch_twitter = mysqli_real_escape_string($conn,$_POST['sch_twitter']);
    $sch_address = mysqli_real_escape_string($conn,$_POST['sch_address']);
    
    
    $conn->query("INSERT INTO  school_details (sch_name, sch_name2, code, term, sch_phone, sch_phone2, sch_email,
    sch_name_col, sch_name_col_2, sch_name_font, sch_name_font_2, sch_facebook, sch_whatsapp, sch_instagram, sch_twitter) 
    VALUES('$sch_name', '$sch_name2', '$code', '$term', '$sch_phone', '$sch_phone2', '$sch_email',
    '$sch_name_col', '$sch_name_col_2', '$sch_name_font', '$sch_name_font_2', '$sch_facebook', '$sch_whatsapp', '$sch_instagram', '$sch_twitter')") 
    or die($conn->error);

    $_SESSION['message'] = "School details has been saved!";
    $_SESSION['msg_type'] = "success";//Message saved background

    header("location: edit_sch_details.php");
}



if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $conn->query("SELECT * FROM school_details WHERE id=$id") or die($conn->error());
        if (count($result)==1){
        $row = $result->fetch_array();
        $sch_name = $row['sch_name'];
        $sch_name2 = $row['sch_name2'];
        $sch_phone = $row['sch_phone'];
        $sch_phone2 = $row['sch_phone2'];
        $sch_email = $row['sch_email'];
        $sch_address = $row['sch_address'];
        $live_api = $row['live_api'];
        $test_api = $row['test_api'];
    }
}

if(isset($_GET['delete']))
{
    $id = $_GET['delete'];
    $conn->query("DELETE FROM school_details WHERE id=$id") or die($conn->error());
    
    $_SESSION['message'] = "School details has been deleted!";
    $_SESSION['msg_type'] = "danger";//Message delete background

    header("location: edit_sch_details.php");
}

if (isset($_POST['update']))
{
    $id = mysqli_real_escape_string($conn,$_POST['id']);
    $sch_name = mysqli_real_escape_string($conn,$_POST['sch_name']);
    $sch_name_font = mysqli_real_escape_string($conn,$_POST['sch_name_font']);
    $sch_name_col = mysqli_real_escape_string($conn,$_POST['sch_name_col']);
    $sch_name2 = mysqli_real_escape_string($conn,$_POST['sch_name2']);
    $sch_name_font_2 = mysqli_real_escape_string($conn,$_POST['sch_name_font_2']);
    $sch_name_col_2 = mysqli_real_escape_string($conn,$_POST['sch_name_col_2']);
    $sch_phone = mysqli_real_escape_string($conn,$_POST['sch_phone']);
    $sch_phone2 = mysqli_real_escape_string($conn,$_POST['sch_phone2']);
    $sch_email = mysqli_real_escape_string($conn,$_POST['sch_email']);
    $sch_facebook = mysqli_real_escape_string($conn,$_POST['sch_facebook']);
    $sch_whatsapp = mysqli_real_escape_string($conn,$_POST['sch_whatsapp']);
    $sch_instagram = mysqli_real_escape_string($conn,$_POST['sch_instagram']);
    $sch_twitter = mysqli_real_escape_string($conn,$_POST['sch_twitter']);
    $sch_address = mysqli_real_escape_string($conn,$_POST['sch_address']);
    
  
    
    $conn->query("UPDATE school_details SET sch_name='$sch_name',sch_name2='$sch_name2', sch_name_font='$sch_name_font',
    sch_facebook='$sch_facebook', sch_twitter='$sch_twitter', sch_whatsapp='$sch_whatsapp', sch_instagram='$sch_instagram',
    sch_name_font_2='$sch_name_font_2',  sch_phone='$sch_phone', sch_phone2='$sch_phone2', sch_email='$sch_email',
    sch_name_col='$sch_name_col', sch_name_col_2='$sch_name_col_2', sch_address='$sch_address' WHERE id=$id") or die($conn->error);

    $_SESSION['message'] = "School details has been updated!";
    $_SESSION['msg_type'] = "warning";//Message update background

    header("location: edit_sch_details.php");
}


if(isset($_POST['submit']))
		{
            $logo_width = $_POST['logo_width'];
            $logo_height = $_POST['logo_height'];
            $img_name = $_FILES['sch_logo']['name'];
            $img_size = $_FILES['sch_logo']['size'];
            $img_tmp = $_FILES['sch_logo']['tmp_name'];
            
            $directory = 'upload2/';
            $target_file = $directory.$img_name;
        
            move_uploaded_file($img_tmp,$target_file);
			$conn->query("INSERT INTO school_logo (logo_width,logo_height,image) 
            VALUES('$logo_width', '$logo_height','$target_file')");
			
            $_SESSION['message'] = "Logo has been Published!";
            $_SESSION['msg_type'] = "success";//Message Published background
        
            header("location: edit_sch_details.php");
        }

if(isset($_GET['deleteImg']))
{
    $logo_id = $_GET['deleteImg'];
    $conn->query("DELETE FROM school_logo WHERE logo_id=$logo_id") or die($conn->error());
    
    $_SESSION['message'] = "Logo has been deleted!";
    $_SESSION['msg_type'] = "danger";//Message delete background

    header("location: edit_sch_details.php");
}