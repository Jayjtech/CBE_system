<?php 
if($_SESSION['position'] == "Proprietor"){
$_SESSION['page'] = "admin-nav";
}
if($_SESSION['position'] == "Principal"){
$_SESSION['page'] = "principal";
}
if($_SESSION['position'] == "Teacher"){
$_SESSION['page'] = "teacher";
}
if($_SESSION['position'] == "Vice principal"){
$_SESSION['page'] = "v-principal";
}
if($_SESSION['position'] == "Treasurer"){
$_SESSION['page'] = "treasurer";
}
?>
<div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="<?php echo $_SESSION['page'];?>" class="nav-link">Back</a></li>
	          <li class="nav-item"><a href="logout.php" class="nav-link">Log Out</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>