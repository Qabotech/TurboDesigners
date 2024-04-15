<?php
include("../Inc/head.inc.php");
include("../Inc/nav.inc.php");
include("../Inc/phoneNav.php");
include('./func.inc.php');
include('./DBH.php');

?>

<div class="wrap">
    <h1>Login</h1>

    <form action="../Inc/login.inc.php" method="post" class="D-F">
        <h3>E-mail Address</h3>
        <input type="text" name="Email" placeholder="e.g. Example@gmail.com">
        <h3>Password</h3>
        <input type="password" name="PWD" placeholder="Please enter a suitable Password" id="PWD">
        <h3 style="text-decoration: underline;cursor:pointer;" onclick="window.location.href='./Register';">don´t have
            an Account?
            Register here </h3>
        <input type="submit" class="D-G send" name="login" value="Login">

    </form>
</div>
<div class="ADAera D-F">
    <h1>AD <br> AREA</h1>
</div>



<?php
include("../Inc/foot.inc.php");
include("../Inc/footer.inc.php");
?>