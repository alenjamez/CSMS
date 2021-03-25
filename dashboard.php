<?php
 $con=mysqli_connect("localhost","root","","car showroom") or die("couldn't connect");
 session_start();
 if(isset($_SESSION['user']))
 {
   $que="select COUNT(name) as count from tbl_registration where status=1";
   $result = mysqli_query($con,$que);
	 while($row=mysqli_fetch_array($result)){
     $usr=$row['count'];
   }
   $que1="select COUNT(name) as count from tbl_car where status=1";
   $res = mysqli_query($con,$que1);
	 while($row1=mysqli_fetch_array($res)){
     $car=$row1['count'];
   }
   
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <title>UR CARZ</title>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="style/sidebar.css" rel="stylesheet">
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
        <a href="#" >Dashboard</a>
        <button class="dropdown-btn" style="outline:none">Company
        </button>
        <div class="dropdown-container">
        <a href="comadd.php">Add Company</a>
        <a href="company.php?msg=">Manage Details</a>
        </div>
        <button class="dropdown-btn"  style="outline:none">Car
        </button>
        <div class="dropdown-container">
        <a href="addcar.php">Add car</a>
        <a href="managecar.php">Manage Details</a>
        </div>
        <button class="dropdown-btn"  style="outline:none">Accesory
        </button>
        <div class="dropdown-container">
        <a href="addcar.php">Add Accessory</a>
        <a href="#">Manage Details</a>
        </div>
        <a href="#" >Sales</a>
        <a href="logout.php" >Log Out</a></div>
      </div>

<div class="main">
<div class="back">
      <p style="color:black;float:right;font-family:Arial;padding-top:10px"><b><?php echo $_SESSION['user']; ?>&nbsp;
        <img src="upload/profile/admin.jpg" width="40" height="40"><p><br>
    </div></div>
<h1>Dashboard</h1>
<div class="name">
<h6 style="margin-left:10px;"><a href="#"style="text-decoration:none;color:black;">Home</a></h6>
</div><br>
 
    <div class="div1">
    <div class="left">
    <i class='fas fa-user-alt' name="symb" style="font-size:50px" ></i></div>
    <div class="right">
    <h3>Users</h3>
    <h3><?php echo $usr;?></h3>
    </div></div>
    <br><br>

    <div class="div1">
    <div class="left">
    <i class='fa fa-car' name="symb" style="font-size:50px" ></i></div>
    <div class="right">
    <h3>Cars</h3>
    <h3><?php echo $car;?></h3>
    </div></div>
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