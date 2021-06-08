<?php
include("../includes/dbconnection.php");
$car=$_GET['id'];
$sql4="select model_id,model from tbl_model where car_id=$car";
$result=mysqli_query($con,$sql4);
echo'<option value="" disabled selected>Choose Model</option> ';
while($row=mysqli_fetch_array($result))
{
  echo '<option value="'.$row['model_id'].'">'.$row['model'].'</option>';
}
?>