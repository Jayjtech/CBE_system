<?php
 require "head_foot.php";
 require "../config/db.php";
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Admin Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script type="text/javascript">
	        function previewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("teach_img").files[0]);

            oFReader.onload = function (oFREvent) {
                document.getElementById("uploadPreview").src = oFREvent.target.result;
            };
		};
        
    </script>

	<?php include "header.php" ;?>
	<?php include "admin_navbar.php" ;?>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item active"><a href="index.php" class="nav-link pl-0">Home</a></li>
			</ul>
	      </div>
	    </div>
	  </nav>
<!-- END nav -->



<style>
 .avatar 
{
    max-width:30%;
    max-height:30%;
    border: 1px solid green;
	margin-left: px;
	border-radius: 10px;
}

</style>


<?php
if(isset($_SESSION['message'])): ?>

    <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
    </div>
    <?php endif ?>




<br><br><br>
<h3 class="text-center">Edit Header and Footer Background Color</h3>
<div class="container" style="overflow-x:auto;font-size:12px;">
<?php
$result =$conn->query("SELECT * FROM header_footer");
while($row = $result->fetch_assoc()):?>         
Header color : <div class="col-sm-4" style="width:30px; height:30px; background:<?php echo  $row['header_col']; ?>; border:1px solid black;"></div><br>
Footer color : <div class="col-sm-4" style="width:30px; height:30px; background:<?php echo  $row['footer_col']; ?>; border:1px solid black;"></div><br>
Header color : <div class="col-sm-4" style="width:30px; height:30px; background:<?php echo  $row['header_txt_col']; ?>; border:1px solid black;"></div><br>
Footer color : <div class="col-sm-4" style="width:30px; height:30px; background:<?php echo  $row['footer_txt_col']; ?>; border:1px solid black;"></div><br>
<a style="font-size:12px;" href="edit_header_footer.php?edit=<?php echo  $row['hf_id']; ?>" class="btn btn-info">Edit</a>
<a style="font-size:12px;" href="head_foot.php?delete=<?php echo  $row['hf_id']; ?>" class="btn btn-danger">Delete</a>
<br><br><br>
      
<?php endwhile; ?>
    </div>
    


    <div class="justify-content-center" style="margin-top: 20px; max-width:90%; margin:0 auto;">
    <form action="head_foot.php" method="POST" enctype="multipart/form-data">
<div style="border: 1px solid black; border-radius:15px; padding:20px;">
<br><br>
    <!--hidden message for update-->
    <input type="hidden" name="hf_id" value="<?php echo $hf_id; ?>">
    <!--end of hidden mesage-->
<div>
  
    <div class="form-group" style="width: 80%;  margin:0 auto;">
        <label for="">Header Background Color</label>
        <select class="form-control" name="header_col" value="<?php echo $header_col?>" id="">
            <option style="background-color:#0c2b4b;" value="#0c2b4b">DeepBlue</option>
            <option style="background-color:#8b008b;" value="#8b008b">DarkMagenta</option>
            <option style="background-color:#000000;" value="#000000">Black</option>
            <option style="background-color:#d3d3d3;" value="#d3d3d3">LightGrey</option>
            <option style="background-color:#ffb6c1;" value="#ffb6c1">LightPink</option>
            <option style="background-color:#daa520;" value="#daa520">GoldenRod</option>
            <option style="background-color:#ff00ff;" value="#ff00ff">Magenta</option>
            <option style="background-color:#800000;" value="#800000">Maroon</option>
            <option style="background-color:#20b2aa;" value="#20b2aa">LightSeaGreen</option>
            <option style="background-color:#008000;" value="#008000">Green</option>
            <option style="background-color:#f0e68c;" value="#f0e68c">Khaki</option>
            <option style="background-color:#ff8c00;" value="#ff8c00">DarkOrange</option>
            <option style="background-color:#9932cc;" value="#9932cc">DarkOrchid</option>
            <option style="background-color:#c71585;" value="#c71585">MediumVioletRed</option>
            <option style="background-color:#ffe4e1;" value="#ffe4e1">MistyRose</option>
            <option style="background-color:#000080;" value="#000080">Navy</option>
            <option style="background-color:#ffe4b5;" value="#ffe4b5">Moccasin</option>
            <option style="background-color:#ffc0cb;" value="#ffc0cb">Pink</option>
            <option style="background-color:#ff0000;" value="#ff0000">Red</option>
            <option style="background-color:#4169e1;" value="#4169e1">RoyalBlue</option>
            <option style="background-color:#cd853f;" value="#cd853f">Peru</option>
            <option style="background-color:#ffffff;" value="#ffffff">White</option>
            <option style="background-color:#d2691e;" value="#d2691e">Chocolate</option>
            <option style="background-color:#8b4513;" value="#8b4513">SaddleBrown</option>
            <option style="background-color:#ff6347;" value="#ff6347">Tomato</option>
            <option style="background-color:#d8dfd8;" value="#d8dfd8">Thistle</option>
            <option style="background-color:#fff5ee;" value="#fff5ee">SeaShell</option>
            <option style="background-color:#87ceeb;" value="#87ceeb">Skyblue</option>
            <option style="background-color:#b22222;" value="#b22222">FireBrick</option>
            <option style="background-color:#ffff00;" value="#ffff00">Yellow</option>
            <option style="background-color:#008080;" value="#008080">Teal</option>
            <option style="background-color:#2f4f4f;" value="#2f4f4f">DarkViolet</option>
            <option style="background-color:#94cd32;" value="#94cd32">YellowGreen</option>
            <option style="background-color:#ff1493;" value="#ff1493">Deeppink</option>
            <option style="background-color:#00bfff;" value="#00bfff">DeepSkyblue</option>
        </select>
    </div>

  

    <div class="form-group" style="width: 80%;  margin:0 auto;">
        <label for="">Footer Background Color</label>
        <select class="form-control" name="footer_col" value="<?php echo $footer_col?>">
            <option style="background-color:#0c2b4b;" value="#0c2b4b">DeepBlue</option>
            <option style="background-color:#8b008b;" value="#8b008b">DarkMagenta</option>
            <option style="background-color:#000000;" value="#000000">Black</option>
            <option style="background-color:#d3d3d3;" value="#d3d3d3">LightGrey</option>
            <option style="background-color:#ffb6c1;" value="#ffb6c1">LightPink</option>
            <option style="background-color:#daa520;" value="#daa520">GoldenRod</option>
            <option style="background-color:#ff00ff;" value="#ff00ff">Magenta</option>
            <option style="background-color:#800000;" value="#800000">Maroon</option>
            <option style="background-color:#20b2aa;" value="#20b2aa">LightSeaGreen</option>
            <option style="background-color:#008000;" value="#008000">Green</option>
            <option style="background-color:#f0e68c;" value="#f0e68c">Khaki</option>
            <option style="background-color:#ff8c00;" value="#ff8c00">DarkOrange</option>
            <option style="background-color:#9932cc;" value="#9932cc">DarkOrchid</option>
            <option style="background-color:#c71585;" value="#c71585">MediumVioletRed</option>
            <option style="background-color:#ffe4e1;" value="#ffe4e1">MistyRose</option>
            <option style="background-color:#000080;" value="#000080">Navy</option>
            <option style="background-color:#ffe4b5;" value="#ffe4b5">Moccasin</option>
            <option style="background-color:#ffc0cb;" value="#ffc0cb">Pink</option>
            <option style="background-color:#ff0000;" value="#ff0000">Red</option>
            <option style="background-color:#4169e1;" value="#4169e1">RoyalBlue</option>
            <option style="background-color:#cd853f;" value="#cd853f">Peru</option>
            <option style="background-color:#ffffff;" value="#ffffff">White</option>
            <option style="background-color:#d2691e;" value="#d2691e">Chocolate</option>
            <option style="background-color:#8b4513;" value="#8b4513">SaddleBrown</option>
            <option style="background-color:#ff6347;" value="#ff6347">Tomato</option>
            <option style="background-color:#d8dfd8;" value="#d8dfd8">Thistle</option>
            <option style="background-color:#fff5ee;" value="#fff5ee">SeaShell</option>
            <option style="background-color:#87ceeb;" value="#87ceeb">Skyblue</option>
            <option style="background-color:#b22222;" value="#b22222">FireBrick</option>
            <option style="background-color:#ffff00;" value="#ffff00">Yellow</option>
            <option style="background-color:#008080;" value="#008080">Teal</option>
            <option style="background-color:#2f4f4f;" value="#2f4f4f">DarkViolet</option>
            <option style="background-color:#94cd32;" value="#94cd32">YellowGreen</option>
            <option style="background-color:#ff1493;" value="#ff1493">Deeppink</option>
            <option style="background-color:#00bfff;" value="#00bfff">DeepSkyblue</option>
        </select>
    </div>

    <div class="form-group" style="width: 80%;  margin:0 auto;">
        <label for="">Header Text Color</label>
        <select class="form-control" name="header_txt_col" value="<?php echo $header_txt_col?>" id="">
            <option style="background-color:#ffffff;" value="#ffffff">White</option>
            <option style="background-color:#8b008b;" value="#8b008b">DarkMagenta</option>
            <option style="background-color:#000000;" value="#000000">Black</option>
            <option style="background-color:#d3d3d3;" value="#d3d3d3">LightGrey</option>
            <option style="background-color:#ffb6c1;" value="#ffb6c1">LightPink</option>
            <option style="background-color:#daa520;" value="#daa520">GoldenRod</option>
            <option style="background-color:#ff00ff;" value="#ff00ff">Magenta</option>
            <option style="background-color:#800000;" value="#800000">Maroon</option>
            <option style="background-color:#20b2aa;" value="#20b2aa">LightSeaGreen</option>
            <option style="background-color:#008000;" value="#008000">Green</option>
            <option style="background-color:#f0e68c;" value="#f0e68c">Khaki</option>
            <option style="background-color:#ff8c00;" value="#ff8c00">DarkOrange</option>
            <option style="background-color:#9932cc;" value="#9932cc">DarkOrchid</option>
            <option style="background-color:#c71585;" value="#c71585">MediumVioletRed</option>
            <option style="background-color:#ffe4e1;" value="#ffe4e1">MistyRose</option>
            <option style="background-color:#000080;" value="#000080">Navy</option>
            <option style="background-color:#ffe4b5;" value="#ffe4b5">Moccasin</option>
            <option style="background-color:#ffc0cb;" value="#ffc0cb">Pink</option>
            <option style="background-color:#ff0000;" value="#ff0000">Red</option>
            <option style="background-color:#4169e1;" value="#4169e1">RoyalBlue</option>
            <option style="background-color:#cd853f;" value="#cd853f">Peru</option>
            <option style="background-color:#d2691e;" value="#d2691e">Chocolate</option>
            <option style="background-color:#8b4513;" value="#8b4513">SaddleBrown</option>
            <option style="background-color:#ff6347;" value="#ff6347">Tomato</option>
            <option style="background-color:#d8dfd8;" value="#d8dfd8">Thistle</option>
            <option style="background-color:#fff5ee;" value="#fff5ee">SeaShell</option>
            <option style="background-color:#87ceeb;" value="#87ceeb">Skyblue</option>
            <option style="background-color:#b22222;" value="#b22222">FireBrick</option>
            <option style="background-color:#ffff00;" value="#ffff00">Yellow</option>
            <option style="background-color:#008080;" value="#008080">Teal</option>
            <option style="background-color:#2f4f4f;" value="#2f4f4f">DarkViolet</option>
            <option style="background-color:#94cd32;" value="#94cd32">YellowGreen</option>
            <option style="background-color:#ff1493;" value="#ff1493">Deeppink</option>
            <option style="background-color:#00bfff;" value="#00bfff">DeepSkyblue</option>
        </select>
    </div>

  

    <div class="form-group" style="width: 80%;  margin:0 auto;">
        <label for="">Footer Text Color</label>
        <select class="form-control" name="footer_txt_col" value="<?php echo $footer_txt_col?>">
            <option style="background-color:#ffffff;" value="#ffffff">White</option>
            <option style="background-color:#8b008b;" value="#8b008b">DarkMagenta</option>
            <option style="background-color:#000000;" value="#000000">Black</option>
            <option style="background-color:#d3d3d3;" value="#d3d3d3">LightGrey</option>
            <option style="background-color:#ffb6c1;" value="#ffb6c1">LightPink</option>
            <option style="background-color:#daa520;" value="#daa520">GoldenRod</option>
            <option style="background-color:#ff00ff;" value="#ff00ff">Magenta</option>
            <option style="background-color:#800000;" value="#800000">Maroon</option>
            <option style="background-color:#20b2aa;" value="#20b2aa">LightSeaGreen</option>
            <option style="background-color:#008000;" value="#008000">Green</option>
            <option style="background-color:#f0e68c;" value="#f0e68c">Khaki</option>
            <option style="background-color:#ff8c00;" value="#ff8c00">DarkOrange</option>
            <option style="background-color:#9932cc;" value="#9932cc">DarkOrchid</option>
            <option style="background-color:#c71585;" value="#c71585">MediumVioletRed</option>
            <option style="background-color:#ffe4e1;" value="#ffe4e1">MistyRose</option>
            <option style="background-color:#000080;" value="#000080">Navy</option>
            <option style="background-color:#ffe4b5;" value="#ffe4b5">Moccasin</option>
            <option style="background-color:#ffc0cb;" value="#ffc0cb">Pink</option>
            <option style="background-color:#ff0000;" value="#ff0000">Red</option>
            <option style="background-color:#4169e1;" value="#4169e1">RoyalBlue</option>
            <option style="background-color:#cd853f;" value="#cd853f">Peru</option>
            <option style="background-color:#ffffff;" value="#ffffff">White</option>
            <option style="background-color:#d2691e;" value="#d2691e">Chocolate</option>
            <option style="background-color:#8b4513;" value="#8b4513">SaddleBrown</option>
            <option style="background-color:#ff6347;" value="#ff6347">Tomato</option>
            <option style="background-color:#d8dfd8;" value="#d8dfd8">Thistle</option>
            <option style="background-color:#fff5ee;" value="#fff5ee">SeaShell</option>
            <option style="background-color:#87ceeb;" value="#87ceeb">Skyblue</option>
            <option style="background-color:#b22222;" value="#b22222">FireBrick</option>
            <option style="background-color:#ffff00;" value="#ffff00">Yellow</option>
            <option style="background-color:#008080;" value="#008080">Teal</option>
            <option style="background-color:#2f4f4f;" value="#2f4f4f">DarkViolet</option>
            <option style="background-color:#94cd32;" value="#94cd32">YellowGreen</option>
            <option style="background-color:#ff1493;" value="#ff1493">Deeppink</option>
            <option style="background-color:#00bfff;" value="#00bfff">DeepSkyblue</option>
        </select>
    </div>

    <div class="form-group" style="width: 50%;  margin:0 auto;">
    <?php
        if ($update == true):
    ?>
        <button type="submit" class="btn btn-info" name="update">Update</button>
        <?php else: ?>   
        <button type="submit"style="margin-top: 10px;" class="btn btn-primary" name="save">Publish</button>
        <?php endif ?>
    </div>
    
    </form>
    </div>
    </div>
    
</div>

<br><br><br>
<section class="" style="float:right; width:100%;">
<?php include "footer.php"; ?>
  </section>
