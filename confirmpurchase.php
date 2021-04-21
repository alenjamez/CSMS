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
.widget-inner {
  margin:10%;
  margin-top:0;
}

.widget-title {
    margin-right:10%;
    margin-left:10%;
}

.form-control:disabled, .form-control[readonly] {
    background-color: #e9ecef;
    color: black;
    text-align: center;
}
    </style>
     
<script src="/assets/js/separate-js/html5shiv-3.7.2.min.js" type="text/javascript"></script>
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
                        <li class="breadcrumb-item active" aria-current="page">Confirm Purchase</li>
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
        <?php 
        $carid=$_GET['cid'];
        $modid=$_GET['mid'];
        $trans=$_GET['tran'];
        $fuel=$_GET['fuel'];
        $query=mysqli_query($con,"select * from tbl_car where car_id='$carid'");
while ($row=mysqli_fetch_array($query)) {
  $name=$row['name'];
  $query1=mysqli_query($con,"select * from tbl_model where model_id='$modid'");
  while ($row1=mysqli_fetch_array($query1)) {
        $model=$row1['model'];
  }
  $sql6="select * from tbl_transmission where type='$trans' and fuel='$fuel'";
  $res6=mysqli_query($con,$sql6);
  while($row6=mysqli_fetch_array($res6)){
  $bhp=$row6["bhp"];
  $price=$row6["price"];
  $cc=$row6["enginecc"];
  $eng=$row6["engtype"];
  }
}
?>
<?php

    $sql="select * from tbl_registration where login_id='$lid'";
    $res=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($res))
      {
        $uname=$row['name'];
        $email=$row['email'];
        $phno=$row['phone'];
        $loc=$row['location'];
      }

?>
                  <div class="l-main-content">
                  <div class="widget section-sidebar bg-gray widget-selecr-contact" style="margin-top:3%">
                      <h3 class="widget-title bg-dark">Confirm Order</h3>
                    <div class="widget-content">
                      <div class="widget-inner">
                   <form method="post" enctype="multipart/form-data">
                          <div class="form-group">
                            <input class="form-control" type="text" autocomplete="off" name="name" id="name" value="<?php echo $name;?>"  required="true" Readonly>
                          </div>
                          <div class="form-group">
                            <input class="form-control" type="text" autocomplete="off" name="name" id="name"  required="true" Readonly/>
                          </div>
                          <div class="form-group">
                            <input class="form-control" type="text" autocomplete="off" name="name" id="name" " required="true" Readonly/>
                          </div>
                          <div class="form-group">
                          <input class="form-control" type="text" autocomplete="off" name="loc" id="loc"  Readonly required="true"/>
                          </div>
                          <div class="form-group">
                          <select name="trans" class="form-control" required>
                          <option value="" disabled selected>Choose Colour</option>
                          <?php
                                $query5=mysqli_query($con,"select * from colour where car_id='$carid'");
                                while($rows=mysqli_fetch_array($query5)){
                                 echo "<option value=",$rows['color_id'],">",$rows['colour'],"</option>";
                                }
                          
                          ?></select>  
                          </div>

             
       
                          <input class="btn btn-red btn-lg w-100" name="send" type="submit" value="Buy now" onsubmit="">
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