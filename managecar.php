<?php
 $con=mysqli_connect("localhost","root","","car showroom") or die("couldn't connect");
 session_start();
 if(isset($_SESSION['user']))
 {
   $msg="";
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
<script>
 function test(value)
  {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function()
    {
        if (this.readyState == 4 && this.status == 200) 
        {
          document.getElementById("sel").innerHTML=this.responseText;
        }
    };
    xhttp.open("GET", "carselect.php?id="+value, true);
    xhttp.send();
  }
  </script>

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
        <a href="#">Manage Details</a>
        </div>
        <button class="dropdown-btn"  style="outline:none">Accesory
        </button>
        <div class="dropdown-container">
        <a href="#">Add car</a>
        <a href="#">Manage Details</a>
        </div>
        <a href="#" >Sales</a>
        <a href="logout.php" >Log Out</a>
    </div>
</div>

<div class="main">
    <div class="back">
        <p style="color:black;float:right;font-family:Arial;padding-top:10px"><b><?php echo $_SESSION['user']; ?>&nbsp;
        <img src="upload/profile/admin.jpg" width="40" height="40"><p><br>
    </div>
</div>

<h1>Manage Details</h1>
<div class="name">
    <h6 style="margin-left:10px;"><a href="#"style="text-decoration:none;color:black;">Home</a>&nbsp;/&nbsp;Car&nbsp;/&nbsp;Manage Car</h6>
</div><br>
<div class="table"> 
    <label style="margin-top:45px;">Company</label><select name="company" style="margin-top:50px;margin-left:50px;" onChange="test(this.value)">
    <option value="" disabled selected>Choose Company</option>
    <?php 
    $sql3="select comp_id,name from tbl_com where status=1";
    $res=mysqli_query($con,$sql3);
    while($row=mysqli_fetch_array($res))
    {
      echo '<option value="'.$row['comp_id'].'">'.$row['name'].'</option>';
    }
    ?></select><br>
    <span id="msg" style="color:#008000;"><?php echo $msg ?></span><br>
    <table id="MainTable" class="auto-index" width= 70% border="1">
      <thead>
      <tr>
      <th scope="col">Sl.no</th>
      <th scope="col">Car Name</th>
      <th scope="col"></th>
      </tr>
      </thead>
      <tbody id="sel">
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