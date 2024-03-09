<?php
session_start();
include 'valid_fun.php';
if (isset($_SESSION["type"]) && isset($_SESSION["id"])) {
    include 'code.php';
    include 'dbconnect.php';
    if (($_GET["invoice"] == null) || !isset($_GET["invoice"])) {
        $code = ($finalcode);
        header("location:billing.php?invoice=$code");
    } else {
        $code = $_GET["invoice"];
    }
    $today_date = strtotime(date("Y-m-d"));
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Billing Dashboard</title>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <link rel="stylesheet" href="css/bootstrap.min.css" />
            <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
            <link rel="stylesheet" href="css/uniform.css" />
            <link rel="stylesheet" href="css/select2.css" />
            <link rel="stylesheet" href="css/maruti-style.css" />
            <link rel="stylesheet" href="css/maruti-media.css" class="skin-color" />
        </head>
        <body>
            <div id="content" style="margin: 0px; height: 750px;">
                <div class="container-fluid">
                    <div class="row-fluid">
                        <div class="span8">
                            <form action="incoming.php" method="post" class="form-horizontal">

                                <?php
                                $ret_g_no = 0;
                                if (isset($_GET["ret_g"])) {
                                    $ret_g_no = intval($_GET["ret_g"]);
                                }
                                ?>
                                <input class="form-control" type="hidden" name="ret_g" value="<?= $ret_g_no ?>"/>
                                <input class="form-control" type="hidden" name="u" value="<?php echo encrydata($_SESSION["id"]) ?>"/>
                                <input class="form-control" type="hidden" name="invoice" value="<?php echo $code ?>" />
                                <input class="form-control" type="hidden" name="date" value="<?php echo date("Y-m-d") ?>" />
                                <div class="span12">
                                    <div class="span5">
                                        <select name="pro_id" id="pro_id" style="width:100%;">
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
                                    <input type="hidden" value="0" id="lower_price">
                                    <input type="hidden" value="0" id="higher_price">
                                    <div class="span2" id="quantity_base">
                                        <input type="text" class="span12" id="quantity" name="quantity" placeholder="Quantity" value="1" autocomplete="off" required/>
                                    </div>
                                    <div class="span2" id="uprice_base">
                                        <input type="text" class="span12" placeholder="Unit Price"  name="unit_p" id="unit_p" autocomplete="off" required/>
                                    </div>
                                    <div class="span3">
                                        <button name="add" type="submit" id="add" class="form-control btn btn-success" accesskey="z" style="width:90%;"/><i class="icon-plus-sign icon-large"></i> Add to Bill</button>
                                    </div>
                                </div>
                            </form>
                            <div class="span12">
                                <hr>
                            </div>
                            <form action="add_trans_fun.php" method="post" class="form-horizontal">
                                <div class="span12">
                                    <input class="form-control" type="hidden" name="u" value="<?php echo encrydata($_SESSION["id"]) ?>"/>
                                    <input class="form-control" type="hidden" name="invoice" value="<?php echo $code ?>" />
                                    <input class="form-control" type="hidden" name="transaction_date" value="<?php echo date("Y-m-d H:i:s") ?>" />
                                    <div class="span12">
                                        <div class="span4">
                                            <select name="c_id" id="c_id" class="form-control selectpicker" data-live-search="true" required="" style="width:100%;">
                                                <option value="1">Walking Customer</option>
                                                <?php
                                                $cus_result = mysqli_query($con, "SELECT *  FROM `customer` WHERE c_id != 1");
                                                while ($cus_row = mysqli_fetch_array($cus_result)) {
                                                    ?>
                                                    <option value="<?php echo encrydata($cus_row['c_id']); ?>"><?php echo $cus_row['customer_name'] ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="span2">
                                            <input type="text" class="span12" placeholder="Oustanding" value="0"  name="outstand" id="outstand" autocomplete="off" readonly/>
                                        </div>
                                        <div class="span3">
                                            <input type="text" class="span12" name="date_time" placeholder="Date & Time" value="<?php echo date("Y.m.d H:i:s"); ?>" readonly/>
                                        </div>
                                        <div class="span3" style="width: 21%;">
                                            <input type="text" class="span12" name="user" id="u" placeholder="Cashier" value="Cashier | <?php echo ucwords($_SESSION["name"]) ?>" autocomplete="off" readonly/>
                                        </div>
                                    </div>
                                    <hr>
                                    <div style="background-color: #f7ff99; padding: 1%; margin-left: 2.5%; height: 590px; overflow: scroll;">
                                        <table class="table table-bordered " id="tab_logic" data-responsive="table" style="width: 100%; background-color: #fff;">
                                            <thead>
                                                <tr>
                                                    <th> Product Name </th>
                                                    <th> Qty </th>
                                                    <th> Unit Price </th>
                                                    <th> Total </th>
                                                    <th> Remove </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $ret_txt = '';
                                                if (isset($_GET["ret_g"])) {
                                                    $ret_txt = '&ret_g=1';
                                                }
                                                $loop = 1;
                                                $real_invoice = ($code);
                                                $other_dis_amount = floatval(mysqli_fetch_assoc(mysqli_query($con, "SELECT SUM(dis_amount) FROM temp_dis WHERE invoice='$real_invoice'"))["SUM(dis_amount)"]);
                                                $pro_per_invoice = "SELECT * FROM sales_order WHERE invoice='$real_invoice'";
                                                $pro_per_result = mysqli_query($con, $pro_per_invoice);
                                                while ($pro_per_row = mysqli_fetch_array($pro_per_result)) {
                                                    $pro_id = intval($pro_per_row["pro_id"]);
                                                    $sal_id = intval($pro_per_row["sales_id"]);
                                                    $dis_txt = "";
                                                    $is_dis_row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM temp_dis WHERE sales_id=$sal_id"));
                                                    if ($is_dis_row != null) {
                                                        $dis_txt = "&dis=" . encrydata($is_dis_row["td_id"]);
                                                    }
                                                    $pro_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM products WHERE pro_id=$pro_id"));
                                                    $pro_name = ucwords($pro_det["product_name"]);
                                                    ?>
                                                    <tr class="record">
                                                        <td style="width: 50%;"><?php echo $pro_name ?></td>
                                                        <td style="width: 15%;"><input type="text" name="srow_quantity" id="srow_quantity" value='<?php echo $pro_per_row["quantity"] ?>' class="span12 qty" readonly="" style="text-align: center;"/></td>
                                                        <td style="width: 15%;"><input type="text" name="srow_unit_price" id="srow_unit_price" value='<?php echo dotInput($pro_det["unit_price"]) ?>' class="span12 price"onmouseover="this.focus();" readonly="" style="text-align: right;"/></td>
                                                        <td style="width: 15%;"><input type="text" name="total" id="total" value='<?php echo dotInput($pro_per_row["total"]) ?>' class="span12 total" readonly="" style="text-align: right;"/></td>
                                                        <td style="width: 5%;"><a href="del_sales_row.php?invoice=<?php echo $code; ?>&s=<?php echo encrydata($pro_per_row["sales_id"]); ?>&u=<?php echo encrydata($_SESSION["id"]); ?>&qty=<?php echo $pro_per_row["quantity"]; ?>&p=<?php echo encrydata($pro_id) . $dis_txt . $ret_txt; ?>"><button type="button" id="del_re_<?= $loop ?>" class="del_re btn btn-danger"><i class="icon icon-remove"></i></button></a></td>
                                                    </tr>
                                                    <?php
                                                    $loop++;
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                        </div>
                        <div class="span4">
                            <div style="background-color: #fff; padding: 1%;">
                                <table class="table table-bordered" id="tab_logic_total" style="border: none">
                                    <tbody>
                                        <?php
                                        $prev_tot = 0;

                                        if (isset($_GET["ret_g"])) {
                                            $trans_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM transaction WHERE invoice='$real_invoice'"));
                                            $prev_tot = floatval($trans_det["total"]);
                                            ?>
                                            <tr>
                                                <th style="width: 50%; font-size:14px;">Previous Total</th>
                                                <td class="text-center">
                                                    <input type="text" value="<?php echo dotInput($trans_det["total"]) ?>" placeholder='0.00' readonly/>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <input type="hidden" id="prev_tot_bal" value="<?= $prev_tot ?>" readonly />
                                    <input type="hidden" value="0" name="promo" id="promo">
                                    <tr>
                                        <th style="width: 50%; font-size:14px;">Sub Total</th>
                                        <td class="text-center">
                                            <input type="text" name='sub_total' placeholder='0.00' id="sub_total" readonly/>
                                        </td>
                                    </tr>
                                    <tr style="display:none">
                                        <th class="text-right" style="font-size:14px;">Discount</th>
                                        <td class="text-center">
                                            <div class="input-group mb-2 mb-sm-0">
                                                <input type="text" id="tax" placeholder="0">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr style="display:none">
                                        <th class="text-right" style="font-size:14px;">Dis. Amount</th>
                                        <td class="text-center">
                                            <input type="text" name='discount' id="tax_amount" placeholder='0.00' readonly/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-right" style="font-size:14px;">Discount</th>
                                        <td class="text-center">
                                            <input type="text" name='other_dis' id="other_dis" value='<?php echo round($other_dis_amount, 2) ?>' readonly/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-right" style="font-size:14px;">Total</th>
                                        <td class="text-center">
                                            <input type="hidden" value="0" id="total_amount_tmp" readonly/>
                                            <input type="text" name='total' id="total_amount" placeholder='0.00' readonly/>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <th class="text-right" style="font-size:14px;">Paid Amount</th>
                                        <td class="text-center">
                                            <input type="text" name='paid_amount' id="paid_amount" placeholder='0.00' accesskey="a" required autocomplete="off"/>
                                        </td>
                                    </tr>
									
                                    <tr>
                                        <th class="text-right" style="font-size:14px;">Balance
                                            <input type="checkbox" onclick="reduceBal()" id="chec"> (Paid)
                                        </th>

                                        <td class="text-center">
                                            <input type="number" name='balance' id="balance" placeholder='0.00' class="balance" readonly/>
                                        </td>
                                    </tr>
									<tr>
                                        <th class="text-right" style="font-size:14px;">Payment Type</th>
                                        <td class="text-center">
                                            <div class="controls" style="padding-bottom:4%;">
                                                <select id="pay_type" name="pay_type" style="width: 100%;">
                                                    <option value="1" class="pay_type_ops">Cash</option>
                                                    <option value="2" class="pay_type_ops">Credit Card</option>
                                                    <option value="3" class="pay_type_ops">Cheque Payment</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-right" style="font-size:14px;">Department</th>
                                        <td class="text-center">
                                            <div class="controls" style="padding-bottom:4%;">
                                                <select name="department" style="width:100%;" required>
                                                    <?php
                                                    $query_dep = "SELECT * FROM `department`";
                                                    $result_dep = mysqli_query($con, $query_dep);
                                                    while ($row_dep = mysqli_fetch_array($result_dep)) {
                                                        ?>
                                                        <option value="<?php echo encrydata($row_dep['dep_id']); ?>">
                                                            <?php echo $row_dep['name']; ?>
                                                        </option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
								<br>
                                <div class="form-actions">
                                    <!--F10-->
                                    <input type="hidden" id="secret" name='secret' value="<?= (isset($_GET['sec'])) ? intval($_GET['sec']) : 0 ?>" readonly />
                                    <button name="submit" type="submit" id="bill_end" class="btn btn-success" style="width: 48%; padding:5%;">Print Bill</button>
                                    <button name="save" type="submit" id="save_only_btn" class="btn btn-primary" style="width: 50%; padding:5%;">Save Bill</button><br><br>
                                    <button type="reset" class="btn btn-danger" style="width: 99%; padding:5%;">Reset All</button><br><br>

                                    <?php if (!isset($_GET["ret_g"])) { ?>
                                        <a href="return_goods.php?p=<?php echo $_GET["invoice"] ?>" id="ret_btn" class="btn btn-success" style="width: 89%; padding:5%;">Make Return</a>
                                    <?php } else { ?>
                                        <a href="billing.php" class="btn btn-success" style="width: 85%">New Bill</a>
                                    <?php } ?>
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
            <script src="js/jquery.min.js"></script> 
            <script src="js/jquery.ui.custom.js"></script> 
            <script src="js/bootstrap.min.js"></script> 
            <script src="js/jquery.uniform.js"></script> 
            <script src="js/select2.min.js"></script> 
            <script src="js/jquery.dataTables.min.js"></script> 
            <script src="js/maruti.js"></script> 
            <script src="js/maruti.tables.js"></script>

            <script src="js/ajax_js.js"></script>
            <script src="js/billings_fun.js"></script>
        </body>
    </html>
    <?php
} else {
    header("location:index.php");
}