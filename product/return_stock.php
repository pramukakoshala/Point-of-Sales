<?php
session_start();
include '../valid_fun.php';
if (isset($_SESSION["type"]) && isset($_SESSION["id"])) {
    include '../dbconnect.php';
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Return Stock Handling</title>
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
                    <div id="breadcrumb"> <a href="../Dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom"><i class="icon-user"></i> Make a Return</a></div>
                </div>
                <div class="container-fluid">
                    <div class="row-fluid">
                        <form method="post" class="form-horizontal">
                            <div class="span11">
                                <div class="control-group">
                                    <label class="control-label">Select Product :</label>
                                    <div class="controls">
                                        <select style="width: 93.5%;" name="pro_id">
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
                            </div>
                            <div class="span12">
                                <div class="span5">
                                    <div class="control-group">
                                        <label class="control-label">Return Date :</label>
                                        <div class="controls">
                                            <input type="text" name="date" value="<?php echo date("Y.m.d"); ?>" style="width: 100%;" readonly/>
                                        </div>
                                    </div>
                                </div>
                                <div class="span5">
                                    <div class="control-group">
                                        <label class="control-label">Return Quantity :</label>
                                        <div class="controls">
                                            <input type="text" name="quantity" value="1" style="width: 100%;"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="span12">
                                <div class="span5">
                                    <div class="control-group">
                                        <label class="control-label">Description (Reason) :</label>
                                        <div class="controls">
                                            <textarea name="description" style="width: 100%;"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="span5">
                                    <div class="form-actions">
                                        <input name="submit" type="submit" class="btn btn-success" style="width: 105%; margin-left: 6%;">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row-fluid">
                        <div class="widget-box">
                            <div class="widget-title">
                                <span class="icon"><i class="icon-th"></i></span> 
                                <h5>Return Stock Handling</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <table class="table table-bordered data-table">
                                    <thead>
                                        <tr>
                                            <th>Product Code</th>
                                            <th>Product Name</th>
                                            <th>Supplier</th>
                                            <th>Date</th>
                                            <th>Return. Qty</th>
                                            <th>Dealer Price</th>
                                            <th>Unit Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query_re = "SELECT *  FROM `return_stock` WHERE hand_over=0";
                                        $result_re = mysqli_query($con, $query_re);
                                        while ($row_re = mysqli_fetch_array($result_re)) {
                                            $pro_id = $row_re["pro_id"];
                                            $pro_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM products WHERE pro_id=$pro_id"));
                                            $v_id = intval($pro_det["v_id"]);
                                            $ven_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM vendor WHERE v_id=$v_id"));
                                            ?>
                                            <tr class="gradeU">
                                                <td><?php echo getRefNo($pro_id) ?></td>
                                                <td><?php echo ucwords($pro_det["product_name"]) ?></td>
                                                <td><?php echo ucwords($ven_det["vendor_name"]) ?></td>
                                                <td><?php echo $row_re["date"] ?></td>
                                                <td><?php echo $row_re["quantity"] ?></td>
                                                <td><?php echo dotInput($pro_det["dealer_price"]) ?></td>
                                                <td><?php echo dotInput($pro_det["unit_price"]) ?></td>
                                                <td>
                                                    <a href="del_return.php?re=<?php echo encrydata($row_re["r_id"]) ?>" class="btn btn-danger">Remove</a>
                                                    <a href="hand_over.php?re=<?php echo encrydata($row_re["r_id"]) ?>" class="btn btn-success">Hand Over</a>
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
                                            <th>Supplier</th>
                                            <th>Category</th>
                                            <th>Return. Qty</th>
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
    if (isset($_POST['submit'])) {
        $pro_id = validNumber(decrydata($_POST['pro_id']), "../");
        $date = $_POST['date'];
        $qty = $_POST['quantity'];
        $des = $_POST['description'];
        $sql = "INSERT INTO `return_stock`(`pro_id`, `date`, `quantity`, `description`) VALUES(\"$pro_id\", \"$date\", \"$qty\", \"$des\")";
        $sql1 = "UPDATE products SET quantity = quantity - \"$qty\" WHERE pro_id = $pro_id";

        if (($con->query($sql1) == TRUE) && ($con->query($sql) == TRUE)) {
            ?>
            <script type="text/javascript" >
                                window.location.replace("return_stock.php");
            </script>
            <?php
        } else {
            echo $con->error;
        }
    }
} else {
    header("location:../");
}