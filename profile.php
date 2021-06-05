<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_SESSION['user']))
 {   
    $lid=$_SESSION['logid'];
    $usr=$_SESSION['user'];
    $sql="select * from tbl_registration where login_id='$lid'";
    $res=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($res))
      {
        $name=$row['name'];
        $gender=$row['gender'];
        $email=$row['email'];
        $phno=$row['phone'];
        $loc=$row['location'];
        $propic='upload/profile/'.$row["propic"];
      }
?>

<!DOCTYPE html>
<html lang="zxx">
 
<head>
     <title>Car Showroom Management System / Car detail </title>
      
      <link rel="stylesheet" href="assets/css/master.css">
            <link rel="stylesheet" href="assets/css/master.css">
            <link rel="stylesheet" href="style/img.css"> 

    <style>

/* Style the tab */
.tab {
  overflow: hidden;
  color: white;
  margin-top:100px;
  margin-left:500px;
  margin-right:30px;
}

/* Style the buttons inside the tab */
.tablinks {
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
    border-bottom: 3px solid red; 
    border-radius:10px;
}

/* Create an active/current tablink class */
.tab button.active {
    border-bottom: 3px solid red; 
    border-radius:10px;
}

/* Style the tab content */
.tabcontent {
  display: none;
  border: 1px solid white;
  border-radius:10px;
  padding: 6px 12px;
  margin-top:10px;
  margin-left:30px;
  margin-right:30px;
  padding-bottom:50px;
  }
         
    h1 {
			font-size: 7em;
			line-height: 1.1;
			font-family: "Lobster", cursive;
			margin-bottom: .25em;
			color: rgba(255, 255, 255, 0.75);
			text-shadow: -2px -2px 0 rgba(0, 0, 0, 0.125);
			text-transform: none;
            margin-left: 0px;
    }
    label{
        color: white;
        font-family: "Times New Roman";
        font-style: italic;
    }
    input{
        font-family: "Times New Roman";
        font-weight: bold;
       
    }
    #img{
      margin-top:50px;
      padding-bottom:20px;
    }
    .err{
        right:0;
        margin-right:40px;
        float: right;
        font-size: 13px;
    }
}


</style>
<script>
        function rname()
        {
        var nam=document.getElementById("name").value;
        var nam1=/^[a-zA-Z]+$/;
        
        if(nam=="")
            {
                document.getElementById("error").innerHTML="* Enter name";
                document.getElementById("error").style.color = "black";
                document.getElementById("name").focus();
            return false;
            }
        if(nam.match(nam1))
            {
                document.getElementById("error").innerHTML="";
        
            }
        else
            {
                document.getElementById("error").innerHTML="* Name must only contain characters";
                document.getElementById("error").style.color = "red";
                document.getElementById("name").focus();
            return false;
        
            }
        }
        function ema()
        {
        var emi=document.getElementById("mail").value;
        var emi1=/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})+$/;
        if(emi=="")
            {
                document.getElementById("error").innerHTML="* Enter email";
                document.getElementById("error").style.color = "black";
                document.getElementById("mail").focus();
            return false;
            }
        if(emi.match(emi1))
            {
                document.getElementById("error").innerHTML="";
        
            }
        else
            {
                document.getElementById("error").innerHTML="* Enter valid email";
                document.getElementById("error").style.color = "red";
                document.getElementById("mail").focus();
            return false;
            }
        }
        function phn()
        {
        var ph=document.getElementById("ph").value;
        var ph1=/^([6-9]{1}[0-9]{9})+$/;
        if(ph=="")
            {
                document.getElementById("error").innerHTML="* Enter phno";
                document.getElementById("error").style.color = "black";
                document.getElementById("ph").focus();
            return false;
            }
        if((ph.match(ph1))&& (ph.length==10))
            {
                document.getElementById("error").innerHTML="";
        
            }
        else
            {
                document.getElementById("error").innerHTML="* Must contain only numbers and must have 10 digits";
                document.getElementById("error").style.color = "red";
                document.getElementById("ph").focus();
            return false;
            }
        }
        function usr()
        {
        var un=document.getElementById("user").value;
        var un1=/^[a-zA-Z]+$/;
        if(un=="")
            {
            document.getElementById("error").innerHTML="* Enter Username";
            document.getElementById("error").style.color = "black";
            document.getElementById("user").focus();
            return false;
            }
        if((un.match(un1))&&(un.length>=5))
            {
                document.getElementById("error").innerHTML="";
        
            }
        else
            {
                document.getElementById("error").innerHTML="* Username must contain only lowercase letters with length greater than 5";
                document.getElementById("error").style.color = "red";
                document.getElementById("user").focus();
            return false;
            }
        }
        
        function npsw()
        {
        var ps=document.getElementById("pass").value;
        var ps1=/^[a-zA-Z0-9:@]+$/;
        if(ps=="")
            {
                document.getElementById("err").innerHTML="* Enter Password";
                document.getElementById("err").style.color = "black";
                document.getElementById("pass").focus();
                return false;
            }
        if((ps.match(ps1))&& (ps.length>=8))
            {
                document.getElementById("err").innerHTML="";
        
            }
        else
            {
                document.getElementById("err").innerHTML="* Password must contain number and letter with length greater than 8";
                document.getElementById("err").style.color = "red";
                document.getElementById("pass").focus();
                return false;
            }
        }
        function psw1()
        {var ps=document.getElementById("pass").value;
        var ps1=document.getElementById("conpass").value;
        if(ps==ps1)
            {
                document.getElementById("err").innerHTML="";
                
            }
        else
            {
                document.getElementById("err").innerHTML="* Password not match!!!!!!!!!!";
                document.getElementById("error").innerHTML="* Password not match!!!!!!!!!!";
                document.getElementById("error").style.color = "red";
                document.getElementById("err").style.color = "red";
                document.getElementById("conpass").focus();
            }
        }
        function loca()
        {
        var loc=document.getElementById("loc").value;
        var loc1=/^[a-zA-Z]+$/;
        if(loc=="")
           {
                document.getElementById("error").innerHTML="* Enter location";
                document.getElementById("error").style.color = "black";
                document.getElementById("loc").focus();
            return false;
            }
        if(loc.match(loc1))
            {
                document.getElementById("error").innerHTML="";
        
            }
        else
            {
                document.getElementById("error").innerHTML="* Must conatian only characters";
                document.getElementById("error").style.color = "red";
                document.getElementById("loc").focus();
            return false;
        
            }
        }
        function gend()
        {
        var gener=document.getElementById("gen").value;
        if(loc=="")
           {
                document.getElementById("error").innerHTML="* Enter location";
                document.getElementById("error").style.color = "black";
                document.getElementById("gen").focus();
            return false;
            }
        if(gener=="Male" || gener=="Female")
            {
                document.getElementById("error").innerHTML="";
        
            }
        else
            {
                document.getElementById("error").innerHTML="* Value must be Male or Female";
                document.getElementById("error").style.color = "red";
                document.getElementById("loc").focus();
            return false;
        
            }
        }
        function Val()
        {
            var fileInput = document.getElementById('img');
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
        </script>
<script src="/assets/js/separate-js/html5shiv-3.7.2.min.js" type="text/javascript"></script>

  </head>
  <body class="page">
               
    <!-- Loader-->
      <div id="page-preloader"><span class="spinner border-t_second_b border-t_prim_a"></span></div>
    <!-- Loader end-->

      
        <?php include_once('includes/header.php');?>
            <!-- end .header-->
        <div class="section-title-page area-bg area-bg_dark area-bg_op_60">
          <div class="area-bg__inner">
            <div class="container">
              <div class="row">
                <div class="col offset-lg-3">
                  <div class="b-title-page__wrap">
                    <h1 class="b-title-page"></h1>
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                      </ol>
                      <!-- end breadcrumb-->
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end .b-title-page-->
  
            
        <div class="l-main-content">
            <div class="container">

            <div class="tab">
  <button class="tablinks" onclick="openCity(event, 'edit')" id="defaultOpen">Edit Details</button>
  <button class="tablinks" onclick="openCity(event, 'change')">Change Password</button>
</div>

<div id="edit" class="tabcontent">
  <div class="container bootstrap snippet">
    <div class="row">
  	<div class="col-sm-3">
      <span class="err" id="error"></span>
      <div class="text-center">
      <form class="form" method="post" id="registrationForm1" enctype="multipart/form-data">
        <img src="<?php echo $propic;?>" id="img" class="avatar img-circle img-thumbnail" alt="avatar"><br>
        <input type="file" class="text-center center-block file-upload" style="color:#141e30" name="img" id="img" onblur="Val()">
      </div><br>
        </div>
    	    <div class="col-sm-9">
                <div class="tab-content">
                    <!-- <div class="tab-pane active" id="home"><br><br> -->
                        <div class="form-group">
                          <div class="col-xs-6">
                              <label for="first_name"><h4>Name</h4></label>
                              <input type="text" class="form-control" name="nme" id="name" value="<?php echo $name;?>" onblur="rname()" style=" font-size:15px;">
                          </div>
                        </div>
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="user"><h4>Username</h4></label>
                              <input type="text" class="form-control" name="user" id="user" value="<?php echo $usr;?>" style=" font-size:15px;" readonly>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-xs-6">
                          <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control" name="mail" id="mail" value="<?php echo $email;?>" style=" font-size: 15px;">
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="phone"><h4>Phone</h4></label>
                              <input type="text" class="form-control" name="phne" id="ph" onblur="phn()" value="<?php echo $phno;?>" style=" font-size: 15px;" >
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="gender"><h4>Gender</h4></label>
                              <input type="text" class="form-control" name="gender" id="gen" value="<?php echo $gender;?>" style=" font-size: 15px;" onblur="gend()">
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="loc"><h4>Location</h4></label>
                              <input type="text" class="form-control" name="location" id="loc" onblur="loca()"  value="<?php echo $loc;?>" style=" font-size: 15px;">
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	  <input class="btn btn-lg btn-success" type="submit" name="save" onsubmit="rname(); ema(); phn(); loc(); usr(); Val();">
                            </div>
                      </div>
              	</form>
             </div>
             </div></div>
             </div>
             </div></div>


    <div id="change" class="tabcontent">
        <div class="container bootstrap snippet">
        <span clss="err" id="err"></span>
            <div class="tab-pane active" id="home"><br><br>
                    <form class="form" method="post" id="registrationForm" enctype="multipart/form-data">
                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="first_name"><h4>Password</h4></label>
                              <input type="password" name="psw" class="form-control" placeholder="Password" id="pass"  onblur="npsw()" style="font-size:15px;" required>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="password"><h4>Confirm Password</h4></label>
                              <input type="password" class="form-control" placeholder="Conform Password"  id="conpass" onblur="psw1()" style=" font-size:15px;" required>
                          </div>
                        </div>
                        <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	  <input class="btn btn-lg btn-success" type="submit" name="change" value="Change" onsubmit="npsw(); psw1();">
                            </div>
                        </div>
                    </form>
                           
            </div>
        </div>
    </div>



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
          <!-- end .b-goods-f-->
      
        </div>
      </div>
        
       
            
            
         <?php include_once('includes/footer.php');?>
          <!-- .footer-->
      </div>
    </div>
    <!-- end layout-theme-->
    
    
    <!-- ++++++++++++-->
    <!-- MAIN SCRIPTS-->
    <!-- ++++++++++++-->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-migrate-1.4.1.min.js"></script>
    <!-- Bootstrap-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- Select customization & Color scheme-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.5/js/bootstrap-select.min.js"></script>
  
    <!-- Pop-up window-->
    <script src="assets/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
    <!-- Headers scripts-->
    <script src="assets/plugins/headers/slidebar.js"></script>
    <script src="assets/plugins/headers/header.js"></script>
    <!-- Mail scripts-->
    <script src="assets/plugins/jqBootstrapValidation.js"></script>

    <!-- Video player-->
    <script src="assets/plugins/flowplayer/flowplayer.min.js"></script>
    <!-- Filter and sorting images-->
    <script src="assets/plugins/isotope/isotope.pkgd.min.js"></script>
    <script src="assets/plugins/isotope/imagesLoaded.js"></script>
    <!-- Progress numbers-->
    <script src="assets/plugins/rendro-easy-pie-chart/jquery.easypiechart.min.js"></script>
    <script src="assets/plugins/rendro-easy-pie-chart/jquery.waypoints.min.js"></script>
    <!-- Animations-->
    <script src="assets/plugins/scrollreveal/scrollreveal.min.js"></script>
    <!-- Scale images-->
    <script src="assets/plugins/ofi.min.js"></script>
    <!-- Video player-->
    <script src="assets/plugins/flowplayer/flowplayer.min.js"></script>
    <!--Sliders-->
    <script src="assets/plugins/slick/slick.js"></script>
    <!-- User customization-->
    <script src="assets/js/custom.js"></script>

    <script>
    function myFunction(imgs) {
      var expandImg = document.getElementById("expandedImg");
      var imgText = document.getElementById("imgtext");
      expandImg.src = imgs.src;
      imgText.innerHTML = imgs.alt;
      expandImg.parentElement.style.display = "block";
    }
    </script>

  </body>

</html>
<?php
  if(array_key_exists('save', $_POST)) { 
    $name=$_POST["nme"];
    $gender=$_POST["gender"];
    $loc=$_POST["location"];
    $email=$_POST["mail"];
    $phno=$_POST["phne"];
    $photo=$_FILES["img"]["name"];
    $sql1="update tbl_registration set name='$name',gender='$gender',email='$email',phone='$phno',location='$loc',propic='$photo' where login_id='$lid'";
    mysqli_query($con,$sql1);
    $t="upload/profile/".$photo;
    move_uploaded_file($_FILES["img"]["tmp_name"],$t); 
    
  } 
  else if(array_key_exists('change', $_POST)) { 
    $psw=md5($_POST["psw"]);
    $sql2="update tbl_login set password='$psw' where login_id='$lid'";
    mysqli_query($con,$sql2);
  } 
 }
 else{
  header("location:login.php?msg=");
 }
 ?>