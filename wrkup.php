<?php
$con=mysqli_connect("localhost","root","","car showroom") or die("couldn't connect");
$id=$_GET['id'];
$sql="UPDATE tbl_serwork SET status='Approved' WHERE wrk_id=$id";
$res=mysqli_query($con,$sql);
if ($res) {
    echo '<script>alert("Work has been added successfully.")</script>';
    echo "<script>window.location.href='serviceup.php'</script>";
      }
      else{
          $msg="Something Went Wrong. Please try again";
        }
?>