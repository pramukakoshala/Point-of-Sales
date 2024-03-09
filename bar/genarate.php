<?php
session_start();
include '../valid_fun.php';
if (isset($_SESSION["id"]) && isset($_SESSION["type"])) {
    include '../dbconnect.php';
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Details | Barcode Generator</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="../css/bootstrap.min.css" />
            <link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
            <link rel="stylesheet" href="../css/uniform.css" />
            <link rel="stylesheet" href="../css/select2.css" />
            <link rel="stylesheet" href="../css/maruti-style.css" />
            <link rel="stylesheet" href="../css/maruti-media.css" class="skin-color" />
        </head>
        <body style="background-color: #fff">
            <div class="container">
                <div class="inline span12">
                    <div class="span2"></div>
                    <div class="span10" style="margin-top: 5%">
                        <!--<h3 class="text-center">All Fields Required</h3>-->
                        <div style="">
                            <form class="form-horizontal" method="post" action="barcode.php" target="_blank">
                                <div class="control-group">
                                    <label class="control-label span2" for="product">Product:</label>
                                    <div class="controls">
                                        <select name="product" class="custom-select" style="width: 75%;">
                                            <option value="0">Select Product</option>
                                            <?php
                                            $query = "SELECT *  FROM `products`";
                                            $result = mysqli_query($con, $query);
                                            while ($row = mysqli_fetch_array($result)) {
                                                $barcode = trim($row["barcode"]);
                                                if ($barcode == null) {
                                                    ?>
                                                    <option value="<?php echo $row['product_name']; ?>"><?php echo $row['product_name']; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                        <!--<input autocomplete="OFF" type="text" maxlength="15" placeholder="Product Name" class="form-control" id="product" name="product" required>-->
                                    </div>
                                </div>
                                <div class="control-group" style="">
                                    <label class="control-label span6" for="product_id">Barcode ID:</label>
                                    <div class="controls">
                                        <input style="width:72.5%;" autocomplete="OFF" type="text" maxlength="10" placeholder="Product ID" class="form-control" id="product_id" name="product_id" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label span2" for="rate">Price:</label>
                                    <div class="controls">          
                                        <input style="width:72.5%;" autocomplete="OFF" type="text" placeholder="Product Price" class="form-control" id="rate"  name="rate" required readonly>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label span6" for="print_qty">Barcode Quantity:</label>
                                    <div class="controls">          
                                        <input style="width:72.5%;" autocomplete="OFF" type="text" placeholder="Barcode Quantity" class="form-control" id="print_qty"  name="print_qty" required>
                                    </div>
                                </div>

                                <div class="control-group">        
                                    <div class="col-sm-offset-2 controls">
                                        <button type="submit" name="submit" onclick="window.close('')" class="btn btn-primary">Submit</button>
                                        <a href="#" onclick="window.close('')" class="btn btn-danger" style="">Close</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--<h5 style="text-align: center"><?php echo date("Y") ?> &copy; All Rights Reserved By Tritcal International (PVT) Ltd</h5>-->
                    </div>
                </div>
            </div>
            <script src="../js/jquery.min.js"></script> 
            <script src="../js/jquery.ui.custom.js"></script> 
            <script src="../js/bootstrap.min.js"></script> 
            <script src="../js/jquery.uniform.js"></script> 
            <script src="../js/select2.min.js"></script> 
            <script src="../js/jquery.dataTables.min.js"></script> 
            <script src="../js/maruti.js"></script> 
            <script src="../js/maruti.tables.js"></script>
            <script>
                                                $("select[name='product']").change(function () {
                                                    var pro = $(this).val();
                                                    $.ajax({
                                                        url: "unit_price.php",
                                                        Type: "get",
                                                        data: {'p': pro},
                                                        success: function (data) {
                                                            var obj = JSON.parse(data);
                                                            $('#rate').val(obj["unit_price"]);
                                                        }
                                                    });
                                                });
            </script>
        </body>
    </html>
    <?php
} else {
    header("location:index.php");
}