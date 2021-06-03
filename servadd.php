<?php
session_start();
$con=mysqli_connect("localhost","root","","car showroom") or die("couldn't connect");
   if(isset($_SESSION['user']))
     {
       $lid=$_SESSION['logid'];
       $car=$_GET['car'];
       $date=$_GET['date'];
       $km=$_GET['km'];
       $ser=$_GET['ser'];
       $pick=$_GET['pick'];
       $que="insert into  tbl_service(car_id,kilomtrs,service_no,date,pickup,login_id) value($car,$km,'$ser','$date','$pick',$lid)";
    //    die($que);
       $query3=mysqli_query($con,$que);
           if ($query3) {
           echo '<script>alert("Your booking has successfully send.")</script>';
           echo "<script>window.location.href='serviceup.php'</script>";
             }
             else{
                 $msg="Something Went Wrong. Please try again";
               }
     }
       else{
         header("location:login.php?msg=");
       }

 ?>