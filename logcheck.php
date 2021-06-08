<?php
include('includes/dbconnection.php');
 session_start();
 
    $usr=$_POST["usr"];
    $psw=$_POST["psw"];
    if($usr=="Admin")
    {
      $sql="select * from tbl_login where username='$usr'and password='$psw'";
    }
    else{
      $sql="select * from tbl_login where username='$usr'and password=md5('$psw')";
    }
    $res=mysqli_query($con,$sql);
    if(mysqli_num_rows($res)>0)
    {
        while($row=mysqli_fetch_array($res))
        {
          $type=$row['type'];
          $uid=$row['login_id'];
            if($type=='A')
            {
              $_SESSION['user']=$usr;
              $_SESSION['logid']=$uid;
             header("location:Admin/dashboard.php");
            }
            else if($type=='E')
            {
              $_SESSION['user']=$usr;
              $_SESSION['logid']=$uid;
             header("location:Employee/empdash.php");
            }
            else if($type=='M')
            {
              $_SESSION['user']=$usr;
              $uid=$row['login_id'];
              $_SESSION['logid']=$uid;
             header("location:Employee/mngdash.php");
            }
            else
            {
              $_SESSION['user']=$usr;
             $uid=$row['login_id'];
             $_SESSION['logid']=$uid;
            header("location:index.php");
            }
        }
    }
    else{
      header("location:login.php?msg=* Invalid Username or Password");
    }