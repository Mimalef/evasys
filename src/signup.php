<?php
require "html/signup.html";
require "_conn.php";

if(isset($_POST["user"]) && isset($_POST["pass"]) && isset($_POST["addr"]))
{
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    $addr = $_POST["addr"];
    
    $sql = "INSERT INTO users VALUES (NULL, '$user', '$pass', '$addr')";
    $res = $db->query($sql);
    
    if($res)
    {
        header('location: user_login.php');
    }
    else
    {
        die("<p class='error'>خطا در ثبت اطلاعات.</p>");
    }
}
?>
