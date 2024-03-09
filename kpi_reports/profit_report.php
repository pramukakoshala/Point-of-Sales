<?php
session_start();
include '../valid_fun.php';
if (isset($_SESSION["type"]) && isset($_SESSION["id"])) {
    include '../dbconnect.php';
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Total Profit Report</title>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <link rel="stylesheet" href="../css/bootstrap.min.css" />
            <link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
            <link rel="stylesheet" href="../css/uniform.css" />
            <link rel="stylesheet" href="../css/select2.css" />
            <link rel="stylesheet" href="../css/maruti-style.css" />
            <link rel="stylesheet" href="../css/maruti-media.css" class="skin-color" />
        </head>
        <body>

            <!--Header-part-->
            <div id="header">
                <h1><a href="dashboard.php">Familier Pos</a></h1>
            </div>

            <?php include '../nav_bar_in_fold.php' ?>
            <div id="search">
                <input type="text" placeholder="Search here..."/>
                <button type="submit" class="tip-left" title="Search"><i class="icon-search icon-white"></i></button>
            </div>

            <div id="content">
                <div id="content-header">
                    <div id="breadcrumb"> <a href="../dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom"><i class="icon-file"></i> Total Profit Report</a></div>
                </div>
                <div class="container-fluid">
                    <div class="quick-actions_homepage">
                        <ul class="quick-actions">
                                    <li> <a href="#myModal" data-toggle="modal"> <i class="icon-search"></i>Filter Query </a> </li>
                                    <li id="down_li" style="display: none"> <a id="down" href="#" target="_blank"> <i class="icon-download"></i>Download Report </a> </li>
                            <br>
                            <?php
                            $query_dep = "SELECT * FROM `department`";
                            $result_dep = mysqli_query($con, $query_dep);
                            while ($row_dep = mysqli_fetch_array($result_dep)) {
                                ?>
                                <li>
                                    <a href="profit_report.php?d=<?= encrydata($row_dep['dep_id']) ?>"> Department : <?php echo $row_dep['name']; ?> </a>
                                </li>
                                <?php
                            }
                            if (isset($_GET["prof_type"]) && ($_SESSION["tax_active"] == 1)) {
                                $secret = 1;
                                ?>
                                <input type="hidden" name=prof_type" readonly >
                                <?php
                            }
                            ?>
                        </ul>
                        <div id="myModal" class="modal hide">
                            <div class="modal-header">
                                <h5>Search your Profit</h5>
                            </div>
                            <div class="modal-body">
                                <form method="get" class="form-horizontal">
                                    <?php
                                    if (isset($_GET["d"])) {
                                        $dep_id = decrydata($_GET["d"]);
                                        if ($dep_id > 0) {
                                            ?>
                                            <input type="hidden" value="<?= $_GET["d"] ?>" name="d" readonly >
                                            <?php
                                        }
                                    }
                                    ?>
                                    <div class="control-group">
                                        <label class="control-label">Date :</label>
                                        <div class="controls">
                                            <input type="date" name="sel_date" class="span3" required/>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button name="find" type="submit" class="btn btn-success" style="width:92%; margin-left: 6%;">Filter Query</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div class="row-fluid">
                            <div class="widget-box">
                                <div class="widget-title">
                                    <span class="icon"><i class="icon-th"></i></span> 
                                    <h5>Total Profit Report - <?php echo date("Y:m:d"); ?></h5>
                                </div>
                                <div class="widget-content nopadding">
                                    <?php if (isset($_GET["d"])) { ?>
                                        <table class="table table-bordered data-table">
                                            <?php
                                            $table = "`transaction`";
                                            if (isset($_GET["prof_type"]) && ($_SESSION["tax_active"] == 1)) {
                                                $table = "`temp_transaction`";
                                            }
                                            $date_arr = $sold_arr = $cost_arr = $ous_arr = [];
                                            if (isset($_GET["find"])) {
                                                $sel_date = trim($_GET["sel_date"]);
                                                $query = "SELECT * FROM $table WHERE `dep_id`=\"$dep_id\" ORDER BY t_id DESC";
                                                $result = mysqli_query($con, $query);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    $db_date = trim(explode(" ", $row["transaction_date"])[0]);
                                                    if ($db_date == $sel_date) {
                                                        $cost = 0;
                                                        $total = 0;
                                                        $db_date = trim(explode(" ", $row["transaction_date"])[0]);
                                                        $invoice = trim($row["invoice"]);
                                                        $sales_result = mysqli_query($con, "SELECT * FROM sales_order WHERE invoice=$invoice");
                                                        while ($sales_row = mysqli_fetch_assoc($sales_result)) {
                                                            $pro_id = intval($sales_row["pro_id"]);
                                                            $pro_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM products WHERE pro_id=$pro_id"));
                                                            if ($pro_det != null) {
                                                                $qty = ($sales_row["quantity"] * cal_tax($pro_det['v_id'], $con));
                                                                $cost += ($qty * floatval($pro_det["dealer_price"]));
                                                                $total += ($qty * floatval($sales_row["unit_price"]));
                                                            }
                                                        }
                                                        $l = count($date_arr);
                                                        $have_date = false;
                                                        $unic_index = 0;
                                                        while ($l > 0) {
                                                            if ($date_arr[$l - 1] == $db_date) {
                                                                $unic_index = $l - 1;
                                                                $have_date = true;
                                                                break;
                                                            }
                                                            $l--;
                                                        }

                                                        $oustanding = floatval($row["total"]) - floatval($row["paid_amount"]);

                                                        if ($have_date != true) {
                                                            $date_arr[] = $db_date;
                                                            $sold_arr[] = $total;
                                                            $cost_arr[] = $cost;
                                                            $ous_arr[] = $oustanding;
                                                        } else {
                                                            $sold_arr[$unic_index] += $total;
                                                            $cost_arr[$unic_index] += $cost;
                                                            $ous_arr[$unic_index] += $oustanding;
                                                        }
                                                    }
                                                }
                                                $total_days = count($date_arr);

                                                if ($total_days == 0) {
                                                    ?>
                                                    <tr class="gradeU">
                                                        <th>Date</th>
                                                        <td><?php echo $sel_date ?></td>
                                                    </tr>
                                                    <tr class="gradeU">
                                                        <th>Sold Amount (LKR) :</th>
                                                        <td><?php echo dotInput(0) ?></td>
                                                    </tr>
                                                    <tr class="gradeU">
                                                        <th>Cost Amount (LKR) :</th>
                                                        <td><?php echo dotInput(0) ?></td>
                                                    </tr>
                                                    <tr class="gradeU">
                                                        <th>Profit (LKR) :</th>
                                                        <td><?php echo dotInput(0) ?></td>
                                                    </tr>
                                                    <tr class="gradeU">
                                                        <th>Customer Outstanding (LKR)</th>
                                                        <td><?php echo dotInput(0) ?></td>
                                                    </tr>
                                                    <?php
                                                }
                                                while ($total_days > 0) {
                                                    ?>
                                                    <tr class="gradeU">
                                                        <th>Date</th>
                                                        <td><?php echo $date_arr[$total_days - 1] ?></td>
                                                    </tr>
                                                    <tr class="gradeU">
                                                        <th>Sold Amount (LKR) :</th>
                                                        <td><?php echo dotInput($sold_arr[$total_days - 1]) ?></td>
                                                    </tr>
                                                    <tr class="gradeU">
                                                        <th>Cost Amount (LKR) :</th>
                                                        <td><?php echo dotInput($cost_arr[$total_days - 1]) ?></td>
                                                    </tr>
                                                    <tr class="gradeU">
                                                        <th>Profit (LKR) :</th>
                                                        <td><?php echo dotInput(abs($sold_arr[$total_days - 1] - $cost_arr[$total_days - 1])) ?></td>
                                                    </tr>
                                                    <tr class="gradeU">
                                                        <th>Customer Outstanding (LKR)</th>
                                                        <td><?php echo dotInput($ous_arr[$total_days - 1]) ?></td>
                                                    </tr>
                                                    <script>
                                                        var dwn = document.getElementById("down");
                                                        dwn.href = "../pdf_output/profit_re.php?sel_date=<?php echo $sel_date ?>";
                                                        document.getElementById("down_li").style.display = "block";
                                                    </script>
                                                    <?php
                                                    $total_days--;
                                                }
                                            } else {
                                                $query = "SELECT * FROM $table WHERE `dep_id`=\"$dep_id\" ORDER BY t_id DESC LIMIT 0,100";
                                                $result = mysqli_query($con, $query);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    $cost = 0;
                                                    $total = 0;
                                                    $db_date = trim(explode(" ", $row["transaction_date"])[0]);
                                                    $invoice = trim($row["invoice"]);
                                                    $sales_result = mysqli_query($con, "SELECT * FROM sales_order WHERE invoice='$invoice'");
                                                    while ($sales_row = mysqli_fetch_assoc($sales_result)) {
                                                        $pro_id = intval($sales_row["pro_id"]);
                                                        $pro_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM products WHERE pro_id=$pro_id"));
                                                        if ($pro_det != null) {
                                                            $qty = floatval($sales_row["quantity"]) * cal_tax($pro_det['v_id'], $con);
                                                            $cost += ($qty * floatval($pro_det["dealer_price"]));
                                                            $total += ($qty * floatval($sales_row["unit_price"]));
                                                        }
                                                    }
                                                    $l = count($date_arr);
                                                    $have_date = false;
                                                    $unic_index = 0;
                                                    while ($l > 0) {
                                                        if ($date_arr[$l - 1] == $db_date) {
                                                            $unic_index = $l - 1;
                                                            $have_date = true;
                                                            break;
                                                        }
                                                        $l--;
                                                    }

                                                    $oustanding = floatval($row["total"]) - floatval($row["paid_amount"]);

                                                    if ($have_date != true) {
                                                        $date_arr[] = $db_date;
                                                        $sold_arr[] = $total;
                                                        $cost_arr[] = $cost;
                                                        $ous_arr[] = $oustanding;
                                                    } else {
                                                        $sold_arr[$unic_index] += $total;
                                                        $cost_arr[$unic_index] += $cost;
                                                        $ous_arr[$unic_index] += $oustanding;
                                                    }
                                                }
                                                $total_days = count($date_arr);
                                                if ($total_days > 0) {
                                                    ?>
                                                    <script>
                                                        var dwn = document.getElementById("down");
                                                        dwn.href = "../pdf_output/profit_re.php";
                                                        dwn.style.display = "block";
                                                    </script>
                                                <?php } ?>
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Sold Amount (LKR)</th>
                                                        <th>Cost Amount (LKR)</th>
                                                        <th>Profit (LKR)</th>
                                                        <th>Customer Outstanding (LKR)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    while ($total_days > 0) {
                                                        ?>
                                                        <tr class="gradeU">
                                                            <td><?php echo $date_arr[$total_days - 1] ?></td>
                                                            <td><?php echo dotInput($sold_arr[$total_days - 1]) ?></td>
                                                            <td><?php echo dotInput($cost_arr[$total_days - 1]) ?></td>
                                                            <td><?php echo dotInput(abs($sold_arr[$total_days - 1] - $cost_arr[$total_days - 1])) ?></td>
                                                            <td><?php echo dotInput($ous_arr[$total_days - 1]) ?></td>
                                                        </tr>
                                                        <?php
                                                        $total_days--;
                                                    }
                                                    ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Sold Amount</th>
                                                        <th>Cost Amount</th>
                                                        <th>Profit</th>
                                                        <th>Customer Oustanding</th>
                                                    </tr>
                                                </tfoot>
                                                <?php
                                            }
                                            ?>
                                        </table>
                                    <?php } else {
                                        ?>
                                        <br><br>
                                        <p align='center'>Please Select A Department</p>
                                        <br><br>
                                    <?php }
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
    <script src="../js/jquery.min.js"></script> 
    <script src="../js/jquery.ui.custom.js"></script> 
    <script src="../js/bootstrap.min.js"></script> 
    <script src="../js/jquery.uniform.js"></script> 
    <script src="../js/select2.min.js"></script> 
    <script src="../js/jquery.dataTables.min.js"></script> 
    <script src="../js/maruti.js"></script> 
    <script src="../js/maruti.tables.js"></script>
    </body>
    </html>
    <?php
} else {
    header("location:../");
}