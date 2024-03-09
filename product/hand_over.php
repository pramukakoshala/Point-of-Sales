<?php

session_start();
include '../valid_fun.php';
if (isset($_SESSION["type"]) && isset($_SESSION["id"]) && isset($_GET["re"]) && $_GET["re"] != null) {
    $r_id = validNumber(decrydata($_GET["re"]), "../");
    include '../dbconnect.php';
    mysqli_query($con, "UPDATE return_stock SET hand_over=1 WHERE r_id=$r_id");
    header("location:return_stock.php");
}else {
    header("location:../");
}
