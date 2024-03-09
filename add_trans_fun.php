<?php

include 'valid_fun.php';
if (isset($_POST['submit'])) {
    include 'dbconnect.php';
    if ($_POST['c_id'] != 1) {
        $c_id = decrydata($_POST['c_id']);
    } else {
        $c_id = 1;
    }
    $transaction_date = $_POST['transaction_date'];
    $invoice = ($_POST['invoice']);
    $sub_total = $_POST['sub_total'];
    $discount = $_POST['other_dis'];
    $total = floatval($_POST['total']);
    $paid_amount = floatval($_POST['paid_amount']);
    $balance = $_POST['balance'];
    $pay_type = $_POST["pay_type"];
    $user = decrydata($_POST["u"]);
    $department = decrydata($_POST['department']);
    $secret = intval($_POST['secret']);
    $promo = $_POST["promo"];
    $promo_id = 0;
    $promo_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `promotions` WHERE `code`=\"$promo\" ORDER BY `promo_id` DESC"));
    if ($promo_det != null) {
        $promo_id = $promo_det['promo_id'];
    }

    if ($secret == 1) {
        $trans_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM temp_transaction WHERE invoice='$invoice'"));
    } else {
        $trans_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM transaction WHERE invoice='$invoice'"));
    }
    if ($trans_det == null) {
        if ($secret != 1) {
            $sql = "INSERT INTO `transaction`(`c_id`, `transaction_date`, `invoice`, `sub_total`, `discount`,`total`, `paid_amount`,`balance`,`pay_type`,`cashier`,`dep_id`,`promo_id`) VALUES(\"$c_id\", \"$transaction_date\", \"$invoice\" , \"$sub_total\", \"$discount\", \"$total\", \"$paid_amount\", \"$balance\", \"$pay_type\", \"$user\", \"$department\", \"$promo_id\")";
        } else {
            $sql = "INSERT INTO `temp_transaction`(`c_id`, `transaction_date`, `invoice`, `sub_total`, `discount`,`total`, `paid_amount`,`balance`,`pay_type`,`cashier`,`dep_id`) VALUES(\"$c_id\", \"$transaction_date\", \"$invoice\" , \"$sub_total\", \"$discount\", \"$total\", \"$paid_amount\", \"$balance\", \"$pay_type\", \"$user\", \"$department\")";
        }
        if ($con->query($sql) == TRUE) {
            if ($promo_id > 0) {
                mysqli_query($con, "UPDATE `promotions` SET `v_count`=`v_count`-1 WHERE `promo_id`=\"$promo_id\"");
            }
//            $last_id = $con->insert_id;
//                header("location: billing.php");
            if ($secret != 1) {
                header("location: printing/example/interface/windows-usb.php?type=1&invoice=$invoice");
            } else {
                header("location: printing/example/interface/windows-usb.php?type=1&invoice=$invoice&sec=1");
            }
        } else {
            echo 'Something Went Wrong!';
        }
    } else {
        $promo_id = $trans_det['promo_id'];
        $promo_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `promotions` WHERE `code`=\"$promo\" ORDER BY `promo_id` DESC"));
        if ($promo_det != null) {
            $db_promo = $promo_det['promo_id'];
            if (($promo_id > 0) && ($promo_id != $db_promo)) {
                $promo_id = $db_promo;
                mysqli_query($con, "UPDATE `promotions` SET `v_count`=`v_count`-1 WHERE `promo_id`=\"$db_promo\"");
            }
        }
        $t_id = $trans_det["t_id"];
        if ($secret != 1) {
            mysqli_query($con, "UPDATE transaction SET transaction_date=\"$transaction_date\",promo_id=\"$promo_id\",sub_total=\"$sub_total\",discount=\"$discount\",total=\"$total\",paid_amount=\"$paid_amount\",balance=\"$balance\",pay_type=\"$pay_type\",cashier=\"$user\",`is_tmp`=\"$secret\" WHERE t_id=$t_id");
        } else {
            mysqli_query($con, "UPDATE temp_transaction SET transaction_date=\"$transaction_date\",sub_total=\"$sub_total\",discount=\"$discount\",total=\"$total\",paid_amount=\"$paid_amount\",balance=\"$balance\",pay_type=\"$pay_type\",cashier=\"$user\",`is_tmp`=\"$secret\" WHERE t_id=$t_id");
        }
        header("location: billing.php");
    }
} elseif (isset($_POST['save'])) {
    include 'dbconnect.php';
    if ($_POST['c_id'] != 1) {
        $c_id = decrydata($_POST['c_id']);
    } else {
        $c_id = 1;
    }
    $transaction_date = $_POST['transaction_date'];
    $invoice = ($_POST['invoice']);
    $sub_total = $_POST['sub_total'];
    $discount = $_POST['discount'];
    $total = floatval($_POST['total']);
    $paid_amount = floatval($_POST['paid_amount']);
    $balance = $_POST['balance'];
    $pay_type = $_POST["pay_type"];
    $user = decrydata($_POST["u"]);
    $department = decrydata($_POST['department']);
    $secret = intval($_POST['secret']);
    $promo = $_POST["promo"];
    $promo_id = 0;
    $promo_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `promotions` WHERE `code`=\"$promo\" ORDER BY `promo_id` DESC"));
    if ($promo_det != null) {
        $promo_id = $promo_det['promo_id'];
    }

    if ($secret == 1) {
        $trans_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM temp_transaction WHERE invoice='$invoice'"));
    } else {
        $trans_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM transaction WHERE invoice='$invoice'"));
    }
    if ($trans_det == null) {
        if ($secret != 1) {
            $sql = "INSERT INTO `transaction`(`c_id`, `transaction_date`, `invoice`, `sub_total`, `discount`,`total`, `paid_amount`,`balance`,`pay_type`,`cashier`,`dep_id`,`promo_id`) VALUES(\"$c_id\", \"$transaction_date\", \"$invoice\" , \"$sub_total\", \"$discount\", \"$total\", \"$paid_amount\", \"$balance\", \"$pay_type\", \"$user\", \"$department\", \"$promo_id\")";
        } else {
            $sql = "INSERT INTO `temp_transaction`(`c_id`, `transaction_date`, `invoice`, `sub_total`, `discount`,`total`, `paid_amount`,`balance`,`pay_type`,`cashier`,`dep_id`) VALUES(\"$c_id\", \"$transaction_date\", \"$invoice\" , \"$sub_total\", \"$discount\", \"$total\", \"$paid_amount\", \"$balance\", \"$pay_type\", \"$user\", \"$department\")";
        }
        if ($con->query($sql) == TRUE) {
//            $last_id = $con->insert_id;
//                header("location: billing.php");
            if ($secret != 1) {
                header("location: billing.php");
            } else {
                header("location: billing.php");
            }
        } else {
            echo 'Something Went Wrong!';
        }
    } else {
        $t_id = $trans_det["t_id"];
        $promo_id = $trans_det['promo_id'];
        $promo_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `promotions` WHERE `code`=\"$promo\" ORDER BY `promo_id` DESC"));
        if ($promo_det != null) {
            $db_promo = $promo_det['promo_id'];
            if (($promo_id > 0) && ($promo_id != $db_promo)) {
                $promo_id = $db_promo;
                mysqli_query($con, "UPDATE `promotions` SET `v_count`=`v_count`-1 WHERE `promo_id`=\"$db_promo\"");
            }
        }
        if ($secret != 1) {
            mysqli_query($con, "UPDATE transaction SET transaction_date=\"$transaction_date\",promo_id=\"$promo_id\",sub_total=\"$sub_total\",discount=\"$discount\",total=\"$total\",paid_amount=\"$paid_amount\",balance=\"$balance\",pay_type=\"$pay_type\",cashier=\"$user\",`is_tmp`=\"$secret\" WHERE t_id=$t_id");
        } else {
            mysqli_query($con, "UPDATE temp_transaction SET transaction_date=\"$transaction_date\",sub_total=\"$sub_total\",discount=\"$discount\",total=\"$total\",paid_amount=\"$paid_amount\",balance=\"$balance\",pay_type=\"$pay_type\",cashier=\"$user\",`is_tmp`=\"$secret\" WHERE t_id=$t_id");
        }
        header("location: billing.php");
    }
}