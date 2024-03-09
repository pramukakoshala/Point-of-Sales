<?php
session_start();
include '../valid_fun.php';
if (isset($_SESSION["type"]) && isset($_SESSION["id"]) && isset($_GET["v"]) && $_GET["v"] != null) {
    include '../dbconnect.php';
    $v_id = validNumber(decrydata($_GET["v"]), "../");
    $ven_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM vendor WHERE v_id=$v_id"));
    if ($ven_det != null) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <title>Edit Supplier | <?php echo $ven_det["vendor_name"] ?></title>
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
                        <div id="breadcrumb"> <a href="../Dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom"><i class="icon-user"></i> Edit Suppier</a></div>
                    </div>
                    <div class="container-fluid">
                        <div class="row-fluid">
                            <form enctype="multipart/form-data" method="post" class="form-horizontal">
                                <div class="span6">
                                    <div class="widget-box">
                                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                                            <h5>Personal-info</h5>
                                        </div>
                                        <div class="widget-content nopadding">
                                            <div class="control-group" hidden>
                                                <label class="control-label"></label>
                                                <div class="controls">
                                                    <input type="text" class="span11" value="<?php echo $_GET["v"] ?>" name="vendor" required readonly hidden/>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Supplier Name :</label>
                                                <div class="controls">
                                                    <input type="text" class="span11" value="<?php echo $ven_det["vendor_name"] ?>" name="vendor_name" placeholder="First name" />
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Supplier Address</label>
                                                <div class="controls">
                                                    <textarea class="span11" name="vendor_address"><?php echo $ven_det["vendor_address"] ?></textarea>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Supplier Contact :</label>
                                                <div class="controls">
                                                    <input type="number" value="<?php echo $ven_det["company_phone"] ?>" name="company_phone" class="span11" placeholder="(081) XXX XXXX" />
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Ref Mobile :</label>
                                                <div class="controls">
                                                    <input type="number" value="<?php echo $ven_det["ref_mobile"] ?>" name="ref_mobile" class="span11" placeholder="(081) XXX XXXX" />
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Supplier Email :</label>
                                                <div class="controls">
                                                    <input type="email" value="<?php echo $ven_det["company_email"] ?>" name="company_email" class="span11" placeholder="Customer Email" />
                                                </div>
                                            </div>
                                            <?php
                                            if ($_SESSION["tax_active"] == 1) {
                                                ?>
                                                <div class="control-group" style="display:none;">
                                                    <label class="control-label">Tax Rate :</label>
                                                    <div class="controls">
                                                        <input type="number" value="<?php echo $ven_det["tax_rate"] ?>" name="tax_rate" class="span11" placeholder="10%" />
                                                    </div>
                                                </div>
                                            <?php }
                                            ?>
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
                                                <label class="control-label">Select Type</label>
                                                <div class="controls">
                                                    <select name="vendor_type">
                                                        <option value="1" <?php
                                                        if ($ven_det["vendor_type"] == 1) {
                                                            echo "selected";
                                                        }
                                                        ?>>A Company</option>
                                                        <option value="2" <?php
                                                        if ($ven_det["vendor_type"] == 2) {
                                                            echo "selected";
                                                        }
                                                        ?>>An Entrepreneur</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Select Status</label>
                                                <div class="controls">
                                                    <select name="vendor_status">
                                                        <option value="1" <?php
                                                        if ($ven_det["vendor_status"] == 1) {
                                                            echo "selected";
                                                        }
                                                        ?>>Active</option>
                                                        <option value="2" <?php
                                                        if ($ven_det["vendor_status"] == 2) {
                                                            echo "selected";
                                                        }
                                                        ?>>Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Select Pay Type</label>
                                                <div class="controls">
                                                    <select name="pay_type">
                                                        <option value="1" <?php
                                                        if ($ven_det["pay_type"] == 1) {
                                                            echo "selected";
                                                        }
                                                        ?>>Credit</option>
                                                        <option value="2" <?php
                                                        if ($ven_det["pay_type"] == 2) {
                                                            echo "selected";
                                                        }
                                                        ?>>On Payment</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Select Department</label>
                                                <div class="controls">
                                                    <select name="department" required>
                                                        <?php
                                                        $query_dep = "SELECT * FROM `department`";
                                                        $result_dep = mysqli_query($con, $query_dep);
                                                        while ($row_dep = mysqli_fetch_array($result_dep)) {
                                                            ?>
                                                            <option value="<?php echo encrydata($row_dep['dep_id']); ?>" <?= ($row_dep['dep_id'] == $ven_det['dep_id']) ? 'selected' : null ?>>
                                                                <?php echo $row_dep['name']; ?>
                                                            </option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Upload Image</label>
                                                <div class="controls">
                                                    <input type="file" name="image"/>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <button type="submit" name="update" class="btn btn-success" style="width: 40%">Update Supplier</button>
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
        if (isset($_POST['update'])) {
            $v_id = validNumber(decrydata($_POST['vendor']), "../");

            $name = $_POST['vendor_name'];
            $address = $_POST['vendor_address'];
            $city = $_POST['vendor_type'];
            $phone = $_POST['company_phone'];
            $mobile = $_POST['ref_mobile'];
            $email = $_POST['company_email'];
            $type = $_POST['pay_type'];
            $status = $_POST['vendor_status'];
            $department = $_POST['department'];
            $tax_rate = $_POST['tax_rate'];

            $image = null;

            if (!empty($_FILES["image"]["name"])) {
                $previous_image = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM vendor WHERE v_id=$v_id"))["image"];
                $total = mysqli_fetch_row(mysqli_query($con, "SELECT MAX(v_id) FROM vendor"))[0] + 2;
                if ((($_FILES["image"]["type"] == "image/jpg") || ($_FILES["image"]["type"] == "image/gif") || ($_FILES["image"]["type"] == "image/jpeg") || ($_FILES["image"]["type"] == "image/png"))) {

                    //CHECKING FOR FILE'S ERROR---------------------------------------------------------------- 
                    if ($_FILES["image"]["error"] > 0) {
                        
                    } else {
                        $image = $total . "-" . $_FILES["image"]["name"];
                        if ($previous_image != "default_sup.png") {
                            unlink("uploads/images/$previous_image");
                        }
                        //MOVING IMAGE TO EXISITING FOLDER--------------------------------------------------------
                        move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/images/" . $total . "-" . $_FILES["image"]["name"]);
                    }
                }
            }
            if ($image == null) {
                $sql = "UPDATE vendor set vendor_name=\"$name\", vendor_address=\"$address\", vendor_type=\"$city\", company_phone=\"$phone\", ref_mobile=\"$mobile\", company_email=\"$email\", pay_type=\"$type\", `dep_id`=\"$department\", vendor_status=\"$status\", tax_rate=\"$tax_rate\" WHERE v_id=$v_id";
            } else {
                $sql = "UPDATE vendor set vendor_name=\"$name\", vendor_address=\"$address\", vendor_type=\"$city\", company_phone=\"$phone\", ref_mobile=\"$mobile\", company_email=\"$email\", pay_type=\"$type\", `dep_id`=\"$department\", vendor_status=\"$status\", image=\"$image\", tax_rate=\"$tax_rate\" WHERE v_id=$v_id";
            }
            if ($con->query($sql) == TRUE) {
                ?>
                <script type="text/javascript" >
                    window.location.replace("sup_main.php");
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