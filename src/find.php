<?php
session_start();

require "html/find.html";
require "_conn.php";

if(!isset($_SESSION['admin_id']))
{
    header('location: index.php');
}

if(isset($_POST["id"]))
{
    header('location: update.php?id=' . $_POST["id"]);
}

?>