<?php
session_start();
include '../valid_fun.php';
if (isset($_SESSION["type"]) && isset($_SESSION["id"])) {
    include '../dbconnect.php';
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title>New Department</title>
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
                    <div id="breadcrumb"> <a href="../Dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom"><i class="icon-user"></i> Add New Department</a></div>
                </div>
                <div class="container-fluid">
                    <div class="row-fluid">
                        <form method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="span6">
                                <div class="widget-box">
                                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                                        <h5>Department-info</h5>
                                    </div>
                                    <div class="widget-content nopadding">

                                        <div class="control-group">
                                            <label class="control-label">Department Name :</label>
                                            <div class="controls">
                                                <input type="text" class="span11" name="vendor_name" placeholder="Department name" required/>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Department Address</label>
                                            <div class="controls">
                                                <textarea class="span11" name="vendor_address"></textarea>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Department Contact :</label>
                                            <div class="controls">
                                                <input type="number" name="company_phone" class="span11" placeholder="(081) XXX XXXX" />
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
                                            <label class="control-label">Department Email :</label>
                                            <div class="controls">
                                                <input type="email" name="company_email" class="span11" placeholder="Department Email" />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Select Status</label>
                                            <div class="controls">
                                                <select name="vendor_status">
                                                    <option value="1">Active</option>
                                                    <option value="2">Inactive</option>
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
                                            <button type="submit" name='submit' class="btn btn-success" style="width: 40%">Save Department</button>
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
        $name = $_POST['vendor_name'];
        $address = $_POST['vendor_address'];
        $phone = $_POST['company_phone'];
        $email = $_POST['company_email'];
        $status = $_POST['vendor_status'];
        $image = 'default-ven.png';

        if (!empty($_FILES["image"]["name"])) {
            $total = mysqli_fetch_row(mysqli_query($con, "SELECT MAX(dep_id) FROM department"))[0] + mt_rand(10000, 100000);
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
        $sql = "INSERT INTO `department`(`name`, `address`, `phone`, `email`,`logo`, `status`) VALUES(\"$name\", \"$address\", \"$phone\", \"$email\", \"$image\", \"$status\")";
        if ($con->query($sql) == TRUE) {
            ?>
            <script type="text/javascript" >
                                                            window.location.replace("dep_main.php");
            </script>
            <?php
        } else {
            echo "error";
        }
    }
} else {
    header("location:../");
}
