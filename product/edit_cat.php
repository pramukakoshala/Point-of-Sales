<?php
session_start();
include '../valid_fun.php';
if (isset($_SESSION["type"]) && isset($_SESSION["id"]) && isset($_GET["c"])) {
    include '../dbconnect.php';
    $c_id = validNumber(decrydata($_GET["c"]), "../");
    $cat_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM category WHERE category_id=$c_id"));
    if ($cat_det != null) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <title>Edit Category | <?php echo $cat_det["name"] ?></title>
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
                                    <div class="span5" style="display: none">
                                        <div class="control-group">
                                            <label class="control-label"></label>
                                            <div class="controls">
                                                <input type="text" name="c" value="<?php echo $_GET["c"] ?>" style="width: 100%;" required readonly hidden/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="span5">
                                        <div class="control-group">
                                            <label class="control-label">Category Name :</label>
                                            <div class="controls">
                                                <input type="text" name="cat_name" value="<?php echo ucwords($cat_det["name"]) ?>" Placeholder="Enter Category" style="width: 100%;"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="span5">
                                        <div class="control-group">
                                            <label class="control-label">Measurement Unit :</label>
                                            <div class="controls">
                                                <select name="unit" style="width: 100%;">
                                                    <option value="1" <?php
                                                    if ($cat_det["unit"] == 1) {
                                                        echo 'selected';
                                                    }
                                                    ?>>ITEM</option>
                                                    <option value="2" <?php
                                                    if ($cat_det["unit"] == 2) {
                                                        echo 'selected';
                                                    }
                                                    ?>>KG (Killo Gram)</option>
                                                    <option value="3" <?php
                                                    if ($cat_det["unit"] == 3) {
                                                        echo 'selected';
                                                    }
                                                    ?>>L (Leeter)</option>
													<option value="4" <?php
                                                    if ($cat_det["unit"] == 4) {
                                                        echo 'selected';
                                                    }
                                                    ?>>Yards</option>
                                                    <option value="5" <?php
                                                    if ($cat_det["unit"] == 5) {
                                                        echo 'selected';
                                                    }
                                                    ?>>Inch</option>
                                                    <option value="6" <?php
                                                    if ($cat_det["unit"] == 6) {
                                                        echo 'selected';
                                                    }
                                                    ?>>Feets</option>
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
                                                <textarea style="width: 90%;" name="remark"><?php echo ucwords($cat_det["remark"]) ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="span5">
                                        <div class="form-actions">
                                            <input type="submit" name="submit" class="btn btn-success" value="Update" style="width: 100%; margin-left: -4.5%;">
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
            $c_id = decrydata($_POST["c"]);
            $name = ucwords($_POST['cat_name']);
            $unit = $_POST['unit'];
            $remark = $_POST['remark'];

            $sql = "UPDATE category SET name='$name',unit='$unit',remark='$remark' WHERE category_id=$c_id";
            if ($con->query($sql) == TRUE) {
                ?>
                <script type="text/javascript" >
                    window.location.replace("category.php");
                </script>
                <?php
            } else {
                echo $con->error;
            }
        }
    } else {
        header("location:../");
    }
} else {
    header("location:../");
}