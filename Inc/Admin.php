<?php
include_once("../Inc/DBH.php");
include_once("./DBH.php");
if (isset($_POST["create"])) {
    $PName = $_POST["PName"];
    $DName = $_POST["DName"];
    $DLevel = $_POST["DLevel"];
    $PTags = $_POST["PTags"];
    $PDescription = $_POST["PDescription"];
    $IMG = $_POST["IMG"];
    $IMG1 = $_POST["IMG1"];
    $IMG2 = $_POST["IMG2"];
    $Prise = $_POST["Prise"];
    $CAT = $_POST["CAT"];

    $sql = "INSERT INTO products (PName, PTags, PDescription,Prise,CAT)
        VALUES ('$PName', '$PTags', '$PDescription','$Prise','$CAT' )";

    /*
    CREATE TABLE `epiz_32201422_td`.`products` ( `ID` INT NOT NULL AUTO_INCREMENT , `PName` INT NOT NULL , `PTags` INT NOT NULL , `PDescription` INT NOT NULL , `Prise` INT NOT NULL , `CAT` INT NOT NULL , `removeme` INT NOT NULL , PRIMARY KEY (`ID`)) ENGINE = MyISAM;
    */


    $sql0 = "INSERT INTO Desinger (PName, DName, DLevel)
        VALUES ('$PName', '$DName', '$DLevel')";
    $sql1 = "INSERT INTO IMG (IMG,IMG1,IMG2)
        VALUES ('$IMG','$IMG1','$IMG2')";
    /*
    CREATE TABLE `epiz_32201422_td`.`IMG` ( `ID` INT NOT NULL AUTO_INCREMENT , `IMG` INT(9999) NOT NULL , `IMG1` TEXT NOT NULL , `IMG2` INT(9999) NOT NULL , PRIMARY KEY (`ID`)) ENGINE = MyISAM;
    */


    if (mysqli_query($conn, $sql)  && mysqli_query($conn, $sql1)) {
        header("location: ../Admin/");
        exit();
    } else {
        echo 'ERR' . mysqli_error($conn);
    }
}