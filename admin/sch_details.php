<?php
require "../config/db.php";
if (isset($_POST['update']))
{
    $sch_name = mysqli_real_escape_string($conn,$_POST['sch_name']);
    $sch_name2 = mysqli_real_escape_string($conn,$_POST['sch_name2']);
    $sch_phone = mysqli_real_escape_string($conn,$_POST['sch_phone']);
    $sch_phone2 = mysqli_real_escape_string($conn,$_POST['sch_phone2']);
    $sch_email = mysqli_real_escape_string($conn,$_POST['sch_email']);
    $sch_facebook = mysqli_real_escape_string($conn,$_POST['sch_facebook']);
    $sch_instagram = mysqli_real_escape_string($conn,$_POST['sch_instagram']);
    $sch_twitter = mysqli_real_escape_string($conn,$_POST['sch_twitter']);
    $sch_address = mysqli_real_escape_string($conn,$_POST['sch_address']);
    $header_col = mysqli_real_escape_string($conn,$_POST['header_col']);
    $header_txt_col = mysqli_real_escape_string($conn,$_POST['header_txt_col']);
    $sch_logo = $_POST['sch_logo'];
 
    // IMAGE FILE
    $img_name = $_FILES['sch_logo']['name'];
    $img_size = $_FILES['sch_logo']['size'];
    $img_tmp = $_FILES['sch_logo']['tmp_name'];

    if(empty($_FILES['sch_logo']['name'])){
        $target_dir = '';
        }else{
            $allowed_ext = array('png','jpg', 'jpeg', 'gif');
            //Get file extension 
            $file_ext = explode('.', $img_name);
            $file_ext = strtolower(end($file_ext));
            //CHECK IMAGE EXT
            if(in_array($file_ext, $allowed_ext)){
                // IMAGE DIRECTORY
                $target_dir = $img_name;
            }
        }
    
    if($img_size <= 1000000){
    // IF NO IMG IS UPLOADED, SET IT BACK TO THE PREVIOUS IMAGE
            if($target_dir == ""){
                $target_dir = $sch_logo;
            }else{
                move_uploaded_file($img_tmp, '../images/'.$target_dir);
            }
    
    $conn->query("UPDATE school_details SET sch_name='$sch_name',sch_name2='$sch_name2', sch_logo = '$target_dir',
    sch_facebook='$sch_facebook', sch_twitter='$sch_twitter',sch_instagram='$sch_instagram', header_col = '$header_col',
    sch_phone='$sch_phone', sch_phone2='$sch_phone2', sch_email='$sch_email', header_txt_col='$header_txt_col',
    sch_address='$sch_address'") or die($conn->error);

    $_SESSION['message'] = "School details have been updated!";
    $_SESSION['msg_type'] = "success";
    $_SESSION['btn'] = "Ok";

    header("location: school-details");
    }else{
        $_SESSION['message'] = "Image size too large, no change has been made!";
        $_SESSION['msg_type'] = "error";
        $_SESSION['btn'] = "Ok";
        header("location: school-details");
    }
}