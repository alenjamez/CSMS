<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
  ?>

<!DOCTYPE html>
<html lang="zxx">
  <head>
    <title>Car Showroom Management System </title>
    <link rel="stylesheet" href="assets/css/master.css">
    <script src="assets/js/separate-js/html5shiv-3.7.2.min.js" type="text/javascript"></script>
    <script>
          function dates(){
            n =  new Date();
            y = n.getFullYear();
            m = n.getMonth() + 1;
            d = n.getDate();
            a=d+30;
            if(d<10){
              var d=""+0+d;
            }
            if(m<10){
              var mn=""+0+m;
            }
            document.getElementById("dat").min = y + "-" + mn + "-" + d;
            if(a>30){
              a=a-30;
              m=m+1;
              if(m>12){
                m=m-12;
               }
               if(m<10){
              var mn=""+0+m;
              }
            }
            if(a<10){
              var a=""+0+a;
            }
            document.getElementById("dat").max = y+ "-" + mn + "-" + a;
        }
      function msge(){
          document.getElementById("err").innerHTML = "Book for your vehicle sevice";
        }
        function one(){
          document.getElementById("err").innerHTML = "working";
        }
      function test3(value)
        {
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function()
          {
              if (this.readyState == 4 && this.status == 200) 
              {
                document.getElementById("mod").innerHTML=this.responseText;
              }
          };
          xhttp.open("GET", "Admin/selectmodel.php?id="+value, true);
          xhttp.send();
        }
        function kilmtr()
        {
          var k=document.getElementById("km").value;
          if ((k>1) && (k<300000)){
            document.getElementById("err").innerHTML="";
            document.getElementById("km").style.borderColor = "";
          }
          else{
            document.getElementById("err").innerHTML="* Enter a valid Kilometre";
            document.getElementById("km").style.borderColor = "red";
          }
        }
      
            function fun(){
                var car=document.getElementById("car").value;
                alert(car);
                var date=document.getElementById("dat").value;
                alert(date);
                var km=document.getElementById("km").value;
                alert(km);
                var ser=document.getElementById("ser").value;
                alert(ser);
                var pick=document.getElementById("pick").value;
                alert(pick);
            var frm = document.getElementById("servfrm")
            frm.setAttribute("action","servadd.php?car="+car+"&date="+date+"&km="+km+"&ser="+ser+"&pick="+pick);
            frm.submit();
            }
            
    </script>
  </head>
  <body class="page" onload="dates()">
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
                    <h1 class="b-title-page">Service</h1>
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Service</li>
                      </ol>
                      <!-- end breadcrumb-->
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="l-main-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="widget section-sidebar bg-gray widget-selecr-contact">
                            <h3 class="widget-title bg-dark"><i class="ic icon_mail_alt"></i>Book for Service</h3>
                            <div class="widget-content">
                                <label id="err" style="color:red;"></label>
                                <div class="widget-inner">
                                    <form method="post" action="" id="servfrm">
                                    <div class="form-group">
                                        <select class="form-control" id="car" name="car" onChange="test3(this.value)" onclick="msge()" required>
                                        <option value="" disabled selected>Choose Car</option> 
                                            <?php 
                                            $sql3="select car_id,name from tbl_car where status=1";
                                            $res=mysqli_query($con,$sql3);
                                            while($row=mysqli_fetch_array($res))
                                            {
                                                echo '<option value="'.$row['car_id'].'">'.$row['name'].'</option>';
                                            }
                                            ?></select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="mod" id="mod" required>
                                        <option value="" disabled selected>Choose model</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" autocomplete="off" name="km" id="km" placeholder="Kilometres" onblur="kilmtr()" required="true"/>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="date"  name="dat" id="dat" max="" min="" onblur="on()" required/>
                                    </div>
                                    <div class="form-group">
                                        <select name="ser" id="ser" class="form-control" required>
                                        <option value="" disabled selected>Choose service Type</option>
                                        <option value="First Service" >First Service</option>
                                        <option value="Second Service">Second Service</option>
                                        <option value="Third Service">Third Service</option>
                                        <option value="Half  Yearly">Half  Yearly</option>
                                        <option value="Yearly">Yearly</option>
                                        <option value="Special Case">Special Case</option>
                                        </select>  
                                    </div>
                                    <div class="form-group">
                                        <p>Do you need a pickup.(*charges applied)</p>
                                        <input type="radio" style="margin-left:20px" id="pick" name="pick" value="yes"  >Yes&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" id="pick" name="pick" value="no">No
                                    </div>
                                    <div class="form-group"> 
                                    <input type="button" class="btn btn-red btn-lg w-100" value="Book Now" onclick="fun()">
                                    <!-- <input type="submit" class="btn btn-red btn-lg w-100" name="submit" id="submit" value="Book now"> -->
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="b-filter-goods">
                            <div class="row justify-content-between align-items-center">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once('includes/footer.php');?>
    </div>
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
<?php
// if(isset($_POST['submit']))
// {
//    if(isset($_SESSION['user']))
//      {
//        $lid=$_SESSION['logid'];
//        $car=$_POST['car'];
//        $date=$_POST['dat'];
//        $km=$_POST['km'];
//        $ser=$_POST['ser'];
//        $pick=$_POST['pick'];
//        $query1=mysqli_query($con,"select * from tbl_car where name=$car");
//        $carid=mysqli_fetch_array($query1)['car_id'];
//        $que="insert into  tbl_service(car_id,kilomtrs,service_no,date,pickup,login_id) value($carid,$km,'$ser','$date','$pick',$lid)";
//        die($que);
//        $query3=mysqli_query($con,$que);
//            if ($query3) {
//            echo '<script>alert("Your booking has successfully send.")</script>';
//            echo "<script>window.location.href='car-list.php'</script>";
//              }
//              else{
//                  $msg="Something Went Wrong. Please try again";
//                }
//      }
//        else{
//          header("location:login.php?msg=");
//        }
//    }
?>