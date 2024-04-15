<?php
include("../Inc/head.inc.php");
include("../Inc/nav.inc.php");
include("../Inc/phoneNav.php");
include("../Inc/DBH.php");
?>

<style>
.wrap {
    min-height: 100vh;
}

.wrap * {
    text-transform: capitalize;
}

table {
    border-collapse: collapse;
    width: 100%;
    color: #1b2d3c;
    font-family: "Josefin Sans", sans-serif;
    font-size: 25px;
    text-align: left;
}

th {
    background-color: var(--F-C-);
    color: white;
    padding: 20px;
    padding-left: 0;
    border-left: 1px solid #FFF;
    text-align: center;
}

td {
    padding: 10px;
    border-left: 1px solid #1b2d3c;
    max-width: 200px;
    height: auto;
    text-align: center;
    font-weight: bold;
    max-height: 6em;
    vertical-align: middle;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}
</style>
<div class="wrap">

    <h1 style="text-align: center;">order details</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Order type</th>
            <th>Email</th>
            <th>Budget</th>
            <th>Details </th>
        </tr>

        <?php
        $sql = "SELECT * FROM `OD`";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
        <tr>

            <td><?php echo $row["ID"] ?></td>
            <td><?php echo $row["types"] ?></td>
            <td><?php echo $row["Email"] ?></td>
            <td><?php echo $row["Budget"] ?></td>
            <td id="details">

                <details>
                    <summary> <i class="fas fa-arrow-down"></i> Show Details</summary><?php echo $row["Details"] ?>
                </details>
            </td>
        </tr>
        <?php }
        }; ?>

    </table>
    <h1 style="text-align: center;">New Product added by</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Desinger name</th>
            <th>product name </th>
            <th>Deringer level</th>
            <th>date </th>
        </tr>

        <?php
        $sql = "SELECT * FROM `Desinger`";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $row["ID"] ?></td>
            <td><?php echo $row["DName"] ?></td>
            <td><?php echo $row["PName"] ?></td>
            <td><?php echo $row["DLevel"] ?></td>
            <td><?php echo $row["date"] ?></td>
        </tr>
        <?php }
        }; ?>

    </table>
    <h1 style="text-align: center;">Order details</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>client</th>
            <th>Email </th>
            <th>Country</th>
            <th>PRD Name </th>
            <th>PRD Price </th>
            <th>PRD ID </th>
        </tr>

        <?php
        $sql = "SELECT * FROM `Orders`";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $Pid = $row["PID"];
        ?>
        <tr>
            <td><?php echo $row["ID"] ?></td>
            <td><?php echo $row["FSname"] ?></td>
            <td><?php echo $row["Email"] ?></td>
            <td><?php echo $row["Country"] ?></td>
            <td><?php echo $row["Pname"] ?></td>
            <td><?php echo $row["Price"] ?>$</td>
            <td><?php echo $row["PID"] ?></td>
        </tr>
        <?php }
        }; ?>

    </table>



</div>
<?php
include("../Inc/foot.inc.php");
include("../Inc/footer.inc.php");
?>