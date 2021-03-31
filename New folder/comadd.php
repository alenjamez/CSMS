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
<script type="text/javascript">
    function sendEmail() {
      var mail=document.getElementById('comnme').value;
      var uname=document.getElementById('uname').value;
      var pword=document.getElementById('pword').value;
      Email.send({
        Host: "smtp.gmail.com",
        Username: "josejames1008@gmail.com",
        Password: "Alenjames@123",
        To: mail,
        From: "josejames1008@gmail.com",
        Subject: "Employee Login",
        Body: "Well that was easy!!",
      })
        .then(function (message) {
          alert("mail sent successfully")
        });
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
        <label for="icon"><b>Mail</b></label></td>
        <td><input type="text" name="comnme" id="comnme"  title="Only Alphabets" required>
      </td></tr>
      <tr><td>
        <label for="icon"><b>Username</b></label></td>
        <td><input type="text" name="uname" id="uname"   title="Only Alphabets" required>
      </td></tr>
      <tr><td>
        <label for="icon"><b>Password</b></label></td>
        <td><input type="text" name="pword" id="pword"   title="Only Alphabets" required>
      </td></tr>
      <tr><td></td><td><input type="submit" value="Sent" onclick="sendEmail();" name="submit"></td></tr>
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
</body>
</html>
<?php
 $con=mysqli_connect("localhost","root","","car showroom") or die("couldn't connect");
 if(isset($_POST['submit']))
 {
    $email=$_POST["comnme"];
    $name=$_POST["uname"];
    $pass=md5($_POST["pword"]);
    $sql1="insert into tbl_login(username,password,type) values('$name','$pass','E')";
    mysqli_query($con,$sql1);
    $li=mysqli_insert_id($con);
    $sql1="insert into tbl_emp(name,gender,email,phone,login_id) values('-','-','$email','-',$li)";
    mysqli_query($con,$sql1);
 }
}
else{
  header("location:login.php?msg=");
}
?>