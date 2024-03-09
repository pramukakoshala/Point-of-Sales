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
                    <div id="breadcrumb"> <a href="../dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom"><i class="icon-file"></i> Supplier Oustanding Report</a></div>
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
                                <h5>Search your Supplier Outstanding</h5>
                            </div>
                            <div class="modal-body">
                                <form method="post" class="form-horizontal">
                                    <div class="control-group">
                                        <label class="control-label">Vendor ID</label>
                                        <div class="controls">
                                            <input type="number" name="ven_id" class="span3" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Vendor Name</label>
                                        <div class="controls">
                                            <input type="text" name="ven_name" class="span3" />
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
                                    <h5>Supplier Oustanding Report - <?php echo date("Y:m:d"); ?></h5>
                                </div>
                                <div class="widget-content nopadding">
                                    <table class="table table-bordered data-table">
                                        <thead>
                                            <tr>
                                                <th>Supplier Code</th>
                                                <th>supplier Name</th>
                                                <th>Bill Date</th>
                                                <th>Recipt No</th>
                                                <th>Item Count</th>
                                                <th>Bill Amount</th>
                                                <th>Paid Amount</th>
                                                <th>Oustanding</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (!isset($_POST["find"]) || (($_POST["ven_id"] == null) && ($_POST["ven_name"] == null))) {
                                                $tot = mysqli_fetch_row(mysqli_query($con, "SELECT MAX(id) FROM vendor_payment ORDER BY id DESC LIMIT 0, 100"))[0];
                                                while ($tot > 0) {
                                                    $p_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM vendor_payment WHERE id=$tot"));
                                                    if ($p_det != null) {
                                                        $v_id = $p_det["v_id"];
                                                        $ven_name = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM vendor WHERE v_id=$v_id"))["vendor_name"];
                                                        ?>
                                                        <tr class="gradeU">
                                                            <td># <?php echo $p_det["v_id"] ?></td>
                                                            <td><?php echo $ven_name ?></td>
                                                            <td><?php echo $p_det["date"] ?></td>
                                                            <td><?php echo $p_det["id"] ?></td>
                                                            <td><?php echo $p_det["item_count"] ?></td>
                                                            <td style="text-align: right;"><?php echo dotInput($p_det["bill_amount"]) ?></td>
                                                            <td style="text-align: right;"><?php echo dotInput($p_det["paid_amount"]) ?></td>
                                                            <td style="text-align: right;"><?php echo dotInput(intval($p_det["bill_amount"]) - intval($p_det["paid_amount"])) ?></td>

                                                        </tr>
                                                        <?php
                                                    }
                                                    $tot--;
                                                }
                                            } else {
                                                include 'filter_ven_ous.php';
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Supplier Code</th>
                                                <th>supplier Name</th>
                                                <th>Bill Date</th>
                                                <th>Recipt No</th>
                                                <th>Item Count</th>
                                                <th>Bill Amount</th>
                                                <th>Paid Amount</th>
                                                <th>Oustanding</th>
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
}else {
    header("location:../");
}