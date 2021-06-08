<?php
session_start();
include("../includes/dbconnection.php");
$id=$_GET['id'];
$eid=$_GET['empid'];
$sql="UPDATE tbl_service SET status='Approved',reg_id=$eid WHERE sr_id =$id";


if(mysqli_query($con,$sql)){
    
    header("Location:serviceapp.php?msg=* Request approved");
}
else{
    header("Location:serviceapp.php?msg=* somthing went wrong !");
}
mysqli_close($con);
?>