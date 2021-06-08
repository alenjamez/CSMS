<?php
include('includes/dbconnection.php');
 ?>
<!DOCTYPE html>
<html>
  <head><title>car showroom</title>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <script>
	function uname()
	{
		var n=document.getElementById("otp");
		if(n.value == "")
		{
			n.placeholder ="OTP is empty";
		}
	}
	function ee()
	{
		document.getElementById('err').style.cssText="visibility: hidden";

	}
</script>
  <style>
    body {font-family: Arial, Helvetica, sans-serif;
      background-color: #469fbd;
      background-position: center;
      background-size: contain;}
    /* .blackbox{
      background-image: url("upload/images/login.jpg"); 
      position: fixed;
      width: 1000px;
      height:550px;
      padding: 0px 0px 0px 30px;
      top:50%;
      left:50%;
      transform: translate(-50%,-50%);
      display: flex;
      border: 2px solid  #c1c8e4;
      border-radius: 10px;
      box-shadow: rgba(133, 133, 133, 0.603) 10px 10px 10px;
      opacity: 0.9;
    }
    .left { 
	    right: 0;
      width: 70%;
    } 
    .right{
      width: 35%;
	    left:0;
    } */
    .loginform{
      margin-top: 8%;
      padding: 20px 5px 20px 5px;
      border: 2px solid  #c1c8e4;
      border-radius: 10px;
      box-shadow: rgba(133, 133, 133, 0.603) 10px 10px 10px;
      margin-left: 35%;
      margin-right: 35%;

    }
    .loginform .input{
      width:100%;
      border-top-left-radius: 5px;
     border-bottom-left-radius: 5px;
    }
    span{
      padding-left:100px;
      color:red;
      font-size:16px;
    }

  </style>
  <body>
    <div class="blackbox">
      <div class="main right">
        <div class="loginform">
            <form method="post" action="php/fpOtpValidation.php" enctype="multipart/form-data">
            <center><h3 style="color:#f2f2f2"><b>Verify OTP</h3></b></center><br><br>
            <div class="form-group">
			<?php
						if(isset($_GET['err'])){
							echo '<input type="text" class="form-control" placeholder="Invalid OTP" name ="otp" id="otp" onclick=ee() onblur="uname()" required><br>';
						}
						else{
							echo '<input type="text" class="form-control"  placeholder="Enter OTP" name ="otp" id="otp" onclick=ee() onblur="uname()" required><br>';
						}
            		?>

					<br><br>
            <div class="form-group"><input type="submit" value="Verify" class="form-control" name="button"></div>
            <footer><a href="php/fpEmailValidation.php" style="color:#f2f2f2;">Resend</a><br>
            <a href="login.php?msg=" style="color:#f2f2f2;">Home</a></footer>
            </form>
          </div>
        <div>
      </div>
      <span></span>
    </div>
    </div>
  </body>
</html>
