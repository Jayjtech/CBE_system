<?php
require "../config/db.php";
$user_token = $_SESSION['token'];
$name = $_SESSION['name'];

$_SESSION['page'] = "question-uploader";
if (!$_SESSION['token']) {
    $_SESSION['message'] = 'Access denied!';
    $_SESSION['msg_type'] = 'warning';
    $_SESSION['remedy'] = 'Login to continue';
    $_SESSION['msg_type'] = 'Okay';
    header('location:admin-login');
}
$query = $conn->query("SELECT * FROM $answer_sheet WHERE teacher_token = '$user_token' AND session = '$current_session' ORDER BY class DESC");
$total_result = $query->num_rows;
$query_1 = $conn->query("SELECT * FROM class_tbl");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $sch_name; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php include "header.php"; ?>
    <?php include "admin_navbar.php"; ?>
    <div class="container">
        <span><strong>Academic Period:</strong><?= $current_term; ?> [<?= $current_session; ?>]</span>
        <h5 class="text-center">RESULT SHEET</h5>
        <div class="container mb-5ftco-animate mb-5">
            <?php
            if ($total_result == 0) {
                echo '<div class="alert alert-info">Table is empty!</div>';
            } else {
            ?>
                <table class="table datatable table-responsive table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Class</th>
                            <th>Username</th>
                            <th>Subject</th>
                            <th>CA1 CA2 ASS |TEST</th>
                            <th>OBJ</th>
                            <th>Theory</th>
                            <th>Total</th>
                            <th>Grade</th>
                            <th>Remark</th>
                        </tr>
                    </thead>
                    <?php
                    while ($row = $query->fetch_assoc()) :
                    ?>
                        <tr>
                            <td><?= $row['class']; ?> [<?= $row['session']; ?>]</td>
                            <td><?= $row['username']; ?> [<?= $row['adm_no']; ?>]</td>
                            <td><?= $row['subject']; ?> [<?= $row['course_code']; ?>]</td>
                            <td><?= $row['CA1']; ?> + <?= $row['CA2']; ?> + <?= $row['CA3']; ?> = <?= $row['test']; ?></td>
                            <td><?= $row['obj_score']; ?></td>
                            <td><?= $row['essay_score']; ?></td>
                            <td><?= $row['total']; ?></td>
                            <td><strong style="background:<?= $row['color']; ?>;padding:10px;border-radius:10px;"><?= $row['grade']; ?></strong></td>
                            <td><strong style="background:<?= $row['color']; ?>;padding:10px;border-radius:10px;"><?= $row['remark']; ?></strong></td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            <?php } ?>
        </div>

        <hr>

        <div class="row mb-5">
            <div class="col-lg-8">
                <div class="col-lg-6 ftco-animate" style="overflow-x:auto; margin-bottom:20px;
                padding:10px; border-radius:20px; border-bottom: 2px solid <?php echo $header_col; ?>;
                    box-shadow:grey 1px 5px 10px 0px;">
                    <h5 class="alert alert-info">Upload score sheet(Multiple):</h5>

                    <form action="../export/export.php" method="get">
                        <div class="form-group">
                            <select class="form-control" name="course_code" required>
                                <option value="">Select Course code</option>
                                <?php
                                $sub = $conn->query("SELECT * FROM subject_tbl WHERE user_token = '$user_token'");
                                while ($row = $sub->fetch_assoc()) :
                                    echo '
                                        <option value="' . $row['course_code'] . '">' . $row['subject'] . ' :: ' . $row['course_code'] . '';

                                endwhile;
                                echo '
                                </option>';
                                ?>
                            </select>
                        </div>
                        <input type="hidden" name="table" value="<?= $answer_sheet; ?>">
                        <div class="form-group">
                            <button type="submit" class="btn btn-light">Download Format <span class="icon-download"></span></button>
                        </div>
                    </form>
                    <hr>
                    <hr>
                    <form action="result_pro.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Select CSV File:</label>
                            <input class="btn btn-dark" style="width:80%;" type="file" name="file" required />
                        </div>

                        <div align="right">
                            <input type="submit" class="btn btn-success" name="submit" value="Upload">
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="col-lg-12 ftco-animate" style="overflow-x:auto; margin-bottom:20px;
                padding:10px; border-radius:20px; border-bottom: 2px solid <?php echo $header_col; ?>;
                    box-shadow:grey 1px 5px 10px 0px;">
                    <form action="result_pro.php" method="post" enctype="multipart/form-data">
                        <h5 class="text-center alert alert-info">Upload comments and grade for <?= $_SESSION['assignedClass']; ?>:</h5>
                        <a href="../export/export.php?table=evaluation&class=<?= $_SESSION['assignedClass']; ?>">Download format <span class="icon-download"></span></a>
                        <hr>
                        <div class="form-group">
                            <label>Select CSV File:</label>
                            <input class="btn btn-dark" type="file" name="file" required />
                        </div>

                        <div align="right">
                            <input type="submit" class="btn btn-success" name="comment" value="Upload">
                        </div>
                    </form>
                </div>
            </div>


            <?php if ($_SESSION['position'] == "Principal") { ?>
                <div class="row">
                    <div class="col-lg-6">
                        <!-- PRINCIPAL'S COMMENT -->
                        <div class="ftco-animate" style="overflow-x:auto; margin-bottom:20px;
            padding:10px; border-radius:20px; border-bottom: 2px solid <?php echo $header_col; ?>;
                box-shadow:grey 1px 5px 10px 0px;">
                            <form action="result_pro.php" method="post" enctype="multipart/form-data">
                                <h5 class="text-center alert alert-info">Principal's Comment</h5>
                                <hr>
                                <a href="../export/export.php?table=p_evaluation">Download Format <span class="icon-download"></span></a>

                                <hr>
                                <div class="form-group">
                                    <label>Select CSV File:</label>
                                    <input class="btn btn-primary" type="file" name="file" required />
                                </div>

                                <div align="right">
                                    <input type="submit" class="btn btn-success" name="p-comment" value="Upload">
                                </div>
                            </form>
                        </div>
                    </div>


                    <div class="col-lg-6">
                        <div class="col-lg-8">
                            <div class="ftco-animate" style="overflow-x:auto; margin-bottom:20px;
            padding:10px; border-radius:20px; border-bottom: 2px solid <?php echo $header_col; ?>;
                box-shadow:grey 1px 5px 10px 0px;">
                                <form action="result_pro.php" method="post" enctype="multipart/form-data">
                                    <h5 class="text-center alert alert-info">Result checker pin for <?= $current_term; ?> <?= $current_session; ?></h5>
                                    <hr>
                                    <a href="../export/export.php?table=result_checker">Download Format <span class="icon-download"></span></a>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            <?php } ?>


        </div>
    </div>
    <?php include "footer.php"; ?>