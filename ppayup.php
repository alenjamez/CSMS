<?php
include("includes/dbconnection.php");
session_start();
$sr_id=$_SESSION['id'];
$amount=$_SESSION['amt'];
$name=$_SESSION['user'];
	

//details from previous page
$cname=$_POST['cardname'];
$cnumb=$_POST['cardnumber'];
$date=$_POST['expyear'];
$ccvn=$_POST['cvv'];
//$old=$_POST['amountt'];

$sel="select * from tbl_bank where name='$cname' and cardno='$cnumb'and exp_date='$date'and ccv='$ccvn'";
$results=mysqli_query($con,$sel);


$sel1="select * from tbl_bank where cardno='$cnumb'";
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
$dat=date("Y-m-d");

$ere="select * from tbl_service where sr_id=$sr_id";
$res3=mysqli_query($con,$ere);
$type=mysqli_fetch_array($res3)['service_no'];
$_SESSION['type']=$type;


$er="INSERT INTO tbl_serordr(servicetype,dates,total,sr_id,bank_id) VALUES ('$type','$dat',$amount,$sr_id,$bid)";
$res=mysqli_query($con,$er);

$er1="select max(ordr_id) as max from  tbl_serordr where sr_id=$sr_id";
$res1=mysqli_query($con,$er1);
$_SESSION['order']=mysqli_fetch_array($res1)['max'];


$er2="select * from tbl_serwork where sr_id=$sr_id";
$res2=mysqli_query($con,$er2);
while($rv12=mysqli_fetch_array($res2)){
    $wid=$rv12['wrk_id'];
    $er3="update tbl_serwork set status='Payed' where wrk_id=$wid";
    $res3=mysqli_query($con,$er3);
}

$new=$o-$amount;
$date=date('Y-m-d');
$type1=$_SESSION['type'];
if ($type1=='First Service' || $type1=='Second Service'){
    $date=date('Y-m-d', strtotime($date. ' +6 month'));
$in="update tbl_service set status='Payed',next='$date' where sr_id=$sr_id and status='Finished' ";
}
else{
    $date=date('Y-m-d', strtotime($date. ' +12 month'));
$in="update tbl_service set status='Payed',next='$date' where sr_id=$sr_id and status='Finished'";
die($in);
}


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
$ina="update tbl_bank set Amount='$new' where cardno='$cnumb' ";
	
if(mysqli_query($con,$ina))
{
	
	
echo ("<script LANGUAGE='JavaScript'>
window.alert('Payment Done Successfully. You will be directed to Invoice');
window.location.href='billser.php';
</script>");
}}}
else{
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Bank Details Not Found in server');
    window.location.href='wrktotal.php';
    </script>");
}}
mysqli_close($con);
?>