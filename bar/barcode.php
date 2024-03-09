<?php
session_start();
if (isset($_POST["submit"]) && isset($_SESSION["id"]) && isset($_SESSION["type"])) {
    include '../valid_fun.php';
    include '../dbconnect.php';
    ?>
    <html>
        <head>
            <style>
                p.inline {display: inline-block;}
                span { font-size: 13px;}
            </style>
            <style type="text/css" media="print">
                @page 
                {
                    size: auto;   /* auto is the initial value */
                    margin: 0mm;  /* this affects the margin in the printer settings */

                }
            </style>
        </head>
        <body onload="window.print();">
            <div style="margin-left: 5%">
                <?php

                include 'barcode128.php';
                $product = $_POST['product'];
                $barcode = $_POST['product_id'];
                $rate = $_POST['rate'];
                mysqli_query($con, "UPDATE products SET barcode='$barcode' WHERE product_name='$product'");

                for ($i = 1; $i <= $_POST['print_qty']; $i++) {
                    echo "<p class='inline'  style='text-align:center;'><span><b>" . ucwords($product) . "</b></span>" . bar128(stripcslashes($_POST['product_id'])) . "<span><b>LKR " . dotInput($rate) . " </b><span></p><br>";
                }
                ?>
            </div>
        </body>
    </html>
    <?php
} else {
    header("location:../");
}