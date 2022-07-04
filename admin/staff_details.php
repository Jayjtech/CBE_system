<?php
require "../config/db.php";
error_reporting(0);
$result = $conn->query("SELECT * FROM admin_table");
$countRes = $result->num_rows;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/modals.css">
    <link rel="stylesheet" href="css/log.css">
    <script src="js/java.js"></script>
    <?php include "header.php"; ?>

    <?php include "admin_navbar.php"; ?>


    <!-- END nav -->



    <br><br>
    <style>
        .avatar {
            width: 50px;
            height: 50px;
            border: 1px solid green;
            margin-left: px;
            border-radius: 10px;
        }
    </style>




    <h4 class="text-center">Teachers Details</h4>
    <div class="container Scrollbar ftco-animate" style="overflow-x:auto; font-size:15px;">
        <?php
        if ($countRes == 0) {
            echo "<div class='alert alert-danger'>Student's table is Empty!</div>";
        } else {
        ?>
            <a href="student_pro.php?Delete=1" class="btn btn-danger">Delete all</a>
            <table class="table" border="1">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Phone Number</th>
                        <th>Gender</th>
                        <th>Password reset</th>
                        <th>Post</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>


                <?php echo $row['p_image']; ?>
                <?php
                while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td>
                            <form action="edit_staff.php" method="POST">
                                <input type="password" class="form-control" name="pwd" placeholder="New password">
                                <input type="hidden" name="token" class="form-control" value="<?php echo $row['token']; ?>">
                                <input type="hidden" name="email" class="form-control" value="<?php echo $row['email']; ?>">
                                <input type="password" class="form-control" name="Cpwd" placeholder="Confirm password"><br>
                                <input type="submit" name="reset_button" class="btn btn-success" value="Reset">
                            </form>
                        </td>
                        <td><?php echo $row['position']; ?></td>
                        <td>
                            <form action="edit_staff.php" method="post">
                                <input type="hidden" name="token" value="<?php echo $row['token']; ?>">
                                <input class="btn btn-danger" style="font-size:10px;" type="submit" name="pick" value="Delete">
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
    </div>

    <section>
    <?php
        }
        echo "</div>"
    ?>
    <br><br>

    <?php include "footer.php"; ?>