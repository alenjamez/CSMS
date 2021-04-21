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
        <a href="#" >Dashboard</a>
        <button class="dropdown-btn" style="outline:none">Employee
        </button>
        <div class="dropdown-container">
        <a href="comadd.php">Add Employee</a>
        <a href="company.php?msg=">View Details</a>
        <a href="company.php?msg=">Attendance</a>
        </div>
        <button class="dropdown-btn"  style="outline:none">Car
        </button>
        <div class="dropdown-container">
        <a href="addcar.php">Add car</a>
        <a href="managecar.php">Manage Details</a>
        </div>
        <a href="#">Service</a>
        <a href="#">TestDrives</a>
        <a href="#" >Sales</a>
        <a href="../logout.php" >Log Out</a></div></div>

<div class="main">
<div class="back">
      <p style="color:black;float:right;font-family:Arial;padding-top:10px"><b><?php echo $_SESSION['user']; ?>&nbsp;
        <img src="../upload/profile/admin.jpg" width="40" height="40"><p><br>
    </div></div>
<h1>TestDrives</h1>
<div class="name">
<h6 style="margin-left:10px;"><a href="#"style="text-decoration:none;color:black;">Home</a>&nbsp;/&nbsp;TestDrives</a></h6>
</div><br>


<div class="table">  
<table id= "ta" >
  <thead>
    <tr>
      <th scope="col">Sl no</th>
      <th scope="col">Name</th>
      <th scope="col">Car name</th>
      <th scope="col">Transmission</th>
      <th scope="col">Date</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $count=1;
         $query=mysqli_query($con,"select * from tbl_ltestdrive");
         while ($rows=mysqli_fetch_array($query)) {
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
            echo $rows['status'];
            echo "</td></tr>";
            $count=$count+1;
         }
    ?>

  </tbody>
</table>
</div>

  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
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
  header("location:../login.php?msg=");
}
?>