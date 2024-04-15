<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<p-nav class="P-nav flip-in-ver-right">
    <ul>
        <i class="fa-solid fa-x" id="F-X"></i>
        <a class="this2" href="../Register/">

            <?php
            if (isset($_SESSION["Email"])) {
                echo '<li class="username" style="margin-bottom:5vw; margin-left: -0.2em;"><i class="fa-solid fa-user"></i>' . $_SESSION["FSname"] . '</li>';
            } else {
                echo '<li style="margin-bottom:5vw;"><i class="fa-solid fa-address-card"></i>Register</li>';
            }
            ?>

        </a>

        <script>
        $("#F-X").click(function() {
            $(".P-nav").hide();
            $("body").css("overflow", "auto");
            $(".fa-bars-staggered").attr("style", "display:unset !important;");
        })
        </script>

        <a href="../">
            <li><i class="fa-solid fa-house"></i>Home</li>
        </a>
        <a href="../Services/">
            <li><i class="fa-solid fa-hand-holding"></i>Services</li>
        </a>
        <a href="../Store/">
            <li><i class="fa-solid fa-basket-shopping"></i>Store</li>
        </a>
        <a href="../Custom-Order/">
            <li><i class="fa-regular fa-image"></i>Custom Order</li>
        </a>
        <a href="../Shopping-cart/">
            <li>
                <i class="fa-solid fa-cart-shopping">
                    <c class="D-F">
                        <?php
                        if (isset($_SESSION["Count"])) {
                            echo $_SESSION["Count"];
                        } else {
                            echo "0";
                        }
                        ?>
                    </c>
                </i>Cart
            </li>
        </a>
        <a href="../Favorite/">
            <li>
                <i class="fa-regular fa-heart">
                    <C class="D-F">
                        <?php
                        if (isset($_SESSION["FAV-Count"])) {
                            echo $_SESSION["FAV-Count"];
                        } else {
                            echo "0";
                        }

                        ?>
                    </C>
                </i>Favorite
            </li>
        </a>
        <a href="../ContactUs/">
            <li><i class="fa-solid fa-envelope"></i>Contact us</li>
        </a>
        <a href="../About/">
            <li><i class="fa-solid fa-circle-info"></i>About</li>
        </a>
        <a class="this" href="">

            <?php
            if (isset($_SESSION["Email"])) {
                echo '
                    <li style="margin-bottom:5vw;"><i class="fa-solid fa-arrow-right-from-bracket"></i>logout</li>
                ';
            } else {
                echo '<li style="margin-bottom:5vw;"> <i class="fa-solid fa-arrow-right-to-bracket"></i>login</li>
                ';
            }
            ?>
        </a>
    </ul>



</p-nav>
<div class="STbox">
    <i class="fa-solid fa-bars-staggered"></i>
</div>
<script>
<?php
    if (isset($_SESSION["Email"])) {
        echo "IsLogged();";
    } else {
        echo "NoLogged();";
    }
    ?>
</script>
<script>
function NoLogged() {
    $(".this2").attr("href", "../Register/")
    $(".sys li:nth-child(2) a").html('Login');
    $(".sys li:nth-child(2) a").attr("href", "../Login/");
    $(".this").attr("href", "../Login/");
}

function IsLogged() {
    $(".sys li:nth-child(2) a").html('Log Out');
    $(".sys li:nth-child(2) a").attr("href", "../logout/")
    $(".sys li:nth-child(1) a").attr("href", "../UserProfile/")
    $(".this2").attr("href", "../UserProfile/")
    $(".this").attr("href", "../logout/");

}
</script>