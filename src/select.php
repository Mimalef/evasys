<?php
session_start();

require "_conn.php";

if(!isset($_SESSION['admin_id']))
{
    header('location: index.php');
}

$sql = "SELECT * FROM users";
$res = $db->query($sql);
$res = $res->fetchAll();

require "html/select.html";
?>