<?php

session_start();
include '../valid_fun.php';
if (isset($_SESSION["type"]) && isset($_SESSION["id"]) && isset($_GET["re"]) && $_GET["re"] != null) {
    $r_id = validNumber(decrydata($_GET["re"]), "../");
    include '../dbconnect.php';
    $ret_det = mysqli_fetch_assoc(mysqli_query($con, "DELETE FROM return_stock WHERE r_id=$r_id"));
    if ($ret_det != null) {
        $qty = floatval($ret_det['quantity']);
        $pro_id = intval($ret_det['pro_id']);
        $sql1 = "UPDATE products SET quantity = quantity + \"$qty\" WHERE pro_id = $pro_id";
        mysqli_query($con, $sql1);
        mysqli_query($con, "DELETE FROM return_stock WHERE r_id=$r_id");
    }
    header("location:return_stock.php");
} else {
    header("location:../");
}
