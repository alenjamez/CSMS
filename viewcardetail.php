<?php
//error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['send']))
  {
    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    $mobilenumber=$_POST['mobnum'];
    $message=$_POST['message'];
    $enquirynumber = mt_rand(100000000, 999999999);
$carid=$_GET['carid'];
    $query1=mysqli_query($con,"insert into  tblenquiry(CardId,FullName,Email,MobileNumber,Message,EnquiryNumber) value('$carid','$fullname','$email','$mobilenumber','$message','$enquirynumber')");
        if ($query1) {
 echo '<script>alert("Your enquiry successfully send. Your Enquiry number is "+"'.$enquirynumber.'")</script>';
echo "<script>window.location.href='car-list.php'</script>";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  
}

  ?>

<!DOCTYPE html>
<html lang="zxx">
 
<head>
     <title>Car Showroom Management System / Car detail </title>
      
      <link rel="stylesheet" href="assets/css/master.css">
            <link rel="stylesheet" href="assets/css/master.css">
     
<script src="/assets/js/separate-js/html5shiv-3.7.2.min.js" type="text/javascript"></script>
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
                    <h1 class="b-title-page">Car details</h1>
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Car details</li>
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
  
            
                  <div class="l-main-content">
        <div class="container">
          <?php 

$carid=$_GET['carid'];
$query=mysqli_query($con,"select * from tblcars where ID='$carid'");
$num=mysqli_num_rows($query);
while ($row=mysqli_fetch_array($query)) {
?>
          <section class="b-goods-f">
              
              
              <div class="row">

              <div class="col-lg-8">
                <h1 class="ui-title text-uppercase"><?php echo $row['CarName'];?></h1>
               
              </div>
              <div class="col-lg-4" style="font-weight:bold">
             <div><span class="b-goods-f__price-group"><span class="b-goods-f__price"><span class="b-goods-f__price_col">msrp:&nbsp;</span><span class="b-goods-f__price-numb">Rs.<?php echo $row['CarPrice'];?></span></span></span>
                     
                      </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-8">
                
                <div class="b-goods-f__slider">
                  <div class="ui-slider-main js-slider-for">

                    <img class="img-scale" src="admin/images/<?php echo $row['CarImage'];?>"  />
                    <p style="margin-top:1%">
                    <img src="admin/images/<?php echo $row['CarImage1'];?>" width="360" style="border:solid #000 1px"/> &nbsp;&nbsp;
                    <img  src="admin/images/<?php echo $row['CarImage2'];?>" width="360"  style="border:solid #000 1px"/>  </p>
                    <p>
                    <img  src="admin/images/<?php echo $row['CarImage3'];?>" width="360" style="border:solid #000 1px" />&nbsp;&nbsp;
                    <img  src="admin/images/<?php echo $row['CarImage4'];?>"  width="360" style="border:solid #000 1px" /> </p>
                  </div>
         
                </div> 




                <h2 class="b-goods-f__title">Car Specifications</h2>
                <div class="row">
                  <div class="col-md-6">
                    <dl class="b-goods-f__descr row">
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">Company</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $row['CarCompany'];?></dd>
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">Model</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $row['CarModel'];?></dd>
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">Body Style</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $row['CarBodytype'];?></dd>
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">Color</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $row['CarBodycolor'];?></dd>
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">Fuel Type</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $row['FuelType'];?></dd>
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">Max Power</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $row['MaxPower'];?></dd>
                    </dl>
                  </div>
                  <div class="col-md-6">
                    <dl class="b-goods-f__descr row">
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">Fuel Capacity</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $row['FuelCapacity'];?></dd>
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">Mileage</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $row['Milage'];?></dd>
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">Transmission</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $row['TransmissionType'];?></dd>
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">Air Bags</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $row['AirBags'];?></dd>
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">No. of Gear</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $row['NoofGear'];?></dd>
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">No. Of Seats</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $row['Seatingcapacity'];?></dd>
                    </dl>
                  </div>
                </div>
                <ul class="nav nav-tabs nav-vehicle-detail-tabs" id="myTab" role="tablist">
                  <li class="nav-item"><a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true"><strong>Overview</strong></a></li>
              
               
                 
                </ul>
                <hr />
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                    <p><?php echo $row['CarDescription'];?></p>
                    <h3 class="b-goods-f__title-inner">General Information</h3>
                    <ul class="list list-mark-2">
                      <li>Max Torque: <?php echo $row['MaxTorque'];?> </li>
                      <li>Car Length: <?php echo $row['CarLength'];?> </li>
                      <li>Car Width:  <?php echo $row['CarWidth'];?> </li>
                      <li>Car Height:  <?php echo $row['CarHeight'];?> </li>
                      <li>Car Displacement: <?php echo $row['Displacement'];?> </li>
                    </ul>
                  </div>
             
              
       
                </div>
              </div>
              <div class="col-lg-4">
                <aside class="l-sidebar">
                    
                    
   
                    <?php

                    
$ret=mysqli_query($con,"select * from tblpages where PageType='contactus'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>               <div class="b-seller" style="border: solid #000 1px; height:200px;">
                    <div class="b-seller__header">
                     
                      <div class="b-seller__title">
                             <h3 class="widget-title bg-dark">Showroom Details </h3>
                        <div class="b-seller__category" align="center" style="margin-top:4%;font-size:17px;">
<i class="b-seller__ic fas fa-map-marker text-primary"></i>
                          <?php  echo $row['HeadOffice'];?></div>
                      </div>
                    </div>
                    <div class="b-seller__main" style="font-size:22px;" align="center">
                      <div class="b-seller__contact"><i class="b-seller__ic fas fa-phone text-primary"></i> &nbsp;<?php  echo $row['PhoneNumber'];?></div>
                     
                    </div>
                  </div>
                  <?php }} ?>
                  <!-- end .b-seller-->
                  
                  <div class="widget section-sidebar bg-gray widget-selecr-contact" style="margin-top:3%">
                      <h3 class="widget-title bg-dark"><i class="ic icon_mail_alt"></i>Enquiry For Car</h3>
                    <div class="widget-content">
                      <div class="widget-inner">
                   <form method="post">
                          <div class="form-group">
                            <input class="form-control" type="text" name="fullname" required="true" placeholder="Name"/>
                          </div>
                            <div class="form-group">
                            <input class="form-control" type="email" name="email" required="true" placeholder="Email"/>
                          </div>
                            <div class="form-group">
                            <input class="form-control" type="text" name="mobnum" maxlength="10" pattern="[0-9]+" placeholder="Mobile Number" required="true"/>
                          </div>
                          <div class="form-group">
                            <textarea class="form-control" name="message" placeholder="Message" required="true" rows="4"></textarea>
                          </div>
                          <button class="btn btn-red btn-lg w-100" name="send" type="submit">Send now</button>
                        </form>
                      </div>
                    </div>
                  </div>
             
                </aside>
              </div>
            </div>
          </section>
          <!-- end .b-goods-f-->
      
        </div>
      </div>
        
       
            
            
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
    <!-- Video player-->
    <script src="assets/plugins/flowplayer/flowplayer.min.js"></script>
    <!--Sliders-->
    <script src="assets/plugins/slick/slick.js"></script>
    <!-- User customization-->
    <script src="assets/js/custom.js"></script>

  </body>

<!-- Mirrored from templines.rocks/html/revus/vehicle-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 28 Jun 2019 06:18:44 GMT -->
</html>