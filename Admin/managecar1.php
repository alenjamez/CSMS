<?php
 $con=mysqli_connect("localhost","root","","car showroom") or die("couldn't connect");
 session_start();
 //$msg=$_GET['msg'];
 $carid=$_GET['id'];
 if(isset($_SESSION['user']))
 {
    $sql="select name from tbl_car where car_id=$carid";
    $res=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($res))
    {
      $name=$row['name'];
    }
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <title>UR CARZ</title>
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../style/sidebar.css" rel="stylesheet">
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
        <a href="../logout.php" >Log Out</a></div></div>

<div class="main">
<div class="back">
<p style="color:black;float:right;font-family:Arial;padding-top:10px"><b><?php echo $_SESSION['user']; ?>&nbsp;
            <img src="../upload/profile/admin.jpg" width="40" height="40"><p><br>
    </div></div>
<h1>Manage Details</h1>
<div class="name">
<h6 style="margin-left:10px;"><a href="#"style="text-decoration:none;color:black;">Home</a>&nbsp;/&nbsp;Company&nbsp;/&nbsp;Manage Details</h6>
</div><br>
<div class="table"> 
<!-- <span id="msg" style="color:#008000;"><?php echo $msg ?></span><br> -->
   <table id="MainTable" class="auto-index" width= 70% border="1">
   <thead>
     <tr>
     <th scope="col">Sl.no</th>
     <th scope="col">Model</th>
     </tr>
   </thead>
   <tbody>
   <?php
   $count=1;
                    $sql5="select * from tbl_model where car_id='$carid'";
                    $res5=mysqli_query($con,$sql5);
                    while($row5=mysqli_fetch_array($res5)){
                      $mid=$row5["model_id"];
                      $model=$row5["model"];
                      $sql6="select * from tbl_transmission where model_id='$mid'";
                      $res6=mysqli_query($con,$sql6);
                      while($row6=mysqli_fetch_array($res6)){
                      $trans=$row6["type"];
                      $fuel=$row6["fuel"];
                        echo "<tr><td>";
                        echo $count;
                        ?></td><td><a href="editcar.php?cid=<?php echo $carid;?>&mid=<?php echo $mid;?>&tran=<?php echo $trans;?>&fuel=<?php echo $fuel;?>"><?php echo $name," ", $model," (",$trans," | ",$fuel,")";?></a></td>
                        <tr><?php
                        $count=$count+1;
     }
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
  header("location:../login.php?msg=");
}
 ?>