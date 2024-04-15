<?php
include("../Inc/DBH.php");
include("../Inc/SYS.php");
if (isset($_POST["PlaceOrder"])) {
    $FSname =  $_POST["FSname"];
    $Email =   $_POST["Email"];
    $Country = $_POST["Country"];
    $Pname =   $_POST["Pname"];
    $Price =   $_POST["Price"];
    $PID =     $_POST["PID"];
    $count = count($_SESSION["Invoice"]);
    $item_array = array(
        'FSname' =>  $_POST["FSname"],
        'Email' => $_POST["Email"],
        'Country' =>   $_POST["Country"],
        'Pname' =>    $_POST["Pname"],
        'Price' =>   $_POST["Price"],
        'PID' =>   $_POST["PID"]
    );
    $_SESSION["Invoice"][$count] = $item_array;

    $sql = "INSERT INTO Orders (FSname,Email,Country,Pname,Price,PID)
            VALUES ('$FSname','$Email','$Country','$Pname','$Price','$PID')";

    if (mysqli_query($conn, $sql)) {
        session_start();
        unset($_SESSION["shopping_cart"]);
        header("location: ../Thankyou/?" . $FSname);
        exit();
    } else {
        echo 'ERR' . mysqli_error($conn);
    }
}