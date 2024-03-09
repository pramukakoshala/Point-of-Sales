<?php
session_start();
$pages = ["dashboard", "notifications", "add products", "product maintainence", "add supplier", "supplier maintenance", "add customer", "customer maintenance", "billing", "costing report", "sales report", "profit report", "daily transaction", "customer oustanding", "supplier oustanding", "product category", "return stock", "quantity control", "barcode genarator"];
$page_urls = ["dashboard.php", "notify/alerts.php", "product/new_pro.php", "product/pro_main.php", "supplier/new_sup.php", "supplier/sup_main.php", "customer/new_cus.php", "customer/cus_main.php", "billing.php:B", "kpi_reports/costing_report.php", "kpi_reports/sales_report.php", "kpi_reports/profit_report.php", "kpi_reports/transaction_report.php", "kpi_reports/customer_oustanding.php", "kpi_reports/suuplier_oustanding.php", "product/category.php", "product/return_stock.php", "product/item_qty_control.php", 'bar/genarate.php:'];

include 'valid_fun.php';
if (isset($_SESSION["type"]) && isset($_SESSION["id"]) && isset($_POST["key"]) && $_POST["key"] != null && isset($_POST["pg"]) && $_POST["pg"] != null) {
    include 'dbconnect.php';
    $keyword = strtolower(trim($_POST["key"]));
    $full_url = $_POST["pg"];
    $tot_parts = count(explode("/", $full_url));

    $url = "geeksden_bookshop/";

    /* HANDLING HOME URL --------------------- */

    while (($tot_parts - 2) > 0) {
        $url = "../" . $url;
        $tot_parts--;
    }

    /* -----------------------------------END */

    $have_result = false;
    $index = 0;
    $l = count($pages);
    while ($l > 0) {
        if ($pages[$l - 1] == $keyword) {
            $index = $l - 1;
            $have_result = true;
            break;
        }
        $l--;
    }
    if ($have_result != true) {
        $url .= "index.php";
        header("location:$url");
    } else {
        $window_type = 1;
        $window_height = $window_width = 0;

        $have_window_type = false;
        $call_url = $page_urls[$index];
        $updated_url = "";
        $u_len = strlen($call_url);
        $is_new_tab = false;
        while ($u_len > 0) {

            if (($call_url[$u_len - 1] == "B") || ($call_url[$u_len - 1] == "S")) {
                if ($call_url[$u_len - 2] == ":") {
                    $have_window_type = true;
                    if ($call_url[$u_len - 1] == "B") {
                        $window_type = 2;
                    }
                    if ($call_url[$u_len - 1] == "S") {
                        $window_type = 1;
                    }
                }
            }
            if ($call_url[$u_len - 1] == ":") {
                $is_new_tab = true;
                $have_window_type = false;
            } else {
                if ($have_window_type != true) {
                    $updated_url = $call_url[$u_len - 1] . $updated_url;
                }
            }
            $u_len--;
        }
        if ($is_new_tab != true) {
            $url .= $page_urls[$index];
            header("location:$url");
        } else {
            $url .= $updated_url;
            if ($window_type == 2) {
                $window_height = 700;
                $window_width = 1900;
            } else {
                $window_height = 350;
                $window_width = 600;
            }
            ?>
            <script>
                var marginLeft = ((screen.width - parseInt('<?php echo $window_width ?>')) / 2).toFixed(0);
                var marginTop = ((screen.height - parseInt('<?php echo $window_height ?>')) / 2).toFixed(0);
                window.open('<?php echo $url ?>', '', 'scrollbars=yes,resizable=yes,width=<?php echo $window_width ?>,height=<?php echo $window_height ?>,top=' + marginTop + ',left=' + marginLeft);
                window.location.href = "<?php echo $full_url ?>";
            </script>
            <?php
            echo $url;
        }
    }
}