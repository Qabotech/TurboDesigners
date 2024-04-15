<?php
include("../Inc/head.inc.php");
include("../Inc/nav.inc.php");
include("../Inc/phoneNav.php");
include("../Inc/DBH.php");
include("../Inc/SYS.php");
include("../Inc/Fav-SYS.php");
?>
<style>

</style>
<div class="Content">
    <?php
    $sql = "SELECT * FROM `products` INNER JOIN `IMG` ON products.ID=IMG.ID";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $ID = "TD" . $row["ID"]
                ?>

            <form class="PRD-Form" action="?action=add&id=22<?php echo $row["ID"]; ?>" method="POST">

                <input type="hidden" value="<?php echo $row["IMG"]; ?>" name="HIMG">

                <div class="main" style="<?php if ($ID == $_GET["id"]) {
                    echo "display:flex !important;";
                } else {
                    echo "display:none !important;";
                } ?>">


                    <div class="D-F" style="align-items: flex-start;">
                        <div class="img D-F" style="position: relative;margin-top: -1.5em;">
                            <div class="P PPName D-F">
                                <h1 class="P">
                                    <?php echo $row["PName"]; ?>
                                </h1>
                                <div class="P select">
                                    <i class=" fa-solid fa-chevron-down"></i>
                                    <h4 class="QTY" style="text-align: left !important;">QTY</h4>
                                    <select class="Q" name="HQ1" id="Q" style="text-align: left !important;">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="ACont">
                                <div class="P Chevron D-F">
                                    <i class="P fa-solid fa-chevron-left"></i>
                                    <i class="P fa-solid fa-chevron-right"></i>
                                </div>
                                <div class="C-img D-F S-img S-img0 ">
                                    <img class="BG" src="<?php echo $row["IMG"]; ?>"
                                        alt="<?php echo "Turbo+Designers " . $row["PName"] ?>">
                                </div>
                                <div class="R-img D-F S-img S-img1 ">
                                    <img class="BG" src="<?php echo $row["IMG1"]; ?>"
                                        alt="<?php echo "Turbo+Designers " . $row["PName"] ?>">
                                </div>
                                <div class="P-img D-F S-img S-img2 " style="display: flex;">
                                    <img class="BG" src="<?php echo $row["IMG2"]; ?>"
                                        alt="<?php echo "Turbo+Designers " . $row["PName"] ?>">
                                </div>
                            </div>

                            <div class="IMG-NAV D-F">
                                <div class="C-img D-F">
                                    <img class="BG" src="<?php echo $row["IMG"]; ?>"
                                        alt="<?php echo "Turbo+Designers " . $row["PName"] ?>">
                                </div>
                                <div class="R-img D-F">
                                    <img class="BG" src="<?php echo $row["IMG1"]; ?>"
                                        alt="<?php echo "Turbo+Designers " . $row["PName"] ?>">
                                </div>
                                <div class="P-img D-F">
                                    <img class="BG" src="<?php echo $row["IMG2"]; ?>"
                                        alt="<?php echo "Turbo+Designers " . $row["PName"] ?>">
                                </div>
                            </div>
                        </div>
                        <?php
                        for ($i = 0; $i < 9999; $i++) {
                            echo "<div>";
                        }
                        ?>
                        <input type="hidden" value="<?php echo $row["Prise"]; ?>" name="HPrice">
                        <input type="hidden" value="<?php echo $row["PName"]; ?>" name="HName">
                        <input type="hidden" value="TD-22<?php echo $row["ID"]; ?>" name="Hid">
                        <input type="hidden" value="<?php echo $row["ID"]; ?>" name="RealID">
                        <?php
                        for ($i = 0; $i < 9999; $i++) {
                            echo "</div>";
                        }
                        ?>


                        <div class="text D-F" style="align-items:flex-start; justify-content: flex-start;">
                            <h1 class="PC">
                                <?php echo $row["PName"] ?>
                            </h1>
                            <h2 class="PC"><sup>$</sup>
                                <?php echo number_format((float) $row["Prise"], 2, '.', ''); ?>
                            </h2>
                            <p>
                                <?php echo $row["PDescription"]; ?>
                            </p>
                            <div class="D-F BWrap" style="gap:3vw;">

                                <a title="<?php if (isset($_SESSION["shopping_cart"])) {
                                    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                                        if (in_array($row["ID"], $values)) {
                                            echo "Already Added";
                                        }
                                    }
                                } ?>">
                                    <button type="submit" class="LC ATC D-F" name="add-to-cart" <?php if (isset($_SESSION["shopping_cart"])) {
                                        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                                            if (in_array($row["ID"], $values)) {
                                                echo "style='cursor: not-allowed; background:gray ;'disabled";
                                            }
                                        }
                                    } ?>>
                                        <span> ADD TO CART</span>
                                        <i class="fa-solid fa-cart-plus" <?php if (isset($_SESSION["shopping_cart"])) {
                                            foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                                                if (in_array($row["ID"], $values)) {
                                                    echo "style='cursor: not-allowed; color:gray !important;' disabled";
                                                }
                                            }
                                        } ?>></i>
                                    </button>
                                </a>
                                <button type="submit" name="ADD-TO-Fav" class=" D-F ADD-TO-FAV" <?php if (isset($_SESSION["Fav"])) {
                                    foreach ($_SESSION["Fav"] as $keys => $values) {
                                        if (in_array($row["ID"], $values)) {
                                            echo "style='cursor: not-allowed background:gray ;' disabled";
                                        }
                                    }
                                } ?>>
                                    <a title="<?php if (isset($_SESSION["Fav"])) {
                                        foreach ($_SESSION["Fav"] as $keys => $values) {
                                            if (in_array($row["ID"], $values)) {
                                                echo "Already Added";
                                            }
                                        }
                                    } ?>">
                                        <i class="fa-solid fa-heart" <?php if (isset($_SESSION["Fav"])) {
                                            foreach ($_SESSION["Fav"] as $keys => $values) {
                                                if (in_array($row["ID"], $values)) {
                                                    echo "style='cursor: not-allowed; color:gray !important;' disabled";
                                                }
                                            }
                                        } ?>></i>
                                    </a>
                                </button>
                                <div class="PC select">
                                    <i class=" fa-solid fa-chevron-down"></i>
                                    <h4>QTY</h4>
                                    <select name="HQ" id="Q" class="Q">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <h2 class="P Price "><sup> $ </sup>
                                    <?php echo number_format((float) $row["Prise"], 2, '.', ''); ?>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <?php

        }
    }
    ;
    ?>
    <div class="ADarea D-F">
        Ad Area
    </div>

    <div class="D-F Comment-MW">
        <div class="D-F Form-C">
            <form action="../Inc/Comment.php" method="post" id="C-Form">
                <textarea type="text" name="Comment" id="Comment" placeholder="Tell us your Opinion Max. 500 Characters"
                    oninput="countWord();"></textarea>
                <input type="hidden" name="Cid" value="<?php echo $_GET['id'] ?>">
                <input type="hidden" name="CUName" value="<?php echo $_SESSION["FSname"] ?>">
                <div class="D-F" style="gap:3px; justify-content:flex-end;">
                    <div class="wrapper">
                        <input type="checkbox" id="st5" name="st" value="5" />
                        <label for="st5"></label>
                        <input type="checkbox" id="st4" name="st" value="4" />
                        <label for="st4"></label>
                        <input type="checkbox" id="st3" name="st" value="3" />
                        <label for="st3"></label>
                        <input type="checkbox" id="st2" name="st" value="2" />
                        <label for="st2"></label>
                        <input type="checkbox" id="st1" name="st" value="1" />
                        <label for="st1"></label>
                    </div>
                    <p style="color:var(--GR-C-);">Characters Left </p>
                    <p id="charNum"> 500 </p>

                </div>
                <button type="submit" id="CSubmit" style="margin-top: 5px;">
                    Comment
                </button>
                <br>
                <br>
            </form>
        </div>

        <div class="Comments-W D-F slideshow-container">

            <?php
            $sql = "SELECT * FROM `Comments`";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $CID = $row["Cid"];
                    $CcID = $_GET["id"];
                    ?>
                    <div class="C-box mySlides slide-in-left Review <?php
                    if ($row["Cid"] == $_GET["id"]) {
                        echo "show";
                    } else {
                        echo "hide";
                    }
                    ?>" style="
                                                    <?php
                                                    if ($row["Cid"] == $_GET["id"]) {
                                                        echo "display: block;";
                                                    } else {
                                                        echo "display: none;";
                                                    }
                                                    ?>
                    ">
                        <h1> <i class="fa-solid fa-user"></i>
                            <?php echo htmlspecialchars($row["CUName"]); ?>
                        </h1>
                        <p>
                            <?php echo htmlspecialchars($row["Comments"]); ?>
                        </p>

                        <p>
                        <div class="wrapper" style="-webkit-user-select: none; pointer-events:none; ">
                            <input type="checkbox" id="st1" <?php
                            if ($row["rating"] == 5) {
                                echo "checked";
                            }
                            ?> />
                            <label for="st1"></label>
                            <input type="checkbox" id="st2" <?php
                            if ($row["rating"] == 4) {
                                echo "checked";
                            }
                            ?> />
                            <label for="st2"></label>
                            <input type="checkbox" id="st3" <?php
                            if ($row["rating"] == 3) {
                                echo "checked";
                            }
                            ?> />
                            <label for="st3"></label>
                            <input type="checkbox" id="st4" <?php
                            if ($row["rating"] == 2) {
                                echo "checked";
                            }
                            ?> />
                            <label for="st4"></label>
                            <input type="checkbox" id="st5" <?php
                            if ($row["rating"] == 1) {
                                echo "checked";
                            }
                            ?> />
                            <label for="st5"></label>
                        </div>
                        </p>
                    </div>
                    <?php
                }
            }
            ?>
            <button class="P next" onclick="plusSlides(1);SetHeight();">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
            <button class="PC next" style="position: relative !important;" onclick="plusSlides(1);SetHeight();"><i
                    class="fa-solid fa-chevron-right"></i>
            </button>

        </div>
    </div>
</div>

<?php

include("../Inc/footer.inc.php");
include("../Inc/foot.inc.php");
?>