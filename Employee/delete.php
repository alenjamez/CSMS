<?php
$con=mysqli_connect("localhost","root","","car showroom") or die("couldn't connect");
$ids=$_GET['id'];
$sql="update tbl_offer set status='Inactive' where offr_id=$ids";
$res=mysqli_query($con,$sql);
if ($res) {
    echo '<script>alert("Offer has been deleted successfully.")</script>';
    echo "<script>window.location.href='viewoffer.php'</script>";
      }
      else{
          $msg="Something Went Wrong. Please try again";
        }
?>