<?php
include("includes/dbconnection.php");
session_start();
$car=$_POST["cartype"];
header("location:car-search-homepage.php?cartype='$car'");
mysqli_close($con);
?>