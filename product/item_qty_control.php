<?php
session_start();
include '../valid_fun.php';
if (isset($_SESSION["type"]) && isset($_SESSION["id"])) {
    include '../dbconnect.php';
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Quantity Control ( Item wise )</title>
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
                    <div id="breadcrumb"> <a href="../Dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom"><i class="icon-user"></i> Product Qty Control</a></div>
                </div>
                <div class="container-fluid">
                    <div class="row-fluid">
                        <div class="widget-box">
                            <div class="widget-title">
                                <span class="icon"><i class="icon-th"></i></span> 
                                <h5>Quantity Control (Item Wise)</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <table class="table table-bordered data-table">
                                    <thead>
                                        <tr>
                                            <th>Product Code</th>
                                            <th>Product Name</th>
                                            <th>Barcode</th>
                                            <th>Category</th>
                                            <th>Avil. Qty</th>
                                            <th>Dealer Price</th>
                                            <th>Unit Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT *  FROM `products`";
                                        $result = mysqli_query($con, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                            $cat_id = $row['category_id'];
                                            $sql = "SELECT * FROM category WHERE category_id=$cat_id";
                                            $result1 = mysqli_query($con, $sql);
                                            $row1 = mysqli_fetch_assoc($result1);
//                                                $v_id = $row['v_id'];
//                                                $sql1 = "SELECT * FROM vendor WHERE v_id=$v_id";
//                                                $result2 = mysqli_query($con, $sql1);
                                            ?>
                                            <tr class="gradeU">
                                                <td><?php echo getRefNo($row['pro_id']); ?></td>
                                                <td><?php echo $row['product_name']; ?></td>
                                                <td><?php echo $row['barcode']; ?></td>
                                                <td><?php echo $row1['name']; ?></td>
                                                <td><?php echo round(floatval($row['quantity']),3); ?></td>
                                                <td><?php echo dotInput($row['dealer_price']); ?></td>
                                                <td><?php echo dotInput($row['unit_price']); ?></td>
                                                <td>
                                                    <a onclick="window.open('control.php?p=<?php echo encrydata($row['pro_id']) ?>', '', 'scrollbars=yes,resizable=yes,width=826,height=518,top=65,left=300')" href="#" class="btn btn-success">Manage</a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Product Code</th>
                                            <th>Product Name</th>
                                            <th>Barcode</th>
                                            <th>Category</th>
                                            <th>Avil. Qty</th>
                                            <th>Dealer Price</th>
                                            <th>Unit Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
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