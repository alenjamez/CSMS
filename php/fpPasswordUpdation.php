<?php
$con=mysqli_connect("localhost","root","","car showroom")or die("couldn't connect");

session_start();
    if( isset($_SESSION['login']) && isset($_POST['password']))
    {
        $n=md5($_POST["password"]);
        $id=$_SESSION["login"];

        $query="UPDATE tbl_login SET password='$n' WHERE login_id=$id";
        if(mysqli_query($con,$query)){
            session_unset();
            header("Location:..\login.php?msg=");
        }
        else{
            session_unset();
            echo "query error";
        }
    }
    else{
        session_unset();
        header("location:..\fpEnterMail.php?err=wrongpass");
    }

?>