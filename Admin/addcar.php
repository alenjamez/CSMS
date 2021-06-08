<!DOCTYPE html>
<?php
ob_start();
 $con=mysqli_connect("localhost","root","","car showroom") or die("couldn't connect");
 session_start();
 $msg=$_GET['msg'];
 if(isset($_SESSION['user']))
 {
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
    xhttp.open("GET", "selectmodel.php?id="+value, true);
    xhttp.send();
  }
  function Val(id)
        {
            var fileInput = document.getElementById(id);
            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
            if(!allowedExtensions.exec(filePath)){
            fileInput.value = '';
            document.getElementById("error").innerHTML="* Must be only .jpg,.jepg,.png file";
            document.getElementById("error").style.color = "red";
	        return false;
       }
      else{
        document.getElementById("error").innerHTML="";
        return true;
      }
  }
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
        var ph1=/^[a-zA-Z0-9@ ]+$/;
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
        var ph1=/^[a-zA-Z0-9 ]+$/;
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
        var ph1=/^[0-9 ]+$/;
        if((ph.match(ph1))&& (ph>1000000))
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
            <a class="nav-link" href="">
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
      <button class="tablinks" style="margin-left:200px" onclick="openCity(event, 'car')" id="defaultOpen">Car Details</button>
      <button class="tablinks" onclick="openCity(event, 'model')">Model</button>
      <button class="tablinks" onclick="openCity(event, 'colour')">Colour</button>
      <button class="tablinks" onclick="openCity(event, 'Image')">Image</button>
      <button class="tablinks" onclick="openCity(event, 'fuel')">Transmission</button>
    </div><span style="color:#008000; margin-left:20px" id="error"><?php echo $msg;?></span><br>

    <div id="car" class="tabcontent">
      <div class="container bootstrap snippet">
        <div class="row">
  	      <div class="col-sm-6">
            <form class="form" method="post" id="details1" enctype="multipart/form-data">
	          <label style="margin-top:45px;">Name</label><input type="text" name="name" onblur="rname(this.value)" style="margin-top:50px;" required><br>
            <label >Car Type</label><select name="cartype" required>
              <option value="">Choose car Type</option>
              <option value="Sedan">Sedan</option>
              <option value="HatchBack">HatchBack</option>
              <option value="SUV">SUV</option>
              <option value="MUV">MUV</option>
              <option value="Luxury">Luxury</option></select>
		        <label>Ground</label><input type="text" name="bodytype" onblur="len(this.value)" required><br>
            <label>Car Lenght</label><input type="text" name="length" onblur="len(this.value)" required><br>
  	        <label>Car Width</label><input type="text" name="width" onblur="len(this.value)" required><br>
            <label>Car Height</label><input type="text" name="heigth" onblur="len(this.value)" required><br>
            <label>No of seats</label><input type="text" name="seat" required onblur="len1(this.value)"><br>
          </div>
    	    <div class="col-sm-6">
            <div class="tab-content">
              <div class="tab-pane active" id="home"><br><br>
                <label>No of Airbag</label><input type="text" style="margin-top:10px" name="airbag" required onblur="len1(this.value)"><br>
                <label>Boot Space</label><input type="text" name="boot" onblur="len(this.value)" required><br>
                <label>Fuel Capacity</label><input  type="text" name="capacity" onblur="fuel(this.value)" required><br>
                <div class="radio">
                  <label>Air Conditioner</label>
                  <input style="margin-left:20px;" type="radio" name="ac" value="Yes" required>&nbsp;Yes
                  <input type="radio" name="ac" value="No">&nbsp;No
                </div>
                <div class="radio">
                  <label>Power Steering</label>
                  <input style="margin-left:20px;" type="radio" name="display" value="Yes" required>&nbsp;Yes
                  <input type="radio" name="display" value="No">&nbsp;No
                </div>
                <label>Emission Norm </label><input type="text" name="emmi" onblur="emmis(this.value)" id="emmi" required><br>
                <label>Description </label><textarea name="desc" id="desc" onblur="des(this.value)" required></textarea><br><br>
	              <input type="submit" name="Add1" value="Add">
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="model" class="tabcontent">
      <div class="container bootstrap snippet">
        <div class="row">
  	      <div class="col-sm-6">
            <form class="form" method="post" id="details2" enctype="multipart/form-data">
            <label name="car" style="margin-top:50px;">Car</label>
            <select id="seler" name="car" style="margin-top:50px;" required>
              <option value="" disabled selected>Choose Car</option> 
              <?php 
            $sql3="select car_id,name from tbl_car where status=1";
            $res=mysqli_query($con,$sql3);
            while($row=mysqli_fetch_array($res))
            {
              echo '<option value="'.$row['car_id'].'">'.$row['name'].'</option>';
            }?>
            </select><br>


            <label>Car Model</label><input type="text" name="model" onblur="rname(this.value)" required><br>
            <label>Wheel</label><input type="text" name="wheel" onblur="rname(this.value)" required><br>
            <div class="radio">
                  <label>Fog lamb</label><input type="radio" style="margin-left:20px;" name="fog" value="Yes" required>&nbsp;Yes
                  <input type="radio" name="fog" value="No">&nbsp;No
            </div>
            <div class="radio">
                  <label>Power start</label><input type="radio" style="margin-left:20px;" name="start" value="Yes" required>&nbsp;Yes
                  <input type="radio" name="start" value="No">&nbsp;No
            </div>
            <label>Sterio</label><input type="text" onblur="engty(this.value)" name="sterio"><br>

          </div>
    	    <div class="col-sm-6">
            <div class="tab-content">
              <div class="tab-pane active" id="home"><br><br>
                <div class="radio">
                  <label>Auto AC</label><input type="radio" style="margin-left:20px;" name="auto" value="Yes" required>&nbsp;Yes
                  <input type="radio" name="auto" value="No">&nbsp;No
                </div>
                <div class="radio">
                  <label>Sunroof</label><input type="radio" style="margin-left:20px;" name="sunroof" value="Yes" required>&nbsp;Yes
                  <input type="radio" name="sunroof" value="No">&nbsp;No
                </div>
                <div class="radio">
                  <label>Auto Headlamb</label><input type="radio" style="margin-left:20px;" name="headlamb" value="Yes" required>&nbsp;Yes
                  <input type="radio" name="headlamb" value="No">&nbsp;No
                </div>
                <div class="radio">
                  <label>Sensor</label><input type="radio" style="margin-left:20px;" name="sensor" value="Yes" required>&nbsp;Yes
                  <input type="radio" name="sensor" value="No">&nbsp;No
            </div>
            <div class="radio">
                  <label>Reverse Camera</label><input type="radio" style="margin-left:20px;" name="camera" value="Yes" required>&nbsp;Yes
                  <input type="radio" name="camera" value="No">&nbsp;No
            </div>
            <div class="radio">
                  <label>Power Window</label>
                  <input style="margin-left:20px;" type="radio" name="window" value="Front only" required>&nbsp;Front only
                  <input type="radio" name="window" value="Both">&nbsp;Both
                  <input type="radio" name="window" value="No">&nbsp;No
                </div>
	              <input type="submit" name="Add2" value="Add">
                </form>    
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="colour" class="tabcontent">
      <div class="container bootstrap snippet">
        <div class="row">
  	      <div class="col-sm-6">
            <form class="form" method="post" id="details3" enctype="multipart/form-data">
            <label name="car" style="margin-top:50px;">Car</label>
            <select id="sele" name="car" style="margin-top:50px;" required>
              <option value="" disabled selected>Choose Car</option> 
              <?php 
            $sql3="select car_id,name from tbl_car where status=1";
            $res=mysqli_query($con,$sql3);
            while($row=mysqli_fetch_array($res))
            {
              echo '<option value="'.$row['car_id'].'">'.$row['name'].'</option>';
            }?>
            </select><br>
            <label>Colour</label><input type="text" name="colour" onblur="rname(this.value)" required><br>
            <label>Car Image</label><input type="file" name="carimg"  id="carimg" onblur="Val(this.id)" required><br>
            <input type="submit" name="Add3" value="Add" ></form>
          </div>
        </div>
      </div>
    </div>

    <div id="Image" class="tabcontent">
      <div class="container bootstrap snippet">
        <div class="row">
  	      <div class="col-sm-6">
            <form class="form" method="post" id="details5" enctype="multipart/form-data">
            <label name="car" style="margin-top:50px;">Car</label>
            <select id="sele" name="car" style="margin-top:50px;" required>
              <option value="" disabled selected>Choose Car</option> 
              <?php 
            $sql3="select car_id,name from tbl_car where status=1";
            $res=mysqli_query($con,$sql3);
            while($row=mysqli_fetch_array($res))
            {
              echo '<option value="'.$row['car_id'].'">'.$row['name'].'</option>';
            }?>
            </select><br>
            <label>Image1</label><input type="file" name="car1" id="car1" required onblur="Val(this.id)"><br>
            <label>Image2</label><input type="file" name="car2" id="car2" required onblur="Val(this.id)"><br>
            <label>Interior1</label><input type="file" name="car3" id="car3" required onblur="Val(this.id)"><br>
            <label>Interior2</label><input type="file" name="car4" id="car4" required onblur="Val(this.id)"><br>
            <label>Interior3</label><input type="file" name="car5" id="car5" required onblur="Val(this.id)"><br>
          </div>
    	    <div class="col-sm-6">
            <div class="tab-content">
              <div class="tab-pane active" id="home"><br><br>
                <label>Interior4</label><input type="file" name="car6" id="car6" required onblur="Val(this.id)"><br>
                <label>Image3</label><input type="file" name="car7" id="car7" required onblur="Val(this.id)"><br>
                <label>Image4</label><input type="file" name="car8" id="car8" required onblur="Val(this.id)"><br>
                <label>Image5</label><input type="file" name="car9" id="car9" required onblur="Val(this.id)"><br>
                <label>Image6</label><input type="file" name="car10" id="car10" required onblur="Val(this.id)"><br>
	              <input type="submit" name="Add5" value="Add">
                </form>    
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="fuel" class="tabcontent">
      <div class="container bootstrap snippet">
        <div class="row">
  	      <div class="col-sm-6">
            <form class="form" method="post" id="details3" enctype="multipart/form-data">
            <label name="car" style="margin-top:50px;">Car</label><select id="seler" name="car" style="margin-top:50px;" onChange="test3(this.value)" required>
              <option value="" disabled selected>Choose Car</option> 
              <?php 
            $sql3="select car_id,name from tbl_car where status=1";
            $res=mysqli_query($con,$sql3);
            while($row=mysqli_fetch_array($res))
            {
              echo '<option value="'.$row['car_id'].'">'.$row['name'].'</option>';
            }
            ?></select><br>
            <label>Car Model</label><select name="mod" id="mod" required>
            <option value="" disabled selected>Choose model</option>
            </select><br>
            <label>Fuel Type</label><select name="fueltype" required>
              <option value="" disabled selected>Choose Fuel Type</option>
              <option value="Petrol">Petrol</option>
              <option value="Disel">Disel</option>
              <option value="CNG">CNG</option>
              <option value="Electric">Electric</option></select>
            <label>Transmission </label><select name="gear" required>
              <option value="" disabled selected>Choose Transmission Type</option>
              <option value="Automatic" >Automatic</option>
              <option value="Manual">Manual</option>
              <option value="Semi-Automatic and Dual Cluch">Semi-Automatic and Dual Cluch</option></select>     
              <label>Engine Type</label><input style="margin-top:10px" onblur="engty(this.value)" type="text" name="engtype"><br>
              
          </div>

    	    <div class="col-sm-6">
            <div class="tab-content">
              <div class="tab-pane active" id="home"><br><br>
                <label>No of Gear</label><input type="text" name="gearno" id="gearno" onblur="len1(this.value)" required><br>
                <label>Millage</label><input type="text" name="millage" onblur="mill(this.value)" required><br>
                <label>Engine CC</label><input type="text" name="power" onblur="len(this.value)" required><br>
  	            <label>BHP</label><input type="text" name="torque" onblur="engbhp(this.value)" required><br>
                <label>Car Price</label><input type="text" name="price" onblur="cash(this.value)"  required><br><br>     
	              <input type="submit" name="Add4" value="Add">
                </form>    
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
   $quer="select * from tbl_car where name='$name'";
   $re=mysqli_query($con,$quer);
   if(mysqli_num_rows($re)>0)
   {
       header("location:addcar.php?msg=* Car Already exist");
   }
   else{
    $sql1="insert into tbl_car (name,car_type,ground,steering,airbag,ac,capacity,length,width,heigth,bootspace,enc,seat,description) values ('$name','$cartype','$bodytype','$display',$airbag,'$ac',$capacity,$length,$width,$heigth,$boot,'$emission',$seat,'$desc')";
    $res=mysqli_query($con,$sql1);
    if($res){
      header("location:addcar.php?msg=* Successfully Added");
      }
    }
  }
  if(array_key_exists('Add2', $_POST))
  {
   $car=$_POST["car"];
   $model=$_POST["model"];
   $fog=$_POST["fog"];
   $wheel=$_POST["wheel"];
   $start=$_POST["start"];
   $auto=$_POST["auto"];
   $window=$_POST["window"];
   $sunroof=$_POST["sunroof"];
   $headlamb=$_POST["headlamb"];
   $camera=$_POST["camera"];
   $sensor=$_POST["sensor"];
   $sterio=$_POST["sterio"];


   $sql6="insert into tbl_model(model,wheel,fog_lamb,sensor,camera,powerstart,autoac,sunroof,headlamb,sterio,car_id,window) values('$model','$wheel','$fog','$sensor','$camera','$start','$auto','$sunroof','$headlamb','$sterio',$car,'$window')";
   $res1=mysqli_query($con,$sql6);
   if($res1){
    header("location:addcar.php?msg=* Successfully Added");
    }
  }

  if(array_key_exists('Add3', $_POST))
  {
   $car=$_POST["car"];
   $colour=$_POST["colour"];
   $carim=$_FILES["carimg"]["name"];

   $sql10="insert into colour(colour,image,car_id) values ('$colour','$carim','$car')";
   $res2=mysqli_query($con,$sql10);
   $ta="../upload/car/".$carim;
   move_uploaded_file($_FILES["carimg"]["tmp_name"],$ta);
   if($res2){
    header("location:addcar.php?msg=* Successfully Added");
    }
  }

  if(array_key_exists('Add5', $_POST))
  {
   $car=$_POST["car"];
   $car1=$_FILES["car1"]["name"];
   $car2=$_FILES["car2"]["name"];
   $car3=$_FILES["car3"]["name"];
   $car4=$_FILES["car4"]["name"];
   $car5=$_FILES["car5"]["name"];
   $car6=$_FILES["car6"]["name"];
   $car7=$_FILES["car7"]["name"];
   $car8=$_FILES["car8"]["name"];
   $car9=$_FILES["car9"]["name"];
   $car10=$_FILES["car10"]["name"];

   $sql7="insert into tbl_carimage(main,image1,image2,image3,image4,image5,image6,image7,image8,image9,car_id) values ('$car1','$car2','$car3','$car4','$car5','$car6','$car7','$car8','$car9','$car10','$car')";
   $res3=mysqli_query($con,$sql7);
   $t="../upload/car/".$car1;
   move_uploaded_file($_FILES["car1"]["tmp_name"],$t);
   $v="../upload/car/".$car2;
   move_uploaded_file($_FILES["car2"]["tmp_name"],$v);
   $w="../upload/car/".$car3;
   move_uploaded_file($_FILES["car3"]["tmp_name"],$w);
   $x="../upload/car/".$car4;
   move_uploaded_file($_FILES["car4"]["tmp_name"],$x);
   $y="../upload/car/".$car5;
   move_uploaded_file($_FILES["car5"]["tmp_name"],$y);
   $z="../upload/car/".$car6;
   move_uploaded_file($_FILES["car6"]["tmp_name"],$z);
   $l="../upload/car/".$car7;
   move_uploaded_file($_FILES["car7"]["tmp_name"],$l);
   $m="../upload/car/".$car8;
   move_uploaded_file($_FILES["car8"]["tmp_name"],$m);
   $n="../upload/car/".$car9;
   move_uploaded_file($_FILES["car9"]["tmp_name"],$n);
   $o="../upload/car/".$car10;
   move_uploaded_file($_FILES["car10"]["tmp_name"],$o);
   if($res3){
    header("location:addcar.php?msg=* Successfully Added");
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
   $sql8="insert into tbl_transmission(type,fuel,enginecc,bhp,millage,price,car_id,model_id,gearno,engtype) values ('$gear','$fueltype',$power,'$torque',$millage,$price,$car,$model,$gearno,'$engtype')";
   $res4=mysqli_query($con,$sql8);
   if($res4){
    header("location:addcar.php?msg=* Successfully Added");
    }
  }
 }
 else{
	header("location:../login.php?msg=");
  }
?>