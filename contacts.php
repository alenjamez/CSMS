<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="zxx">
  <head>
     
      <title>Car Showrooms Management System / Contacts</title>
      
      <link rel="stylesheet" href="assets/css/master.css">
     
  </head>
  <body class="page">
               
    <!-- Loader-->
      <div id="page-preloader"><span class="spinner border-t_second_b border-t_prim_a"></span></div>
    <!-- Loader end-->

      
        <?php include_once('includes/header.php');?>
            <!-- end .header-->
        <div class="section-title-page area-bg area-bg_dark area-bg_op_60">
          <div class="area-bg__inner">
            <div class="container">
              <div class="row">
                <div class="col offset-lg-3">
                  <div class="b-title-page__wrap">
                    <h1 class="b-title-page">Contact us</h1>
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Get In Touch</li>
                      </ol>
                      <!-- end breadcrumb-->
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end .b-title-page-->
        <main class="l-main-content">
          <div class="container">
            <div class="section-area">
              <?php

                    
$ret=mysqli_query($con,"select * from tblpages where PageType='contactus'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              <div class="row">
                <div class="col-md-6 col-lg-3">
                  <div class="b-contacts"><i class="ic icon-direction"></i>
                    <div class="b-contacts__title">Head Office</div>
                    <div class="b-contacts__info"><?php  echo $row['HeadOffice'];?></div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-3">
                  <div class="b-contacts"><i class="ic icon-call-end bg-primary"></i>
                    <div class="b-contacts__title">Phone</div>
                    <div class="b-contacts__info"><?php  echo $row['PhoneNumber'];?></div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-3">
                  <div class="b-contacts"><i class="ic icon-envelope"></i>
                    <div class="b-contacts__title">Email</div>
                    <div class="b-contacts__info"><?php  echo $row['Email'];?></div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-3">
                  <div class="b-contacts"><i class="ic icon-flag bg-primary"></i>
                    <div class="b-contacts__title">Showroom</div>
                    <div class="b-contacts__info"><?php  echo $row['PageDescription'];?></div>
                  </div>
                </div>
              </div>
              <?php } ?>
              <!-- end .b-contacts-->
            </div>
            
          </div>
        </main>
         <?php include_once('includes/footer.php');?>
          <!-- .footer-->
      </div>
    </div>
    <!-- end layout-theme-->
    
    
    <!-- ++++++++++++-->
    <!-- MAIN SCRIPTS-->
    <!-- ++++++++++++-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-migrate-1.4.1.min.js"></script>
    <!-- Bootstrap-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- Select customization & Color scheme-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.5/js/bootstrap-select.min.js"></script>
    <!-- Pop-up window-->
    <script src="assets/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
    <!-- Headers scripts-->
    <script src="assets/plugins/headers/slidebar.js"></script>
    <script src="assets/plugins/headers/header.js"></script>
    <!-- Mail scripts-->
    <script src="assets/plugins/jqBootstrapValidation.js"></script>
    <script src="assets/plugins/contact_me.js"></script>
    <!-- Video player-->
    <script src="assets/plugins/flowplayer/flowplayer.min.js"></script>
    <!-- Filter and sorting images-->
    <script src="assets/plugins/isotope/isotope.pkgd.min.js"></script>
    <script src="assets/plugins/isotope/imagesLoaded.js"></script>
    <!-- Progress numbers-->
    <script src="assets/plugins/rendro-easy-pie-chart/jquery.easypiechart.min.js"></script>
    <script src="assets/plugins/rendro-easy-pie-chart/jquery.waypoints.min.js"></script>
    <!-- Animations-->
    <script src="assets/plugins/scrollreveal/scrollreveal.min.js"></script>
    <!-- Scale images-->
    <script src="assets/plugins/ofi.min.js"></script>
    <!-- User map-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhTd-ZT5nzCNucY9AZUCspnXrw3votR34"></script>
    <!-- Maps customization-->
    <script src="assets/js/map-custom.js"></script>
    <!-- User customization-->
    <script src="assets/js/custom.js"></script>
  </body>
</html>