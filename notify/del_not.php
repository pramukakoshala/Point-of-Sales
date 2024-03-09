<?php

session_start();
include '../valid_fun.php';
if (isset($_SESSION["type"]) && isset($_SESSION["id"])) {
    include '../dbconnect.php';
    $no_id = validNumber(decrydata($_GET["no"]), "../");
    mysqli_query($con, "DELETE FROM notify WHERE no_id=$no_id");
}else {
    header("location:../");
}
    