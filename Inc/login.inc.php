<script>
window.location = '../index.php?hiUser'
</script>
<?php


if (isset($_POST["login"])) {
    include('./DBH.php');
    include('./func.inc.php');
    $Email = $_POST["Email"];
    $PWD = $_POST["PWD"];
    $pass = "pass";
    setcookie($pass, $PWD, time() + (2592000 * 30), "/");
    if (emptyInputlogin($Email, $PWD) !== false) {
        header("location: ../Login/?error=emptyInput");
        exit();
    }
    loginUser($conn, $Email, $PWD);
    header("location: ../index.php?hiUser");
} else {
    header("location: ../Login/");
}
?>