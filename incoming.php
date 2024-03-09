<?php

session_start();
include 'valid_fun.php';
if (isset($_POST["add"])) {
    include 'dbconnect.php';

    $user = $_POST['u'];
    $invoice = ($_POST['invoice']);
    $date = $_POST['date'];
    $pro_id = intval(decrydata($_POST['pro_id']));
    $qty = $_POST['quantity'];
    $price = $_POST['unit_p'];
    $ret_txt = '';
    if (isset($_POST['ret_g'])) {
        $ret_g = intval($_POST['ret_g']);
        if ($ret_g == 1) {
            $ret_txt = '&ret_g=1';
        }
    }
    if ($pro_id > 0) {
        $row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM products WHERE pro_id=$pro_id"));
        $db_qty = $row['quantity'];
        $real_am = $row['unit_price'];

        $dis_am = $real_am - $price;
        $total = $price * $qty;

        $decrease_qty = "UPDATE products SET quantity=\"$db_qty\" - \"$qty\" WHERE pro_id=$pro_id";
        $sales_order_query = "INSERT INTO sales_order (invoice,date,pro_id,quantity,unit_price,total) VALUES (\"$invoice\", \"$date\", \"$pro_id\", \"$qty\", \"$price\",\"$total\")";

        if ($con->query($sales_order_query) == TRUE) {
            if ($dis_am > 0) {
                $dis_am = $dis_am * $qty;
                $s_id = $con->insert_id;
                mysqli_query($con, "INSERT INTO temp_dis(td_id,invoice,dis_amount,sales_id) VALUES('','$invoice',$dis_am,$s_id)");
            }

            if ($con->query($decrease_qty) == TRUE) {
                header("location: billing.php?u=$user&invoice=" . $_POST['invoice'] . $ret_txt);
            } else {
                echo "Something Went Wrong!";
            }
        } else {
            echo "Something Went Wrong!";
        }
    } else {
        header("location: billing.php?u=$user&invoice=" . $_POST['invoice'] . $ret_txt);
    }
}