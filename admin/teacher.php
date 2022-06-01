<?php
 require "teach_details.php";
 require "teacher_hd.php";
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


<h3 class="text-center">Upload Teacher's Informations</h3>
<div class="container" style="overflow-x:auto; font-size:12px;">
<table class="table" border="1">
            <thead>
                    <tr>
                        <th>Teacher's Image</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Introduction<th>
                        <th>Facebook Link</th>
                        <th>Instagram Link</th>
                        <th>Whatsapp Link</th>
                        <th colspan="2">Action</th>
                    </tr>
            </thead>

 
       
<?php
$res2 =$conn->query("SELECT * FROM sch_teachers");
while($row = $res2->fetch_assoc()):?>
    <tr>
        <td><img class="pic" src="<?php echo  $row['image']; ?>"></td>
        <td><div style="color:<?php echo  $row['name_col']; ?>;font-family:<?php echo  $row['name_font']; ?>;">
        <?php echo  $row['name']; ?></div></td>
        <td><div style="color:<?php echo  $row['position_col']; ?>;font-family:<?php echo  $row['position_font']; ?>;">
        <?php echo  $row['position']; ?></div></td>
        <td><div style="color:<?php echo  $row['para_color']; ?>;font-family:<?php echo  $row['para_font']; ?>;">
        <?php echo  $row['para']; ?></div></td>
        <td></td>
        <td><?php echo  $row['facebk']; ?></td>
        <td><?php echo  $row['instagram']; ?></td>
        <td><?php echo  $row['whatsapp']; ?></td>
        
        <td>
            <a style="font-size:12px;" href="teacher.php?edit=<?php echo  $row['tch_id']; ?>" class="btn btn-info">Edit</a>
            <a style="font-size:12px;" href="teach_details.php?delete=<?php echo  $row['tch_id']; ?>" class="btn btn-danger">Delete</a>
        </td>
    </tr>
<?php endwhile; ?>
        </table>
    </div>
    


    <div class="justify-content-center" style="margin-top: 20px; max-width:90%; margin:0 auto;">
    <form action="teach_details.php" method="POST" enctype="multipart/form-data">
<div style="border: 1px solid black; border-radius:15px; padding:20px;">
<br><br>
    <!--hidden message for update-->
    <input type="hidden" name="tch_id" value="<?php echo $tch_id; ?>">
    <!--end of hidden mesage-->
<div class="row">
<!-- BEGINNING OF ROW -->
    <div class="form-group col-lg-5" >
        <img id="uploadPreview" width=400 height=150 src="../images/avatar.png" class="avatar">
    </div>
    <div class="form-group col-lg-4" >
        <input type="file" style="width:100%;" id="teach_img" name="image"  required class="btn btn-primary" 
        accept="jpg, jpeg, png" onchange="previewImage();" value="<?php echo $image?>" />     
    </div>
</div>

<div class="row">
<!-- BEGINNING OF ROW -->
    <div class="form-group col-lg-4">
        <label for="">Teacher's Name</label>
        <input required class="form-control" placeholder="Teacher's Name..."
         name="name" value="<?php echo $name; ?>"/>
         
    </div>

    <div class="form-group col-lg-4" >
        <label for="">Teacher's Name Font</label>
        <select class="form-control" required name="name_font" value="<?php echo $name_font?>" id="">
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

    <div class="form-group col-lg-4" >
        <label for="">Teacher's Name Color</label>
        <select class="form-control" name="name_col" value="<?php echo $name_col?>">
            <option style="background-color:#d3d3d3;" value="#d3d3d3">LightGrey</option>
            <option style="background-color:#ffb6c1;" value="#ffb6c1">LightPink</option>
            <option style="background-color:#8b008b;" value="#8b008b">DarkMagenta</option>
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

  

 

    <div class="form-group col-lg-4 col-lg-4" >
        <label for="">Teacher's Position</label>
        <input class="form-control" value="<?php echo $position?>"
         placeholder=" Write teacher's position here..."
        name="position">
         
    </div>

    <div class="form-group col-lg-4 col-lg-4" >
        <label for="">Position Font</label>
        <select class="form-control" required name="position_font" value="<?php echo $position_font?>">
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

    <div class="form-group col-lg-4" >
        <label for="">Position Text Color</label>
        <select class="form-control" name="position_col" value="<?php echo $position_col?>">
            <option style="" value="">Text-Color</option>
            <option style="background-color:#d3d3d3;" value="#d3d3d3">LightGrey</option>
            <option style="background-color:#ffb6c1;" value="#ffb6c1">LightPink</option>
            <option style="background-color:#8b008b;" value="#8b008b">DarkMagenta</option>
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

    <div class="form-group col-lg-4" >
        <label for="">Teacher's Introduction</label>
        <input class="form-control" value="<?php echo $para?>"
         placeholder=" Write about teacher here..."
        name="para">
         
    </div>

    <div class="form-group col-lg-4" >
        <label for="">Introduction Font</label>
        <select class="form-control" required name="para_font" value="<?php echo $para_font?>">
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

    <div class="form-group col-lg-4" >
        <label for="">Introduction Text Color</label>
        <select class="form-control" name="para_color" value="<?php echo $para_color?>">
            <option style="" value="">Text-Color</option>
            <option style="background-color:#d3d3d3;" value="#d3d3d3">LightGrey</option>
            <option style="background-color:#ffb6c1;" value="#ffb6c1">LightPink</option>
            <option style="background-color:#8b008b;" value="#8b008b">DarkMagenta</option>
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

    <div class="form-group col-lg-4" >
        <label for="">Teacher's Facebook Link(URL)</label>
        <input class="form-control" value="<?php echo $facebk?>"
         placeholder=" Write the link here..."
        name="facebk">
         
    </div>

    <div class="form-group col-lg-4" >
        <label for="">Teacher's Instagram Link(URL)</label>
        <input class="form-control" value="<?php echo $instagram?>"
         placeholder=" Write the link here..."
        name="instagram">
         
    </div>

    <div class="form-group col-lg-4" >
        <label for="">Teacher's Twitter Link(URL)</label>
        <input class="form-control" value="<?php echo $twitter?>"
         placeholder=" Write the link here..."
        name="twitter">
         
    </div>

    <div class="form-group col-lg-4">
    <?php
        if ($update == true):
    ?>
        <button type="submit" class="btn btn-info" name="update">Update</button>
        <?php else: ?>   
        <button type="submit"style="margin-top: 10px;" class="btn btn-primary" name="save">Save</button>
        <?php endif ?>
    </div>
    <!-- END OF ROW -->
</div>
    </form>
    </div>
    </div>
    
</div>

<br><br><br>


<h3 class="text-center">Edit Teacher Header</h3>
<div class="container" style="font-size:12px;">
<?php
$result =$conn->query("SELECT * FROM teacher_hd");
while($row = $result->fetch_assoc()):?>
Header 1 : <?php echo $row['hed_1']; ?><br>
Header 1 font : <?php echo $row['hed_1_font']; ?><br>
header 2 : <?php echo $row['hed_2']; ?><br>
Header 2 font : <?php echo $row['hed_2_font']; ?><br>
Paragraph : <?php echo $row['para']; ?><br>
Paragraph font : <?php echo $row['para_font']; ?> <br> 
<div class="row">
<!-- BEGINNING OF ROW -->        
<div class="col-lg-3">Header 1 color : <div class="col-sm-4" 
style="width:30px; height:30px; background:<?php echo  $row['hed_1_col']; ?>; border:1px solid black;"></div></div>
<div class="col-lg-3">Header 2 color : <div class="col-sm-4" 
style="width:30px; height:30px; background:<?php echo  $row['hed_2_col']; ?>; border:1px solid black;"></div></div>
<div class="col-lg-3">Paragraph color : <div class="col-sm-4" 
style="width:30px; height:30px; background:<?php echo  $row['para_col']; ?>; border:1px solid black;"></div></div>
<div class="col-lg-3">Background color : <div class="col-sm-4" 
style="width:30px; height:30px; background:<?php echo  $row['bg_col']; ?>; border:1px solid black;"></div></div>
</div>
<br><br>
<a style="font-size:12px;" href="teacher.php?edit=<?php echo  $row['tchd_id']; ?>" class="btn btn-info">Edit</a>
<a style="font-size:12px;" href="teacher_hd.php?delete=<?php echo  $row['tchd_id']; ?>" class="btn btn-danger">Delete</a>
<br><br><br>
      
<?php endwhile; ?>
    </div>
    


    <div class="justify-content-center" style="margin-top: 20px; max-width:90%; margin:0 auto;">
    <form action="teacher_hd.php" method="POST" enctype="multipart/form-data">
<div style="border: 1px solid black; border-radius:15px; padding:20px;">
<br><br>
    <!--hidden message for update-->
    <input type="hidden" name="tchd_id" value="<?php echo $tchd_id; ?>">
    <!--end of hidden mesage-->
<div>
<div class="row">
<!-- BEGINNING OF ROW -->
    <div class="form-group col-lg-4">
        <label for="">Header One</label>
        <input required class="form-control" placeholder=" Type Header One..."
         name="hed_1" value="<?php echo $hed_1; ?>"/>
         
    </div>

    <div class="form-group col-lg-4">
        <label for="">Header 1 Font</label>
        <select class="form-control" required name="hed_1_font" value="<?php echo $hed_1_font?>" id="">
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

    <div class="form-group col-lg-4">
        <label for="">Header 1 Color</label>
        <select class="form-control" name="hed_1_col" value="<?php echo $hed_1_col?>" id="">
        <option style="background-color:#000000;" value="#000000">Black</option>
            <option style="background-color:#d3d3d3;" value="#d3d3d3">LightGrey</option>
            <option style="background-color:#ffb6c1;" value="#ffb6c1">LightPink</option>
            <option style="background-color:#8b008b;" value="#8b008b">DarkMagenta</option>
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

  

 

    <div class="form-group col-lg-4">
        <label for="">Header 2</label>
        <input class="form-control" value="<?php echo $hed_2?>"
         placeholder=" Write header 2 here..."
        name="hed_2">
         
    </div>

    <div class="form-group col-lg-4">
        <label for="">Header 2 Font</label>
        <select class="form-control" required name="hed_2_font" value="<?php echo $hed_2_font?>">
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

    <div class="form-group col-lg-4">
        <label for="">Header 2 Text Color</label>
        <select class="form-control" name="hed_2_col" value="<?php echo $hed_2_col?>">
            <option style="" value="">Text-Color</option>
            <option style="background-color:#000000;" value="#000000">Black</option>
            <option style="background-color:#d3d3d3;" value="#d3d3d3">LightGrey</option>
            <option style="background-color:#ffb6c1;" value="#ffb6c1">LightPink</option>
            <option style="background-color:#8b008b;" value="#8b008b">DarkMagenta</option>
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

    <div class="form-group col-lg-4">
        <label for="">Paragraph</label>
        <input class="form-control" value="<?php echo $para?>"
         placeholder=" Write about teacher here..."
        name="para">
         
    </div>

    <div class="form-group col-lg-4">
        <label for="">Paragraph Font</label>
        <select class="form-control" required name="para_font" value="<?php echo $para_font?>">
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

    <div class="form-group col-lg-4">
        <label for="">Paragraph Text Color</label>
        <select class="form-control" name="para_col" value="<?php echo $para_col?>">
            <option style="" value="">Text-Color</option>
            <option style="background-color:#d3d3d3;" value="#d3d3d3">LightGrey</option>
            <option style="background-color:#ffb6c1;" value="#ffb6c1">LightPink</option>
            <option style="background-color:#8b008b;" value="#8b008b">DarkMagenta</option>
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

    <div class="form-group col-lg-4">
        <label for="">Background Color</label>
        <select class="form-control" name="bg_col" value="<?php echo $bg_col?>">
            <option style="" value="">Text-Color</option>
            <option style="background-color:#d3d3d3;" value="#d3d3d3">LightGrey</option>
            <option style="background-color:#ffb6c1;" value="#ffb6c1">LightPink</option>
            <option style="background-color:#8b008b;" value="#8b008b">DarkMagenta</option>
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

    

    <div class="form-group col-lg-4">
    <?php
        if ($update == true):
    ?>
        <button type="submit" class="btn btn-info" name="update">Update</button>
        <?php else: ?>   
        <button type="submit"style="margin-top: 10px;" class="btn btn-primary" name="save">Save</button>
        <?php endif ?>
    </div>
</div>
    </form>
    </div>
    </div>
    
</div>

<br><br><br>


<section class="" style="float:right; width:100%;">
<?php include "footer.php"; ?>
  </section>
