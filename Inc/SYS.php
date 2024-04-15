<?php
if (isset($_POST['add-to-cart'])) {
echo "<script>reload();</script>";
    if (isset($_SESSION["shopping_cart"])) {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if (!in_array($_GET["id"], $item_array_id)) {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id' => $_GET["id"],
                'item_name' => $_POST["HName"],
                'item_price' => $_POST["HPrice"],
                'item_img' => $_POST["HIMG"],
                'item_HQ' => $_POST["HQ"],
                'item_HQ1' => $_POST["HQ1"],
                'item_SHQ' => $_POST["SHQ"],
                'item_ID' => $_POST["Hid"],
                'item_MID' => $_POST["RealID"]
            );

            $_SESSION["shopping_cart"][$count] = $item_array;
            echo '<script>window.location = "../Shopping-cart/"</script>';
        } else {
            echo '<script>window.location = "../Shopping-cart/"</script>';
        }
    } else {
        $item_array = array(
            'item_id' => $_GET["id"],
            'item_name' => $_POST["HName"],
            'item_price' => $_POST["HPrice"],
            'item_img' => $_POST["HIMG"],
            'item_HQ' => $_POST["HQ"],
            'item_HQ1' => $_POST["HQ1"],
            'item_SHQ' => $_POST["SHQ"],
            'item_ID' => $_POST["Hid"],
            'item_MID' => $_POST["Mid"]
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}

if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            if ($values["item_id"] == $_GET["id"]) {
                unset($_SESSION["shopping_cart"][$keys]);
                echo 'item removed';
                echo '<script>window.location = "../Shopping-cart/"</script>';
            }
        }
    }
}




$arrayWeek = [];
$startdate = "today";
if (date('N') !== '1') {
    $startdate .= " last week";
}
$day = strtotime($startdate);
$sunday = array(
    strtotime('next Friday', $day) - 1,
    strtotime('next Thursday', $day) - 1,
    strtotime('next Wednesday', $day) - 1,
    strtotime('next Tuesday', $day) - 1,
    strtotime('next Monday', $day) - 1,
    strtotime('next Sunday', $day) - 1,
    strtotime('next Saturday', $day) - 1
);
for ($i = 0; $i < 7; $i++) {
    $arrayWeek[$i] = date('Y-m-d', $sunday[$i]);
}
for ($i = 0; $i < 31; $i++) {
    $MM = '0' . date('m') - 01;
    $arrayMonth[$i] = date('Y-' . $MM . '-' . $i);
}



$todayArray = array(
    date("Y-m-d")
);