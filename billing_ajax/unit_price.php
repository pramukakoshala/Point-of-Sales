<?php
session_start();
include '../valid_fun.php';
include '../dbconnect.php';
if (isset($_GET['p']) && $_GET['p'] != '0') {
    $pro_id = decrydata($_GET['p']);
    $pro_row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM products WHERE pro_id=$pro_id"));
    $unit_price = $pro_row["unit_price"];
    $obj["unit_price"] = $unit_price;
    $obj["lprice"] = $pro_row['lower_price_limit'];
    $obj["hprice"] = $pro_row['unit_price'];
    echo json_encode($obj);
}
else{
    $obj["lprice"] = 0;
    $obj["hprice"] = 0;
    $obj["unit_price"] = 0;
    echo json_encode($obj);
}