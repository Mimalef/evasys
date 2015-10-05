<?php
session_start();

require "html/admin.html";

if(!isset($_SESSION['admin_id']))
{
    header('location: index.php');
}
?>