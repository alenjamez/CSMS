<?php
session_start();
include("../includes/dbconnection.php");
$id=$_GET['id'];
$sql="UPDATE tbl_leave SET status='Cancelled' WHERE leave_id =$id";


if(mysqli_query($con,$sql)){
    
    header("Location:leave.php?msg=* Leave Cancelled");
}
else{
    header("Location:leave.php?msg=* somthing went wrong !");
}
mysqli_close($con);
?>