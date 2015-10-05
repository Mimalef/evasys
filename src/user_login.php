<?php
session_start();

require "html/user_login.html";
require "_conn.php";

if(isset($_SESSION['user_id']))
{
    header('location: evaluation.php');
}

if(isset($_POST["user"]) && isset($_POST["pass"]))
{
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    

    $sql = "SELECT id FROM users WHERE user='$user' AND pass='$pass'";
    $res = $db->query($sql);
    $res = $res->fetch();
    
    if($res)
    {
        $_SESSION["user_id"] = $res['id'];
        
        header('location: evaluation.php');
    }
    else
    {
        die("<p class='error'>نام کاربری یا کلمه عبور اشتبه است.</p>");
    }
}
?>