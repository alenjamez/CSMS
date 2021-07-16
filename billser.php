<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);
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
$ordr=$_SESSION['order'];
$sql1="select * from tbl_serordr where ordr_id='$ordr'";
$res2=mysqli_query($con,$sql1);
while($rows=mysqli_fetch_array($res2))
{
$type=$rows['servicetype'];
$amount=$rows['total'];
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
                doc.save("Service.pdf");
                window.location.href='review.php';
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
            <p><b>Customer Name & Details:</b></p>
                <p>ID : <?php echo $uname;?></p>
				<p><?php echo $uname;?></p>
				<p>Email : <?php echo $email;?></p>
				<p>Mobile : <?php echo $phno;?></p>
                <p>Service type : <?php echo $type;?></p>
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
					<th><span  >Amount</span></th>
					<td><span id="prefix"  >&#x20B9;</span><span><?php echo $amount;?></span></td>
				</tr>
			</table>
			<table class="inventory">
				<thead>
					<tr>
						<th><span  >slno</span></th>
						<th><span  >Description</span></th>
						<th><span  >Rate</span></th>
						<th><span  >Labour Charge</span></th>
						<th><span  >Total</span></th>
					</tr>
				</thead>
				<tbody>
                                    <?php
                                        $count=1;
                                        $sql4="select * from tbl_service where login_id=$lid";
                                        $res1=mysqli_query($con,$sql4);
                                        while($raw=mysqli_fetch_array($res1)){
                                            $ids=$raw['sr_id'];
                                            $pick=$raw['pickup'];
                                        }
                                        $query4=mysqli_query($con,"select * from tbl_serwork where sr_id=$ids and status='Payed' and value=0");
                                        while ($rows=mysqli_fetch_array($query4)) {
                                            $sr=$rows['wrk_id'];
                                            echo "<tr><td>";
                                            echo $count;
                                            echo "</td><td>";
                                            echo $rows['work'];
                                            echo "</td><td>";
                                            echo $rows['rate'];
                                            echo "</td><td>";
                                            echo $rows['charge'];
                                            echo "</td><td>";
                                            echo $rows['charge']+$rows['rate'];
                                            $count=$count+1;
                                    
                                    }
                                    if($pick=="Yes"){
                                        ?></tr><tr>
                                            <td><?php echo $count;?></td>
                                            <td>Pickup Charge</td>
                                            <td>400</td>
                                            <td>-</td>
                                            <td>400</td><?php

                                    }
                                    ?>
                                    
                                    </tr><tr><td colspan="2"></td>
                                    <td>
                                    <?php
                                    $query6=mysqli_query($con,"select sum(rate) as sumr from tbl_serwork where sr_id=$ids and status='Finished'");
                                    $totrt=mysqli_fetch_array($query6)['sumr'];
                                    if($pick=="Yes"){
                                        $totrt=$totrt+400;  
                                    }
                                    echo $totrt;

                                    echo "</td><td>";
                                    $query5=mysqli_query($con,"select sum(charge) as summ from tbl_serwork where sr_id=$ids and status='Finished'");
                                    $totchrg=mysqli_fetch_array($query5)['summ'];
                                    echo $totchrg;
                                    echo "</td><td>";
                                    $total=$totrt+$totchrg;
                                    echo $total;
                                    ?>
                                    

                                    </td></tr>
                                    </tbody>
			</table>
            </div>
			<table class="balance">
				<tr>
					<th><span  >Total</span></th>
					<td><span data-prefix>&#x20B9;</span><span  ><?php echo $amount;?>.000</span></td>
				</tr>
				<tr>
					<th><span  >Amount Paid</span></th>
					<td><span data-prefix>&#x20B9;</span><span  ><?php echo $amount;?>.000</span></td>
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