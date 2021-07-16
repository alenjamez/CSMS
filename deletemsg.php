<?php
 include("includes/dbconnection.php");
$ids=$_GET['id'];
$sql="delete from notify where n_id=$ids";
$res=mysqli_query($con,$sql);
if ($res) {
    echo '<script>alert("Message deleted successfully.")</script>';
    echo "<script>window.location.href='profile.php'</script>";
      }
      else{
          $msg="Something Went Wrong. Please try again";
        }
?>