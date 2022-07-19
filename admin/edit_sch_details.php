<?php
require "../config/db.php";
$position = "Proprietor";
if ($_SESSION['position'] != $position) {
    $_SESSION['message'] = 'Access denied!';
    $_SESSION['msg_type'] = 'warning';
    $_SESSION['remedy'] = 'Login to continue';
    $_SESSION['msg_type'] = 'Okay';
    header('location: admin-login');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>School Details</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include "header.php"; ?>
    <?php include "admin_navbar.php"; ?>
    </div>
    </nav>
    <!-- END nav -->

    <div class="container mb-5">
        <span><strong>Academic Period:</strong><?= $current_term; ?> [<?= $current_session; ?>]</span>
        <h3 class="text-center"><?php echo $sch_name; ?> Details</h3>

        <div class="container ftco-animate">
            <form action="sch_details" method="post" enctype="multipart/form-data">
                <div class="row">
                    <h5>Ownership:</h5>
                    <div class="row mb-3 col-12">
                        <div class="col-sm-6 input-group">
                            <span class="input-group-text">SCHOOL NAME</span>
                            <input type="text" class="form-control" name="sch_name" value="<?= $sch_name; ?>" required>
                        </div>

                        <div class="col-sm-6 input-group">
                            <span class="input-group-text">SCHOOL MOTTO</span>
                            <input type="text" class="form-control" name="sch_name2" value="<?= $sch_name2; ?>" required>
                        </div>
                    </div>

                    <div class="row mb-3 col-12">
                        <div class="col-sm-6 input-group">
                            <span class="input-group-text">SCHOOL PHONE NO.</span>
                            <input type="number" class="form-control" value="<?= $sch_phone; ?>" name="sch_phone" required>
                        </div>

                        <div class="col-sm-6 input-group">
                            <span class="input-group-text">WHATSAPP NO.</span>
                            <input type="number" class="form-control" value="<?= $sch_phone2; ?>" name="sch_phone2" required>
                        </div>
                    </div>

                    <div class="row mb-3 col-12">
                        <div class="col-sm-6 input-group">
                            <span class="input-group-text">SCHOOL EMAIL-ID.</span>
                            <input type="email" class="form-control" value="<?= $sch_email; ?>" name="sch_email" required />
                        </div>

                        <div class="col-sm-6 input-group">
                            <span class="input-group-text">FACEBOOK URL</span>
                            <input type="text" class="form-control" value="<?= $sch_facebook; ?>" name="sch_facebook" />
                        </div>
                    </div>
                    <div class="row mb-3 col-12">
                        <div class="col-sm-6 input-group">
                            <span class="input-group-text">INSTAGRAM URL</span>
                            <input type="text" class="form-control" value="<?= $sch_instagram; ?>" name="sch_instagram" />
                        </div>

                        <div class="col-sm-6 input-group">
                            <span class="input-group-text">TWITTER URL</span>
                            <input type="text" class="form-control" value="<?= $sch_twitter; ?>" name="sch_twitter" />
                        </div>
                    </div>

                    <div class="row mb-3 col-12">
                        <div class="col-sm-12 input-group">
                            <span class="input-group-text">SCHOOL ADDRESS</span>
                            <textarea class="form-control" cols="30" rows="2" name="sch_address" required><?= $sch_address; ?></textarea>
                        </div>
                    </div>

                    <h5>User Interface:</h5>

                    <div class="row mb-3 col-12">
                        <div class="col-sm-6 input-group">
                            <span class="input-group-text">HEADER/FOOTER COLOR</span>
                            <input type="color" class="form-control" value="<?= $header_col; ?>" name="header_col" />
                        </div>

                        <div class="col-sm-6 input-group">
                            <span class="input-group-text">HEADER/FOOTER TEXT COLOR</span>
                            <input type="color" class="form-control" value="<?= $header_txt_col; ?>" name="header_txt_col" />
                        </div>
                    </div>

                    <h5>School Logo:</h5>
                    <div class="row mb-3 col-sm-6">
                        <div class="col-sm-6 input-group">
                            <img id="uploadPreview" src="../images/<?php echo !empty($sch_logo) ? $sch_logo : 'logo_default.png'; ?>" class="avatar">
                            <div class="mt-3" align="right">
                                <input type="hidden" name="sch_logo" value="<?= $sch_logo; ?>">
                                <input type="file" id="schLogo" name="sch_logo" class="btn btn-dark" accept="jpg, jpeg, png" onchange="previewImage();" value="<?php echo $sch_logo ?>" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="" align="right">
                    <button type="submit" name="update" class="btn btn-success">Save changes</button>
                </div>
            </form>
        </div>
    </div>




    <?php include "footer.php"; ?>