<?php
$con=mysqli_connect("localhost","root","","car showroom") or die("couldn't connect");
session_start();
error_reporting(0);

?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Report</title>
        <link rel="stylesheet" href="../style/bill.css"> 
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
			<h1>Sales Report</h1>

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
					<th><span  >Date</span></th>
					<td><span id="date"></span></td>
				</tr>
			</table>
			<table class="inventory">
            <thead>
                                        <tr>
                                        <th >Sl no</th>
                                        <th >Customer</th>
                                        <th >Pincode</th>
                                        <th >Car name</th>
                                        <th >fuel</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th >Sl no</th>
                                        <th >Customer</th>
                                        <th >Pincode</th>
                                        <th >Car name</th>                                   
                                        <th >fuel</th>
                                        </tr>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        $count=1;
                                        $query=mysqli_query($con,"select * from tbl_order");
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
                                            echo "</td></tr>";
                                            $count=$count+1;
                                        }
                                    ?>
                                    </tbody>
                                </table>
			</table>
            </div>
		</article>
  
		<aside>
        <a href="javascript:generatePDF()">Dowload PDF</a>

		</aside>
	</body>
</html>