<?php
$result;

function emptyInputSignup($FSname, $Email, $Phone, $PWD, $rePWD, $Country)
{

    if (empty($FSname) || empty($Email) || empty($PWD) || empty($rePWD) || empty($Phone) || empty($Country)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function UidExisits($conn, $Email)
{
    $sql = "SELECT * FROM tdusers WhERE email = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../Register/?error=stmtFaildedd");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $Email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}


function createUser($conn, $FSname, $Email, $Phone, $PWD, $Country)
{
    $sql = "INSERT tdusers (FSname,Email,Phone,PWD,Country) VALUES (?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../Register/?error=stmtFaildd");
        exit();
    }

    $hashedPwd = password_hash($PWD, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssss", $FSname, $Email, $Phone, $hashedPwd, $Country);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../Register/?error=none+WELCOME+TO+TURBO");
    exit();
}

function InvalidEmail($Email)
{

    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function PWDMatch($PWD, $rePWD)
{
    if ($PWD !== $rePWD) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function emptyInputlogin($Email, $PWD)
{
    if (empty($Email) || empty($PWD)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $Email, $PWD)
{
    $uidExistsed = UidExisits($conn, $Email);

    if ($uidExistsed === false) {
        header("location: ../Login/?error=WrongLogin");

        exit();
    }

    $pwdHashed = $uidExistsed["PWD"];

    $checkPWD = password_verify($PWD, $pwdHashed);

    if ($checkPWD === false) {
        header("location: ../Login/?error=WrongLogin");
        exit();
    } else if ($checkPWD === true) {
        session_start();
        $_SESSION["ID"] =       $uidExistsed["ID"];
        $_SESSION["PWD"] =       $uidExistsed["PWD"];
        $_SESSION["Email"] =    $uidExistsed["Email"];
        $_SESSION["FSname"] =   $uidExistsed["FSname"];
        $_SESSION["Phone"] =    $uidExistsed["Phone"];
        $_SESSION["Country"] =  $uidExistsed["Country"];
        header("location: ../index.php?hiUser");
        exit();
    }
}