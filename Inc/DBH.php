<?php
$serverName = "localhost";
$DBUName = "root";
$DBPass = "!QTdb404";
$DBName = "td";


$conn = mysqli_connect($serverName, $DBUName, $DBPass, $DBName);
if (!$conn) {
    die("ERROR: " . mysqli_connect_error());
}