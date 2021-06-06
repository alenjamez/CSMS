<?php
session_start();
include("dbfile.php");
$amount=$_SESSION['amt']
$id=$_SESSION['id'];
$xid=$_SESSION['logi'];

//details from previous page
$cname=$_POST['cardname'];
$cnumb=$_POST['cardnumber'];
$date=$_POST['expyear'];
$ccvn=$_POST['cvv'];
//$old=$_POST['amountt'];

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
    window.location.href='wrktotal.php';
    </script>");
}
if($o < '500')
{
	echo ("<script LANGUAGE='JavaScript'>
window.alert('Insufficent Amount. You will be directed to home page');
window.location.href='wrktotal.php';
</script>");

}
else{
if(mysqli_num_rows($results)>0)
{
/*$purpose=$_POST["purp"];


$dat=$_POST["date"];
$n=$_SESSION['logi'];*/

$er="select max(pryid) as max from table_prequest where loginid='$xid'";
$res=mysqli_query($con,$er);
$rv=mysqli_fetch_array($res)['max'];

$er1="select max(prid) as max from table_prequest where loginid='$xid'";
$res1=mysqli_query($con,$er1);
$rv1=mysqli_fetch_array($res1)['max'];

$er2="select * from table_prayer where prid='$rv1'";
$res2=mysqli_query($con,$er2);
$rv2=mysqli_fetch_array($res2)['Amount'];
$new=$o-$rv2;
$in="update table_prequest set Payment_Status='1' where pryid='$rv' and loginid='$xid' ";

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
$ina="update table_bank set Amount='$new' where Cardno='$cnumb' ";
	
if(mysqli_query($con,$ina))
{
	
	
echo ("<script LANGUAGE='JavaScript'>
window.alert('Payment Done Successfully. You will be directed to home page');
window.location.href='index2.php';
</script>");
}}}
else{
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Bank Details Not Found in server');
    window.location.href='prayer.php';
    </script>");
}}
mysqli_close($con);
?>