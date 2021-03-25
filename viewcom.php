<?php
 $con=mysqli_connect("localhost","root","","car showroom") or die("couldn't connect");
 session_start();
 if(isset($_SESSION['user']))
 {
 $ids=$_GET['id'];
 $sql="select * from tbl_com where comp_id='$ids'";
 $res=mysqli_query($con,$sql)or die( mysqli_error($con));;
 while($row=mysqli_fetch_array($res))
 {
   $name=$row['name'];
   $sam=$row['icon'];
   $pic='upload/company/'.$row['icon'];
 }
 if(array_key_exists('update', $_POST)) { 
  $photo=$_FILES["phto"]["name"];
  $nme=$_POST["new"];
  echo $nme;
  $sql1="update tbl_com set name='$nme',icon='$photo' where comp_id='$ids'";
  mysqli_query($con,$sql1);
  $t="upload/company/".$photo;
  move_uploaded_file($_FILES["icn"]["tmp_name"],$t);
  header("Location:company.php?msg=* Company Updated"); 
} 
else if(array_key_exists('delete', $_POST)) { 
  $sql2="update tbl_com set status=0 where comp_id='$ids'";
  mysqli_query($con,$sql2);
  header("Location:company.php?msg=* Company deleted");
} 
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <title>UR CARZ</title>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="style/sidebar.css" rel="stylesheet">
  <script>
    function Val()
    {
      var fileInput = document.getElementById('img');
      var filePath = fileInput.value;
      var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
      if(!allowedExtensions.exec(filePath)){
	      fileInput.value = '';
	      return false;
       }
      else{
       return true;
      }
  }
  </script>
  <style>
    input[type=file]{ 
      padding-top:10px;
      font-size: 15px;
      color: rgb(153,153,153);
      padding-left:50px;
}
  #update{
        width: 16%;
        height:8%;
        color: #f2f2f2;
        background-color:  #469fbd;
        border-radius: 10px;
        border: solid #f2f2f2;
        opacity: 1;
        font-weight: bold;
        margin-left:550px;
        margin-top:20px;
    }
    #delete{
        width: 16%;
        height:8%;
        color: #f2f2f2;
        background-color:  #469fbd;
        border-radius: 10px;
        border: solid #f2f2f2;
        opacity: 1;
        font-weight: bold;
        margin-left:20px;
        margin-top:20px;
    }
</style>
</head>
<body>
<div class="sidenav">
  <div class="sidebar-heading">UR CARZ</div>
        <a href="dashboard.php" >Dashboard</a>
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
        <a href="logout.php" >Log Out</a></div></div>

<div class="main">
<div class="back">
<p style="color:black;float:right;font-family:Arial;padding-top:10px"><b><?php echo $_SESSION['user']; ?>&nbsp;
            <img src="upload/profile/admin.jpg" width="40" height="40"><p><br>
    </div></div>
<h1>View Details</h1>
<div class="name">
<h6 style="margin-left:10px;"><a href="#"style="text-decoration:none;color:black;">Home</a>&nbsp;/&nbsp;Company&nbsp;/&nbsp;<a href="company.php?msg=" style="text-decoration:none;color:black;">Manage Details</a>&nbsp;/&nbsp;Edit Details</h6>
</div><br>
<div class="table"> 
<form method="post" enctype="multipart/form-data">
        <div class="text-center">
        <img src="<?php echo $pic;?>" class="avatar img-circle img-thumbnail" alt="avatar"><br>
        <input type="file" id="phto" name="phto" onblur="Val()" value="<?php echo $sam;?>" ></div>
        <br>
        <input type="text" style="font-size:15px;width:40%;margin-left:30%;text-align:center" name="new" id="new" value="<?php echo $name;?>">
        <input type="submit" name="update" id="update" value="Update">
        <input type="submit" name="delete" id="delete" value="Delete">
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