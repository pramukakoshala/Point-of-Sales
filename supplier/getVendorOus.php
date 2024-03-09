<?php

session_start();
if (isset($_SESSION["type"]) && isset($_SESSION["id"])) {
    include '../dbconnect.php';
    include '../valid_fun.php';
    $v_id = validNumber(decrydata($_GET['ven_id']), "../");
    if ($v_id != 0) {
        $pay_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT SUM(paid_amount),SUM(bill_amount)FROM vendor_payment WHERE v_id=$v_id AND status=1"));
        $ous = $pay_det["SUM(bill_amount)"] - $pay_det["SUM(paid_amount)"];
        $Obj["oustand"] = $ous * cal_tax($v_id, $con);
    } else {
        $Obj["oustand"] = 0;
    }

    echo json_encode($Obj);
} else {
    header("location:../");
}
