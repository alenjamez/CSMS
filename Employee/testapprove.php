<?php
 $con=mysqli_connect("localhost","root","","car showroom") or die("couldn't connect");
 session_start();
 if(isset($_SESSION['user']))
 {
   $que="select COUNT(*) as count from tbl_order";
   $result = mysqli_query($con,$que);
	 while($row=mysqli_fetch_array($result)){
     $order=$row['count'];
   }
   $que1="select COUNT(*) as count from tbl_ltestdrive where status='Approved'";
   $res = mysqli_query($con,$que1);
	 while($row1=mysqli_fetch_array($res)){
     $test1=$row1['count'];
   }
   $que2="select COUNT(*) as count from tbl_emp where status='Not approved'";
   $res = mysqli_query($con,$que2);
	 while($row1=mysqli_fetch_array($res)){
     $test2=$row1['count'];
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

</head>

<body id="page-top">

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
                <a class="nav-link" href="mngdash.php">
                    <span>Dashboard</span></a>
            </li>

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


            <!-- Nav Item - Service -->
            <li class="nav-item">
            <a class="nav-link" href="">
                    <span>Service</span>
                </a>
            </li>

            <!-- Nav Item - Test Drives -->
            <li class="nav-item">
                <a class="nav-link" href="testapprove.php">
                    <span>Test Drive</span></a>
            </li>

            <!-- Nav Item - Sales -->
            <li class="nav-item">
              <a class="nav-link" href="testdrive.php">
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
                    <h1 class="h3 mb-4 text-gray-800">Test Drives</h1>

                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th >Sl no</th>
                                        <th >Name</th>
                                        <th >Car name</th>
                                        <th >Transmission</th>
                                        <th >Date</th>
                                        <th >Staff</th>
                                        <th >Approve</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th >Sl no</th>
                                        <th >Name</th>
                                        <th >Car name</th>
                                        <th >Transmission</th>
                                        <th >Date</th>
                                        <th >Staff</th>
                                        <th >Approve</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        $count=1;
                                        $query=mysqli_query($con,"select * from tbl_ltestdrive where status='Not Approved'");
                                        while ($rows=mysqli_fetch_array($query)) {
                                            $testid=$rows['tid'];
                                            echo "<tr><td>";
                                            echo $count;
                                            echo "</td><td>";
                                            $lnid=$rows['login_id'];
                                            $qu=mysqli_query($con,"select username from tbl_login where login_id='$lnid'");
                                            $raw=mysqli_fetch_array($qu)['username'];
                                            echo $raw;
                                            echo "</td><td>";
                                            $id=$rows['car_id'];
                                            $quer=mysqli_query($con,"select name from tbl_car where car_id='$id'");
                                            $ro=mysqli_fetch_array($quer)['name'];
                                            echo $ro;
                                            echo "</td><td>";
                                            echo $rows['gear'];
                                            echo "</td><td>";
                                            echo $rows['date'];
                                            echo "</td><td>";
                                            $query1=mysqli_query($con,"select * from tbl_ltestdrive where status='Not Approved'");
                                            $rows1=mysqli_fetch_array($query1)['date'];
                                            
                                            //$q=mysqli_query($con,"select * from tbl_login where type='E'");
                                            
                                            ?>
                                            <select name="desig" required>
                                            <option value="" disabled selected>Choose Employee</option><?php
                                            $q1="SELECT reg_id FROM tbl_itestdrive WHERE date=$rows1";
                                            $see1=mysqli_query($con,$q1);
                                            while($wor1=mysqli_fetch_array($see1)){
                                            $t=$wor1["reg_id"];
                                            $q="SELECT reg_id FROM tbl_emp WHERE status=1 and reg_id!='$t'";
                                            $see=mysqli_query($con,$q);
                                            while($wor=mysqli_fetch_array($see)){
                                                
                                                $id=$wor['reg_id'];
                                                $q1=mysqli_query($con,"select name from tbl_emp where reg_id='$id'");
                                                
                                                $nm=mysqli_fetch_array($q1)['name'];
                                            ?>
                                            <option value="<?php echo $id;?>" ><?php echo $nm; ?></option>
                                            <?php
                                            }}
                                            echo " </select></td><td>";
                                            ?><input type="Button" value="Approve" id="<?php echo $testid; ?>" onclick="update(this.id)" ></form><?php
                                            echo "</td></tr>";
                                            $count=$count+1;
                                        }
                                    ?>

                                    </tbody>
                                </table>
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
                    <a class="btn btn-primary" href="../login.php">Logout</a>
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