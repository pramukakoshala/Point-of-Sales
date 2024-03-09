<?php
session_start();
include '../valid_fun.php';
if (isset($_SESSION["type"]) && isset($_SESSION["id"]) && isset($_GET["i"])) {
    $invoice = ($_GET["i"]);
    include '../dbconnect.php';
    $trans_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM transaction WHERE invoice='$invoice'"));
    if ($trans_det != null) {
        $c_id = $trans_det["c_id"];
        $cus_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM customer WHERE c_id=$c_id"));
        ?>
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <title>Invoice | <?php echo $invoice ?></title>
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
                <div id="content">
                    <div class="container-fluid">
                        <div class="row-fluid">
                            <div class="widget-box">
                                <div class="widget-title">
                                    <span class="icon"><i class="icon-th"></i></span> 
                                    <h5>Customer - <?php echo ucwords($cus_det["customer_name"]) ?> | Invoice - <?php echo $invoice; ?> | Date & Time - <?php echo $trans_det["transaction_date"]; ?></h5>
                                </div>
                                <div class="widget-content nopadding">
                                    <table class="table table-bordered data-table">
                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th>Unit Price (LKR)</th>
                                                <th>Total (LKR)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = "SELECT * FROM sales_order WHERE invoice='$invoice'";
                                            $result = mysqli_query($con, $query);
                                            while ($row = mysqli_fetch_array($result)) {
                                                $pro_id = $row["pro_id"];
                                                $pro_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM products WHERE pro_id=$pro_id"));
                                                ?>
                                                <tr class="gradeU">
                                                    <td><?php echo ucwords($pro_det["product_name"]) ?></td>
                                                    <td><?php echo dotInput(round($row["quantity"], 3)) ?></td>
                                                    <td><?php echo dotInput(round($row["unit_price"], 2)) ?></td>
                                                    <td><?php echo dotInput(round($row["total"], 2)) ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th>Unit Price (LKR)</th>
                                                <th>Total (LKR)</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
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
        <!--<script src="../js/select2.min.js"></script>--> 
        <script src="../js/jquery.dataTables.min.js"></script> 
        <script src="../js/maruti.js"></script> 
        <script src="../js/maruti.tables.js"></script>
        </body>
        </html>
        <?php
    } else {
        header("location:../");
    }
} else {
    header("location:../");
}  