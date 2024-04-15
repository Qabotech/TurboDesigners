<?php
include("../Inc/head.inc.php");
include("../Inc/nav.inc.php");
include("../Inc/phoneNav.php");
include("../Inc/DBH.php");
include("../Inc/SYS.php");

if (!isset($_SESSION["Email"])) {
    echo '<script>
    window.location = "../ERR"
    </script>';
}


?>
<style>
.loading {
    display: none !important;
}
</style>
<script src="../js/app.js"></script>
<div class="Cart-Wrap">
    <div class="shopNav">
        <h1 class="D-G">1</h1>
        <h2>Shopping Cart</h2>
        <div class="line"></div>
        <h1 class="D-G">2</h1>
        <h2>Check Out</h2>
        <div class="line"></div>
        <h1 class="D-G">3</h1>
        <h2>Finish</h2>
    </div>
    <div class="HWrap D-F">
        <div class="HHwrap D-F">
            <a href="../Shopping-cart/" class="D-G  HCart">
                <h2 class="HCart HCart">Shopping Cart</h2>
            </a>
            <a href="../Favorite/" class="D-G ">
                <h2 class="HFav ">Favorite</h2>
            </a>
        </div>
    </div>

    <div class="empty D-F" style=" <?php
                                    if ($_SESSION["Count"] > 0) {
                                        echo "display:none;";
                                    } else {
                                        echo  "display:flex;";
                                    }
                                    ?> ">
        <i class="fa-solid fa-circle-exclamation"></i>
        <h1>Cart is empty</h1>
    </div>

    <div class="D-F PC" style="min-height:100vh; padding-top:3em; <?php
                                                                    if (!$_SESSION["Count"] > 0) {
                                                                        echo "display:none;";
                                                                    } else {
                                                                        echo  "display:flex;";
                                                                    }
                                                                    ?> ">
        <div class="wrap D-F">
            <h1>Shopping Cart</h1>
            <div class="wrapper">
                <table>
                    <tr>
                        <th>Product Details</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>


                    <?php


                    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                        $PPC = $values['item_HQ'] * $values['item_HQ1'];

                    ?>
                    <tr>
                        <td>
                            <img onclick="window.location = '../P-Details/?id=TD<?php echo substr($values['item_ID'], -1); ?>'"
                                src="<?php echo $values['item_img'] ?>" alt="">
                            <div class="cont D-F">
                                <h3><?php echo $values['item_name'] ?></h3>
                                <!--<h3> <span>size:</span> A4</h3>-->
                                <!--<h3> <span>style:</span> A4</h3>-->
                                <h3> <span>Product ID:</span><?php echo $values['item_ID'] ?></h3>
                                <a class="CS" style="color:var(--M-C-); font-size:1em;"
                                    href="../P-Details/?id=TD<?php echo substr($values['item_ID'], -1); ?>">Go
                                    to product page</a>
                            </div>

                        </td>
                        <td>
                            <div class="D-F">
                                <?php

                                    if (!isset($values['item_HQ'])) {
                                        echo "1";
                                    } else {
                                        echo $PPC;
                                    };

                                    ?>
                                <a class="CS" style="text-decoration: underline;"
                                    href="?action=delete&id=<?php echo $values['item_id'] ?>">Remove</a>

                            </div>
                        </td>
                        <td>
                            <div class="D-F">
                                <?php echo $values['item_price'] . "$" ?>
                            </div>
                        </td>
                        <td>
                            <div class="D-F">
                                <?php if (!isset($values['item_HQ'])) {
                                        echo  $values['item_price'] * "1" . "$";
                                    } else {
                                        echo $values['item_price'] * $PPC . "$";
                                    };
                                    ?>
                            </div>

                    </tr>

                    <?php } ?>
                </table>
                <div class="orderSum D-F">
                    <h4>Order SUmmary</h4>
                    <?php foreach ($_SESSION["shopping_cart"] as $keys => $values) { ?>
                    <h4 class="D-F K"> <span> <?php echo $values['item_name'] ?> <i class="fa-solid fa-xmark"></i>
                            <?php
                                if (!isset($values['item_HQ'])) {
                                    echo "1";
                                } else {
                                    echo $PPC;
                                };
                                ?></span>
                        <span><?php
                                    if (!isset($values['item_HQ'])) {
                                        echo  $values['item_price'] * "1" . "$";
                                    } else {
                                        echo $values['item_price'] * $PPC . "$";
                                    };

                                    ?>
                        </span>
                    </h4>
                    <!--<h4 class="D-F"> <span> PROMO CODE </span> <span>5%</span></h4>-->
                    <?php } ?>
                    <h4 class="D-F"> <span> Total COst </span>
                        <span>
                            <?php
                            $count = count($_SESSION["shopping_cart"]);
                            $_SESSION["Count"] = $count;
                            foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                                if (!isset($values['item_HQ'])) {
                                    $Total = "1" * $values['item_price'];
                                } else {
                                    $Total = $PPC * $values['item_price'];
                                }
                                $ATotal[] = $Total;
                                $MainTotal = array_sum($ATotal) . "$";
                            }
                            echo $MainTotal;
                            ?>
                        </span>
                    </h4>
                    <button class="D-F" onclick="window.location = '../Checkout/'">
                        <h3>CHECKOUT</h3>
                    </button>
                </div>

                <a class="CS" href="../Store/">visit shop</a>
            </div>
        </div>
    </div>



    <div class="THisP">
        <div class="P" style="<?php
                                if (!$_SESSION["Count"] > 0) {
                                    echo "display:none !important;";
                                } else {
                                    echo  "display:flex !important;";
                                }
                                ?>
">
            <h2>Product Details</h2>
            <?php foreach ($_SESSION["shopping_cart"] as $keys => $values) { ?>
            <div class="Product D-F">
                <img src="<?php echo $values['item_img'] ?>">
                <div class="text">
                    <h3><?php echo $values['item_name'] ?></h3>
                    <div class="D-F">
                        <h3> <span>Product ID:</span><?php echo "TD-" . $values['item_id'] ?></h3>
                        <h3> <span>Quantity:</span> <?php
                                                        if (!isset($values['item_HQ'])) {
                                                            echo "1";
                                                        } else {
                                                            echo $PPC;
                                                        };
                                                        ?></h3>
                    </div>
                    <div class="D-F">
                        <h3> <span>Product Price:</span> <?php echo $values['item_price'] ?>$</h3>
                        <h3> <span>TOTAL:</span> <?php if (!isset($values['item_HQ'])) {
                                                            echo  $values['item_price'] * "1" . "$";
                                                        } else {
                                                            echo $values['item_price'] * $PPC . "$";
                                                        }; ?> </h3>
                    </div>
                    <div class="D-F">
                        <a href="?action=delete&id=<?php echo $values['item_id'] ?>">Remove</a>
                        <a href="../P-Details/?id=TD<?php echo substr($values['item_ID'], -1); ?> ">Go to
                            Product Page</a>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>

            <div id="OS" class="Product o-s" style="height: auto; padding:1em; gap:0;">
                <h2>Order summary</h2>
                <div class="text">
                    <?php foreach ($_SESSION["shopping_cart"] as $keys => $values) { ?>
                    <div class="D-F"
                        style="justify-content: space-between; height:75%;align-items:center !important;padding:0 40px;">
                        <h3>
                            <span> <?php echo $values['item_name'] ?> <i class="fa-solid fa-xmark"></i>
                                <?php
                                    if (!isset($values['item_HQ'])) {
                                        echo "1:";
                                    } else {
                                        echo $PPC . ":";
                                    };
                                    ?>
                            </span>
                        </h3>
                        <h3> <?php
                                    if (!isset($values['item_HQ'])) {
                                        echo  $values['item_price'] * "1" . "$";
                                    } else {
                                        echo $values['item_price'] * $PPC . "$";
                                    };

                                    ?>
                        </h3>
                    </div>
                    <?php
                    }
                    ?>
                    <div class="D-F"
                        style="justify-content: space-between; height:75%;align-items:center !important;padding:0 40px;">
                        <h3><span>Total Cost</span></h3>
                        <h3><?php
                            echo $MainTotal;
                            ?></h3>
                    </div>
                </div>
            </div>
        </div>

        <button class="MBtn" onclick="window.location = '../Store/' " style="cursor: pointer;">
            <h4> Visit Shop</h4>
            <div class="btnBG"></div>
        </button>


        <div class="CHout D-G PP" onclick="window.location = '../Checkout'" style="    <?php
                                                                                        if (!$_SESSION["Count"] > 0) {
                                                                                            echo " display:none;";
                                                                                        } else {
                                                                                            echo " display:flex;";
                                                                                        }
                                                                                        ?> ">
            CHECKOUT FOR <?php
                            echo $MainTotal;
                            ?>
        </div>


        <?php
        if (!$_SESSION["Count"] > 0) {
            echo " ";
        } else {
            echo  "<style>
        @media only screen and (max-width: 960px) {
                                                                    .footer{
                                                                        padding-bottom:6em;
                                                                        height:auto;

                                                                    }
                                                                    }

                                                                </style>";
        }
        ?>


    </div>

</div>

<?php
include("../Inc/foot.inc.php");
include("../Inc/footer.inc.php");
?>

<script>
function reload() {
    window.onload = function() {

        if (!window.location.hash) {
            $('.loading').hide();
            $("body").css('overflow', 'auto');
            window.location = window.location + '#loaded';
            window.location.reload();
        }
    }
}
reload();
</script>