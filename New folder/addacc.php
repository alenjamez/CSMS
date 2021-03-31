<?php
 $con=mysqli_connect("localhost","root","","car showroom") or die("couldn't connect");
    $name=$_POST["nme"];
    $pic=$_FILES["icn"]["name"];
    $desc=$_POST["disp"];
    $price=$_POST["prz"];

    $sql1="insert into tbl_accessory(name,icon,price,description) values('$name','$pic','$prize','$desc')";
    mysqli_query($con,$sql1);
    $t="upload/".$pic;
    move_uploaded_file($_FILES["icn"]["tmp_name"],$t);
    header("location:comadd.php");
?>
