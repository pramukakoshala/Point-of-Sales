<?php
session_start();
include 'valid_fun.php';
include 'dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Maruti Admin</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/fullcalendar.css" />
        <link rel="stylesheet" href="css/maruti-style.css" />
        <link rel="stylesheet" href="css/datepicker.css" />
        <link rel="stylesheet" href="css/select2.css" />
        <link rel="stylesheet" href="css/maruti-media.css" class="skin-color" />
        <link rel="stylesheet" href="css/colorpicker.css" />
        <link rel="stylesheet" href="css/uniform.css" />
        <link rel="stylesheet" href="css/maruti-style.css" />
    </head>
    <body>
        <!--<div id="content">-->
        <div class="container-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <form method="post" class="form-horizontal">
                        <div class="widget-box">
                            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                                <h5>Promotions</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <div class="control-group">
                                    <label class="control-label">Vocher Amount :</label>
                                    <div class="controls">
                                        <input type="number" class="span11" name="amount" placeholder="Amount" style="width: 80%;"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Valid From :</label>
                                    <div class="controls">
                                        <input type="date" class="span11" name="from_date" style="width: 80%;"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Valid To :</label>
                                    <div class="controls">
                                        <input type="date" class="span11" name="to_date" style="width: 80%;"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Total Vochers :</label>
                                    <div class="controls">
                                        <input type="number" class="span11" name="tot_voch" placeholder="Total Vochers" style="width: 80%;"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Vocher Code :</label>
                                    <div class="controls">
                                        <input type="text" name="code" class="span11" placeholder="Vocher Code" style="width: 80%;"/>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" name="submit" class="btn btn-success" style="width: 65%">Make Promotion</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="js/excanvas.min.js"></script> 
        <script src="js/jquery.min.js"></script> 
        <script src="js/jquery.ui.custom.js"></script>
        <script src="js/jquery.ui.custom.js"></script> 
        <script src="js/bootstrap.min.js"></script> 
        <script src="js/bootstrap-datepicker.js"></script> 
        <script src="js/jquery.flot.min.js"></script> 
        <script src="js/jquery.flot.resize.min.js"></script> 
        <script src="js/jquery.peity.min.js"></script> 
        <script src="js/fullcalendar.min.js"></script> 
        <script src="js/maruti.js"></script> 
        <script src="js/maruti.dashboard.js"></script> 
        <script src="js/maruti.chat.js"></script>
        <script src="js/bootstrap-colorpicker.js"></script> 
        <script src="js/jquery.uniform.js"></script> 
        <script src="js/select2.min.js"></script> 
        <script src="js/maruti.form_common.js"></script>
    </body>
</html>
<?php
if (isset($_POST["submit"])) {
    $amount = $_POST['amount'];
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];
    $tot_voch = $_POST['tot_voch'];
    $code = $_POST['code'];
    mysqli_query($con, "INSERT INTO `promotions`(`code`,`v_count`,`value`,`valid_from`,`valid_to`,`o_count`) VALUES(\"$code\",\"$tot_voch\",\"$amount\",\"$from_date\",\"$to_date\",\"$tot_voch\")");
    ?>
    <script>
        window.close("");
    </script>
    <?php
}
