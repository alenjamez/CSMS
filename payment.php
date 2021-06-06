<!DOCTYPE html>
<?php
include("includes/dbconnection.php");
session_start();
$sr_id=$_GET['id'];
$amount=$_GET['amt'];
$type=$_GET['typ'];
$name=$_SESSION['user'];
$_SESSION['amt']=$amount;
$_SESSION['id']=$sr_id;
if(isset($_SESSION['user']))
{	
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
  width: 400px;
  margin-left:35%;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
  
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text],[type=month] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
<script type="text/javascript">
    function preback(){window.history.forward();}
	setTimeout("preback()",0);
	window.onunload=function(){null};
</script>

<script type="text/javascript">
function namee()
	{
	var nam=document.getElementById("cname").value;
	var nam1=/^[a-zA-Z\s]+$/;
	if(nam=="")
		{
		document.getElementById("cname").placeholder="Enter name";
		cname.focus();
		return false;
		
		}
	if(nam.match(nam1))
		{
		document.getElementById("cname").placeholder="";
		
		}
	else
		{
    document.getElementById("cname").value="";
		document.getElementById("cname").placeholder="Enter valid name";
		cname.focus();
		return false;
		
		
		}
	}

  function ccn()
	{
	var ph=document.getElementById("ccnum").value;
	var ph1=/^[0-9]+$/;
	if(ph=="")
		{
		document.getElementById("ccnum").placeholder="Enter phno";
		ccnum.focus();
		return false;
		}
	if(ph.match(ph1)&& (ph.length==10))
		{
		document.getElementById("ccnum").placeholder="";
		}
	else
		{
      document.getElementById("ccnum").value="";
		document.getElementById("ccnum").placeholder="Enter valid no";
		ccnum.focus();
		return false;
		}
	}

  function ccvn()
	{
	var ph=document.getElementById("cvv").value;
	var ph1=/^[0-9]+$/;
	if(ph=="")
		{
		document.getElementById("cvv").placeholder="Enter phno";
		cvv.focus();
		return false;
		}
	if(ph.match(ph1)&& (ph.length==3))
		{
		
		document.getElementById("cvv").placeholder="";
		}
	else
		{
      document.getElementById("cvv").value="";
		document.getElementById("cvv").placeholder="Enter valid no";
		cvv.focus();
		return false;
		}
	}
</script>
</head>
<body>
<?php 
if($type=="service")
{
   ?>
     <div class="container">
      <form action="ppayup.php" method="post">
      
        
          <div class="col-50">
            <center><h3>Payment</h3></center>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" onblur="namee()" placeholder="Only alphabets" required>
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" onblur="ccn()" placeholder="Only number" required>
            


            <label for="amount">Amount</label>
            <input type="text" disabled value="<?php echo $amount?>" id="amount" name="amountt" placeholder="<?php echo $amount?>">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Date</label>
                <input type="month" id="expyear" name="expyear" placeholder="eg:2018" required>
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" onblur="ccvn()" placeholder="Only numbers" required>
              </div>
            </div>
          </div>
          
        </div>
        
        <input type="submit" value="Pay" class="btn">
      </form>
    </div>
  </div>
  
</div>
</body>
</html>
<?php
}
else
{?>
  <div class="container">
  <form action="cpayup.php" method="post">
      
        
  <div class="col-50">
    <center><h3>Payment</h3></center>
    <label for="fname">Accepted Cards</label>
    <div class="icon-container">
      <i class="fa fa-cc-visa" style="color:navy;"></i>
      <i class="fa fa-cc-amex" style="color:blue;"></i>
      <i class="fa fa-cc-mastercard" style="color:red;"></i>
      <i class="fa fa-cc-discover" style="color:orange;"></i>
    </div>
    <label for="cname">Name on Card</label>
    <input type="text" id="cname" name="cardname" onblur="namee()" placeholder="Only alphabets" required>
    <label for="ccnum">Credit card number</label>
    <input type="text" id="ccnum" name="cardnumber" onblur="ccn()" placeholder="Only numbers" required>
    


    <label for="amount">Amount</label>
    <input type="text" disabled value="<?php echo $amount?>" id="amount" name="amountt" placeholder="<?php echo $amount?>">
    <div class="row">
      <div class="col-50">
        <label for="expyear">Exp Date</label>
        <input type="month" id="expyear" name="expyear" placeholder="eg:2018" required>
      </div>
      <div class="col-50">
        <label for="cvv">CVV</label>
        <input type="text" id="cvv" name="cvv" onblur="ccvn()" placeholder="Only number" required>
      </div>
    </div>
  </div>
  
</div>

<input type="submit" value="Pay" class="btn">
</form>
</div>
</div>

</div><?php
}


}
else
{
	header("location:login.php");
}?>
