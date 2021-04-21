<?php
session_start();
$con=mysqli_connect("localhost","root","","car showroom") or die("couldn't connect");
$id=$_GET['id'];
$sql="UPDATE tbl_ltestdrive SET status='Approved' WHERE tid =$id";


if(mysqli_query($con,$sql)){
    
    header("Location:testapprove.php");
}
else{
    echo "somthing went wrong !";
}
mysqli_close($con);
?>