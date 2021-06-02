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
      $face=$row["face"];
    }
    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <title>UR CARZ</title>
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <link href="../style/sidebar.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <style>
  body {font-family: Arial;
    }

    /* Style the tab */
    .tab {
    overflow: hidden;
    color: white;
    margin-top:10px;
    margin-left:600px;
    margin-right:30px;
    }

    /* Style the buttons inside the tab */
    .tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        border-bottom: 3px solid white; 
        border-radius:10px;
    }

    /* Create an active/current tablink class */
    .tab button.active {
        border-bottom: 3px solid white; 
        border-radius:10px;
    }

    /* Style the tab content */
    .tabcontent {
    display: none;
    border: 1px solid white;
    border-radius:25px;
    padding: 6px 12px;
    margin-top:10px;
    margin-left:17%;
    margin-right:30px;
    padding-bottom:50px;
    margin-bottom:30px;
    box-shadow:rgba(133, 133, 133, 0.603) 10px 10px 10px;
    }
         
    label{
        color: Black;
        font-family: "Times New Roman";
        font-style: italic;
    }
    input{
        font-family: "Times New Roman";
        font-weight: bold;
       
    }
    #img1{
      margin-top:50px;
      padding-bottom:20px;
    }
    span{
        right:0;
        margin-right:40px;
        float: right;
        font-size: 13px;
    }
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
    #results { 
        padding:10px; 
        border:1px ; 
        background:#ccc; 
        }
  </style>
</head>
<body>
<div class="sidenav">
  <div class="sidebar-heading">UR CARZ</div>
        <a href="empdash.php" >Dashboard</a>
        <a href="#" >Profile</a>
        <button class="dropdown-btn" style="outline:none">Attendance
        </button>
        <div class="dropdown-container">
        <a href="">Attendance</a>
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
            <img  src="<?php echo $propic;?>" width="50" height="50"><p><br>
    </div></div>
<h1>Attendance</h1>
<div class="name">
<h6 style="margin-left:10px;"><a href="#"style="text-decoration:none;color:black;">Home</a>&nbsp;/&nbsp;Attendance</h6>
</div><br>
<?php
if(is_null($face))
{
  ?>
  <div class="table"> 
  <label id="msg" style="color:#008000;"></label>
  <form method="POST">
        <div class="row">
            <div class="col-md-6">
                <div id="my_camera"></div>
                <br/>
                <input type="button" value="Take Snapshot" onClick="take_snapshot()">
                <input type="hidden" name="image" class="image-tag">
            </div>
            <div class="col-md-6">
                <div id="results"></div>
            </div>
            <div class="col-md-12 text-center">
                <br/>
                <input type="submit" class="btn btn-success" value="Submit">
            </div>
        </div>
    </form>
   </div>
  <?php
}
else{
?>
<div class="table"> 
  <label id="msg" style="color:#008000;"></label>
  <form method="POST">
        <div class="row">
            <div class="col-md-6">
                <div id="my_camera"></div>
                <br/>
                <input type="button" value="Take Snapshot" onClick="take_snapshot()">
                <input type="hidden" name="image" class="image-tag">
            </div>
            <div class="col-md-6">
                <div id="results"></div>
            </div>
            <div class="col-md-12 text-center">
                <br/>
                <input type="submit" class="btn btn-success" value="Submit">
            </div>
        </div>
    </form>
   </div>
<?php }
?>


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
<script language="JavaScript">
    Webcam.set({
        width: 450,
        height: 350,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
</script>
  

</body>
</html>
<?php
  if(isset($_POST['submit'])) { 
    
    $img = $_POST['image'];
    $folderPath = "../uploads/bio/";
  
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
  
    $image_base64 = base64_decode($image_parts[1]);
    $fileName = uniqid() . '.png';
  
    $file = $folderPath . $fileName;
    file_put_contents($file, $image_base64);
  
    header("location:HAARPHP/examples/index.php?$file=$filename");
  }
}
else{
  header("location:../login.php?msg=");
}
?>