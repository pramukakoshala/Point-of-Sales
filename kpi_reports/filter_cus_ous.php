<?php
$total = $paid_amount = $balance = 0;
if (($_GET["cus_id"] != null) && ($_GET["cus_name"] == null) && ($_GET["cdate"] == null)) {
    $cus_id = trim($_GET["cus_id"]);
    $cus_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM customer WHERE c_id=$cus_id AND c_id != 1"));
    if ($cus_det != null) {
        $c_id = $cus_id;
        $trans_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT SUM(total),SUM(paid_amount),SUM(balance)FROM transaction WHERE c_id=$cus_id"));
        $sum_tot = floatval($trans_det['SUM(total)']);
        $sum_pay = floatval($trans_det['SUM(paid_amount)']);
        $sum_bal = $sum_tot - $sum_pay;
        if ($_SESSION["tax_active"] == 1) {
            $temp_trans_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT c_id,SUM(total),SUM(paid_amount),SUM(balance) FROM temp_transaction WHERE c_id=$c_id"));
            $sum_tot += floatval($temp_trans_det['SUM(total)']);
            $sum_pay += floatval($temp_trans_det['SUM(paid_amount)']);
            $sum_bal += (floatval($temp_trans_det['SUM(total)']) - floatval($temp_trans_det['SUM(paid_amount)']));
        }
        if ($trans_det != null) {
            echo "<tr class='gradeU'>";
            echo "<td>Cus-" . $cus_det['c_id'] . "</td>";
            echo "<td>" . $cus_det['customer_name'] . "</td>";
            echo "<td>" . dotInput($sum_tot) . "</td>";
            echo "<td>" . dotInput($sum_pay) . "</td>";
            echo "<td>" . dotInput($sum_bal) . "</td>";
            ?>
            <td>
                <a class="btn-small btn-success" style="color: #fff;" href="../printing/print/example/interface/print_ous.php?c_id=<?php echo encrydata($cus_det['c_id']); ?>">Print</a>
                <?php if ($sum_bal > 0) { ?>
                    <a class = "btn-small btn-primary" style = "color: #fff;" href = "#" onclick = "window.open('create_payment.php?c=<?php echo encrydata($cus_det['c_id']); ?>', '', 'scrollbars=yes,resizable=yes,width=800,height=500,top=65,left=450')">Create Payment</a>
                <?php } ?>
            </td>
            <?php
            echo "</tr>";
        }
    }
} else if (($_GET["cus_id"] == null) && ($_GET["cus_name"] != null) && ($_GET["cdate"] == null)) {
    $cus_name = trim(strtolower($_GET["cus_name"]));
    $tot_cus = mysqli_fetch_row(mysqli_query($con, "SELECT MAX(c_id) FROM customer"))[0];
    while ($tot_cus > 0) {
        $cus_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM customer WHERE c_id=$tot_cus AND c_id != 1"));
        if ($cus_det != null) {
            if (trim(strtolower($cus_det["customer_name"])) == $cus_name) {
                $cus_id = trim($cus_det["c_id"]);
                $c_id = $cus_id;
                $trans_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT SUM(total),SUM(paid_amount),SUM(balance)FROM transaction WHERE c_id=$cus_id"));
                $sum_tot = floatval($trans_det['SUM(total)']);
                $sum_pay = floatval($trans_det['SUM(paid_amount)']);
                $sum_bal = $sum_tot - $sum_pay;
                if ($_SESSION["tax_active"] == 1) {
                    $temp_trans_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT c_id,SUM(total),SUM(paid_amount),SUM(balance) FROM temp_transaction WHERE c_id=$c_id"));
                    $sum_tot += floatval($temp_trans_det['SUM(total)']);
                    $sum_pay += floatval($temp_trans_det['SUM(paid_amount)']);
                    $sum_bal += (floatval($temp_trans_det['SUM(total)']) - floatval($temp_trans_det['SUM(paid_amount)']));
                }
                if ($trans_det != null) {
                    echo "<tr class='gradeU'>";
                    echo "<td>Cus-" . $cus_det['c_id'] . "</td>";
                    echo "<td>" . $cus_det['customer_name'] . "</td>";
                    echo "<td>" . dotInput($sum_tot) . "</td>";
                    echo "<td>" . dotInput($sum_pay) . "</td>";
                    echo "<td>" . dotInput($sum_bal) . "</td>";
                    ?>
                    <td>
                        <a class="btn-small btn-success" style="color: #fff;" href="../printing/print/example/interface/print_ous.php?c_id=<?php echo encrydata($cus_det['c_id']); ?>">Print</a>
                        <?php if ($sum_bal > 0) { ?>
                            <a class = "btn-small btn-primary" style = "color: #fff;" href = "#" onclick = "window.open('create_payment.php?c=<?php echo encrydata($cus_det['c_id']); ?>', '', 'scrollbars=yes,resizable=yes,width=800,height=500,top=65,left=450')">Create Payment</a>
                        <?php } ?>
                    </td>
                    <?php
                    echo "</tr>";
                }
            }
        }
        $tot_cus--;
    }
} elseif (($_GET["cus_id"] != null) && ($_GET["cus_name"] != null) && ($_GET["cdate"] == null)) {
    $cus_id = trim($_GET["cus_id"]);
    $cus_name = trim(strtolower($_GET["cus_name"]));
    $tot_cus = mysqli_fetch_row(mysqli_query($con, "SELECT MAX(c_id) FROM customer"))[0];
    while ($tot_cus > 0) {
        $cus_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM customer WHERE c_id=$tot_cus AND c_id != 1"));
        if ($cus_det != null) {
            if ((trim(strtolower($cus_det["customer_name"])) == $cus_name) && (trim($cus_det["c_id"]) == $cus_id)) {
                $cus_id = trim($cus_det["c_id"]);
                $c_id = $cus_id;
                $trans_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT SUM(total),SUM(paid_amount),SUM(balance)FROM transaction WHERE c_id=$cus_id"));

                $sum_tot = floatval($trans_det['SUM(total)']);
                $sum_pay = floatval($trans_det['SUM(paid_amount)']);
                $sum_bal = $sum_tot - $sum_pay;
                if ($_SESSION["tax_active"] == 1) {
                    $temp_trans_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT c_id,SUM(total),SUM(paid_amount),SUM(balance) FROM temp_transaction WHERE c_id=$c_id"));
                    $sum_tot += floatval($temp_trans_det['SUM(total)']);
                    $sum_pay += floatval($temp_trans_det['SUM(paid_amount)']);
                    $sum_bal += (floatval($temp_trans_det['SUM(total)']) - floatval($temp_trans_det['SUM(paid_amount)']));
                }
                if ($trans_det != null) {
                    echo "<tr class='gradeU'>";
                    echo "<td>Cus-" . $cus_det['c_id'] . "</td>";
                    echo "<td>" . $cus_det['customer_name'] . "</td>";
                    echo "<td>" . dotInput($sum_tot) . "</td>";
                    echo "<td>" . dotInput($sum_pay) . "</td>";
                    echo "<td>" . dotInput($sum_bal) . "</td>";
                    ?>
                    <td>
                        <a class="btn-small btn-success" style="color: #fff;" href="../printing/print/example/interface/print_ous.php?c_id=<?php echo encrydata($cus_det['c_id']); ?>">Print</a>
                        <?php if ($sum_bal > 0) { ?>
                            <a class = "btn-small btn-primary" style = "color: #fff;" href = "#" onclick = "window.open('create_payment.php?c=<?php echo encrydata($cus_det['c_id']); ?>', '', 'scrollbars=yes,resizable=yes,width=800,height=500,top=65,left=450')">Create Payment</a>
                        <?php } ?>
                    </td>
                    <?php
                    echo "</tr>";
                    break;
                }
            }
        }
        $tot_cus--;
    }
} else if (($_GET["cus_id"] == null) && ($_GET["cus_name"] == null) && ($_GET["cdate"] != null)) {
    $trans_date = $_GET["cdate"];
    $tot_trans = mysqli_fetch_row(mysqli_query($con, "SELECT MAX(t_id) FROM transaction"))[0];
    while ($tot_trans > 0) {
        $t_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM transaction WHERE t_id=$tot_trans AND c_id != 1"));
        if ($t_det != null) {
            if ((trim($t_det["transaction_date"]) == $trans_date)) {
                $cus_id = trim($t_det["c_id"]);
                $c_id = $cus_id;
                $trans_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT SUM(total),SUM(paid_amount),SUM(balance)FROM transaction WHERE c_id=$cus_id"));

                $sum_tot = floatval($trans_det['SUM(total)']);
                $sum_pay = floatval($trans_det['SUM(paid_amount)']);
                $sum_bal = $sum_tot - $sum_pay;
                if ($_SESSION["tax_active"] == 1) {
                    $temp_trans_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT c_id,SUM(total),SUM(paid_amount),SUM(balance) FROM temp_transaction WHERE c_id=$c_id"));
                    $sum_tot += floatval($temp_trans_det['SUM(total)']);
                    $sum_pay += floatval($temp_trans_det['SUM(paid_amount)']);
                    $sum_bal += (floatval($temp_trans_det['SUM(total)']) - floatval($temp_trans_det['SUM(paid_amount)']));
                }
                $cus_name = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM customer WHERE c_id=$cus_id"))["customer_name"];
                if ($trans_det != null) {
                    echo "<tr class='gradeU'>";
                    echo "<td>Cus-" . $cus_id . "</td>";
                    echo "<td>" . $cus_name . "</td>";
                    echo "<td>" . dotInput($sum_tot) . "</td>";
                    echo "<td>" . dotInput($sum_pay) . "</td>";
                    echo "<td>" . dotInput($sum_bal) . "</td>";
                    ?>
                    <td>
                        <a class="btn-small btn-success" style="color: #fff;" href="../printing/print/example/interface/print_ous.php?c_id=<?php echo encrydata($cus_det['c_id']); ?>">Print</a>
                        <?php if ($sum_bal > 0) { ?>
                            <a class = "btn-small btn-primary" style = "color: #fff;" href = "#" onclick = "window.open('create_payment.php?c=<?php echo encrydata($cus_det['c_id']); ?>', '', 'scrollbars=yes,resizable=yes,width=800,height=500,top=65,left=450')">Create Payment</a>
                        <?php } ?>
                    </td>
                    <?php
                    echo "</tr>";
                }
            }
        }
        $tot_trans--;
    }
} else if (($_GET["cus_id"] != null) && ($_GET["cus_name"] == null) && ($_GET["cdate"] != null)) {
    $cus_id = trim($_GET["cus_id"]);
    $trans_date = $_GET["cdate"];
    $tot_trans = mysqli_fetch_row(mysqli_query($con, "SELECT MAX(t_id) FROM transaction"))[0];
    while ($tot_trans > 0) {
        $t_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM transaction WHERE t_id=$tot_trans AND c_id != 1"));
        if ($t_det != null) {
            $c_id = $cus_id;
            $d = mysqli_fetch_row(mysqli_query($con, "SELECT CAST(transaction_date AS DATE) FROM transaction WHERE t_id=$tot_trans"))[0];
            if ((trim($d) == $trans_date) && (trim($t_det["c_id"]) == $cus_id)) {
                $trans_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT SUM(total),SUM(paid_amount),SUM(balance)FROM transaction WHERE c_id=$cus_id"));

                $sum_tot = floatval($trans_det['SUM(total)']);
                $sum_pay = floatval($trans_det['SUM(paid_amount)']);
                $sum_bal = $sum_tot - $sum_pay;
                if ($_SESSION["tax_active"] == 1) {
                    $temp_trans_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT c_id,SUM(total),SUM(paid_amount),SUM(balance) FROM temp_transaction WHERE c_id=$c_id"));
                    $sum_tot += floatval($temp_trans_det['SUM(total)']);
                    $sum_pay += floatval($temp_trans_det['SUM(paid_amount)']);
                    $sum_bal += (floatval($temp_trans_det['SUM(total)']) - floatval($temp_trans_det['SUM(paid_amount)']));
                }
                $cus_name = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM customer WHERE c_id=$cus_id"))["customer_name"];
                if ($trans_det != null) {
                    echo "<tr class='gradeU'>";
                    echo "<td>Cus-" . $cus_id . "</td>";
                    echo "<td>" . $cus_name . "</td>";
                    echo "<td>" . dotInput($sum_tot) . "</td>";
                    echo "<td>" . dotInput($sum_pay) . "</td>";
                    echo "<td>" . dotInput($sum_bal) . "</td>";
                    ?>
                    <td>
                        <a class="btn-small btn-success" style="color: #fff;" href="../printing/print/example/interface/print_ous.php?c_id=<?php echo encrydata($cus_id); ?>">Print</a>
                        <?php if ($sum_bal > 0) { ?>
                            <a class = "btn-small btn-primary" style = "color: #fff;" href = "#" onclick = "window.open('create_payment.php?c=<?php echo encrydata($cus_id); ?>', '', 'scrollbars=yes,resizable=yes,width=800,height=500,top=65,left=450')">Create Payment</a>
                        <?php } ?>
                    </td>
                    <?php
                    echo "</tr>";
                    break;
                }
            }
        }
        $tot_trans--;
    }
} else if (($_GET["cus_id"] == null) && ($_GET["cus_name"] != null) && ($_GET["cdate"] != null)) {
    $c_name = trim(strtolower($_GET["cus_name"]));
    $trans_date = $_GET["cdate"];
    $tot_trans = mysqli_fetch_row(mysqli_query($con, "SELECT MAX(t_id) FROM transaction"))[0];
    while ($tot_trans > 0) {
        $t_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM transaction WHERE t_id=$tot_trans AND c_id != 1"));
        if ($t_det != null) {
            $d = mysqli_fetch_row(mysqli_query($con, "SELECT CAST(transaction_date AS DATE) FROM transaction WHERE t_id=$tot_trans"))[0];
            if ((trim($d) == $trans_date)) {
                $cus_id = trim($t_det["c_id"]);
                $c_id = $cus_id;
                $cus_name = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM customer WHERE c_id=$cus_id"))["customer_name"];
                if (strtolower($cus_name) == $c_name) {
                    $trans_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT SUM(total),SUM(paid_amount),SUM(balance)FROM transaction WHERE c_id=$cus_id"));

                    $sum_tot = floatval($trans_det['SUM(total)']);
                    $sum_pay = floatval($trans_det['SUM(paid_amount)']);
                    $sum_bal = $sum_tot - $sum_pay;
                    if ($_SESSION["tax_active"] == 1) {
                        $temp_trans_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT c_id,SUM(total),SUM(paid_amount),SUM(balance) FROM temp_transaction WHERE c_id=$c_id"));
                        $sum_tot += floatval($temp_trans_det['SUM(total)']);
                        $sum_pay += floatval($temp_trans_det['SUM(paid_amount)']);
                        $sum_bal += (floatval($temp_trans_det['SUM(total)']) - floatval($temp_trans_det['SUM(paid_amount)']));
                    }
                    if ($trans_det != null) {
                        echo "<tr class='gradeU'>";
                        echo "<td>Cus-" . $cus_id . "</td>";
                        echo "<td>" . $cus_name . "</td>";
                        echo "<td>" . dotInput($sum_tot) . "</td>";
                        echo "<td>" . dotInput($sum_pay) . "</td>";
                        echo "<td>" . dotInput($sum_bal) . "</td>";
                        ?>
                        <td>
                            <a class="btn-small btn-success" style="color: #fff;" href="../printing/print/example/interface/print_ous.php?c_id=<?php echo encrydata($cus_id); ?>">Print</a>
                            <?php if ($sum_bal > 0) { ?>
                                <a class = "btn-small btn-primary" style = "color: #fff;" href = "#" onclick = "window.open('create_payment.php?c=<?php echo encrydata($cus_id); ?>', '', 'scrollbars=yes,resizable=yes,width=800,height=500,top=65,left=450')">Create Payment</a>
                            <?php } ?>
                        </td>
                        <?php
                        echo "</tr>";
                        break;
                    }
                }
            }
        }
        $tot_trans--;
    }
} else {
    $cus_id = trim($_GET["cus_id"]);
    $trans_date = $_GET["cdate"];
    $c_name = trim(strtolower($_GET["cus_name"]));
    $tot_trans = mysqli_fetch_row(mysqli_query($con, "SELECT MAX(t_id) FROM transaction"))[0];
    while ($tot_trans > 0) {
        $t_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM transaction WHERE t_id=$tot_trans AND c_id != 1"));
        $d = mysqli_fetch_row(mysqli_query($con, "SELECT CAST(transaction_date AS DATE) FROM transaction WHERE t_id=$tot_trans"))[0];
        if ($t_det != null) {
            $cus_name = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM customer WHERE c_id=$cus_id"))["customer_name"];
            if ((trim($d) == $trans_date) && (trim($t_det["c_id"]) == $cus_id) && (trim(strtolower($cus_name)) == $c_name)) {
                $trans_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT SUM(total),SUM(paid_amount),SUM(balance)FROM transaction WHERE c_id=$cus_id"));

                $c_id = $cus_id;
                $sum_tot = floatval($trans_det['SUM(total)']);
                $sum_pay = floatval($trans_det['SUM(paid_amount)']);
                $sum_bal = $sum_tot - $sum_pay;
                if ($_SESSION["tax_active"] == 1) {
                    $temp_trans_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT c_id,SUM(total),SUM(paid_amount),SUM(balance) FROM temp_transaction WHERE c_id=$c_id"));
                    $sum_tot += floatval($temp_trans_det['SUM(total)']);
                    $sum_pay += floatval($temp_trans_det['SUM(paid_amount)']);
                    $sum_bal += (floatval($temp_trans_det['SUM(total)']) - floatval($temp_trans_det['SUM(paid_amount)']));
                }
                if ($trans_det != null) {
                    echo "<tr class='gradeU'>";
                    echo "<td>Cus-" . $cus_id . "</td>";
                    echo "<td>" . $cus_name . "</td>";
                    echo "<td>" . dotInput($sum_tot) . "</td>";
                    echo "<td>" . dotInput($sum_pay) . "</td>";
                    echo "<td>" . dotInput($sum_bal) . "</td>";
                    ?>
                    <td>
                        <a class="btn-small btn-success" style="color: #fff;" href="../printing/print/example/interface/print_ous.php?c_id=<?php echo encrydata($cus_id); ?>">Print</a>
                        <?php if ($sum_bal > 0) { ?>
                            <a class = "btn-small btn-primary" style = "color: #fff;" href = "#" onclick = "window.open('create_payment.php?c=<?php echo encrydata($cus_id); ?>', '', 'scrollbars=yes,resizable=yes,width=800,height=500,top=65,left=450')">Create Payment</a>
                        <?php } ?>
                    </td>
                    <?php
                    echo "</tr>";
                    break;
                }
            }
        }
        $tot_trans--;
    }
}