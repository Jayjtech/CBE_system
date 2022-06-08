	
   <div class="footer-bg">
    <footer class="ftco-footer ftco-bg-dark ftco-section" style="background-color: <?php echo $header_col;?>;">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6 col-lg-4" style="margin:0 auto;">
            <div class="ftco-footer-widget mb-5">
            	<h2 class="ftco-heading-2" style="color:<?php echo $header_txt_col?>;">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker" style="color:<?php echo $header_txt_col?>;"></span><span class="text" style="color:<?php echo $header_txt_col?>;"><?php echo $sch_address; ?></span></li>
	                <li><a href="#"><span class="icon icon-phone" style="color:<?php echo $header_txt_col?>;"></span><span class="text" style="color:<?php echo $header_txt_col?>;"><?php echo $sch_phone; ?> / <?php echo $sch_phone2; ?></span></a></li>
	                <li><a href="#"><span class="icon icon-envelope" style="color:<?php echo $header_txt_col?>;"></span><span class="text" style="color:<?php echo $header_txt_col?>;"><?php echo $sch_email; ?></span></a></li>
	              </ul>
	            </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4" style="margin:0 auto;">
            <div class="ftco-footer-widget mb-5 ml-md-4">
              <h2 class="ftco-heading-2" style="color:<?php echo $header_txt_col?>;">Links</h2>
              <ul class="list-unstyled">
                <li><a href="index.php" style="color:<?php echo $header_txt_col?>;"><span style="color:<?php echo $header_txt_col?>;" class="ion-ios-arrow-round-forward mr-2"></span>Home</a></li>
                <li><a href="about.php" style="color:<?php echo $header_txt_col?>;"><span style="color:<?php echo $header_txt_col?>;" class="ion-ios-arrow-round-forward mr-2"></span>About</a></li>
                <li><a href="services.php" style="color:<?php echo $header_txt_col?>;"><span style="color:<?php echo $header_txt_col?>;" class="ion-ios-arrow-round-forward mr-2"></span>Gallery</a></li>
                <li><a href="news.php" style="color:<?php echo $header_txt_col?>;"><span style="color:<?php echo $header_txt_col?>;" class="ion-ios-arrow-round-forward mr-2"></span>News</a></li>
                <li><a href="register.php" style="color:<?php echo $header_txt_col?>;"><span style="color:<?php echo $header_txt_col?>;" class="ion-ios-arrow-round-forward mr-2"></span>Register</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-4" style="margin:0 auto;">
          <div class="ftco-footer-widget mb-5">
            	<h2 class="ftco-heading-2 mb-0" style="color:<?php echo $header_txt_col?>;">Connect With Us</h2>
            	<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">

                <?php echo !empty($sch_twitter) ? '<li class="ftco-animate"><a href="'.$sch_twitter.'"><span style="color:'.$header_txt_col.'" class="icon-twitter"></span></a></li>' : null; ?>
                <?php echo !empty($sch_facebook) ? '<li class="ftco-animate"><a href="'.$sch_facebook.'"><span style="color:'.$header_txt_col.'" class="icon-facebook"></span></a></li>' : null; ?>
                <?php echo !empty($sch_instagram) ? '<li class="ftco-animate"><a href="'.$sch_instagram.'"><span style="color:'.$header_txt_col.'" class="icon-instagram"></span></a></li>' : null; ?>
                <?php echo !empty($sch_whatsapp) ? '<li class="ftco-animate"><a href="https://wa.me/+234'.$sch_phone2.'"><span style="color:'.$header_txt_col.'" class="icon-whatsapp"></span></a></li>' : null; ?>

              </ul>
            </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p style="color:<?php echo $header_txt_col?>;"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy; <script>document.write(new Date().getFullYear());</script> <?php echo $sch_name;?> | Created by Ekreat Solutions.
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/graph.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
  <script src="js/java.js"></script>
  <script src="js/modal.js"></script>

  <script src="js/sweetalert.js"></script>

<?php
// SWEETALERT
if(isset($_SESSION['message'])): ?>
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

  <script>
        function printDiv(){
            var divToPrint = document.getElementById('DivIdToPrint');
            var newWin = window.open('', 'Print-Window');
            newWin.document.open();
            newWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');
            newWin.document.close();
            setTimeout(function(){newWin.close();},10);

        }
    </script>

<script>
window.onload = function() {
 
 
var chart = new CanvasJS.Chart("chartContainer", {
	theme: "dark",
	animationEnabled: true,
	title: {
		text: ""
	},
	data: [{
		type: "bar",
		indexLabel: "{y}",
		yValueFormatString: "#,##0.00\"%\"",
		indexLabelPlacement: "outside",
		indexLabelFontColor: "#36454F",
		indexLabelFontSize: 20,
		indexLabelFontWeight: "bolder",
		showInLegend: true,
		legendText: "{label}",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
    
  </body>
</html>
</div>