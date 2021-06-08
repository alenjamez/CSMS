<?php
 include("../includes/dbconnection.php");
$ids=$_GET['id'];
$sql="DELETE FROM tbl_serwork WHERE wrk_id=$id";
$res=mysqli_query($con,$sql);
if ($res) {
    echo '<script>alert("Work has been deleted successfully.")</script>';
    echo "<script>window.location.href='serdetails.php'</script>";
      }
      else{
          $msg="Something Went Wrong. Please try again";
        }
?>