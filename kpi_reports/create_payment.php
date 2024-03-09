<?php
session_start();
include '../valid_fun.php';
if (isset($_SESSION["type"]) && isset($_SESSION["id"]) && isset($_GET["c"])) {
    include '../dbconnect.php';
    $c_id = validNumber(decrydata($_GET["c"]), "../");
    $cus_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM customer WHERE c_id=$c_id"));
    $trans_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT c_id,SUM(total),SUM(paid_amount),SUM(balance) FROM transaction WHERE c_id=$c_id"));
    $sum_tot = floatval($trans_det['SUM(total)']);
    $sum_pay = floatval($trans_det['SUM(paid_amount)']);
    $sum_bal = $sum_tot - $sum_pay;
    if ($_SESSION["tax_active"] == 1) {
        $temp_trans_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT c_id,SUM(total),SUM(paid_amount),SUM(balance) FROM temp_transaction WHERE c_id=$c_id"));
        $sum_tot += floatval($temp_trans_det['SUM(total)']);
        $sum_pay += floatval($temp_trans_det['SUM(paid_amount)']);
        $sum_bal += (floatval($temp_trans_det['SUM(total)']) - floatval($temp_trans_det['SUM(paid_amount)']));
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Maruti Admin</title>
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
                                    <h5>Create Payment - for Customer</h5>
                                </div>
                                <div class="widget-content nopadding">
                                    <div class="control-group">
                                        <label class="control-label">Customer :</label>
                                        <div class="controls">
                                            <input type="text" value="<?php echo ucwords($cus_det["customer_name"]) ?>" class="span11" name="customer_name" placeholder="Customer Name" style="width: 80%;" readonly/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Purchase Item Amount :</label>
                                        <div class="controls">
                                            <input type="text" class="span11" value="<?php echo $sum_tot ?>" name="total" placeholder="Rs. XXXX.XX" readonly style="width: 80%;"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Paid Amount :</label>
                                        <div class="controls">
                                            <input type="text" class="span11" value="<?php echo $sum_pay ?>" name="paid_amount" placeholder="Rs. XXXX.XX" readonly style="width: 80%;"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Oustanding Amount:</label>
                                        <div class="controls">
                                            <input type="text" class="span11" value="<?php echo round($sum_bal, 2) ?>" name="balance" placeholder="Rs. XXXX.XX" style="width: 80%;" readonly/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Payment Date :</label>
                                        <div class="controls">
                                            <input type="text" class="span11" name="date_time"  Value="<?php echo date("Y.m.d H:i:s"); ?>" style="width: 80%;" readonly/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Payment Amount :</label>
                                        <div class="controls">
                                            <input type="text" name="pay_amount" class="span11" placeholder="Rs. XXXX.XX" style="width: 80%;" />
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" name="submit" class="btn btn-success" style="width: 65%">Create Payment</button>
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
    <a href="../printing/example/interface/cus_payment.php"></a>
    <?php
    if (isset($_POST["submit"])) {
        $paid_amount = $_POST["pay_amount"];
        $date_time = $_POST["date_time"];
        $result = mysqli_query($con, "INSERT INTO transaction(c_id,transaction_date,paid_amount,balance) VALUES($c_id,'$date_time','$paid_amount','$paid_amount')");
        if ($result) {
            $insert = mysqli_insert_id($con);
        }
        ?>
        <script>
            window.location.href = "../printing/example/interface/cus_payment.php?pay=<?= encrydata($insert) ?>";
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