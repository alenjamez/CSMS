<?php
 $con=mysqli_connect("localhost","root","","car showroom") or die("couldn't connect");
 ?>
<!DOCTYPE html>
<html>
  <head><title>car showroom</title>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <script>
			function pass()
				{
					var n=document.getElementById("p1");
					//var letter=/^(?=.*[!@#$%^&*(),.?":{}|<>\ )(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
					var letter=/^[a-zA-Z0-9:@]+$/;
					if(n.value == "")
					{
						n.placeholder ="Password is empty";
					}
					else if(!n.value.match(letter))
					{
						n.value ="";
						n.placeholder ="Atleast 1 small and 1 num  with length greater than 8";
					}
				}

			function check()
				{
					var n1=document.getElementById("p1");
					var n2=document.getElementById("p2");
					if(n2.value == "")
					{
						n2.placeholder ="Password is empty";
					}
					else if(n1.value!=n2.value)
					{
						n2.value ="";
						n2.placeholder ="Password doesn't match...!! ";
					}
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
            <form method="post" action="php/fpPasswordUpdation.php" enctype="multipart/form-data">
            <center><h3 style="color:#f2f2f2"><b>Create New Password</h3></b></center><br><br>
            <div class="form-group">
			<center>
					<!-- <p>Enter a new password including uppercase, lowercase,numbers and special charecters with minimum of 8 length</p> -->
					<!-- <input type="password" id="pass" class="inputs" name="password" placeholder="New password" onblur="email_id(this.id)"/> -->

					<input type="password" class="form-control" placeholder="Enter New Password" name ="password" id="p1"  onblur="pass()"required><br>
					<input type="password" class="form-control" placeholder="Confirm Password" name ="pass2" id="p2"  onblur="check()"required><br>
					<!-- <a href="ForgotPassword.php">Resend</a> -->
					<br>
            <div class="form-group"><input type="submit" value="Reset Password" class="form-control"></div>
            <footer><a href="login.php?msg=" style="color:#f2f2f2;">Home</a></footer>
            </form>
          </div>
        <div>
      </div>
      <span></span>
    </div>
    </div>
  </body>
</html>
