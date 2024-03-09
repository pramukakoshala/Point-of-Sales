<?php
session_start();
include 'valid_fun.php';
if (isset($_SESSION["type"]) && isset($_SESSION["id"])) {
    include 'dbconnect.php';
    if ($_SESSION["type"] != 3) {
        header("location:index.php");
    }

    $total_past_days = 10;
    ?>
    <!DOCTYPE html>
    <html lang="en" id="html">
        <head>
            <title>Dashboard</title>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <link rel="stylesheet" href="css/bootstrap.min.css" />
            <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
            <link rel="stylesheet" href="css/maruti-style.css" />
            <link rel="stylesheet" href="css/maruti-media.css" class="skin-color" />
        </head>
        <body>

            <!--Header-part-->
            <div id="header">
                <h1><a href="dashboard.php">Tritcal</a></h1>
            </div>
            <?php include 'nav_bar.php' ?>

            <div id="search">
                <form method="post" action="search_pages.php">
                    <input name="key" type="text" placeholder="Search here..."/>
                    <input style="display: none" name="pg" type="text" value="<?php echo strval($_SERVER['PHP_SELF']) ?>" hidden readonly required/>
                    <button type="submit" class="tip-left" title="Search"><i class="icon-search icon-white"></i></button>
                </form>
            </div>
            <!--close-top-Header-menu-->


            <div id="content">
                <div id="content-header">
                    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Dashboard</a> </div>
                </div>
                <div class="container-fluid">
                    <div class="quick-actions_homepage">
                        <ul class="quick-actions">
                            <li> <a href="#"> <i class="icon-dashboard"></i> My Dashboard </a> </li>
                            <li> <a href="product/pro_main.php"> <i class="icon-shopping-bag"></i> Stock Management</a> </li>
                            <li> <a href="notify/alerts.php"> <i class="icon-web"></i> Alerts </a> </li>
                            <li> <a href="customer/cus_main.php"> <i class="icon-people"></i> Manage Customers </a> </li>
                            <li> <a href="kpi_reports/costing_report.php"> <i class="icon-calendar"></i> Manage Reports </a> </li>
                        </ul>
                    </div>

                    <div class="row-fluid">
                        <div class="widget-box">
                            <div class="widget-title"><span class="icon"><i class="icon-tasks"></i></span>
                                <h5>Income & Oustanding</h5>
                                <div class="buttons">
                                    <?php
//                                    echo date('Y-m-d', strtotime("-$total_past_days days")) . " > " . date("Y-m-d");
                                    ?>
                                </div>
                            </div>
                            <div class="widget-content">
                                <div class="row-fluid">
                                    <div class="span8">
                                        <div class="widget-content">
                                            <div class="bars"></div>
                                        </div>
                                    </div>
                                    <?php
                                    $tot_item_cost = 0;
                                    $tot_sale = floatval(mysqli_fetch_assoc(mysqli_query($con, "SELECT SUM(total) FROM sales_order"))["SUM(total)"]);
                                    $ous_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT SUM(paid_amount),SUM(total) FROM transaction WHERE c_id != 1"));
                                    $tot_ous = floatval($ous_det['SUM(total)']) - floatval($ous_det['SUM(paid_amount)']);
                                    $ven_sup_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT SUM(bill_amount),SUM(paid_amount) FROM vendor_payment"));
                                    $ven_ous = floatval($ven_sup_det["SUM(bill_amount)"]) - floatval($ven_sup_det["SUM(paid_amount)"]);

                                    $sales_result = mysqli_query($con, "SELECT * FROM sales_order");
                                    while ($sales_row = mysqli_fetch_array($sales_result)) {
                                        $pro_id = intval($sales_row["pro_id"]);
                                        if ($pro_id > 0) {
                                            $sales_row_qty = floatval($sales_row["quantity"]);
                                            $pro_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM products WHERE pro_id=$pro_id"));
                                            $tot_item_cost += (floatval($pro_det["dealer_price"]) * $sales_row_qty);
                                        }
                                    }

                                    $str = "";
                                    while ($total_past_days > 0) {
                                        $that_day = strval(date('Y-m-d', strtotime("-$total_past_days days")));
                                        $tot_sale_per_day = dotInput(mysqli_fetch_assoc(mysqli_query($con, "SELECT SUM(total) FROM sales_order WHERE date='$that_day'"))["SUM(total)"]);
                                        $str .= $tot_sale_per_day;
                                        if ($total_past_days > 1) {
                                            $str .= ",";
                                        }
                                        $total_past_days--;
                                    }
                                    ?>
                                    <div class="span4">
                                        <ul class="stat-boxes2">
                                            <li>
                                                <div class="left peity_bar_neutral"><span><span style="display: none;">2,4,9,7,12,10,15</span>
                                                        <canvas width="50" height="24"></canvas>
                                                    </span></div>
                                                <div class="right"> <strong><?= number_format((floatval($tot_sale)), 2, ".", ",") ?></strong> Total Sale </div>
                                            </li>
                                            <li>
                                                <div class="left peity_line_neutral"><span><span style="display: none;">10,15,8,14,13,10,10,15</span>
                                                        <canvas width="50" height="24"></canvas>
                                                    </span></div>
                                                <div class="right"> <strong><?= number_format((floatval($tot_ous)), 2, ".", ",") ?></strong> Customer Oustanding </div>
                                            </li>
                                            <li>
                                                <div class="left peity_bar_bad"><span><span style="display: none;">3,5,6,16,8,10,6</span>
                                                        <canvas width="50" height="24"></canvas>
                                                    </span></div>
                                                <div class="right"> <strong><?= number_format((floatval($ven_ous)), 2, ".", ",") ?></strong> Supplier Oustanding</div>
                                            </li>
                                            <li>
                                                <div class="left peity_line_good"><span><span style="display: none;">12,6,9,13,14,10,17</span>
                                                        <canvas width="50" height="24"></canvas>
                                                    </span></div>
                                                <div class="right"> <strong><?= number_format((floatval(($tot_sale - ( $tot_item_cost)))), 2, ".", ",") ?></strong> Total Profit</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row-fluid">
                        <div class="span6">
                            <div class="widget-box">
                                <div class="widget-title"><span class="icon"><i class="icon-file"></i></span>
                                    <h5>Spplier Oustanding Bill</h5>
                                </div>
                                <div class="widget-content nopadding updates">
                                    <?php
                                    $ous_total = 5;
                                    $sup_acc_query = "SELECT * FROM vendor_payment";
                                    $sup_acc_result = mysqli_query($con, $sup_acc_query);
                                    while ($sup_acc_row = mysqli_fetch_array($sup_acc_result)) {
                                        $db_date = explode("-", $sup_acc_row["date"]);
                                        $bill_amount = floatval($sup_acc_row["bill_amount"]);
                                        $paid_amount = floatval($sup_acc_row["paid_amount"]);
                                        $v_id = $sup_acc_row["v_id"];
                                        $ven_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM vendor WHERE v_id=$v_id"));
                                        if (($bill_amount > $paid_amount) && $ous_total > 0) {
                                            ?>
                                            <div class="new-update clearfix"> 
                                                <i class="icon-move"></i> 
                                                <span class="update-notice"> <a title="" href="#"><strong><?php echo ucwords($ven_det["vendor_name"]) ?></strong></a> 
                                                    <span>You Have To Pay LKR <?= number_format((floatval($bill_amount - $paid_amount)), 2, ".", ",") ?> . Bill Ref. No, <b><?php echo $sup_acc_row["ref_no"] ?></b></span> 
                                                </span> 
                                                <span class="update-date"><span class="update-day"><?php echo $db_date[2] ?></span><?php echo ucwords(getMonthName($db_date[1])) ?></span> 
                                            </div>
                                            <?php
                                            $ous_total--;
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="widget-box">
                                <div class="widget-title"> <span class="icon"> <i class="icon-refresh"></i> </span>
                                    <h5>Notification Updates</h5>
                                </div>
                                <div class="widget-content nopadding updates">
                                    <?php
                                    $read_query = "SELECT * FROM notify WHERE status=0 LIMIT 0,5";
                                    $read_result = mysqli_query($con, $read_query);
                                    while ($read_row = mysqli_fetch_array($read_result)) {
                                        $db_date = explode("-", explode(" ", $read_row["date"])[0]);
                                        $db_day = $db_date[2];
                                        $db_mon = $db_date[1];
                                        $pro_id = $read_row["pro_id"];
                                        $pro_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM products WHERE pro_id=$pro_id"));
                                        ?>
                                        <div class="new-update clearfix"> 
                                            <i class="icon-question-sign"></i> 
                                            <span class="update-notice"> <a onclick="window.open('product/control.php?p=<?php echo encrydata($pro_id) ?>', '', 'scrollbars=yes,resizable=yes,width=826,height=518,top=65,left=450')" href="#"><strong><?php echo ucwords($pro_det["product_name"]); ?></strong></a> 
                                                <span><?php echo ucwords($read_row["text"]); ?></span> </span> 
                                            <span class="update-date">
                                                <span class="update-day"><?php echo $db_day ?></span>
                                                <?php echo ucwords(getMonthName($db_mon)) ?>
                                            </span> 
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div id="footer" class="span12"> 2014 - <?php echo date("Y"); ?> &copy; Familier POS. Develop by <a href="https://tritcal.com">Tritcal International (Pvt) Ltd</a> </div>
    </div>

    <script src="js/excanvas.min.js"></script> 
    <script src="js/jquery.min.js"></script> 
    <script src="js/jquery.ui.custom.js"></script> 
    <script src="js/bootstrap.min.js"></script> 
    <script src="js/jquery.flot.min.js"></script> 
    <script src="js/jquery.flot.resize.min.js"></script> 
    <script src="js/jquery.peity.min.js"></script> 
    <script src="js/maruti.js"></script> 
    <script> var days_sales = [<?php echo $str ?>];</script>
    <script src="js/maruti.dashboard.js"></script> 
    <script src="js/maruti.chat.js"></script> 
    <script>
                                            //                                                $(document).ready(function () {
                                            $.ajax({
                                                url: "check_notifications.php",
                                                Type: "GET",
                                                data: {'check': 1},
                                                success: function () {}
                                            });
                                            //                                                });
    </script>
    </body>
    </html>
    <?php
} else {
    header("location:logout.php");
}    