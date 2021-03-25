<!DOCTYPE html>
<?php
 $con=mysqli_connect("localhost","root","","car showroom") or die("couldn't connect");
 session_start();
 if(isset($_SESSION['user']))
 {
 ?>
<html lang="en">
  <head>
  <title>UR CARZ</title>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="style/sidebar.css" rel="stylesheet">
  <style>
#adddet{
  width:100%x;
  margin-left:50px;
}
input[type=text]{
  width:600px;
}
input[type=file]{ 
  font-size: 15px;
  color: rgb(153,153,153);
}
input[type=submit] {
        width: 35%;
        height:15%;
        color: #f2f2f2;
        background-color:  #469fbd;
        border-radius: 10px;
        border: solid #f2f2f2;
        opacity: 1;
        font-weight: bold;
        margin-left:250px;
    }
</style>
<script>
function Val()
{
var fileInput = document.getElementById('icn');
var filePath = fileInput.value;
var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
if(!allowedExtensions.exec(filePath)){
  document.getElementById("err").innerHTML = "* Please upload file having extensions .jpeg/.jpg/.png only.";
	fileInput.value = '';
	return false;
 }
else{
  document.getElementById("err").innerHTML = "";
}
}
</script>
</head>
<body>
    <div class="sidenav">
      <div class="sidebar-heading">UR CARZ</div>
        <a href="#" >Dashboard</a>
        <button class="dropdown-btn" style="outline:none">Employee
        </button>
        <div class="dropdown-container">
        <a href="#">Add employee</a>
        <a href="company.php?msg=">View Details</a>
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
    </div></div>
<h1>Add Employee</h1>
<div class="name">
<h6 style="margin-left:10px;"><a href="#"style="text-decoration:none;color:black;">Home</a>&nbsp;/&nbsp;Employee&nbsp;/&nbsp;Add Employee</h6>
</div><br>
<div class="table"> 
  <label id="msg" style="color:#008000;"></label>
    <form id="adddet" method="post" enctype="multipart/form-data">
    <table >
      <tr><td>
        <label for="icon"><b>Employee Name</b></label></td>
        <td><input type="text" name="comnme" id="comnme" placeholder="Employee name" pattern="[A-Za-z]+" title="Only Alphabets" required>
      </td></tr>
      <tr>
        <td>
          <label for="icon"><b>Icon</b></label></td>
          <td><input type="file" id="icn" name="icn" onblur="Val()" required>
          </td>
      </tr>
      <tr><td></td><td><input type="submit" value="Submit" onsubmit="Val();" name="submit"></td></tr>
   </table>
   <span id="err" style="color:green"></span>
   </form>
   </div>
   </div>
 </div>
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
  </script>
</body>
</html>
<?php
 $con=mysqli_connect("localhost","root","","car showroom") or die("couldn't connect");
 if(isset($_POST['submit']))
 {
 
    $name=$_POST["comnme"];
    $pic=$_FILES["icn"]["name"];

    $sql="select name from tbl_com where name='$name'";

    $res=mysqli_query($con,$sql);
    if(mysqli_num_rows($res)>0)
    {
      ?><script>document.getElementById("msg").innerHTML = "Name Already exist ";</script><?php
    }
    else{
      $sql1="insert into tbl_com(name,icon,status) values('$name','$pic','1')";
      mysqli_query($con,$sql1);
      $t="upload/company/".$pic;
      move_uploaded_file($_FILES["icn"]["tmp_name"],$t);
      ?><script>document.getElementById("msg").innerHTML = "Successful ";</script><?php
    }    
 }

}
else{
  header("location:login.php?msg=");
}
?>