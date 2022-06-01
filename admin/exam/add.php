<?php
require "../../config/db.php";


$result_1 = $conn->query("SELECT * FROM exam_questions");
//GET RESULT
$total_question = $result_1->num_rows;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam</title>
    <link rel="stylesheet" href="css/exam.css">
    <?php include "header.php";?>
    <?php include "exam_navbar.php";?>

    <div class="container" style="margin-top:50px; max-width:70%; color:#000;">
        <h2 class="text-center header"><?php echo $sch_name2; ?> Examination</h2>
<?php
if(isset($_SESSION['message'])): ?>

    <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
    </div>
<?php endif ?>


            <div class="justify-content-center" style="margin:0 auto; ">
                    <h4 class="text-center">Add a Question</h4>
             <form action="add_pro.php" method="POST">
                 <div class="form-group">
                     <label for="">Question Number</label>
                    <input class="form-control" type="number" name="question_number" value="<?php echo $total_question+1; ?>">
                 </div>

                 <div class="form-group">
                     <label for="">Question Text</label>
                    <input class="form-control" type="text" name="question_text">
                 </div>

                 <div class="form-group">
                     <label for="">Choice A</label>
                    <input class="form-control" type="text" name="choice1">
                    <input class="form-control" type="hidden" name="optA" value="A">
                 </div>

                 <div class="form-group">
                     <label for="">Choice B</label>
                    <input class="form-control" type="text" name="choice2">
                    <input class="form-control" type="hidden" name="optB" value="B">
                 </div>

                 <div class="form-group">
                     <label for="">Choice C</label>
                    <input class="form-control" type="text" name="choice3">
                    <input class="form-control" type="hidden" name="optC" value="C">
                 </div>

                 <div class="form-group">
                     <label for="">Choice D</label>
                    <input class="form-control" type="text" name="choice4">
                    <input class="form-control" type="hidden" name="optD" value="D">
                 </div>

                 <div class="form-group">
                     <label for="">Choice E</label>
                    <input class="form-control" type="text" name="choice5">
                    <input class="form-control" type="hidden" name="optE" value="E">
                 </div>

                 <div class="form-group">
                 <label for="" style="font-size:18px;">Select Correct Choice</label>
                     <ul class="options">
                            <li style="margin-left:15px; padding:10px; font-size:25px;"><input type="radio" name="correct_choice" value="A"> A</li>
                            <li style="margin-left:15px; padding:10px; font-size:25px;"><input type="radio" name="correct_choice" value="B"> B</li>
                            <li style="margin-left:15px; padding:10px; font-size:25px;"><input type="radio" name="correct_choice" value="C"> C</li>
                            <li style="margin-left:15px; padding:10px; font-size:25px;"><input type="radio" name="correct_choice" value="D"> D</li>
                            <li style="margin-left:15px; padding:10px; font-size:25px;"><input type="radio" name="correct_choice" value="E"> E</li>
                     </ul>
                 </div>

                 <div class="form-group">
                    <input class="btn btn-success" type="submit" name="add" value="Add">
                 </div>
             </form>
            </div> 
    </div>