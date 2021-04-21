<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['send']))
 {

    if(isset($_SESSION['user']))
      {
        $lid=$_SESSION['logid'];
        $fullname=$_POST['name'];
        $date=$_POST['date'];
        $location=$_POST['loc'];
        $trans=$_POST['trans'];
        $enquirynumber = mt_rand(100000000, 999999999);
        $carid=$_GET['carid'];
        $que="insert into  tbl_ltestdrive(name,date,location,gear,login_id,car_id,enquiryno) value('$fullname','$date','$location','$trans',$lid,$carid,'$enquirynumber')";
        $query3=mysqli_query($con,$que);
            if ($query3) {
            echo '<script>alert("Your booking has successfully send.")</script>';
            echo "<script>window.location.href='car-list.php'</script>";
              }
              else{
                  $msg="Something Went Wrong. Please try again";
                }
      }
        else{
          header("location:login.php?msg=");
        }
    }

  ?>

<!DOCTYPE html>
<html lang="zxx">
 
<head>
     <title>Car Showroom Management System / Car detail </title>
      
      <link rel="stylesheet" href="assets/css/master.css">
            <link rel="stylesheet" href="assets/css/master.css">
            <link rel="stylesheet" href="style/img.css"> 
    <style>
    #model:hover{
      text-decoration:none;
    }
    </style>
     
<script src="/assets/js/separate-js/html5shiv-3.7.2.min.js" type="text/javascript"></script>
<script>
       function rname()
        {
        var nam=document.getElementById("name").value;
        var nam1=/^[a-zA-Z]+$/;
        
        if(nam=="")
            {
                document.getElementById("name").style.borderColor = "red";
                document.getElementById("name").focus();
            return false;
            }
        if(nam.match(nam1))
            {
              document.getElementById("name").style.borderColor = "#dddddd";
        
            }
        else
            {
                document.getElementById("name").style.borderColor = "red";
                document.getElementById("name").focus();
            return false;
        
            }
        }
        function loca()
        {
        var loc=document.getElementById("loc").value;
        var loc1=/^[a-zA-Z]+$/;
        if(loc=="")
           {
                document.getElementById("loc").style.borderColor = "red";
                document.getElementById("loc").focus();
            }
        if(loc.match(loc1))
            {
                document.getElementById("loc").style.borderColor="#dddddd";
        
            }
        else
            {
                document.getElementById("loc").style.borderColor = "red";
                document.getElementById("loc").focus();
            }
        }
</script>
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
$query=mysqli_query($con,"select * from tbl_car where car_id='$carid'");
while ($row=mysqli_fetch_array($query)) {
  $name=$row['name'];
?>
          <section class="b-goods-f">
              
              
              <div class="row">

              <div class="col-lg-8">
                <h1 class="ui-title text-uppercase"><?php echo $row['name'];?></h1>
               
              </div>
              <div class="col-lg-4" style="font-weight:bold">
             <div><span class="b-goods-f__price-group"><span class="b-goods-f__price"><span class="b-goods-f__price_col">&nbsp;</span><span class="b-goods-f__price-numb"><?php echo $row['price'];?></span></span></span>
                     
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
                   <a href="carimage.php?carid=<?php echo $carid;?>"> <img class="img-scale" src="upload/car/<?php echo $image;?>"  /></a>
                  </div>
                </div><h6>*Click on image to view more image</h6><br> 
                <h2 class="b-goods-f__title">Colours</h2>
                <div class="container" id="bat">
                    <img id="expandedImg" style="width:80%">

                    <div id="imgtext"></div>
                  </div>
                  
                  <div style="width:100%;heigth:100%">
                  <div class="grid-container">
                      <?php
                          $quer=mysqli_query($con,"select * from colour where car_id='$carid' order by rand()");
                          while($row1=mysqli_fetch_array($quer)){?>
                      <div class="item">                  
                      <img width="100" height="100" src="upload/car/<?php echo $row1['image'];?>" alt="<?php echo $row1['colour'];?>" onclick="myFunction(this);">
                    </div>
                      <?php
                          }
                      ?>

                      </div>
                  </div><h6>*Click on image to view large size</h6><br>

                <h2 class="b-goods-f__title">Car Specifications</h2>
                <div class="row">
                  <div class="col-md-6">
                    <dl class="b-goods-f__descr row">
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">Company</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12">Maruti Suzuki</dd>
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">AC</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $row['ac'];?></dd>
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">Airbag</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12">
                      <?php if($row['airbag']==2){
                        echo "Driver and Passenger";
                      }
                      else{
                        echo "Driver,Passenger & Side" ;
                      }?></dd>
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">Emission Norm Compliance</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $row['enc'];?></dd>
                    </dl>
                  </div>
                  <div class="col-md-6">
                    <dl class="b-goods-f__descr row">
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">Fuel Capacity</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $row['capacity'];?></dd>
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">Power Steering</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $row['steering'];?></dd>
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">Bootspace</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $row['bootspace'];?> litres</dd>
                      <dt class="b-goods-f__descr-title col-lg-5 col-md-12">Ground Clearence</dt>
                      <dd class="b-goods-f__descr-info col-lg-7 col-md-12"><?php echo $row['ground'];?>mm</dd>

                    </dl>
                  </div>
                </div>



                
                <ul class="nav nav-tabs nav-vehicle-detail-tabs" id="myTab" role="tablist">
                  <li class="nav-item"><a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true"><strong>Overview</strong></a></li>
              
               
                 
                </ul>
                <hr />
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                    <p><?php echo $row['description'];?></p>
                    <h3 class="b-goods-f__title-inner">Versions</h3>
                    <ul class="list list-mark-2">
                    <?php
                    $sql5="select * from tbl_model where car_id='$carid'";
                    $res5=mysqli_query($con,$sql5);
                    while($row5=mysqli_fetch_array($res5)){
                      $mid=$row5["model_id"];
                      $model=$row5["model"];
                      $sql6="select * from tbl_transmission where model_id='$mid'";
                      $res6=mysqli_query($con,$sql6);
                      while($row6=mysqli_fetch_array($res6)){
                      $trans=$row6["type"];
                      $fuel=$row6["fuel"];
                      $price=$row6["price"];
                      $cc=$row6["enginecc"];
            
                            // $query8=mysqli_query($con,"select * from tbl_transmission where model_id=$row[model_id]");
                            // while($row2=mysqli_fetch_array($query8)){?>
                              <a href="viewmodeldetail.php?cid=<?php echo $carid;?>&mid=<?php echo $mid;?>&tran=<?php echo $trans;?>&fuel=<?php echo $fuel;?>"><li><?php echo $name," ", $model," (",$trans," | ",$fuel,")";?>&nbsp;&nbsp;&nbsp;&#x20B9;<?php echo $price;?><i>Lacs.</i> </li></a>
                        
<?php }
}?>
                    </ul>
                  </div>
             
              
       
                </div>
              </div>
              <div class="col-lg-4">
                <aside class="l-sidebar">
                    
                    
   
             <div class="b-seller" style="border: solid #000 1px; height:200px;">
                    <div class="b-seller__header">
                     
                      <div class="b-seller__title">
                             <h3 class="widget-title bg-dark">Showroom Details </h3>
                        <div class="b-seller__category" align="center" style="margin-top:4%;font-size:17px;">
<i class="b-seller__ic fas fa-map-marker text-primary"></i>
URCARZ: ASV Ramana Towers,   52, Kottayam.</div>
                      </div>
                    </div>
                    <div class="b-seller__main" style="font-size:22px;" align="center">
                      <div class="b-seller__contact"><i class="b-seller__ic fas fa-phone text-primary"></i> &nbsp;+91 999 888 9990</div>
                     
                    </div>
                  </div>
                  <?php } ?>
                  <!-- end .b-seller-->
                  
                  <div class="widget section-sidebar bg-gray widget-selecr-contact" style="margin-top:3%">
                      <h3 class="widget-title bg-dark"><i class="ic icon_mail_alt"></i>Book for Test Drive</h3>
                    <div class="widget-content">
                      <div class="widget-inner">
                   <form method="post" enctype="multipart/form-data">
                          <div class="form-group">
                            <input class="form-control" type="date"  name="date" required="true" placeholder="date of appoinment" max="2021-4-22" min="2021-4-19"/>
                          </div>
                          <div class="form-group">
                            <input class="form-control" type="text" autocomplete="off" name="name" id="name" onblur="rname()" required="true" placeholder="Name"/>
                          </div>
                          <div class="form-group">
                          <input class="form-control" type="text" autocomplete="off" name="loc" id="loc" onblur="loca()" placeholder="Location" required="true"/>
                          </div>
                          <div class="form-group">
                          <select name="trans" class="form-control" required>
                          <option value="" disabled selected>Choose Transmission Type</option>
                          <option value="Automatic" >Automatic</option>
                          <option value="Manual">Manual</option>
                          <option value="Semi-Automatic and Dual Cluch">Semi-Automatic and Dual Cluch</option></select>  
                          </div>

             
       
                          <input class="btn btn-red btn-lg w-100" name="send" type="submit" value="Book now" onsubmit="rname();loca();">
                        </form>
                      </div>
                    </div>
                  </div>

  
                  <!-- The expanding image container -->

             
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