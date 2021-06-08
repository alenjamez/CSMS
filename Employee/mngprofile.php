<?php
 $con=mysqli_connect("localhost","root","","car showroom") or die("couldn't connect");
 ob_start();
 session_start();
 $msg=$_GET['msg'];
 if(isset($_SESSION['user']))
 {   
    $lid=$_SESSION['logid'];
    $usr=$_SESSION['user'];
    $sql="select * from tbl_emp where login_id='$lid'";
    $res=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($res))
      {
        $name=$row['name'];
        $gender=$row['gender'];
        $email=$row['email'];
        $phno=$row['phone'];
        $propic='../upload/profile/'.$row["pic"];
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
    <link href="../style/form1.css" rel="stylesheet">

    <script>
    function rname()
        {
        var nam=document.getElementById("name").value;
        var nam1=/^[a-zA-Z\s]+$/;
        
        if(nam=="")
            {
                document.getElementById("error").innerHTML="* Enter name";
                document.getElementById("error").style.color = "black";
                document.getElementById("name").focus();
            return false;
            }
        if(nam.match(nam1))
            {
                document.getElementById("error").innerHTML="";
        
            }
        else
            {
                document.getElementById("error").innerHTML="* Name must only contain characters";
                document.getElementById("error").style.color = "red";
                document.getElementById("name").focus();
            return false;
        
            }
        }
        function ema()
        {
        var emi=document.getElementById("mail").value;
        var emi1=/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})+$/;
        if(emi=="")
            {
                document.getElementById("error").innerHTML="* Enter email";
                document.getElementById("error").style.color = "black";
                document.getElementById("mail").focus();
            return false;
            }
        if(emi.match(emi1))
            {
                document.getElementById("error").innerHTML="";
        
            }
        else
            {
                document.getElementById("error").innerHTML="* Enter valid email";
                document.getElementById("error").style.color = "red";
                document.getElementById("mail").focus();
            return false;
            }
        }
        function phn()
        {
        var ph=document.getElementById("ph").value;
        var ph1=/^([6-9]{1}[0-9]{9})+$/;
        if(ph=="")
            {
                document.getElementById("error").innerHTML="* Enter phno";
                document.getElementById("error").style.color = "black";
                document.getElementById("ph").focus();
            return false;
            }
        if((ph.match(ph1))&& (ph.length==10))
            {
                document.getElementById("error").innerHTML="";
        
            }
        else
            {
                document.getElementById("error").innerHTML="* Must contain only numbers and must have 10 digits";
                document.getElementById("error").style.color = "red";
                document.getElementById("ph").focus();
            return false;
            }
        }
        function usr()
        {
        var un=document.getElementById("user").value;
        var un1=/^[a-zA-Z]+$/;
        if(un=="")
            {
            document.getElementById("error").innerHTML="* Enter Username";
            document.getElementById("error").style.color = "black";
            document.getElementById("user").focus();
            return false;
            }
        if((un.match(un1))&&(un.length>=5))
            {
                document.getElementById("error").innerHTML="";
        
            }
        else
            {
                document.getElementById("error").innerHTML="* Username must contain only lowercase letters with length greater than 5";
                document.getElementById("error").style.color = "red";
                document.getElementById("user").focus();
            return false;
            }
        }
        
        function npsw()
        {
        var ps=document.getElementById("pass").value;
        var ps1=/^[a-zA-Z0-9:@]+$/;
        if(ps=="")
            {
                document.getElementById("err").innerHTML="* Enter Password";
                document.getElementById("err").style.color = "black";
                document.getElementById("pass").focus();
                return false;
            }
        if((ps.match(ps1))&& (ps.length>=8))
            {
                document.getElementById("err").innerHTML="";
        
            }
        else
            {
                document.getElementById("err").innerHTML="* Password must contain number and letter with length greater than 8";
                document.getElementById("err").style.color = "red";
                document.getElementById("pass").focus();
                return false;
            }
        }
        function psw1()
        {var ps=document.getElementById("pass").value;
        var ps1=document.getElementById("conpass").value;
        if(ps==ps1)
            {
                document.getElementById("err").innerHTML="";
                
            }
        else
            {
                document.getElementById("err").innerHTML="* Password not match!!!!!!!!!!";
                document.getElementById("error").innerHTML="* Password not match!!!!!!!!!!";
                document.getElementById("error").style.color = "red";
                document.getElementById("err").style.color = "red";
                document.getElementById("conpass").focus();
            }
        }
        function gend()
        {
        var ps=document.getElementById("gen").value;
        if(ps=="Male" || ps=="Female")
            {
                document.getElementById("error").innerHTML="";
                
            }
        else
            {
                document.getElementById("error").innerHTML="* Value Should be Male or Female";
                document.getElementById("error").style.color = "red";
                document.getElementById("gen").focus();
            }
        }
        function Val()
        {
            var fileInput = document.getElementById('img');
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
            <li class="nav-item active">
                <a class="nav-link" href="mngdash.php">
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - Sales -->
            <li class="nav-item">
              <a class="nav-link" href="mngprofile.php?msg=">
              <span>Profile</span></a>
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
                        <a class="collapse-item" href="offer.php?msg=">Leave</a>
                        <a class="collapse-item" href="">View Details</a>
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
                    <a class="collapse-item" href="leaveapprove.php?msg=">Add Offer</a>
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
                <a class="nav-link" href="testapprove.php">
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
                    <h1 class="h3 mb-4 text-gray-800">Profile</h1>

                    <div class="tab">
                    <button class="tablinks" style="margin-left:250px;" onclick="openCity(event, 'edit')" id="defaultOpen">Edit Details</button>
                    <button class="tablinks" onclick="openCity(event, 'change')">Change Password</button>
                    </div><span style="color:#008000; margin-left:20px" id="error"><?php echo $msg;?></span><br>

                    <div id="edit" class="tabcontent">
                    <div class="container bootstrap snippet">
                        <div class="row">
                        <div class="col-sm-3">
                        <div class="text-center">
                        <form class="form" method="post" id="registrationForm1" enctype="multipart/form-data">
                            <img  id="img1" style="margin-top:50px" src="<?php echo $propic;?>" class="avatar img-circle img-thumbnail" alt="avatar"><br>
                            <input type="file"  class="text-center center-block file-upload" style="color:#141e30" name="img" id="img" onblur="Val()">
                        </div><br>
                            </div>
                                <div class="col-sm-9">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="home"><br><br>
                                            <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="first_name"><h4>Name</h4></label>
                                                <input type="text" style="margin-left:0px"class="form-control" name="nme" id="name" value="<?php echo $name;?>" onblur="rname()" style=" font-size:15px;">
                                            </div>
                                            </div>
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="user"><h4>Username</h4></label>
                                                <input type="text" class="form-control" name="user" id="user" value="<?php echo $usr;?>" readonly style=" font-size:15px;" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                            <label for="email"><h4>Email</h4></label>
                                                <input type="email" class="form-control" name="mail" id="mail" value="<?php echo $email;?>" style=" font-size: 15px;">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="phone"><h4>Phone</h4></label>
                                                <input type="text" class="form-control" name="phne" id="ph" onblur="phn()" value="<?php echo $phno;?>" style=" font-size: 15px;">
                                            </div>
                                        </div>
                            
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="gender"><h4>Gender</h4></label>
                                                <input type="text" class="form-control" name="gender" id="gen" value="<?php echo $gender;?>" style=" font-size: 15px;" onblur="gend()">
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                    <br>
                                                    <input class="btn btn-lg btn-success" type="submit" name="save" onsubmit="rname(); ema(); phn(); usr(); gend(); Val();">
                                                </div>
                                        </div>
                                    </form>
                                    <span id="error"></span>
                                </div>
                                </div></div>
                            </div>
                        </div></div>


    <div id="change" class="tabcontent">
        <div class="container bootstrap snippet">
            <div class="tab-pane active" id="home"><br><br>
                    <form class="form" method="post" id="registrationForm" enctype="multipart/form-data">
                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="first_name"><h4>Password</h4></label>
                              <input type="password" name="psw" class="form-control" placeholder="Password" id="pass"  onblur="npsw()" style="font-size:15px;" required>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="password"><h4>Confirm Password</h4></label>
                              <input type="password" class="form-control" placeholder="Conform Password"  id="conpass" onblur="psw1()" style=" font-size:15px;" required>
                          </div>
                        </div>
                        <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	  <input class="btn btn-lg btn-success" type="submit" name="change" value="Change" onsubmit="npsw(); psw1();">
                                 
                            </div>
                        </div>
                    </form>
                            <span id="err"></span>
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
if(array_key_exists('save', $_POST)) { 
  $name=$_POST["nme"];
  $gender=$_POST["gender"];
  $email=$_POST["mail"];
  $phno=$_POST["phne"];
  $photo=$_FILES["img"]["name"];
  $sql1="update tbl_emp set name='$name',gender='$gender',email='$email',phone='$phno',pic='$photo' where login_id='$lid'";
  mysqli_query($con,$sql1);
  $t="../upload/profile/".$photo;
  move_uploaded_file($_FILES["img"]["tmp_name"],$t); 
  
} 
else if(array_key_exists('change', $_POST)) { 
  $psw=md5($_POST["psw"]);
  $sql2="update tbl_login set password='$psw' where login_id='$lid'";
  mysqli_query($con,$sql2);
} 
}
else{
header("location:login.php?msg=");
}
?>