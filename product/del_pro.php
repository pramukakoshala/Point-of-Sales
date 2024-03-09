<?php

session_start();
include '../valid_fun.php';
if (isset($_SESSION["type"]) && isset($_SESSION["id"])) {
    include '../dbconnect.php';
    if (isset($_GET["pro"])) {
        $pro_id = decrydata($_GET["pro"]);
        $have_pro = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM products WHERE pro_id=$pro_id"));
        if ($have_pro != null) {
            $total_pro_sales = mysqli_num_rows(mysqli_query($con, "SELECT * FROM sales_order WHERE pro_id=$pro_id"));
            $total_pro_return = mysqli_num_rows(mysqli_query($con, "SELECT * FROM return_stock WHERE pro_id=$pro_id"));
            $total_q_control = mysqli_num_rows(mysqli_query($con, "SELECT * FROM q_control WHERE pro_id=$pro_id"));
            if (($total_pro_sales == 0) && ($total_pro_return == 0) && ($total_q_control == 0)) {
                mysqli_query($con, "DELETE FROM products WHERE pro_id=$pro_id");
                header("location:pro_main.php");
            } else {
                header("location:pro_main.php");
            }
        } else {
            header("location:pro_main.php");
        }
    } else {
        header("location:../");
    }
} else {
    header("location:../");
}