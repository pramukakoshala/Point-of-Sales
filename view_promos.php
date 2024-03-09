<?php
session_start();
include 'valid_fun.php';
if (isset($_SESSION["type"]) && isset($_SESSION["id"])) {
    include 'dbconnect.php';
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Product Costing Report</title>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <link rel="stylesheet" href="css/bootstrap.min.css" />
            <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
            <link rel="stylesheet" href="css/uniform.css" />
            <link rel="stylesheet" href="css/select2.css" />
            <link rel="stylesheet" href="css/maruti-style.css" />
            <link rel="stylesheet" href="css/maruti-media.css" class="skin-color" />
        </head>
        <body>

            <!--Header-part-->
            <div id="header">
                <h1><a href="dashboard.php">Familier Pos</a></h1>
            </div>

            <?php include 'nav_bar.php' ?>
            <div id="search">
                <form method="post" action="search_pages.php">
                    <input name="key" type="text" placeholder="Search here..."/>
                    <input style="display: none" name="pg" type="text" value="<?php echo strval($_SERVER['PHP_SELF']) ?>" hidden readonly required/>
                    <button type="submit" class="tip-left" title="Search"><i class="icon-search icon-white"></i></button>
                </form>
            </div>

            <div id="content">
                <div id="content-header">
                    <div id="breadcrumb"> <a href="dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom"><i class="icon-file"></i> Costing Report</a></div>
                </div>
                <div class="container-fluid">
                    <div class="quick-actions_homepage">
                        <ul class="quick-actions">
                            <li> <a href="dashboard.php"> <i class="icon-dashboard"></i> My Dashboard </a> </li>
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
                                    <table class="table table-bordered data-table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Vocher Code</th>
                                                <th>Value (LKR)</th>
                                                <th>Available Quantity</th>
                                                <th>Total Quantity</th>
                                                <th>Valid From</th>
                                                <th>Valid To</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = "SELECT * FROM promotions";
                                            $result = mysqli_query($con, $query);
                                            while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                <tr class="gradeU">
                                                    <td><?php echo $row["promo_id"] ?></td>
                                                    <td><?php echo $row["code"] ?></td>
                                                    <td><?php echo $row["value"] ?></td>
                                                    <td><?php echo $row["v_count"] ?></td>
                                                    <td><?php echo $row["o_count"] ?></td>
                                                    <td><?php echo $row["valid_from"] ?></td>
                                                    <td><?php echo $row["valid_to"] ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Vocher Code</th>
                                                <th>Value (LKR)</th>
                                                <th>Available Quantity</th>
                                                <th>Total Quantity</th>
                                                <th>Valid From</th>
                                                <th>Valid To</th>
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
    <script src="js/jquery.min.js"></script> 
    <script src="js/jquery.ui.custom.js"></script> 
    <script src="js/bootstrap.min.js"></script> 
    <script src="js/jquery.uniform.js"></script> 
    <script src="js/select2.min.js"></script> 
    <script src="js/jquery.dataTables.min.js"></script> 
    <script src="js/maruti.js"></script> 
    <script src="js/maruti.tables.js"></script>
    </body>
    </html>
    <?php
} else {
    header("location:../");
}