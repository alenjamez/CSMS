<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>

<!DOCTYPE html>
<html lang="zxx">
  <head>
      
      <title>Car Showroom Management System / Car List</title>
     
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
                    <h1 class="b-title-page">Car Listings</h1>
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Listing</li>
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
            <div class="row">
              <!-- <div class="col-lg-2">
         <?php include_once("includes/sidebar.php");?>
              </div> -->
              <div class="col-lg-12">
                <div class="b-filter-goods">
                  <div class="row justify-content-between align-items-center">
             
                 
                    <div class="btns-switch col-auto"><i class="btns-switch__item js-view-list active ic fa fa-th-list"></i><i class="btns-switch__item js-view-th ic fa fa-th"></i></div>
                  </div>
                </div>
                <!-- end .b-filter-goods-->
                <main class="b-goods-group row">

 <?php 

//Getting default page number
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }

// Formula for pagination  
        $no_of_records_per_page = 5;
        $offset = ($pageno-1) * $no_of_records_per_page;
// Getting total number of pages
        $total_pages_sql = "SELECT COUNT(*) FROM tbl_car";
        $result = mysqli_query($con,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);


 $query=mysqli_query($con,"select * from tbl_car LIMIT $offset, $no_of_records_per_page");
 while ($row=mysqli_fetch_array($query)) {
  $id=$row['car_id'];
  $query5=mysqli_query($con,"select main from tbl_carimage where car_id=$id");
  $nm=mysqli_fetch_array($query5)['main'];


 ?>                 
                  <div class="b-goods-f col-12 b-goods-f_row">
                    <div class="b-goods-f__media">

 <a href="viewcardetail.php?carid=<?php echo $row['car_id'];?>">                     
<img class="b-goods-f__img img-scale" src="upload/car/<?php echo $nm;?>" alt="<?php echo $nm;?>"/></a><span class="b-goods-f__media-inner"></span>
</div>
                    <div class="b-goods-f__main">
                      <div class="b-goods-f__descrip">
                        <a href="viewcardetail.php?carid=<?php echo $row['car_id'];?>"> 
                        <div class="b-goods-f__title"><?php echo $row['name'];?></div></a>
                        <div class="b-goods-f__info"><?php echo substr($row['description'],100);?>.</div>
                        <ul class="b-goods-f__list list-unstyled">
                        <?php
											 $query6=mysqli_query($con,"select * from tbl_transmission where car_id=$id");
											 while($rows=mysqli_fetch_array($query6)){
												 $millage=$rows['millage'];
												 $cc=$rows['enginecc'];
												 $type=$rows['engtype'];
												 $bhp=$rows['bhp'];
												 $price=$rows['price'];
											 }
										?>
 <li class="b-goods-f__list-item"><span class="b-goods-f__list-title">Mileage :</span><span class="b-goods-f__list-info"><?php echo $millage;?></span></li>
                          <li class="b-goods-f__list-item"><span class="b-goods-f__list-title">Displacement :</span><span class="b-goods-f__list-info"><?php echo $cc;?></span></li>
                          <li class="b-goods-f__list-item"><span class="b-goods-f__list-title">Transmission :</span><span class="b-goods-f__list-info"><?php echo "Automatic/Manual";?></span></li>
                          <li class="b-goods-f__list-item b-goods-f__list-item_row"><span class="b-goods-f__list-title">Engine Type :</span><span class="b-goods-f__list-info"><?php echo $type;?></span></li>
                          <li class="b-goods-f__list-item"><span class="b-goods-f__list-title">Fuel Type :</span><span class="b-goods-f__list-info"><?php echo "Petrol/Disel";?></span></li>
                          <li class="b-goods-f__list-item b-goods-f__list-item_row"><span class="b-goods-f__list-title">Max Power:</span><span class="b-goods-f__list-info"><?php echo $bhp;?></span></li>
                        </ul>
     <div><span class="b-goods-f__price-group"><span class="b-goods-f__price"><span class="b-goods-f__price_col">&nbsp;</span><span class="b-goods-f__price-numb">Starts at &#x20B9;<?php echo $price;?></span></span></span>
                     
                      </div>

                      </div>
                 
                    </div>
                  </div>
                  <!-- end .b-goods-->
                 <?php } ?>
                        
                </main>
                <nav aria-label="Page navigation">
                  <ul class="pagination justify-content-center">
                    <li class="page-item"><a class="page-link" href="?pageno=1">First</a></li>
        <li class="page-item <?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a  class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
        <li class="page-item <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
        </li>
        <li class="page-item"><a class="page-link" href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
                 
                  </ul>
                </nav>
              </div>
            </div>
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
    <script src="assets/libs/bootstrap-select.min.js"></script>
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
    <!-- Slider number-->
    <script src="assets/plugins/noUiSlider/wNumb.js"></script>
    <script src="assets/plugins/noUiSlider/nouislider.min.js"></script>
    <!-- User customization-->
    <script src="assets/js/custom.js"></script>
  </body>
</html>