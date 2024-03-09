<?php
session_start();
include '../valid_fun.php';
include '../dbconnect.php';
if (isset($_GET['p']) && $_GET['p'] != '0') {
    $pro_name = $_GET['p'];
    $pro_row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM products WHERE product_name='$pro_name'"));
    $unit_price = $pro_row["unit_price"];
    $obj["unit_price"] = dotInput($unit_price);
    echo json_encode($obj);
}
else{
    $obj["unit_price"] = "0.00";
    echo json_encode($obj);
}