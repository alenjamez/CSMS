<?php
$con=mysqli_connect("localhost","root","","car showroom") or die("couldn't connect");
session_start();
error_reporting(0);
$serid=$_GET['id'];
$lid=$_SESSION['logid'];
$invoice=rand(100000,999999);
$sql="select * from tbl_registration where login_id='$lid'";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($res))
{
$uname=$row['name'];
$email=$row['email'];
$phno=$row['phone'];
}
$sql1="select * from tbl_order where order_id='$ordr'";
$res2=mysqli_query($con,$sql1);
while($row=mysqli_fetch_array($res2))
{
$house=$row['house'];
$post=$row['post'];
$pin=$row['pin'];
$col=$row['color_id'];
}
$sql6="select * from tbl_transmission where type='$trans' and fuel='$fuel'";
$res6=mysqli_query($con,$sql6);
while($row6=mysqli_fetch_array($res6)){
$bhp=$row6["bhp"];
$price=$row6["price"];
$cc=$row6["enginecc"];
$eng=$row6["engtype"];
}
$query=mysqli_query($con,"select * from tbl_car where car_id='$carid'");
while ($row1=mysqli_fetch_array($query)) {
$name=$row1['name'];
}
$query1=mysqli_query($con,"select * from tbl_model where model_id='$modid'");
while ($row1=mysqli_fetch_array($query1)) {
$model=$row1['model'];
}
$query2=mysqli_query($con,"select * from colour where color_id='$col'");
while ($row5=mysqli_fetch_array($query2)) {
$colour=$row5['colour'];
}


?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Invoice</title>
        <link rel="stylesheet" href="style/bill.css"> 
		<link rel="license" href="https://www.opensource.org/licenses/mit-license/">
		<script src="script.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js" ></script>
	</head>
    <script>
        function generatePDF() {
            var doc = new jsPDF();
            doc.fromHTML(document.getElementById("test"), // page element which you want to print as PDF
            15,
            15, 
            {
                'width': 170
            },
            function(a) 
            {
                doc.save("HTML2PDF.pdf");
            });
            }
        </script>
        <script>
            function time(){
            n =  new Date();
            y = n.getFullYear();
            m = n.getMonth() + 1;
            d = n.getDate();
            document.getElementById("date").innerHTML = m + "/" + d + "/" + y;
            }
        </script>
	<body onload="time()">
    <div id="test">
		<header>
			<h1>URCARZ</h1>
			<address>
				<p><?php echo $uname;?></p>
                <p><?php echo $house;?>(H)</p>
                <p><?php echo $post;?>&nbsp;<?php echo $pin;?></p>
				<p><?php echo $email;?></p>
				<p><?php echo $phno;?></p>
			</address>
			<span><img alt="" src="http://www.jonathantneal.com/examples/invoice/logo.png"><input type="file" accept="image/*"></span>
		</header>
		<article>
			<h1>Recipient</h1>
			<address  >
				<p>URCARZ</p>
                <p>ASV Ramana Towers, </p>
                <p>Kottayam</p>
			</address>
			<table class="meta">
				<tr>
					<th><span  >Invoice #</span></th>
					<td><span  ><?php echo $invoice;?></span></td>
				</tr>
				<tr>
					<th><span  >Date</span></th>
					<td><span id="date"></span></td>
				</tr>
				<tr>
					<th><span  >Amount Due</span></th>
					<td><span id="prefix"  >&#x20B9;<?php echo $price;?></span><span></span></td>
				</tr>
			</table>
			<table class="inventory">
				<thead>
					<tr>
						<th><span  >Item</span></th>
						<th><span  >Description</span></th>
						<th><span  >Rate</span></th>
						<th><span  >Quantity</span></th>
						<th><span  >Price</span></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><span  ><?php echo $name;?>&nbsp;</span><?php echo $model;?></td>
						<td><span  >Colour : <?php echo $colour;?><br><br>Transmission : <?php echo $trans;?><br>
                    <br>Fuel type : <?php echo $fuel;?></span></td>
						<td><span data-prefix>&#x20B9;</span><span  ><?php echo $price;?>.000</span></td>
						<td><span  >1</span></td>
						<td><span data-prefix>&#x20B9;</span><span  ><?php echo $price;?>.000</span></td>
					</tr>
				</tbody>
			</table>
            </div>
			<table class="balance">
				<tr>
					<th><span  >Total</span></th>
					<td><span data-prefix>&#x20B9;</span><span  ><?php echo $price;?>.000</span></td>
				</tr>
				<tr>
					<th><span  >Amount Paid</span></th>
					<td><span data-prefix>&#x20B9;</span><span  ><?php echo $price;?>.000</span></td>
				</tr>
				<tr>
					<th><span  >Balance Due</span></th>
					<td><span data-prefix>&#x20B9;</span><span>0.00</span></td>
				</tr>
			</table>
		</article>
  
		<aside>
        <a href="javascript:generatePDF()">Dowload PDF</a>

		</aside>
	</body>
</html>