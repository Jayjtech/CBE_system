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
	
<?php
if($_SESSION['quest_code']){
  //INCASE PAGE LOADS FROM ANOTHER PAGE
  $quest_code = $_SESSION['quest_code'];
  $course_code = $_SESSION['course_code'];
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
	          <li class="nav-item"><a href="edit_question.php" class="nav-link">Back</a></li>
	          <li class="nav-item"><a href="logout.php" class="nav-link">Log Out</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>

<div class="container">
<?php
if(isset($_SESSION['message'])): ?>

    <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
    </div>
    <?php endif ?>
    </div>
<div class="container row">
<div class="col-lg-8">
<div class="container">
      <div class="tab" id="Q" style="display:none;">
        <input type="button" name="btn" value="&#8730;" onclick="myclickQ('&#8730;')">
        <input type="button" name="btn" value="&#8731;" onclick="myclickQ('&#8731;')">
        <input type="button" name="btn" value="&#8732;" onclick="myclickQ('&#8732;')">
        <input type="button" name="btn" value="&#8734;" onclick="myclickQ('&#8734;')">
        <input type="button" name="btn" value="&#8735;" onclick="myclickQ('&#8735;')">
        <input type="button" name="btn" value="&#9702;" onclick="myclickQ('&#9702;')">
        <input type="button" name="btn" value="+" onclick="myclickQ('+')">
        <input type="button" name="btn" value="-" onclick="myclickQ('-')">
        <input type="button" name="btn" value="&sup2;" onclick="myclickQ('&sup2;')">
        <input type="button" name="btn" value="&sup3;" onclick="myclickQ('&sup3;')">
        <input type="button" name="btn" value="Underline" onclick="myclickQ('<u>_</u>')">
        <input type="button" name="btn" value="Italics" onclick="myclickQ('<em>_</em>')">
        <input type="button" name="btn" value="sub" onclick="myclickQ('<sub>_</sub>')">
        <input type="button" name="btn" value="&#177;" onclick="myclickQ('&#177;')">
        <input type="button" name="btn" value="&#249;" onclick="myclickQ('&#249;')">
        <input type="button" name="btn" value="&#248;" onclick="myclickQ('&#248;')">
        <input type="button" name="btn" value="&#931;" onclick="myclickQ('&#931;')">
        <input type="button" name="btn" value="&#937;" onclick="myclickQ('&#937;')">
        <input type="button" name="btn" value="&#945;" onclick="myclickQ('&#945;')">
        <input type="button" name="btn" value="&#946;" onclick="myclickQ('&#946;')">
        <input type="button" name="btn" value="&#947;" onclick="myclickQ('&#947;')">
        <input type="button" name="btn" value="&#948;" onclick="myclickQ('&#948;')">
        <input type="button" name="btn" value="&#949;" onclick="myclickQ('&#949;')">
        <input type="button" name="btn" value="&#950;" onclick="myclickQ('&#950;')">
        <input type="button" name="btn" value="&#951;" onclick="myclickQ('&#951;')">
        <input type="button" name="btn" value="&#955;" onclick="myclickQ('&#955;')">
        <input type="button" name="btn" value="&#960;" onclick="myclickQ('&#960;')">
        <input type="button" name="btn" value="&#969;" onclick="myclickQ('&#969;')">
        <input type="button" name="btn" value="&#977;" onclick="myclickQ('&#977;')">
        <input type="button" name="btn" value="&#978;" onclick="myclickQ('&#978;')">
        <input type="button" name="btn" value="&#8243;" onclick="myclickQ('&#8243;')">
        <input type="button" name="btn" value="&#8254;" onclick="myclickQ('&#8254;')">
        <input type="button" name="btn" value="&#8260;" onclick="myclickQ('&#8260;')">
        <input type="button" name="btn" value="&#8596;" onclick="myclickQ('&#8596;')">
        <input type="button" name="btn" value="&#9833;" onclick="myclickQ('&#9833;')">
        <input type="button" name="btn" value="&#9834;" onclick="myclickQ('&#9834;')">
        <input type="button" name="btn" value="&#9835;" onclick="myclickQ('&#9835;')">
        <input type="button" name="btn" value="&#9836;" onclick="myclickQ('&#9836;')">
        <input type="button" name="btn" value="&#9837;" onclick="myclickQ('&#9837;')">
        <input type="button" name="btn" value="&#9838;" onclick="myclickQ('&#9838;')">
        <input type="button" name="btn" value="&#9839;" onclick="myclickQ('&#9839;')">
        <input type="button" name="btn" value="&#8739;" onclick="myclickQ('&#8739;')">
        <input type="button" name="btn" value="&#8740;" onclick="myclickQ('&#8740;')">
        <input type="button" name="btn" value="&#8741;" onclick="myclickQ('&#8741;')">
        <input type="button" name="btn" value="&#8742;" onclick="myclickQ('&#8742;')">
        <input type="button" name="btn" value="&#8743;" onclick="myclickQ('&#8743;')">
        <input type="button" name="btn" value="&#8744;" onclick="myclickQ('&#8744;')">
        <input type="button" name="btn" value="&#8745;" onclick="myclickQ('&#8745;')">
        <input type="button" name="btn" value="&#8746;" onclick="myclickQ('&#8746;')">
        <input type="button" name="btn" value="&#8747;" onclick="myclickQ('&#8747;')">
        <input type="button" name="btn" value="&#8804;" onclick="myclickQ('&#8804;')">
        <input type="button" name="btn" value="&#8805;" onclick="myclickQ('&#8805;')">
        <input type="button" name="btn" value="&#8801;" onclick="myclickQ('&#8801;')">
        <input type="button" name="btn" value="&#8756;" onclick="myclickQ('&#8756;')">
        <input type="button" name="btn" value="&#8707;" onclick="myclickQ('&#8707;')">
        <input type="button" name="btn" value="&#8714;" onclick="myclickQ('&#8714;')">
        <input type="button" name="btn" value="&#8708;" onclick="myclickQ('&#8708;')">
        <input type="button" name="btn" value="&#8712;" onclick="myclickQ('&#8712;')">
        <input type="button" name="btn" value="&#8713;" onclick="myclickQ('&#8713;')">
        <input type="button" name="btn" value="&#8714;" onclick="myclickQ('&#8714;')">
        <input type="button" name="btn" value="&#8715;" onclick="myclickQ('&#8715;')">
        <input type="button" name="btn" value="&#8716;" onclick="myclickQ('&#8716;')">
        <input type="button" name="btn" value="&#8717;" onclick="myclickQ('&#8717;')">
        <input type="button" name="btn" value="&#8358;" onclick="myclickQ('&#8358;')">
        <input type="button" name="btn" value="&#8351;" onclick="myclickQ('&#8351;')">
        <input type="button" name="btn" value="&#8356;" onclick="myclickQ('&#8356;')">
        <input type="button" name="btn" value="&#8352;" onclick="myclickQ('&#8352;')">
        <input type="button" name="btn" value="&#8353;" onclick="myclickQ('&#8353;')">
        <input type="button" name="btn" value="&#8457;" onclick="myclickQ('&#8457;')">
        <input type="button" name="btn" value="&#224;" onclick="myclickQ('&#224;')">
        <input type="button" name="btn" value="&#225;" onclick="myclickQ('&#225;')">
        <input type="button" name="btn" value="&#226;" onclick="myclickQ('&#226;')">
        <input type="button" name="btn" value="&#227;" onclick="myclickQ('&#227;')">
        <input type="button" name="btn" value="&#228;" onclick="myclickQ('&#228;')">
        <input type="button" name="btn" value="&#229;" onclick="myclickQ('&#229;')">
        <input type="button" name="btn" value="&#230;" onclick="myclickQ('&#230;')">
        <input type="button" name="btn" value="&#231;" onclick="myclickQ('&#231;')">
        <input type="button" name="btn" value="&#232;" onclick="myclickQ('&#232;')">
        <input type="button" name="btn" value="&#233;" onclick="myclickQ('&#233;')">
        <input type="button" name="btn" value="&#234;" onclick="myclickQ('&#234;')">
        <input type="button" name="btn" value="&#235;" onclick="myclickQ('&#235;')">
        <input type="button" name="btn" value="&#236;" onclick="myclickQ('&#236;')">
        <input type="button" name="btn" value="&#237;" onclick="myclickQ('&#237;')">
        <input type="button" name="btn" value="&#238;" onclick="myclickQ('&#238;')">
        <input type="button" name="btn" value="&#239;" onclick="myclickQ('&#239;')">
        <input type="button" name="btn" value="&#240;" onclick="myclickQ('&#240;')">
        <input type="button" name="btn" value="&#241;" onclick="myclickQ('&#241;')">
        <input type="button" name="btn" value="&#242;" onclick="myclickQ('&#242;')">
        <input type="button" name="btn" value="&#243;" onclick="myclickQ('&#243;')">
        <input type="button" name="btn" value="&#244;" onclick="myclickQ('&#244;')">
        <input type="button" name="btn" value="&#245;" onclick="myclickQ('&#245;')">
        <input type="button" name="btn" value="&#246;" onclick="myclickQ('&#246;')">
        <input type="button" name="btn" value="&#247;" onclick="myclickQ('&#247;')">
        <input type="button" name="btn" value="&#248;" onclick="myclickQ('&#248;')">
        <input type="button" name="btn" value="&#249;" onclick="myclickQ('&#249;')">
        <input type="button" name="btn" value="&#249;" onclick="myclickQ('&#249;')">
        <input type="button" name="btn" value="&#250;" onclick="myclickQ('&#250;')">
        <input type="button" name="btn" value="&#251;" onclick="myclickQ('&#251;')">
        <input type="button" name="btn" value="&#252;" onclick="myclickQ('&#252;')">
        <input type="button" name="btn" value="&#253;" onclick="myclickQ('&#253;')">
        <input type="button" name="btn" value="&#254;" onclick="myclickQ('&#254;')">
        <input type="button" name="btn" value="&#255;" onclick="myclickQ('&#255;')">
        <input type="button" name="btn" value="&#402;" onclick="myclickQ('&#402;')">
        <input type="button" name="btn" value="&#916;" onclick="myclickQ('&#916;')">
        <input type="button" name="btn" value="&#8800;" onclick="myclickQ('&#8800;')">
        <input type="button" name="btn" value="&#8776;" onclick="myclickQ('&#8776;')">
        <input type="button" name="btn" value="&#8764;" onclick="myclickQ('&#8764;')">
        <input type="button" name="btn" value="&#768;" onclick="myclickQ('&#768;')">
        <input type="button" name="btn" value="&#769;" onclick="myclickQ('&#769;')">
        <input type="button" name="btn" value="&#772;" onclick="myclickQ('&#772;')">
        <input type="button" name="btn" value="&#773;" onclick="myclickQ('&#773;')">
        <input type="button" name="btn" value="&#774;" onclick="myclickQ('&#774;')">
        <input type="button" name="btn" value="&#775;" onclick="myclickQ('&#775;')">
        <input type="button" name="btn" value="&#776;" onclick="myclickQ('&#776;')">
        <input type="button" name="btn" value="&#777;" onclick="myclickQ('&#777;')">
        <input type="button" name="btn" value="&#780;" onclick="myclickQ('&#780;')">
        <input type="button" name="btn" value="&#781;" onclick="myclickQ('&#781;')">
        <input type="button" name="btn" value="&#782;" onclick="myclickQ('&#782;')">
        <input type="button" name="btn" value="&#783;" onclick="myclickQ('&#783;')">
        <input type="button" name="btn" value="&#790;" onclick="myclickQ('&#790;')">
        <input type="button" name="btn" value="&#791;" onclick="myclickQ('&#791;')">
        <input type="button" name="btn" value="&#940;" onclick="myclickQ('&#940;')">
      </div>
</div>
<?php
$query=$conn->query("SELECT * FROM $exam_table WHERE quest_code='$quest_code' AND course_code='$course_code'");
while($quest = $query->fetch_assoc()){
  $question_num = $quest['question_number'];
  $question_text = $quest['text'];
}
    
    ?>

    <div class="container">
            <form action="edit_question_pro.php" name="myformQ" method="POST">
            <input type="hidden" name="quest_code" value="<?php echo $quest_code; ?>">
            <input type="hidden" name="course_code" value="<?php echo $course_code; ?>">
           
            <input type="submit" name="update_question" value="Update Q<?php echo $question_num;?>." class="btn btn-primary"><br>
                <textarea name="displayQ" onclick="toggleQ()" class="form-control" id="" cols="30" rows="3"><?php echo $question_text;?></textarea>
            </form>
            <?php 
            $query2=$conn->query("SELECT * FROM $answer_table WHERE quest_code='$quest_code' AND course_code='$course_code'");
              while($row = $query2->fetch_assoc()){
                $question_num = $row['question_number'];
                $alpha_opt = $row['alpha_opt'];
                $answer_text = $row['text'];
                $is_correct = $row['is_correct'];

              ?>

        <div class="container">
              <div class="tab" id="<?php echo $alpha_opt; ?>" style="display:none;">
                  <input type="button" name="btn" value="&#8730;" onclick="myclick<?php echo $alpha_opt; ?>('&#8730;')">
                  <input type="button" name="btn" value="&#8731;" onclick="myclick<?php echo $alpha_opt; ?>('&#8731;')">
                  <input type="button" name="btn" value="&#8732;" onclick="myclick<?php echo $alpha_opt; ?>('&#8732;')">
                  <input type="button" name="btn" value="&#8734;" onclick="myclick<?php echo $alpha_opt; ?>('&#8734;')">
                  <input type="button" name="btn" value="&#8735;" onclick="myclick<?php echo $alpha_opt; ?>('&#8735;')">
                  <input type="button" name="btn" value="&#9702;" onclick="myclick<?php echo $alpha_opt; ?>('&#9702;')">
                  <input type="button" name="btn" value="+" onclick="myclick<?php echo $alpha_opt; ?>('+')">
                  <input type="button" name="btn" value="-" onclick="myclick<?php echo $alpha_opt; ?>('-')">
                  <input type="button" name="btn" value="&sup2;" onclick="myclick<?php echo $alpha_opt; ?>('&sup2;')">
                  <input type="button" name="btn" value="&sup3;" onclick="myclick<?php echo $alpha_opt; ?>('&sup3;')">
                  <input type="button" name="btn" value="Underline" onclick="myclick<?php echo $alpha_opt; ?>('<u>_</u>')">
                  <input type="button" name="btn" value="Italics" onclick="myclick<?php echo $alpha_opt; ?>('<em>_</em>')">
                  <input type="button" name="btn" value="sub" onclick="myclick<?php echo $alpha_opt; ?>('<sub>_</sub>')">
                  <input type="button" name="btn" value="sup" onclick="myclick<?php echo $alpha_opt; ?>('<sup>_</sup>')">
                  <input type="button" name="btn" value="&#177;" onclick="myclick<?php echo $alpha_opt; ?>('&#177;')">
                  <input type="button" name="btn" value="&#249;" onclick="myclick<?php echo $alpha_opt; ?>('&#249;')">
                  <input type="button" name="btn" value="&#1012;" onclick="myclick<?php echo $alpha_opt; ?>('&#1012;')">
                  <input type="button" name="btn" value="&#931;" onclick="myclick<?php echo $alpha_opt; ?>('&#931;')">
                  <input type="button" name="btn" value="&#937;" onclick="myclick<?php echo $alpha_opt; ?>('&#937;')">
                  <input type="button" name="btn" value="&#945;" onclick="myclick<?php echo $alpha_opt; ?>('&#945;')">
                  <input type="button" name="btn" value="&#946;" onclick="myclick<?php echo $alpha_opt; ?>('&#946;')">
                  <input type="button" name="btn" value="&#947;" onclick="myclick<?php echo $alpha_opt; ?>('&#947;')">
                  <input type="button" name="btn" value="&#948;" onclick="myclick<?php echo $alpha_opt; ?>('&#948;')">
                  <input type="button" name="btn" value="&#949;" onclick="myclick<?php echo $alpha_opt; ?>('&#949;')">
                  <input type="button" name="btn" value="&#950;" onclick="myclick<?php echo $alpha_opt; ?>('&#950;')">
                  <input type="button" name="btn" value="&#951;" onclick="myclick<?php echo $alpha_opt; ?>('&#951;')">
                  <input type="button" name="btn" value="&#955;" onclick="myclick<?php echo $alpha_opt; ?>('&#955;')">
                  <input type="button" name="btn" value="&#960;" onclick="myclick<?php echo $alpha_opt; ?>('&#960;')">
                  <input type="button" name="btn" value="&#969;" onclick="myclick<?php echo $alpha_opt; ?>('&#969;')">
                  <input type="button" name="btn" value="&#977;" onclick="myclick<?php echo $alpha_opt; ?>('&#977;')">
                  <input type="button" name="btn" value="&#978;" onclick="myclick<?php echo $alpha_opt; ?>('&#978;')">
                  <input type="button" name="btn" value="&#8243;" onclick="myclick<?php echo $alpha_opt; ?>('&#8243;')">
                  <input type="button" name="btn" value="&#8254;" onclick="myclick<?php echo $alpha_opt; ?>('&#8254;')">
                  <input type="button" name="btn" value="&#8260;" onclick="myclick<?php echo $alpha_opt; ?>('&#8260;')">
                  <input type="button" name="btn" value="&#8596;" onclick="myclick<?php echo $alpha_opt; ?>('&#8596;')">
                  <input type="button" name="btn" value="&#9833;" onclick="myclick<?php echo $alpha_opt; ?>('&#9833;')">
                  <input type="button" name="btn" value="&#9834;" onclick="myclick<?php echo $alpha_opt; ?>('&#9834;')">
                  <input type="button" name="btn" value="&#9835;" onclick="myclick<?php echo $alpha_opt; ?>('&#9835;')">
                  <input type="button" name="btn" value="&#9836;" onclick="myclick<?php echo $alpha_opt; ?>('&#9836;')">
                  <input type="button" name="btn" value="&#9837;" onclick="myclick<?php echo $alpha_opt; ?>('&#9837;')">
                  <input type="button" name="btn" value="&#9838;" onclick="myclick<?php echo $alpha_opt; ?>('&#9838;')">
                  <input type="button" name="btn" value="&#9839;" onclick="myclick<?php echo $alpha_opt; ?>('&#9839;')">
                  <input type="button" name="btn" value="&#8739;" onclick="myclick<?php echo $alpha_opt; ?>('&#8739;')">
                  <input type="button" name="btn" value="&#8740;" onclick="myclick<?php echo $alpha_opt; ?>('&#8740;')">
                  <input type="button" name="btn" value="&#8741;" onclick="myclick<?php echo $alpha_opt; ?>('&#8741;')">
                  <input type="button" name="btn" value="&#8742;" onclick="myclick<?php echo $alpha_opt; ?>('&#8742;')">
                  <input type="button" name="btn" value="&#8743;" onclick="myclick<?php echo $alpha_opt; ?>('&#8743;')">
                  <input type="button" name="btn" value="&#8744;" onclick="myclick<?php echo $alpha_opt; ?>('&#8744;')">
                  <input type="button" name="btn" value="&#8745;" onclick="myclick<?php echo $alpha_opt; ?>('&#8745;')">
                  <input type="button" name="btn" value="&#8746;" onclick="myclick<?php echo $alpha_opt; ?>('&#8746;')">
                  <input type="button" name="btn" value="&#8747;" onclick="myclick<?php echo $alpha_opt; ?>('&#8747;')">
                  <input type="button" name="btn" value="&#8804;" onclick="myclick<?php echo $alpha_opt; ?>('&#8804;')">
                  <input type="button" name="btn" value="&#8805;" onclick="myclick<?php echo $alpha_opt; ?>('&#8805;')">
                  <input type="button" name="btn" value="&#8801;" onclick="myclick<?php echo $alpha_opt; ?>('&#8801;')">
                  <input type="button" name="btn" value="&#8756;" onclick="myclick<?php echo $alpha_opt; ?>('&#8756;')">
                  <input type="button" name="btn" value="&#8707;" onclick="myclick<?php echo $alpha_opt; ?>('&#8707;')">
                  <input type="button" name="btn" value="&#8714;" onclick="myclick<?php echo $alpha_opt; ?>('&#8714;')">
                  <input type="button" name="btn" value="&#8708;" onclick="myclick<?php echo $alpha_opt; ?>('&#8708;')">
                  <input type="button" name="btn" value="&#8712;" onclick="myclick<?php echo $alpha_opt; ?>('&#8712;')">
                  <input type="button" name="btn" value="&#8713;" onclick="myclick<?php echo $alpha_opt; ?>('&#8713;')">
                  <input type="button" name="btn" value="&#8714;" onclick="myclick<?php echo $alpha_opt; ?>('&#8714;')">
                  <input type="button" name="btn" value="&#8715;" onclick="myclick<?php echo $alpha_opt; ?>('&#8715;')">
                  <input type="button" name="btn" value="&#8716;" onclick="myclick<?php echo $alpha_opt; ?>('&#8716;')">
                  <input type="button" name="btn" value="&#8717;" onclick="myclick<?php echo $alpha_opt; ?>('&#8717;')">
                  <input type="button" name="btn" value="&#8358;" onclick="myclick<?php echo $alpha_opt; ?>('&#8358;')">
                  <input type="button" name="btn" value="&#8351;" onclick="myclick<?php echo $alpha_opt; ?>('&#8351;')">
                  <input type="button" name="btn" value="&#8356;" onclick="myclick<?php echo $alpha_opt; ?>('&#8356;')">
                  <input type="button" name="btn" value="&#8352;" onclick="myclick<?php echo $alpha_opt; ?>('&#8352;')">
                  <input type="button" name="btn" value="&#8353;" onclick="myclick<?php echo $alpha_opt; ?>('&#8353;')">
                  <input type="button" name="btn" value="&#8457;" onclick="myclick<?php echo $alpha_opt; ?>('&#8457;')">
                  <input type="button" name="btn" value="&#224;" onclick="myclick<?php echo $alpha_opt; ?>('&#224;')">
                  <input type="button" name="btn" value="&#225;" onclick="myclick<?php echo $alpha_opt; ?>('&#225;')">
                  <input type="button" name="btn" value="&#226;" onclick="myclick<?php echo $alpha_opt; ?>('&#226;')">
                  <input type="button" name="btn" value="&#227;" onclick="myclick<?php echo $alpha_opt; ?>('&#227;')">
                  <input type="button" name="btn" value="&#228;" onclick="myclick<?php echo $alpha_opt; ?>('&#228;')">
                  <input type="button" name="btn" value="&#229;" onclick="myclick<?php echo $alpha_opt; ?>('&#229;')">
                  <input type="button" name="btn" value="&#230;" onclick="myclick<?php echo $alpha_opt; ?>('&#230;')">
                  <input type="button" name="btn" value="&#231;" onclick="myclick<?php echo $alpha_opt; ?>('&#231;')">
                  <input type="button" name="btn" value="&#232;" onclick="myclick<?php echo $alpha_opt; ?>('&#232;')">
                  <input type="button" name="btn" value="&#233;" onclick="myclick<?php echo $alpha_opt; ?>('&#233;')">
                  <input type="button" name="btn" value="&#234;" onclick="myclick<?php echo $alpha_opt; ?>('&#234;')">
                  <input type="button" name="btn" value="&#235;" onclick="myclick<?php echo $alpha_opt; ?>('&#235;')">
                  <input type="button" name="btn" value="&#236;" onclick="myclick<?php echo $alpha_opt; ?>('&#236;')">
                  <input type="button" name="btn" value="&#237;" onclick="myclick<?php echo $alpha_opt; ?>('&#237;')">
                  <input type="button" name="btn" value="&#238;" onclick="myclick<?php echo $alpha_opt; ?>('&#238;')">
                  <input type="button" name="btn" value="&#239;" onclick="myclick<?php echo $alpha_opt; ?>('&#239;')">
                  <input type="button" name="btn" value="&#240;" onclick="myclick<?php echo $alpha_opt; ?>('&#240;')">
                  <input type="button" name="btn" value="&#241;" onclick="myclick<?php echo $alpha_opt; ?>('&#241;')">
                  <input type="button" name="btn" value="&#242;" onclick="myclick<?php echo $alpha_opt; ?>('&#242;')">
                  <input type="button" name="btn" value="&#243;" onclick="myclick<?php echo $alpha_opt; ?>('&#243;')">
                  <input type="button" name="btn" value="&#244;" onclick="myclick<?php echo $alpha_opt; ?>('&#244;')">
                  <input type="button" name="btn" value="&#245;" onclick="myclick<?php echo $alpha_opt; ?>('&#245;')">
                  <input type="button" name="btn" value="&#246;" onclick="myclick<?php echo $alpha_opt; ?>('&#246;')">
                  <input type="button" name="btn" value="&#247;" onclick="myclick<?php echo $alpha_opt; ?>('&#247;')">
                  <input type="button" name="btn" value="&#248;" onclick="myclick<?php echo $alpha_opt; ?>('&#248;')">
                  <input type="button" name="btn" value="&#249;" onclick="myclick<?php echo $alpha_opt; ?>('&#249;')">
                  <input type="button" name="btn" value="&#249;" onclick="myclick<?php echo $alpha_opt; ?>('&#249;')">
                  <input type="button" name="btn" value="&#250;" onclick="myclick<?php echo $alpha_opt; ?>('&#250;')">
                  <input type="button" name="btn" value="&#251;" onclick="myclick<?php echo $alpha_opt; ?>('&#251;')">
                  <input type="button" name="btn" value="&#252;" onclick="myclick<?php echo $alpha_opt; ?>('&#252;')">
                  <input type="button" name="btn" value="&#253;" onclick="myclick<?php echo $alpha_opt; ?>('&#253;')">
                  <input type="button" name="btn" value="&#254;" onclick="myclick<?php echo $alpha_opt; ?>('&#254;')">
                  <input type="button" name="btn" value="&#255;" onclick="myclick<?php echo $alpha_opt; ?>('&#255;')">
                  <input type="button" name="btn" value="&#402;" onclick="myclick<?php echo $alpha_opt; ?>('&#402;')">
                  <input type="button" name="btn" value="&#916;" onclick="myclick<?php echo $alpha_opt; ?>('&#916;')">
                  <input type="button" name="btn" value="&#8800;" onclick="myclick<?php echo $alpha_opt; ?>('&#8800;')">
                  <input type="button" name="btn" value="&#8776;" onclick="myclick<?php echo $alpha_opt; ?>('&#8776;')">
                  <input type="button" name="btn" value="&#8764;" onclick="myclick<?php echo $alpha_opt; ?>('&#8764;')">
                  <input type="button" name="btn" value="&#768;" onclick="myclick<?php echo $alpha_opt; ?>('&#768;')">
                  <input type="button" name="btn" value="&#769;" onclick="myclick<?php echo $alpha_opt; ?>('&#769;')">
                  <input type="button" name="btn" value="&#772;" onclick="myclick<?php echo $alpha_opt; ?>('&#772;')">
                  <input type="button" name="btn" value="&#773;" onclick="myclick<?php echo $alpha_opt; ?>('&#773;')">
                  <input type="button" name="btn" value="&#774;" onclick="myclick<?php echo $alpha_opt; ?>('&#774;')">
                  <input type="button" name="btn" value="&#775;" onclick="myclick<?php echo $alpha_opt; ?>('&#775;')">
                  <input type="button" name="btn" value="&#776;" onclick="myclick<?php echo $alpha_opt; ?>('&#776;')">
                  <input type="button" name="btn" value="&#777;" onclick="myclick<?php echo $alpha_opt; ?>('&#777;')">
                  <input type="button" name="btn" value="&#780;" onclick="myclick<?php echo $alpha_opt; ?>('&#780;')">
                  <input type="button" name="btn" value="&#781;" onclick="myclick<?php echo $alpha_opt; ?>('&#781;')">
                  <input type="button" name="btn" value="&#782;" onclick="myclick<?php echo $alpha_opt; ?>('&#782;')">
                  <input type="button" name="btn" value="&#783;" onclick="myclick<?php echo $alpha_opt; ?>('&#783;')">
                  <input type="button" name="btn" value="&#790;" onclick="myclick<?php echo $alpha_opt; ?>('&#790;')">
                  <input type="button" name="btn" value="&#791;" onclick="myclick<?php echo $alpha_opt; ?>('&#791;')">
                  <input type="button" name="btn" value="&#940;" onclick="myclick<?php echo $alpha_opt; ?>('&#940;')">
              </div>
        </div>
                  <ul>
                    <li style="list-style=:none;">
                    <form action="edit_question_pro.php" name="myform<?php echo $alpha_opt; ?>" method="POST">
                    <input type="hidden" name="quest_code" value="<?php echo $quest_code; ?>">
                     <input type="hidden" name="course_code" value="<?php echo $course_code; ?>">
                     <input type="hidden" name="alpha_opt" value="<?php echo $alpha_opt; ?>">
                    <input type="submit" name="update_question" value="Update <?php echo $alpha_opt; ?>" class="btn btn-primary">
                      <textarea name="display<?php echo $alpha_opt; ?>" onclick="toggle<?php echo $alpha_opt; ?>()" class="form-control" id="" cols="30" rows="2"><?php echo $answer_text;?></textarea>
                      </form>
                    </li>
                  </ul>   
              <?php
              }
              ?>      
    </div>
    </div>


    <div class="col-lg-4">
        <form action="edit_question_pro.php" method="post" enctype="multipart/form-data" class="row">
            <!--end of hidden mesage-->

            <input type="hidden" value="<?php echo $quest_code; ?>" name="quest_code">
            <div class="form-group col-lg-5" style="margin:0 auto;">
                <img id="uploadPreview" src="../images/default_img.png" style="width:100%;height:45%;border:1px solid black;"><br><br>
                <input type="file" id="quest_image" style="width:100%;" name="quest_img"  required class="btn btn-primary" 
                accept="jpg, jpeg, png" onchange="previewImage();" value="<?php echo $quest_img?>"/>     
            
                <input type="submit" class="btn btn-success" name="upload_quest_img" value="Upload Question Image"/>
            </div>
        </form>
    </div>
</div>
</div>
</div>



<?php
}
?>
<br><br>
<?php include "footer.php"; ?>