<?php
session_start();

require "_conn.php";

if(!isset($_SESSION['admin_id']))
{
    header('location: index.php');
}

$id = "";
$user = "";
$pass = "";
$addr = "";

if(isset($_GET["id"]))
{
    $id = $_GET["id"];
    
    $sql = "SELECT * FROM users WHERE id=$id";
    $res = $db->query($sql);
    $res = $res->fetch();
    
    if($res)
    {
        $user = $res['user'];
        $pass = $res['pass'];
        $addr = $res['addr'];
    }
    else
    {
        echo "<p class='error'>کاربر یافت نشد.</p>";
    }
    
    if(isset($_POST["user"]) && isset($_POST["pass"]) && isset($_POST["addr"]))
    {
        $user = $_POST["user"];
        $pass = $_POST["pass"];
        $addr = $_POST["addr"];
        
        $sql = "UPDATE users SET user='$user', pass='$pass', addr='$addr' WHERE id=$id";
        $res = $db->query($sql);
        
        if($res)
        {
            echo "<p class='msg'>اطلاعات با موفقیت ویرایش شد.</p>";
        }
        else
        {
            echo "<p class='error'>خطا در ویرایش اطلاعات.</p>";
        }
    }
}

require "html/update.html";
?>