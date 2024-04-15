<?php
if (isset($_POST["enter"])) {
    include('./func.inc.php');
    include('./DBH.php');
    $Email = $_POST["Email"];
    $PWD = $_POST["PWD"];

    loginUser($conn, $Email, $PWD);
} else {
    header("location: ../Login/");
}