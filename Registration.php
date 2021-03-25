<?php
 $con=mysqli_connect("localhost","root","","car showroom") or die("couldn't connect");
 $msg=$_GET['msg'];
 ?>
<html>
    <head>
        <title>UR Carz</title>
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
    <style>
	body {
	  /* background-color: #2f4454; */
      background-color:#469fbd;

	}
    .border{
        top:50%;
        left:50%;
        width:70%;
        height:80%;
        position: relative;
        background-color: #469fbd;
        transform: translate(-50%,-50%);
        border-radius: 10px;
        box-shadow: rgba(133, 133, 133, 0.603) 10px 10px 10px;
    }

	span{
         color: ;
		 font-weight: bold;
	}
    .vl {
        border-left: 2px solid #f2f2f2;
        height: 300px;
        position: absolute;
        left: 50%;
        margin-left: -1px;
        top: 105px;
    }
    .row{
        padding-top:10px ;
    }
    input[type=text],[type=password],[type=email],[type=tel] {
        width: 70%;
    }
    input[type=submit],[type=reset] {
        width: 35%;
        height:10%;
        color: #f2f2f2;
        background-color:  #469fbd;
        border-radius: 10px;
        border: solid #f2f2f2;
        opacity: 0.8;
        font-weight: bold;
    }
    input[type=submit]:hover {
        background-color:  #2d283e;
    }
    input[type=reset]:hover {
        background-color:  #2d283e;
    }
    </style>
    <script>
        function rname()
        {
        var nam=document.getElementById("name").value;
        var nam1=/^[a-zA-Z]+$/;
        
        if(nam=="")
            {
                document.getElementById("error").innerHTML="* Enter name";
                document.getElementById("error").style.color = "#f2f2f2";
                document.getElementById("name").focus();
            return false;
            }
        if(nam.match(nam1))
            {
                document.getElementById("error").innerHTML="";
        
            }
        else
            {
                document.getElementById("error").innerHTML="* Name must only contain characters";
                document.getElementById("error").style.color = "red";
                document.getElementById("name").focus();
            return false;
        
            }
        }
        function ema()
        {
        var emi=document.getElementById("mail").value;
        var emi1=/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})+$/;
        if(emi=="")
            {
                document.getElementById("error").innerHTML="* Enter email";
                document.getElementById("error").style.color = "#f2f2f2";
                document.getElementById("mail").focus();
            return false;
            }
        if(emi.match(emi1))
            {
                document.getElementById("error").innerHTML="";
        
            }
        else
            {
                document.getElementById("error").innerHTML="* Enter valid email";
                document.getElementById("error").style.color = "red";
                document.getElementById("mail").focus();
            return false;
            }
        }
        function phn()
        {
        var ph=document.getElementById("ph").value;
        var ph1=/^([6-9]{1}[0-9]{9})+$/;
        if(ph=="")
            {
                document.getElementById("error").innerHTML="* Enter phno";
                document.getElementById("error").style.color = "#f2f2f2";
                document.getElementById("ph").focus();
            return false;
            }
        if((ph.match(ph1))&& (ph.length==10))
            {
                document.getElementById("error").innerHTML="";
        
            }
        else
            {
                document.getElementById("error").innerHTML="* Must contain only numbers and must have 10 digits";
                document.getElementById("error").style.color = "red";
                document.getElementById("ph").focus();
            return false;
            }
        }
        function usr()
        {
        var un=document.getElementById("user").value;
        var un1=/^[a-zA-Z]+$/;
        if(un=="")
            {
            document.getElementById("error").innerHTML="* Enter Username";
            document.getElementById("error").style.color = "#f2f2f2";
            document.getElementById("user").focus();
            return false;
            }
        if((un.match(un1))&&(un.length>=5))
            {
                document.getElementById("error").innerHTML="";
        
            }
        else
            {
                document.getElementById("error").innerHTML="* Username must contain only lowercase letters with length greater than 5";
                document.getElementById("error").style.color = "red";
                document.getElementById("user").focus();
            return false;
            }
        }
        
        function npsw()
        {
        var ps=document.getElementById("pass").value;
        var ps1=/^[a-zA-Z0-9:@]+$/;
        if(ps=="")
            {
                document.getElementById("error").innerHTML="* Enter Password";
                document.getElementById("error").style.color = "#f2f2f2";
                document.getElementById("pass").focus();
            return false;
            }
        if((ps.match(ps1))&& (ps.length>=8))
            {
                document.getElementById("error").innerHTML="";
        
            }
        else
            {
                document.getElementById("error").innerHTML="* Password must contain number and charecter with length greater than 8";
                document.getElementById("error").style.color = "red";
                document.getElementById("pass").focus();
                return false;
            }
        }
        function psw1()
        {var ps=document.getElementById("pass").value;
        var ps1=document.getElementById("conpass").value;
        if(ps==ps1)
            {
                document.getElementById("error").innerHTML="";
                
            }
        else
            {
                document.getElementById("error").innerHTML="* Password not match!!!!!!!!!!";
                document.getElementById("error").style.color = "red";
                document.getElementById("conpass").focus();
            }
        }
        function loca()
        {
        var loc=document.getElementById("loc").value;
        var loc1=/^[a-zA-Z]+$/;
        if(loc=="")
           {
                document.getElementById("error").innerHTML="* Enter location";
                document.getElementById("error").style.color = "#f2f2f2";
                document.getElementById("loc").focus();
            return false;
            }
        if(loc.match(loc1))
            {
                document.getElementById("error").innerHTML="";
        
            }
        else
            {
                document.getElementById("error").innerHTML="* Must conatian only characters";
                document.getElementById("error").style.color = "red";
                document.getElementById("loc").focus();
            return false;
        
            }
        }
        function hint1(){
            document.getElementById("error").innerHTML="* Name must only contain characters";
            document.getElementById("error").style.color = "#f2f2f2";
        }
        function hint2(){
            document.getElementById("error").innerHTML="* Must conatian only characters";
            document.getElementById("error").style.color = "#f2f2f2";
        }
        function hint3(){
            document.getElementById("error").innerHTML="* Enter valid email";
            document.getElementById("error").style.color = "#f2f2f2";
        }
        function hint4(){
            document.getElementById("error").innerHTML="* Must contain only numbers and must have 10 digits";
            document.getElementById("error").style.color = "#f2f2f2";
        }
        function hint5(){
            document.getElementById("error").innerHTML="* Username must contain only lowercase letters with length greater than 5";
            document.getElementById("error").style.color = "#f2f2f2";
        }
        function hint6(){
            document.getElementById("error").innerHTML="* Password must contain only number and charecter with length greater than 8";
            document.getElementById("error").style.color = "#f2f2f2";
        }
    </script>
    </head>
    <body>
        <div class="border">
            <div class="container-fluid">
                <center>
                <h2 style="padding-top:20px;color:#f2f2f2;">Create your Account</h2></center>
                <form  method="post" name="regform" action="reg.php" class="form-group-sm container" enctype="multipart/form-data"></center><br>
                <div class="row">
                    <div class="col-lg-6"><center>
                        <input type="text" class="form-control" name="nme" id="name"  placeholder="Name" title="Name" autocomplete="off" on onblur="rname()" onclick="hint1()" required>
                        <span id="err1"></span><br></center>
                        <h5 style="padding-left:60px; color:#f2f2f2;">Gender</h5><center>
                        <div style="color:#f2f2f2;"> <input type="radio" name="gender" value="Male" required>&nbsp;Male&nbsp;&nbsp;&nbsp;
                        </h6><input type="radio" name="gender" value="Female">&nbsp;Female&nbsp;&nbsp;&nbsp;
                        </h6><input type="radio" name="gender" value="Other">&nbsp;Others <br></div>
                        <h6 style="padding-right:900px; color:white;"></h6>
                        <br><input type="text" id="loc" name="location" class="form-control  "value=""placeholder="Location" title="Location" onblur="loca()" onclick="hint2()" autocomplete="off" required>
                        <span id="err8"></span><br>
                        <input type="email" id="mail" name="mail" class="form-control  " value=""placeholder="E-mail" title="E-mail"onblur="ema()" autocomplete="off" onclick="hint3()" required>
                        <span id="err2"></span><br>
                        <input type="tel" id="ph" name="phne" class="form-control  form-group"value=""placeholder="Phone Number" title="Phone Number" onblur="phn()" autocomplete="off" onclick="hint4()" required>
                        <span id="err3"></span><br></center>
                    </div>
                    <div class="vl"></div>
                    <div class="col-lg-6">
                        <center>
                        <input type="text" name="user" class="form-control  form-group"  placeholder="Username" title="Username" id="user" onblur="usr()" autocomplete="off" onclick="hint5()" required>
                        <span id="err5"></span><br>
                        <input type="password" name="psw" class="form-control  form-group" placeholder="Password"  title="Password" id="pass"  onblur="npsw()" onclick="hint6()" required>
                        <span id="err6"></span><br>
                        <input type="password" class="form-control form-group" placeholder="Conform Password" title="Conform Password" id="conpass" onblur="psw1()" required>
                        <span id="err7"></span><br>
                        <abbr>
                        <input type="submit"  value="Submit" onsubmit="rname(); ema(); phn(); loc(); usr(); npsw(); psw1();">&nbsp;&nbsp;&nbsp;
                        <input type="reset"  value="Reset"><br></center><br>
                        <a href="login.php?msg=" style="color:#f2f2f2;padding-left: 200px;">Already a Member?</a>
                    </div>
                    <br><span id="error" style="padding-left:50px"><?php echo $msg?></span>
                </div>
                </form>
            </div>
        </div>
        <script>
        $('document').ready(function(){
            var username_state = false;
            var email_state = false;
            $('#user').on('blur', function(){
            var username = $('#user').val();
            if (username == '') {
                username_state = false;
                return;
            }
            $.ajax({
                url: 'reg.php',
                type: 'post',
                data: {
                    'user_check' : 1,
                    'username' : username,
                },
                success: function(response){
                if (response == 'taken' ) {
                    username_state = false;
                    $('#user').parent().removeClass();
                    $('#user').parent().addClass("form_error");
                    $('#user').siblings("error").text('Sorry... Username already taken');
                }else if (response == 'not_taken') {
                    username_state = true;
                    $('#username').parent().removeClass();
                    $('#username').parent().addClass("form_success");
                    $('#username').siblings("error").text('Username available');
                }
                }
            });
            });
        
        </script>
    </body>
</html>