<?php
session_start();
$con=mysqli_connect("localhost","root","","car showroom") or die("couldn't connect");
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