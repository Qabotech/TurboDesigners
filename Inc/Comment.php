<?php

session_start();
include("../Inc/DBH.php");
if (isset($_POST["Comment"])) {

    $CUName =           mysqli_escape_string($conn, $_POST["CUName"]);
    $Cid =              mysqli_escape_string($conn, $_POST["Cid"]);
    $Comments =         mysqli_escape_string($conn, $_POST["Comment"]);
    $st =         mysqli_escape_string($conn, $_POST["st"]);


    echo $Cid;

    $sql = "INSERT INTO Comments (CUName, Comments, Cid,rating)
        VALUES ('$CUName', '$Comments', '$Cid' ,'$st')";
    if (isset($_SESSION["FSname"])) {
        if (mysqli_query($conn, $sql)) {
            header('location: ../P-Details/?id=' . $Cid);
            exit();
        } else {
            echo 'ERR' . mysqli_error($conn);
        }
    } else {
        header("location: ../ERR/");
    }
}
