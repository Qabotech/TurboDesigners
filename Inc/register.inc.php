<?php


if (isset($_POST["send"])) {
    $FSname = $_POST["FSname"];
    $Email = $_POST["Email"];
    $Phone = $_POST["Phone"];
    $PWD = $_POST["PWD"];
    $rePWD = $_POST["rePWD"];
    $Country = $_POST["Country"];

    include('./func.inc.php');
    include_once('./func.inc.php');
    include('./DBH.php');
    /* 
    CREATE TABLE `epiz_32201422_td`.`tdusers` ( `ID` INT NOT NULL , `FSname` VARCHAR(255) NOT NULL , `Email` VARCHAR(255) NOT NULL , `Phone` VARCHAR(255) NOT NULL , `PWD` VARCHAR(255) NOT NULL , `Country` VARCHAR(255) NOT NULL ) ENGINE = MyISAM;
    */



    if (emptyInputSignup($FSname, $Email, $Phone, $PWD, $rePWD, $Country) !== false) {
        header("location: ../Register/?error=emptyInput");
        exit();
    }
    if (InvalidEmail($Email) !== false) {
        header("location: ../Register/?error=InvalidEmail");
        exit();
    }
    if (PWDMatch($PWD, $rePWD) !== false) {
        header("location: ../Register/?error=PWDnoMatch");
        exit();
    }
    if (UidExisits($conn, $Email) !== false) {
        header("location: ../Register/?error=EmailTaken");
        exit();
    }
    createUser($conn, $FSname, $Email, $Phone, $PWD, $Country);
    exit();
} else {
    header("location: ../login/");
}