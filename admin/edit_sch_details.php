<?php
 require "sch_details.php";
 require "../config/db.php";
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>School Details</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script type="text/javascript">
	        function previewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("schLogo").files[0]);

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
	margin-left: ;
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
<div class="container">
<h3 class="text-center"><?php echo $sch_name; ?> Details 1 </h3>
<?php
?>
 
    <div class="justify-content-center" style="">

    <?php //while($row = $result->fetch_assoc()):?>
        <div><strong style="color:#000;">School Name: </strong><?php echo $sch_name; ?></div></br>
        <div><strong style="color:#000;">School Name 2:</strong> <?php echo $sch_name2; ?></div></br>
        <div><strong style="color:#000;">School First Phone Number:</strong> <?php echo $sch_phone; ?></div></br>
        <div><strong style="color:#000;">School Second Phone Number:</strong> <?php echo $sch_phone2; ?></div></br>
        <div><strong style="color:#000;">School Email: </strong><?php echo $sch_email; ?></div></br>
        <div><strong style="color:#000;">Facebook link: </strong><?php echo $sch_facebook; ?></div></br>
        <div><strong style="color:#000;">Whatsapp link: </strong><?php echo $sch_whatsapp; ?></div></br>
        <div><strong style="color:#000;">Instagram link: </strong><?php echo $sch_instagram; ?></div></br>
        <div><strong style="color:#000;">Twitter link: </strong><?php echo $sch_twitter; ?></div></br>
        <div><strong style="color:#000;">School Address: </strong><?php echo $sch_address; ?></div></br>
      
        <a href="edit_sch_details.php?edit=<?php echo $id; ?>" class="btn btn-info">Edit</a>
</div>

<br><br><br>
<div class="container" style="margin-bottom:150px;">
         
          <?php
        //display on the gallery page
        $res =$conn->query("SELECT * FROM school_logo");
		while($row = $res->fetch_array())
		{
          ?> 
          <span class="image" style="float:left; margin-right:20px;">
            <img class="pic" src="<?php echo  $row['image']; ?>"><br>
            <strong><?php echo $row['blog_header'];?></strong>
    <a style="font-size:12px;" href="sch_details.php?deleteImg=<?php echo  $row['logo_id']; ?>" class="btn btn-danger">Delete</a>
        </span>
        <?php
		}
		?>
</div>

    <br><br><br>


    <div class="justify-content-center" style="margin-top: 20px;">
    <form action="sch_details.php" method="POST" >
    <div style="border: 1px solid black; border-radius:15px; padding:20px;">
    <!--hidden message for update-->
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <!--end of hidden mesage-->
    <div class="form-group" style="width: 90%; margin:0 auto;">
    <label for="">School Name</label>
        <input type="text" class="form-control" value="<?php echo $sch_name; ?>" 
        placeholder="School Name..." name="sch_name"/>
    </div>

    <div class="form-group" style="width: 90%;  margin:0 auto;">
        <label for="">School Name Font</label>
        <select class="form-control" required name="sch_name_font" value="<?php echo $sch_name_font?>" id="">
            <option style="font-family:Lucida Sans Unicode;" value="Lucida Sans Unicode">Lucida Sans Unicode</option>
            <option style="font-family:Lucida Sans;" value="Lucida Sans">Lucida Sans</option>
            <option style="font-family:Lucida Sans Regular;" value="Lucida Sans Regular">Lucida Sans Regular</option>
            <option style="font-family:Monospace;" value="Monospace">Monospace</option>
            <option style="font-family:Segoe UI;" value="Segoe UI">Segoe UI</option>
            <option style="font-family:Tahoma;" value="Tahoma">Tahoma</option>
            <option style="font-family:Times;" value="Times">Times</option>
            <option style="font-family:Lucida Calligraphy;" value="Lucida Calligraphy">Lucida Calligraphy</option>
            <option style="font-family:sans-serif;" value="sans-serif">sans-serif</option>
            <option style="font-family:Verdana;" value="Verdana">Verdana</option>
            <option style="font-family:inherit;" value="inherit">inherit</option>
            <option style="font-family:Georgia;" value="Georgia">Georgia</option>
            <option style="font-family:Cambria;" value="Cambria">Cambria</option>
            <option style="font-family:Time New Roman;" value="Time New Roman">Time New Roman</option>
            <option style="font-family:Franklin Gothic Medium;" value="Franklin Gothic Medium">Franklin Gothic Medium</option>
            <option style="font-family:Courier New;" value="Courier New">Courier New</option>
            <option style="font-family:Cursive;" value="Cursive">Cursive</option>
            <option style="font-family:Gill sans MT;" value="Gill sans MT">Gill sans MT</option>
            <option style="font-family:Cochin;" value="Cochin">Cochin</option>
            <option style="font-family:Unset;" value="Unset">Unset</option>
            <option style="font-family:Algerian;" value="Algerian">Algerian</option>
            <option style="font-family:Apple-system;" value="Apple-system">Apple-system</option>
            <option style="font-family:Geneva;" value="Geneva">Geneva</option>
            <option style="font-family:Haettenschweiler;" value="Haettenschweiler">Haettenschweiler</option>
            <option style="font-family:Calibri;" value="Calibri">Calibri</option>
            <option style="font-family:Italics;" value="Italics">Italics</option>
            <option style="font-family:Arial Narrow Bold;" value="Arial Narrow Bold">Arial Narrow Bold</option>
        </select>
    </div>

    <div class="form-group" style="width: 90%;  margin:0 auto;">
        <label for="">School Text-color</label>
        <select class="form-control" name="sch_name_col" value="<?php echo $sch_name_col?>" id="">
            <option style="background-color:#0c2b4b;" value="#0c2b4b">DeepBlue</option>
            <option style="background-color:#8b008b;" value="#8b008b">DarkMagenta</option>
            <option style="background-color:#ffffff;" value="#ffffff">White</option>
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
            <option style="background-color:#000000;" value="#000000">Black</option>
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
<hr>

    <div class="form-group" style="width: 90%; margin:0 auto;">
        <label for="">School Motto</label>
        <input type="text" class="form-control" value="<?php echo $sch_name2; ?>"
         placeholder="School Motto..." name="sch_name2">
    </div>

    <div class="form-group" style="width: 90%;  margin:0 auto;">
        <label for="">School Motto Font </label>
        <select class="form-control" required name="sch_name_font_2" value="<?php echo $sch_name_font_2?>" id="">
            <option style="font-family:Lucida Sans Unicode;" value="Lucida Sans Unicode">Lucida Sans Unicode</option>
            <option style="font-family:Lucida Sans;" value="Lucida Sans">Lucida Sans</option>
            <option style="font-family:Lucida Sans Regular;" value="Lucida Sans Regular">Lucida Sans Regular</option>
            <option style="font-family:Monospace;" value="Monospace">Monospace</option>
            <option style="font-family:Segoe UI;" value="Segoe UI">Segoe UI</option>
            <option style="font-family:Tahoma;" value="Tahoma">Tahoma</option>
            <option style="font-family:Times;" value="Times">Times</option>
            <option style="font-family:Lucida Calligraphy;" value="Lucida Calligraphy">Lucida Calligraphy</option>
            <option style="font-family:sans-serif;" value="sans-serif">sans-serif</option>
            <option style="font-family:Verdana;" value="Verdana">Verdana</option>
            <option style="font-family:inherit;" value="inherit">inherit</option>
            <option style="font-family:Georgia;" value="Georgia">Georgia</option>
            <option style="font-family:Cambria;" value="Cambria">Cambria</option>
            <option style="font-family:Time New Roman;" value="Time New Roman">Time New Roman</option>
            <option style="font-family:Franklin Gothic Medium;" value="Franklin Gothic Medium">Franklin Gothic Medium</option>
            <option style="font-family:Courier New;" value="Courier New">Courier New</option>
            <option style="font-family:Cursive;" value="Cursive">Cursive</option>
            <option style="font-family:Gill sans MT;" value="Gill sans MT">Gill sans MT</option>
            <option style="font-family:Cochin;" value="Cochin">Cochin</option>
            <option style="font-family:Unset;" value="Unset">Unset</option>
            <option style="font-family:Algerian;" value="Algerian">Algerian</option>
            <option style="font-family:Apple-system;" value="Apple-system">Apple-system</option>
            <option style="font-family:Geneva;" value="Geneva">Geneva</option>
            <option style="font-family:Haettenschweiler;" value="Haettenschweiler">Haettenschweiler</option>
            <option style="font-family:Calibri;" value="Calibri">Calibri</option>
            <option style="font-family:Italics;" value="Italics">Italics</option>
            <option style="font-family:Arial Narrow Bold;" value="Arial Narrow Bold">Arial Narrow Bold</option>
        </select>
    </div>

    <div class="form-group" style="width: 90%;  margin:0 auto;">
        <label for="">School Motto Text-color </label>
        <select class="form-control" name="sch_name_col_2" value="<?php echo $sch_name_col_2?>" id="">
            <option style="background-color:#0c2b4b;" value="#0c2b4b">DeepBlue</option>
            <option style="background-color:#8b008b;" value="#8b008b">DarkMagenta</option>
            <option style="background-color:#ffffff;" value="#ffffff">White</option>
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
            <option style="background-color:#000000;" value="#000000">Black</option>
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
<hr>

    <div class="form-group" style="width: 90%; margin:0 auto;">
        <label for="">School Phone Number</label>
        <input type="number" class="form-control" value="<?php echo $sch_phone; ?>"
         placeholder="School Phone Number" name="sch_phone"/>
    </div>

    
    <div class="form-group" style="width: 90%; margin:0 auto;">
        <label for="">School Second Phone Number</label>
        <input type="number" class="form-control" value="<?php echo $sch_phone2; ?>"
         placeholder="School Phone Number" name="sch_phone2"/>
    </div>

    <div class="form-group" style="width: 90%; margin:0 auto;">
        <label for="">School Email</label>
        <input type="email" class="form-control" value="<?php echo $sch_email; ?>"
         placeholder="School Email" name="sch_email"/>
    </div>

    <div class="form-group" style="width: 90%; margin:0 auto;">
        <label for="">School Facebook link</label>
        <input type="text" class="form-control" value="<?php echo $sch_facebook; ?>"
         placeholder="School Facebook Link..." name="sch_facebook"/>
    </div>

    <div class="form-group" style="width: 90%; margin:0 auto;">
        <label for="">School Twitter link</label>
        <input type="text" class="form-control" value="<?php echo $sch_twitter; ?>"
         placeholder="School Twitter Link" name="sch_twitter"/>
    </div>

    <div class="form-group" style="width: 90%; margin:0 auto;">
        <label for="">School Instagram link</label>
        <input type="text" class="form-control" value="<?php echo $sch_instagram; ?>"
         placeholder="School Instagram Link" name="sch_instagram"/>
    </div>

    <div class="form-group" style="width: 90%; margin:0 auto;">
        <label for="">School Whatsapp link</label>
        <input type="text" class="form-control" value="<?php echo $sch_whatsapp; ?>"
         placeholder="School Whatsapp Link" name="sch_whatsapp"/>
    </div>

    <div class="form-group" style="width: 90%; margin:0 auto;">
        <label for="">School Address</label>
        <input type="text" class="form-control" value="<?php echo $sch_address; ?>"
         placeholder="School Location " name="sch_address"/>
    </div>
    
    <div class="form-group" style="width: 90%;  margin:0 auto;">
    <?php
        if ($update == true):
    ?>
        <button type="submit" class="btn btn-info" name="update">Update</button>
        <?php else: ?>   
        <button type="submit" class="btn btn-primary" name="save">Save</button>
        <?php endif ?>
    </div>
        </div>
    </form>
    </div>
    </div>
    <br><br><br>

    

    <div class="justify-content-center" style="margin-top: 20px; max-width:80%; margin:0 auto;">
    <form action="sch_details.php" method="POST" enctype="multipart/form-data">
<div style="border: 1px solid black; border-radius:15px; padding:20px;">
<br><br>
    <!--hidden message for update-->
    <input type="hidden" name="logo_id" value="<?php echo $logo_id; ?>">
    <!--end of hidden mesage-->
<div>
    <div class="form-group" style="width: 50%; margin:0 auto;">
        <img id="uploadPreview" src="../images/avatar.png" class="avatar"><br>
        <input type="file" id="schLogo" style="width:100%;" name="sch_logo"  required class="btn btn-primary" 
        accept="jpg, jpeg, png" onchange="previewImage();" value="<?php echo $sch_logo?>" />     
    </div>

    <div class="form-group" style="width: 80%; margin:0 auto;">
    <label for="">Max Width</label>
        <input type="number" min="50" required max="400" class="form-control"
        value="<?php echo $logo_width?>" placeholder="0" name="logo_width">
    </div>

    <div class="form-group" style="width: 80%; margin:0 auto;">
    <label for="">Max Height</label>
        <input type="number" min="50" required max="400" class="form-control"
        value="<?php echo $logo_height?>" placeholder="0" name="logo_height">
    </div>


    <div class="form-group" style="width: 50%;  margin:0 auto;">
    <?php
        if ($update == true):
    ?>
        <button type="submit" class="btn btn-info" name="update">Update</button>
        <?php else: ?>   
        <button type="submit"style="margin-top: 10px;" class="btn btn-primary" name="submit">Publish</button>
        <?php endif ?>
    </div>
    
    </form>
    </div>
    </div>
    </div>
    
 
<br><br><br>
    <?php include "footer.php";?>


