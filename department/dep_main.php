<?php
session_start();
include '../valid_fun.php';
if (isset($_SESSION["type"]) && isset($_SESSION["id"])) {
    include '../dbconnect.php';
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Department Maintanance</title>
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
                    <div id="breadcrumb"> <a href="../Dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom"><i class="icon-user"></i> View Departments</a></div>
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
                                <h5>Your System Departments</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <table class="table table-bordered data-table">
                                    <thead>
                                        <tr>
                                            <th>Logo</th>
                                            <th>Department Name</th>
                                            <th>Address</th>
                                            <th>Department Phone</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT * FROM `department`";
                                        $result = mysqli_query($con, $query);
                                        while ($dep_row = mysqli_fetch_array($result)) {
                                            $dep_id = intval($dep_row["dep_id"]);
                                            ?>
                                            <tr class="gradeU">
                                                <td style="text-align: center"><img src="uploads/images/<?= $dep_row['logo'] ?>" width="30"></td>
                                                <td><?php echo $dep_row["name"] ?></td>
                                                <td><?php echo $dep_row["address"] ?></td>
                                                <td><?php echo $dep_row["phone"] ?></td>
                                                <td><?php echo $dep_row["email"] ?></td>
                                                <td><?php
                                                    $status = $dep_row["status"];
                                                    if ($status == 1) {
                                                        echo '<span style="color:green">Active</span>';
                                                    } else {
                                                        echo '<span style="color:red">Inactive</span>';
                                                    }
                                                    ?></td>
                                                <td><a href="edit_dep.php?d=<?php echo encrydata($dep_id) ?>" class="btn btn-success">Edit</a></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Supplier Code</th>
                                            <th>Supplier Name</th>
                                            <th>Address</th>
                                            <th>Department Phone</th>
                                            <th>Email</th>
                                            <th>Status</th>
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