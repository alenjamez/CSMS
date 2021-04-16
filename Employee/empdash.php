<?php
 $con=mysqli_connect("localhost","root","","car showroom") or die("couldn't connect");
 session_start();
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

   
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <title>UR CARZ</title>
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../style/sidebar.css" rel="stylesheet">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <style>
    .div1{
      width:20%;
      padding :10px 10px 10px 10px;
      margin-left:17%;
      height:80px;
      background-color:white;
      border-radius:5px
    }
    .left{
      width:30%;
      float:left;
    }
    .right{
      width:70%;
      float:right;
    }
  </style>
</head>
<body>
<div class="sidenav">
  <div class="sidebar-heading">UR CARZ</div>
        <a href="empdash.php" >Dashboard</a>
        <a href="empprofile.php" >Profile</a>
        <button class="dropdown-btn" style="outline:none">Attendance
        </button>
        <div class="dropdown-container">
        <a href="attndance.php">Attendance</a>
        <a href="">Leave</a>
        </div>
        <a href="#" >TestDrives</a>
        <button class="dropdown-btn" style="outline:none">Services
        </button>
        <div class="dropdown-container">
        <a href="">Upcoming Services</a>
        <a href="">Booked Service</a>
        </div>
        <a href="../logout.php" >Log Out</a></div>
      </div>

<div class="main">
<div class="back">
      <p style="color:black;float:right;font-family:Arial;padding-top:10px"><b><?php echo $_SESSION['user']; ?>&nbsp;
        <img src="<?php echo $propic;?>" width="40" height="40"><p><br>
    </div></div>
<h1>Dashboard</h1>
<div class="name">
<h6 style="margin-left:10px;"><a href="#"style="text-decoration:none;color:black;">Home</a></h6>
</div><br>
 

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript">
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;
    for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
  </script>
</body>
</html>
<?php
}
else{
  header("location:login.php?msg=");
}
?>