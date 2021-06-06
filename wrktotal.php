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
            function update(id){
                var ser="service";
            var amt=document.getElementById("value").value;
            var frm = document.getElementById("frmm1")
            frm.setAttribute("action","payment.php?id="+id+"&amt="+amt+"&typ="+ser);
            frm.submit();
            }
                    
    </script>
    <style>
  input[name="fnsh"]{
    color:white;
    background-color:green;
    margin-left:1000px;
    border:none;
  }
  input[name="fnsh"]:hover{
    color:white;
    background-color:green;
    margin-left:1000px;
    border:none;
  }
    </style>
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
                    <div class="col-lg-12">
                            <h3>Checkout</h3><br>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr >
                                        <th >Sl no</th>
                                        <th >Work</th>
                                        <th >Price(&#x20B9;)</th>
                                        <th >Labour charges(&#x20B9;)</th>
                                        <th >Total(&#x20B9;)</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $count=1;
                                        $sql4="select sr_id from tbl_service where login_id=$lid";
                                        $res1=mysqli_query($con,$sql4);
                                        $ids=mysqli_fetch_array($res1)['sr_id'];
                                        $query4=mysqli_query($con,"select * from tbl_serwork where sr_id=$ids and status='Finished'");
                                        while ($rows=mysqli_fetch_array($query4)) {
                                            $sr=$rows['wrk_id'];
                                            echo "<tr><td>";
                                            echo $count;
                                            echo "</td><td>";
                                            echo $rows['work'];
                                            echo "</td><td>";
                                            echo $rows['rate'];
                                            echo "</td><td>";
                                            echo $rows['charge'];
                                            echo "</td><td>";
                                            echo $rows['charge']+$rows['rate'];
                                            $count=$count+1;
                                        }
                                    ?>
                                    </tr><tr><td colspan="2"></td>
                                    <td>
                                    <?php
                                    $query6=mysqli_query($con,"select sum(rate) as sumr from tbl_serwork where sr_id=$ids and status='Finished'");
                                    $totrt=mysqli_fetch_array($query6)['sumr'];
                                    echo $totrt;
                                    echo "</td><td>";
                                    $query5=mysqli_query($con,"select sum(charge) as summ from tbl_serwork where sr_id=$ids and status='Finished'");
                                    $totchrg=mysqli_fetch_array($query5)['summ'];
                                    echo $totchrg;
                                    echo "</td><td>";
                                    $total=$totrt+$totchrg;
                                    echo $total;
                                    ?>
                                    </td></tr>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                            <div class="row">
                            <form id="frmm1" method="post">
                                <input type="text" id="value" value="<?php echo $total;?>" hidden>
                            <?php 
                            $query5=mysqli_query($con,"select status from tbl_service where sr_id=$ids");
                            $sts=mysqli_fetch_array($query5)['status'];
                            if($sts=="Finished"){
                              ?>
                              <input class="btn btn-sm btn-primary" type="Button" name="fnsh" value="Pay Now" id="<?php echo $sr; ?>" onclick="update(this.id)" ><?php
                            }
                            else{
                              ?><input class="btn btn-sm btn-primary" type="Button" name="fnsh" value="Pay Now" id="" onclick=""disabled><?php
                            }
                            ?>
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