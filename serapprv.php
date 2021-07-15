<?php
 include("includes/dbconnection.php");
$ids=$_GET['id'];
$sql="update tbl_serwork set status='Approved' where wrk_id=$ids";
$res=mysqli_query($con,$sql);
if ($res) {
    echo '<script>alert("Work has been updated .")</script>';
    echo "<script>window.location.href='serviceup.php'</script>";
      }
      else{
          $msg="Something Went Wrong. Please try again";
        }
?>