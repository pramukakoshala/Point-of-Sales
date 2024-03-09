<?php
session_start();
include '../valid_fun.php';
if (isset($_SESSION["type"]) && isset($_SESSION["id"])) {
    include '../dbconnect.php';
    if (isset($_SESSION["from_index"]) && $_SESSION["from_index"] == 1) {
        ?>
        <script>
            window.open('../billing.php', '', 'scrollbars=yes,resizable=yes,width=1920,height=1000,top=65,left=300');
        </script>
        <?php
        $_SESSION["from_index"] = 0;
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Customer Maintanance</title>
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
            </div>
            <div id="content">
                <div id="content-header">
                    <div id="breadcrumb"> <a href="../Dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom"><i class="icon-user"></i> View Customer</a></div>
                </div>
                <div class="container-fluid">
                    <div class="quick-actions_homepage">
                        <ul class="quick-actions">
                            <li> <a href="../dashboard.php"> <i class="icon-dashboard"></i> My Dashboard </a> </li>
                            <li> <a href="new_cus.php"> <i class="icon-people"></i> Add New Customer</a> </li>
                            <li> <a href="cus_main.php"> <i class="icon-people"></i> Edit Customer </a> </li>
                            <li> <a href="../kpi_reports/customer_oustanding.php"> <i class="icon-shopping-bag"></i> Customers Payments </a> </li>
                            <li> <a href="../kpi_reports/customer_oustanding.php"> <i class="icon-calendar"></i> Customer Oustanding </a> </li>
                        </ul>
                    </div>
                    <div class="row-fluid">
                        <div class="widget-box">
                            <div class="widget-title">
                                <span class="icon"><i class="icon-th"></i></span> 
                                <h5>Your Valued Customers</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <table class="table table-bordered data-table">
                                    <thead>
                                        <tr>
                                            <th>Customer Code</th>
                                            <th>Customer Name</th>
                                            <th>Address</th>
                                            <th>Phone Number</th>
                                            <th>Status</th>
                                            <th>Email</th>
                                            <th>Oustanding</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT *  FROM `customer`";
                                        $result = mysqli_query($con, $query);
                                        while ($cus_row = mysqli_fetch_array($result)) {
                                            $c_id = intval($cus_row["c_id"]);
                                            $oustanding = mysqli_fetch_assoc(mysqli_query($con, "SELECT SUM(balance) FROM transaction WHERE c_id=$c_id"))["SUM(balance)"];
                                            ?>
                                            <tr class="gradeU">
                                                <td><?php echo $c_id ?></td>
                                                <td><?php echo $cus_row["customer_name"] ?></td>
                                                <td><?php echo $cus_row["customer_address"] ?></td>
                                                <td><?php echo $cus_row["customer_phone"] ?></td>
                                                <td><?php
                                                    $status = $cus_row["customer_status"];
                                                    if ($status == 1) {
                                                        echo '<span style="color:green">Active</span>';
                                                    } else {
                                                        echo '<span style="color:red">Inactive</span>';
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php echo $cus_row["customer_email"] ?></td>
                                                <td><?php echo dotInput($oustanding) ?></td>
                                                <td>
                                                    <a href="edit_cus.php?c=<?php echo encrydata($c_id) ?>" class="btn btn-success">Edit</a>
                                                    <?php
                                                    $total_cus_trans = mysqli_num_rows(mysqli_query($con, "SELECT * FROM transaction WHERE c_id=$c_id"));
                                                    if ($total_cus_trans == 0) {
                                                        ?>
                                                        <a href="del_cus.php?c=<?php echo encrydata($c_id) ?>" class="btn btn-danger">Delete</a>
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
                                            <th>Customer Code</th>
                                            <th>Customer Name</th>
                                            <th>Address</th>
                                            <th>Phone Number</th>
                                            <th>Status</th>
                                            <th>Email</th>
                                            <th>Oustanding</th>
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