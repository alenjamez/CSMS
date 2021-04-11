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
        $name=$row['name'];
        $gender=$row['gender'];
        $email=$row['email'];
        $phno=$row['phone'];
        $propic='../upload/profile/'.$row["pic"];
      }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <title>UR CARZ</title>
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../style/sidebar.css" rel="stylesheet">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
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
        function gend()
        {
        var ps=document.getElementById("gen").value;
        if(ps=="Male" || ps=="Female")
            {
                document.getElementById("error").innerHTML="";
                
            }
        else
            {
                document.getElementById("error").innerHTML="* Value Should be Male or Female";
                document.getElementById("error").style.color = "red";
                document.getElementById("gen").focus();
            }
        }
        </script>
</head>
<body>
<div class="sidenav">
  <div class="sidebar-heading">UR CARZ</div>
        <a href="empdash.php" >Dashboard</a>
        <a href="#" >Profile</a>
        <button class="dropdown-btn" style="outline:none">Attendance
        </button>
        <div class="dropdown-container">
        <a href="attndance.php">Attendance</a>
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
<h1>Profile</h1>
<div class="name">
<h6 style="margin-left:10px;"><a href="#"style="text-decoration:none;color:black;">Home</a>&nbsp;/&nbsp;Profile</h6>
</div><br>
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'edit')" id="defaultOpen">Edit Details</button>
  <button class="tablinks" onclick="openCity(event, 'change')">Change Password</button>
</div>

<div id="edit" class="tabcontent">
  <div class="container bootstrap snippet">
    <div class="row">
  	<div class="col-sm-3">
      <div class="text-center">
      <form class="form" method="post" id="registrationForm1" enctype="multipart/form-data">
        <img  id="img1" src="<?php echo $propic;?>" class="avatar img-circle img-thumbnail" alt="avatar"><br>
        <input type="file"  class="text-center center-block file-upload" style="color:#141e30" name="img" id="img" onblur="Val()">
      </div><br>
        </div>
    	    <div class="col-sm-9">
                <div class="tab-content">
                    <div class="tab-pane active" id="home"><br><br>
                        <div class="form-group">
                          <div class="col-xs-6">
                              <label for="first_name"><h4>Name</h4></label>
                              <input type="text" class="form-control" name="nme" id="name" value="<?php echo $name;?>" onblur="rname()" style=" font-size:15px;">
                          </div>
                        </div>
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="user"><h4>Username</h4></label>
                              <input type="text" class="form-control" name="user" id="user" value="<?php echo $usr;?>" readonly style=" font-size:15px;" >
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
                              <input type="text" class="form-control" name="phne" id="ph" onblur="phn()" value="<?php echo $phno;?>" style=" font-size: 15px;">
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="gender"><h4>Gender</h4></label>
                              <input type="text" class="form-control" name="gender" id="gen" value="<?php echo $gender;?>" style=" font-size: 15px;" onblur="gend()">
                              
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	  <input class="btn btn-lg btn-success" type="submit" name="save" onsubmit="rname(); ema(); phn(); usr(); gend(); Val();">
                            </div>
                      </div>
              	</form>
                <span id="error"></span>
             </div>
            </div></div>
        </div>
    </div></div>


    <div id="change" class="tabcontent">
        <div class="container bootstrap snippet">
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
                            <span id="err"></span>
            </div>
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
</body>
</html>
<?php
  if(array_key_exists('save', $_POST)) { 
    $name=$_POST["nme"];
    $gender=$_POST["gender"];
    $email=$_POST["mail"];
    $phno=$_POST["phne"];
    $photo=$_FILES["img"]["name"];
    $sql1="update tbl_emp set name='$name',gender='$gender',email='$email',phone='$phno',pic='$photo' where login_id='$lid'";
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