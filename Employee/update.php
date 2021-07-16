<?php
session_start();
include("../includes/dbconnection.php");
$id=$_GET['id'];
$eid=$_GET['time'];
$sql="UPDATE tbl_ltestdrive SET time='$eid' WHERE tid =$id";

if(mysqli_query($con,$sql)){
    $logid=$_SESSION['uid'];
    $sql1="insert into notify(message,login_id) values('Work being Completed',$logid)";
    $res1=mysqli_query($con,$sql1);
    
    header("Location:testdrive.php");
}
else{
    echo "somthing went wrong !";
}
mysqli_close($con);
?>