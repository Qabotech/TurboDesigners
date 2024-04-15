<?php
include("../Inc/head.inc.php");
include("../Inc/nav.inc.php");
include("../Inc/phoneNav.php");
include("../Inc/DBH.php");

?>
<div class="wrap">
    <h1>Register</h1>

    <form action="../Inc/register.inc.php" method="post" class="D-F">
        <h3>First and Last Name</h3>

        <input type="text" name="FSname" placeholder="">
        <h3>E-mail Address</h3>

        <input type="text" name="Email" placeholder="e.g. Example@gmail.com">
        <h3>phone number</h3>

        <input type="text" name="Phone" placeholder="e.g. +1 41851351535">
        <h3>Password</h3>

        <input type="password" name="PWD" placeholder="Please enter a suitable Password">
        <h3>retype password</h3>

        <input type="password" name="rePWD" placeholder="Please Re-type your password">
        <h3>Country</h3>

        <input type="text" name="Country" placeholder="e.g. USA">

        <input type="submit" class="D-G send" name="send" value="Register Now">

    </form>
    <div class="ADAera D-F">
        <h1>AD <br> AREA</h1>
    </div>
</div>
<?php
include("../Inc/foot.inc.php");
include("../Inc/footer.inc.php");
?>