<?php
 require '../config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Token</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <?php include "header.php" ;?>
    <?php include "admin_navbar.php" ;?>
    
    <!-- END nav -->
</head>
<body>


    <div class="ftco-animate col-lg-6 mt-5" style="margin:0 auto;">
        <h4 class="text-center alert alert-info">Create registration token for my Staffs</h4>
       <form action="teach_details.php" method="post">
       <div class="form-group">
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
            <div class="form-group">
                <label for="">First Name :</label>
                <input type="text" class="form-control" name="name" placeholder="Your first name" required/>
            </div>

            <div class="form-group">
                <label for="">Surname :</label>
                <input type="text" class="form-control" name="surname" placeholder="Your surname" required/>
            </div>
            
            <div class="form-group">
                <label for="">Email Address :</label>
                <input type="email" class="form-control" name="email" placeholder="Your Email address" required/>
            </div>

            <div class="form-group">
                    </i> <label for="password">Select Post</label>
                        <select class="form-control" name="position" required>
                            <option value="Proprietor">Proprietor</option>
                            <option value="Principal">Principal</option>
                            <option value="Vice Principal">Vice Principal</option>
                            <option value="Head Teacher">Head Teacher</option>
                            <option value="Teacher">Teacher</option>
                        </select>
                    </div>
                    

            <div class="form-group" style="margin: 0 auto; margin-top:10px;">
                <button name="submit" class="btn btn-primary">Proceed >></button>
                <a href="admin_nav.php" class="btn btn-danger">Cancel <<</a> 
            </div>
        </form>
    </div><br><br>
<section>
    <?php include "footer.php";?>
</section>