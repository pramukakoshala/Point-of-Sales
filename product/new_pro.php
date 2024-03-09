<?php
session_start();
include '../valid_fun.php';
if (isset($_SESSION["type"]) && isset($_SESSION["id"])) {
    include '../dbconnect.php';
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title>New Product</title>
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
                    <div id="breadcrumb"> <a href="../Dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom"><i class="icon-user"></i> Add New Products</a></div>
                </div>
                <div class="container-fluid">
                    <div class="row-fluid">
                        <form method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="span6">
                                <div class="widget-box">
                                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                                        <h5>Personal-info</h5>
                                    </div>
                                    <div class="widget-content nopadding">

                                        <div class="control-group">
                                            <label class="control-label">Select Supplier</label>
                                            <div class="controls">
                                                <select name="v_id">
                                                    <?php
                                                    $query_ven = "SELECT *  FROM `vendor`";
                                                    $result_ven = mysqli_query($con, $query_ven);
                                                    while ($row_ven = mysqli_fetch_array($result_ven)) {
                                                        ?>
                                                        <option value="<?php echo encrydata($row_ven['v_id']); ?>">
                                                            <?php echo $row_ven['vendor_name']; ?>
                                                        </option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Select Category</label>
                                            <div class="controls">
                                                <select name="category_id">
                                                    <?php
                                                    $query_cat = "SELECT *  FROM `category`";
                                                    $result_cat = mysqli_query($con, $query_cat);
                                                    while ($row_cat = mysqli_fetch_array($result_cat)) {
                                                        ?>
                                                        <option value="<?php echo encrydata($row_cat['category_id']); ?>">
                                                            <?php echo $row_cat['name']; ?>
                                                        </option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Select Department</label>
                                            <div class="controls">
                                                <select name="department[]" required multiple>
                                                    <?php
                                                    $query_dep = "SELECT * FROM `department`";
                                                    $result_dep = mysqli_query($con, $query_dep);
                                                    while ($row_dep = mysqli_fetch_array($result_dep)) {
                                                        ?>
                                                        <option value="<?php echo encrydata($row_dep['dep_id']); ?>">
                                                            <?php echo $row_dep['name']; ?>
                                                        </option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Product Name :</label>
                                            <div class="controls">
                                                <input type="text" name="product_name" class="span11" placeholder="Enter Product Name" required/>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Qty :</label>
                                            <div class="controls">
                                                <input type="number" name="quantity" class="span11" placeholder="Enter Quantity" required/>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Rack No :</label>
                                            <div class="controls">
                                                <input type="text" name="rack_no" class="span11" placeholder="Rack No" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Expire Date :</label>
                                            <div class="controls">
                                                <input type="Date" name="exp_date" class="span11" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="span6">
                                <div class="widget-box">
                                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                                        <h5>Genaral Infomations</h5>
                                    </div>
                                    <div class="widget-content nopadding">
                                        <div class="control-group">
                                            <label class="control-label">Barcode :</label>
                                            <div class="controls">
                                                <input type="text" name="barcode" class="span11" placeholder="Scan Barcode" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Dealer Price :</label>
                                            <div class="controls">
                                                <input type="text" name="dealer_price" class="span11" placeholder="XXX.XX" required/>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Unit Price :</label>
                                            <div class="controls">
                                                <input type="text" name="unit_price" class="span11" placeholder="XXX.XX" required/>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Lowest Price :</label>
                                            <div class="controls">
                                                <input type="text" name="lower_price_limit" class="span11" placeholder="XXX.XX" required/>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Upload Image</label>
                                            <div class="controls">
                                                <input type="file" name="image"/>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button name="submit" type="submit" class="btn btn-success" style="width: 40%">Save As A Product</button>
                                            <button type="reset" class="btn btn-danger" style="width: 40%">Reset All</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
    if (isset($_POST['submit'])) {
        $vendor = validNumber(decrydata($_POST['v_id']), "../");
        $category = validNumber(decrydata($_POST['category_id']), "../");
        $name = $_POST['product_name'];
        $description = "";
        $bar = $_POST['barcode'];
        $qty = $_POST['quantity'];
        $dis = 0;
        $dealer_price = ($_POST['dealer_price']);
        $exp_date = $_POST['exp_date'];
        $department = $_POST['department'];
        $today_date = date("Y-m-d");
        $lower_price_limit = $_POST['lower_price_limit'];
        $unit_price = ($_POST['unit_price']);
        $rack_no = ($_POST['rack_no']);
        $image = 'default-pro.png';

        if (!empty($_FILES["image"]["name"])) {
            $total = mysqli_fetch_row(mysqli_query($con, "SELECT MAX(pro_id) FROM products"))[0] + 1;
            if ((($_FILES["image"]["type"] == "image/jpg") || ($_FILES["image"]["type"] == "image/gif") || ($_FILES["image"]["type"] == "image/jpeg") || ($_FILES["image"]["type"] == "image/png"))) {

                //CHECKING FOR FILE'S ERROR---------------------------------------------------------------- 
                if ($_FILES["image"]["error"] > 0) {
                    
                } else {
                    $image = $total . "-" . $_FILES["image"]["name"];
                    //MOVING IMAGE TO EXISITING FOLDER--------------------------------------------------------
                    move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/images/" . $total . "-" . $_FILES["image"]["name"]);
                }
            }
        }
        $sql = "INSERT INTO `products`(`v_id`, `category_id`, `product_name`, `product_description`, `barcode`, `quantity`,`online_date`, `discount`, `image`, `dealer_price`, `unit_price`,`exp_date`,`f_qty`,`dep_id`,`lower_price_limit`,`rack_no`) VALUES(\"$vendor\", \"$category\", \"$name\", \"$description\", \"$bar\", \"$qty\", \"$today_date\",\"$dis\",\"$image\",  \"$dealer_price\", \"$unit_price\", \"$exp_date\", \"$qty\", \"$department\", \"$lower_price_limit\", \"$rack_no\")";
        if ($con->query($sql) == TRUE) {
            $pro_id = $con->insert_id;
            foreach ($_POST['department'] as $key => $value) {
                $data_id = decrydata($value);
                $sql = "INSERT INTO `pro_dep`(`pro_id`,`dep_id`) VALUES(\"$pro_id\",\"$data_id\")";
                $con->query($sql);
            }
            ?>
            <script type="text/javascript" >
                window.location.replace("new_pro.php");
            </script>
            <?php
        } else {
            echo "Error";
        }
    }
} else {
    header("location:../");
}


