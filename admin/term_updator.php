<?php
include "../config/db.php";
$result = $conn->query("SELECT * FROM school_term");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $sch_name; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include "header.php"; ?>
    <?php include "admin_navbar.php"; ?>


    <!-- END nav -->
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="col-lg-12 ftco-animate " style="margin-bottom:20px;
                padding:10px; border-radius:20px; border-bottom: 2px solid <?php echo $header_col; ?>;
                    box-shadow:grey 1px 5px 10px 0px;">
                    <h5 class="text-center alert alert-info">Current Session and Term</h5>
                    <div class="row">
                        <div class="col-lg-7">
                            <form action="curr_term.php" method="POST">
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Current session</th>
                                            <th>Current Term</th>
                                        </tr>
                                    </thead>

                                    <?php while ($row = $result->fetch_assoc()) : ?>
                                        <tr>
                                            <td><strong><?php echo $row['session']; ?></strong></td>
                                            <td><strong><?php echo $row['sch_term']; ?></strong></td>
                                        </tr>
                                    <?php endwhile; ?>
                                </table>
                        </div>

                        <div class="col-lg-5">
                            <div class="form-group">
                                <select name="session" class="form-control" required>
                                    <option value="">Select Session</option>
                                    <?php
                                    $query = $conn->query("SELECT * FROM sch_session");
                                    while ($row = $query->fetch_assoc()) {
                                    ?>
                                        <option value="<?php echo $row['session']; ?>"><?php echo $row['session'];
                                                                                    } ?></option>
                                </select>
                            </div>


                            <div class="form-group">
                                <select name="sch_term" class="form-control" required>
                                    <option value="<?php echo $sch_term; ?>">Select Term</option>
                                    <option value="First Term">First Term</option>
                                    <option value="Second Term">Second Term</option>
                                    <option value="Third Term">Third Term</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div align="right" class="mt-3">
                        <button type="submit" class="btn btn-primary" name="update_period">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>


            <div class="col-lg-6">
                <div class="col-lg-12 ftco-animate" style="margin-bottom:20px;
            padding:10px; border-radius:20px; border-bottom: 2px solid <?php echo $header_col; ?>;
                box-shadow:grey 1px 5px 10px 0px;">
                    <h5 class="text-center alert alert-info">Add Class</h5>
                    <div class="row">
                        <div class="col-lg-6 Scrollbar" style="height:300px;">
                            <table class="table table-responsive table-striped">
                                <thead>
                                    <th>Class</th>
                                    <th></th>
                                </thead>
                                <?php
                                $class = $conn->query("SELECT * FROM class_tbl");
                                while ($row = $class->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['class']; ?></td>
                                        <td>
                                            <a style="font-size:12px;" href="curr_term.php?delete_class=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </div>

                        <div class="col-lg-6">
                            <form action="curr_term.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <div class="form-group">
                                    <select name="class" class="form-control" required>
                                        <option value="<?php echo $sch_term; ?>">Select Class</option>
                                        <option value="Daycare">Daycare</option>
                                        <option value="Creche">Creche</option>
                                        <option value="Kindergaten-I">Kindergaten-I</option>
                                        <option value="Kindergaten-II">Kindergaten-II</option>
                                        <option value="Nursery-I">Nursery-I</option>
                                        <option value="Nursery-II">Nursery-II</option>
                                        <option value="Primary-1">Primary-1</option>
                                        <option value="Primary-2">Primary-2</option>
                                        <option value="Primary-3">Primary-3</option>
                                        <option value="Primary-4">Primary-4</option>
                                        <option value="Primary-5">Primary-5</option>
                                        <option value="JSS-1">JSS-1</option>
                                        <option value="JSS-2">JSS-2</option>
                                        <option value="JSS-3">JSS-3</option>
                                        <option value="SSS-1">SSS-1</option>
                                        <option value="SSS-2">SSS-2</option>
                                        <option value="SSS-3">SSS-3</option>
                                    </select>
                                </div>

                                <div class="form-group" align="right">
                                    <button type="submit" class="btn btn-primary" name="save_class">Add Class</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="col-lg-12 ftco-animate" style="margin-bottom:20px;
            padding:10px; border-radius:20px; border-bottom: 2px solid <?php echo $header_col; ?>;
                box-shadow:grey 1px 5px 10px 0px;">
                    <h5 class="text-center alert alert-info">Add Session</h5>
                    <div class="row">
                        <div class="col-lg-6 Scrollbar" style="height:300px;">
                            <table class="table table-responsive table-striped">
                                <thead>
                                    <th>Class</th>
                                    <th></th>
                                </thead>
                                <?php
                                $class = $conn->query("SELECT * FROM sch_session");
                                while ($row = $class->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['session']; ?></td>
                                        <td>
                                            <a style="font-size:12px;" href="curr_term.php?delete_session=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </div>

                        <div class="col-lg-6">
                            <form action="curr_term.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <div class="form-group">
                                    <div class="form-group" style="max-width: 90%; ">
                                        <input type="text" class="form-control" name="session" placeholder="New session" required>
                                    </div>
                                </div>


                                <div align="right">
                                    <button type="submit" class="btn btn-primary" name="add_session">Add Session</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <section>
        <?php include "footer.php"; ?>
    </section>