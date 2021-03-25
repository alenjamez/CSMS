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
.tab {
  overflow: hidden;
  margin-top:10px;
  margin-bottom:20px;
  margin-right:30px;
  margin-left:17%;
}
.tab button {
  background-color:#c2cad0;
  float: left;
  border:none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}
.tab button:hover {
  border-bottom: 5px solid white;
  font-weight: bold; 
}
.tab button.active {
  border-bottom: 5px solid white; 
  font-weight: bold;
}
.tabcontent {
  display: none;
  padding: 20px 20px 20px 20px;
  border: 1px solid #ccc;
  border-radius:10px;
  border-top: none;
  margin-bottom:20px;
  background-color: white;
  margin-right:30px;
  height:100%;
  margin-left:17%;
  position:relative;
}
.tabcontent label{
  margin-right:10px;
  color:black;
  padding:10px 10px 10px 10px;
}

.tabcontent input[type=text],[type=file]{
  width:250px;
  margin-right:70px;
  float:right;
}
.tabcontent select{
  width:250px;
  margin-right:70px;
  float:right;
  height:35px;
}
.tabcontent textarea{
  width:250px;
  margin-right:70px;
  float:right;
}
.tabcontent .radio input[type=radio]{
  width:20px;
  padding:0px 0px 0px 0px;
}
.tabcontent .radio label{
  width:150px;
  color:black;
  margin-right:0;
  text-align:left !important;
}
input[type=submit] {
  width: 15%;
  height:15%;
  color: #f2f2f2;
  background-color:  #469fbd;
  border-radius: 10px;
  opacity: 1;
  font-weight: bold;
  margin-left:350px;
  }
  span{
        right:0;
        margin-right:40px;
        float: right;
        font-size: 13px;
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
    xhttp.open("GET", "selectcar.php?id="+value, true);
    xhttp.send();
  }
  function test1(value)
  {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function()
    {
        if (this.readyState == 4 && this.status == 200) 
        {
          document.getElementById("sele").innerHTML=this.responseText;
        }
    };
    xhttp.open("GET", "selectcar.php?id="+value, true);
    xhttp.send();
  }
  function test2(value)
  {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function()
    {
        if (this.readyState == 4 && this.status == 200) 
        {
          document.getElementById("seler").innerHTML=this.responseText;
        }
    };
    xhttp.open("GET", "selectcar.php?id="+value, true);
    xhttp.send();
  }
  function test3(value)
  {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function()
    {
        if (this.readyState == 4 && this.status == 200) 
        {
          document.getElementById("mod").innerHTML=this.responseText;
        }
    };
    xhttp.open("GET", "selectmodel.php?id="+value, true);
    xhttp.send();
  }
  // function charect(value)
  // {
  //   var nam1=/^[a-zA-Z]+$/;
  //   alert(value);
  //   if(value.match(nam1))
  //   {
  //     document.getElementById("error").innerHTML="";
  //   }
  //   else
  //   {
  //     document.getElementById("error").innerHTML="* Name must only contain characters";
  //     document.getElementById("error").style.color = "red";
  //     return false;
  //     }
  //   }
  // }
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
      <button class="dropdown-btn"  style="outline:none">Car</button>
      <div class="dropdown-container">
        <a href="comadd.php">Add car</a>
        <a href="managecar.php">Manage Details</a>
      </div>
      <button class="dropdown-btn"  style="outline:none">Accesory</button>
      <div class="dropdown-container">
        <a href="#">Add car</a>
        <a href="#">Manage Details</a>
      </div>
        <a href="#" >Sales</a>
        <a href="logout.php" >Log Out</a>
      </div>
    </div>
  </div>
	<div class="back">
		  <p style="color:black;float:right;margin-right:2px;"><b><?php echo $_SESSION['user']; ?>&nbsp;
        <img src="upload/profile/admin.jpg" width="40" height="40"><p><br>
  </div>
	<h1>Add Car</h1>
	<div class="name">
	 <h6 style="margin-left:10px;"><a href="#"style="text-decoration:none;color:black;">Home</a>&nbsp;/&nbsp;Car&nbsp;/&nbsp;Add Car</h6>
	</div><br>
  <div class="add_car">
    <div class="tab">
      <button class="tablinks" style="margin-left:280px" onclick="openCity(event, 'car')" id="defaultOpen">Car Details</button>
      <button class="tablinks" onclick="openCity(event, 'model')">Model</button>
      <button class="tablinks" onclick="openCity(event, 'colour')">Colour</button>
      <button class="tablinks" onclick="openCity(event, 'fuel')">Transmission</button>
      <span id="error">Hello</span>
    </div>

    <div id="car" class="tabcontent">
      <div class="container bootstrap snippet">
        <div class="row">
  	      <div class="col-sm-6">
            <form class="form" method="post" id="details1" enctype="multipart/form-data">
	          <label style="margin-top:45px;">Name</label><input type="text" name="name" style="margin-top:50px;" required><br>
            <label >Car Type</label><select name="cartype" required>
              <option value="">Choose car Type</option>
              <option value="Sedan">Sedan</option>
              <option value="HatchBack">HatchBack</option>
              <option value="SUV">SUV</option>
              <option value="MUV">MUV</option>
              <option value="Luxury">Luxury</option></select>
		        <label>Ground Clearence</label><input type="text" name="bodytype" required><br>
            <label>Car Lenght</label><input type="text" name="length" required><br>
  	        <label>Car Width</label><input type="text" name="width" required><br>
            <label>Car Height</label><input type="text" name="heigth" required><br>
            <label>No of seats</label><input type="text" name="seat" required><br>
          </div>
    	    <div class="col-sm-6">
            <div class="tab-content">
              <div class="tab-pane active" id="home"><br><br>

                <label>No of Airbag</label><input type="text" name="airbag" required><br>
			          <label>Company</label><select name="company">
                <option value="" disabled selected>Choose Company</option>
                <?php 
                $sql3="select comp_id,name from tbl_com where status=1";
                $res=mysqli_query($con,$sql3);
                $select= '<select name="company" >';
                while($row=mysqli_fetch_array($res))
                {
                  echo '<option value="'.$row['comp_id'].'">'.$row['name'].'</option>';
                }
                ?></select>
                <label>Boot Space</label><input type="text" name="boot" required><br>
                <label>Fuel Capacity</label><input style="margin-top:10px" type="text" name="capacity" required><br>
                <div class="radio">
                  <label>Air Conditioner</label>
                  <input style="margin-left:20px;" type="radio" name="ac" value="Yes" required>&nbsp;Yes
                  <input type="radio" name="ac" value="No">&nbsp;No
                </div>
                <div class="radio">
                  <label>Power Steering</label>
                  <input style="margin-left:20px;" type="radio" name="display" value="Yes" required>&nbsp;Yes
                  <input type="radio" name="display" value="No">&nbsp;No
                </div>
                <label>Emission Norm </label><input type="text" name="desc" id="desc" required><br><br>
	              <input type="submit" name="Add1" value="Add">
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="model" class="tabcontent">
      <div class="container bootstrap snippet">
        <div class="row">
  	      <div class="col-sm-6">
            <form class="form" method="post" id="details2" enctype="multipart/form-data">
            <label style="margin-top:45px;">Company</label><select name="company" style="margin-top:50px;" onChange="test(this.value)" required>
            <option value="" disabled selected>Choose Company</option>
            <?php 
            $sql3="select comp_id,name from tbl_com where status=1";
            $res=mysqli_query($con,$sql3);
            while($row=mysqli_fetch_array($res))
            {
              echo '<option value="'.$row['comp_id'].'">'.$row['name'].'</option>';
            }
            ?></select><br>
            
            
            <label>Car</label>
            <select id="sel" name="car" required>
              <option value="" disabled selected>Choose Car</option> 
            </select><br>


            <label>Car Model</label><input type="text" name="model" required><br>
            <label>Wheel</label><input type="text" name="wheel" required><br>
            <div class="radio">
                  <label>Fog lamb</label><input type="radio" style="margin-left:20px;" name="fog" value="Yes" required>&nbsp;Yes
                  <input type="radio" name="fog" value="No">&nbsp;No
            </div>
            <div class="radio">
                  <label>Power start</label><input type="radio" style="margin-left:20px;" name="start" value="Yes" required>&nbsp;Yes
                  <input type="radio" name="start" value="No">&nbsp;No
            </div>
            <label>Sterio</label><input type="text" name="sterio" pattern="[A-Za-z]+"><br>

          </div>
    	    <div class="col-sm-6">
            <div class="tab-content">
              <div class="tab-pane active" id="home"><br><br>
                <div class="radio">
                  <label>Auto AC</label><input type="radio" style="margin-left:20px;" name="auto" value="Yes" required>&nbsp;Yes
                  <input type="radio" name="auto" value="No">&nbsp;No
                </div>
                <div class="radio">
                  <label>Sunroof</label><input type="radio" style="margin-left:20px;" name="sunroof" value="Yes" required>&nbsp;Yes
                  <input type="radio" name="sunroof" value="No">&nbsp;No
                </div>
                <div class="radio">
                  <label>Auto Headlamb</label><input type="radio" style="margin-left:20px;" name="headlamb" value="Yes" required>&nbsp;Yes
                  <input type="radio" name="headlamb" value="No">&nbsp;No
                </div>
                <div class="radio">
                  <label>Sensor</label><input type="radio" style="margin-left:20px;" name="sensor" value="Yes" required>&nbsp;Yes
                  <input type="radio" name="sensor" value="No">&nbsp;No
            </div>
            <div class="radio">
                  <label>Reverse Camera</label><input type="radio" style="margin-left:20px;" name="camera" value="Yes" required>&nbsp;Yes
                  <input type="radio" name="camera" value="No">&nbsp;No
            </div>
            <div class="radio">
                  <label>Power Window</label>
                  <input style="margin-left:20px;" type="radio" name="window" value="Front only" required>&nbsp;Front only
                  <input type="radio" name="window" value="Both">&nbsp;Both
                  <input type="radio" name="window" value="No">&nbsp;No
                </div>
	              <input type="submit" name="Add2" value="Add">
                </form>    
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="colour" class="tabcontent">
      <div class="container bootstrap snippet">
        <div class="row">
  	      <div class="col-sm-6">
            <form class="form" method="post" id="details3" enctype="multipart/form-data">
            <label style="margin-top:45px;">Company</label><select name="company" style="margin-top:50px;" onChange="test1(this.value)" required>
            <option value="" disabled selected>Choose Company</option>
            <?php 
            $sql3="select comp_id,name from tbl_com where status=1";
            $res=mysqli_query($con,$sql3);
            while($row=mysqli_fetch_array($res))
            {
              echo '<option value="'.$row['comp_id'].'">'.$row['name'].'</option>';
            }
            ?></select><br>
            
            
            <label>Car</label>
            <select id="sele" name="car" required>
              <option value="" disabled selected>Choose Car</option> 
            </select><br>
            <label>Colour</label><input type="text" name="colour" required><br>
            <label>Car Image</label><input type="file" name="car1" required><br>
            <label>Image2</label><input type="file" name="car2" ><br>
          </div>
    	    <div class="col-sm-6">
            <div class="tab-content">
              <div class="tab-pane active" id="home"><br><br>
                <label>Interior1</label><input type="file" name="car3" ><br>
                <label>Interior2</label><input type="file" name="car4" ><br>
                <label>Image5</label><input type="file" name="car5" ><br>
                <label>Image6</label><input type="file" name="car6" ><br>
	              <input type="submit" name="Add3" value="Add">
                </form>    
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="fuel" class="tabcontent">
      <div class="container bootstrap snippet">
        <div class="row">
  	      <div class="col-sm-6">
            <form class="form" method="post" id="details3" enctype="multipart/form-data">
            <label style="margin-top:45px;">Company</label><select name="company" style="margin-top:50px;" onChange="test2(this.value)" required>
            <option value="" disabled selected>Choose Company</option>
            <?php 
            $sql3="select comp_id,name from tbl_com where status=1";
            $res=mysqli_query($con,$sql3);
            while($row=mysqli_fetch_array($res))
            {
              echo '<option value="'.$row['comp_id'].'">'.$row['name'].'</option>';
            }
            ?></select><br>
          
            <label>Car</label><select id="seler" name="car" onChange="test3(this.value)" required>
              <option value="" disabled selected>Choose Car</option> 
            </select><br>
            <label>Car Model</label><select name="mod" id="mod" required>
            <option value="" disabled selected>Choose model</option>
            </select><br>
            <label>Fuel Type</label><select name="fueltype" required>
              <option value="" disabled selected>Choose Fuel Type</option>
              <option value="Petrol">Petrol</option>
              <option value="Disel">Disel</option>
              <option value="CNG">CNG</option>
              <option value="Electric">Electric</option></select>
            <label>Transmission </label><select name="gear" required>
              <option value="" disabled selected>Choose Transmission Type</option>
              <option value="Automatic" >Automatic</option>
              <option value="Manual">Manual</option>
              <option value="Semi-Automatic and Dual Cluch">Semi-Automatic and Dual Cluch</option></select>     
              <label>Engine Type</label><input style="margin-top:10px" type="text" name="engtype"><br>
              
          </div>

    	    <div class="col-sm-6">
            <div class="tab-content">
              <div class="tab-pane active" id="home"><br><br>
                <label>No of Gear</label><input type="text" name="gearno" id="gearno" required><br>
                <label>Millage</label><input type="text" name="millage" required><br>
                <label>Engine CC</label><input type="text" name="power" required><br>
  	            <label>BHP</label><input type="text" name="torque" required><br>
                <label>Car Price</label><input type="text" name="price" required><br><br>     
	              <input type="submit" name="Add4" value="Add">
                </form>    
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script>
    function myFunction(element) {
      window.alert("hello");
      var fun=element;
      <?php $comp=fun;
      $sql12="select comp_id from tbl_com where name='$comp' and status=1";?>
      die($sql12);
    }
  </script>  
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
  <script>
  function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
  </script>
</boby>
</html>
<?php
  if(array_key_exists('Add1', $_POST))
  {
   $name=$_POST["name"];
   $cartype=$_POST["cartype"];
   $bodytype=$_POST["bodytype"];
   $length=$_POST["length"];
   $width=$_POST["width"];
   $heigth=$_POST["heigth"];
   $company=$_POST["company"];
   $seat=$_POST["seat"];
   $boot=$_POST["boot"];
   $ac=$_POST["ac"];
   $capacity=$_POST["capacity"];
   $display=$_POST["display"];
   $airbag=$_POST["airbag"];
   $desc=$_POST["desc"];

   $sql1="insert into tbl_car (name,car_type,ground,steering,airbag,ac,capacity,length,width,heigth,bootspace,enc,seat,comp_id) values ('$name','$cartype','$bodytype','$display',$airbag,'$ac',$capacity,$length,$width,$heigth,$boot,'$desc',$seat,$company)";
   
   mysqli_query($con,$sql1);
  }
  if(array_key_exists('Add2', $_POST))
  {
   $car=$_POST["car"];
   $model=$_POST["model"];
   $fog=$_POST["fog"];
   $wheel=$_POST["wheel"];
   $start=$_POST["start"];
   $auto=$_POST["auto"];
   $window=$_POST["window"];
   $sunroof=$_POST["sunroof"];
   $headlamb=$_POST["headlamb"];
   $camera=$_POST["camera"];
   $sensor=$_POST["sensor"];
   $sterio=$_POST["sterio"];


   $sql6="insert into tbl_model(model,wheel,fog_lamb,sensor,camera,powerstart,autoac,sunroof,headlamb,sterio,car_id,window) values('$model','$wheel','$fog','$sensor','$camera','$start','$auto','$sunroof','$headlamb','$sterio',$car,'$window')";
   mysqli_query($con,$sql6);
  }
  if(array_key_exists('Add3', $_POST))
  {
   $car=$_POST["car"];
   $colour=$_POST["colour"];
   $car1=$_FILES["car1"]["name"];
   $car2=$_FILES["car2"]["name"];
   $car3=$_FILES["car3"]["name"];
   $car4=$_FILES["car4"]["name"];
   $car5=$_FILES["car5"]["name"];
   $car6=$_FILES["car6"]["name"];

   $sql7="insert into tbl_carimage(main,image1,image2,image3,image4,image5,colour,car_id) values ('$car1','$car2','$car3','$car4','$car5','$car6','$colour','$car')";
   mysqli_query($con,$sql7);
   $t="upload/car/".$car1;
   move_uploaded_file($_FILES["car1"]["tmp_name"],$t);
   $v="upload/car/".$car2;
   move_uploaded_file($_FILES["car2"]["tmp_name"],$v);
   $w="upload/car/".$car3;
   move_uploaded_file($_FILES["car3"]["tmp_name"],$w);
   $x="upload/car/".$car4;
   move_uploaded_file($_FILES["car4"]["tmp_name"],$x);
   $y="upload/car/".$car5;
   move_uploaded_file($_FILES["car5"]["tmp_name"],$y);
   $z="upload/car/".$car6;
   move_uploaded_file($_FILES["car6"]["tmp_name"],$z);

  }
  if(array_key_exists('Add4', $_POST))
  {
   $car=$_POST["car"];
   $model=$_POST["mod"];
   $fueltype=$_POST["fueltype"];
   $price=$_POST["price"];
   $engtype=$_POST["engtype"];
   $millage=$_POST["millage"];
   $gear=$_POST["gear"];
   $gearno=$_POST["gearno"];
   $power=$_POST["power"];
   $torque=$_POST["torque"];
   $sql8="insert into tbl_transmission(type,fuel,enginecc,bhp,millage,price,car_id,model_id,gearno,engtype) values ('$gear','$fueltype',$power,'$torque',$millage,$price,$car,$model,$gearno,'$engtype')";
   mysqli_query($con,$sql8);
  }
 }
 else{
	header("location:login.php?msg=");
  }
?>