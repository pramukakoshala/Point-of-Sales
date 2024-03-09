<?php
session_start();
include '../valid_fun.php';
if (isset($_SESSION["type"]) && isset($_SESSION["id"])) {
    include '../dbconnect.php';
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Product Costing Report</title>
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
                    <div id="breadcrumb"> <a href="../dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom"><i class="icon-file"></i> Costing Report</a></div>
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
                                    <li> <a href="../pdf_output/costing_re.php?d=<?= $_GET["d"] ?>" target="_blank"> <i class="icon-download"></i>Download Report </a> </li>
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
                                    <a href="costing_report.php?d=<?= encrydata($row_dep['dep_id']) ?>"> Department : <?php echo $row_dep['name']; ?> </a>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>

                    <div class="container-fluid">
                        <div class="row-fluid">
                            <div class="widget-box">
                                <div class="widget-title">
                                    <span class="icon"><i class="icon-th"></i></span> 
                                    <h5>Costing Report - <?php echo date("Y:m:d"); ?></h5>
                                </div>
                                <div class="widget-content nopadding">
                                    <?php
                                    if (isset($_GET["d"])) {
                                        $dep_id = decrydata($_GET["d"]);
                                        if ($dep_id > 0) {
                                            ?>
                                            <table class="table table-bordered data-table">
                                                <thead>
                                                    <tr>
                                                        <th>Product Code</th>
                                                        <th>Product Name</th>
                                                        <th>Supplier</th>
                                                        <th>Quantity</th>
                                                        <th>Dealer Price</th>
                                                        <th>Unit Price</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $query = "SELECT * FROM products";
                                                    $result = mysqli_query($con, $query);
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        $pro_id = $row['pro_id'];
                                                        $is_in_dp = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM pro_dep WHERE pro_id=$pro_id AND `dep_id`=\"$dep_id\""));
                                                        if ($is_in_dp != null) {
                                                            $ven_id = intval($row["v_id"]);
                                                            $vendor = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM vendor WHERE v_id=$ven_id"))["vendor_name"];
                                                            ?>
                                                            <tr class="gradeU">
                                                                <td><?php echo $row["barcode"] ?></td>
                                                                <td><?php echo $row["product_name"] ?></td>
                                                                <td><?php echo ucwords($vendor) ?></td>
                                                                <td><?php echo round(floatval($row["quantity"]) * cal_tax($ven_id, $con), 3) ?></td>
                                                                <td><?php echo dotInput($row["dealer_price"]) ?></td>
                                                                <td><?php echo dotInput($row["unit_price"]) ?></td>
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
                                                        <th>Supplier</th>
                                                        <th>Quantity</th>
                                                        <th>Dealer Price</th>
                                                        <th>Unit Price</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <br><br>
                                        <p align='center'>Please Select A Department</p>
                                        <br><br>
                                    <?php } ?>
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