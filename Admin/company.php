<?php
 $con=mysqli_connect("localhost","root","","car showroom") or die("couldn't connect");
 session_start();
 $msg=$_GET['msg'];
 if(isset($_SESSION['user']))
 {
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <title>UR CARZ</title>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="style/sidebar.css" rel="stylesheet">
  <style>
#MainTable{
    color: black;
    width: 100%;
    text-align:center;
}

</style>

</head>
<body>
<div class="sidenav">
  <div class="sidebar-heading">UR CARZ</div>
        <a href="dashboard.php" >Dashboard</a>
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
        <a href="logout.php" >Log Out</a></div></div>

<div class="main">
<div class="back">
<p style="color:black;float:right;font-family:Arial;padding-top:10px"><b><?php echo $_SESSION['user']; ?>&nbsp;
            <img src="upload/profile/admin.jpg" width="40" height="40"><p><br>
    </div></div>
<h1>Manage Details</h1>
<div class="name">
<h6 style="margin-left:10px;"><a href="#"style="text-decoration:none;color:black;">Home</a>&nbsp;/&nbsp;Company&nbsp;/&nbsp;Manage Details</h6>
</div><br>
<div class="table"> 
<span id="msg" style="color:#008000;"><?php echo $msg ?></span><br>
   <table id="MainTable" class="auto-index" width= 70% border="1">
   <thead>
     <tr>
     <th scope="col">Sl.no</th>
     <th scope="col">Name</th>
     <th scope="col"></th>
     </tr>
   </thead>
   <tbody>

   <?php
     $sql="select reg_id,name from tbl_emp";
     $res=mysqli_query($con,$sql);
     while($row=mysqli_fetch_array($res))
     {
       $no=$row['reg_id'];
       $name=$row['name'];
       echo "<tr><td>";
       echo "</td><td>";
       echo $name;
       ?></td><td><a href="" >View</a></td?</tr><?php

     }
   ?>
   </tbody>
   </table>
   </div>
   </div>
 </div>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script>//serial number
var addSerialNumber = function () {
    var i = 0
    $('table tr').each(function(index) {
        $(this).find('td:nth-child(1)').html(index-1+1);
    });
};
addSerialNumber();
</script>
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
  <script type="text/javascript">
    history.pushState(null, null, location.href);
    history.back();
    history.forward();
    window.onpopstate = function () { history.go(1); };
</script>

</body>
</html>
<?php
 }
 else{
  header("location:login.php?msg=");
}
 ?>