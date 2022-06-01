<?php
require "../../config/db.php";
error_reporting(0);
$question_number = ""; $question_text = "";$choice4 = "";$choice1 = "";$choice5 = "";
$correct_choice = ""; $choice2 = ""; $choice3 ="";  
$errors = array(); $v_id = 0;//set hidden message defalt to 0
$update = false; 


if(isset($_POST['add'])){
    $question_number = mysqli_real_escape_string($conn,$_POST['question_number']);
    $question_text = mysqli_real_escape_string($conn,$_POST['question_text']);
    $correct_choice = mysqli_real_escape_string($conn,$_POST['correct_choice']);
        
    //CHOICE ARRAY
    $choices = array();
    $choices[1] = mysqli_real_escape_string($conn,$_POST['choice1']);
    $choices[2] = mysqli_real_escape_string($conn,$_POST['choice2']);
    $choices[3] = mysqli_real_escape_string($conn,$_POST['choice3']);
    $choices[4] = mysqli_real_escape_string($conn,$_POST['choice4']);
    $choices[5] = mysqli_real_escape_string($conn,$_POST['choice5']);

    $options = array();
    $options[1] = mysqli_real_escape_string($conn,$_POST['optA']);
    $options[2] = mysqli_real_escape_string($conn,$_POST['optB']);
    $options[3] = mysqli_real_escape_string($conn,$_POST['optC']);
    $options[4] = mysqli_real_escape_string($conn,$_POST['optD']);
    $options[5] = mysqli_real_escape_string($conn,$_POST['optE']);
   
    $query = $conn->query("INSERT INTO  exam_questions (question_number, text) 
    VALUES('$question_number', '$question_text')") 
    or die($conn->error);

    //INSERT VALIDATION
    if($query){
        foreach ($options as $opt => $val){
        foreach ($choices as $choice => $value)
        {
        if($value != ''){
            
            if($correct_choice == $choice){
                $is_correct = 1;
            }else{
                $is_correct = 0;
            }
           
            
            $query1 = $conn->query("INSERT INTO  choices (question_number, is_correct, alpha_opt, text)
            VALUES('$question_number', '$is_correct', '$val', '$value')") 
           or die($conn->error); 
    if($query1){
        continue;
    }else{
        $_SESSION['message'] = "An error occured!";
        $_SESSION['msg_type'] = "danger";//Message saved background
    }

        }
     }
    }
    
     $_SESSION['message'] = "Question has been added!";
     $_SESSION['msg_type'] = "success";//Message saved background
    header("location: add.php");
    }
}



if(isset($_GET['delete']))
{
    $msg_id = $_GET['delete'];
    $conn->query("DELETE FROM received_msgs WHERE msg_id=$msg_id") or die($conn->error());
    $conn->query("DELETE FROM replied_messages WHERE msg_id=$msg_id") or die($conn->error());
    
    $_SESSION['message'] = "Message has been deleted!";
    $_SESSION['msg_type'] = "danger";//Message delete background

    header("location: received_msg.php");
}








.instant-search{
    position: relative;
    max-width: 250px;
}
.instant-search,
.instant-search__input{
    font-family: sans-serif;

}
.instant-search{
transition: background 0.15s, box-shadow 0.15s;
}
.instant-search:focus-within{
box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
}

.instant-search,
.instant-search__input-container{
    border-radius: 5px;
}
.instant-search__input-container{
    display: inline-flex;
    box-sizing: border-box;
    width:100%;
    padding: 6px;
    background: #eeeeee;
}
.instant-search__input-container:focus-within{
    background: #ffffff;
}
.instant-search--loading::after {
content: "";
position: absolute;
top: 0;
left: 0;
height:2px;
background: #009578;
border-radius: 5px;
animation: searchIndicator 0.5s infinite ease-in-out;
}

@keyframes searchIndicator {
    0%{ width: 15%; }
    50%{ width: 100%; }
    100%{ width: 15%; }
}
.instant-search__input{
    flex-wrap: 1;
    border: none;
    outline: none;
    width: 100%;
    padding: 0 6px;
    background: transparent;

}
.instant-search__results-container{
    max-height: 250px;
    overflow-y: auto;
    /*
    visibility: hidden;
    opacity: 0;
    */
    transition: visibility 0.1s, opacity 0.1s;
}
.instant-search__results-container--visible{
    visibility: visible;
    opacity: 1;
}
p{
    font-family: ;
}



<div class="container" style="margin-bottom:50px;border-radius:15px; background:#db7093; box-shadow:grey 1px 10px 15px 1px; border: 2px solid purple;padding:15px;max-width:70%;">
    <!-- <div class="row">
        <div class="col-md-4 offset-md-4 form-div" style="max-width: 100%; align-items:center;">
        <?php if($firstCount === 0){ echo '<div class="alert-warning" 
        style="border:1px solid black;margin-bottom:50px;padding:15px;border-radius:10px;">
         You have no record in First Term </div>';}
        else { echo '<a class="btn btn-warning" style="margin-bottom:50px;" href="profile.php">
        Login to First Term</a><br>';}?>

        <?php if($secondCount === 0){ echo '<div class="alert-warning"
         style="border:1px solid black;margin-bottom:50px;padding:15px;border-radius:10px;">
          You have no record in Second Term </div>';}
        else { echo '<a class="btn btn-info" style="margin-bottom:50px;" href="2nd_term.php">
        Login to Second Term</a><br>';}?>

        <?php if($thirdCount === 0){ echo '<div class="alert-warning"
         style="border:1px solid black;margin-bottom:50px;padding:15px;border-radius:10px;">
          You have no record in Third Term </div>';}
        else { echo '<a class="btn btn-success" style="margin-bottom:50px;" href="3rd_term.php">
        Login to Third Term</a><br>';}?>
        </div>
    </div> -->
</div>