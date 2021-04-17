<!DOCTYPE html>
<?php
 $con=mysqli_connect("localhost","root","","car showroom") or die("couldn't connect");
 session_start();
 $carid=$_GET['id'];
 if(isset($_SESSION['user']))
 {
     $sql30="select * from tbl_car where car_id='$carid'";
     $res=mysqli_query($con,$sql30);
     while($row=mysqli_fetch_array($res))
      {
        $name=$row["name"];
        $cartype=$row["car_type"];
        $ground=$row["ground"];
        $length=$row["length"];
        $width=$row["width"];
        $heigth=$row["heigth"];
        $seat=$row["seat"];
        $boot=$row["bootspace"];
        $ac=$row["ac"];
        $capacity=$row["capacity"];
        $display=$row["steering"];
        $airbag=$row["airbag"];
        $emission=$row["enc"];
        $desc=$row["description"];

      }
 ?>
<html lang="en">
  <head>
  <title>UR CARZ</title>
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../style/sidebar.css" rel="stylesheet">
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
  function test()
  {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function()
    {
        if (this.readyState == 4 && this.status == 200) 
        {
          document.getElementById("mod").innerHTML=this.responseText;
        }
    };
    xhttp.open("GET", "selectmodel.php?id=<?php echo $carid ?>", true);
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
  function Val(id)
        {
            var fileInput = document.getElementById(id);
            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
            if(!allowedExtensions.exec(filePath)){
            fileInput.value = '';
            document.getElementById("error").innerHTML="* Must be only .jpg,.jepg,.png file";
            document.getElementById("error").style.color = "red";
	        return false;
       }
      else{
        document.getElementById("error").innerHTML="";
        return true;
      }
  }
  function fun(value)
  {
    alert(value);
  }
</script>
</head>
<body onload="test()">
<div class="sidenav">
  <div class="sidebar-heading">UR CARZ</div>
        <a href="dashboard.php" >Dashboard</a>
        <button class="dropdown-btn" style="outline:none">Employee
        </button>
        <div class="dropdown-container">
        <a href="comadd.php">Add Employee</a>
        <a href="company.php?msg=">View Details</a>
        <a href="">Attendance</a>
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
  </div>
	<div class="back">
		  <p style="color:black;float:right;margin-right:2px;"><b><?php echo $_SESSION['user']; ?>&nbsp;
        <img src="../upload/profile/admin.jpg" width="40" height="40"><p><br>
  </div>
	<h1>Add Car</h1>
	<div class="name">
	 <h6 style="margin-left:10px;"><a href="#"style="text-decoration:none;color:black;">Home</a>&nbsp;/&nbsp;Car&nbsp;/&nbsp;Edit Details</h6>
	</div><br>
  <div class="add_car">
    <div class="tab">
      <button class="tablinks" style="margin-left:280px" onclick="openCity(event, 'car')" id="defaultOpen">Car Details</button>
      <button class="tablinks" onclick="openCity(event, 'model')">Model</button>
      <button class="tablinks" onclick="openCity(event, 'colour')">Colour</button>
      <button class="tablinks" onclick="openCity(event, 'Image')">Image</button>
      <button class="tablinks" onclick="openCity(event, 'fuel')">Transmission</button>
      <span id="error"></span>
    </div>

    <div id="car" class="tabcontent">
      <div class="container bootstrap snippet">
        <div class="row">
  	      <div class="col-sm-6">
            <form class="form" method="post" id="details1" enctype="multipart/form-data">
	          <label style="margin-top:45px;">Name</label><input type="text" name="name" style="margin-top:50px;" value="<?php echo $name ?>" required><br>
            <label >Car Type</label><select name="cartype" required>
              <option value="<?php echo $cartype ?>"><?php echo $cartype ?></option>
              <option value="Sedan">Sedan</option>
              <option value="HatchBack">HatchBack</option>
              <option value="SUV">SUV</option>
              <option value="MUV">MUV</option>
              <option value="Luxury">Luxury</option></select>
		        <label>Ground Clearence</label><input type="text" name="bodytype" required value="<?php echo $ground ?>"><br>
            <label>Car Lenght</label><input type="text" name="length" required value="<?php echo $length ?>"><br>
  	        <label>Car Width</label><input type="text" name="width" required value="<?php echo $width ?>"><br>
            <label>Car Height</label><input type="text" name="heigth" required value="<?php echo $heigth ?>"><br>
            <label>No of seats</label><input type="text" name="seat" required value="<?php echo $seat ?>"><br>
          </div>
    	    <div class="col-sm-6">
            <div class="tab-content">
              <div class="tab-pane active" id="home"><br><br>

                <label>No of Airbag</label><input type="text" name="airbag" required value="<?php echo $airbag ?>"><br>
                <label>Boot Space</label><input type="text" name="boot" required value="<?php echo $boot ?>"><br>
                <label>Fuel Capacity</label><input style="margin-top:10px" type="text" name="capacity" required value="<?php echo $capacity ?>"><br>
                <label>Air Conditioner</label><input type="text"name="ac" required value="<?php echo $ac ?>"><br>
                <label>Power Steering</label><input type="text"name="display" required value="<?php echo $display ?>"><br>
                <label>Emission Norm </label><input type="text" name="emmi" id="emmi" required value="<?php echo $emission ?>"><br>
                <label>Description </label><textarea name="desc" id="desc" required><?php echo $desc ?></textarea><br><br>
	              <input type="submit" name="Add1" value="Update">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="model" class="tabcontent" >
      <div class="container bootstrap snippet">
        <div class="row">
  	      <div class="col-sm-6">
            <form class="form" method="post" id="details2" enctype="multipart/form-data" >
            <label style="margin-top:50px;">Car Model</label><select name="mod" id="mod" style="margin-top:50px;" required onchange="fun(this.value)">
            <option value="" disabled selected>Choose model</option>
            </select><br>
            <label>Wheel</label><input type="text" name="wheel" required><br>
            <label>Fog lamb</label><input type="text" name="fog" value="Yes" required>
            <label>Power start</label><input type="text"  name="start" value="Yes" required><br>
            <label>Sterio</label><input type="text" name="sterio" pattern="[A-Za-z]+"><br>

          </div>
    	    <div class="col-sm-6">
            <div class="tab-content">
              <div class="tab-pane active" id="home"><br><br>
                <div class="radio">
                  <label>Auto AC</label><input type="text" name="auto" value="Yes" required>
                  <label>Sunroof</label><input type="text" name="sunroof" value="Yes" required>
                  <label>Auto Headlamb</label><input type="text" name="headlamb" value="Yes" required>
                  <label>Sensor</label><input type="text" name="sensor" value="Yes" required>
                  <label>Reverse Camera</label><input type="text" name="camera" value="Yes" required>
                  <label>Power Window</label><input  type="text" name="window" value="Front only" required>
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
            <label name="car" style="margin-top:50px;">Car</label>
            <select id="sele" name="car" style="margin-top:50px;" required>
              <option value="" disabled selected>Choose Car</option> 
              <?php 
            $sql3="select car_id,name from tbl_car where status=1";
            $res=mysqli_query($con,$sql3);
            while($row=mysqli_fetch_array($res))
            {
              echo '<option value="'.$row['car_id'].'">'.$row['name'].'</option>';
            }?>
            </select><br>
            <label>Colour</label><input type="text" name="colour" required><br>
            <label>Car Image</label><input type="file" name="carimg"  id="carimg" onblur="Val(this.id)" required><br>
            <input type="submit" name="Add3" value="Add" ></form>
          </div>
        </div>
      </div>
    </div>

    <div id="Image" class="tabcontent">
      <div class="container bootstrap snippet">
        <div class="row">
  	      <div class="col-sm-6">
            <form class="form" method="post" id="details5" enctype="multipart/form-data">
            <label name="car" style="margin-top:50px;">Car</label>
            <select id="sele" name="car" style="margin-top:50px;" required>
              <option value="" disabled selected>Choose Car</option> 
              <?php 
            $sql3="select car_id,name from tbl_car where status=1";
            $res=mysqli_query($con,$sql3);
            while($row=mysqli_fetch_array($res))
            {
              echo '<option value="'.$row['car_id'].'">'.$row['name'].'</option>';
            }?>
            </select><br>
            <label>Image1</label><input type="file" name="car1" id="car1" required onblur="Val(this.id)"><br>
            <label>Image2</label><input type="file" name="car2" id="car2" required onblur="Val(this.id)"><br>
            <label>Interior1</label><input type="file" name="car3" id="car3" required onblur="Val(this.id)"><br>
            <label>Interior2</label><input type="file" name="car4" id="car4" required onblur="Val(this.id)"><br>
            <label>Interior3</label><input type="file" name="car5" id="car5" required onblur="Val(this.id)"><br>
          </div>
    	    <div class="col-sm-6">
            <div class="tab-content">
              <div class="tab-pane active" id="home"><br><br>
                <label>Interior4</label><input type="file" name="car6" id="car6" required onblur="Val(this.id)"><br>
                <label>Image3</label><input type="file" name="car7" id="car7" required onblur="Val(this.id)"><br>
                <label>Image4</label><input type="file" name="car8" id="car8" required onblur="Val(this.id)"><br>
                <label>Image5</label><input type="file" name="car9" id="car9" required onblur="Val(this.id)"><br>
                <label>Image6</label><input type="file" name="car10" id="car10" required onblur="Val(this.id)"><br>
	              <input type="submit" name="Add5" value="Add">
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
            <label name="car" style="margin-top:50px;">Car</label><select id="seler" name="car" style="margin-top:50px;" onChange="test3(this.value)" required>
              <option value="" disabled selected>Choose Car</option> 
              <?php 
            $sql3="select car_id,name from tbl_car where status=1";
            $res=mysqli_query($con,$sql3);
            while($row=mysqli_fetch_array($res))
            {
              echo '<option value="'.$row['car_id'].'">'.$row['name'].'</option>';
            }
            ?></select><br>
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
   $seat=$_POST["seat"];
   $boot=$_POST["boot"];
   $ac=$_POST["ac"];
   $capacity=$_POST["capacity"];
   $display=$_POST["display"];
   $airbag=$_POST["airbag"];
   $emission=$_POST["emmi"];
   $desc=$_POST["desc"];

   $sql1="UPDATE tbl_car SET  name ='$name', car_type ='$cartype', ground ='$bodytype', steering ='$display', airbag =$airbag, ac ='$ac', capacity =$capacity, length =$length, width =$width, heigth =$heigth, bootspace =$boot, enc =$emission, seat =$seat, description ='$desc' WHERE car_id=id;
   mysqli_query($con,$sql1);
  }
  if(array_key_exists('Add2', $_POST))
  {
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
   $carim=$_FILES["carimg"]["name"];

   $sql10="insert into colour(colour,image,car_id) values ('$colour','$carim','$car')";
   mysqli_query($con,$sql10);
   $ta="../upload/car/".$carim;
   move_uploaded_file($_FILES["carimg"]["tmp_name"],$ta);

  }

  if(array_key_exists('Add5', $_POST))
  {
   $car=$_POST["car"];
   $car1=$_FILES["car1"]["name"];
   $car2=$_FILES["car2"]["name"];
   $car3=$_FILES["car3"]["name"];
   $car4=$_FILES["car4"]["name"];
   $car5=$_FILES["car5"]["name"];
   $car6=$_FILES["car6"]["name"];
   $car7=$_FILES["car7"]["name"];
   $car8=$_FILES["car8"]["name"];
   $car9=$_FILES["car9"]["name"];
   $car10=$_FILES["car10"]["name"];

   $sql7="insert into tbl_carimage(main,image1,image2,image3,image4,image5,image6,image7,image8,image9,car_id) values ('$car1','$car2','$car3','$car4','$car5','$car6','$car7','$car8','$car9','$car10','$car')";
   mysqli_query($con,$sql7);
   $t="../upload/car/".$car1;
   move_uploaded_file($_FILES["car1"]["tmp_name"],$t);
   $v="../upload/car/".$car2;
   move_uploaded_file($_FILES["car2"]["tmp_name"],$v);
   $w="../upload/car/".$car3;
   move_uploaded_file($_FILES["car3"]["tmp_name"],$w);
   $x="../upload/car/".$car4;
   move_uploaded_file($_FILES["car4"]["tmp_name"],$x);
   $y="../upload/car/".$car5;
   move_uploaded_file($_FILES["car5"]["tmp_name"],$y);
   $z="../upload/car/".$car6;
   move_uploaded_file($_FILES["car6"]["tmp_name"],$z);
   $l="../upload/car/".$car7;
   move_uploaded_file($_FILES["car7"]["tmp_name"],$l);
   $m="../upload/car/".$car8;
   move_uploaded_file($_FILES["car8"]["tmp_name"],$m);
   $n="../upload/car/".$car9;
   move_uploaded_file($_FILES["car9"]["tmp_name"],$n);
   $o="../upload/car/".$car10;
   move_uploaded_file($_FILES["car10"]["tmp_name"],$o);

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
	header("location:../login.php?msg=");
  }
?>