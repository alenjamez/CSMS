<?php
session_start();

$con=mysqli_connect("localhost","root","","car showroom")or die("couldn't connect");

    $email = $_POST["email"];
    $sql="SELECT * FROM tbl_registration where email = '$email' ";
    $result=mysqli_query($con,$sql);

    if(mysqli_num_rows($result)>0){
        // $data->value='yes';
        $row=mysqli_fetch_array($result);
        $Lid=$row['login_id']; 
        $sql="SELECT * FROM tbl_otp where login_id = '$Lid' ";

        $result=mysqli_query($con,$sql);
        $date=date('y-m-d h:i:s');
        $otp_data=rand(100000,999999);
        $seed = str_split('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789');
        shuffle($seed);
        $rand = '';
        foreach (array_rand($seed, 61) as $k) $rand .= $seed[$k];

        if(mysqli_num_rows($result)>0){
            $sql="update tbl_otp set otp_time='$date',otp_data='$otp_data',otp_random='$rand' where login_id=$Lid";
        }
        else{
            $sql="insert into tbl_otp (login_id,otp_data,otp_random,otp_time) values ($Lid,'$otp_data','$rand','$date')";
        }
        // mysqli_query($con,$sql);
        // sentmail($otp_data,$rand,$email);
        if(mysqli_query($con,$sql)){
            $_SESSION['email']=$email;
            $_SESSION['otp_data']=$otp_data;
            $_SESSION['rand']=$rand;

            header("Location:fpSendMail.php");
        }
        else{
            header("location:../fpEnterMail.php?err=Error");
        }
    }
    else{
        header("location:../fpEnterMail.php?err=MailError");
    }
?>