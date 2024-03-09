<?php
session_start();
include '../valid_fun.php';
if (isset($_SESSION["type"]) && isset($_SESSION["id"])) {
    include '../dbconnect.php';
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Daily Transactions Report</title>
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
                    <div id="breadcrumb"> <a href="../dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom"><i class="icon-file"></i> Daily Transaction Report <?=(isset($_GET["trans_type"]) && ($_SESSION["tax_active"] == 1))?'( Temp )':null?></a></div>
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
                                    <a href="transaction_report.php?d=<?= encrydata($row_dep['dep_id']) ?>"> Department : <?php echo $row_dep['name']; ?> </a>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                        <div id="myModal" class="modal hide">
                            <div class="modal-header">
								<h5>Search Transactions In your Shop</h5>
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
                                    if (isset($_GET["trans_type"]) && ($_SESSION["tax_active"] == 1)) {
                                        $secret = 1;
                                        ?>
                                        <input type="hidden" name=trans_type" readonly >
                                        <?php
                                    }
                                    ?>
                                    <div class="control-group">
                                        <label class="control-label">Rec. No</label>
                                        <div class="controls">
                                            <input type="number" name="rec_no" class="span3" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Customer ID</label>
                                        <div class="controls">
                                            <input type="text" name="cus_id" class="span3" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Customer Name</label>
                                        <div class="controls">
                                            <input type="text" name="cus_name" class="span3" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Date</label>
                                        <div class="controls">
                                            <input type="date" name="cdate" class="span3" />
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
                                    <h5>Daily Transaction Report - <?php echo date("Y:m:d"); ?></h5>
                                </div>
                                <div class="widget-content nopadding">
                                    <?php if (isset($_GET["d"])) { ?>
                                        <table class="table table-bordered data-table">
                                            <thead>
                                                <tr>
                                                    <th>Reciept No.</th>
                                                    <th>Date</th>
                                                    <th>Products</th>
                                                    <th>Customer</th>
                                                    <th>Sub Total</th>
                                                    <th>Discount</th>
                                                    <th>Total</th>
                                                    <th>Paid Amount</th>
                                                    <th>Balance</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $table = "`transaction`";
                                                if (isset($_GET["trans_type"]) && ($_SESSION["tax_active"] == 1)) {
                                                    $table = "`temp_transaction`";
                                                }
                                                if (!isset($_GET["find"])) {
                                                    $query = "SELECT * FROM $table WHERE `dep_id`=\"$dep_id\" ORDER BY t_id DESC";
                                                    $result = mysqli_query($con, $query);
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $c_id = $row['c_id'];
                                                        $sql1 = "SELECT * FROM customer WHERE c_id=$c_id";
                                                        $result2 = mysqli_query($con, $sql1);
                                                        while ($row2 = mysqli_fetch_assoc($result2)) {
                                                            ?>
                                                            <tr class="gradeU">
                                                                <td># <?= $row['t_id']; ?></td>
                                                                <td><?php echo $row['transaction_date']; ?></td>
                                                                <td><a href="#" onclick="window.open('view_invoice.php?i=<?php echo ($row['invoice']); ?>', '', 'scrollbars=yes,resizable=yes,width=1920,height=1000,top=65,left=300')"><?php echo $row['invoice']; ?></a></td>
                                                                <td><?php echo $row2['customer_name']; ?></td>
                                                                <td style="text-align: right;"><?php echo floatval($row['sub_total']); ?></td>
                                                                <td style="text-align: right;"><?php echo floatval($row['discount']); ?></td>
                                                                <td style="text-align: right;"><?php echo floatval($row['total']); ?></td>
                                                                <td style="text-align: right;"><?php echo floatval($row['paid_amount']); ?></td>
                                                                <td style="text-align: right;"><?php echo floatval($row['balance']); ?></td>
                                                                <td>
                                                                    <a class="btn-small btn-warning" style="color: #fff;" href="../printing/example/interface/windows-usb.php?type=2&invoice=<?php echo $row['invoice']; ?>">Print</a>
                                                                    <a class="btn-small btn-success" href="#" onclick="window.open('print_resipt.php?i=<?php echo encrydata($row['t_id']); ?>', '', 'scrollbars=yes,resizable=yes,width=500,height=600,top=65,left=600')" style="color: #fff;">View</a>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                } else {
                                                    include 'filter_transaction.php';
                                                }
                                                ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Reciept No.</th>
                                                    <th>Date</th>
                                                    <th>Products</th>
                                                    <th>Customer</th>
                                                    <th>Sub Total</th>
                                                    <th>Discount</th>
                                                    <th>Total</th>
                                                    <th>Paid Amount</th>
                                                    <th>Balance</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
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
