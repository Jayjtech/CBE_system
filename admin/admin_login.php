<?php
include '../config/db.php';
$_SESSION['user_type'] = "staff";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $sch_name; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php include "header.php"; ?>
    <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="../login" class="nav-link pl-0">Home</a></li>
            <li class="nav-item active"><a href="admin-signup" class="nav-link pl-0">Staff sign up</a></li>
        </ul>
    </div>
    </div>
    </nav>
    <!-- END nav -->
    <h3 class="text-center">Welcome to <?php echo $sch_name ?></h3>
    <h4 class="text-center"><?php echo $sch_name2 ?></h4>

    <div class="container ftco-animate" style="margin-top:50px;">
        <span><strong>Academic Period:</strong><?= $current_term; ?> [<?= $current_session; ?>]</span>
        <div class="row">
            <div class="col-md-4 offset-md-4 form-div">
                <form action="admin_controller.php" method="POST">
                    <h3 class="text-center">Staff Login</h3>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" value="<?php echo $username; ?>" class="form-control form-control-lg">
                    </div>


                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control form-control-lg">
                    </div>

                    <div class="form-group">
                        <label for="password">Select Post</label>
                        <select class="form-control" name="position" required>
                            <option value="Proprietor">Proprietor</option>
                            <option value="Principal">Principal</option>
                            <option value="Vice Principal">Vice Principal</option>
                            <option value="Head Teacher">Head Teacher</option>
                            <option value="Teacher">Teacher</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <input type="submit" class="btn btn-primary " value="Login" name="login-btn">
                    </div>

                </form>
            </div>
        </div>
        <div style="font-size: 0.8em; text-align: center;">
            <a href="../forgot-password">Forgot your password?</a>
        </div>
    </div>
    <br><br>

    <?php include "footer.php"; ?>