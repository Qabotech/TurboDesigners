<?php
include("../Inc/head.inc.php");
include("../Inc/nav.inc.php");
include("../Inc/phoneNav.php");
include("../Inc/DBH.php");

?>
<style>
@media only screen and (max-width: 650px) {
    .wrap>.D-F .box::after {
        width: 260px;
        left: 50%;
        transform: translate(-50%, 0);
        font-size: 1.5em;
        font-family: "Cairo", sans-serif;
    }

    h1 {
        padding-top: 2em;
        padding-bottom: 0;
    }
}
</style>
<h1>Order a custom product</h1>

<div class="wrap D-F">
    <div class="D-F">
        <div onclick="window.location = '../Custom-Order-Details/?type=Graphic' " class="box">
            <img src="https://i.ibb.co/p2J7Zbk/Pngtree-graphic-designer-learning-program-software-7259396.png">
        </div>

        <div onclick="window.location = '../Custom-Order-Details/?type=UI'" class="box">
            <img src="https://i.ibb.co/ZNsrhPS/Pngtree-modern-flat-design-concept-of-5332907.png">
        </div>
        <div onclick="window.location = '../Custom-Order-Details/?type=Video'" class="box">
            <img src="https://i.ibb.co/PwRMbCg/Vedit.png">
        </div>
    </div>

    <div class="D-F F-wrap">
        <div onclick="window.location = '../Custom-Order-Details/?type=Intro'" class="box">
            <img src="https://i.ibb.co/3yWtpJk/Intro.png">
        </div>
        <div onclick="window.location = '../Custom-Order-Details/?type=Digital'" class="box">
            <img src="https://i.ibb.co/sHjQQYJ/Dart.png">
        </div>
        <div onclick="window.location = '../Custom-Order-Details/?type=Other'" class="box">
            <img src="https://i.ibb.co/mBxyrCV/Others.png">
        </div>
    </div>
</div>
<?php
include("../Inc/foot.inc.php");
include("../Inc/footer.inc.php");
?>