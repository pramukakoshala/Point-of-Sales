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
                    <div id="breadcrumb"> <a href="../dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom"><i class="icon-file"></i> Fast Moving Item Report</a></div>
                </div>
                <div class="container-fluid">
                    <div class="quick-actions_homepage">
                        <ul class="quick-actions">
                            <li> <a href="../dashboard.php"> <i class="icon-dashboard"></i> My Dashboard </a> </li>
                            <?php
                            if (isset($_GET["d"])) {
                                $dep_id = decrydata($_GET["d"]);
                                if ($dep_id > 0) {
                                    ?>
                                    <li> <a href="#myModal" data-toggle="modal"> <i class="icon-search"></i>Filter Query </a> </li>
                                    <li id="down_li" style="display: none"> <a id="down" href="#" target="_blank"> <i class="icon-download"></i>Download Report </a> </li>
                                    <?php
                                }
                            }
                            ?>
                            <br>
                            <?php
                            $query_dep = "SELECT * FROM `department`";
                            $result_dep = mysqli_query($con, $query_dep);
                            while ($row_dep = mysqli_fetch_array($result_dep)) {
                                ?>
                                <li>
                                    <a href="fast_moving.php?d=<?= encrydata($row_dep['dep_id']) ?>"> Department : <?php echo $row_dep['name']; ?> </a>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                        <div id="myModal" class="modal hide">
                            <div class="modal-header">
								<h5>Search Fast Moving Items<h5>
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
                                        <label class="control-label">From Date :</label>
                                        <div class="controls">
                                            <input type="date" name="from_date" class="span3" required/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">To Date :</label>
                                        <div class="controls">
                                            <input type="date" name="to_date" class="span3" required/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Select Quantity</label>
                                        <div class="controls">
                                            <select  style="width:82%;" name="quantity">
                                                <option value="1">10</option>
                                                <option value="2">20</option>
                                                <option value="3">50</option>
                                                <option value="4">100</option>
                                                <option value="5">More Than 100</option>
                                            </select>
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
                                    <h5>Fast Moving Report : <span id="FTdate"></span></h5>
                                </div>
                                <div class="widget-content nopadding">
                                    <?php if (isset($_GET["d"])) { ?>
                                        <table class="table table-bordered data-table">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Sold Items</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            $pro_names = $pro_qty = $pro_tot = [];
                                            if (isset($_GET["find"])) {
                                                ?>
                                                <script>
                                                    document.getElementById('FTdate').innerHTML = '<?= $_GET['from_date'] . " - " . $_GET['to_date'] ?>';
                                                </script>
                                                <?php
                                                $quantity = intval($_GET['quantity']);
                                                $from_date = strtolower(trim($_GET['from_date']));
                                                $to_date = strtolower(trim($_GET['to_date']));
                                                $pro_re = mysqli_query($con, "SELECT * FROM products");
                                                while ($row = mysqli_fetch_array($pro_re)) {
                                                    $pro_id = $row['pro_id'];
                                                    $is_in_dp = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM pro_dep WHERE pro_id=$pro_id AND `dep_id`=\"$dep_id\""));
                                                    if ($is_in_dp != null) {
                                                        $qty = $pro_amount = 0;
                                                        $name = ucwords(trim($row['product_name']));
                                                        $pro_names[] = $name;
                                                        $sales_re = mysqli_query($con, "SELECT * FROM sales_order WHERE pro_id=\"$pro_id\"");
                                                        while ($sales_row = mysqli_fetch_array($sales_re)) {
                                                            $sal_date = strtolower($sales_row['date']);
                                                            if (($sal_date >= $from_date) && ($sal_date <= $to_date)) {
                                                                $sal_qty = floatval($sales_row['quantity']) * cal_tax($row['v_id'], $con);
                                                                $qty += $sal_qty;
                                                                $pro_amount += (floatval($sales_row['unit_price']) * $sal_qty);
                                                            }
                                                        }
                                                        $pro_qty[] = $qty;
                                                        $pro_tot[] = $pro_amount;
                                                    }
                                                }
                                            }
                                            $l = count($pro_qty);
                                            while ($l > 0) {
                                                if ($pro_qty[$l - 1] > 0) {
                                                    ?>
                                                    <tr>
                                                        <td><?= $pro_names[$l - 1] ?></td>
                                                        <td><?= $pro_qty[$l - 1] ?></td>
                                                        <td><?= $pro_tot[$l - 1] ?></td>
                                                    </tr>
                                                    <?php
                                                }
                                                $l--;
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
    <script src="../js/jquery.dataTables.min.js"></script> 
    <script src="../js/maruti.js"></script> 
    <script src="../js/maruti.tables.js"></script>
    </body>
    </html>
    <?php
} else {
    header("location:../");
}