<?php
 $con=mysqli_connect("localhost","root","","car showroom") or die("couldn't connect");
    if (isset($_POST['username_check'])) {
        $username = $_POST['username'];
        $sql = "SELECT * FROM tbl_login WHERE username='$username'";
        $results = mysqli_query($db, $sql);
        if (mysqli_num_rows($results) > 0) {
        echo "taken";	
        }else{
        echo 'not_taken';
        }
        exit();
    }
    if (isset($_POST['username_check'])) {
    $name=$_POST["nme"];
    $gender=$_POST["gender"];
    $loc=$_POST["location"];
    $email=$_POST["mail"];
    $phno=$_POST["phne"];
    $usr=$_POST["user"];
    $psw=md5($_POST["psw"]);

    $sql="select username,password from tbl_login where username='$usr'";
    $res=mysqli_query($con,$sql);
    if(mysqli_num_rows($res)>0)
    {
        header("location:Registration.php?msg=* User name alredy exist");
    }
    else{
        $sql="insert into tbl_login(username,password) values('$usr','$psw')";
        mysqli_query($con,$sql);
        $li=mysqli_insert_id($con);
        $sql1="insert into tbl_registration(name,gender,email,phone,location,login_id) values('$name','$gender','$email','$phno','$loc',$li)";
        mysqli_query($con,$sql1);
        header("location:login.php?msg=");
    }

?>
