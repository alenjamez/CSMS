<?php
 include("../includes/dbconnection.php");
$ids=$_GET['id'];
$sql="UPDATE tbl_serwork SET status='Finished' WHERE sr_id=$ids and status='Approved'";
$res=mysqli_query($con,$sql);
$sql1="UPDATE tbl_service SET status='Finished' WHERE sr_id=$ids and status='Approved'";
$res1=mysqli_query($con,$sql1);
if ($res) {
    $logid=$_SESSION['uid'];
    $sql1="insert into notify(message,login_id) values('Works being Completed and you can do the payment now',$logid)";
    $res1=mysqli_query($con,$sql1);
    echo '<script>alert("Works has been Finished.")</script>';
    echo "<script>window.location.href='service.php'</script>";
      }
      else{
          $msg="Something Went Wrong. Please try again";
        }
?>