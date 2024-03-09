<?php
session_start();
include '../valid_fun.php';
if (isset($_SESSION["type"]) && isset($_SESSION["id"])) {
    include '../dbconnect.php';
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Customer Outstanding Report</title>
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
                <form method="post" action="../search_pages.php">
                    <input name="key" type="text" placeholder="Search here..."/>
                    <input style="display: none" name="pg" type="text" value="<?php echo strval($_SERVER['PHP_SELF']) ?>" hidden readonly required/>
                    <button type="submit" class="tip-left" title="Search"><i class="icon-search icon-white"></i></button>
                </form>
            </div>

            <div id="content">
                <div id="content-header">
                    <div id="breadcrumb"> <a href="../dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom"><i class="icon-file"></i> Customer Oustanding Report</a></div>
                </div>
                <div class="container-fluid">
                    <div class="quick-actions_homepage">
                        <ul class="quick-actions">
                            <li> <a href="../dashboard.php"> <i class="icon-dashboard"></i> My Dashboard </a> </li>
                            <li> <a href="#myModal" data-toggle="modal"> <i class="icon-search"></i>Filter Query </a> </li>
                            <li> <a id="down"  href="../pdf_output/cus_ous.php" target="_blank"> <i class="icon-download"></i>Download Report </a> </li>

                            <br>
                        </ul>
                        <div id="myModal" class="modal hide">
                            <div class="modal-header">
                                <h5>Filter Customer Outstanding Report</h5>
                            </div>
                            <div class="modal-body">
                                <form method="get" class="form-horizontal">
                                    <div class="control-group">
                                        <label class="control-label">Customer ID :</label>
                                        <div class="controls">
                                            <input type="text" name="cus_id" class="span3" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Customer Name :</label>
                                        <div class="controls">
                                            <input type="text" name="cus_name" class="span3" />
                                        </div>
                                    </div>
                                    <div class="control-group" hidden>
                                        <label class="control-label">Date</label>
                                        <div class="controls">
                                            <input type="date" name="cdate" class="span3" />
                                        </div>
                                    </div>
                                    <!--<div class="form-actions">-->
                                    <br><br>
                                    <button name="find" type="submit" class="btn btn-success" style="width:100%;">Filter Query</button>
                                    <!--</div>-->
                                    <br><br>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div class="row-fluid">
                            <div class="widget-box">
                                <div class="widget-title">
                                    <span class="icon"><i class="icon-th"></i></span> 
                                    <h5>Customer Oustanding Report - <?php echo date("Y:m:d"); ?></h5>
                                </div>
                                <div class="widget-content nopadding">
                                    <table class="table table-bordered data-table">
                                        <thead>
                                            <tr>
                                                <th>Customer Code</th>
                                                <th>Customer Name</th>
                                                <th>Total Amount</th>
                                                <th>Total Paid Amount</th>
                                                <th>Oustanding Amount</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (!isset($_GET["find"]) || ((trim($_GET["cus_id"]) == null) && (trim($_GET["cus_name"]) == null) && ($_GET["cdate"] == null))) {
                                                $sql3 = "SELECT * FROM customer WHERE c_id != 1 ORDER BY c_id DESC LIMIT 0,100";
                                                $result3 = mysqli_query($con, $sql3);
                                                while ($row3 = mysqli_fetch_assoc($result3)) {
                                                    $c_id = $row3['c_id'];
                                                    foreach ($con->query("SELECT c_id,SUM(total),SUM(paid_amount),SUM(balance) FROM transaction WHERE c_id=$c_id") as $row) {

                                                        $sum_tot = floatval($row['SUM(total)']);
                                                        $sum_pay = floatval($row['SUM(paid_amount)']);
                                                        $sum_bal = $sum_tot - $sum_pay;
                                                        if ($_SESSION["tax_active"] == 1) {
                                                            $temp_trans_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT c_id,SUM(total),SUM(paid_amount),SUM(balance) FROM temp_transaction WHERE c_id=$c_id"));
                                                            $sum_tot += floatval($temp_trans_det['SUM(total)']);
                                                            $sum_pay += floatval($temp_trans_det['SUM(paid_amount)']);
                                                            $sum_bal += (floatval($temp_trans_det['SUM(total)']) - floatval($temp_trans_det['SUM(paid_amount)']));
                                                        }
                                                        if ($sum_bal > 0) {
                                                            $sql1 = "SELECT * FROM customer WHERE c_id=$c_id";
                                                            $result2 = mysqli_query($con, $sql1);
                                                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                                                echo "<tr class='gradeU'>";
                                                                echo "<td>Cus-00" . $row2['c_id'] . "</td>";
                                                                echo "<td>" . $row2['customer_name'] . "</td>";
                                                                echo "<td>" . dotInput($sum_tot * cal_tot()) . "</td>";
                                                                echo "<td>" . dotInput($sum_pay * cal_tot()) . "</td>";
                                                                echo "<td>" . dotInput($sum_bal * cal_tot()) . "</td>";
                                                                ?>
                                                            <td>
                                                                <a class="btn-small btn-success" style="color: #fff;" href="../printing/example/interface/print_ous.php?c_id=<?php echo encrydata($row2['c_id']); ?>">Print</a>
                                                                <a class = "btn-small btn-primary" style = "color: #fff;" href = "#" onclick = "window.open('create_payment.php?c=<?php echo encrydata($row2['c_id']); ?>', '', 'scrollbars=yes,resizable=yes,width=800,height=500,top=65,left=450')">Create Payment</a>
                                                            </td>
                                                            <?php
                                                            echo "</tr>";
                                                        }
                                                    }
                                                }
                                            }
                                        } else {
                                            include 'filter_cus_ous.php';
                                        }
                                        ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Category Code</th>
                                                <th>Category Name</th>
                                                <th>Measurement Unit</th>
                                                <th>Product Count</th>
                                                <th>Remark</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
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
