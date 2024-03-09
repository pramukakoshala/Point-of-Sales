<?php

session_start();
include '../valid_fun.php';
if (isset($_SESSION["type"]) && isset($_SESSION["id"]) && isset($_GET['p'])) {
    include '../dbconnect.php';
    if ($_GET['p'] != "0") {
        $pro_id = decrydata($_GET['p']);
    } else {
        $pro_id = 0;
    }
    $p_row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM products WHERE pro_id=$pro_id"));
    if ($p_row != null) {
        $unit_price = dotInput($p_row["dealer_price"]) . "_" . dotInput($p_row["unit_price"]) . "_" . dotInput($p_row["lower_price_limit"]);
    } else {
        $unit_price = "";
    }
    $Obj["price"] = $unit_price;
    echo json_encode($Obj);
}else {
    header("location:../");
}