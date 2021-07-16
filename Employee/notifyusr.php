<?php
 include("../includes/dbconnection.php");
$ids=$_GET['id'];
    $sql1="insert into notify(message,login_id) values('Your service is pending. Book now!!!',$ids)";
    $res=mysqli_query($con,$sql1);
if ($res) {
    echo '<script>alert("Notification sent to customer")</script>';
    echo "<script>window.location.href='empdash.php'</script>";
      }
      else{
          $msg="Something Went Wrong. Please try again";
        }
?>