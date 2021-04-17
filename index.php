<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    
    <title>Car Showroom Management System / Home</title>
    
    <link rel="stylesheet" href="assets/css/master.css">
   
    
</head>

<body class="page">
    
    
    <!-- Loader-->
      <div id="page-preloader"><span class="spinner border-t_second_b border-t_prim_a"></span></div>
    <!-- Loader end-->


   <?php include_once('includes/header.php');?>
            <!-- end .header-->
            <div class="main-slider slider-pro" id="main-slider" data-slider-width="100%" data-slider-height="700px" data-slider-arrows="false" data-slider-buttons="false">
                <div class="sp-slides">
                    <!-- Slide 1-->
                    <div class="main-slider__slide sp-slide"><img class="sp-image" src="assets/media/content/b-main-slider/Banner.jpg" alt="slider" width='1200' height="400" />
                   
                    </div>
            
                </div>
            </div>
            <!-- end .main-slider-->
            <div class="section-area bg-light">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="b-find">
                                <ul class="b-find-nav nav nav-tabs" id="findTab" role="tablist">
                                    <li class="b-find-nav__item nav-item"><a class="b-find-nav__link nav-link active" id="tab-allCar" data-toggle="tab" href="#content-allCar" role="tab" aria-controls="content-allCar" aria-selected="true">All Car Types</a></li>
                                 
                                </ul>
                                <div class="b-find-content tab-content" id="findTabContent">
                                    <div class="tab-pane fade show active" id="content-allCar">
                                        <form class="b-find__form" method="post" name="search" action="car-search-homepage.php">
                                            <div class="b-find__row">
                                                <div class="b-find__main">
                                                    <div class="b-find__inner">
                                                        <div class="b-find__item">
                                                            <div class="b-find__label"><span class="b-find__number"></span> Car Type</div>
                                                            <div class="b-find__selector">
                                                                <select class="selectpicker" data-width="100%" data-style="ui-select" name="cartype" id="cartype" required="true">
                                                                    <?php 
 $query3=mysqli_query($con,"select distinct car_type from tbl_car");
 while ($row3=mysqli_fetch_array($query3)) {


 ?>
                                                                    <option><?php echo $row3['car_type'];?></option><?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="b-find__btn btn btn-primary" type="submit" name="search">Search</button>
                                            </div>
                                     
                                        </form>
                                    </div>
                             
                      
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end .b-find-->
           
          

            <!-- end .b-progress-->
            <section class="b-isotope section-default">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="ui-title-slogan">Helps you to find perfect car</div>
                            <h2 class="ui-title">Our Car<span class="text-primary"> Listing</span></h2>
                          
                        </div>
                    </div>
                    <ul class="b-isotope-grid grid list-unstyled row">
                         <?php 
 $query=mysqli_query($con,"select * from tbl_car order by rand() limit 6");
 while ($row=mysqli_fetch_array($query)) {
	 $n=$row['car_id'];
	 $query5=mysqli_query($con,"select main from tbl_carimage where car_id=$n");
	 $nm=mysqli_fetch_array($query5)['main'];
 ?>
                        <li class="grid-sizer col-lg-4 col-md-6"></li>
                        <li class="b-isotope-grid__item grid-item col-lg-4 col-md-6 web honda">
                            <div class="b-goods-f b-goods-f_dark">
                               
                                <div class="b-goods-f__media">

                                    <a href="viewcardetail.php?carid=<?php echo $n;?>"><img class="b-goods-f__img img-scale" src="upload/car/<?php echo $nm;?>" alt="<?php echo $nm;?>" width='300' height='250'/></a>
                                </div>

                                <div class="b-goods-f__main">
                                    <div class="b-goods-f__descrip">
                                        <div class="b-goods-f__title"><span><?php echo $row['name'];?></span>
                                        </div>
                                        <?php
										
										?>
                                        <ul class="b-goods-f__list list-unstyled">
                                            <li class="b-goods-f__list-item"><span class="b-goods-f__list-info"><?php echo $row['millage'];?></span></li>
                                            <li class="b-goods-f__list-item"><span class="b-goods-f__list-info"><?php echo $row['CarModel'];?></span></li>
                                            <li class="b-goods-f__list-item"><span class="b-goods-f__list-info"><?php echo $row['TransmissionType'];?></span></li>
                                            <li class="b-goods-f__list-item"><span class="b-goods-f__list-info"><?php echo $row['FuelType'];?></span></li>
                                            <li class="b-goods-f__list-item"><span class="b-goods-f__list-info"><?php echo $row['MaxPower'];?></span></li>
                                        </ul>
                                    </div>
                                    <div class="b-goods-f__sidebar"><span class="b-goods-f__price-group"><span class="b-goods-f__price"><span class="b-goods-f__price-numb"><?php echo $row['CarPrice'];?></span></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </li>
                        
                    </ul>
                </div>
            </section>
            <!-- end .b-isotope-->
           
           
      
            <!-- end .b-team-->
            <section class="section-reviews section-default parallax area-bg area-bg_dark">
                <div class="area-bg__inner">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="text-center">
                                    <div class="ui-title-slogan">Helps you to find perfect car</div>
                                    <h2 class="ui-title">Customer Reviews</h2><span class="section-reviews__decor">“</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="b-reviews-slider js-slider" data-slick="{&quot;slidesToShow&quot;: 3,  &quot;slidesToScroll&quot;: 3, &quot;centerMode&quot;: true, &quot;arrows&quot;: false, &quot;dots&quot;: true, &quot;responsive&quot;: [{&quot;breakpoint&quot;: 1400, &quot;settings&quot;: {&quot;slidesToShow&quot;: 2, &quot;slidesToScroll&quot;: 2, &quot;centerMode&quot;: false}}, {&quot;breakpoint&quot;: 768, &quot;settings&quot;: {&quot;slidesToShow&quot;: 1, &quot;slidesToScroll&quot;: 1, &quot;centerMode&quot;: false}}]}">
                                    <div class="b-reviews">
                                        <blockquote class="b-reviews__blockquote">
                                            <div class="b-reviews__wrap">
                                                <p>Norem ipsum dolor sit amet consectetur adipisicing elit aliqua. Ut enim ad minim veniam, quis nostrud exercita Duis aute irure dolor reprehenderit.</p>
                                            </div>
                                            <cite class="b-reviews__cite" title="Blockquote Title"><span class="b-reviews__inner"><span class="b-reviews__name">Alexa Cathy</span><span class="b-reviews__category">Customer</span></span><span class="b-reviews__author"><img class="img-fluid" src="assets/media/content/b-reviews/face-1.jpg" alt="foto"/></span></cite>
                                        </blockquote>
                                    </div>
                                    <div class="b-reviews">
                                        <blockquote class="b-reviews__blockquote">
                                            <div class="b-reviews__wrap">
                                                <p>Norem ipsum dolor sit amet consectetur adipisicing elit aliqua uat enim ad minim veniam, quis nostrud exercita Duis aute irure dolor reprehenderit. Slyly babbled much partook this much in in thus the sauc.</p>
                                            </div>
                                            <cite class="b-reviews__cite" title="Blockquote Title"><span class="b-reviews__inner"><span class="b-reviews__name">Tina Olivia</span><span class="b-reviews__category">Customer</span></span><span class="b-reviews__author"><img class="img-fluid" src="assets/media/content/b-reviews/face-2.jpg" alt="foto"/></span></cite>
                                        </blockquote>
                                    </div>
                                    <div class="b-reviews">
                                        <blockquote class="b-reviews__blockquote">
                                            <div class="b-reviews__wrap">
                                                <p>Norem ipsum dolor sit amet consectetur adipisicing elit aliqua. Ut enim ad minim veniam, quis nostrud exercita Duis aute irure dolor reprehenderit.</p>
                                            </div>
                                            <cite class="b-reviews__cite" title="Blockquote Title"><span class="b-reviews__inner"><span class="b-reviews__name">Alexa Cathy</span><span class="b-reviews__category">Customer</span></span><span class="b-reviews__author"><img class="img-fluid" src="assets/media/content/b-reviews/face-3.jpg" alt="foto"/></span></cite>
                                        </blockquote>
                                    </div>
                                    <div class="b-reviews">
                                        <blockquote class="b-reviews__blockquote">
                                            <div class="b-reviews__wrap">
                                                <p>Norem ipsum dolor sit amet consectetur adipisicing elit aliqua. Ut enim ad minim veniam, quis nostrud exercita Duis aute irure dolor reprehenderit.</p>
                                            </div>
                                            <cite class="b-reviews__cite" title="Blockquote Title"><span class="b-reviews__inner"><span class="b-reviews__name">Alexa Cathy</span><span class="b-reviews__category">Customer</span></span><span class="b-reviews__author"><img class="img-fluid" src="assets/media/content/b-reviews/face-1.jpg" alt="foto"/></span></cite>
                                        </blockquote>
                                    </div>
                                    <div class="b-reviews">
                                        <blockquote class="b-reviews__blockquote">
                                            <div class="b-reviews__wrap">
                                                <p>Norem ipsum dolor sit amet consectetur adipisicing elit aliqua uat enim ad minim veniam, quis nostrud exercita Duis aute irure dolor reprehenderit. Slyly babbled much partook this much in in thus the sauc.</p>
                                            </div>
                                            <cite class="b-reviews__cite" title="Blockquote Title"><span class="b-reviews__inner"><span class="b-reviews__name">Tina Olivia</span><span class="b-reviews__category">Customer</span></span><span class="b-reviews__author"><img class="img-fluid" src="assets/media/content/b-reviews/face-2.jpg" alt="foto"/></span></cite>
                                        </blockquote>
                                    </div>
                                    <div class="b-reviews">
                                        <blockquote class="b-reviews__blockquote">
                                            <div class="b-reviews__wrap">
                                                <p>Norem ipsum dolor sit amet consectetur adipisicing elit aliqua. Ut enim ad minim veniam, quis nostrud exercita Duis aute irure dolor reprehenderit.</p>
                                            </div>
                                            <cite class="b-reviews__cite" title="Blockquote Title"><span class="b-reviews__inner"><span class="b-reviews__name">Alexa Cathy</span><span class="b-reviews__category">Customer</span></span><span class="b-reviews__author"><img class="img-fluid" src="assets/media/content/b-reviews/face-3.jpg" alt="foto"/></span></cite>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end .b-reviews-->
           
     
      
            <!-- end .b-gallery-->
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
    <!-- Main slider-->
    <script src="assets/plugins/slider-pro/jquery.sliderPro.min.js"></script>
    <!--Sliders-->
    <script src="assets/plugins/slick/slick.js"></script>
    <!-- User customization-->
    <script src="assets/js/custom.js"></script>
</body>

</html>