<?php
include "config/db.php";
$errors = array();
$username = "";
$fullname = "";
$class = "";
$reference = "";
$email = "";
$day = "";
$password = "";
$firstname = "";
$pname = "";
$surname = "";
$reg_date = "";
$phone = "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $sch_name; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php include "header.php"; ?>
    <?php include "navbar.php"; ?>
    <!-- END nav -->
    <h3 class="text-center">Welcome to <?php echo $sch_name ?></h3>
    <h4 class="text-center"><?php echo $sch_name2 ?></h4>
    <marquee direction="right" style="margin-top:25px;font-size:20px;">
        <p><strong>Current Term:</strong> <?php echo $current_term; ?></p>
    </marquee>
    <div class="container ftco-animate">
        <div class="row">
            <div class="col-md-4 offset-md-4 form-div">
                <form action="controllers/authcontroller.php" method="post">
                    <h3 class="text-center">Student Login</h3>

                    <div class="form-group">
                        <input type="text" name="username" placeholder="Username or Email-ID" value="<?php echo $username; ?>" class="form-control form-control-lg">
                    </div>


                    <div class="form-group">
                        <input type="password" name="password" placeholder="Password" class="form-control form-control-lg">
                    </div>

                    <div class="form-group">
                        <select name="term" class="form-control" required>
                            <option value="<?= $current_term; ?>"><?= $current_term; ?></option>
                            <option value="First Term">First Term</option>
                            <option value="Second Term">Second Term</option>
                            <option value="Third Term">Third Term</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <select name="session" class="form-control" required>
                            <option value="<?= $current_session; ?>"><?= $current_session; ?></option>
                            <?php
                            $query = $conn->query("SELECT * FROM sch_session");
                            while ($row = $query->fetch_assoc()) {
                            ?>
                                <option value="<?php echo $row['session']; ?>"><?php echo $row['session'];
                                                                            } ?></option>
                        </select>
                    </div>


                    <div class="form-group" align="right">
                        <input type="submit" class="btn btn-primary " value="Login" name="login-btn">
                    </div>
                    <p class="text-center">Not yet a member?<a href="signup"> Sign up</a></p>

                    <div style="font-size: 0.8em; text-align: center;">
                        <a href="forgot_password.php">Forgot your password?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <br><br>
    <?php include "footer.php"; ?>