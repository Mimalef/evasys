<?php
session_start();

require "html/admin_login.html";
require "_conn.php";

if(isset($_SESSION['admin_id']))
{
    header('location: admin.php');
}

if(isset($_POST["user"]) && isset($_POST["pass"]))
{
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    
    $sql = "SELECT id FROM admins WHERE user='$user' AND pass='$pass'";
    $res = $db->query($sql);
    $res = $res->fetch();
    
    if($res)
    {
        $_SESSION["admin_id"] = $res['id'];
        
        header('location: admin.php');
    }
    else
    {
        die("<p class='error'>نام کاربری یا کلمه عبور اشتبه است.</p>");
    }
}
?>
