<?php

session_start();
if (isset($_SESSION["type"]) && isset($_SESSION["id"])) {
    include '../dbconnect.php';
    include '../valid_fun.php';
    $v_id = validNumber(decrydata($_GET['ven_id']), "../");
    $json = [];
    $tot = mysqli_fetch_row(mysqli_query($con, "SELECT MAX(id) FROM vendor_payment"))[0];
    while ($tot > 0) {
        $pay = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM vendor_payment WHERE id=$tot"));
        if (($pay != null) && $pay["v_id"] == $v_id) {
            if ($pay["status"] == 1) {
                $json[encrydata($tot)] = $pay["ref_no"];
            }
        }
        $tot--;
    }
    echo json_encode($json);
}else {
    header("location:../");
}