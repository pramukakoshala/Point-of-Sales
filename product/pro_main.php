<?php
session_start();
include '../valid_fun.php';
if (isset($_SESSION["type"]) && isset($_SESSION["id"])) {
    include '../dbconnect.php';
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Products Maintanance</title>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <link rel="stylesheet" href="../css/bootstrap.min.css" />
            <link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
            <link rel="stylesheet" href="../css/uniform.css" />
            <link rel="stylesheet" href="../css/select2.css" />
            <link rel="stylesheet" href="../css/maruti-style.css" />
            <link rel="stylesheet" href="../css/maruti-media.css" class="skin-color" />
            <style>
                .zoom {
                    padding: 0px;
                    transition: transform .2s;
                    margin: 0 auto;
                }

                .zoom:hover {
                    -ms-transform: scale(3.5); /* IE 9 */
                    -webkit-transform: scale(3.5); /* Safari 3-8 */
                    transform: scale(3.5); 
                }
            </style>
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
                    <div id="breadcrumb"> <a href="../Dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom"><i class="icon-user"></i> View Products</a></div>
                </div>
                <div class="container-fluid">
                    <div class="quick-actions_homepage">
                        <ul class="quick-actions">
                            <li> <a href="#"> <i class="icon-dashboard"></i> My Dashboard </a> </li>
                            <li> <a href="#"> <i class="icon-database"></i> Add New Product</a> </li>
                            <li> <a href="#"> <i class="icon-database"></i> Edit Product </a> </li>
                            <li> <a href="#"> <i class="icon-shopping-bag"></i> Manage Stock </a> </li>
                            <li> <a href="#"> <i class="icon-calendar"></i> Return Stock </a> </li>
                        </ul>
                    </div>
                    <div class="row-fluid">
                        <div class="widget-box">
                            <div class="widget-title">
                                <span class="icon"><i class="icon-th"></i></span> 
                                <h5>Your System Products</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <table class="table table-bordered data-table">
                                    <thead>
                                        <tr>
                                            <th>Product Code</th>
                                            <th>Rack No</th>
                                            <!--<th>Logo</th>-->
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
                                        $query = "SELECT * FROM products";
                                        $result = mysqli_query($con, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                            $pro_id = $row["pro_id"];
                                            $cat_id = $row["category_id"];
                                            $rate = tax_rate_min($row["v_id"], $con);
                                            //$pres = $rate / 100;
                                            $cat_name = ucwords(mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM category WHERE category_id=$cat_id"))["name"]);
                                            ?>
                                            <tr class="gradeU">
                                                <td><?php echo getRefNo($pro_id) ?></td>
                                                <td><?php echo $row["rack_no"] ?></td>
                                                <td><?php echo $row["product_name"] ?></td>
                                                <td><?php echo $row["barcode"] ?></td>
                                                <td><?php echo $cat_name ?></td>
                                                <td><?php
                                                    if ($_SESSION["tax_active"] == 1) {
                                                        echo round(floatval($row['quantity']), 0);
                                                    } else {
                                                        echo round(floatval($row['quantity']), 0);
                                                    }
                                                    ?></td>
                                                <td><?php echo dotInput($row["dealer_price"]) ?></td>
                                                <td><?php echo dotInput($row["unit_price"]) ?></td>
                                                <td>
                                                    <a href="edit_pro.php?p=<?php echo encrydata($pro_id) ?>" class="btn btn-success">Edit</a>
                                                    <?php
                                                    $total_pro_sales = mysqli_num_rows(mysqli_query($con, "SELECT * FROM sales_order WHERE pro_id=$pro_id"));
                                                    $total_pro_return = mysqli_num_rows(mysqli_query($con, "SELECT * FROM return_stock WHERE pro_id=$pro_id"));
                                                    $total_q_control = mysqli_num_rows(mysqli_query($con, "SELECT * FROM q_control WHERE pro_id=$pro_id"));
                                                    if (($total_pro_sales == 0) && ($total_pro_return == 0) && ($total_q_control == 0)) {
                                                        ?>
                                                        <a href="del_pro.php?pro=<?php echo encrydata($pro_id) ?>" class="btn btn-danger">Delete</a>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <a href="#" class="btn btn-danger disabled">Delete</a>
                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Product Code</th>
                                            <th>Rack No</th>
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
} else {
    header("location:../");
}