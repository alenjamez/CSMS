<?php
$con=mysqli_connect("localhost","root","","car showroom") or die("couldn't connect");
$comp_id=$_GET['id'];
$sql4="select car_id,name from tbl_car where comp_id=$comp_id and status=1";
$result=mysqli_query($con,$sql4);
echo '<option value="" disabled selected>Choose Car</option> ';
while($row=mysqli_fetch_array($result))
{
  echo '<option value="'.$row['car_id'].'">'.$row['name'].'</option>';
}
?>