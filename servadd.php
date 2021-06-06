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
       $sql="select sr_id from tbl_sevice where login_id='$lid'";
       $res=mysqli_query($con,$sql);
       if(mysqli_num_rows($res)>0)
       {
        $que="UPDATE tbl_service SET kilomtrs=$km,service_no='$ser',date='$date,pickup='$pick',status='Not Approved' WHERE login_id=$lid";
       }
       else{
        $que="insert into  tbl_service(car_id,kilomtrs,service_no,date,pickup,login_id) value($car,$km,'$ser','$date','$pick',$lid)";
       }
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