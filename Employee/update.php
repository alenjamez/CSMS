<?php
session_start();
include("../includes/dbconnection.php");
$id=$_GET['id'];
$eid=$_GET['time'];
$sql="UPDATE tbl_ltestdrive SET time='$eid' WHERE tid =$id";


if(mysqli_query($con,$sql)){
    
    header("Location:testdrive.php");
}
else{
    echo "somthing went wrong !";
}
mysqli_close($con);
?>