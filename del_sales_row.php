<?php

session_start();
include 'dbconnect.php';
include 'valid_fun.php';
if (isset($_GET["invoice"]) && isset($_GET["s"]) && isset($_GET["u"]) && isset($_GET["qty"]) && isset($_GET["p"])) {

    $pro_id = decrydata($_GET["p"]);
    $pro_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM products WHERE pro_id=$pro_id"));
    if ($pro_det != null) {
        $user = $_GET["u"];
        $invoice = $_GET["invoice"];
        $sales_id = decrydata($_GET["s"]);
        $qty = floatval($_GET["qty"]) + floatval($pro_det["quantity"]);

        mysqli_query($con, "UPDATE products SET quantity='$qty' WHERE pro_id=$pro_id");

        $ret_txt = '';
        if (isset($_GET["ret_g"])) {
            $ret_txt = '&ret_g=1';
            $copyRow = "INSERT INTO cus_returns(invoice,date,pro_id,quantity,unit_price,total,discount,returned_date)
SELECT invoice,date,pro_id,quantity,unit_price,total,discount,CURRENT_TIMESTAMP FROM sales_order
WHERE sales_order.sales_id=$sales_id";
            mysqli_query($con, $copyRow);
        }

        mysqli_query($con, "DELETE FROM sales_order WHERE sales_id=$sales_id");

        if (isset($_GET["dis"])) {
            $td_id = decrydata($_GET["dis"]);
            mysqli_query($con, "DELETE FROM temp_dis WHERE td_id=$td_id");
        }
    }
    header("location: billing.php?u=$user&invoice=$invoice" . $ret_txt);
} else {
    header("location:index.php");
}