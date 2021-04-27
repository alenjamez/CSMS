<?php
session_start();
$con=mysqli_connect("localhost","root","","car showroom") or die("couldn't connect");
$id=$_GET['id'];
$eid=$_GET['empid'];
$sql="UPDATE tbl_ltestdrive SET status='Approved',reg_id=$eid WHERE tid =$id";


if(mysqli_query($con,$sql)){
    
    header("Location:testapprove.php");
}
else{
    echo "somthing went wrong !";
}
mysqli_close($con);
?>