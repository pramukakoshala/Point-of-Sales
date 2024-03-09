<?php
session_start();
include '../valid_fun.php';
if (isset($_SESSION["type"]) && isset($_SESSION["id"]) && isset($_GET["p"]) && $_GET["p"] != null) {
    include '../dbconnect.php';
    $pro_id = validNumber(decrydata($_GET["p"]), "../");
    $pro_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM products WHERE pro_id=$pro_id"));
    if ($pro_det != null) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <title><?php echo $pro_det["product_name"] . " | Quantity Control" ?></title>
                <meta charset="UTF-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <link rel="stylesheet" href="../css/bootstrap.min.css" />
                <link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
                <link rel="stylesheet" href="../css/fullcalendar.css" />
                <link rel="stylesheet" href="../css/maruti-style.css" />
                <link rel="stylesheet" href="../css/datepicker.css" />
                <link rel="stylesheet" href="../css/select2.css" />
                <link rel="stylesheet" href="../css/maruti-media.css" class="skin-color" />
                <link rel="stylesheet" href="../css/colorpicker.css" />
                <link rel="stylesheet" href="../css/uniform.css" />
                <link rel="stylesheet" href="../css/maruti-style.css" />
            </head>
            <body>
                <!--<div id="content">-->
                <div class="container-fluid">
                    <div class="span12">
                        <div class="row-fluid">
                            <form method="post" class="form-horizontal">
                                <div class="widget-box">
                                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                                        <h5>New Product Purchasing</h5>
                                    </div>
                                    <div class="widget-content nopadding">
                                        <div class="control-group" hidden>
                                            <label class="control-label"></label>
                                            <div class="controls">
                                                <input type="text" class="span11" name="product" value="<?php echo $_GET["p"] ?>" readonly required hidden/>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">New Quantity :</label>
                                            <div class="controls">
                                                <input type="text" class="span11" name="quantity" placeholder="Enter New Quantity" style="width: 80%;"/>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">New Dealer Price :</label>
                                            <div class="controls">
                                                <input type="text" value="<?php echo $pro_det["dealer_price"]; ?>" class="span11" name="dealer_price" placeholder="Rs. XXXX.XX" style="width: 80%;"/>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">New Selling Price :</label>
                                            <div class="controls">
                                                <input type="text" value="<?php echo $pro_det["unit_price"]; ?>" class="span11" name="unit_price" placeholder="Rs. XXXX.XX" style="width: 80%;"/>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">New Expiring Date :</label>
                                            <div class="controls">
                                                <input type="date" value="<?php echo $pro_det["exp_date"]; ?>" class="span11" name="exp_date" placeholder="Expiring Date :" style="width: 80%;"/>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Lower Price Limit :</label>
                                            <div class="controls">
                                                <input type="text" value="<?php echo $pro_det["lower_price_limit"]; ?>" class="span11" name="lower_price_limit" placeholder="Lower Price Limit" style="width: 80%;"/>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Pay As a Credit</label>
                                            <div class="controls">
                                                <label>
                                                    <input type="checkbox" name="is_debit" />
                                                </label>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Ref No. :</label>
                                            <div class="controls">
                                                <input type="text" name='ref_no' class="span11" name="paid_amount" placeholder="Enter Bill No or Ref No" style="width: 80%;"/>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button name="update" type="submit" class="btn btn-success" style="width: 65%">Purchase New Stock</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <script src="../js/excanvas.min.js"></script> 
                <script src="../js/jquery.min.js"></script> 
                <script src="../js/jquery.ui.custom.js"></script>
                <script src="../js/jquery.ui.custom.js"></script> 
                <script src="../js/bootstrap.min.js"></script> 
                <script src="../js/bootstrap-datepicker.js"></script> 
                <script src="../js/jquery.flot.min.js"></script> 
                <script src="../js/jquery.flot.resize.min.js"></script> 
                <script src="../js/jquery.peity.min.js"></script> 
                <script src="../js/fullcalendar.min.js"></script> 
                <script src="../js/maruti.js"></script> 
                <script src="../js/maruti.dashboard.js"></script> 
                <script src="../js/maruti.chat.js"></script>
                <script src="../js/bootstrap-colorpicker.js"></script> 
                <script src="../js/jquery.uniform.js"></script> 
                <script src="../js/select2.min.js"></script> 
                <script src="../js/maruti.form_common.js"></script>
            </body>
        </html>
        <?php
        if (isset($_POST['update'])) {
            $pro_id = validNumber(decrydata($_POST['product']), "../");
            $pro_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM products WHERE pro_id=$pro_id"));
            $v_id = $pro_det["v_id"];
            $base_qty = floatval($pro_det["quantity"]);
            $qty = floatval($_POST['quantity']);
            $avilable_qty = $base_qty + $qty;
            $dealer_price = $_POST['dealer_price'];
            $unit_price = $_POST['unit_price'];
            $exp_date = $_POST['exp_date'];
            $date = date("Y-m-d");
            $ref_no = $_POST["ref_no"];
            $lower_price_limit = $row["lower_price_limit"];
            $total_amount = floatval($qty) * floatval($dealer_price);

            if (!empty($_POST["is_debit"])) {
                mysqli_query($con, "INSERT INTO vendor_payment (v_id,date,ref_no,item_count,bill_amount,status) VALUES(\"$v_id\",\"$date\",\"$ref_no\",\"$qty\",\"$total_amount\",1)");
            } else {
                mysqli_query($con, "INSERT INTO vendor_payment (v_id,date,item_count,bill_amount,status) VALUES(\"$v_id\",\"$date\",\"$qty\",\"$total_amount\",0)");
            }
            $sql = "UPDATE products set quantity= quantity + \"$qty\", lower_price_limit=\"$lower_price_limit\", dealer_price=\"$dealer_price\", unit_price=\"$unit_price\", f_qty=\"$avilable_qty\", exp_date=\"$exp_date\" WHERE pro_id=$pro_id";
            if ($con->query($sql) == TRUE) {
                ?>
                <script type="text/javascript" >
                    window.location.replace("edit_qty_control.php");
                    window.close();
                </script>
                <?php
            } else {
                echo 'error';
            }
        }
    } else {
        ?>
        <script>
            window.close("");
        </script>
        <?php
    }
} else {
    ?>
    <script>
        window.close("");
    </script>
    <?php
}