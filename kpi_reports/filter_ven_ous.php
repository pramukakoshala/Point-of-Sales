<?php
if (($_POST["ven_id"] != null) && ($_POST["ven_name"] == null)) {
    $have = false;
    $v_id = trim($_POST["ven_id"]);
    $tot = mysqli_fetch_row(mysqli_query($con, "SELECT MAX(id) FROM vendor_payment"))[0];
    while ($tot > 0) {
        $p_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM vendor_payment WHERE id=$tot"));
        if ($p_det != null) {
            if (trim($p_det["v_id"]) == $v_id) {
                $have = true;
                $ven_name = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM vendor WHERE v_id=$v_id"))["vendor_name"];
                ?>
                <tr>
                    <td># <?php echo $p_det["v_id"] ?></td>
                    <td><?php echo ucwords($ven_name) ?></td>
                    <td><?php echo $p_det["date"] ?></td>
                    <td><?php echo $p_det["id"] ?></td>
                    <td><?php echo $p_det["item_count"] ?></td>
                    <td style="text-align: right;"><?php echo dotInput($p_det["bill_amount"]) ?></td>
                    <td style="text-align: right;"><?php echo dotInput($p_det["paid_amount"]) ?></td>
                    <td style="text-align: right;"><?php echo dotInput(intval($p_det["bill_amount"]) - intval($p_det["paid_amount"])) ?></td>

                </tr>
                <?php
            }
        }
        $tot--;
    }
    ?>
    <script>
        document.getElementById('down').href = "../pdf_output/ven_ous.php?v_id=<?php echo $v_id; ?>";
        document.getElementById('down_li').style.display = "block";
    </script>
    <?php
}
if (($_POST["ven_id"] == null) && ($_POST["ven_name"] != null)) {
    $have = false;
    $v_name = trim(strtolower($_POST["ven_name"]));
    $tot = mysqli_fetch_row(mysqli_query($con, "SELECT MAX(id) FROM vendor_payment"))[0];
    while ($tot > 0) {
        $p_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM vendor_payment WHERE id=$tot"));
        if ($p_det != null) {
            $v_id = $p_det["v_id"];
            $ven_name = strtolower(trim(mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM vendor WHERE v_id=$v_id"))["vendor_name"]));
            if ($ven_name == $v_name) {
                $have = true;
                ?>
                <tr>
                    <td># <?php echo $p_det["v_id"] ?></td>
                    <td><?php echo ucwords($ven_name) ?></td>
                    <td><?php echo $p_det["date"] ?></td>
                    <td><?php echo $p_det["id"] ?></td>
                    <td><?php echo $p_det["item_count"] ?></td>
                    <td style="text-align: right;"><?php echo dotInput($p_det["bill_amount"]) ?></td>
                    <td style="text-align: right;"><?php echo dotInput($p_det["paid_amount"]) ?></td>
                    <td style="text-align: right;"><?php echo dotInput(intval($p_det["bill_amount"]) - intval($p_det["paid_amount"])) ?></td>

                </tr>
                <?php
            }
        }
        $tot--;
    }
    ?>
    <script>
        document.getElementById('down').href = "../pdf_output/ven_ous.php?name=<?php echo $v_name; ?>";
        document.getElementById('down_li').style.display = "block";
    </script>
    <?php
}
if (($_POST["ven_id"] != null) && ($_POST["ven_name"] != null)) {
    $have = false;
    $v_name = trim(strtolower($_POST["ven_name"]));
    $v_id = trim($_POST["ven_id"]);
    $tot = mysqli_fetch_row(mysqli_query($con, "SELECT MAX(id) FROM vendor_payment"))[0];
    while ($tot > 0) {
        $p_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM vendor_payment WHERE id=$tot"));
        if ($p_det != null) {
            $ven_name = strtolower(trim(mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM vendor WHERE v_id=$v_id"))["vendor_name"]));
            if (($ven_name == $v_name) && (trim($p_det["v_id"]) == $v_id)) {
                $have = true;
                ?>
                <tr>
                    <td># <?php echo $p_det["v_id"] ?></td>
                    <td><?php echo ucwords($ven_name) ?></td>
                    <td><?php echo $p_det["date"] ?></td>
                    <td><?php echo $p_det["id"] ?></td>
                    <td><?php echo $p_det["item_count"] ?></td>
                    <td style="text-align: right;"><?php echo dotInput($p_det["bill_amount"]) ?></td>
                    <td style="text-align: right;"><?php echo dotInput($p_det["paid_amount"]) ?></td>
                    <td style="text-align: right;"><?php echo dotInput(intval($p_det["bill_amount"]) - intval($p_det["paid_amount"])) ?></td>

                </tr>
                <?php
            }
        }
        $tot--;
    }
    ?>
    <script>
        document.getElementById('down').href = "../pdf_output/ven_ous.php?v_id=<?php echo $v_id; ?>";
        document.getElementById('down_li').style.display = "block";
    </script>
    <?php
}