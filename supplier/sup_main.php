<?php
session_start();
include '../valid_fun.php';
if (isset($_SESSION["type"]) && isset($_SESSION["id"])) {
    include '../dbconnect.php';
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Supplier Maintanance</title>
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
                    <div id="breadcrumb"> <a href="../Dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom"><i class="icon-user"></i> View Supplier</a></div>
                </div>
                <div class="container-fluid">
                    <div class="quick-actions_homepage">
                        <ul class="quick-actions">
                            <li> <a href="#"> <i class="icon-dashboard"></i> My Dashboard </a> </li>
                            <li> <a href="#"> <i class="icon-people"></i> Add New Supplier</a> </li>
                            <li> <a href="#"> <i class="icon-people"></i> Edit Supplier </a> </li>
                            <li> <a href="#"> <i class="icon-shopping-bag"></i> Supplier Payments </a> </li>
                            <li> <a href="#"> <i class="icon-calendar"></i> Supplier Oustanding </a> </li>
                        </ul>
                    </div>
                    <div class="row-fluid">
                        <div class="widget-box">
                            <div class="widget-title">
                                <span class="icon"><i class="icon-th"></i></span> 
                                <h5>Your System Suppliers</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <table class="table table-bordered data-table">
                                    <thead>
                                        <tr>
                                            <th>Supplier Code</th>
                                            <th>Logo</th>
                                            <th>Supplier Name</th>
                                            <th>Address</th>
                                            <th>Ref. Phone No</th>
                                            <th>Pay Type</th>
                                            <th>Status</th>
                                            <th>Oustanding</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT * FROM `vendor`";
                                        $result = mysqli_query($con, $query);
                                        while ($ven_row = mysqli_fetch_array($result)) {
                                            $v_id = intval($ven_row["v_id"]);
                                            $sum_amount = mysqli_fetch_assoc(mysqli_query($con, "SELECT SUM(paid_amount),SUM(bill_amount) FROM vendor_payment WHERE v_id=$v_id"));
                                            $oustanding = floatval($sum_amount["SUM(paid_amount)"]) - floatval($sum_amount["SUM(bill_amount)"]);
                                            ?>
                                            <tr class="gradeU">
                                                <td><?php echo $ven_row["v_id"] ?></td>
                                                <td style="text-align: center"><?php if ($ven_row['image'] != ''){?><img src="uploads/images/<?= $ven_row['image'] ?>" class="zoom" width="50"><?php } else { echo 'No Image';}?></td>
                                                <td><?php echo $ven_row["vendor_name"] ?></td>
                                                <td><?php echo $ven_row["vendor_address"] ?></td>
                                                <td><?php echo $ven_row["ref_mobile"] ?></td>
                                                <td><?php
                                                    $status = $ven_row["vendor_status"];
                                                    if ($status == 1) {
                                                        echo '<span style="color:green">Active</span>';
                                                    } else {
                                                        echo '<span style="color:red">Inactive</span>';
                                                    }
                                                    ?></td>
                                                <td><?php echo $ven_row["company_email"] ?></td>
                                                <td><?php echo dotInput($oustanding) ?></td>
                                                <td><a href="edit_sup.php?v=<?php echo encrydata($ven_row["v_id"]) ?>" class="btn btn-success">Edit</a></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Supplier Code</th>
                                            <th>Logo</th>
                                            <th>Supplier Name</th>
                                            <th>Address</th>
                                            <th>Ref. Phone No</th>
                                            <th>Pay Type</th>
                                            <th>Status</th>
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