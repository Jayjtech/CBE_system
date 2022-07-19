<?php
include '../config/db.php';
if (isset($_GET['user'])) {
    $user = $_GET['user'];
    $reset_key = $_GET['reset'];
    $user_type = base64_decode($_GET['user_type']);
    switch ($user_type) {
        case "student":
            $table = $student_tbl;
            break;
        case "staff":
            $table = $admin_tbl;
            break;
    }
    $check = $conn->query("SELECT * FROM $table WHERE reset='$reset_key'");
    if ($check->num_rows == 0) {
        $_SESSION['message'] = "Reset link has expired";
        $_SESSION['msg_type'] = "warning";
        $_SESSION['remedy'] = "";
        $_SESSION['btn'] = "Okay";
        header('location: ../login');
    }
} else {
    $_SESSION['message'] = "Invalid request";
    $_SESSION['msg_type'] = "error";
    $_SESSION['remedy'] = "Please try again later";
    $_SESSION['btn'] = "Okay";
    header('location: ../login');
}
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
        </ul>
    </div>
    </div>
    </nav>

    <!-- END nav -->
    <div class="ftco-animate container" style="margin-top:50px;">
        <span><strong>Academic Period: </strong><?= $current_term; ?> [<?= $current_session; ?>]</span>

        <div class="row">
            <div class="col-md-4 offset-md-4 form-div">
                <form action="proceed_to_reset" method="post">
                    <h3 class="text-center">Reset Password</h3>
                    <input type="hidden" name="user" value="<?= $user; ?>">
                    <input type="hidden" name="user_type" value="<?= $user_type; ?>">
                    <div class="form-group">
                        <input type="password" name="pswd" placeholder="New password" value="" class="form-control form-control-lg">
                    </div>

                    <div class="form-group">
                        <input type="password" name="rpswd" placeholder="Repeat new password" value="" class="form-control form-control-lg">
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary " value="Reset password" name="reset">
                    </div>

                </form>
            </div>
        </div>
    </div>
    <br><br>
    <?php include "footer.php"; ?>