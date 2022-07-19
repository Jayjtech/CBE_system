<?php
include "../config/db.php";
$position = "Proprietor";
if ($_SESSION['position'] != $position) {
    $_SESSION['message'] = 'Access denied!';
    $_SESSION['msg_type'] = 'warning';
    $_SESSION['remedy'] = 'Login to continue';
    $_SESSION['msg_type'] = 'Okay';
    header('location: admin-login');
}


$query = "SELECT * FROM $admin_tbl ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Staff</title>
    <meta charset="utf-8">
    <script src="../js/table.js"></script>
    <link rel="stylesheet" href="../css/maxcdn.bootstrap.css" />
    <script src="../js/cdnDataTable.js"></script>
    <script src="../js/dataTable.js"></script>
    <link rel="stylesheet" href="../css/table.css" />
    <link rel="stylesheet" href="../css/ionicons.min.css">
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/flaticon.css">
    <link rel="stylesheet" href="../css/icomoon.css">

</head>

<body> <br>

    <div class="container" align="right">
        <a href="admin-nav" class="btn btn-danger">Back</a>
    </div>
    <hr>

    <div class="container">
        <span><strong>Academic Period:</strong><?= $current_term; ?> [<?= $current_session; ?>]</span>
        <h3 align="center">Staff</h3>
        <br />
        <div class="container" align="left">
            <a href="../export/export.php?staff=<?= base64_encode(3); ?>" class="btn btn-success">Download staff's list</a>
        </div>
        <br>
        <div class="container" align="right">
            <form action="teach_details.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Select CSV File:</label>
                    <input class="btn btn-primary" type="file" name="file" required />
                </div>
                <button class="btn btn-primary" name="update_staff">Update staff's details</button>
            </form>
        </div><br>
        <div class="table-responsive">
            <table id="employee_data" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td class="text-center">Name [Username]</td>
                        <td class="text-center">Email</td>
                        <td class="text-center">Assigned Class</td>
                        <td class="text-center">Token</td>
                        <td class="text-center"></td>
                    </tr>
                </thead>
                <?php
                while ($row = mysqli_fetch_array($result)) {
                    echo '  
                               <tr>  
                                    <td class="text-center">' . $row["name"] . ' ' . $row["surname"] . '[' . $row["username"] . ']</td>    
                                    <td class="text-center">' . $row["email"] . '</td>  
                                    <td class="text-center">' . $row["assignedClass"] . '</td>  
                                    <td class="text-center">' . $row["token"] . '</td>  
                                    <td class="text-center"><a href="teach_details.php?del_staff=' . $row["token"] . '" class="text-danger"><i class="icon-trash"></i></a></td>    
                               </tr>  
                               ';
                }
                ?>
            </table>
        </div>
    </div>
</body>




</html>
<script>
    $(document).ready(function() {
        $('#employee_data').DataTable();
    });
</script>
<script src="../js/sweetalert.js"></script>
<?php
// SWEETALERT
if (isset($_SESSION['message'])) : ?>
    <script>
        swal({
            title: "<?php echo $_SESSION['message']; ?>",
            text: "<?php echo $_SESSION['remedy']; ?>",
            icon: "<?php echo $_SESSION['msg_type']; ?>",
            button: "<?php echo $_SESSION['btn']; ?>",
        });
    </script>


<?php
    unset($_SESSION['message']);
endif;
?>