<?php
 include('includes/dbconnection.php');
 session_start();
 if(isset($_SESSION['user']))
 {   
    $lid=$_SESSION['logid'];
    $usr=$_SESSION['user'];
    $sql="select * from tbl_registration where login_id='$lid'";
    $res=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($res))
      {
        $name=$row['name'];
        $propic='upload/profile/'.$row["propic"];
      }
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
body {font-family: Arial;
  background-image: linear-gradient(to right , #141e30 , #243b55);
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  position: -webkit-sticky; /* Safari */
  position: sticky;
  top: 0;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size:20px;
}

li p {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size:20px;
}

li a:hover {
    color: #4CAF50;
    text-decoration: none;
}
#ta{
    width:70%;
    height:100%;
    color:white;
    margin-left:5%;
    margin-right:10%;
    margin-top:5%;
    padding:10px;
    border:1px solid white;
    font-size:15px;
}
#buy {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size:15px;
}

#buy:hover {
    color: #4CAF50;
    text-decoration: none;
}
</style>
</head>
<body>
<div class="header">
<br><br>
</div>

<ul>
  <li><a  href="index.php">Home</a></li>
  <li><a href="profile.php">Profile</a></li>
  <li><a href="#">Test Drive</a></li>
  <li style="float:right"><p><?php echo $_SESSION['user']; ?>&nbsp;<img id="im" src="<?php echo $propic;?>" width="40" height="40"></p></li>
</ul>

<table id= "ta" >
  <thead style="padding:20px">
    <tr>
      <th scope="col">Sl no</th>
      <th scope="col">Car name</th>
      <th scope="col">Transmission</th>
      <th scope="col">Date</th>
      <th scope="col">time</th>
      <th scope="col">Staff</th>
      <th scope="col">Ph no</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $count=1;
         $query=mysqli_query($con,"select * from tbl_ltestdrive where login_id=$lid");
         while ($rows=mysqli_fetch_array($query)) {
            echo "<tr><td>";
            echo $count;
            echo "</td><td>";
            $id=$rows['car_id'];
            $quer=mysqli_query($con,"select name from tbl_car where car_id='$id'");
            $ro=mysqli_fetch_array($quer)['name'];
            echo $ro;
            echo "</td><td>";
            echo $rows['gear'];
            echo "</td><td>";
            echo $rows['date'];
            echo "</td><td>";
            echo $rows['time'];
            echo "</td><td>";
            $emp=$rows['reg_id'];
            $sql1=mysqli_query($con,"select * from tbl_emp where reg_id=$emp");
            while ($rows1=mysqli_fetch_array($sql1)) {
            echo $rows1['name'];
            echo "</td><td>";
            echo $rows1['phone'];
            }
            echo "</td></tr>";
            $count=$count+1;
         }
    ?>

  </tbody>
</table>

   
</body>
</html> 

<?php

 }
 else{
  header("location:login.php?msg=");
 }
 ?>
