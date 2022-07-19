<?php
include 'config/db.php';
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Verify Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootsrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="shortcut icon" href="https://maxcdn.bootstrapcdn.com/bootsrap/3.3.6/" type="image/x-icon">
    <?php include "header.php"; ?>
    <?php include "navbar.php"; ?>
    <!-- END nav -->

</head>

<body>

    <section>
        <h1 class="text-center" style="max-width:90%; font-size:25px;">Verify user</h1>
        <div class="col-sm-6 ftco-animate mb-5 mt-2" style="margin:auto;">
            <form action="admin/send_psd_mail.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" value="" name="user" placeholder="Your email address or phone number or Username" required />
                </div>

                <div class="form-group">
                    <input type="submit" name="forgot-password" class="btn btn-primary" value="Verify">
                </div>

            </form>
        </div>
    </section>

    <section>
        <?php include "footer.php"; ?>
    </section>