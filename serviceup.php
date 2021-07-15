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
        $que="insert into tbl_order(car_id,login_id,model_id,color_id,gear,fuel,house,post,pin,price) VALUES ('$carid','$uid','$modid','$color','$trans','$fuel','$house','$post',$pin,'$price')";
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
        function update(id){
            var frm = document.getElementById("frmm")
            frm.setAttribute("action","serapprv.php?id="+id);
            frm.submit();
        }
        function update1(id){
            var frm = document.getElementById("frmm1")
            frm.setAttribute("action","wrktotal.php?id="+id);
            frm.submit();
        }
</script>
<style>
  #fnsh{
    color:white;
    background-color:green;
    margin-left:500px;
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
                    <h1 class="b-title-page">Car details</h1>
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
        <!-- end .b-title-page-->
          <div class="l-main-content">
            <div class="container">
              <div class="row">
                <div class="col-lg-5">
                  <div class="widget section-sidebar bg-gray widget-selecr-contact">
                    <h3 class="widget-title bg-dark"><i class="ic icon_mail_alt"></i>Book for Service</h3>
                    <div class="widget-content">
                      <label id="err" style="color:red;"></label>
                      <div class="widget-inner">
                        <form method="post" action="servadd.php" id="servfrm">
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
                            <!-- <input type="button" class="btn btn-red btn-lg w-100" value="Book Now" onclick="fun()"> -->
                            <input type="submit" class="btn btn-red btn-lg w-100" name="submit" id="submit" value="Book now">
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              <div class="col-lg-7">
                  <div class="b-filter-goods">
                    <div class="row justify-content-between align-items-center">
                      <h3>Service works</h3>
                      <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th >Sl no</th>
                              <th >Work</th>
                              <th >Priority</th>
                              <th >Price(&#x20B9;)</th>
                              <th >Labour charges(&#x20B9;)</th>
                              <th >Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                            $count=1;
                            $sql4="select sr_id from tbl_service where login_id=$lid";
                            $res1=mysqli_query($con,$sql4);
                            $ids=mysqli_fetch_array($res1)['sr_id'];
                            $query4=mysqli_query($con,"select * from tbl_serwork where sr_id=$ids and status='pending'");
                            while ($rows=mysqli_fetch_array($query4)) {
                              $sr=$rows['wrk_id'];
                              echo "<tr><td>";
                              echo $count;
                              echo "</td><td>";
                              echo $rows['work'];
                              echo "</td><td>";
                              if($rows['priority']==T){
                                echo "Top";
                              }
                              if($rows['priority']==M){
                                echo "Medium";
                              }
                              if($rows['priority']==L){
                                echo "Low";
                              }
                              echo "</td><td>";
                              echo $rows['rate'];
                              echo "</td><td>";
                              echo $rows['charge'];
                              ?>
                              <form action="servadd.php" method="POST" id="frmm">
                                  </td><td><input class="btn btn-sm btn-primary" type="Button" value="Approve" id="<?php echo $sr; ?>" onclick="update(this.id)" >
                                  </td></tr>
                              </form><?php
                              $count=$count+1;
                            }
                            ?>
                          </tbody>
                        </table>
                        <p style="color:green">* Priorities<br>
                          Top    - Work should be done immediatly.<br>
                          Medium - If the work is done it will be good for car.<br>
                          Low    - Can be skipped for next service.</p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <form id="frmm1">
                            <?php 
                            $query5=mysqli_query($con,"select status from tbl_service where sr_id=$ids");
                            $sts=mysqli_fetch_array($query5)['status'];
                            if($sts=="Finished"){
                              ?>
                              <b>Work completed pay now -></b><input class="btn btn-sm btn-primary" type="Button" id="fnsh" value="Pay Now" onclick="update1(this.id)" ><?php
                            }
                            else{
                              ?><input class="btn btn-sm btn-primary" type="Button" id="fnsh" value="Pay Now" id="" onclick=""disabled><?php
                            }
                            ?></form>
                  </div>
                </div>
              </div>
          </div>
        
       
            
            
         <?php include_once('includes/footer.php');?>
          <!-- .footer-->

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