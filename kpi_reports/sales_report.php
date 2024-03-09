<?php
session_start();
include '../valid_fun.php';
if (isset($_SESSION["type"]) && isset($_SESSION["id"])) {
    include '../dbconnect.php';
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Product Sales Report</title>
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
                    <div id="breadcrumb"> <a href="../dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom"><i class="icon-file"></i> Product Sales Report</a></div>
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
                                    <li style="display: none" id="down_li"> <a id="down" href="#" target="_blank"> <i class="icon-download"></i>Download Report </a> </li>
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
                                    <a href="sales_report.php?d=<?= encrydata($row_dep['dep_id']) ?>"> Department : <?php echo $row_dep['name']; ?> </a>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                        <div id="myModal" class="modal hide">
                            <div class="modal-header">
                                <h5>Search Sales In your Shop</h5>
                            </div>
                            <div class="modal-body">
                                <form method="GET" class="form-horizontal">
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
                                        <label class="control-label">Select Product :</label>
                                        <div class="controls">
                                            <select style="width:82%;" name="pro_id">
                                                <option value="0">Select Product</option>
                                                <?php
                                                $query = "SELECT *  FROM `products`";
                                                $result = mysqli_query($con, $query);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?php echo encrydata($row['pro_id']); ?>"><?php echo $row['product_name']; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">From Date :</label>
                                        <div class="controls">
                                            <input type="date" name="from" class="span3" required/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">To Date :</label>
                                        <div class="controls">
                                            <input type="date" name="to" class="span3" required/>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button name="find" type="submit" class="btn btn-success" style="width:92%; margin-left: 6%;">Filter Query</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row-fluid">
                        <div class="widget-box">
                            <div class="widget-title">
                                <span class="icon"><i class="icon-th"></i></span> 
                                <h5>Product Sales Report - <?php echo date("Y:m:d"); ?></h5>
                            </div>
                            <div class="widget-content nopadding">
                                <?php if (isset($_GET["d"])) { ?>
                                    <table class="table table-bordered data-table">
                                        <?php
                                        if (isset($_GET["find"])) {

                                            $income = $qty = 0;

                                            $pro_id = validNumber(decrydata($_GET["pro_id"]), "../");
                                            $from = strtotime($_GET["from"]);
                                            $to = strtotime($_GET["to"]);
                                            $pro_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM products WHERE pro_id=$pro_id"));
                                            if ($pro_det != null) {
                                                $pro_id = $pro_det['pro_id'];
                                                $is_in_dp = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM pro_dep WHERE pro_id=$pro_id AND `dep_id`=\"$dep_id\""));
                                                if ($is_in_dp != null) {
                                                    $unit_price = floatval($pro_det["unit_price"]);
                                                    $dealer_price = floatval($pro_det["dealer_price"]);
                                                    $pro_name = ucwords($pro_det["product_name"]);
                                                    $cat_id = intval($pro_det["category_id"]);
                                                    $unit = intval(mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM category WHERE category_id=$cat_id"))["unit"]);
                                                    $type = "Item/s";
                                                    if ($unit == 2) {
                                                        $type = "Kilogram (KG)";
                                                    } elseif ($unit == 3) {
                                                        $type = "Liter (L)";
                                                    }
                                                    $income = 0;
                                                    $query = "SELECT * FROM sales_order WHERE pro_id=$pro_id";
                                                    $result = mysqli_query($con, $query);
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        $db_date = strtotime($row["date"]);
                                                        if ($db_date >= $from && $db_date <= $to) {
                                                            $qty = (floatval($row["quantity"]) * cal_tax($pro_det['v_id'], $con));
                                                            $income += floatval($row["unit_price"]) * $qty;
                                                        }
                                                    }
                                                    $expense = $qty * $dealer_price;
                                                    $profit = $income - $expense;
                                                    ?>
                                                    <tr class="gradeU">
                                                        <th>Product Code :</th>
                                                        <td>#<?php echo $pro_det["barcode"] ?></td>
                                                    </tr>
                                                    <tr class="gradeU">
                                                        <th>Product Name :</th>
                                                        <td><?php echo $pro_name ?></td>
                                                    </tr>
                                                    <tr class="gradeU">
                                                        <th>Time Period :</th>
                                                        <td><?php echo $_GET["from"] . " to " . $_GET["to"] ?></td>
                                                    </tr>
                                                    <tr class="gradeU">
                                                        <th>Sold Quantity In <?php echo $type ?> : </th>
                                                        <td><?php echo $qty ?></td>
                                                    </tr>
                                                    <tr class="gradeU">
                                                        <th>Sold Amount (LKR) :</th>
                                                        <td><?php echo dotInput($income) ?></td>
                                                    </tr>
                                                    <tr class="gradeU">
                                                        <th>Cost Of Sales (LKR) :</th>
                                                        <td><?php echo dotInput($expense) ?></td>
                                                    </tr>
                                                    <tr class="gradeU">
                                                        <th>Profit (LKR) :</th>
                                                        <td><?php echo dotInput($profit) ?></td>
                                                    </tr>
                                                    <script>
                                                        var dwn = document.getElementById("down");
                                                        dwn.href = "../pdf_output/sal_re.php?pro_id=<?php echo $pro_id ?>&from=<?php echo $_POST["from"] ?>&to=<?php echo $_POST["to"] ?>";
                                                        document.getElementById("down_li").style.display = "block";
                                                    </script>
                                                    <?php
                                                }
                                            }
                                        } else {
                                            ?>
                                            <thead>
                                                <tr>
                                                    <th>Code</th>
                                                    <th>Product Name</th>
                                                    <th>Sold Quantity</th>
                                                    <th>Sold Amount (LKR)</th>
                                                    <th>Cost Of Sales (LKR)</th>
                                                    <th>Profit (LKR)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $pro_query = "SELECT * FROM products ORDER BY pro_id DESC LIMIT 0,50";
                                                $pro_result = mysqli_query($con, $pro_query);
                                                while ($pro_row = mysqli_fetch_array($pro_result)) {
                                                    $qty = 0;
                                                    $pro_id = $pro_row["pro_id"];
                                                    $is_in_dp = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM pro_dep WHERE pro_id=$pro_id AND `dep_id`=\"$dep_id\""));
                                                    if ($is_in_dp != null) {

                                                        $unit_price = floatval($pro_row["unit_price"]);
                                                        $dealer_price = floatval($pro_row["dealer_price"]);
                                                        $pro_name = ucwords($pro_row["product_name"]);
                                                        $cat_id = intval($pro_row["category_id"]);
                                                        $unit = intval(mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM category WHERE category_id=$cat_id"))["unit"]);
                                                        $type = " Item/s";
                                                        if ($unit == 2) {
                                                            $type = " KG";
                                                        } elseif ($unit == 3) {
                                                            $type = " L";
                                                        }

                                                        $income = 0;
                                                        $query = "SELECT * FROM sales_order WHERE pro_id=$pro_id";
                                                        $result = mysqli_query($con, $query);
                                                        while ($row = mysqli_fetch_array($result)) {
                                                            $qty = (floatval($row["quantity"]) * cal_tax($pro_row['v_id'], $con));
                                                            $income += floatval($row["unit_price"]) * $qty;
                                                        }
                                                        $expense = $qty * $dealer_price;
                                                        $profit = $income - $expense;
                                                        ?>
                                                        <tr class="gradeU">
                                                            <td>#<?php echo $pro_row["barcode"] ?></td>
                                                            <td><?php echo $pro_name ?></td>
                                                            <td><?php echo round($qty, 3) . $type ?></td>
                                                            <td><?php echo dotInput(round($income, 2)) ?></td>
                                                            <td><?php echo dotInput(round($expense, 2)) ?></td>
                                                            <td><?php echo dotInput(round($profit, 2)) ?></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Product Code</th>
                                                    <th>Product Name</th>
                                                    <th>Sold Quantity</th>
                                                    <th>Sold Amount</th>
                                                    <th>Cost of Sales</th>
                                                    <th>Profit</th>
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
    <!--<script src="../js/select2.min.js"></script>--> 
    <script src="../js/jquery.dataTables.min.js"></script> 
    <script src="../js/maruti.js"></script> 
    <script src="../js/maruti.tables.js"></script>
    </body>
    </html>
    <?php
} else {
    header("location:../");
}