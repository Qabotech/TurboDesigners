<?php
include("../Inc/DBH.php");

if (isset($_POST["send"])) {
    $type =      $_POST["type"];
    $Email =     $_POST["Email"];
    $Country =     $_POST["Country"];
    $Budget =       $_POST["Budget"];
    $Details =   $_POST["Details"];

    $sql = "INSERT INTO OD (types, Email, Country,Budget,Details)
        VALUES ('$type', '$Email', '$Country','$Budget','$Details' )";
    if (mysqli_query($conn, $sql)) {
        header("location: ../");
        exit();
    } else {
        echo 'ERR' . mysqli_error($conn);
    }
};

$G = "Graphic";
$U = "UI";
$V = "Video";
$I = "Intro";
$D = "Digital";
if (isset($_GET["type"])) {
    if ($_GET["type"] == $G) {
        $G = "selected";
    } else if ($_GET["type"] == $U) {
        $U = "selected";
    } else if ($_GET["type"] == $V) {
        $V = "selected";
    } else if ($_GET["type"] == $I) {
        $I = "selected";
    } else if ($_GET["type"] == $D) {
        $D = "selected";
    } else {
        $none = "disabled selected hidden";
    }
}