<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
$carid=$_GET['cid'];
$modid=$_GET['mid'];
$trans=$_GET['tran'];
$fuel=$_GET['fuel'];
if(isset($_POST['send']))
 {
    if(isset($_SESSION['user']))
      {
        $uid=$_SESSION['logid'];
        $house=$_POST['house'];
        $pin=$_POST['pin'];
        $post=$_POST['post'];
        $color=$_POST['color'];
        $que="insert into tbl_order(car_id,login_id,model_id,color_id,gear,fuel,house,post,pin) VALUES ('$carid','$uid','$modid','$color','$trans','$fuel','$house','$post',$pin)";
        $query3=mysqli_query($con,$que);
        
            if ($query3) {
                $li=mysqli_insert_id($con);
                header("location:billgen.php?cid=$carid&mid=$modid&tran=$trans&fuel=$fuel&oid=$li&lodid=$uid"); 
              }
              else{
                echo '<script>alert("Something Went Wrong. Please try again")</script>';
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
<script>
     function rname()
        {
        var nam=document.getElementById("house").value;
        var nam1=/^[a-zA-Z]+$/;
        
        if(nam=="")
            {
                document.getElementById("house").style.borderColor = "red";
                document.getElementById("name").focus();
            return false;
            }
        if(nam.match(nam1))
            {
              document.getElementById("house").style.borderColor = "#dddddd";
        
            }
        else
            {
                document.getElementById("house").style.borderColor = "red";
                document.getElementById("house").focus();
            return false;
        
            }
        }
        function loca()
        {
        var loc=document.getElementById("post").value;
        var loc1=/^[a-zA-Z]+$/;
        if(loc=="")
           {
                document.getElementById("post").style.borderColor = "red";
                document.getElementById("post").focus();
            }
        if(loc.match(loc1))
            {
                document.getElementById("post").style.borderColor="#dddddd";
        
            }
        else
            {
                document.getElementById("post").style.borderColor = "red";
                document.getElementById("post").focus();
            }
        }
        function pinno()
        {
        var pino=document.getElementById("pin").value;
        var pino1=/^[0-9]{6,6}$/;
        if(pino=="")
           {
                document.getElementById("pin").style.borderColor = "red";
                document.getElementById("pin").focus();
            }
        if(pino.match(pino1))
            {
                document.getElementById("pin").style.borderColor="#dddddd";
        
            }
        else
            {
                document.getElementById("pin").style.borderColor = "red";
                document.getElementById("pin").focus();
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
                            <input class="form-control" type="text" autocomplete="off"  value="<?php echo $model;?>" required="true" Readonly/>
                          </div>
                          <div class="form-group">
                            <input class="form-control" type="text" autocomplete="off"  value="<?php echo $trans;?>"required="true" Readonly/>
                          </div>
                          <div class="form-group">
                          <input class="form-control" style="text-align: center" type="text" autocomplete="off" name="loc" id="loc" value="<?php echo $fuel;?>" Readonly required="true"/>
                            </div>
                           
                          <div class="form-group">
                          <select name="color" class="form-control" style="text-align: center" required>
                          <option value="" disabled selected>Choose Colour</option>
                          <?php
                                $query5=mysqli_query($con,"select * from colour where car_id='$carid'");
                                while($rows=mysqli_fetch_array($query5)){
                                 echo "<option value=",$rows['color_id'],">",$rows['colour'],"</option>";
                                }
                          
                          ?></select>  
                          </div>
                            <div class="form-group">
                          <input class="form-control" style="text-align: center" type="text" autocomplete="off" name="house" id="house" onblur="rname()" placeholder="House name" required="true"/>
                            </div>
                            <div class="form-group">
                            <input class="form-control" style="text-align: center" type="text" autocomplete="off" name="post" id="post" onblur="loca()" placeholder="Post Office" required="true"/>
                            </div>
                            <div class="form-group">
                            <input class="form-control" style="text-align: center" type="text" autocomplete="off" name="pin" id="pin" onblur="pinno()" placeholder="PIN CODE" required="true"/>
                            </div>

             
       
                          <input class="btn btn-red btn-lg w-100" name="send" type="submit" value="Pay &#x20B9;<?php echo $price?>" onsubmit="rname();loca();pinno();">
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