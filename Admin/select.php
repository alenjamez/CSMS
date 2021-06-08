<?php
$con=mysqli_connect("localhost","root","","car showroom") or die("couldn't connect");
$date1=$_GET['d1'];
$date2=$_GET['d2'];?>
<thead>
<tr>
<th >Sl no</th>
<th >Customer</th>
<th >Pincode</th>
<th >Car name</th>
<th >Fuel</th>
<th >Price</th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$query=mysqli_query($con,"select * from tbl_order where date between '$date1' and '$date2'");
while ($rows=mysqli_fetch_array($query)) {
    echo "<tr><td>";
    echo $count;
    echo "</td><td>";
    $lnid=$rows['login_id'];
    $qu=mysqli_query($con,"select username from tbl_login where login_id='$lnid'");
    $raw=mysqli_fetch_array($qu)['username'];
    echo $raw;
    echo "</td><td>";
    echo $rows['pin'];
    echo "</td><td>";
    $id=$rows['car_id'];
    $quer=mysqli_query($con,"select name from tbl_car where car_id='$id'");
    $ro=mysqli_fetch_array($quer)['name'];
    echo $ro;

    echo "</td><td>";
    echo $rows['fuel'];
    echo "</td><td>";
    echo $rows['price'];
    echo "</td></tr>";
    $count=$count+1;
}
?>
</tbody>