<?php
    $con=mysqli_connect("localhost","root","","car showroom") or die("couldn't connect");
    $com=$_GET['id'];
    $i=0;
    $sql="select car_id,name from tbl_car where status=1 and comp_id=$com";
    $res=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($res))
    {
      $no=$row['car_id'];
      $name=$row['name'];
      ++$i;
      echo "<tr><td>";
      echo $i;
      echo "</td><td>";
      echo $name;
      ?></td><td><a href="delete.php?id=<?php echo $no; ?>" >Delete</a></td?</tr>
      <?php
    }
?>
