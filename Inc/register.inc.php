<?php

if (isset($_POST["send"])) {
    $FSname = $_POST["FSname"];
    $Email = $_POST["Email"];
    $Phone = $_POST["Phone"];
    $PWD = $_POST["PWD"];
    $rePWD = $_POST["rePWD"];
    $Country = $_POST["Country"];

    include('./func.inc.php');
    include('./DBH.php');

    if (emptyInputSignup($FSname, $Email, $Phone, $PWD, $rePWD, $Country)) {
        header("location: https://alowlaomar.de/TurboDesigners/Register/?error=emptyInput");
        exit();
    }
    if (InvalidEmail($Email)) {
        header("location: https://alowlaomar.de/TurboDesigners/Register/?error=InvalidEmail");
        exit();
    }
    if (PWDMatch($PWD, $rePWD)) {
        header("location: https://alowlaomar.de/TurboDesigners/Register/?error=PWDnoMatch");
        exit();
    }
    if (UidExisits($conn, $Email)) {
        header("location: https://alowlaomar.de/TurboDesigners/Register/?error=EmailTaken");
        exit();
    }
    createUser($conn, $FSname, $Email, $Phone, $PWD, $Country);
    exit();
} else {
    header("location: https://alowlaomar.de/TurboDesigners/login/");
}

?>