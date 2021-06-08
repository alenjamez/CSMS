<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['send']))
      {
        $uid=$_SESSION['logid'];
        $desc=$_POST['rvw'];
        $que="INSERT INTO tbl_review(description,login_id) VALUES ('$desc',$uid)";
        $query3=mysqli_query($con,$que);
        
        
            if ($query3) {
                header("location:index.php"); 
              }
              else{
                echo '<script>alert("Something Went Wrong. Please try again")</script>';
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
            input[type="submit"]{
                color:white;
                background-color:green;
                width:100px;
                height:40px;
                border:none;
                margin-left:300px;
                margin-top:20px;
            }
            #cont{
                padding:50px;
                margin-left:300px;
                margin-right:300px;
                border-radius:15px;
                background-color:rgba(18, 24, 32, 0.85);;

            }
    </style>
    <script>
        function reason()
        {
        var rsn=document.getElementById("rvw").value;
        var rsn1=/^[a-zA-Z]+(\s[a-zA-Z]+)+(\s[a-zA-Z]+)?$/;
        if(rsn.match(rsn1))
            {
                document.getElementById("err").innerHTML = "";
                document.getElementById("rvw").style.borderColor="#dddddd";
                return true;
            }
            else
            {
                document.getElementById("err").innerHTML = "* Must only contain letters";
                document.getElementById("rvw").style.borderColor = "red";
                document.getElementById("rvw").focus();
                return false;
            }
        }

    </script>
     
<script src="/assets/js/separate-js/html5shiv-3.7.2.min.js" type="text/javascript"></script>
<script>
     
</script>
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
                        <li class="breadcrumb-item active" aria-current="page">Review</li>
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
            <div class="widget section-sidebar bg-gray widget-selecr-contact" style="margin-top:3%">
                <div class="widget-content">
                    <div class="widget-inner">
                        <div id="cont">
                        <p style="color:white"><b>Share your experience</b></p>
                            <form method="post" enctype="multipart/form-data">
                                <textarea class="form-control" name="rvw" id="rvw" onblur="reason()" cols="500" rows="5" required></textarea>
                                <span id="err" style="color:red"></span>
                                <input name="send" type="submit" value="Post" onsubmit="reason();">
                            </form>
    </div>
                    </div>
                </div>
            </div>
        </div>
          
         <?php include_once('includes/footer.php');?>
          <!-- .footer-->
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

</html>