<?php
session_start();
include '../valid_fun.php';
if (isset($_SESSION["type"]) && isset($_SESSION["id"])) {
    include '../dbconnect.php';

    //GENARATING CODE

    $tot_q_control = mysqli_num_rows(mysqli_query($con, "SELECT q_id FROM q_control"));

    function createRandomPassword($id) {
        $c = intval($id * 3 / 2 * 7);
        $chars = "003232303232023232023456789";
        srand((double) microtime() * 2000000);
        $i = 0;
        $pass = '';
        while ($i <= 7) {
            $num = rand() % 33;
            $tmp = substr($chars, $num, 1);
            $pass = $pass . $tmp;
            $i++;
        }
        return $pass . $c;
    }

    if (!isset($_GET["unic"]) || $_GET["unic"] == null) {
        $code = (createRandomPassword($tot_q_control));
    } else {
        $code = $_GET["unic"];
    }
    //END
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Quantity Control ( Bill wise )</title>
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
                <input type="text" placeholder="Search here..."/>
                <button type="submit" class="tip-left" title="Search"><i class="icon-search icon-white"></i></button>
            </div>

            <div id="content">
                <div id="content-header">
                    <div id="breadcrumb"> <a href="../Dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom"><i class="icon-user"></i> Product Qty Control</a></div>
                </div>
                <div class="container-fluid">

                    <div class="row-fluid">
                        <div class="span12">
                            <form method="post" class="form-horizontal">
                                <div class="span12">
                                    <div class="span3">
                                        <select name="pro_id" name="pro_id" id="pro_id" style="width:100%;">
                                            <option value="0">Select Products</option>
                                            <?php
                                            $pro_query = "SELECT *  FROM `products`";
                                            $pro_result = mysqli_query($con, $pro_query);
                                            while ($pro_row = mysqli_fetch_array($pro_result)) {
                                                $pro_qty = floatval($pro_row["quantity"]);
                                                if ($pro_qty > 0) {
                                                    ?>
                                                    <option value="<?php echo encrydata($pro_row['pro_id']); ?>"><?php echo $pro_row['product_name'] . " | " . $pro_row['barcode']; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="span1" style="display: none">
                                        <input type="text" class="span12" value="<?php echo $code; ?>" name="unic" autocomplete="off" required readonly hidden/>
                                    </div>
                                    <div class="span1" id="quantity_base">
                                        <input type="text" class="span12" id="quantity" name="quantity" placeholder="New Quantity" autocomplete="off" required/>
                                    </div>
                                    <div class="span2">
                                        <input type="text" class="span12" placeholder="Dealer Price"  name="dealer_price" id="dealer_price" autocomplete="off" required/>
                                    </div>
                                    <div class="span2">
                                        <input type="text" class="span12" placeholder="Unit Price"  name="seller_price" id="seller_price" autocomplete="off" required/>
                                    </div>
                                    <div class="span1">
                                        <input type="text" placeholder="Lower Price Limit" class="span12" name="lower_price_limit" id="lower_price_limit"/>
                                    </div>
                                    <div class="span2">
                                        <input type="date" class="span12" name="exp_date"/>
                                    </div>
                                    <div class="span1">
                                        <button name="add" type="submit" class="form-control btn btn-success" accesskey="z" style="width:90%;"/><i class="icon-plus-sign icon-large"></i> Add</button>
                                    </div>
                                </div>
                            </form>
                            <div class="span11">
                                <hr>
                            </div>
                            <div class="span11">
                                <div style="background-color: #fff; padding: 1%;  height: 250px;">
                                    <table class="table table-bordered " id="tab_logic" data-responsive="table" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th> Product Name </th>
                                                <th> Qty </th>
                                                <th> Dealer Price </th>
                                                <th> Unit Price </th>
                                                <th> Total </th>
                                                <th> Remove </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $real_code = ($code);
                                            $result = mysqli_query($con, "SELECT * FROM q_control WHERE qc_id='$real_code'");
                                            while ($row = mysqli_fetch_array($result)) {
                                                $pro_id = intval($row["pro_id"]);
                                                $pro_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM products WHERE pro_id=$pro_id"));
                                                ?>
                                                <tr class="record">
                                                    <td style="width: 40%;"><?php echo ucwords($pro_det["product_name"]) ?></td>
                                                    <td style="width: 15%;"><input type="text" value='<?php echo $row["quantity"] ?>' class="span12" readonly="" style="text-align: center;"/></td>
                                                    <td style="width: 15%;"><input type="text" value='<?php echo dotInput($row["dealer_price"]) ?>' class="span12"onmouseover="this.focus();" readonly="" style="text-align: right;"/></td>
                                                    <td style="width: 15%;"><input type="text" value='<?php echo dotInput($row["seller_price"]) ?>' class="span12"onmouseover="this.focus();" readonly="" style="text-align: right;"/></td>
                                                    <td style="width: 15%;"><input type="text" value='<?php echo dotInput($row["total"]) ?>' class="span12 row_total" readonly="" style="text-align: right;"/></td>
                                                    <td style="width: 5%;"><a href="delete_qty_row.php?q=<?php echo encrydata($row["q_id"]) ?>&u=<?php echo $code ?>"><button type="button" class="btn btn-danger"><i class="icon icon-remove"></i></button></a></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <form method="post">
                                    <div class="span12" style="margin-top: 1%">
                                        <div class="span3">
                                            <div class="control-group">
                                                <label class="control-label">Select Vendor</label>
                                                <select name="vendor" name="vendor" style="width:100%;">
                                                    <?php
                                                    $ven_query = "SELECT * FROM vendor";
                                                    $ven_result = mysqli_query($con, $ven_query);
                                                    while ($ven_row = mysqli_fetch_array($ven_result)) {
                                                        ?>
                                                        <option value="<?php echo encrydata($ven_row['v_id']); ?>"><?php echo $ven_row['vendor_name']; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="span3">
                                            <div class="control-group">
                                                <label class="control-label">Paid Amount</label>
                                                <div class="controls" style=""> 
                                                    <input type="text" id="paid_amount" name="paid_amount" placeholder="Paid Amount"/>
                                                    <input type="checkbox" name="chec"  data-title="Pay As A Debit" class="tip" data-original-title="" id="chec" onclick="reduceBal()" style="margin-left: 5%"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="span4" style="display: none">
                                            <div class="control-group">
                                                <div class="controls">
                                                    <input type="text" name="unic" class="span11" value="<?php echo $code ?>" style="width: 80%;" readonly required hidden/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="span2">
                                            <div class="control-group">
                                                <label class="control-label">Total Amount</label>
                                                <div class="controls">
                                                    <input type="text" id="total_amount" name='total_amount' class="span11" placeholder="Total Amount" style="width: 80%;" readonly/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="span2">
                                            <div class="control-group">
                                                <label class="control-label">Balance</label>
                                                <div class="controls">
                                                    <input type="text" class="span11" id="balance" value="0.00" placeholder="Balance" style="width: 80%;" readonly/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="span2">
                                            <div class="control-group">
                                                <label class="control-label">Ref No. :</label>
                                                <div class="controls">
                                                    <input type="text" name='ref_no' class="span11" placeholder="Enter Bill No or Ref No" style="width: 80%;" required/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" name="submit" class="btn btn-success" style="width: 30%">Add New Quantity</button>
                                        <a href="bill_qty_control.php?unic=<?php echo $code ?>" class="btn btn-danger" style="width: 30%">Reset All</a>
                                    </div>
                                </form>
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
            <script>
                                                        $("select[name='pro_id']").change(function () {
                                                            var pro_id = $(this).val();
                                                            $.ajax({
                                                                url: "get_pro_det.php",
                                                                Type: "get",
                                                                data: {'p': pro_id},
                                                                success: function (data) {
                                                                    var obj = JSON.parse(data);
                                                                    if (obj["price"] != "") {
                                                                        var txt_arr = obj["price"].split("_");
                                                                        $('#dealer_price').val(txt_arr[0]);
                                                                        $('#seller_price').val(txt_arr[1]);
                                                                        $('#lower_price_limit').val(txt_arr[2]);
                                                                    } else {
                                                                        $('#dealer_price').val("");
                                                                        $('#seller_price').val("");
                                                                        $('#lower_price_limit').val("");
                                                                    }
                                                                }
                                                            });
                                                        });
                                                        var total = 0.00;
                                                        $('.row_total').each(function () {
                                                            total += parseFloat($(this).val());
                                                        });
                                                        $("#total_amount").val(total.toFixed(2));
                                                        function reduceBal() {
                                                            localStorage.setItem("ch", $("#paid_amount").val());
                                                            $("#paid_amount").val("0.00");
                                                            $("#balance").val(0);
                                                            document.getElementById("chec").setAttribute("onclick", "rec()");
                                                            document.getElementById("paid_amount").setAttribute("readonly", "");
                                                        }
                                                        function rec() {
                                                            $("#paid_amount").val(localStorage.getItem("ch"));
                                                            if (!isNaN(localStorage.getItem("ch"))) {
                                                                var paid_amount = localStorage.getItem("ch");
                                                                var total_amount = $("#total_amount").val();
                                                                $("#balance").val(paid_amount - total_amount);
                                                            }
                                                            localStorage.removeItem("ch");
                                                            document.getElementById("chec").setAttribute("onclick", "reduceBal()");
                                                            document.getElementById("paid_amount").removeAttribute("readonly");
                                                        }
                                                        $('#paid_amount').on('input', function () {
                                                            if (!isNaN($(this).val())) {
                                                                var paid_amount = $(this).val();
                                                                var total_amount = $("#total_amount").val();
                                                                $("#balance").val(paid_amount - total_amount);
                                                            }
                                                        });
            </script>
        </body>
    </html>
    <?php
    if (isset($_POST["add"])) {
        $pro_id = decrydata($_POST["pro_id"]);
        $unic = ($_POST["unic"]);
        $quantity = floatval($_POST["quantity"]);
        $dealer_price = floatval($_POST["dealer_price"]);
        $seller_price = floatval($_POST["seller_price"]);
        $exp_date = $_POST["exp_date"];
        $lower_price_limit = $_POST["lower_price_limit"];
        $total = $quantity * $dealer_price;
        mysqli_query($con, "INSERT INTO q_control(qc_id,quantity,dealer_price,seller_price,total,pro_id,exp_date,lower_price_limit) VALUES('$unic','$quantity','$dealer_price','$seller_price','$total',$pro_id,'$exp_date',$lower_price_limit)");
        ?>
        <script>
            window.location.href = "bill_qty_control.php?unic=<?php echo $_POST["unic"]; ?>";
        </script>
        <?php
    }
    if (isset($_POST["submit"])) {
        $date_time = date("Y-m-d H:i:s");
        $date = date("Y-m-d");
        $paid_amount = floatval($_POST["paid_amount"]);
        $total_amount = floatval($_POST["total_amount"]);
        $ref_no = $_POST["ref_no"];
        $unic = ($_POST["unic"]);
        $vendor = decrydata($_POST["vendor"]);
        $result = mysqli_query($con, "SELECT * FROM q_control WHERE qc_id='$unic'");
        while ($row = mysqli_fetch_array($result)) {
            $pro_id = intval($row["pro_id"]);
            $pro_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM products WHERE pro_id=$pro_id"));
            $new_qty = floatval($pro_det["quantity"]) + floatval($row["quantity"]);
            $new_dealer_price = floatval($row["dealer_price"]);
            $new_seller_price = floatval($row["seller_price"]);
            $exp_date = $row["exp_date"];
            $lower_price_limit = $row["lower_price_limit"];
            mysqli_query($con, "UPDATE products SET quantity='$new_qty',exp_date='$exp_date',lower_price_limit=$lower_price_limit,dealer_price='$new_dealer_price',f_qty='$new_qty',unit_price='$new_seller_price' WHERE pro_id=$pro_id");
        }
        if (empty($_POST["chec"])) {
            mysqli_query($con, "INSERT INTO vendor_payment(v_id,date,ref_no,bill_amount,paid_amount) VALUES($vendor,'$date','$ref_no','$total_amount','$paid_amount')");
        } else {
            mysqli_query($con, "INSERT INTO vendor_payment(v_id,date,ref_no,bill_amount,paid_amount,status) VALUES($vendor,'$date','$ref_no','$total_amount','$paid_amount',1)");
        }
        ?>
        <script>
            window.location.href = "bill_qty_control.php";
        </script>
        <?php
    }
} else {
    header("location:../");
}