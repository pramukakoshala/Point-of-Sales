<?php

session_start();
include 'valid_fun.php';
if (isset($_SESSION["type"]) && isset($_SESSION["id"]) && isset($_GET["check"])) {
    include 'dbconnect.php';

    /*

     * NOTIFICATION TYPES ------------------------------
     * 
     *      default values ;
     * 
     *      1 - Quantity Less Than 30% & More Than 20%
     *      2 - Quantity Less Than 10% & More Than 0%
     *      3 - Expiry Date < 30 Days & Date > 20 Days
     *      4 - Expiry Date < 10 Days & Date > 0 Days
     * 

      /* -------------------------------------------- END */

    /*

     * SETTINGS --------------------------------------- */

    $notified_again_in = 2;
    $notify_date = date("Y-m-d H:i:s");

    $percentage_less_than_one = 30;
    $percentage_more_than_one = 20;
    $percentage_less_than_two = 10;
    $percentage_more_than_two = 0;

    $date_gap_more_than_one = 20;
    $date_gap_less_than_one = 30;
    $date_gap_more_than_two = 0;
    $date_gap_less_than_two = 10;

    /* -------------------------------------------- END */

    $this_y = (date("Y"));
    $this_m = (date("m"));
    $this_d = intval(date("d"));
    $pro_query = "SELECT * FROM products";
    $pro_result = mysqli_query($con, $pro_query);
    while ($pro_row = mysqli_fetch_array($pro_result)) {
        $cat_id = $pro_row["category_id"];
        $cat_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT *  FROM `category` WHERE category_id=$cat_id"));
        $item_type = "Items";
        if ($cat_det["unit"] == 2) {
            $item_type = "KG";
        } elseif ($cat_det["unit"] == 2) {
            $item_type = "L";
        }
        $pro_row_date = trim($pro_row["exp_date"]);
        $pro_row_pro_id = $pro_row["pro_id"];
        $type = 0;
        $previous_notified = false;
        $f_qty = floatval($pro_row["f_qty"]);
        $now_qty = floatval($pro_row["quantity"]);
        $percent = ($now_qty / $f_qty) * 100;

        if ($percent <= $percentage_less_than_one && $percent >= $percentage_more_than_one) {
            $type = 1;
        } elseif ($percent <= $percentage_less_than_two && $percent >= $percentage_more_than_two) {
            $type = 2;
        }

        if ($pro_row_date != null) {
            $exp_date = explode("-", $pro_row_date);
            if ($this_m == $exp_date[1] && $this_y == $exp_date[0]) {
                $date_gap = intval($exp_date[2]) - $this_d;
            } else {
                $date_gap = 0;
            }

            if ($date_gap > 0) {
                if ($date_gap <= $date_gap_less_than_one && $date_gap >= $date_gap_more_than_one) {
                    $type = 3;
                } else
                if ($date_gap <= $date_gap_less_than_two && $date_gap >= $date_gap_more_than_two) {
                    $type = 4;
                }
            }
        }

        if ($type > 0) {
            $notify_result = mysqli_query($con, "SELECT * FROM notify");
            while ($notify_row = mysqli_fetch_array($notify_result)) {
                $notified_date = explode(" ", $notify_row["date"])[0];
                $db_ymd = explode("-", $notified_date);
                $db_y = ($db_ymd[0]);
                $db_m = ($db_ymd[1]);
                $db_d = intval($db_ymd[2]);
                $is_this_mon_year = false;
                if ($this_m == $db_m && $this_y == $db_y) {
                    $is_this_mon_year = true;
                }

                if ($is_this_mon_year == true && (($db_d - $this_d) < $notified_again_in)) {
                    if ($pro_row_pro_id == $notify_row["pro_id"]) {
                        if ($notify_row["type"] == $type) {
                            $previous_notified = true;
                        }
                    }
                }
            }
        } else {
            $previous_notified = true;
        }

        if ($previous_notified != true) {
            if ($percent > 0) {
                $txt = "Has Only " . $percent . "% ( " . round(($f_qty - $now_qty), 3) . " " . $item_type . " Used )";
                /* QUANTITY --------------------------- */

                if ($percent <= $percentage_less_than_one && $percent >= $percentage_more_than_one) {
                    mysqli_query($con, "INSERT INTO notify(text,pro_id,date,type) VALUES('$txt',$pro_row_pro_id,'$notify_date',$type)");
                } elseif ($percent <= $percentage_less_than_two && $percent >= $percentage_more_than_two) {
                    mysqli_query($con, "INSERT INTO notify(text,pro_id,date,type) VALUES('$txt',$pro_row_pro_id,'$notify_date',$type)");
                }
            }
            /* -------------------------------------- */

            /* EXPIRED DATE --------------------------- */

            if ($pro_row_date != null) {
                $exp_date = explode("-", $pro_row_date);
                if ($this_m == $exp_date[1] && $this_y == $exp_date[0]) {
                    $date_gap = intval($exp_date[2]) - $this_d;
                } else {
                    $date_gap = 0;
                }
                if ($date_gap > 1) {
                    $txt = "Expired In " . $date_gap . " Days ( ".date('Y-m-d',strtotime("+$date_gap days"))." )";
                } elseif($date_gap == 1) {
                    $txt = "Expired In 1 Day ( ".date('Y-m-d',strtotime("+1 days"))." )";
                }
                elseif($date_gap == 0){
                    $txt = "Expired Today";
                }
                if ($date_gap >= 0) {
                    if ($date_gap <= $date_gap_less_than_one && $date_gap >= $date_gap_more_than_one) {
                        mysqli_query($con, "INSERT INTO notify(text,pro_id,date,type) VALUES('$txt',$pro_row_pro_id,'$notify_date',$type)");
                    } else
                    if ($date_gap <= $date_gap_less_than_two && $date_gap >= $date_gap_more_than_two) {
                        mysqli_query($con, "INSERT INTO notify(text,pro_id,date,type) VALUES('$txt',$pro_row_pro_id,'$notify_date',$type)");
                    }
                }
            }

            /* ----------------------------------- */
        }
    }
}