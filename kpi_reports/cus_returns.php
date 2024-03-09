<?php
session_start();
include '../valid_fun.php';
if (isset($_SESSION["type"]) && isset($_SESSION["id"])) {
    include '../dbconnect.php';
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Supplier Outstanding Report</title>
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
                    <div id="breadcrumb"> <a href="../dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom"><i class="icon-file"></i> Customer Return Report</a></div>
                </div>
                <div class="container-fluid">
                    <div class="quick-actions_homepage">
                        <ul class="quick-actions">
                            <li> <a href="../dashboard.php"> <i class="icon-dashboard"></i> My Dashboard </a> </li>
                            <li> <a href="#myModal" data-toggle="modal"> <i class="icon-search"></i>Filter Query </a> </li>
                            <li style="display: none" id="down_li"> <a id="down" href="#" target="_blank"> <i class="icon-download"></i>Download Report </a> </li>
                        </ul>
                        <div id="myModal" class="modal hide">
                            <div class="modal-header">
                                <h5>Search Customer Returns</h5>
                            </div>
                            <div class="modal-body">
                                <form method="get" class="form-horizontal">
                                    <div class="control-group">
                                        <label class="control-label">Date</label>
                                        <div class="controls">
                                            <input type="date" name="date" class="span3" />
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success" style="width:92%; margin-left: 6%;">Filter Query</button>
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
                                    <h5>Supplier Oustanding Report - <?php echo date("Y:m:d"); ?></h5>
                                </div>
                                <div class="widget-content nopadding">
                                    <table class="table table-bordered data-table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Product</th>
                                                <th>Buyed Date</th>
                                                <th>Returned Date</th>
                                                <th>Quantity</th>
                                                <th>Unit Price</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $index = 1;
                                            $result = mysqli_query($con, "SELECT * FROM `cus_returns`");
                                            if (isset($_GET['date']) && !empty($_GET['date'])) {
                                                $sel_date = trim($_GET['date']);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    $db_date = explode(" ", $row['returned_date'])[0];
                                                    if ($db_date == $sel_date) {
                                                        $pro_id = $row['pro_id'];
                                                        $pro_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `products` WHERE `pro_id`=\"$pro_id\""));
                                                        ?>
                                                        <tr>
                                                            <td><?= $index ?></td>
                                                            <td><?= $pro_det['product_name'] ?></td>
                                                            <td><?= $row['date'] ?></td>
                                                            <td><?= $db_date ?></td>
                                                            <td><?= $row['quantity'] ?></td>
                                                            <td><?= $row['unit_price'] ?></td>
                                                            <td><?= $row['total'] ?></td>
                                                        </tr>
                                                        <?php
                                                        $index++;
                                                    }
                                                }
                                            } else {
                                                while ($row = mysqli_fetch_array($result)) {
                                                    $pro_id = $row['pro_id'];
                                                    $pro_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `products` WHERE `pro_id`=\"$pro_id\""));
                                                    ?>
                                                    <tr>
                                                        <td><?= $index ?></td>
                                                        <td><?= $pro_det['product_name'] ?></td>
                                                        <td><?= $row['date'] ?></td>
                                                        <td><?= explode(" ", $row['returned_date'])[0] ?></td>
                                                        <td><?= $row['quantity'] ?></td>
                                                        <td><?= $row['unit_price'] ?></td>
                                                        <td><?= $row['total'] ?></td>
                                                    </tr>
                                                    <?php
                                                    $index++;
                                                }
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Product</th>
                                                <th>Buyed Date</th>
                                                <th>Returned Date</th>
                                                <th>Quantity</th>
                                                <th>Unit Price</th>
                                                <th>Total</th>
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