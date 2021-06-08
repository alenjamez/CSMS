<?php
include('includes/dbconnection.php');
 session_start();
 $msg=$_GET['msg'];
 ?>
<!DOCTYPE html>
<html>
  <head><title>car showroom</title>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    body {font-family: Arial, Helvetica, sans-serif;
      background-color: #469fbd;
      background-position: center;
      background-size: contain;}
    .blackbox{
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
    }
    .loginform{
      margin-top: 100px;
      padding: 20px 5px 20px 5px;
      border: 2px solid  #c1c8e4;
      border-radius: 10px;
      box-shadow: rgba(133, 133, 133, 0.603) 10px 10px 10px;
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
            <form method="post" action="logcheck.php" enctype="multipart/form-data">
            <center><h3 style="color:#f2f2f2"><b>LOGIN</h3></b></center>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input type="text" class="form-control" placeholder="username" id="usr" name="usr" autocomplete=off  required >
            </div>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input id="psw" type="password" class="form-control" name="psw" placeholder="Password" required>
            </div><br>
            <div class="form-group"><input type="submit" value="LOGIN" class="form-control" name="button"></div>
            
            <footer><a href="registration.php?msg=" style="color:#f2f2f2;">Sign Up now</a><a href="fpEnterMail.php" style="color:#f2f2f2;float:right"> Forgot Password?</a></footer>
            </form>
          </div>
        <div>
      </div>
      <div class="main left"></div>
      <br>
      <span><?php echo $msg?></span>
    </div>
    </div>
  </body>
</html>


<?php
//  if(isset($_POST['button']))
//  {
//     $usr=$_POST["usr"];
//     $psw=$_POST["psw"];
//     if($usr=="Admin")
//     {
//       $sql="select * from tbl_login where username='$usr'and password='$psw'";
//     }
//     else{
//       $sql="select * from tbl_login where username='$usr'and password=md5('$psw')";
//     }
//     $res=mysqli_query($con,$sql);
//     if(mysqli_num_rows($res)>0)
//     {
//         while($row=mysqli_fetch_array($res))
//         {
//           $type=$row['type'];
//           $uid=$row['login_id'];
//             if($type=='A')
//             {
//               $_SESSION['user']=$usr;
//               $_SESSION['logid']=$uid;
//              header("location:Admin/dashboard.php");
//             }
//             else if($type=='E')
//             {
//               $_SESSION['user']=$usr;
//               $_SESSION['logid']=$uid;
//              header("location:Employee/empdash.php");
//             }
//             else if($type=='M')
//             {
//               $_SESSION['user']=$usr;
//               $uid=$row['login_id'];
//               $_SESSION['logid']=$uid;
//              header("location:Employee/mngdash.php");
//             }
//             else
//             {
//               $_SESSION['user']=$usr;
//              $uid=$row['login_id'];
//              $_SESSION['logid']=$uid;
//             header("location:index.php");
//             }
//         }
//     }
//     else{
//       header("location:login.php?msg=* Invalid Username or Password");
//     }
// }
?>