<?php
include "../config/db.php";
include "../config/phpmailer/PHPMailerAutoload.php";

if (isset($_POST["forgot-password"])) {
    $user = mysqli_real_escape_string($conn, $_POST['user']);
    /**Check User */
    switch ($_SESSION['user_type']) {
        case "student":
            $table = $student_tbl;
            break;
        case "staff":
            $table = $admin_tbl;
            break;
    }
    $reset_key = rand(1000, 9999);
    $check = $conn->query("SELECT * FROM $table WHERE email = '$user' OR username='$user' OR phone='$user'");
    if ($check->num_rows == 0) {
        $_SESSION['message'] = "User does not exist";
        $_SESSION['msg_type'] = "error";
        $_SESSION['remedy'] = "Enter your correct details";
        $_SESSION['btn'] = "Okay";
        header('location: ../forgot-password');
    } else {
        $row = $check->fetch_assoc();
        $email = $row['email'];
        $name = $row['name'];

        if ($table == $admin_tbl) {
            $user_id = $row['token'];
        } else {
            $user_id = $row['adm_no'];
        }


        $message = '
            <!DOCTYPE html>
                <html>
                    <head>
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                <link rel="stylesheet" href="style.css">
                <style type="text/css" rel="stylesheet" media="all">
                    /* Media Queries */
                    @media  only screen and (max-width: 500px) {
                        .button {
                            width: 100% !important;
                        }
                    }
                </style>
            </head>
            <body style="margin: 0; padding: 0; width: 100%; background-color: rgb(94, 127, 233); color:#fff">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="width: 100%; margin: 0; padding: 0; background-color: rgb(94, 127, 233); color:#fff" align="center">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <!-- Logo -->
                                <tr>
                                    <td style="padding: 25px 0; text-align: center;">
                                        <a style="font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen,
                 Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif; color:#000;" href="' . BASE_URL . '" target="_blank">
                                            <img src="' . BASE_URL . '/admin/images/' . $sch_logo . '" width="100">
                                        </a>
                                    </td>
                                </tr>
                    <tr>
                        <td style="width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;" width="100%">
                            <table style="width: auto; max-width: 570px; margin: 0 auto; padding: 0;" align="center" width="570" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="font-family: Arial, &#039;Helvetica Neue&#039;, Helvetica, sans-serif; padding: 35px;">
                                        <!-- Greeting -->
                                        
                                        <h1 style="margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold;">
                                         Reset Password request
                                        </h1>
                                        
                                        <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                             Your password reset request has been received. Click the Reset Passwrod button below to reset your password.
                                        </p>
                                        

                                        <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;text-align:center;">
                                            <a href="' . BASE_URL . '/admin/reset_password_online?user=' . $user_id . '&user_type=' . base64_encode($_SESSION['user_type']) . '&reset=' . $reset_key . '" style="background:lightGreen;padding:10px;color:black;border-radius:5px;">Reset Password</a>
                                        </p>

                                        <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                           <strong> Regards <br/> ' . $sch_name . ' </strong>
                                        </p>
                                      </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
            
                      <!-- Footer -->
                        <tr>
                            <td>
                                <table style="width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;" align="center" width="570" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td style="font-family: Arial, &#039;Helvetica Neue&#039;, Helvetica, sans-serif; color: #AEAEAE; padding: 35px; text-align: center;">
                                            <p style="margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;">
                                                &copy; ' . date('Y') . ' <a href="' . BASE_URL . '">' . $sch_name . '</a>
                                                All right reserved
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            </table>
            </body>
            </html> 
            ';


        // MAILER
        $mail = new PHPMailer;
        // $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';

        $mail->Username = '' . $mailer_email . '';
        $mail->Password = '' . $mailer_psw . '';

        $mail->setFrom('' . $mailer_email . '', '' . $sch_name . '');
        $mail->addAddress('' . $email . '');
        $mail->addReplyTo('' . $mailer_email . '');

        $mail->isHTML(true);
        $mail->Subject = 'Reset Password';
        $mail->Body = $message;
        if ($mail->send()) {
            if ($_SESSION['user_type'] == "student") {
                $update = $conn->query("UPDATE $student_tbl SET reset='$reset_key' WHERE adm_no = '$user_id'");
            } else {
                $update = $conn->query("UPDATE $admin_tbl SET reset='$reset_key' WHERE token = '$user_id'");
            }
            $_SESSION['message'] = "Request successfully received! Check the mail sent to [$email] to reset your password";
            $_SESSION['msg_type'] = "success";
            $_SESSION['remedy'] = "Check the mail sent to [$email] to reset your password";
            $_SESSION['btn'] = "Okay";
            header('location:../login');
        } else {
            $_SESSION['message'] = "Mail could not be sent to your email";
            $_SESSION['msg_type'] = "error";
            $_SESSION['remedy'] = "Please try again later";
            $_SESSION['btn'] = "Okay";
            header('location:../login');
        }


        // ini_set('display_error', 1);
        // $to = $comp_email;

        // $from = "support@ekreat.com";
        // $subject = 'Manual funding';

        // // To send HTML mail, the Content-type header must be set
        // $headers = 'MIME-Version: 1.0' . "\r\n";
        // $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        // $headers .= "From:" . $from;
        // if (mail($to, $subject, $message, $headers)) {
        //     $_SESSION['message'] = "Request successfully received! Check the mail sent to [$email] to reset your password";
        //     $_SESSION['msg_type'] = "success";
        //     $_SESSION['remedy'] = "Check the mail sent to [$email] to reset your password";
        //     $_SESSION['btn'] = "Okay";
        // } else {
        //     $_SESSION['message'] = "Mail could not be sent to your email";
        // $_SESSION['msg_type'] = "error";
        // $_SESSION['remedy'] = "Please try again later";
        // $_SESSION['btn'] = "Okay";
        // };
    }
}
