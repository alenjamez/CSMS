<?php
 include("../includes/dbconnection.php");
$ids=$_GET['id'];
$sql="update tbl_login set status=0 where login_id=$ids";
$res=mysqli_query($con,$sql);
$sql1="update tbl_emp set status=0 where login_id=$ids";
$res1=mysqli_query($con,$sql1);
header("location:viewemp.php?msg=* Employee deleted");
?>