<?php
include("../Inc/head.inc.php");
include("../Inc/nav.inc.php");
include("../Inc/phoneNav.php");
include("../Inc/DBH.php");
include("../Inc/SYS.php");
?>
<style>
.cont {
    min-height: 100vh;
    flex-direction: column;
}

h1,
i {
    color: var(--M-C-);
    font-size: 5em;
}

a {
    text-decoration: underline;
}
</style>
<div class="cont D-F">
    <i class="fa-solid fa-triangle-exclamation"></i>
    <h1>
        Thank you for ordering
        <br>
        you will get your oder sent per E-mail in the next few hours
    </h1>
    <br>
    <br>
    <br>
    <?php
    echo "<a href='../'>Go back to Home</a>";
    ?>

</div>


<?php
include("../Inc/foot.inc.php");
include("../Inc/footer.inc.php");
?>