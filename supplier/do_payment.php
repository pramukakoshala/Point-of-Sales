<?php
session_start();
include '../valid_fun.php';
if (isset($_SESSION["type"]) && isset($_SESSION["id"])) {
    include '../dbconnect.php';
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
                                    <h5>Create Payment - for supplier</h5>
                                </div>
                                <div class="widget-content nopadding">
                                    <div class="control-group">
                                        <label class="control-label">Select Vendor</label>
                                        <div class="controls">
                                            <select name="ven_id" style="width: 80%;">
                                                <option value="<?php echo encrydata(0); ?>">Select Vendor</option>
                                                <?php
                                                $query = "SELECT *  FROM `vendor`";
                                                $result = mysqli_query($con, $query);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    $v_id = $row['v_id'];
                                                    $pay_det = mysqli_query($con, "SELECT id FROM vendor_payment WHERE v_id=$v_id AND status=1");
                                                    if (mysqli_num_rows($pay_det) > 0) {
                                                        ?>
                                                        <option value="<?php echo encrydata($v_id); ?>">
                                                            <?php echo $row['vendor_name']; ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Cheque No :</label>
                                        <div class="controls">
                                            <input type="number" class="span11" name="check_no" placeholder="Cheque No" style="width: 80%;"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Receipt/ Reference No</label>
                                        <div class="controls">
                                            <select name="receipt_no" id="receipt_no" style="width: 80%;">
                                                <option value="0">Select Receipt No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Oustanding :</label>
                                        <div class="controls">
                                            <input type="text" class="span11" name="ous_amount" id="ous_amount" placeholder="Rs. XXXX.XX" readonly style="width: 80%;"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Paid Amount :</label>
                                        <div class="controls">
                                            <input type="text" class="span11" name="paid_amount" id="paid_amount" placeholder="Rs. XXXX.XX" style="width: 80%;"/>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Balance Amount :</label>
                                        <div class="controls">
                                            <input type="text" name="bal_amount" id="bal_amount" class="span11" placeholder="Rs. XXXX.XX" style="width: 80%;" readonly/>
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
            <script>
                $("select[name='ven_id']").change(function () {
                    var ven_id = $(this).val();
                    if (ven_id != -1) {
                        $.ajax({
                            url: "getVendorOus.php",
                            Type: "get",
                            data: {'ven_id': ven_id},
                            success: function (data) {
                                var obj = JSON.parse(data);
                                $('#ous_amount').val(obj["oustand"]);
                            }
                        });
                        $.ajax({
                            url: "getVendorRef.php",
                            Type: "get",
                            data: {'ven_id': ven_id},
                            success: function (data) {
                                $('select[name="receipt_no"]').empty();
                                var obj = JSON.parse(data);
                                $.each(obj, function (key, value) {
                                    $('select[name="receipt_no"]').append('<option value="' + key + '">' + value + '</option>');
                                });
                            }
                        });
                    } else {
                        $('#ous_amount').val("");
                        $('select[name="receipt_no"]').empty();
                    }
                });
                $('#paid_amount').on('input', function () {
                    var bill_amount = $(this).val();
                    if (bill_amount != "") {
                        var bal = bill_amount - $("#ous_amount").val();
                        $('#bal_amount').val(bal);
                    } else {
                        $('#bal_amount').val("-" + $("#ous_amount").val());
                    }
                });
            </script>
        </body>
    </html>
    <?php
    if (isset($_POST["submit"])) {
        $pay_id = validNumber(decrydata($_POST["receipt_no"]), "../");
        $p_a = floatval(mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM vendor_payment WHERE id=$pay_id"))["paid_amount"]);
        $paid_amount = $p_a + floatval($_POST["paid_amount"]);
        $ous_amount = floatval($_POST["ous_amount"]);
        $paid_date = date("Y-m-d");
        mysqli_query($con, "UPDATE vendor_payment SET paid_amount='$paid_amount' WHERE id=$pay_id");
        mysqli_query($con, "UPDATE vendor_payment SET paid_date='$paid_date' WHERE id=$pay_id");
        if ($paid_amount >= $ous_amount) {
            mysqli_query($con, "UPDATE vendor_payment SET status=2 WHERE id=$pay_id");
        }
        if ($_POST["check_no"] != null) {
            $check_no = trim($_POST["check_no"]);
            mysqli_query($con, "UPDATE vendor_payment SET check_no='$check_no' WHERE id=$pay_id");
        }
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