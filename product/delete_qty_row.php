<?php

session_start();
include '../dbconnect.php';
include '../valid_fun.php';
if (isset($_SESSION["type"]) && isset($_SESSION["id"]) && isset($_GET["q"]) && isset($_GET["u"])) {
    $q_id = decrydata($_GET["q"]);
    mysqli_query($con, "DELETE FROM q_control WHERE q_id=$q_id");
    header("location: bill_qty_control.php?unic=" . $_GET["u"]);
}else {
    header("location:../");
}