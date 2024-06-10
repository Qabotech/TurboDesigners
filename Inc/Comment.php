<?php
session_start();

include("https://alowlaomar.de/TurboDesigners/Inc/DBH.php");

if (isset($_POST["Comment"])) {
    $CUName = mysqli_real_escape_string($conn, $_POST["CUName"]);
    $Cid = mysqli_real_escape_string($conn, $_POST["Cid"]);
    $Comments = mysqli_real_escape_string($conn, $_POST["Comment"]);
    $st = mysqli_real_escape_string($conn, $_POST["st"]);

    $sql = "INSERT INTO Comments (CUName, Comments, Cid, rating) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssis", $CUName, $Comments, $Cid, $st);

    if (isset($_SESSION["FSname"]) && mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        header('Location: https://alowlaomar.de/TurboDesigners/P-Details/?id=' . $Cid);
        exit();
    } else {
        $error_message = mysqli_error($conn);
        echo "Error: " . $error_message;
    }
} else {
    header("Location: https://alowlaomar.de/TurboDesigners/ERR/");
}
?>