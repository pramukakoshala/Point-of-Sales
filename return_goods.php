<?php
session_start();
include 'valid_fun.php';
if (isset($_SESSION["type"]) && isset($_SESSION["id"]) && isset($_GET["p"])) {
    include 'dbconnect.php';
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Make Return</title>
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
            <div id="content">
                <div class="container-fluid">
                    <form method="post" class="form-horizontal">
                        <input type="hidden" id="secret" name='secret' value="0" readonly />
                        <div class="row-fluid">
                            <div class="span4"></div>
                            <div class="span3">
                                <div class="control-group">
                                    <label class="control-label">Receipt No</label>
                                    <div class="controls">
                                        <input type="number" name="t_id" Placeholder="Receipt No" style="width: 100%;" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="span3"></div>
                        </div>
                        <div class="row-fluid">
                            <div class="span2"></div>
                            <div class="span4">
                                <div class="form-actions">
                                    <input type="submit" name="submit" class="btn btn-success"  value="Find Goods" style="width: 100%; margin-left: -4.5%;">
                                </div>
                            </div>
                            <div class="span4">
                                <div class="form-actions">
                                    <a href="billing.php?invoice=<?php echo $_GET["p"] ?>" class="btn btn-default" style="width: 100%;">Back</a>
                                </div>
                            </div>
                        </div>
                        <p id="error" style="text-align: center;display: none">No Transaction Found!</p>
                    </form>
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
            <script src="js/billings_fun.js"></script>
        </body>
    </html>
    <?php
    if (isset($_POST["submit"])) {
        $secret = intval($_POST['secret']);
        $table = "`transaction`";
        if ($secret == 1) {
            $table = "`temp_transaction`";
        }
        $t_id = validNumber($_POST["t_id"], "billing.php");
        $trans_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM " . $table . " WHERE t_id=$t_id"));
        if ($trans_det != null) {
            $invoice = ($trans_det["invoice"]);
            ?>
            <script>
                window.location.href = "billing.php?ret_g=1&invoice=<?php echo $invoice ?>&sec=<?= $secret ?>";
            </script>
            <?php
        } else {
            ?>
            <script>
                document.getElementById("error").style.display = "block";
            </script>
            <?php
        }
    }
}    