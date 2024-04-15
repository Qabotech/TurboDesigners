<?php
$serverName = "sql311.infinityfree.com";
$DBUName = "if0_34932725";
$DBPass = "yATOuX2udsAKVH";
$DBName = "if0_34932725_td";


$conn = mysqli_connect($serverName, $DBUName, $DBPass, $DBName);
if (!$conn) {
    die("ERROR: " . mysqli_connect_error());
}