<?php
if (isset($_POST['ADD-TO-Fav'])) {

    if (isset($_SESSION["Fav"])) {
        $item_array_id = array_column($_SESSION["Fav"], "item_id");
        if (!in_array($_GET["id"], $item_array_id)) {
            $count = count($_SESSION["Fav"]);
            $item_array = array(
                'item_id' => $_GET["id"],
                'item_name' => $_POST["HName"],
                'item_price' => $_POST["HPrice"],
                'item_img' => $_POST["HIMG"],
                'item_HQ' => $_POST["HQ"],
                'item_ID' => $_POST["Hid"],
                'item_MID' => $_POST["RealID"]
            );

            $_SESSION["Fav"][$count] = $item_array;
            echo '<script>
window.location = "../Favorite"
</script>';
        } else {
            echo '<script>
window.location = "../Favorite"
</script>';
        }
    } else {
        $item_array = array(
            'item_id' => $_GET["id"],
            'item_name' => $_POST["HName"],
            'item_price' => $_POST["HPrice"],
            'item_img' => $_POST["HIMG"],
            'item_HQ' => $_POST["HQ"],
            'item_ID' => $_POST["Hid"],
            'item_MID' => $_POST["Mid"]
        );
        $_SESSION["Fav"][0] = $item_array;
    }
}
if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["Fav"] as $keys => $values) {
            if ($values["item_id"] == $_GET["id"]) {
                unset($_SESSION["Fav"][$keys]);
                echo 'item removed';
                echo '<script>
window.location = "../Favorite"
</script>';
            }
        }
    }
} else {
    echo '
    <div class="notHere" style="display:none;">
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
    <div class="empty D-F">
<i class="fa-solid fa-circle-exclamation"></i>
<h1>Nothing Here</h1>
</div>
</div>
';
}