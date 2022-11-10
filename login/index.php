<?php
    //Establish Connection to SQL Database (START)
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="vlog"; // <--- Name of Database to connect with
    $link=mysqli_connect($servername,$username,$password,$dbname);
    $con=mysqli_select_db($link,$dbname);
    //Establish Connection to SQL Database (END)
    session_start();
    //If logged on, automatically send to crudform.php
    if(isset($_SESSION['username'])){ header('Location: login.php'); } 
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form name= "form1" action= "" method = "POST" >
        <h2>LOGIN</h2>
        <label>Username</label>
        <input type="text" name="username" placeholder="Enter your Username"><br>

        <label>Password</label>
        <input type="password" name="password" placeholder="Enter your Password"><br>

        <tr>
                <td> <a class = "signup" href="http://localhost/login/signup.php">Sign Up</a></td>
            </tr>
        
        <button type="submit" name = "login">Login</button>
    </form>
</body>
</html>

<?php

    if(isset($_POST["login"]))
    {
        $_SESSION['username'] = htmlentities($_POST['username']);
        $_SESSION['password'] = htmlentities($_POST['password']);

        $res= mysqli_query($link, "select * from login where uname = '$_POST[username]' and pass = '$_POST[password]'");
        while($row=mysqli_fetch_array($res))
        {
            if($_SESSION['username'] == $row["uname"] && $_SESSION['password'] == $row["pass"])
            header('Location: login.php');
        }
    }