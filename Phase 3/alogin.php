<!DOCTYPE html>
<?php
session_start();

echo "<h1>Se connecter</h1>";

if(isset($_POST['submit']))
{
    $username=htmlspecialchars(trim($_POST['username']));
    $password=htmlspecialchars(trim($_POST['password']));

    if($username&&$password)
    {
    $password=md5($password);   
    $connect=mysql_connect('localhost','root','');
    mysql_select_db('test');

    $log=mysql_query("SELECT * FROM users WHERE username='$username' AND password='$password' ");
    $rows=mysql_num_rows($log);
    if($rows==1)
    {
    $_SESSION['username']=$username;    
    //header ('Location: membre.php');
    header('Location:membre.php'.$_GET['previouspage']);

    }else echo "Username/password is not valid";



    }else echo"Data missing";

}
?>
<html>
<head>
    
</head>

<body>

    
    
<a href="index.html">Home</a>
<div class="loginbox">
        <h1>Admin Login</h1>
        <form method="post" action="alogin.php">
        <p>Username</p>
            <input type="text" name="" placeholder="Enter Username">
            <p>Password</p>
            <input type="password" name="" placeholder="Enter Password"><br>
            <br>
            <input type="submit" name="" value="Login"><br>
            </form>
    <p><a href="emp.html">Employee page</a></p>
    <p><a href="editproduct.html">Edit Product page</a></p>
        </div>
    </body>
    </html>