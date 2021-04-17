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
</head>
<body>
<div class="allcontain">
	<div class="header">
			<ul class="givusacall">
				<li>Give us a call : +91 9544441942 </li>
			</ul>
			<ul class="logreg">
				<li><a href="login.php?msg=">Login </a> </li>
				<li><a href="Registration.php?msg="><span class="register">Register</span></a></li>
			</ul>
		</div>
	<nav class="topnavbar navbar-default topnav">
        <div class="navbar-header">
            <a class="navbar-brand logo" href="#"><img src="upload/images/logo1.png" alt="logo"></a>
        </div>
		<div class="collapse navbar-collapse" id="upmenu">
			<ul class="nav navbar-nav" id="navbarontop">
				<li class="active"><a href="#">HOME</a> </li>
                <li class="active"><a href="#">CARS</a> </li>
				<li class="active"><a href="#">SERVICE</a> </li>
				<li><a href="contact.html">CONTACT</a></li>
			</ul>
		</div>
	</nav>
</div>
<div class="allcontain">
	<div id="carousel-up" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner " role="listbox">
			<div class="item active">
				<img src="upload/images/Banner3.jpg" alt="oldcar">
			</div>
			<div class="item">
				<img src="upload/images/Banner2.jpg" alt="porche">
			</div>
			<div class="item">
				<img src="upload/images/Banner1.jpg" alt="benz">
			</div>
		</div><br><br>
		<nav class="navbar navbar-default midle-nav">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed textcostume" data-toggle="collapse" data-target="#navbarmidle" aria-expanded="false">
						<h1>SEARCH TEXT</h1>
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<!-- <div class="collapse navbar-collapse" id="navbarmidle">
				<div class="searchtxt">
					<h1>SEARCH TEXT</h1>
				</div>
				<form class="navbar-form navbar-left searchformmargin" role="search">
					<div class="form-group">
						<input type="text" class="form-control searchform" placeholder="Enter Keyword">
					</div>
				</form>
				<ul class="nav navbar-nav navbarborder">
					<li class="li-slideprice">
						<p> <label class="slidertxt" for="amount">Price </label>
							<input class="priceslider" type="text" id="amount" readonly="readonly">
						</p>
							<div id="slider-range"></div>
							
					</li>
					<li class="li-search"> <button class="searchbutton"><span class="glyphicon glyphicon-search "></span></button></li>
				</ul>
 
			</div> -->
		</nav>
	</div>
</div>
<!-- ____________________Featured Section ______________________________--> 
<div class="allcontain">
	<div class="feturedsection">
		<h1 class="text-center"><span class="bdots">&bullet;</span>N E W<span class="carstxt">C A R S</span>&bullet;</h1>
	</div>
	<div class="feturedimage">
		<div class="row firstrow">
			<div class="col-lg-6 costumcol colborder1">
				<div class="row costumrow">
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 img1colon">
						<img src="upload/images/featurporch.jpg" alt="porsche">
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 txt1colon ">
						<div class="featurecontant">
							<h1>G L O S T E R</h1>
			 				<h2>Price &#x20B9;</h2>
			 				<button id="btnRM" onclick="rmtxt()">READ MORE</button>
			 				<div id="readmore">
			 						<h1>Car Name</h1>
                                     <p>INDIA’S FIRST AUTONOMOUS LEVEL-1 PREMIUM SUV<br>
                                        Advanced Driver Assistance System<br>
                                        customize premiumness with the best-in-class 
                                        features to get a feel of your dream car<br>
                                        the mg gloster comes with best-in-class 
                                        safety features for a protected drive<br>
                                        STARTS AT ₹ 29.98 LAKH
                                        </p>
			 						<button id="btnRL">READ LESS</button>
			 				</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 costumcol colborder2">
				<div class="row costumrow">
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 img2colon">
						<img src="upload/images/featurporch1.jpg" alt="porsche1">
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 txt1colon ">
						<div class="featurecontant">
							<h1>T H A R</h1>
			 				<h2>Price &#x20B9;</h2>
			 				<button id="btnRM2">READ MORE</button>
			 				<div id="readmore2">
			 						<h1>Car Name</h1>
                                     <p>"THE ALL NEW THAR IS HERE<br>
                                        A modern take on an iconic design, the All-New Thar, with its wide stance 
                                        and iconic lines, stands out wherever it goes.<br>
                                        Choose between the All-New mStallion150 petrol engine and mHawk130 diesel engine.
                                         With 6-speed automatic and manual transmission options.<br>
                                         STARTS AT ₹ 9.89 LAKH<br></p>
			 						<button id="btnRL2">READ LESS</button>
			 				</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="latestcars">
		<h1 class="text-center">&bullet; LATEST   CARS &bullet;</h1>
	</div>
	<br>
	<br>
	<!-- ________________________Latest Cars Image Thumbnail________________-->
		<div class="grid">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
					<div class="txthover">
						<img src="upload/images/cars1.jpg" alt="car1">
							<div class="txtcontent">
								<div class="stars">
									<div class="glyphicon glyphicon-star"></div>
									<div class="glyphicon glyphicon-star"></div>
									<div class="glyphicon glyphicon-star"></div>
								</div>
								<div class="simpletxt">
									<h3 class="name">Altroz</h3>
									 <h4 class="price"> Starts at &#x20B9;5.44 Lakhs</h4>
									 <button>READ MORE</button><br>
									 <div class="wishtxt">
										 <p class="paragraph2">Compare <span class="icon"><img src="image/compicon.png" alt="compicon"></span></p>
									 </div>
								</div>
								<div class="stars2">
									<div class="glyphicon glyphicon-star"></div>
									<div class="glyphicon glyphicon-star"></div>
									<div class="glyphicon glyphicon-star"></div>
								</div>
							</div>
					</div>	 
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 ">
					<div class="txthover">
						<img src="upload/images/car2.jpg" alt="car2">
							<div class="txtcontent">
								<div class="stars">
									<div class="glyphicon glyphicon-star"></div>
									<div class="glyphicon glyphicon-star"></div>
									<div class="glyphicon glyphicon-star"></div>
								</div>
								<div class="simpletxt">
									<h3 class="name">Urban Cruizer</h3>
									
									<h4 class="price"> Starts at &#x20B9;8.40 Lakhs</h4>
									 <button>READ MORE</button><br>
									 <div class="wishtxt">
										 <p class="paragraph2">Compare <span class="icon"><img src="image/compicon.png" alt="compicon"></span></p>
									 </div>
								</div>
								<div class="stars2">
									<div class="glyphicon glyphicon-star"></div>
									<div class="glyphicon glyphicon-star"></div>
									<div class="glyphicon glyphicon-star"></div>
								</div>
							</div>
					</div>	 
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
					<div class="txthover">
						<img src="upload/images/car3.jpg" alt="car3">
							<div class="txtcontent">
								<div class="stars">
									<div class="glyphicon glyphicon-star"></div>
									<div class="glyphicon glyphicon-star"></div>
									<div class="glyphicon glyphicon-star"></div>
								</div>
								<div class="simpletxt">
									<h3 class="name">Sonet</h3>
									 <h4 class="price">Starts at &#x20B9;8.40 Lakhs</h4>
									 <button>READ MORE</button><br>
									 <div class="wishtxt">
										 <p class="paragraph2">Compare <span class="icon"><img src="image/compicon.png" alt="compicon"></span></p>
									 </div>
								</div>
								<div class="stars2">
									<div class="glyphicon glyphicon-star"></div>
									<div class="glyphicon glyphicon-star"></div>
									<div class="glyphicon glyphicon-star"></div>
								</div>
							</div>
					</div>	 
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
					<div class="txthover">
						<img src="upload/images/car4.gif" alt="car4">
							<div class="txtcontent">
								<div class="stars">
									<div class="glyphicon glyphicon-star"></div>
									<div class="glyphicon glyphicon-star"></div>
									<div class="glyphicon glyphicon-star"></div>
								</div>
								<div class="simpletxt">
									<h3 class="name">Kona</h3>
									 <h4 class="price">Starts at &#x20B9;23.8 Lakhs</h4>
									 <button>READ MORE</button><br>
									 <div class="wishtxt">
										 <p class="paragraph2">Compare <span class="icon"><img src="image/compicon.png" alt="compicon"></span></p>
									 </div>
								</div>
								<div class="stars2">
									<div class="glyphicon glyphicon-star"></div>
									<div class="glyphicon glyphicon-star"></div>
									<div class="glyphicon glyphicon-star"></div>
								</div>
							</div>
					 	</div>	 
					</div>
				</div>
			</div>
		</div><br><br>
		<center>
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
</center>

<script type="text/javascript" src="source/bootstrap-3.3.6-dist/js/jquery.js"></script>
<script type="text/javascript" src="source/js/isotope.js"></script>
<script type="text/javascript" src="source/js/myscript.js"></script> 
<script type="text/javascript" src="source/bootstrap-3.3.6-dist/js/jquery.1.11.js"></script>
<script type="text/javascript" src="source/bootstrap-3.3.6-dist/js/bootstrap.js"></script>
</body>
</html>