<?php
session_start();
include('includes/dbconnection.php');
$amount=$_SESSION['amt'];
$sr_id=$_SESSION['id'];
$type=$_SESSION['typ'];
//details from previous page
$cname=$_POST['cardname'];
$cnumb=$_POST['cardnumber'];
$date=$_POST['expyear'];
$ccvn=$_POST['cvv'];
$old=$_POST['amt'];

$sel="select * from tbl_bank where Name='$cname' and Cardno='$cnumb'and Exp_date='$date'and ccv='$ccvn'";
$results=mysqli_query($con,$sel);
$sel1="select * from tbl_bank where Cardno='$cnumb'";
$results1=mysqli_query($con,$sel1);
if(mysqli_num_rows($results)>0)
{
    while($row=mysqli_fetch_array($results1)){
        $o=$row['amount'];
        $bid=$row['bank_id'];
}
}
else{
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Bank Details Not Found in server');
    window.location.href='book.php';
    </script>");
}

if($o < $amount)
{
	echo ("<script LANGUAGE='JavaScript'>
window.alert('Insufficent balance. You will be directed to home page');
window.location.href='index.php';
</script>");

}
else{
$new=$o-$amount;


if(mysqli_num_rows($results)>0)
{
$in="update tbl_order set status='1',bank_id=$bid where order_id=$sr_id";
if(mysqli_query($con,$in))
{

	$ina="update tbl_bank set Amount='$new' where Cardno='$cnumb' ";
	
if(mysqli_query($con,$ina))
{
	header("location:billgen.php");}
}}
else{
	echo'bank details not found';
}}
mysqli_close($con);
?>