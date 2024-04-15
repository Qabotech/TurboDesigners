<?php
include("../Inc/head.inc.php");
include("../Inc/nav.inc.php");
include("../Inc/phoneNav.php");
include("../Inc/DBH.php");
include("../Inc/COD.php");


?>
<style>
@media only screen and (max-width: 1024px) {
    .wrap {
        display: grid;
        place-content: center;
        gap: 0em;
    }

    body h1 {
        margin-top: 0;
        margin-left: 4.5vw;
    }
}

@media only screen and (max-width: 960px) {
    * {
        text-align: left !important;
    }

    .wrap {
        min-height: unset !important;
        padding-top: 10em;
    }

    ::placeholder {
        padding-left: 0.5em;
    }

    textarea {
        padding-top: 0.5em;
        padding-right: 0.5em;
    }

    .count {
        right: 0.5em;

    }

    .count p {
        font-size: 0.8em;
    }
}
</style>
<div class="wrap">
    <h1>Order Details</h1>
    <form action="../Inc/COD.php" method="post" class="D-F">
        <h3>Order type</h3>
        <div class="select">
            <i class="fas fa-chevron-down Cat-arrow"></i>
            <select required name="type" id="select">
                <option selected disabled hidden>
                    <h1 class="nix"> Select your order type</h1>
                </option>
                <option <?php echo $G; ?> value="Graphic-design">Graphic design</option>
                <option value="Visual-identity">Visual identity</option>
                <option value="Social-media-design">Social media design</option>
                <option <?php echo $U; ?> value="UI/UX-Design">UI/UX Design</option>
                <option value="Twitch-&-Youtube-bundels-&-alerts">Twitch & Youtube bundels & alerts</option>
                <option <?php echo $V; ?> value="Video-editing">Video editing</option>
                <option <?php echo $I; ?> value="Intro-/-Outro">Intro / Outro</option>
                <option <?php echo $D; ?> value="Digital-art">Digital art</option>
                <option value="Logo-design">Logo design</option>
                <option value="Banner-design">Banner design</option>
                <option value="Others">Others</option>
            </select>
        </div>
        <h3>E-mail Address</h3>
        <input type="text" name="Email" placeholder="e.g. Example@gmail.com">
        <h3>Country</h3>
        <input type="text" name="Country" placeholder="e.g. United States Of America">
        <h3>Budget</h3>
        <input type="text" name="Budget" placeholder="e.g. 50 - 100 usd">
        <h3>Order Details</h3>
        <div class="textarea">
            <textarea id="word" oninput="countWord()" name="Details"
                placeholder="Write all details of your order..."></textarea>
            <div class="D-F count">
                <p id="charNum">500 </p>
                <p style="margin-left: 0.15em;"> Characters left</p>
            </div>
        </div>
        <input type="submit" class="D-G send" name="send" value="Order Now">
    </form>
    <div class="ADAera D-F">
        <h1>AD <br> AREA</h1>
    </div>
</div>
<?php
include("../Inc/foot.inc.php");
include("../Inc/footer.inc.php");
?>

































































































<script>
function countWord() {
    var words = document
        .getElementById("word").value;
    var count = 0;
    var split = words.split(' ');
    for (var i = 0; i < split.length; i++) {
        if (split[i] != "") {
            count += 1;
        }
    }
    document.getElementById("charNum")
        .innerHTML = 500 - count;
}
</script>


<script>
$(".select")
    .click(function() {
        $(".Cat-arrow").toggleClass("fa-chevron-down");
        $(".Cat-arrow").toggleClass("fa-chevron-up");
    })
</script>