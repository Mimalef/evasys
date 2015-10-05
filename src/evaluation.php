<?php
session_start();

require "html/evaluation.html";
require "_conn.php";

if(!isset($_SESSION['user_id']))
{
    header('location: index.php');
}

if(isset($_POST["q1"]) && isset($_POST["q2"]) && isset($_POST["q3"]) && isset($_POST["q4"]) && isset($_POST["q5"]))
{
    $id = $_SESSION['user_id'];
    $q1 = $_POST["q1"];
    $q2 = $_POST["q2"];
    $q3 = $_POST["q3"];
    $q4 = $_POST["q4"];
    $q5 = $_POST["q5"];
    
    $sql = "INSERT INTO evalus VALUES (NULL, $id, $q1, $q2, $q3, $q4, $q5)";
    $res = $db->query($sql);
    
    if($res)
    {
        die("<p class='msg'>اطلاعات با موفقیت ثبت شد.</p>");
    }
    else
    {
        die("<p class='error'>خطا در ثبت اطلاعات.</p>");
    }
}
?>