<?php
session_start();
include '../valid_fun.php';
if (isset($_SESSION["type"]) && isset($_SESSION["id"]) && $_SESSION["type"] == 3) {
    include '../dbconnect.php';
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Settings</title>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <link rel="stylesheet" href="../css/bootstrap.min.css" />
            <link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
            <link rel="stylesheet" href="../css/uniform.css" />
            <!--<link rel="stylesheet" href="../css/select2.css" />-->
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
                    <div id="breadcrumb"> <a href="../Dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom"><i class="icon-envelope"></i> Settings</a></div>
                </div>
                <div class="container-fluid">
                    <div class="row-fluid">
                        <div class="widget-box">
                            <div class="widget-title">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#tab1">User Account</a></li>
                                    <li><a data-toggle="tab" href="#tab2">Access Control</a></li>
									<li><a data-toggle="tab" href="#tab3">System Preferance</a></li>
                                    <div class="buttons"><a href="#myModal"  onclick="add_user_details()" data-toggle="modal" class="btn btn-mini btn-success"><i class="icon-user"></i> Add New System Users</a></div>
                                </ul>
                            </div>
                            <div class="widget-content tab-content">
                                <div id="tab1" class="tab-pane active">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>User ID</th>
                                                <th>User Name</th>
                                                <th>Phone Number</th>
                                                <th>Email Address</th>
                                                <th>User Type</th>
                                                <th>Last Login</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($_SESSION["tax_active"] == 1) {
                                                $user_result1 = mysqli_query($con, "SELECT * FROM users");
                                            } else {
                                                $user_result1 = mysqli_query($con, "SELECT * FROM users WHERE tax_active=0");
                                            }
                                            while ($user_row1 = mysqli_fetch_array($user_result1)) {
                                                ?>
                                                <tr>
                                                    <td>#<?php echo getRefNo($user_row1["id"]) ?></td>
                                                    <td><?php echo ucwords($user_row1["name"]) ?></td>
                                                    <td><?php echo ($user_row1["phone"]) ?></td>
                                                    <td><?php echo strtolower($user_row1["email"]) ?></td>
                                                    <td>
                                                        <?php
                                                        if ($user_row1["type"] == 1) {
                                                            echo 'Cashier';
                                                        } elseif ($user_row1["type"] == 2) {
                                                            echo 'Stock Manager';
                                                        } else {
                                                            echo 'Administrator';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?php echo ucwords($user_row1["last_logined"]) ?></td>
                                                    <?php if ($user_row1["type"] != 3) { ?>
                                                        <td>
                                                            <a href="del_user.php?u=<?php echo encrydata($user_row1["id"]) ?>" class = "btn btn-danger">Delete</a>
                                                            <a href = "#myModal" onclick = "add_user_details('<?php echo encrydata($user_row1["id"]) ?>', '<?php echo ucwords($user_row1["name"]) ?>', '<?php echo ($user_row1["phone"]) ?>', '<?php echo strtolower($user_row1["email"]) ?>', '<?php echo ucwords($user_row1["bio"]) ?>', '<?php echo ($user_row1["password"]) ?>', '<?php echo ($user_row1["type"]) ?>', '<?php echo ($user_row1["status"]) ?>')" data-toggle = "modal" class = "btn btn-success">Edit</a>
                                                        </td>
                                                    <?php } else { ?>
                                                        <td><button type="button" class = "btn btn-success" disabled>Edit</button></td>
                                                    <?php } ?>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>User ID</th>
                                                <th>User Name</th>
                                                <th>Phone Number</th>
                                                <th>Email Address</th>
                                                <th>User Type</th>
                                                <th>Last Login</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div id="tab2" class="tab-pane">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>User ID</th>
                                                <th>User Name</th>
                                                <th>Access</th>
                                                <th>User Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
											if ($_SESSION["tax_active"] == 1) {
                                                $user_result2 = mysqli_query($con, "SELECT * FROM users");
                                            } else {
                                                $user_result2 = mysqli_query($con, "SELECT * FROM users WHERE tax_active=0");
                                            }
                                            while ($user_row2 = mysqli_fetch_array($user_result2)) {
                                                $user = $user_row2["id"];
                                                $user_feature_row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM user_features WHERE id=$user"));
                                                ?>
                                                <tr>
                                                    <td>#<?php echo getRefNo($user_row2["id"]) ?></td>
                                                    <td><?php echo ucwords($user_row2["name"]) ?></td>
                                                    <td><?php echo "" ?></td>
                                                    <td>
                                                        <?php
                                                        if ($user_row2["type"] == 1) {
                                                            echo 'Cashier';
                                                        } elseif ($user_row2["type"] == 2) {
                                                            echo 'Stock Manager';
                                                        } else {
                                                            echo 'Administrator';
                                                        }
                                                        ?>
                                                    </td>
                                                    <?php if ($user_row2["type"] != 3) { ?>
                                                        <td><a href="#myModal1" onclick="add_user_features('<?php echo encrydata($user_feature_row["uf_id"]) ?>', '<?php echo ucwords($user_row2["name"]) ?>',<?php echo $user_feature_row["billings"] ?>,<?php echo $user_feature_row["customer_maintain"] ?>,<?php echo $user_feature_row["supplier_maintain"] ?>,<?php echo $user_feature_row["product_maintain"] ?>,<?php echo $user_feature_row["return_stock"] ?>,<?php echo $user_feature_row["qty_manage"] ?>,<?php echo $user_feature_row["notifications"] ?>,<?php echo $user_feature_row["costing_re"] ?>,<?php echo $user_feature_row["sales_re"] ?>,<?php echo $user_feature_row["profit_re"] ?>,<?php echo $user_feature_row["transactions_re"] ?>,<?php echo $user_feature_row["cus_ous_re"] ?>,<?php echo $user_feature_row["sup_ous_re"] ?>,<?php echo $user_feature_row["fast_moving_re"] ?>)" data-toggle="modal" class="btn btn-success">Edit</a></td>
                                                    <?php } else { ?>
                                                        <td><button type="button" class = "btn btn-success" disabled>Edit</button></td>
                                                    <?php } ?>
                                                </tr>
                                                <?php
                                            }
                                            ?>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>User ID</th>
                                                <th>User Name</th>
                                                <th>Access</th>
                                                <th>User Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <?php if ($_SESSION["tax_active"] == 1) { ?>
                                    <div id="tab4" class="tab-pane">
                                        <form method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="span6">
                                                <div class="widget-box">
                                                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                                                        <h5>Tax settings Genaral</h5>
                                                    </div>
                                                    <?php
                                                    $tax_row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM settings"));
                                                    ?>
                                                    <div class="widget-content nopadding">
                                                        <div class="control-group" hidden>
                                                            <label class="control-label"></label>
                                                            <div class="controls">
                                                                <input type="text" class="span11" name="set_id" value="<?php echo $tax_row['set_id']; ?>" required readonly hidden/>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label">Customer Outstanding (%)</label>
                                                            <div class="controls">
                                                                <input type="number" class="span11" name="cus_ous" value="<?php echo $tax_row['trans_rate']; ?>" required/>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label">Transaction report (%)</label>
                                                            <div class="controls">
                                                                <input type="number" class="span11" name="trans" value="<?php echo $tax_row['bill_rate']; ?>" required/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-actions">
                                                    <button type="submit" name="update_tax" class="btn btn-success" style="width: 40%">Update Tax Rates</button>
                                                    <button type="reset" class="btn btn-danger" style="width: 40%">Reset All</button>
                                                </div>
                                            </div>
                                            
                                            <div class="span6">
                                                <div class="widget-box">
                                                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                                                        <h5>Tax settings Other</h5>
                                                    </div>
                                                    <div class="widget-content nopadding">
                                                        <div class="control-group">
                                                            <label class="control-label">Supplier Tax Rates</label>
                                                            <div class="controls">
                                                                <p>You can change these rates in <a href="../supplier/sup_main.php">supplier maintenance</a>
                                                                <br> Quantity Management & other Reports depends on the supplier tax rate
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                <?php } ?>
                                <div id="tab3" class="tab-pane">
                                    <div class="alert alert-error alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                                        <h4 class="alert-heading">Sorry!</h4>
                                        This Feture Not Config for your System - Contact us! 081 20 50 437 or Email us support@tritcal.com 
                                    </div>
                                </div>
								<div id="tab5" class="tab-pane">
                                        <form method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="span6">
                                                <div class="widget-box">
                                                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                                                        <h5>Company Details Genaral</h5>
                                                    </div>
                                                    <div class="widget-content nopadding">
                                                        <div class="control-group">
                                                            <label class="control-label">Company Name</label>
                                                            <div class="controls">
                                                                <input type="text" class="span11" value="" required/>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label">Register Number</label>
                                                            <div class="controls">
                                                                <input type="text" class="span11" value=""/>
                                                            </div>
                                                        </div>
														<div class="control-group">
                                                            <label class="control-label">Address</label>
                                                            <div class="controls">
                                                                <textarea class="span11"></textarea>
                                                            </div>
                                                        </div>
														<div class="control-group">
                                                            <label class="control-label">Software Product ID</label>
                                                            <div class="controls">
                                                                <input type="text" class="span11" value="XXX-XXXX-XXXX-XXXX-XXX" readonly/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="span6">
                                                <div class="widget-box">
													<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                                                        <h5>Other Details</h5>
                                                    </div>
                                                    <div class="widget-content nopadding">
                                                        <div class="control-group">
                                                            <label class="control-label">Telephone Number</label>
                                                            <div class="controls">
                                                                <input type="number" class="span11" value="" required/>
                                                            </div>
                                                        </div>
														<div class="control-group">
                                                            <label class="control-label">FAX Number</label>
                                                            <div class="controls">
                                                                <input type="number" class="span11" value=""/>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label">Email Address</label>
                                                            <div class="controls">
                                                                <input type="email" class="span11" value=""/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
												<div class="form-actions">
                                                    <button type="submit" name="update_tax" class="btn btn-success" style="width: 40%">Update Details</button>
                                                    <button type="reset" class="btn btn-danger" style="width: 40%">Reset All</button>
                                                </div>
                                            </div>
                                        </form>
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
            <!--<script src="../js/select2.min.js"></script>--> 
            <script src="../js/jquery.dataTables.min.js"></script> 
            <script src="../js/maruti.js"></script> 
            <script src="../js/maruti.tables.js"></script>
            <?php include 'models.php'; ?>
        </body>
    </html>
    <?php
    if (isset($_POST['update_tax'])) {
        $cus_ous = $_POST['cus_ous'];
        $trans = $_POST['trans'];
        $set_id = $_POST['set_id'];

        $sql_tax = "UPDATE settings set trans_rate=\"$cus_ous\", bill_rate=\"$trans\" WHERE set_id=$set_id";
        if ($con->query($sql_tax) == TRUE) {
            ?>
            <script type="text/javascript" >
                                                            window.location.replace("autharization.php");
            </script>
            <?php
        } else {
            echo "Error";
        }
    }
} else {
    header("location:../");
}    