<?php
include("../Inc/head.inc.php");
include("../Inc/nav.inc.php");
include("../Inc/phoneNav.php");
include("../Inc/DBH.php");
include("../Inc/SYS.php");
include("../Inc/Fav-SYS.php");
include("../Inc/DBH.php");

?>

<div class="main-wrapper">

    <div class="search-wrapper">
        <div class="search-position">
            <div class="search D-F">
                <div class="wrap D-F">
                    <div class="cat-drop D-F ">
                        <i class="fas fa-list-ul"></i>

                        <h3>Catagories</h3>

                        <i class="fas fa-chevron-down Cat-arrow" style="margin-right: 1vw;"></i>
                        <div class="C-content">
                            <ul>
                                <li onclick="window.location = '?Cat=UI'"> UI/UX Design </li>
                                <li onclick="window.location = '?Cat=Social'"> Social media design </li>
                                <li onclick="window.location = '?Cat=Banner'"> Banner design</li>
                                <li onclick="window.location = '?Cat=Logo'"> Logo design </li>
                                <li onclick="window.location = '?Cat=Video'"> Video</li>
                                <li onclick="window.location = '?Cat=Digital'"> Digital art</li>
                                <li onclick="window.location = '?Cat=App'"> App Template </li>
                                <li onclick="window.location = '?Cat=Website'"> Website Template </li>
                                <li onclick="window.location = '?Cat=Other'"> Other </li>
                            </ul>
                        </div>
                    </div>


                    <input id="search-in" type="search" placeholder="looking for Something....">
                    <div id="search-ico" class="ico D-F">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="ico D-F heart" onclick="window.location = '../Favorite/' ">
                        <i class="fas fa-heart"></i>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
    $(".C-content").hide();
    $("div.cat-drop")
        .mouseenter(function() {
            $(".C-content").show();
            $(".search .wrap").toggleClass("active");
            $(".Cat-arrow").removeClass("fa-chevron-down");
            $(".Cat-arrow").toggleClass("fa-chevron-up");

        })
        .mouseleave(function() {
            $(".C-content").hide();
            $(".search .wrap").removeClass("active");
            $(".Cat-arrow").removeClass("fa-chevron-up");
            $(".Cat-arrow").toggleClass("fa-chevron-down");
        });
    </script>

    <div class="content D-F">

        <!-- <div class="filter"></div> -->
        <div class="container-PRD">
            <div class="sort">
                <h1>Products</h1>
                <div class="sort-by-day D-F">
                    <ul class="D-F">
                        <li class=" <?php if (isset($_GET['Week']) || isset($_GET['Month']) || isset($_GET['Day'])) {
                                        echo "";
                                    } else {
                                        echo "active";
                                    } ?>" id="D00">ALL</li>
                        <li id="D0" class=" <?php if (isset($_GET['Day'])) {
                                                echo "active";
                                            } else {
                                                echo "";
                                            } ?>">Today</li>

                        <li id="D1" class=" <?php if (isset($_GET['Week'])) {
                                                echo "active";
                                            } else {
                                                echo "";
                                            } ?>">Last Week</li>


                        <li id="D2" class="<?php if (isset($_GET['Month'])) {
                                                echo "active";
                                            } else {
                                                echo "";
                                            } ?>">Last Month</li>

                    </ul>
                    <div class="G-F">
                        <i class="fas fa-bars"></i>
                        <i class="fas fa-th-large active"></i>
                    </div>
                </div>
            </div>

            <div id="results" class="content D-F MContent">

                <?php
                $sql = "SELECT * FROM `products` INNER JOIN `IMG` ON products.ID=IMG.ID";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {


                        $Category = array(
                            $row['CAT']
                        );

                        $today = date("Y-m-d");
                        if (isset($_GET['Week'])) {
                            if (!in_array($row['DateTD'], $arrayWeek)) {
                                $DN = "";
                            } else {
                                $DN = "display:none;";
                            }
                        }
                        if (isset($_GET['Month'])) {
                            if (!in_array($row['DateTD'], $arrayMonth)) {
                                $DN = "";
                            } else {
                                $DN = "display:none;";
                            }
                        }

                        if (isset($_GET['Day'])) {
                            if (!in_array($row['DateTD'], $todayArray)) {
                                $DN = "display:none";
                            } else {
                                $DN = "";
                            }
                        };
                        if (isset($_GET['Cat'])) {
                            if (!in_array($_GET["Cat"], $Category)) {
                                $DN = "display:none";
                            } else {
                                $DN = "";
                            };
                        };


                ?>



                <form class="PRD-Form" action="../Store/?action=add&id=22<?php echo $row["ID"]; ?>" method="POST">


                    <div id="results" class="PRD D-F" style="<?php echo $DN ?>">
                        <div class="fav">
                            <h4 class="Name">
                                <?php echo $row["PName"] . " | " . number_format((float)$row["Prise"], 2, '.', '');  ?>
                            </h4>
                            <h4 class="Tags"><?php echo $row["PTags"]; ?> </h4>
                            <h4 class="L-Desc">
                                <?php echo $row["PDescription"]; ?>
                            </h4>
                            <button type="submit" name="ADD-TO-Fav" aria-label="ADD-TO-FAV" class="D-F ADD-TO-FAV">
                                <input aria-label="ADD-TO-FAV" type="checkbox" name="ADD-FAV" class="ADD-FAV"
                                    <?php if (!isset($_SESSION["Fav"])) {
                                                                                                                            echo " ";
                                                                                                                        } else {
                                                                                                                            foreach ($_SESSION["Fav"] as $keys => $values) {
                                                                                                                                $PID = "22" . $row["ID"];
                                                                                                                                if ($values["item_id"] ===  $PID) {
                                                                                                                                    echo "CHECKED";
                                                                                                                                }
                                                                                                                            }
                                                                                                                        }  ?>>
                                <h4 class="Name">
                                    <?php echo $row["PName"] . " | " . number_format((float)$row["Prise"], 2, '.', '');  ?>
                                </h4>
                                <h4 class="Tags"><?php echo $row["PTags"]; ?> </h4>
                                <h4 class="L-Desc">
                                    <?php echo $row["PDescription"]; ?>
                                </h4>
                            </button>
                        </div>

                        <div class="img" style="cursor:pointer; background-image:url('<?php echo $row["IMG"] ?>');"
                            onclick="window.location = '../P-Details/?id=TD<?php echo $row['ID']; ?>' ">

                            <h4 class="Name">
                                <?php echo $row["PName"] . " | " . number_format((float)$row["Prise"], 2, '.', '');  ?>
                            </h4>
                            <h4 class="Tags"><?php echo $row["PTags"]; ?> </h4>
                            <h4 class="L-Desc">
                                <?php echo $row["PDescription"]; ?>
                            </h4>
                        </div>

                        <?php
                                for ($i = 0; $i < 999; $i++) {
                                    echo "<div>";
                                }
                                ?>
                        <input type="hidden" value="<?php echo $row["Prise"]; ?>" name="HPrice">
                        <input type="hidden" value="<?php echo $row["Prise"]; ?>" name="HPrice">
                        <input type="hidden" value="<?php echo $row["IMG"]; ?>" name="HIMG">
                        <input type="hidden" value="<?php echo $row["PName"]; ?>" name="HName">
                        <input type="hidden" value="TD-22<?php echo $row["ID"]; ?>" name="Hid">
                        <input type="hidden" value="<?php echo $row["ID"]; ?>" name="RealID">
                        <?php
                                for ($i = 0; $i < 999; $i++) {
                                    echo "</div>";
                                }
                                ?>



                        <div class="text">
                            <p style="position: absolute; z-index:-10; color:transparent !important; opacity:0;">
                                <?php echo $today0; ?></p>
                            <h4 class="Name">
                                <?php echo $row["PName"] . " | " . number_format((float)$row["Prise"], 2, '.', '') . "$";  ?>
                            </h4>
                            <h4 class="Tags"><?php echo $row["PTags"];  ?> </h4>
                            <h4 class="L-Desc">
                                <?php echo $row["PDescription"]; ?>
                            </h4>
                            <div class="D-F lineW">

                                <input type="number" name="HQ" id="Q" min="1" max="5" value="1">
                                <input type="hidden" name="HQ1" id="Q" value="1">
                                <a title="<?php if (isset($_SESSION["shopping_cart"])) {
                                                        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                                                            if (in_array($row["ID"], $values)) {
                                                                echo "Already Added";
                                                            }
                                                        }
                                                    }  ?>">
                                    <button type="submit" class="D-F Add-to-cart" name="add-to-cart" <?php if (isset($_SESSION["shopping_cart"])) {
                                                                                                                    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                                                                                                                        if (in_array($row["ID"], $values)) {
                                                                                                                            echo "style='cursor: not-allowed; background:gray;'disabled";
                                                                                                                        }
                                                                                                                    }
                                                                                                                }  ?>>
                                        <span> ADD TO CART</span>
                                        <i class="fa-solid fa-cart-shopping" <?php if (isset($_SESSION["shopping_cart"])) {
                                                                                            foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                                                                                                if (in_array($row["ID"], $values)) {
                                                                                                    echo "style='color:gray;'";
                                                                                                }
                                                                                            }
                                                                                        }  ?>></i>
                                    </button>
                                </a>
                                <button type="submit" name="ADD-TO-Fav">
                                    <a title="<?php if (isset($_SESSION["Fav"])) {
                                                            foreach ($_SESSION["Fav"] as $keys => $values) {
                                                                if (in_array($row["ID"], $values)) {
                                                                    echo "Already Added";
                                                                }
                                                            }
                                                        }  ?>">
                                        <i class="fa-solid fa-heart" <?php if (isset($_SESSION["Fav"])) {
                                                                                    foreach ($_SESSION["Fav"] as $keys => $values) {
                                                                                        if (in_array($row["ID"], $values)) {
                                                                                            echo "style='cursor: not-allowed; color:gray;'";
                                                                                        }
                                                                                    }
                                                                                }  ?>></i>
                                </button>
                                </a>

                                <div class="hide" style="display: none !important; position:absolute;opacity:0; ">
                                    <h4 class="Name">
                                        <?php echo $row["PName"] . " | " . number_format((float)$row["Prise"], 2, '.', '');  ?>
                                    </h4>
                                    <h4 class="Tags"><?php echo $row["PTags"]; ?> </h4>
                                    <h4 class="L-Desc">
                                        <?php echo $row["PDescription"]; ?>
                                    </h4>
                                </div>
                            </div>
                            <h4 class="MDT"
                                onclick="window.location = '../P-Details/index.php?id=TD<?php echo $row['ID']; ?>' ">
                                More Details </h4>

                        </div>
                    </div>
                    <p style="position: absolute; z-index:-10; color:transparent !important; opacity:0;">
                        <?php echo $today0; ?></p>

                </form>

                <?php

                    }
                }
                #}
                #}; 
                ?>
                <div id="nodata" style="display: none;">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    Nothing found
                </div>

            </div>
        </div>
        <div class="AD-AREA"></div>
    </div>
    <script>
    $('.ADD-FAV').click(function() {
        $(this).parent().trigger("click");
    });
    </script>

    <?php
    echo $ND;
    include("../Inc/foot.inc.php");
    include("../Inc/footer.inc.php");
    ?>
</div>

<script>
$('.ADD-FAV').click(function() {
    $(this).parent().trigger("click");
});
</script>