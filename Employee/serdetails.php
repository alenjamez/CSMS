<?php
 include("../includes/dbconnection.php");
 session_start();
 $id=$_GET['id'];
 if(isset($_SESSION['user']))
 {
    $lid=$_SESSION['logid'];
    $usr=$_SESSION['user'];
    $sql="select * from tbl_emp where login_id='$lid'";
    $res=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($res))
      {
        $propic='../upload/profile/'.$row["pic"];
      }
    $query=mysqli_query($con,"select * from tbl_service where sr_id=$id");
    while ($rows=mysqli_fetch_array($query)) {
        $logid=$rows['login_id'];
        $carid=$rows['car_id'];
        $km=$rows['kilomtrs'];
        $date=$rows['date'];
        $service=$rows['service_no'];
        $query2=mysqli_query($con,"select * from tbl_registration where login_id=$logid");
        while($row1=mysqli_fetch_array($query2)){
            $name=$row1['name'];
            $location=$row1['location'];
            $email=$row1['email'];
            $phone=$row1['phone'];
        }
        $query3=mysqli_query($con,"select * from tbl_car where car_id=$carid");
        $carnme=mysqli_fetch_array($query3)['name'];
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
    <link href="../Admin/css/sb-admin-2.min.css" rel="stylesheet">
    <script>
        function rates()
        {
          var k=document.getElementById("rate").value;
          if ((k>0) && (k<50000)){
            document.getElementById("err").innerHTML="";
          }
          else{
            document.getElementById("err").innerHTML="* Enter a valid amount";
            document.getElementById("rate").innerHTML="";
          }
        }
        function chrg()
        {
          var k=document.getElementById("charges").value;
          if ((k>0) && (k<2000)){
            document.getElementById("err").innerHTML="";
          }
          else{
            document.getElementById("err").innerHTML="* Enter a valid amount";
            document.getElementById("charges").innerHTML="";
          }
        }
        function wor()
        {
          var k=document.getElementById("work").value;
          var r=/^[a-zA-Z]+(\s[a-zA-Z]+)+(\s[a-zA-Z]+)?$/;
          if(k.match(r))
            {
            document.getElementById("err").innerHTML="";
          }
          else{
            document.getElementById("err").innerHTML="* Enter a valid work";
            document.getElementById(work).innerHTML="";
          }
        }
        function update(id){
        var frm = document.getElementById("frmm")
        frm.setAttribute("action","deletewrk.php?id="+id);
        frm.submit();
        }
        function update1(id){
        var frm = document.getElementById("frmm1")
        frm.setAttribute("action","finishwrk.php?id="+id);
        frm.submit();
        }

  </script>
  <style>
  .same {
  width: 50%;
  padding: 3px 5px;
  margin: 8px 0;
  box-sizing: border-box;
    }

  </style>
</head>

<body id="page-top" onload="dates()" class="">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="mngdash.php">
                <div class="sidebar-brand-icon rotate-n-15">
                 <i class="fal fa-car"></i>
                </div>
                <div class="sidebar-brand-text mx-3">URCARZ</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="empdash.php">
                    <span>Dashboard</span></a>
            </li>

                        <!-- Nav Item - Sales -->


            <!-- Divider -->

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="false" aria-controls="collapseTwo">
                    <span>Attendance</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="">Leave</a>
                        <a class="collapse-item" href="">View Details</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="empprofile.php">
              <span>Profile</span></a>
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $usr;?></span>
                                <img class="img-profile rounded-circle"
                                    src="<?php echo $propic;?>">
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
                    <h1 class="h3 mb-4 text-gray-800">Service</h1>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <h3>Personal Details</h3><br>
                            <div class="row">
                            <div class="col-md-6">
                            <label for="fname"style="margin-right:60px"><i class="fa fa-user"></i> Full Name</label>:
                            <label for="fname" style="margin-left:30px"><?php echo $name;?></label><br>
                            <label for="email" style="margin-right:92px"><i class="fa fa-envelope"></i> Email</label>:
                            <label for="email" style="margin-left:30px"><?php echo $email;?></label><br>
                            <label for="phone" style="margin-right:24px"><i class="fa fa-phone"></i> Phone Number</label>:
                            <label for="phone" style="margin-left:30px"><?php echo $phone;?></label></div>
                            <div class="col-md-6">
            
                            <label for="city" style="margin-right:30px"><i class="fa fa-location"></i> Location</label>:
                            <label for="city" style="margin-left:30px"><?php echo $location;?></label><br>
                            <label for="state" style="margin-right:54px"><i class="fa fa-location"></i> State</label>:
                            <label for="state" style="margin-left:30px">Kerala</label></div>
                        </div>
                        <br><br>
                        <h3>Vehicle Details</h3><br>
                        <div class="row">
                            <div class="col-md-6">
                            <label for="car"style="margin-right:60px"><i class="fa fa-car"></i> Car Name</label>:
                            <label for="car" style="margin-left:30px"><?php echo $carnme;?></label><br>
                            <label for="Service no" style="margin-right:45px"><i class="fa fa-wrench"></i>Service Type</label>:
                            <label for="Service no" style="margin-left:30px"><?php echo $service;?></label><br></div>
                            <div class="col-md-6">
            
                            <label for="Kilometre" style="margin-right:30px"><i class="fa fa-tachometer"></i> Kilometre</label>:
                            <label for="Kilometre" style="margin-left:30px"><?php echo $km;?></label><br>
                            <label for="date" style="margin-right:66px"><i class="fa fa-calender"></i> Date</label>:
                            <label for="date" style="margin-left:30px"><?php echo $date;?></label></div>
                        </div>
                    </div>
                </div>

                <div class="card shadow mb-4">
                        <div class="card-body">
                        <form method="post" action="workadd.php?id=<?php echo $id;?>">
                            <h3>Service works</h3>
                            <span id="err" style="float:right;color:green"></span><br>
                            <div class="row">
                            <div class="col-md-6">
                            <label for="fname"style="margin-right:60px"></i> Work</label>:
                            <input list="works" class="same" style="margin-left:20px" onblur="wor()" id="work" name="works" required />
                            <datalist id="works">
                            <option value="Full Wash">
                            <option value="Oil Change">
                            <option value="Wheel Alignment">
                            <option value="Break Pad Change">
                            <option value="Full Checkup">
                            </datalist><br>
                            <label for="email"  style="margin-right:46px"></i>Priority</label>:
                            <select class="same" style="margin-left:20px;" name="priority" id="priority" required>
                            <option value="" default>Choose priority</option>
                            <option value="T">Top</option>
                            <option value="M">Medium</option>
                            <option value="L">Low</option></select>
                            <br></div>
                            <div class="col-md-6">
                            <label for="city"  style="margin-right:92px"></i> Rate</label>:
                            <input type="text" class="same" style="margin-left:20px;" name="rate" id="rate" onblur="rates()" required> <br>
                            <label for="state" style="margin-right:20px"></i> Labour Charge</label>:
                            <input type="text" class="same" style="margin-left:20px;" name="charges" id="charges" onblur="chrg()" required></div>
                        </div>
                        <input type="submit" class="btn btn-sm btn-primary" style="margin-right:80px;margin-top:10px;float:right">
                    </div>
                </div>
                <div class="card shadow mb-4">
                        <div class="card-body">
                        <h3>Service works</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th >Sl no</th>
                                        <th >Work</th>
                                        <th >Status</th>
                                        <th ></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $count=1;
                                        $query4=mysqli_query($con,"select * from tbl_serwork where sr_id=$id and value=0");
                                        while ($rows=mysqli_fetch_array($query4)) {
                                            $sr=$rows['wrk_id'];
                                            echo "<tr><td>";
                                            echo $count;
                                            echo "</td><td>";
                                            echo $rows['work'];
                                            echo "</td><td>";
                                            echo $rows['status'];
                                            ?><form action="approv.php" method="POST" id="frmm">
                                            </td><td><input class="btn btn-sm btn-primary" type="Button" value="Delete" id="<?php echo $sr; ?>" onclick="update(this.id)" >
                                            </td></tr></form><?php
                                        }
                                    ?>
                                    </form>
                                    </tbody>
                                </table>
                            </div>
                            <form action="approv.php" method="POST" id="frmm1">
                                </td><td><input class="btn btn-sm btn-primary" style="float:right;margin-right:50px"type="Button" value="Finish" id="<?php echo $id; ?>" onclick="update1(this.id)" >
                                </td></tr></form>
                        </div>  
                        </div>

                    </div>
                    </div>

                
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

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
    <script src="../Admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../Admin/js/demo/chart-area-demo.js"></script>
    <script src="../Admin/js/demo/chart-pie-demo.js"></script>

</body>

</html>
<?php
}
else{
  header("location:../login.php?msg=");
}
?>