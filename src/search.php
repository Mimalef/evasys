<?php
session_start();

require "_conn.php";

if(!isset($_SESSION['admin_id']))
{
    header('location: index.php');
}

$res = NULL;

if(isset($_POST["user"]) || isset($_POST["addr"]))
{
    $user = $_POST["user"];
    $addr = $_POST["addr"];
    
    $sql = "SELECT * FROM users WHERE addr LIKE '%$addr%' AND user LIKE '%$user%'";
    $res = $db->query($sql);
    $res = $res->fetchAll();
}

require "html/search.html";
?>