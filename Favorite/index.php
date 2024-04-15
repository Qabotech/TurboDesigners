<?php

include("../Inc/head.inc.php");
include("../Inc/nav.inc.php");
include("../Inc/phoneNav.php");
include("../Inc/DBH.php");
include("../Inc/Fav-SYS.php");
include("../Inc/SYS.php");

if (isset($_SESSION["Fav"])) {
    echo '<style>
    .notHere{
        display: none !important;
      }
    </style>';
}else{
        echo '<style>
    .notHere{
        display: block !important;
      }
    </style>';
}
if (!isset($_SESSION["Email"])) {
    echo '<script>
    window.location = "../ERR"
    </script>';
}


$Fcount = count($_SESSION["Fav"]);
$_SESSION["FAV-Count"] = $Fcount;
?>


<br>
<br>
<br>
<br>

<div class="HWrap D-F">
    <div class="HHwrap D-F">
        <a href="../Shopping-cart/" class="D-G ">
            <h2 class="HCart">Shopping Cart</h2>
        </a>
        <a href="../Favorite/" class="D-G HCart">
            <h2 class="HFav HCart">Favorite</h2>
        </a>
    </div>
</div>

<div class="empty D-F" style=" <?php
                                if ($_SESSION["FAV-Count"] > 0) {
                                    echo "display:none;";
                                } else {
                                    echo  "display:flex;";
                                }

                                ?> ">
    <i class="fa-solid fa-circle-exclamation"></i>
    <h1>Nothing Here</h1>
</div>

<div class="D-F PC" style=" padding-top:3em; <?php
                                                if (!$_SESSION["FAV-Count"] > 0) {
                                                    echo "display:none;";
                                                } else {
                                                    echo  "display:flex;";
                                                }
                                                ?> ">
    <div class="wrap D-F">
        <h1>Favorite</h1>
        <div class="wrapper">
            <table>
                <tr>
                    <th style="text-align: center;">Products</th>
                </tr>

                <?php
                foreach ($_SESSION["Fav"] as $keys => $values) {
                ?>
                <tr>
                    <td> <img style="cursor:pointer;"
                            onclick="window.location = '../P-Details/?id=TD<?php echo substr($values['item_ID'], -1); ?>'"
                            src="<?php echo $values['item_img'] ?>" alt="">
                        <div class="cont D-F">
                            <h3><?php echo $values['item_name'] ?></h3>
                            <!--<h3> <span>size:</span> A4</h3>-->
                            <!--<h3> <span>style:</span> A4</h3>-->
                            <h3> <span>Product ID:</span><?php echo $values['item_ID'] ?></h3>
                            <a class="CS" style="color:var(--M-C-); font-size:1em; cursor:pointer;"
                                onclick="window.location = '../P-Details/?id=TD<?php echo substr($values['item_ID'], -1); ?>'">Go
                                to product page</a>
                            <a class="CS" style=" position:unset; font-size:1em; margin-top:-1em;"
                                href="?action=delete&id=<?php echo $values['item_id'] ?>">Remove</a>
                        </div>
                        <div class="D-G" style="align-content: space-between;">


                        </div>
                    </td>


                </tr>
                <?php } ?>
            </table>


            <a class="CS" href="../Store/">Continue Shopping</a>
        </div>
    </div>
</div>
<div class="THisP">
    <div class="P" style="<?php
                            if (!$_SESSION["FAV-Count"] > 0) {
                                echo "display:none !important;";
                            } else {
                                echo  "display:flex !important;";
                            }
                            ?>
">
        <h2>Product Details</h2>
        <?php foreach ($_SESSION["Fav"] as $keys => $values) { ?>
        <div class="Product D-F">
            <img src="<?php echo $values['item_img'] ?>">
            <div class="text">
                <h3><?php echo $values['item_name'] ?></h3>
                <h3> <span>Product ID:</span><?php echo "TD-" . $values['item_id'] ?></h3>
                <div class="D-F">
                    <h3> <span>Product Price:</span> <?php echo $values['item_price'] ?>$</h3>
                </div>
                <div class="D-F">
                    <a href="?action=delete&id=<?php echo $values['item_id'] ?>">Remove</a>
                    <a href="../P-Details/?id=TD<?php echo substr($values['item_ID'], -1); ?> ">Go to Product
                        Page</a>
                </div>
            </div>
        </div>
        <?php
        }
        ?>

    </div>
</div>
<script src="../js/app.js"></script>
<?php
include("../Inc/foot.inc.php");
include("../Inc/footer.inc.php");
?>