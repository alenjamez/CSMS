<?php
session_start();
include("../includes/dbconnection.php");
$id=$_GET['id'];
$sql="delete from tbl_leave where leave_id=$id";
// die($sql);
if(mysqli_query($con,$sql)){
    
    header("Location:leave.php?msg=* Request deleted");
}
else{
    header("Location:leave.php?msg=* somthing went wrong !");
}
mysqli_close($con);
?>