<?php
 session_start();
 $carid=$_GET['cid'];
 $modid=$_GET['mid'];
 $trans=$_GET['tran'];
 $fuel=$_GET['fuel'];
$con=mysqli_connect("localhost","root","","car showroom") or die("couldn't connect");
$ids=$_GET['id'];
$sql="update colour set status=0 where color_id=$ids";
$res=mysqli_query($con,$sql);
header("location:editcar.php?cid=$carid&mid=$mid&tran=$trans&fuel=$fuel");
?>