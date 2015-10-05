<?php
try
{
    $db = new PDO("mysql:dbname=pes;host=localhost", "root", "");
}
catch(PDOException $e)
{
    die("<p class='error'>" . $e->getMessage() . "</p>");
}
?>