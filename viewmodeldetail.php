<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

?>

<!DOCTYPE html>
<html lang="zxx">
 
<head>
     <title>Car Showroom Management System / Car detail </title>
      
      <link rel="stylesheet" href="assets/css/master.css">
            <link rel="stylesheet" href="assets/css/master.css">
            <link rel="stylesheet" href="style/img.css"> 

     <style>
     #mod{
         background-color:#d01818;
         padding: 6px 23px;
        font-size: 24px;
        color: #fff;
        text-decoration:none;
     }
     #mod:hover{
      text-decoration:none;
     }
     blink {
  -webkit-animation: 2s linear infinite condemned_blink_effect; /* for Safari 4.0 - 8.0 */
  animation: 2s linear infinite condemned_blink_effect;
  }

  /* for Safari 4.0 - 8.0 */
  @-webkit-keyframes condemned_blink_effect {
    0% {
      visibility: hidden;
    }
    50% {
      visibility: hidden;
    }
    100% {
      visibility: visible;
    }
  }

  @keyframes condemned_blink_effect {
    0% {
      visibility: hidden;
    }
    50% {
      visibility: hidden;
    }
    100% {
      visibility: visible;
    }
  }

     </style>
<script src="/assets/js/separate-js/html5shiv-3.7.2.min.js" type="text/javascript"></script>

  </head>
  <body class="page">
               
    <!-- Loader-->
      <!-- <div id="page-preloader"><span class="spinner border-t_second_b border-t_prim_a"></span></div> -->
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
                        <li class="breadcrumb-item active" aria-current="page">Model details</li>
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
            $carid=$_GET['cid'];
            $modid=$_GET['mid'];
            $trans=$_GET['tran'];
            $fuel=$_GET['fuel'];

            $query=mysqli_query($con,"select * from tbl_car where car_id='$carid'");
            while ($row=mysqli_fetch_array($query)) {
              $name=$row['name'];
            }

              $query1=mysqli_query($con,"select * from tbl_model where model_id='$modid'");
              while ($row1=mysqli_fetch_array($query1)) {
                    $model=$row1['model'];
                    $fog= $row1['fog_lamb'];
                    $wheel= $row1['wheel'];
                    $start= $row1['powerstart'];
                    $auto= $row1['autoac'];
                    $window= $row1['window'];
                    $sunroof= $row1['sunroof'];
                    $headlamb= $row1['headlamb'];
                    $camera= $row1['camera'];
                    $sensor= $row1['sensor'];
                    $sterio= $row1['sterio'];
              }
              $sql6="select * from tbl_transmission where type='$trans' and fuel='$fuel'";
              $res6=mysqli_query($con,$sql6);
              while($row6=mysqli_fetch_array($res6)){
              $bhp=$row6["bhp"];
              $millage=$row6["millage"];
              $price=$row6["price"];
              $cc=$row6["enginecc"];
              $eng=$row6["engtype"];
              }
            ?>
          <section class="b-goods-f">
              
              <div class="row">

              <div class="col-lg-8">
                <h1 class="ui-title text-uppercase"><?php echo $name." ".$model;?></h1>
               
              </div>
              <div class="col-lg-4" style="font-weight:bold"><form>
             <div><span class="b-goods-f__price-group"><span class="b-goods-f__price"><span ><a id="mod" href="confirmpurchase.php?cid=<?php echo $carid;?>&mid=<?php echo $modid;?>&tran=<?php echo $trans;?>&fuel=<?php echo $fuel;?>">Buy Now</a></span></span>
                     </form>
                      </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-8">
                
                <div class="b-goods-f__slider">
                  <div class="ui-slider-main js-slider-for">
                    <?php  
                    $query2=mysqli_query($con,"select * from tbl_carimage where car_id='$carid'");
                    while($rows=mysqli_fetch_array($query2)){
                     $image=$rows['main'];
                    }
                    ?>
                   <img class="img-scale" src="upload/car/<?php echo $image;?>"  /></a>
                  </div>
                

                <h2 class="b-goods-f__title">Car Specifications</h2><br>
                <div class="row">
                  <div class="col-md-6">
                    <dl class="b-goods-f__descr row">
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">Engine Type</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $eng;?></dd>
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">Displacement</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $cc;?>cc</dd>
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">Millage</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $millage;?>km/l</dd>
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">BHP</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $bhp;?></dd>
                    </dl>
                  </div>
                  <div class="col-md-6">
                    <dl class="b-goods-f__descr row">
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">Transmission</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $trans;?></dd>
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">Fuel Type</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $fuel;?></dd>
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">Price</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><b>&#x20B9; <?php echo $price;?></b>lacs.</dd>
                    </dl>
                  </div>
                </div>
                <h2 class="b-goods-f__title">More Features</h2><br>
                <div class="row">
                  <div class="col-md-6">
                    <dl class="b-goods-f__descr row">
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">Power Window</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $window;?></dd>
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">Fog lamb</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $fog;?></dd>
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">Wheel</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $wheel;?></dd>
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">Power Start</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $start;?></dd>
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">Auto AC</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $auto;?></dd>
                    </dl>
                  </div>
                  <div class="col-md-6">
                    <dl class="b-goods-f__descr row">
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">Sunroof</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $sunroof;?></dd>
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">Sterio</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $sterio;?></dd>
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">Sensor</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $sensor;?></dd>
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">Camera</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $camera;?></dd>
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">Auto Headlamb</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $headlamb;?></dd>
                    </dl>
                  </div>
                </div>
              </div>
              </div>
              <div class="col-lg-4">
              <div class="b-seller" style="border: solid #000 1px; height:200px;">
                    <div class="b-seller__header">
                     
                      <div class="b-seller__title">
                             <h3 class="widget-title bg-dark">Offers </h3>
                             <?php
                             $sql1="select * from tbl_offer where car_id=$carid and status='Active'";
                             $res=mysqli_query($con,$sql1);
                             while($raw=mysqli_fetch_array($res)){
                               $sdate=$raw['start_date'];
                               $edate=$raw['end_date'];
                               $fname=$raw['offr_nme'];
                               $descr=$raw['description'];
                               $rup=$raw['rupee'];
                             }
                               $date1=date("Y-m-d");   
                               if(($date1>=$sdate)&&($date1<=$edate)) {
                                 $_SESSION['offer']=$rup;
                             ?>
                            
                                    <div class="b-seller__main" style="font-size:22px;" align="center">
                                      <div class="b-seller__contact"><blink>&nbsp;<?php echo $fname;?></blink></div>
                                      </div>
                                     </div>
                                <div class="b-seller__category" align="center" style="margin-top:4%;font-size:17px;">
                                  <?php echo $descr;?></div>
                                  </div>
                              <?php
                               }
                               else{
                                $_SESSION['offer']=0;
                                 ?>
                                    <div class="b-seller__main" style="font-size:22px;" align="center">
                                      <div class="b-seller__contact"> &nbsp;No offer available</div>
                                      </div>
                                     </div>
                                 <?php
                               }
                               ?>
                    </div>

                  <!-- The expanding image container -->

             
                
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

    <script>
    function myFunction(imgs) {
      var expandImg = document.getElementById("expandedImg");
      var imgText = document.getElementById("imgtext");
      expandImg.src = imgs.src;
      imgText.innerHTML = imgs.alt;
      expandImg.parentElement.style.display = "block";
    }
    </script>

  </body>

</html>