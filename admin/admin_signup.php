<?php
require_once 'admin_controller.php';
error_reporting(0);
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
      <li class="nav-item active"><a href="admin-login" class="nav-link pl-0">Staff login</a></li>
      <li class="nav-item active"><a href="admin-signup" class="nav-link pl-0">Staff sign up</a></li>
    </ul>
  </div>
  </div>
  </nav>
  <!-- END nav -->
  <div class="ftco-animate container" style="margin-top:50px;">
    <span><strong>Academic Period:</strong><?= $current_term; ?> [<?= $current_session; ?>]</span>
    <div class="row">
      <div class="col-md-4 offset-md-4 form-div">
        <form action="" method="post">
          <h3 class="text-center">Admin Sign-Up</h3>

          <div class="form-group">
            <select class="form-control" name="name" required>
              <option value="">Select Your Name</option>
              <?php
              $class = $conn->query("SELECT * FROM teacher_reg_key");
              while ($row = $class->fetch_assoc()) {
              ?>
                <option value="<?php echo $row['name']; ?>"><?php echo $row['name'];
                                                          } ?>
                </option>
            </select>
          </div>

          <div class="form-group">
            <select class="form-control" name="surname" required>
              <option value="">Select Your Surname</option>
              <?php
              $class = $conn->query("SELECT * FROM teacher_reg_key");
              while ($row = $class->fetch_assoc()) {
              ?>
                <option value="<?php echo $row['surname']; ?>"><?php echo $row['surname'];
                                                              } ?>
                </option>
            </select>
          </div>

          <div class="form-group">
            <input type="text" name="username" placeholder="Your Username..." value="<?php echo $username; ?>" class="form-control form-control-lg">
          </div>

          <div class="form-group">
            <select class="form-control" name="email" required>
              <option value="">Select Your Email</option>
              <?php
              $class = $conn->query("SELECT * FROM teacher_reg_key");
              while ($row = $class->fetch_assoc()) {
              ?>
                <option value="<?php echo $row['email']; ?>"><?php echo $row['email'];
                                                            } ?></option>
            </select>
          </div>


          <div class="form-group">
            <select class="form-control" name="gender" required>
              <option value="">Gender</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>

          <div class="form-group">
            <input type="password" name="password" placeholder="Password" value="<?php echo $password; ?>" class="form-control form-control-lg">
          </div>

          <div class="form-group">
            <input type="password" name="passwordConf" placeholder="Confirm password" value="<?php echo $password; ?>" class="form-control form-control-lg">
          </div>

          <div class="form-group">
            <input type="submit" class="btn btn-primary " value="Sign Up" name="register">
          </div>

        </form>
      </div>
    </div>
  </div>
  <br><br>
  <?php include "footer.php"; ?>