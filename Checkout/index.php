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
$count = count($_SESSION["shopping_cart"]);
$_SESSION["Count"] = $count;
foreach ($_SESSION["shopping_cart"] as $keys => $values) {
    $Pname = $values['item_name'];
    $PID = $values['item_id'];
    $PPC = $values['item_HQ'] * $values['item_HQ1'];
    $Total = $PPC * $values['item_price'];
    $ATotal[] = $Total;
    $payTotal = array_sum($ATotal);
}

?>
<script
    src="https://www.paypal.com/sdk/js?client-id=AfKth-n9UgkA6DCBrvy4I_WaIw8ts1XEDWgARibOc6Ir_CqmgqKG7Ucz5zl4ZC3Gf4aHxM966GWQiqj4&disable-funding=sepa,giropay,sofort">
</script>
<script src="../js/app.js"></script>

<?php
for ($i = 0; $i < 999; $i++) {
    echo "<div>";
}
?>
<script>
var x = <?php echo $payTotal; ?>;
</script>
<?php
for ($i = 0; $i < 999; $i++) {
    echo "</div>";
}
?>
<div class="shopNav">
    <h1 class="D-G"><i class="fa-solid fa-check"></i></h1>
    <h2 style="color: var(--F-C-);">Shopping Cart</h2>
    <div class="line active"></div>
    <h1 class="D-G">2</h1>
    <h2 style="color: var(--F-C-);">Check Out</h2>
    <div class="line"></div>
    <h1 class="D-G">3</h1>
    <h2>Finish</h2>
</div>
<div class="wrap">

    <form action="../Inc/Checkout.php" method="post" class="D-F">
        <h1>Payment details</h1>
        <h3>First and Second Name</h3>
        <input type="text" name="FSname" placeholder="e.g. Mark Roth" value="<?php echo $_SESSION["FSname"]; ?>">
        <h3>E-mail Address</h3>
        <input type="text" name="Email" placeholder="e.g. Example@gmail.com" value="<?php echo $_SESSION["Email"]; ?>">
        <h3>Country</h3>
        <input type="text" name="Country" placeholder="e.g. USA" value="<?php echo $_SESSION["Country"]; ?>">
        <input type="hidden" name="Pname" id="OrderDetails" value="<?php echo $Pname; ?>">
        <input type="hidden" name="PID" id="OrderDetails" value="<?php echo substr($PID, -1) ?>">
        <input type="hidden" name="Price" id="OrderDetails" value="<?php echo $payTotal; ?>">
        <input type="submit" name="PlaceOrder" style="position: absolute ; opacity:0; z-index:-10;" id="Place">

        <h1>Pay with PayPal</h1>
        <style>
        #paypal-payment-button {
            width: 100%;
            position: relative;
            z-index: 5;
        }
        </style>
        <div id="paypal-payment-button">
            <style>
            iframe body .paypal-button>.paypal-button-label-container {
                opacity: 0;
                background: red;
            }
            </style>

        </div>


    </form>

    <div class="O-S">
        <h3>ORDER SUMMERY</h3>
        <br>
        <br>
        <br>
        <br>
        <div class="line"></div>
        <br>
        <br>
        <br>
        <?php foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            $PPC = $values['item_HQ'] * $values['item_HQ1'];
        ?>

        <h3 class="D-F K"> <span> <?php echo $values['item_name'] ?> <i class="fa-solid fa-xmark"></i>
                <?php
                    echo  $PPC; ?></span>
            <span><?php
                        $Total = $PPC * $values['item_price'];
                        echo  $Total;

                        ?>$
            </span>
        </h3>

        <?php } ?>
        <!--<h4 class="D-F"> <span> PROMO CODE </span> <span>5%</span></h4>-->
        <br>
        <br>
        <br>
        <div class="line"></div>
        <br>
        <br>
        <h3 class="D-F">
            <span> Total COst </span>
            <span>
                <?php
                echo $payTotal . "$";
                ?>
            </span>
        </h3>
        <br>
        <br>
        <br>
        <button onclick="window.location = '../Store/'">
            Continue Shopping
        </button>
    </div>
</div>
<?php
include("../Inc/foot.inc.php");
include("../Inc/footer.inc.php");
?>