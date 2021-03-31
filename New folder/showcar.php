<?php
 $con=mysqli_connect("localhost","root","","car showroom") or die("couldn't connect");
 session_start();
 if(isset($_SESSION['user']))
 {
	$lid= 1;//$_SESSION['logid'];
	$sql="select propic from tbl_registration where login_id='$lid'";
	$res=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($res))
      {
        $propic='upload/profile/'.$row["propic"];
      }
 ?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>URCARZ </title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="source/bootstrap-3.3.6-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="source/font-awesome-4.5.0/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="style/slider.css">
	<link rel="stylesheet" type="text/css" href="style/mystyle.css">
	<style>
    	.grid-container {
        display: grid;
        grid-template-columns: auto auto auto auto;
        grid-gap: 20px;
        background-color: #fdce2a;
        padding: 100px;
        }

    	.grid-container > div {
        
        text-align: center;
         padding: 20px 0;
        font-size: 30px;
		}
		.name{
			font-family: Verdana,Arial,sans-serif;
			font-size:20px;
			font-weight:bold;
		}
		.item{
			border:2px solid white;
			border-radius:1px;
			background:white;
		}
		.item:hover{
			box-shadow: rgba(133, 133, 133, 0.603) 10px 10px 10px;
		}
		#vi{
			color:green;
			font-size:20px;
			border:none;
			background:white;
			animation: blinker 0.6s linear infinite;
		}
		@keyframes blinker {
        50% {
          opacity: 0;
        }
      	}
    </style>
</head>
<body>
<div class="allcontain">
	<div class="header">
			<ul class="givusacall" style="align:center">
				<li>Give us a call : +91 9544441942 </li>
			</ul>
		</div>
	<nav class="topnavbar navbar-default topnav">
	<div class="navbar-header">
            <a class="navbar-brand logo" href="#"><img src="upload/images/logo1.png" alt="logo"></a>
        </div>
		<div class="collapse navbar-collapse" id="upmenu">
			<ul class="nav navbar-nav" id="navbarontop">
				<li class="active"><a href="home.php">HOME</a> </li>
				<li class="active"><a href="companylist.php">COMPANY</a> </li>
                <li class="active"><a href="showcar.php">CARS</a> </li>
                <li class="active"><a href="#">COMPARISON</a> </li>
				<li class="active"><a href="#">ACCESSORY</a> </li>
				<li><a href="contact.html">CONTACT</a></li>
				<li class="dropdown" style="margin-left:250px">
					<a href="#" class="dropdown-toggle"	data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['user']; ?><span class="caret"></span>
					<img src="<?php echo $propic;?>" width="35" height="35"></a>
					<ul class="dropdown-menu dropdowncostume">
						<li><a href="profile.php">My Profile</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</div>
<div style="width:100%;heigth:100%">
<div class="grid-container">
    <?php
        $sql="select car_id,name from tbl_car where status=1";
        $res=mysqli_query($con,$sql);
        while($row=mysqli_fetch_array($res))
        {
		 $carid=$row['car_id'];
		 $name=$row['name'];
		 $sql1="select main from tbl_carimage where car_id='$carid' and xmt=1";
		 $resl=mysqli_query($con,$sql1);
         $row1=mysqli_fetch_array($resl);
		 $img='upload/car/'.$row1['main'];
		 $sql1="select price from tbl_transmission where car_id='$carid' and xmt=1";
		 $reslt=mysqli_query($con,$sql1);
         $row2=mysqli_fetch_array($reslt);
		 $price=$row2['price'];
   
		 ?>
		 <div class="item"><img src="<?php echo $img;?>" style="width:150px;height:150px">
			<h2 class="name"><?php echo $name;?></h2>
			<h4>Starts at &#x20B9;<?php echo $price;?>Lacs.</h4>
			<button id="vi" onclick="location.href='sample.php?id=<?php echo $carid ;?>'">View</button>
		 </div>
		 <?php
        }
		?>

    </div>
</div>
	</div>


   <br><br>

        <div class="bottommenu">
            <p>"All of those cars were once just a dream in somebody’s head".
                Peter Gabriel </p>
                 <img src="upload/images/line.png" alt="line"> <br>
                 <div class="bottomsocial">
                     <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-google-plus"></i></a>
                    <a href="#"><i class="fa fa-pinterest"></i></a>
                </div>
                    </div>
	</div>
</div>

<script type="text/javascript" src="source/bootstrap-3.3.6-dist/js/jquery.js"></script>
<script type="text/javascript" src="source/js/isotope.js"></script>
<script type="text/javascript" src="source/js/myscript.js"></script> 
<script type="text/javascript" src="source/bootstrap-3.3.6-dist/js/jquery.1.11.js"></script>
<script type="text/javascript" src="source/bootstrap-3.3.6-dist/js/bootstrap.js"></script>
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