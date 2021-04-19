<?php
//error_reporting(0);
include('includes/dbconnection.php');
  ?>

<!DOCTYPE html>
<html lang="zxx">
 
<head>
     <title>Car Showroom Management System / Car detail </title>
      
      <link rel="stylesheet" href="assets/css/master.css">
            <link rel="stylesheet" href="assets/css/master.css">
            <link rel="stylesheet" href="style/img.css"> 

     
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
                    <h1 class="b-title-page">Car Images</h1>
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Car Images</li>
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
$query=mysqli_query($con,"select * from tbl_car where car_id='$carid'");
$num=mysqli_num_rows($query);
while ($row=mysqli_fetch_array($query)) {
?>
          <section class="b-goods-f">
              
              

            <div class="row">
              <div class="col-lg-8">
                
                <div class="b-goods-f__slider">
                  <div class="ui-slider-main js-slider-for">
                  <h2 class="b-goods-f__title">Images</h2>
                    <?php  
                    $query2=mysqli_query($con,"select * from tbl_carimage where car_id='$carid'");
                    while($rows=mysqli_fetch_array($query2)){
                     $image=$rows['main'];
                     $image1=$rows['image1'];
                     $image2=$rows['image2'];
                     $image3=$rows['image3'];
                     $image4=$rows['image4'];
                     $image5=$rows['image5'];
                     $image6=$rows['image6'];
                     $image7=$rows['image7'];
                     $image8=$rows['image8'];
                     $image9=$rows['image9'];
                    }
                    ?>
                    <img style="margin-bottom:1%"class="img-scale" src="upload/car/<?php echo $image;?>"  />
                    <img class="img-scale"style="margin-bottom:1%" src="upload/car/<?php echo $image1;?>"  />
                    <img class="img-scale" src="upload/car/<?php  echo $image2;?>" style="margin-bottom:1%" />
                    <img style="margin-bottom:1%" class="img-scale" src="upload/car/<?php echo $image3;?>"  />
                    <img class="img-scale" style="margin-bottom:1%" src="upload/car/<?php echo $image4;?>"  />
                    <img class="img-scale" src="upload/car/<?php  echo $image5;?>"  style="margin-bottom:1%"/>
                    <img style="margin-bottom:1%" class="img-scale" src="upload/car/<?php echo $image6;?>"  />
                    <img class="img-scale" style="margin-bottom:1%" src="upload/car/<?php echo $image7;?>"  />
                    <img class="img-scale" src="upload/car/<?php  echo $image8;?>"  style="margin-bottom:1%"/>
                    <img style="margin-bottom:1%"class="img-scale" src="upload/car/<?php echo $image9;?>"  />


      
                  </div>
                </div> 
                <h2 class="b-goods-f__title">Colours</h2>
                <div class="container" id="bat">
                    <img id="expandedImg" style="width:80%">

                    <div id="imgtext"></div>
                  </div>
                  
                      <?php
                          $quer=mysqli_query($con,"select * from colour where car_id='$carid' order by rand()");
                          while($row1=mysqli_fetch_array($quer)){?>
                      <div class="item">
                      <img style="margin-bottom:1%"class="img-scale" src="upload/car/<?php echo $row1['image'];?>"  />

                      <?php
                          }
                      ?>

                      </div>
                  </div>

                
                </div>

<?php }?>
                    </ul>
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