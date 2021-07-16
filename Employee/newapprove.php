<?php
session_start();
include("../includes/dbconnection.php");
$id=$_GET['id'];
$eid=$_GET['empid'];
$sql="UPDATE tbl_ltestdrive SET status='Approved',reg_id=$eid WHERE tid =$id";


if(mysqli_query($con,$sql)){
    
    header("Location:testapprove.php?msg=* Request approved");
}
else{
    header("Location:testapprove.php?msg=* somthing went wrong !");
}
mysqli_close($con);
?>