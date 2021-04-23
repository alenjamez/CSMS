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
  <script>
  function update(id){
	var frm = document.getElementById("frmm")
  // var empl=document.getElementById("desig").value
	frm.setAttribute("action","approv.php?id="+id);
	frm.submit();
}
  </script>
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
        <a href="mngdash.php" >Dashboard</a>
        <a href="mngprofile.php" >Profile</a>
        <button class="dropdown-btn" style="outline:none">Attendance
        </button>
        <div class="dropdown-container">
        <a href="attndance.php">Attendance</a>
        <a href="">Leave</a>
        </div>
        <a href="testdrive.php" >TestDrives</a>
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
      <th scope="col">Staff</th>
      <th scope="col">Approve</th>

    </tr>
  </thead>
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
            //$q=mysqli_query($con,"select * from tbl_login where type='E'");
            $dat=$rows['date'];
            $q="select username from tbl_ltestdrive where date='$dat'";
            while($see=mysqli_query($con,$q)){
              $emp=$see['emp_id'];
                  $q1="select username from tbl_login where username!='$emp'";
                  //die($q1);
            }


            ?><form id="frmm" action="approv.php" method="post">
            <select name="desig" required>
              <option value="" disabled selected>Choose Employee</option><?php
            while($we=mysqli_fetch_array($q1))
            {
              ?>
              <option value="<?php echo $we['username'];?>" ><?php echo $we['username']; ?></option>
              <?php
            }
            echo " </select></td><td>";
            ?><input type="Button" value="Approve" id="<?php echo $testid; ?>" onclick="update(this.id)" ></form><?php
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