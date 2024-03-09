<?php

session_start();
include '../valid_fun.php';
include '../dbconnect.php';
if (isset($_GET['c']) && $_GET['c'] != "1") {
    $cus_id = decrydata($_GET['c']);
    $ous_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT SUM(paid_amount),SUM(total) FROM transaction WHERE c_id=$cus_id"));
    $obj["outstand"] = $ous_det['SUM(total)'] - $ous_det['SUM(paid_amount)'];
} else {
    $obj["outstand"] = 0;
}
echo json_encode($obj);
