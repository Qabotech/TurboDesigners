<?php
include("../Inc/head.inc.php");
include("../Inc/nav.inc.php");
include("../Inc/phoneNav.php");
include("../Inc/DBH.php");
?>

<style>
.wrap {
    min-height: 80vh;
    display: flex;
    flex-direction: column;
    gap: 3em;
    padding: 7em 0;
}

.wrap .D-F {
    font-weight: 500;
    text-transform: uppercase;
    font-family: 'Roboto', sans-serif !important;
    gap: 3em;
    justify-content: left;
}

.SH {
    background: none;
}

.Card {
    width: auto;
    min-width: 50vw;
    height: auto;
    background: var(--F-C-);
    padding: 3em;
    border-radius: 3em;
    display: flex;
    gap: 3em;
    flex-direction: column;
}

.Card>* {
    font-size: 1.5em;
}

li,
.S,
.H,
#year {
    color: var(--M-C-);
}

.S,
.H {
    text-transform: capitalize;
}

b {
    color: var(--W-C-);
    margin-right: auto;
}

.Card li {
    min-height: 3em;
    width: auto;
}

.Card ul:nth-child(1) li {
    color: var(--W-C-);

}


.User {
    color: var(--M-C-);
    gap: 1em;
    display: flex;
    align-items: center;
    justify-content: center;
}

.User>li {
    color: var(--M-C-);
    display: flex;
    align-items: center;
    justify-content: center;
}

.User i {
    color: var(--M-C-) !important;
    padding: 1em;
    background: var(--W-C-);
    border-radius: 50%;
}

@media only screen and (max-width: 960px) {
    .Card {
        width: 90vw;
        justify-content: unset !important;
        align-items: unset !important;
    }

    .Card * {
        text-align: left !important;
    }
}

@media only screen and (max-width: 550px) {
    .Card {
        width: 90vw;
    }

    .Card * {
        text-align: left !important;
    }

    .wrap .D-F {
        gap: 0.3em;
    }

    .Card li {
        font-size: 0.8em;
    }
}

@media only screen and (max-width: 375px) {
    .Card {
        width: 90vw;
    }

    .Card * {
        text-align: left !important;
    }

    .wrap .D-F {
        gap: 0.3em;
    }

    .Card li {
        font-size: 0.7em;
    }
}

@media only screen and (max-width: 350px) {
    .Card {
        width: 90vw;
    }

    .Card * {
        text-align: left !important;
    }

    .wrap .D-F {
        gap: 0.5em;
    }

    .Card li {
        font-size: 0.6em;
    }

    .Card {
        padding: 1.5em;
    }
}
</style>

<div class="wrap D-F">
    <div class="D-F">
        <h1>User Profile</h1>
    </div>
    <div class="Card">
        <div class="User"><i class="fa-solid fa-user"></i>
            <li id="username">
                <?php echo $_SESSION["FSname"]; ?>
            </li>
        </div>
        <div class="D-F">
            <ul>
                <li>Country:</li>
                <li>Phone:</li>
                <li>ID:</li>
                <li>Email:</li>
                <li>Password:</li>
            </ul>
            <ul>
                <li><?php echo $_SESSION["Country"]; ?></li>
                <li><?php echo $_SESSION["Phone"]; ?></li>
                <li> U<span id="year"></span><?php echo $_SESSION["ID"]; ?></li>
                <li style="text-transform: lowercase;"><?php echo $_SESSION["Email"]; ?></li>
                <li>
                    <span>
                        <span class="S"><?php echo  $_COOKIE['pass']; ?></span>
                        <span class="H"><?php
                                        for ($x = 0; $x <= strlen($_COOKIE['pass']) - 1; $x++) {
                                            echo  "*";
                                        } ?>
                        </span>

                        <button class="SH"> <span class="S">hide Password</span> <span class="H">show
                                Password</span></button>
                    </span>
                </li>
            </ul>
        </div>

        <table style="display: none;">
            <tr>
                <th>ID</th>
            </tr>
            <tr>
                <td>U<span id="year"></span><?php echo $_SESSION["ID"]; ?></td>
            </tr>
            <tr>
                <th>Name</th>
            </tr>
            <tr>
                <td><?php echo $_SESSION["FSname"]; ?></td>
            </tr>
            <tr>
                <th>Email</th>
            </tr>
            <tr>
                <td><?php echo $_SESSION["Email"]; ?></td>
            </tr>
            <tr>
                <th>Phone</th>
            </tr>
            <tr>
                <td><?php echo $_SESSION["Phone"]; ?></td>
            </tr>
            <tr>
                <th>Country</th>
            </tr>
            <tr>
                <td><?php echo $_SESSION["Country"]; ?></td>
            </tr>
            <tr>
                <th>Password</th>
            </tr>
            <tr>
                <td class="D-F" style=" flex-direction:column;">
                    <span class="S"><?php echo  $_COOKIE['pass']; ?></span>
                    <span class="H"><?php
                                    for ($x = 0; $x <= strlen($_COOKIE['pass']) - 1; $x++) {
                                        echo  "*";
                                    } ?>
                    </span>

                    <button class="SH"> <span class="S">hide Password</span> <span class="H">show
                            Password</span></button>
                </td>
            </tr>
        </table>
    </div>
</div>
<script>
$(".S").hide();

$(".S").click(function() {
    $(".S").hide();
    $(".H").show();
})
$(".H").click(function() {
    $(".H").hide();
    $(".S").show();
})
</script>


<script>
var Xmas = new Date('May 29, 2022 11:54:00');
var year = Xmas.getYear();

$('#year').text(year - 100);
</script>


<?php
include("../Inc/foot.inc.php");
include("../Inc/footer.inc.php");
?>