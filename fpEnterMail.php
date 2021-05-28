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
	function myemail()
	{
		// window.alert('Done');

		var n=document.getElementById("email");
		var letter=/^([a-zA-Z0-9._-]{4,30})+@([a-zA-Z.-]{2,10})+\.([a-zA-Z]{2,4})$/;
			if(n.value == "")
			{
				n.placeholder ="Email id is empty";
			}
			else if(!n.value.match(letter))
			{
				n.value ="";
				n.placeholder ="Enter valid Email id";
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
            <form method="post" action="php/fpEmailValidation.php" enctype="multipart/form-data">
            <center><h3 style="color:#f2f2f2"><b>Verify Email</h3></b></center><br><br>
            <div class="form-group">
            <?php
						if(isset($_GET['err'])){
							if($_GET["err"]=="MailError"){
								echo "<h3 id='err' style='color:red'>Mail ID not found ! </h3>";
							}
						}
					?>
              <input type="Email" class="form-control" placeholder="Email" id="email" name="email" autocomplete=off onclick=ee() onblur="myemail()"  required >
            </div><br>
            <div class="form-group"><input type="submit" value="Verify" class="form-control" name="button"></div>
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
