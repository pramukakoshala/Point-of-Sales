<?php
session_start();
include '../valid_fun.php';
if (isset($_SESSION["type"]) && isset($_SESSION["id"])) {
    include '../dbconnect.php';
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title>New Customer</title>
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
                <div id="breadcrumb"> <a href="../Dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom"><i class="icon-user"></i> Add New Customer</a></div>
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
                                        <label class="control-label">First Name :</label>
                                        <div class="controls">
                                            <input type="text" class="span11" name="customer_name" placeholder="First name" required/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Last Name :</label>
                                        <div class="controls">
                                            <input type="text" class="span11" name="customer_name2" placeholder="Last name" required/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Address</label>
                                        <div class="controls">
                                            <textarea class="span11" name="customer_address"></textarea>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Select City</label>
                                        <div class="controls">
                                            <select name="customer_city">
                                                <?php
                                                $query = "select * from location";
                                                $result = mysqli_query($con, $query);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?php echo $row["id"] ?>"><?php echo $row["location_name"] ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Customer Mobile :</label>
                                        <div class="controls">
                                            <input type="number" name="customer_phone" class="span11" placeholder="(081) XXX XXXX" required/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Customer Email :</label>
                                        <div class="controls">
                                            <input type="email" name="customer_email" class="span11" placeholder="Customer Email" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="widget-box">
                                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                                    <h5>General Informations</h5>
                                </div>
                                <div class="widget-content nopadding">
                                    <div class="control-group">
                                        <label class="control-label">Birth Day (dd-mm)</label>
                                        <div class="controls">
                                            <input type="date" name="customer_birthdate" class="datepicker span11">
                                            <span class="help-block"></span> 
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Select Gender</label>
                                        <div class="controls">
                                            <select name="customer_gender">
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Select Status</label>
                                        <div class="controls">
                                            <select name="customer_status">
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
                                        <button type="submit" name="submit" class="btn btn-success" style="width: 40%">Save As a Customer</button>
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
        $name = $_POST['customer_name'] . " " . $_POST['customer_name2'];
        $address = $_POST['customer_address'];
        $city = $_POST['customer_city'];
        $phone = $_POST['customer_phone'];
        $mobile = "";
        $email = $_POST['customer_email'];
        $gender = $_POST['customer_gender'];
        $birthday = $_POST['customer_birthdate'];
        $status = $_POST['customer_status'];
        $image = 'default-cus.png';
        //CHECKING IMAGE TYPE------------------------------------------------
        if (!empty($_FILES["image"]["name"])) {
            $total = mysqli_fetch_row(mysqli_query($con, "SELECT MAX(c_id) FROM customer"))[0] + 1;
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
        $sql = "INSERT INTO customer (`customer_name`, `customer_address`, `customer_city`, `customer_phone`,`customer_mobile`, `customer_email`, `customer_gender`, `customer_birthdate`, `customer_status`, `image`) VALUES (\"$name\", \"$address\", \"$city\", \"$phone\", \"$mobile\", \"$email\", \"$gender\", \"$birthday\", \"$status\", \"$image\")";
        if ($con->query($sql) == TRUE) {
            ?>
            <script>
                window.location.href = "cus_main.php";
            </script>
            <?php
        } else {
            echo $con->error;
        }
    }
} else {
    header("location:../");
}