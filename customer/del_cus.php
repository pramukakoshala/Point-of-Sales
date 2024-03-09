<?php

session_start();
include '../valid_fun.php';
if (isset($_SESSION["type"]) && isset($_SESSION["id"])) {
    include '../dbconnect.php';
    if (isset($_GET["c"])) {
        $c_id = decrydata($_GET["c"]);
        $have_cus = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM customer WHERE c_id=$c_id"));
        if ($have_cus != null) {
            $total_cus_trans = mysqli_num_rows(mysqli_query($con, "SELECT * FROM transaction WHERE c_id=$c_id"));
            if ($total_cus_trans == 0) {
                mysqli_query($con, "DELETE FROM customer WHERE c_id=$c_id");
                header("location:cus_main.php");
            } else {
                header("location:cus_main.php");
            }
        } else {
            header("location:cus_main.php");
        }
    } else {
        header("location:../");
    }
} else {
    header("location:../");
}