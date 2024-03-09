<?php
$total = $paid_amount = $balance = 0;
if (($_GET["rec_no"] == null) && ($_GET["cus_id"] != null) && ($_GET["cus_name"] == null) && ($_GET["cdate"] == null)) {
    $cus_id = trim($_GET["cus_id"]);
    $cus_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM customer WHERE c_id=$cus_id"));
    if ($cus_det != null) {
        $tot_trans = mysqli_fetch_row(mysqli_query($con, "SELECT MAX(t_id) FROM $table"))[0];
        while ($tot_trans > 0) {
            $trans_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM $table WHERE t_id=$tot_trans AND `dep_id`=\"$dep_id\""));
            if ($trans_det != null) {
                $c_id = $trans_det["c_id"];
                if ($c_id == $cus_id) {
                    ?>
                    <tr>
                        <td># <?= $trans_det['t_id']; ?></td>
                        <td><?php echo $trans_det['transaction_date']; ?></td>
                        <td><a href="view_invoice.php?invoice=<?php echo $trans_det['invoice']; ?>" target="_blank"><?php echo $trans_det['invoice']; ?></a></td>
                        <td><?php echo $cus_det['customer_name']; ?></td>
                        <td style="text-align: right;"><?php echo floatval($trans_det['sub_total']); ?></td>
                        <td style="text-align: right;"><?php echo floatval($trans_det['discount']); ?></td>
                        <td style="text-align: right;"><?php echo floatval($trans_det['total']); ?></td>
                        <td style="text-align: right;"><?php echo floatval($trans_det['paid_amount']); ?></td>
                        <td style="text-align: right;"><?php echo floatval($trans_det['balance']); ?></td>
                        <td>
                            <a class="btn-small btn-warning" style="color: #fff;" onclick="openNewBackgroundTab(<?php echo $trans_det['t_id']; ?>)"  target="_blank">Print</a>
                            <a class="btn-small btn-success" style="color: #fff;" href="view_print.php?id=<?php echo $trans_det['t_id']; ?>" target="_blank">View</a>
                        </td>
                    </tr>
                    <?php
                }
            }
            $tot_trans--;
        }
    }
    ?>
    <script>
        document.getElementById('down').href = "../pdf_output/transaction.php?c_id=<?php echo $cus_id; ?>&trans=<?=$secret?>";
        document.getElementById('down_li').style.display = "block";
    </script>
    <?php
} else if (($_GET["rec_no"] == null) && ($_GET["cus_id"] == null) && ($_GET["cus_name"] != null) && ($_GET["cdate"] == null)) {
    $cus_name = trim(strtolower($_GET["cus_name"]));
    $tot_cus = mysqli_fetch_row(mysqli_query($con, "SELECT MAX(c_id) FROM customer"))[0];
    while ($tot_cus > 0) {
        $cus_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM customer WHERE c_id=$tot_cus"));
        if ($cus_det != null) {
            if (trim(strtolower($cus_det["customer_name"])) == $cus_name) {
                $cus_id = trim($cus_det["c_id"]);
                $tot_trans = mysqli_fetch_row(mysqli_query($con, "SELECT MAX(t_id) FROM $table"))[0];
                while ($tot_trans > 0) {
                    $trans_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM $table WHERE t_id=$tot_trans AND `dep_id`=\"$dep_id\""));
                    if ($trans_det != null) {
                        $c_id = $trans_det["c_id"];
                        if ($c_id == $cus_id) {
                            ?>
                            <tr>
                                <td># <?= $trans_det['t_id']; ?></td>
                                <td><?php echo $trans_det['transaction_date']; ?></td>
                                <td><a href="view_invoice.php?invoice=<?php echo $trans_det['invoice']; ?>" target="_blank"><?php echo $trans_det['invoice']; ?></a></td>
                                <td><?php echo $cus_det['customer_name']; ?></td>
                                <td style="text-align: right;"><?php echo floatval($trans_det['sub_total']); ?></td>
                                <td style="text-align: right;"><?php echo floatval($trans_det['discount']); ?></td>
                                <td style="text-align: right;"><?php echo floatval($trans_det['total']); ?></td>
                                <td style="text-align: right;"><?php echo floatval($trans_det['paid_amount']); ?></td>
                                <td style="text-align: right;"><?php echo floatval($trans_det['balance']); ?></td>
                                <td>
                                    <a class="btn-small btn-warning" style="color: #fff;" onclick="openNewBackgroundTab(<?php echo $trans_det['t_id']; ?>)"  target="_blank">Print</a>
                                    <a class="btn-small btn-success" style="color: #fff;" href="view_print.php?id=<?php echo $trans_det['t_id']; ?>" target="_blank">View</a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    $tot_trans--;
                }
            }
        }
        $tot_cus--;
    }
    ?>
    <script>
        document.getElementById('down').href = "../pdf_output/transaction.php?name=<?php echo $_GET["cus_name"]; ?>&trans=<?=$secret?>";
        document.getElementById('down_li').style.display = "block";
    </script>
    <?php
} else if (($_GET["rec_no"] == null) && ($_GET["cus_id"] != null) && ($_GET["cus_name"] != null) && ($_GET["cdate"] == null)) {
    $cus_id = trim($_GET["cus_id"]);
    $cus_name = trim(strtolower($_GET["cus_name"]));
    $tot_cus = mysqli_fetch_row(mysqli_query($con, "SELECT MAX(c_id) FROM customer"))[0];
    while ($tot_cus > 0) {
        $cus_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM customer WHERE c_id=$tot_cus"));
        if ($cus_det != null) {
            if ((trim(strtolower($cus_det["customer_name"])) == $cus_name) && (trim($cus_det["c_id"]) == $cus_id)) {
                $cus_id = trim($cus_det["c_id"]);
                $tot_trans = mysqli_fetch_row(mysqli_query($con, "SELECT MAX(t_id) FROM $table"))[0];
                while ($tot_trans > 0) {
                    $trans_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM $table WHERE t_id=$tot_trans AND `dep_id`=\"$dep_id\""));
                    if ($trans_det != null) {
                        $c_id = $trans_det["c_id"];
                        if ($c_id == $cus_id) {
                            ?>
                            <tr>
                                <td># <?= $trans_det['t_id']; ?></td>
                                <td><?php echo $trans_det['transaction_date']; ?></td>
                                <td><a href="view_invoice.php?invoice=<?php echo $trans_det['invoice']; ?>" target="_blank"><?php echo $trans_det['invoice']; ?></a></td>
                                <td><?php echo $cus_det['customer_name']; ?></td>
                                <td style="text-align: right;"><?php echo floatval($trans_det['sub_total']); ?></td>
                                <td style="text-align: right;"><?php echo floatval($trans_det['discount']); ?></td>
                                <td style="text-align: right;"><?php echo floatval($trans_det['total']); ?></td>
                                <td style="text-align: right;"><?php echo floatval($trans_det['paid_amount']); ?></td>
                                <td style="text-align: right;"><?php echo floatval($trans_det['balance']); ?></td>
                                <td>
                                    <a class="btn-small btn-warning" style="color: #fff;" onclick="openNewBackgroundTab(<?php echo $trans_det['t_id']; ?>)"  target="_blank">Print</a>
                                    <a class="btn-small btn-success" style="color: #fff;" href="view_print.php?id=<?php echo $trans_det['t_id']; ?>" target="_blank">View</a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    $tot_trans--;
                }
            }
        }
        $tot_cus--;
    }
    ?>
    <script>
        document.getElementById('down').href = "../pdf_output/transaction.php?c_id=<?php echo $cus_id; ?>&trans=<?=$secret?>";
        document.getElementById('down_li').style.display = "block";
    </script>
    <?php
} else if (($_GET["rec_no"] == null) && ($_GET["cus_id"] == null) && ($_GET["cus_name"] == null) && ($_GET["cdate"] != null)) {
    $trans_date = $_GET["cdate"];
    $tot_trans = mysqli_fetch_row(mysqli_query($con, "SELECT MAX(t_id) FROM $table"))[0];
    while ($tot_trans > 0) {
        $t_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM $table WHERE t_id=$tot_trans AND `dep_id`=\"$dep_id\""));
        if ($t_det != null) {
            $d = mysqli_fetch_row(mysqli_query($con, "SELECT CAST(transaction_date AS DATE) FROM $table WHERE t_id=$tot_trans"))[0];
            if ((trim($d) == $trans_date)) {
                $cus_id = trim($t_det["c_id"]);
                $cus_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM customer WHERE c_id=$cus_id"));
                $cus_name = $cus_det["customer_name"];
                ?>
                <tr>
                    <td># <?= $t_det['t_id']; ?></td>
                    <td><?php echo $t_det['transaction_date']; ?></td>
                    <td><a href="view_invoice.php?invoice=<?php echo $t_det['invoice']; ?>" target="_blank"><?php echo $t_det['invoice']; ?></a></td>
                    <td><?php echo $cus_name; ?></td>
                    <td style="text-align: right;"><?php echo floatval($t_det['sub_total']); ?></td>
                    <td style="text-align: right;"><?php echo floatval($t_det['discount']); ?></td>
                    <td style="text-align: right;"><?php echo floatval($t_det['total']); ?></td>
                    <td style="text-align: right;"><?php echo floatval($t_det['paid_amount']); ?></td>
                    <td style="text-align: right;"><?php echo floatval($t_det['balance']); ?></td>
                    <td>
                        <a class="btn-small btn-warning" style="color: #fff;" onclick="openNewBackgroundTab(<?php echo $t_det['t_id']; ?>)"  target="_blank">Print</a>
                        <a class="btn-small btn-success" style="color: #fff;" href="view_print.php?id=<?php echo $t_det['t_id']; ?>" target="_blank">View</a>
                    </td>
                </tr>
                <?php
            }
        }
        $tot_trans--;
    }
    ?>
    <script>
        document.getElementById('down').href = "../pdf_output/transaction.php?date=<?php echo $trans_date; ?>&trans=<?=$secret?>";
        document.getElementById('down_li').style.display = "block";
    </script>
    <?php
} else if (($_GET["rec_no"] == null) && ($_GET["cus_id"] != null) && ($_GET["cus_name"] == null) && ($_GET["cdate"] != null)) {
    $cus_id = trim($_GET["cus_id"]);
    $trans_date = $_GET["cdate"];
    $tot_trans = mysqli_fetch_row(mysqli_query($con, "SELECT MAX(t_id) FROM $table"))[0];
    while ($tot_trans > 0) {
        $t_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM $table WHERE t_id=$tot_trans AND `dep_id`=\"$dep_id\""));
        if ($t_det != null) {
            $d = mysqli_fetch_row(mysqli_query($con, "SELECT CAST(transaction_date AS DATE) FROM $table WHERE t_id=$tot_trans"))[0];
            if ((trim($d) == $trans_date) && (trim($t_det["c_id"]) == $cus_id)) {
                $cus_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM customer WHERE c_id=$cus_id"));
                $cus_name = $cus_det["customer_name"];
                ?>
                <tr>
                    <td># <?= $t_det['t_id']; ?></td>
                    <td><?php echo $t_det['transaction_date']; ?></td>
                    <td><a href="view_invoice.php?invoice=<?php echo $t_det['invoice']; ?>" target="_blank"><?php echo $t_det['invoice']; ?></a></td>
                    <td><?php echo $cus_name; ?></td>
                    <td style="text-align: right;"><?php echo floatval($t_det['sub_total']); ?></td>
                    <td style="text-align: right;"><?php echo floatval($t_det['discount']); ?></td>
                    <td style="text-align: right;"><?php echo floatval($t_det['total']); ?></td>
                    <td style="text-align: right;"><?php echo floatval($t_det['paid_amount']); ?></td>
                    <td style="text-align: right;"><?php echo floatval($t_det['balance']); ?></td>
                    <td>
                        <a class="btn-small btn-warning" style="color: #fff;" onclick="openNewBackgroundTab(<?php echo $t_det['t_id']; ?>)"  target="_blank">Print</a>
                        <a class="btn-small btn-success" style="color: #fff;" href="view_print.php?id=<?php echo $t_det['t_id']; ?>" target="_blank">View</a>
                    </td>
                </tr>
                <?php
            }
        }
        $tot_trans--;
    }
    ?>
    <script>
        document.getElementById('down').href = "../pdf_output/transaction.php?c_id=<?php echo $cus_id; ?>&date=<?php echo $trans_date; ?>&trans=<?=$secret?>";
        document.getElementById('down_li').style.display = "block";
    </script>
    <?php
} else if (($_GET["rec_no"] == null) && ($_GET["cus_id"] == null) && ($_GET["cus_name"] != null) && ($_GET["cdate"] != null)) {
    $c_name = trim(strtolower($_GET["cus_name"]));
    $trans_date = $_GET["cdate"];
    $tot_trans = mysqli_fetch_row(mysqli_query($con, "SELECT MAX(t_id) FROM $table"))[0];
    while ($tot_trans > 0) {
        $t_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM $table WHERE t_id=$tot_trans AND `dep_id`=\"$dep_id\""));
        if ($t_det != null) {
            $d = mysqli_fetch_row(mysqli_query($con, "SELECT CAST(transaction_date AS DATE) FROM $table WHERE t_id=$tot_trans"))[0];
            if ((trim($d) == $trans_date)) {
                $cus_id = trim($t_det["c_id"]);
                $cus_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM customer WHERE c_id=$cus_id"));
                $cus_name = $cus_det["customer_name"];
                if (strtolower($cus_name) == $c_name) {
                    ?>
                    <tr>
                        <td># <?= $t_det['t_id']; ?></td>
                        <td><?php echo $t_det['transaction_date']; ?></td>
                        <td><a href="view_invoice.php?invoice=<?php echo $t_det['invoice']; ?>" target="_blank"><?php echo $t_det['invoice']; ?></a></td>
                        <td><?php echo $cus_name; ?></td>
                        <td style="text-align: right;"><?php echo floatval($t_det['sub_total']); ?></td>
                        <td style="text-align: right;"><?php echo floatval($t_det['discount']); ?></td>
                        <td style="text-align: right;"><?php echo floatval($t_det['total']); ?></td>
                        <td style="text-align: right;"><?php echo floatval($t_det['paid_amount']); ?></td>
                        <td style="text-align: right;"><?php echo floatval($t_det['balance']); ?></td>
                        <td>
                            <a class="btn-small btn-warning" style="color: #fff;" onclick="openNewBackgroundTab(<?php echo $t_det['t_id']; ?>)"  target="_blank">Print</a>
                            <a class="btn-small btn-success" style="color: #fff;" href="view_print.php?id=<?php echo $t_det['t_id']; ?>" target="_blank">View</a>
                        </td>
                    </tr>
                    <?php
                }
            }
        }
        $tot_trans--;
    }
    ?>
    <script>
        document.getElementById('down').href = "../pdf_output/transaction.php?name=<?php echo $_GET["cus_name"]; ?>&date=<?php echo $trans_date; ?>&trans=<?=$secret?>";
        document.getElementById('down_li').style.display = "block";
    </script>
    <?php
} else if (($_GET["rec_no"] != null) && ($_GET["cus_id"] == null) && ($_GET["cus_name"] == null) && ($_GET["cdate"] == null)) {
    $rec_no = trim($_GET["rec_no"]);
    $tot_trans = mysqli_fetch_row(mysqli_query($con, "SELECT MAX(t_id) FROM $table"))[0];
    while ($tot_trans > 0) {
        $t_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM $table WHERE t_id=$tot_trans AND `dep_id`=\"$dep_id\""));
        if ($t_det != null) {
            $t_id = trim($t_det["t_id"]);
            if ($rec_no == $t_id) {
                $cus_id = trim($t_det["c_id"]);
                $cus_name = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM customer WHERE c_id=$cus_id"))["customer_name"];
                ?>
                <tr>
                    <td># <?= $t_det['t_id']; ?></td>
                    <td><?php echo $t_det['transaction_date']; ?></td>
                    <td><a href="view_invoice.php?invoice=<?php echo $t_det['invoice']; ?>" target="_blank"><?php echo $t_det['invoice']; ?></a></td>
                    <td><?php echo $cus_name; ?></td>
                    <td style="text-align: right;"><?php echo floatval($t_det['sub_total']); ?></td>
                    <td style="text-align: right;"><?php echo floatval($t_det['discount']); ?></td>
                    <td style="text-align: right;"><?php echo floatval($t_det['total']); ?></td>
                    <td style="text-align: right;"><?php echo floatval($t_det['paid_amount']); ?></td>
                    <td style="text-align: right;"><?php echo floatval($t_det['balance']); ?></td>
                    <td>
                        <a class="btn-small btn-warning" style="color: #fff;" onclick="openNewBackgroundTab(<?php echo $t_det['t_id']; ?>)"  target="_blank">Print</a>
                        <a class="btn-small btn-success" style="color: #fff;" href="view_print.php?id=<?php echo $t_det['t_id']; ?>" target="_blank">View</a>
                    </td>
                </tr>
                <?php
                break;
            }
        }
        $tot_trans--;
    }
} else if (($_GET["rec_no"] == null) && ($_GET["cus_id"] != null) && ($_GET["cus_name"] != null) && ($_GET["cdate"] != null)) {
    $cus_id = trim($_GET["cus_id"]);
    $trans_date = $_GET["cdate"];
    $c_name = trim(strtolower($_GET["cus_name"]));
    $tot_trans = mysqli_fetch_row(mysqli_query($con, "SELECT MAX(t_id) FROM $table"))[0];
    while ($tot_trans > 0) {
        $t_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM $table WHERE t_id=$tot_trans AND `dep_id`=\"$dep_id\""));
        if ($t_det != null) {
            $d = mysqli_fetch_row(mysqli_query($con, "SELECT CAST(transaction_date AS DATE) FROM $table WHERE t_id=$tot_trans"))[0];
            $cus_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM customer WHERE c_id=$cus_id"));
            $cus_name = $cus_det["customer_name"];
            if ((trim($d) == $trans_date) && (trim($t_det["c_id"]) == $cus_id) && (trim(strtolower($cus_name)) == $c_name)) {
                ?>
                <tr>
                    <td># <?= $t_det['t_id']; ?></td>
                    <td><?php echo $t_det['transaction_date']; ?></td>
                    <td><a href="view_invoice.php?invoice=<?php echo $t_det['invoice']; ?>" target="_blank"><?php echo $t_det['invoice']; ?></a></td>
                    <td><?php echo $cus_name; ?></td>
                    <td style="text-align: right;"><?php echo floatval($t_det['sub_total']); ?></td>
                    <td style="text-align: right;"><?php echo floatval($t_det['discount']); ?></td>
                    <td style="text-align: right;"><?php echo floatval($t_det['total']); ?></td>
                    <td style="text-align: right;"><?php echo floatval($t_det['paid_amount']); ?></td>
                    <td style="text-align: right;"><?php echo floatval($t_det['balance']); ?></td>
                    <td>
                        <a class="btn-small btn-warning" style="color: #fff;" onclick="openNewBackgroundTab(<?php echo $t_det['t_id']; ?>)"  target="_blank">Print</a>
                        <a class="btn-small btn-success" style="color: #fff;" href="view_print.php?id=<?php echo $t_det['t_id']; ?>" target="_blank">View</a>
                    </td>
                </tr>
                <?php
            }
        }
        $tot_trans--;
    }
    ?>
    <script>
        document.getElementById('down').href = "../pdf_output/transaction.php?c_id=<?php echo $cus_id; ?>&date=<?php echo $trans_date; ?>&trans=<?=$secret?>";
        document.getElementById('down_li').style.display = "block";
    </script>
    <?php
} else {
    $query = "SELECT *  FROM $table WHERE `dep_id`=\"$dep_id\"";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $c_id = $row['c_id'];
        $sql1 = "SELECT * FROM customer WHERE c_id=$c_id";
        $result2 = mysqli_query($con, $sql1);
        while ($row2 = mysqli_fetch_assoc($result2)) {
            ?>
            <tr>
                <td># <?= $row['t_id']; ?></td>
                <td><?php echo $row['transaction_date']; ?></td>
                <td><a href="view_invoice.php?invoice=<?php echo $row['invoice']; ?>" target="_blank"><?php echo $row['invoice']; ?></a></td>
                <td><?php echo $row2['customer_name']; ?></td>
                <td style="text-align: right;"><?php echo floatval($row['sub_total']); ?></td>
                <td style="text-align: right;"><?php echo floatval($row['discount']); ?></td>
                <td style="text-align: right;"><?php echo floatval($row['total']); ?></td>
                <td style="text-align: right;"><?php echo floatval($row['paid_amount']); ?></td>
                <td style="text-align: right;"><?php echo floatval($row['balance']); ?></td>
                <td>
                    <a class="btn-small btn-warning" style="color: #fff;" onclick="openNewBackgroundTab(<?php echo $row['t_id']; ?>)"  target="_blank">Print</a>
                    <a class="btn-small btn-success" style="color: #fff;" href="view_print.php?id=<?php echo $row['t_id']; ?>" target="_blank">View</a>
                </td>
            </tr>
            <?php
        }
    }
}