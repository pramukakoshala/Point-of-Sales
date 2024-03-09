<?php

function getMonthName($mon) {
    $months = array(1 => 'Jan.', 2 => 'Feb.', 3 => 'Mar.', 4 => 'Apr.', 5 => 'May', 6 => 'Jun.', 7 => 'Jul.', 8 => 'Aug.', 9 => 'Sep.', 10 => 'Oct.', 11 => 'Nov.', 12 => 'Dec.');
    return $months[intval($mon)];
}

function encrydata($data) {
    $is_int = intval($data);
    if ($is_int != 0) {
        $data *= 177989;
    }
    return strtr(base64_encode($data), '+/=', '-_,');
}

function decrydata($data) {
    $dec_data = base64_decode(strtr($data, '-_,', '+/='));
    $is_int = intval($dec_data);
    if ($is_int != 0) {
        $is_int /= 177989;
        return $is_int;
    } else {
        return $dec_data;
    }
}

function check_no($data) {
    $data = "/" . $data . "/";
    $tot_let = strlen($data);
    $i = 0;
    $beg_pos = $end_pos = $no = null;
    $num = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
    while ($i < $tot_let) {
        $l = count($num);
        while ($l > 0) {
            if ($data[$i] == $num[$l - 1]) {
                $beg_pos = $i;
                break;
            }
            $l--;
        }
        if ($beg_pos != null) {
            break;
        }
        $i++;
    }
    if ($beg_pos != null) {
        $loop_back = $beg_pos;
        while ($loop_back < $tot_let) {
            $l = count($num);
            $have = false;
            while ($l > 0) {
                if ($data[$loop_back] == $num[$l - 1]) {
                    $have = true;
                }
                if ($l == 1 && $have == false) {
                    $end_pos = $loop_back;
                }
                $l--;
            }
            if ($end_pos != null) {
                break;
            }
            $loop_back++;
        }
    }
    while ($beg_pos < $end_pos) {
        $no .= $data[$beg_pos];
        $beg_pos++;
    }
    return intval(trim($no));
}

function valid($data) {
    if (preg_match("/^[a-z.A-Z@0-9-_ ]*$/", trim($data))) {
        return true;
    } else {
        return false;
    }
}

function validString($data) {
    if (!preg_match("/^[a-z#A-Z-0-9_ ]*$/", $data)) {
        return FALSE;
    } else {
        $data = trim($data);
        if ($data != null) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}

function validNumber($data, $link) {
    if (!preg_match("/^[0-9]*$/", $data)) {
        ?>
        <script>
            window.location.href = "<?php echo $link ?>";
        </script>
        <?php
    } else {
        return $data;
    }
}

function getRefNo($data) {
    $int_data = intval((floatval($data) * 999) / 30);
    return intval($int_data);
}

function validRefNo($data) {
    $int_data = intval((floatval($data) * 30) / 999);
    return intval($int_data);
}

function dotInput($text) {
    $t = strval($text);
    $l = strlen($t);
    $have_dot = false;
    while ($l > 0) {
        if ($t[$l - 1] == ".") {
            $have_dot = true;
            break;
        }
        $l--;
    }
    if ($have_dot == false) {
        $t .= ".00";
    }
    return $t;
}

/* USER ACCESS SETTINGS----------------------------------------------------------------------------------------------------------- */

/* PAGES, OPENED IN NEW WINDOW ------------------------------------ */

$window_pages = ["billing.php", "do_payment.php", "control.php", "view_invoice.php", "print_resipt.php", "return_goods.php", "genarate.php"];

/* ------------------------------------------------------------END */

function find_pages($arr, $url) {

    $have_permission = false;
    $features = [];
    $features[] = "dashboard.php";
    $features[] = "check_notifications.php";
    $features[] = "search_pages.php";
    $features[] = "create_payment.php";
    if ($arr["customer_maintain"] == 1) {
        $features[] = "cus_main.php";
        $features[] = "edit_cus.php";
        $features[] = "new_cus.php";
        $features[] = "del_cus.php";
    }
    if ($arr["barcode_gen"] == 1) {
        $features[] = "barcode.php";
        $features[] = "genarate.php";
        $features[] = "barcode128.php";
    }
    if ($arr["settings"] == 1) {
        $features[] = "autharization.php";
    }
    if ($arr["supplier_maintain"] == 1) {
        $features[] = "sup_main.php";
        $features[] = "edit_sup.php";
        $features[] = "new_sup.php";
    }
    if ($arr["product_maintain"] == 1) {
        $features[] = "pro_main.php";
        $features[] = "category.php";
        $features[] = "edit_cat.php";
        $features[] = "new_pro.php";
        $features[] = "edit_pro.php";
        $features[] = "del_pro.php";
    }
    if ($arr["return_stock"] == 1) {
        $features[] = "return_stock.php";
    }
    if ($arr["qty_manage"] == 1) {
        $features[] = "bill_qty_control.php";
        $features[] = "control.php";
        $features[] = "delete_qty_row.php";
        $features[] = "get_pro_det.php";
        $features[] = "hand_over.php";
        $features[] = "item_qty_control.php";
    }
    if ($arr["notifications"] == 1) {
        $features[] = "alerts.php";
        $features[] = "del_not.php";
        $features[] = "red_not.php";
        $features[] = "getVendorRef.php";
        $features[] = "getVendorOus.php";
        $features[] = "do_payment.php";
    }
    if ($arr["costing_re"] == 1) {
        $features[] = "costing_report.php";
        $features[] = "costing_re.php";
    }
    if ($arr["sales_re"] == 1) {
        $features[] = "sales_report.php";
        $features[] = "sal_re.php";
    }
    if ($arr["profit_re"] == 1) {
        $features[] = "profit_report.php";
        $features[] = "profit_re.php";
    }
    if ($arr["transactions_re"] == 1) {
        $features[] = "transaction_report.php";
        $features[] = "transaction.php";
        $features[] = "view_invoice.php";
        $features[] = "print_resipt.php";
        $features[] = "cus_returns.php";
    }
    if ($arr["cus_ous_re"] == 1) {
        $features[] = "customer_oustanding.php";
        $features[] = "cus_payment.php";
        $features[] = "cus_ous.php";
    }
    if ($arr["billings"] == 1) {
        $features[] = "billing.php";
        $features[] = "pay_vocher.php";
        $features[] = "view_promos.php";
        $features[] = "add_trans_fun.php";
        $features[] = "incoming.php";
        $features[] = "del_sales_row.php";
        $features[] = "pro_main.php";
        $features[] = "cus_oustanding.php";
        $features[] = "max_quantity.php";
        $features[] = "unit_price.php";
        $features[] = "return_goods.php";
        $features[] = "windows-usb.php";
    }
    if ($arr["sup_ous_re"] == 1) {
        $features[] = "suuplier_oustanding.php";
        $features[] = "ven_ous.php";
    }
    if ($arr["fast_moving_re"] == 1) {
        $features[] = "fast_moving.php";
    }
    if ($arr["dep_main"] == 1) {
        $features[] = "new_dep.php";
        $features[] = "dep_main.php";
        $features[] = "edit_dep.php";
    }
    $l = count($features);
    while ($l > 0) {
        if ($features[$l - 1] == $url) {
            $have_permission = true;
            break;
        }
        $l--;
    }
    return $have_permission;
}

function UserPermission($user_id, $con) {
    global $window_pages;

    $full_url = strval($_SERVER['PHP_SELF']);
    $tot_parts = count(explode("/", $full_url));

    $url = "index.php";

    /* HANDLING HOME URL --------------------- */

    while (($tot_parts - 3) > 0) {
        $url = "../" . $url;
        $tot_parts--;
    }

    /* -----------------------------------END */

    $current_page = basename($_SERVER['PHP_SELF']);
    $id = validNumber($user_id, $url);
    $user_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM users WHERE id=$id"));
    if ($user_det != null) {
        $user_features = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM user_features WHERE id=$id"));
        if ($user_features != null) {
            if (find_pages($user_features, $current_page)) {
                
            } else {
                $is_window_page = false;
                $win_len = count($window_pages);
                while ($win_len > 0) {
                    if ($current_page == $window_pages[$win_len - 1]) {
                        $is_window_page = true;
                    }
                    $win_len--;
                }
                if ($is_window_page != true) {
                    header("location:$url");
                } else {
                    ?>
                    <script>
                        window.close("");
                    </script>
                    <?php
                }
            }
        } else {
            header("location:$url");
        }
    } else {
        header("location:$url");
    }
}

function tax_rate_min($v_id, $con) {
    $supplier = "SELECT tax_rate FROM vendor WHERE v_id=$v_id";
    $result = mysqli_query($con, $supplier);
    $res = mysqli_fetch_assoc($result);
    return $res['tax_rate'];
}

$con = mysqli_connect('localhost', 'root', '', 'post_pre') or die('Unable To connect');

function cal_tax($v_id, $con) {
    global $con;
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if ($_SESSION["tax_active"] != 1) {
        $result = mysqli_query($con, "SELECT tax_rate FROM vendor WHERE v_id=$v_id");
        $rate = floatval(mysqli_fetch_assoc($result)['tax_rate']);
        if ($rate > 0) {
            return $rate / 100;
        } else {
            return 1;
        }
    } else {
        return 1;
    }
}

function cal_tot() {
    global $con;
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if ($_SESSION["tax_active"] != 1) {
        $result = mysqli_query($con, "SELECT * FROM settings WHERE set_id=1");
        $rate = floatval(mysqli_fetch_assoc($result)['trans_rate']);
        if ($rate > 0) {
            return $rate / 100;
        } else {
            return 1;
        }
    } else {
        return 1;
    }
}

function cal_trans() {
    global $con;
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if ($_SESSION["tax_active"] != 1) {
        $result = mysqli_query($con, "SELECT * FROM settings WHERE set_id=1");
        $rate = floatval(mysqli_fetch_assoc($result)['bill_rate']);
        if ($rate > 0) {
            return $rate / 100;
        } else {
            return 1;
        }
    } else {
        return 1;
    }
}

UserPermission($_SESSION["id"], $con);

/* ------------------------------------------------------------------------------------------------------------------------- END */