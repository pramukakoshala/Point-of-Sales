<?php

session_start();
$str = "";
include '../valid_fun.php';
include '../dbconnect.php';
if (isset($_GET['item']) && isset($_GET['p'])) {
    $item = floatval($_GET['item']);
    $pro_id = decrydata($_GET['p']);
    $qu = floatval(mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM products WHERE pro_id=$pro_id"))["quantity"]);
    if ($item > $qu) {
        $str = "Maximum Quanity Available: " . $qu;
    }
}
$Object["errors"] = $str;
echo json_encode($Object);
