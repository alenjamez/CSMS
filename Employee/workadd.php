<?php
session_start();
include("../includes/dbconnection.php");
$id=$_GET['id'];
$wrk=$_POST['works'];
$prty=$_POST['priority'];
$chrg=$_POST['charges'];
$rate=$_POST['rate'];
$sql="INSERT INTO tbl_serwork (work,priority,rate,charge,sr_id) VALUES ('$wrk','$prty',$rate,$chrg,$id)";
if(mysqli_query($con,$sql)){
    
    echo '<script>alert("Work has been added.")</script>';
    echo "<script>window.location.href='serdetails.php?id=".$id."'</script>";
}
else{
    echo "somthing went wrong !";
}
mysqli_close($con);
?>