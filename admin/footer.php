	
   <div class="footer-bg">
    <footer class="ftco-footer ftco-bg-dark ftco-section" style="background-color: <?php echo $header_col;?>;">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6 col-lg-4">
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
              
         
        <div class="row">
          <div class="col-md-12 text-center">
            <p style="color:<?php echo $header_txt_col?>;"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy; <script>document.write(new Date().getFullYear());</script> <?php echo $sch_name;?> | Created by Ekreat ventures in cooperation with Dmedia Comms.
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>


  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="../js/jquery.min.js"></script>
  <script src="../js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.easing.1.3.js"></script>
  <script src="../js/jquery.waypoints.min.js"></script>
  <script src="../js/jquery.stellar.min.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/jquery.magnific-popup.min.js"></script>
  <script src="../js/aos.js"></script>
  <script src="../js/jquery.animateNumber.min.js"></script>
  <script src="../js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="../js/google-map.js"></script>
  <script src="../js/main.js"></script>
  <script src="../js/java.js"></script>
  <script src="ckeditor/ckeditor.js"></script>
  <script src="../js/googleapis.js"></script>
  <script src="../js/jquery.js"></script>

  <script src="../js/sweetalert.js"></script>

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


  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

  <script>
    $(function() {
    // Multiple images preview with JavaScript
    var multiImgPreview = function(input, imgPreviewPlaceholder) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

      $('#chooseFile').on('change', function() {
        multiImgPreview(this, 'div.imgGallery');
      });
    });    
  </script>
 
 <script type="text/javascript">
	        function previewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("schLogo").files[0]);

            oFReader.onload = function (oFREvent) {
                document.getElementById("uploadPreview").src = oFREvent.target.result;
            };
		};
        
    </script>
    
  </body>
</html>
</div>