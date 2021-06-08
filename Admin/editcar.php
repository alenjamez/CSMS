<?php
ob_start();
include("../includes/dbconnection.php");
 session_start();
 $carid=$_GET['cid'];
 $mid=$_GET['mid'];
 $trans=$_GET['tran'];
 $fuel=$_GET['fuel'];
 $msg=$_GET['msg'];
 if(isset($_SESSION['user']))
 {
     $sql30="select * from tbl_car where car_id='$carid'";
     $res=mysqli_query($con,$sql30);
     while($row=mysqli_fetch_array($res))
      {
        $name=$row["name"];
        $cartype=$row["car_type"];
        $ground=$row["ground"];
        $length=$row["length"];
        $width=$row["width"];
        $heigth=$row["heigth"];
        $seat=$row["seat"];
        $boot=$row["bootspace"];
        $ac=$row["ac"];
        $capacity=$row["capacity"];
        $display=$row["steering"];
        $airbag=$row["airbag"];
        $emission=$row["enc"];
        $desc=$row["description"];

      }
      $sql6="select * from tbl_transmission where type='$trans' and fuel='$fuel' and car_id='$carid'";
      $res6=mysqli_query($con,$sql6);
      while($row6=mysqli_fetch_array($res6)){
      $bhp=$row6["bhp"];
      $millage=$row6["millage"];
      $price=$row6["price"];
      $cc=$row6["enginecc"];
      $eng=$row6["engtype"];
      $gear=$row6["gearno"];
      }
 ?>
 <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CSMS</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../style/form.css" rel="stylesheet">
  <script>
function len(value)
        {
        var ph=value;
        var ph1=/^([0-9])+$/;
        if((ph.match(ph1))&& (ph>99) && (ph<5001))
            {
                document.getElementById("error").innerHTML="";
        
            }
        else
            {
                document.getElementById("error").innerHTML="* value must be between 100 and 5000";
                document.getElementById("error").style.color = "red";
            return false;
            }
        }
        function len1(value)
        {
        var ph=value;
        var ph1=/^([0-9])+$/;
        if((ph.match(ph1))&& (ph>1) && (ph<10))
            {
                document.getElementById("error").innerHTML="";
        
            }
        else
            {
                document.getElementById("error").innerHTML="* value must be between 1 and 10";
                document.getElementById("error").style.color = "red";
            return false;
            }
        }
        function fuel(value)
        {
        var ph=value;
        var ph1=/^([0-9])+$/;
        if((ph.match(ph1))&& (ph>30) && (ph<100))
            {
                document.getElementById("error").innerHTML="";
        
            }
        else
            {
                document.getElementById("error").innerHTML="* value must be between 30 and 100";
                document.getElementById("error").style.color = "red";
            return false;
            }
        }   
        function rname(value)
        {
        var nam=value;
        var nam1=/^[a-zA-Z][a-zA-Z ]+$/;
        if(nam.match(nam1))
            {
                document.getElementById("error").innerHTML="";
        
            }
        else
            {
                document.getElementById("error").innerHTML="* Must only contain characters";
                document.getElementById("error").style.color = "red";
            return false;
            }
        }
        function des(value)
        {
        var nam=value;
        var nam1=/^[a-zA-Z ]+$/;
        if(nam.match(nam1))
            {
                document.getElementById("error").innerHTML="";
        
            }
        else
            {
                document.getElementById("error").innerHTML="* Must only contain characters";
                document.getElementById("error").style.color = "red";
            return false;
            }
        }
        function emmis(value)
        {
        var nam=value;
        var nam1=/^[B]{1}[S]{1}[a-zA-Z ]{2}+$/;
        if(nam.match(nam1))
            {
                document.getElementById("error").innerHTML="";
        
            }
        else
            {
                document.getElementById("error").innerHTML="* Must only contain characters";
                document.getElementById("error").style.color = "red";
            return false;
            }
        }
        function mill(value)
        {
        var ph=value;
        var ph1=/^([0-9])+$/;
        if((ph.match(ph1))&& (ph>0) && (ph<40))
            {
                document.getElementById("error").innerHTML="";
        
            }
        else
            {
                document.getElementById("error").innerHTML="* value must be between 1 and 40";
                document.getElementById("error").style.color = "red";
            return false;
            }
        }    
        function engbhp(value)
        {
        var ph=value;
        var ph1=/^[a-zA-Z0-9@ ]+$/;;
        if(ph.match(ph1))
            {
                document.getElementById("error").innerHTML="";
        
            }
        else
            {
                document.getElementById("error").innerHTML="* value can contain number charecter and @ ";
                document.getElementById("error").style.color = "red";
            return false;
            }
        } 
        function engty(value)
        {
        var ph=value;
        var ph1=/^[a-zA-Z0-9 ]+$/;;
        if(ph.match(ph1))
            {
                document.getElementById("error").innerHTML="";
        
            }
        else
            {
                document.getElementById("error").innerHTML="* value can contain number and charecter";
                document.getElementById("error").style.color = "red";
            return false;
            }
        } 
        function cash(value)
        {
        var ph=value;
        var ph1=/^[0-9 ]+$/;;
        if((ph.match(ph1))&& (ph>100000))
            {
                document.getElementById("error").innerHTML="";
        
            }
        else
            {
                document.getElementById("error").innerHTML="* value must be grater than 100000";
                document.getElementById("error").style.color = "red";
            return false;
            }
        } 
  </script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                 <i class="fal fa-car"></i>
                </div>
                <div class="sidebar-brand-text mx-3">URCARZ</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
                       <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <span>Employee</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="addemp.php?msg=">Add Employee</a>
                        <a class="collapse-item" href="viewemp.php?msg=">View Details</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <span>Car</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="addcar.php?msg=">Add car</a>
                        <a class="collapse-item" href="managecar.php?msg=">Manage Details</a>
                    </div>
                </div>
            </li>


            <!-- Nav Item - Service -->
            <li class="nav-item">
            <a class="nav-link" href="service.php">
                    <span>Service</span>
                </a>
            </li>

            <!-- Nav Item - Test Drives -->
            <li class="nav-item">
                <a class="nav-link" href="testdrive.php?msg=">
                    <span>Test Drive</span></a>
            </li>

            <!-- Nav Item - Sales -->
            <li class="nav-item">
              <a class="nav-link" href="sales.php">
              <span>Sales</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <!-- <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->



                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle"
                                    src="../upload/profile/admin.jpg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="../logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Add Car</h1>
                </div>
                <!-- /.container-fluid -->
                <div class="tab">
      <button class="tablinks" style="margin-left:280px" onclick="openCity(event, 'car')" id="defaultOpen">Car Details</button>
      <button class="tablinks" onclick="openCity(event, 'colour')">Colour</button>
      <!-- <button class="tablinks" onclick="openCity(event, 'Image')">Image</button> -->
      <button class="tablinks" onclick="openCity(event, 'fuel')">Transmission</button>
      </div><span style="color:#008000; margin-left:20px" id="error"><?php echo $msg;?></span><br>
    </div>

    <div id="car" class="tabcontent">
      <div class="container bootstrap snippet">
        <div class="row">
  	      <div class="col-sm-6">
            <form class="form" method="post" id="details1" enctype="multipart/form-data">
	          <label style="margin-top:45px;">Name</label><input type="text" onblur="rname(this.value)" name="name" style="margin-top:50px;" value="<?php echo $name ?>" required><br>
            <label >Car Type</label><select name="cartype" required>
              <option value="<?php echo $cartype ?>"><?php echo $cartype ?></option>
              <option value="Sedan">Sedan</option>
              <option value="HatchBack">HatchBack</option>
              <option value="SUV">SUV</option>
              <option value="MUV">MUV</option>
              <option value="Luxury">Luxury</option></select>
		        <label>Ground<br>Clearence</label><input type="text" name="bodytype" onblur="len(this.value)" required value="<?php echo $ground; ?>"><br>
            <label>Car Lenght</label><input type="text" name="length" required onblur="len(this.value)" value="<?php echo $length; ?>"><br>
  	        <label>Car Width</label><input type="text" name="width" required onblur="len(this.value)"  value="<?php echo $width; ?>"><br>
            <label>Car Height</label><input type="text" name="heigth" required onblur="len(this.value)" value="<?php echo $heigth; ?>"><br>
            <label>No of seats</label><input type="text" name="seat" required onblur="len1(this.value)" value="<?php echo $seat; ?>"><br>
          </div>
    	    <div class="col-sm-6">
            <div class="tab-content">
              <div class="tab-pane active" id="home"><br><br>

                <label>No of Airbag</label><input type="text" name="airbag" required onblur="len1(this.value)" value="<?php echo $airbag; ?>"><br>
                <label>Boot Space</label><input type="text" name="boot" required onblur="len(this.value)" value="<?php echo $boot; ?>"><br>
                <label>Fuel Capacity</label><input style="margin-top:10px" type="text" name="capacity" onblur="fuel(this.value)" required value="<?php echo $capacity; ?>"><br>
                <label>Air Conditioner</label><input type="text"name="ac" readonly required value="<?php echo $ac; ?>"><br>
                <label>Power Steering</label><input type="text"name="display" readonly required value="<?php echo $display; ?>"><br>
                <label>Emission Norm </label><input type="text" name="emmi" onblur="emmis(this.value)" id="emmi" required value="<?php echo $emission; ?>"><br>
                <label>Description </label><textarea name="desc" id="desc" onblur="des(this.value)" required><?php echo $desc; ?></textarea><br><br>
	              <input type="submit" name="Add1" value="Update">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="colour" class="tabcontent"style="margin-bottom:200px;">
      <div class="container bootstrap snippet">
        <div class="row">
  	      <div class="col-sm-6">
            <form class="form" method="post" id="details3" enctype="multipart/form-data">
            <label name="car" style="margin-top:50px;">Car</label>
            <select id="colour" name="colour" style="margin-top:50px;" required>
              <option value="" disabled selected>Choose Colour</option> 
              <?php 
            $sql3="select * from colour where status=1 and car_id='$carid'";
            $res=mysqli_query($con,$sql3);
            while($raw=mysqli_fetch_array($res))
            {
              echo '<option value="'.$raw['color_id'].'">'.$raw['colour'].'</option>';
            }?>
            </select><br>
            <input type="submit" name="Add3" value="Delete" ></form>
          </div>
        </div>
      </div>
    </div>

    <div id="fuel" class="tabcontent">
      <div class="container bootstrap snippet">
        <div class="row">
  	      <div class="col-sm-6">
            <form class="form" method="post" id="details3" enctype="multipart/form-data">
            <label style="margin-top:50px;">Fuel Type</label><select name="fueltype" required style="margin-top:50px;">
              <option value="" disabled selected><?php echo $fuel?></option>
              <option value="Petrol">Petrol</option>
              <option value="Disel">Disel</option>
              <option value="CNG">CNG</option>
              <option value="Electric">Electric</option></select>
            <label>Transmission </label><select name="gear" required>
              <option value="" disabled selected><?php echo $trans?></option>
              <option value="Automatic" >Automatic</option>
              <option value="Manual">Manual</option>
              <option value="Semi-Automatic and Dual Cluch">Semi-Automatic and Dual Cluch</option></select>     
              <label>Engine Type</label><input style="margin-top:10px" type="text" name="engtype" value="<?php echo $eng?>"><br>
              <label>No of Gear</label><input type="text" name="gearno" id="gearno" value="<?php echo $gear?>" required><br>
              
          </div>

    	    <div class="col-sm-6">
            <div class="tab-content">
              <div class="tab-pane active" id="home"><br><br>
                <label>Millage</label><input type="text" name="millage"  value="<?php echo $millage?>" onblur="mill(this.value)" required><br>
                <label>Engine CC</label><input type="text" name="power" onblur="len(this.value)" value="<?php echo $cc?>" required><br>
  	            <label>BHP</label><input type="text" name="torque" onblur="engbhp(this.value)" value="<?php echo $bhp?>" required><br>
                <label>Car Price</label><input type="text" name="price" onblur="cash(this.value)" value="<?php echo $price?>" required><br><br>     
	              <input type="submit" name="Add4" value="Update">
                </form>    
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script>
  function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
  </script>

</body>

</html>
<?php
  if(array_key_exists('Add1', $_POST))
  {
   $name=$_POST["name"];
   $cartype=$_POST["cartype"];
   $bodytype=$_POST["bodytype"];
   $length=$_POST["length"];
   $width=$_POST["width"];
   $heigth=$_POST["heigth"];
   $seat=$_POST["seat"];
   $boot=$_POST["boot"];
   $ac=$_POST["ac"];
   $capacity=$_POST["capacity"];
   $display=$_POST["display"];
   $airbag=$_POST["airbag"];
   $emission=$_POST["emmi"];
   $desc=$_POST["desc"];

   $sql1="UPDATE tbl_car SET name='$name',car_type='$cartype',ground='$bodytype',steering='$display',airbag=$airbag,ac='$ac',capacity=$capacity,length=$length,width=$width,heigth=$heigth,bootspace=$boot,enc='$emission',seat=$seat,description='$desc' WHERE car_id=$carid";
   $res3=mysqli_query($con,$sql1);
   if($res3){
    header("location:editcar.php?cid=$carid&mid=$mid&tran=$trans&fuel=$fuel&msg=* Successfully Updated");
    }
  }


  if(array_key_exists('Add3', $_POST))
  {
   $colour=$_POST["colour"];
   $sql10="UPDATE colour SET status=0 WHERE color_id=$colour";
   $res1=mysqli_query($con,$sql10);
   if($res1){
    header("location:editcar.php?cid=$carid&mid=$mid&tran=$trans&fuel=$fuel&msg=* Colour deleted");
    }
  }


  if(array_key_exists('Add4', $_POST))
  {
   $car=$_POST["car"];
   $model=$_POST["mod"];
   $fueltype=$_POST["fueltype"];
   $price=$_POST["price"];
   $engtype=$_POST["engtype"];
   $millage=$_POST["millage"];
   $gear=$_POST["gear"];
   $gearno=$_POST["gearno"];
   $power=$_POST["power"];
   $torque=$_POST["torque"];
   $sql8="UPDATE tbl_transmission SET enginecc=$power,bhp='$torque',millage=$millage,price=$price,engtype='$engtype',gearno=$gearno WHERE type='$trans' and fuel='$fuel' and car_id='$carid'";
  
   $res2=mysqli_query($con,$sql8);
   if($res2){
    header("location:editcar.php?cid=$carid&mid=$mid&tran=$trans&fuel=$fuel&msg=* Successfully Updated");
    }
  }
 }
 else{
	header("location:../login.php?msg=");
  }
?>