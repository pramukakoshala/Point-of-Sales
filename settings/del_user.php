<?php

session_start();
include '../dbconnect.php';
include '../valid_fun.php';
if (isset($_GET["u"]) && isset($_SESSION["type"]) && isset($_SESSION["id"]) && $_SESSION["type"] == 3) {
    $user = validNumber(decrydata($_GET["u"]), "../");
    mysqli_query($con, "DELETE FROM users WHERE id=$user");
    mysqli_query($con, "DELETE FROM user_features WHERE id=$user");
    header("location: autharization.php");
}else {
    header("location:../");
}