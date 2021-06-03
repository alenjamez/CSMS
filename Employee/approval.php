<?php
session_start();
$con=mysqli_connect("localhost","root","","car showroom") or die("couldn't connect");
$id=$_GET['id'];
$sql="UPDATE tbl_leave SET status='Approved' WHERE leave_id =$id";


if(mysqli_query($con,$sql)){
    
    header("Location:leaveapprove.php?msg=* Leave Approved");
}
else{
    header("Location:leaveapprove.php?msg=*somthing went wrong !");
}
mysqli_close($con);
?>