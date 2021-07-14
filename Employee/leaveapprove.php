<?php
 include("../includes/dbconnection.php");
 session_start();
 $msg=$_GET['msg'];
 if(isset($_SESSION['user'])){
    $lid=$_SESSION['logid'];
    $usr=$_SESSION['user'];
    $sql="select * from tbl_emp where login_id='$lid'";
    $res=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($res)){
        $propic='../upload/profile/'.$row["pic"];
      }?>
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
        function update(id){
            var frm = document.getElementById("frmm")
            frm.setAttribute("action","approval.php?id="+id);
            frm.submit();
        }
        function cancel(id){
            var frm = document.getElementById("frmm")
            frm.setAttribute("action","cancel.php?id="+id);
            frm.submit();
        }
  </script>
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
            <li class="nav-item">
                <a class="nav-link" href="mngdash.php">
                    <span>Dashboard</span></a>
            </li>
            <!-- Nav Item - Sales -->
            <li class="nav-item">
              <a class="nav-link" href="mngprofile.php?msg=">
              <span>Profile</span></a>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="false" aria-controls="collapseTwo">
                    <span>Leave</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="leaveapprove.php?msg=">Approve Leave</a>
                        <a class="collapse-item" href="mngleave.php?msg=">Apply Leave</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <span>Offer</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="offer.php?msg=">Add Offer</a>
                        <a class="collapse-item" href="viewoffer.php">View offer</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Service -->
            <li class="nav-item">
            <a class="nav-link" href="serviceapp.php?msg=">
                    <span>Service</span>
                </a>
            </li>
           <!-- Nav Item - Test Drives -->
            <li class="nav-item">
                <a class="nav-link" href="testapprove.php?msg=">
                    <span>Test Drive</span></a>
            </li>
            <!-- Nav Item - Sales -->
            <li class="nav-item">
              <a class="nav-link" href="viewrvw.php">
              <span>Review</span></a>
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
                    <h1 class="h3 mb-4 text-gray-800">Leave Applications</h1>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                            <span style="color:#008000; float:right" id="error"><?php echo $msg;?></span><br><br>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th >Sl no</th>
                                        <th >Name</th>
                                        <th >Date</th>
                                        <th >Reason</th>
                                        <th >Session</th>
                                        <th ></th>
                                        <th ></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $count=1;
                                        $query=mysqli_query($con,"select * from tbl_leave where status='Not Approved' and type="E");
                                        while ($rows=mysqli_fetch_array($query)) {
                                            $serid=$rows['leave_id'];
                                            echo "<tr><td>";
                                            echo $count;
                                            echo "</td><td>";
                                            $lnid=$rows['login_id'];
                                            $qu=mysqli_query($con,"select name from tbl_emp where login_id='$lnid'");
                                            $raw=mysqli_fetch_array($qu)['name'];
                                            echo $raw;
                                            echo "</td><td>";
                                            echo $rows['date'];
                                            echo "</td><td>";
                                            echo $rows['reason'];
                                            echo "</td><td>";
                                            echo $rows['session'];
                                            echo "</td><td>";
                                            ?>
                                            <form action="approv.php" method="POST" id="frmm">
                                            <input type="Button" class="btn btn-sm btn-primary" value="Approve" id="<?php echo $serid; ?>" onclick="update(this.id)" >
                                            </td><td>
                                           <input type="Button" class="btn btn-sm btn-primary" value="Cancel" id="<?php echo $serid; ?>" onclick="cancel(this.id)" ></form><?php
                                            echo "</td></tr>";
                                            $count=$count+1;
                                        }
                                    ?>
                                    </form>
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
}?>