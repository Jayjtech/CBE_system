<?php 
require "../config/db.php";
$page_2 = $_SESSION['page'];
$page3 = $_SESSION['page3'];
if(!$_SESSION['name']){
  header("location:admin_login.php");
}
if(isset($_POST['edit'])){
  $_SESSION['quest_code'] = $_POST['quest_code'];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $sch_name;?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   	
<?php
if($_SESSION['quest_code']){
  //INCASE PAGE LOADS FROM ANOTHER PAGE
  $quest_code = $_SESSION['quest_code'];
  $course_code = $_SESSION['course_code'];

$query = $conn->query("SELECT * FROM $exam_table WHERE quest_code='$quest_code' AND course_code='$course_code'");
  while($quest = $query->fetch_assoc()){
    $question_num = $quest['question_number'];
    $question_text = $quest['text'];
    $quest_img = $quest['quest_img'];
  }
  if($quest_img != ""){
      $display_img = 'exam/'.$quest_img;
  }else{
    $display_img = '../images/default_img.png';
  }
  // CALLING OPTIONS FROM DATABASE
  $query2=$conn->query("SELECT * FROM $answer_table WHERE quest_code='$quest_code' AND course_code='$course_code'");
 
  // TO GET THE NUMBER OF OPTIONS AVAILABLE
  $check=$conn->query("SELECT * FROM $answer_table WHERE quest_code='$quest_code' AND course_code='$course_code'");

  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $sch_name;?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       
	<?php include "header.php" ;?>
  <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="questions" class="nav-link">Back</a></li>
	          <li class="nav-item"><a href="logout.php" class="nav-link">Log Out</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>

<div class="container offset mb-5">
  <h3 class="text-center">Edit question <?= $question_num; ?></h3>
    <form action="edit_question_pro" method="POST" enctype="multipart/form-data">
      <div class="row">
          <div class="col-sm-8">
              <div class="input-group">
                <span class="input-group-text">Question <?= $question_num; ?></span>
                <textarea name="displayQ" 
                  onclick="toggleQ()" 
                  class="form-control ckeditor" 
                  id="" 
                  cols="30" 
                  rows="2"><?= $question_text;?></textarea>
              </div><hr>
              <div class="form-group col-lg-4">

                <select name="is_correct" class="form-control" required>
                  <option value="">Set correct answer</option>
                  <?php while($row = $check->fetch_assoc()):?>
                    <option value="<?= $row['alpha_opt'] ;?>"><?= $row['alpha_opt'] ;?></option>
                    <?php endwhile; ?>
                </select>
              </div><hr>
              <!-- META DATA -->
              <input type="hidden" name="quest_code" value="<?= $quest_code; ?>">
              <input type="hidden" name="course_code" value="<?= $course_code; ?>">
              <input type="hidden" name="quest_img" value="<?= $quest_img; ?>">
    <?php
      while($row = $query2->fetch_assoc()):
        $question_num = $row['question_number'];
        $alpha_opt = $row['alpha_opt'];
        $answer_text = $row['text'];
        $is_correct = $row['is_correct'];
    ?>
              <input type="hidden" name="option[]" value="<?= $alpha_opt; ?>">
              <div class="input-group">
                <span class="input-group-text"><?= $alpha_opt; ?></span>
                <textarea 
                    name="answer[]" 
                    onclick="toggle<?= $alpha_opt; ?>()" 
                    class="form-control" 
                    id="" 
                    cols="30" 
                    rows="2"><?php echo $answer_text;?></textarea>
              </div><hr>
    <?php endwhile; ?>
          </div>

          <div class="col-sm-4">
                <img id="uploadPreview" src="<?= $display_img; ?>" style="width:100%;height:45%;border:1px solid black;"><br><br>
                <input type="file" id="quest_image" style="width:100%;" name="quest_img" class="btn btn-primary" 
                accept="jpg, jpeg, png" onchange="previewImage();" value="<?php echo $quest_img?>"/>    
          </div>
          
          <div class="col-sm-12" align="right">
                <div class="form-group">
                  <button name="update_question" class="btn btn-primary">Save changes</button>
                </div>   
          </div>
      </div>
    </form>
</div>

<script type="text/javascript">
	        function previewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("quest_image").files[0]);

            oFReader.onload = function (oFREvent) {
                document.getElementById("uploadPreview").src = oFREvent.target.result;
            };
		};

      function myclickQ(a){
        myformQ.displayQ.value +=a;
      } 
      function myclickA(a){
        myformA.displayA.value +=a;
      } 
      function myclickB(a){
        myformB.displayB.value +=a;
      } 
      function myclickC(a){
        myformC.displayC.value +=a;
      } 
      function myclickD(a){
        myformD.displayD.value +=a;
      } 
      function myclickE(a){
        myformE.displayE.value +=a;
      } 
    </script>
<?php } ?>
<?php include "footer.php"; ?>