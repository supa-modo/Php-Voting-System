<?php 
    include("connection.php");
    include("login.php");
?>
    
<html>
    <head>
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div id="form">
            <h1>Voter Login Form</h1>
            <form name="form" action="login.php" onsubmit="return isvalid()" method="POST">
                <label>Voter ID: </label>
                <input type="text" id="voterId" name="user"></br></br>
                <label>Password: </label>
                <input type="password" id="pass" name="pass"></br></br>
                <input type="submit" id="btn" value="Login" name="submit"/>
                <input type="button" id="btn-admin" value="Login as Admin" onclick="window.location.href='index2.php'" />
            </form>
        </div>
        <script>
            function isvalid(){
                var user = document.form.user.value;
                var pass = document.form.pass.value;
                if(user.length=="" && pass.length==""){
                    alert("Voter Id and password field is empty!!!");
                    return false;
                }
                else if(user.length==""){
                    alert("Voter Id field is empty!!!");
                    return false;
                }
                else if(pass.length==""){
                    alert("Password field is empty!!!");
                    return false;
                }
            }
        </script>
    </body>
</html>
