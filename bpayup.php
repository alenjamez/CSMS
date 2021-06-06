<?php
session_start();
include("dbfile.php");
$name=$_SESSION['nam'];
$username=$_SESSION['usr'];
$xid=$_SESSION['logi'];


//details from previous page
$cname=$_POST['cardname'];
$cnumb=$_POST['cardnumber'];
$date=$_POST['expyear'];
$ccvn=$_POST['cvv'];
$old=$_POST['amt'];


$sel="select * from table_bank where Name='$cname' and Cardno='$cnumb'and Exp_date='$date'and ccv='$ccvn'";

$results=mysqli_query($con,$sel);


$sel1="select * from table_bank where Cardno='$cnumb'";
$results1=mysqli_query($con,$sel1);
if(mysqli_num_rows($results)>0)
{
$o=mysqli_fetch_array($results1)['Amount'];
}
else{
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Bank Details Not Found in server');
    window.location.href='book.php';
    </script>");
}

if($o < '15000')
{
	echo ("<script LANGUAGE='JavaScript'>
window.alert('Insufficent Amount. You will be directed to home page');
window.location.href='index2.php';
</script>");

}
else{
$new=$o-$old;


if(mysqli_num_rows($results)>0)
{
/*$purpose=$_POST["purp"];


$dat=$_POST["date"];
$n=$_SESSION['logi'];*/

$er="select max(bookid) as max from table_book where loginid='$xid'";
$res=mysqli_query($con,$er);
$rv=mysqli_fetch_array($res)['max'];
$in="update table_book set payment_status='1' where bookid='$rv' and loginid='$xid' ";

if(mysqli_query($con,$in))
{

    /*require("fpdf/fpdf.php");
$pdf=new FPDF();
$pdf->AddPage();

$pdf->SetFont("Arial","",12); 
$pdf->Cell(0,10,"Parish Hall Booking Bill Details",1,1,'C');
$pdf->Cell(90,10,"Date",1,0,'C'); 
$pdf->Cell(100,10,$dat,1,0,'C');


$pdf->Output();*/
	// print receipt
	$ina="update table_bank set Amount='$new' where Cardno='$cnumb' ";
	
if(mysqli_query($con,$ina))
{
		header("location:booking.php");}
}}
else{
	echo'bank details not found';
}}
mysqli_close($con);
?>