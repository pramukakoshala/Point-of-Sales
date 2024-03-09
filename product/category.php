<?php
session_start();
include '../valid_fun.php';
if (isset($_SESSION["type"]) && isset($_SESSION["id"])) {
    include '../dbconnect.php';
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Product Category Maintanance</title>
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
                    <div id="breadcrumb"> <a href="../Dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom"><i class="icon-user"></i> Product Category Maintanance</a></div>
                </div>
                <div class="container-fluid">
                    <div class="row-fluid">
                        <form method="post" class="form-horizontal">
                            <div class="span12">
                                <div class="span5">
                                    <div class="control-group">
                                        <label class="control-label">Category Name :</label>
                                        <div class="controls">
                                            <input type="text" name="cat_name" Placeholder="Enter Category" style="width: 100%;"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="span5">
                                    <div class="control-group">
                                        <label class="control-label">Measurement Unit :</label>
                                        <div class="controls">
                                            <select name="unit" style="width: 100%;">
                                                <option value="1">ITEM</option>
                                                <option value="2">KG (Killo Gram)</option>
                                                <option value="3">L (Leeter)</option>
												<option value="4">Yards</option>
                                                <option value="5">Inch</option>
                                                <option value="6">Feets</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="span12">
                                <div class="span5">
                                    <div class="control-group">
                                        <label class="control-label">Remark :</label>
                                        <div class="controls">
                                            <textarea style="width: 90%;" name="remark"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="span5">
                                    <div class="form-actions">
                                        <input type="submit" name="submit" class="btn btn-success" style="width: 100%; margin-left: -4.5%;">
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
                                <h5>Product Category Handling</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <table class="table table-bordered data-table">
                                    <thead>
                                        <tr>
                                            <th>Category Code</th>
                                            <th>Category Name</th>
                                            <th>Measurement Unit</th>
                                            <th>Product Count</th>
                                            <th>Remark</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT *  FROM `category`";
                                        $result = mysqli_query($con, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <tr class="gradeU">
                                                <td><?php echo getRefNo($row['category_id']); ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <?php
                                                $Pending = $row['unit'];
                                                if ($Pending == 1) {
                                                    ?>
                                                    <td><?php echo 'Item'; ?></td>
                                                <?php } else if ($Pending == 2) { ?>
                                                    <td><?php echo 'Kilogram (KG)'; ?></td>
                                                <?php } else if ($Pending == 3) { ?>
                                                    <td><?php echo 'Liter (L)'; ?></td>
                                                <?php } else if ($Pending == 4) { ?>
                                                    <td><?php echo 'Yards'; ?></td>
                                                <?php } else if ($Pending == 5) { ?>
                                                    <td><?php echo 'Inch'; ?></td>
                                                <?php } else if ($Pending == 6) { ?>
                                                    <td><?php echo 'Feets'; ?></td>
                                                <?php }
                                                ?>
                                                <td>
                                                    <?php
                                                    echo mysqli_num_rows(mysqli_query($con, "SELECT * FROM products WHERE category_id=" . $row['category_id']));
                                                    ?>
                                                </td>
                                                <td><?php echo $row['remark']; ?></td>
                                                <td><a href="edit_cat.php?c=<?php echo encrydata($row['category_id']) ?>" class="btn btn-success">Edit</a></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Category Code</th>
                                            <th>Category Name</th>
                                            <th>Measurement Unit</th>
                                            <th>Product Count</th>
                                            <th>Remark</th>
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
        $name = ucwords($_POST['cat_name']);
        $unit = $_POST['unit'];
        $remark = $_POST['remark'];

        $sql = "INSERT INTO `category`(`name`, `unit`, `remark`) VALUES(\"$name\", \"$unit\", \"$remark\")";
        if ($con->query($sql) == TRUE) {
            ?>
            <script type="text/javascript" >
                                        window.location.replace("category.php");
            </script>
            <?php
        } else {
            echo "Something Went Wrong!";
        }
    }
}else {
    header("location:../");
}