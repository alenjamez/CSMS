<?php
$con=mysqli_connect("localhost","root","","car showroom") or die("couldn't connect");
$sql4="select car_id,name from tbl_car where status=1";
$result=mysqli_query($con,$sql4);
echo '<option value="" disabled selected>Choose Car</option> ';
while($row=mysqli_fetch_array($result))
{
  echo '<option value="'.$row['car_id'].'">'.$row['name'].'</option>';
}
?>