<?php
session_start();
require("../php/PHPMailer/src/PHPMailer.php");
require("../php/PHPMailer/src/SMTP.php");
require("../php/PHPMailer/src/Exception.php");
// require("../../../../confidential.php");

// function sentmail($otp_data,$rand,$email){
if(isset($_SESSION['email']) && isset($_SESSION['usr']) && isset($_SESSION['pass'])){
    $email=$_SESSION['email'];
    $user=$_SESSION['usr'];
    $pass=$_SESSION['pass'];
        
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    try {
        $mail->isSMTP();                                    
        $mail->Host       = 'smtp.gmail.com';                 
        $mail->SMTPAuth   = true;                   
        $mail->Username   = 'alenjames@mca.ajce.in';       
        $mail->Password   = 'alensalenjames';                               
        $mail->Port       = 587;                                   

        //Recipients
        $mail->setFrom('alenjames@mca.ajce.in', 'URCARZ');
        $mail->addAddress($email); 

        //Content
        $mail->isHTML(true); 
        $mail->Subject ='Password for URCARZ';
        $mail->Body    = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <style>
                    body{
                        background-color: white;
                        margin: 0;
                        padding: 0;
                    }
                    .container{
                        margin-top: 20px;
                        position: relative;
                        left:50%;
                        transform: translate(-50%);
                        background-color: white;
                        width:350px;
                    }
                    .container img{
                        width:100px;
                        height:100px;
                    }
                    .container h1{
                        font-family: sans-serif;
                        font-size: 36px;
                        color:rgba(0, 0, 0, 0.835);
                    }
                    .container p{
                        font-family: sans-serif;
                        font-size: 15px;
                        color:rgba(0, 0, 0, 0.774);
                        margin-left:10px;
                        margin-right: 10px;
            
                        line-height: 23px;
                    }
                    .container a{
                        text-decoration: none;
                        color: rgba(47, 154, 241, 0.753);
                        font-family: sans-serif;
                        margin-bottom: 10px;
                        font-size: 15px;
                        margin-left:10px;
                        margin-right: 10px;
                    }
            
                </style>
            </head>
            <body>
                <div class="container">
                    <center><h1>Hello.</h1></center>
                    <p>The Credential for login are :</p>
                    <p>Username : '.$user.'</p>
                    <p>Password : '.$pass.'</p>
                    <p>For security reasons this username and password will only be active for 3 days. </p>
                    <p style="margin-top:0;">The Find Team.</p>
                </div>
            </body>
            </html>
        ';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        // echo 'Message has been sent';
        if($_SESSION['user']){
            header("location:addemp.php?msg=* Employee added successfully");
        }
        
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
else{
    header("location:addemp.php?msg=* Error");
            // echo 'Message not sent';

}
?>
                      