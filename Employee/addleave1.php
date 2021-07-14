<?php
session_start();
include("../includes/dbconnection.php");
    $lid=$_SESSION['logid'];
    $rsn=$_POST["rsn"];
    $date=$_POST["date"];
    $sessn=$_POST["sessn"];

    $sql="insert into tbl_leave(reason,date,session,login_id,status,type) values('$rsn','$date','$sessn',$lid,'Not Approved','M')";
    // die($sql);
    if(mysqli_query($con,$sql)){    
        header("Location:mngleave.php?msg=* Leave applied successfully");
    }
    else{
        header("Location:mngleave.php?msg=*somthing went wrong !");
    }
    mysqli_close($con);
    ?>