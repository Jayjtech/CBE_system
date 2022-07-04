<?php
require_once 'config/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $sch_name; ?> Registration page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootsrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="shortcut icon" href="https://maxcdn.bootstrapcdn.com/bootsrap/3.3.6/" type="image/x-icon">
    <link rel="stylesheet" href="css/modals.css">
    <script type="text/javascript">
        function previewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("p_img").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("uploadPreview").src = oFREvent.target.result;
            };
        };
    </script>

    <?php include "header.php"; ?>
    <?php include "navbar.php"; ?>
    <!--end of nav-->

    <div class="container ftco-animate">
        <div class="row">
            <div class="col-lg-9" style="margin:0 auto;">
                <form action="controllers/authcontroller.php" method="post" enctype="multipart/form-data">
                    <h3 class="text-center">Student Registration</h3>

                    <?php if (count($errors) > 0) : ?>
                        <div class="ftco-animate alert alert-danger">
                            <?php foreach ($errors as $error) : ?>
                                <li><?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <?php
                    if (isset($_SESSION['message'])) : ?>
                        <div class="ftco-animate alert alert-<?= $_SESSION['msg_type'] ?>">
                            <?php
                            echo $_SESSION['message'];
                            unset($_SESSION['message']);
                            ?>
                        </div>
                    <?php endif ?>
                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <img id="uploadPreview" src="images/avatar.png" class="avatar">
                        </div>

                        <div class="col-lg-6 form-group">
                            <input type="file" id="p_img" style="width:100%;" name="p_image" required class="btn btn-primary" accept="jpg, jpeg, png" onchange="previewImage();" value="<?php echo $bg_image ?>" />
                        </div>
                        <div class="col-lg-6 form-group">
                            <input type="text" name="fullname" value="<?php echo $fullname; ?>" placeholder="Full Name..." class="form-control form-control-lg">
                        </div>
                        <div class="col-lg-6 form-group">
                            <input type="text" name="email" value="<?php echo $email; ?>" placeholder="Email..." class="form-control form-control-lg">
                        </div>

                        <div class="col-lg-6 form-group">
                            <input type="text" name="username" value="<?php echo $username; ?>" placeholder="Username..." class="form-control form-control-lg">
                        </div>

                        <div class="col-lg-6 form-group">
                            <input type="tel" name="phone" value="<?php echo $phone; ?>" placeholder="Phone No..." class="form-control form-control-lg">
                        </div>

                        <div class="col-lg-6 form-group">
                            <input type="password" name="password" placeholder="Password..." class="form-control form-control-lg">
                        </div>

                        <div class="col-lg-6 form-group">
                            <input type="password" name="passwordConf" placeholder="Confirm Password" class="form-control form-control-lg">
                        </div>

                        <div class="col-lg-6 form-group">
                            <select name="class" class="form-control" required>
                                <option value="">Class</option><?php
                                                                $class = $conn->query("SELECT * FROM class_tbl");
                                                                while ($row = $class->fetch_assoc()) {
                                                                ?>
                                    <option value="<?php echo $row['class']; ?>"><?php echo $row['class'];
                                                                                } ?></option>
                                    <option value="No, I have not attended any.">No, I have not attended any.</option>
                            </select>
                        </div>

                        <div class="col-lg-6 form-group">
                            <select class="form-control" style="max-width: 80%;" name="gender" required>
                                <option value="">Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 form-group">
                        <input type="submit" class="btn btn-primary " value="Register" name="register">
                    </div>
                    <p class="text-center">Not yet a member?<a href="login"> Login </a></p>
            </div>
            </form>
        </div>
    </div>
    </div>

    <br><br><br>

    <?php include "footer.php"; ?>