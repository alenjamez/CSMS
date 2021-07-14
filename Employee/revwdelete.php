<?php
 include("../includes/dbconnection.php");
$ids=$_GET['id'];
$sql="delete from tbl_review where revw_id=$ids";
$res=mysqli_query($con,$sql);
if ($res) {
    echo '<script>alert("deleted successfully.")</script>';
    echo "<script>window.location.href='viewrvw.php'</script>";
      }
      else{
          $msg="Something Went Wrong. Please try again";
        }
?>