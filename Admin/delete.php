<?php
$con=mysqli_connect("localhost","root","","car showroom") or die("couldn't connect");
$ids=$_GET['id'];
$sql="update tbl_car set status=0 where car_id=$ids";
$res=mysqli_query($con,$sql);
header("location:managecar.php?msg=* Car has been deleted");
?>