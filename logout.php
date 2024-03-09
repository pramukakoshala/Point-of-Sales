<?php

session_start();
if ($_SESSION["type"] == 3) {
    header("location:backup_db/index.php");
} else {
    unset($_SESSION["id"]);
    unset($_SESSION["name"]);
    unset($_SESSION["type"]);
    unset($_SESSION["from_index"]);
    header("location:index.php");
}
?>