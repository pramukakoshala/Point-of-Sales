<?php
session_start();
include '../valid_fun.php';
if (isset($_SESSION["type"]) && isset($_SESSION["id"])) {
    include '../dbconnect.php';
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Notifications</title>
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
                <div id="breadcrumb"> <a href="Dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom"><i class="icon-envelope"></i> Notification</a></div>
            </div>
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="widget-box">
                        <div class="widget-title">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#tab1">Unread Notification</a></li>
                                <li><a data-toggle="tab" href="#tab2">Read Notifications</a></li>
                                <li><a data-toggle="tab" href="#tab3">All Notification</a></li>
                            </ul>
                        </div>
                        <div class="widget-content tab-content">
                            <div id="tab1" class="tab-pane active">
                                <table class="notify_table table table-bordered data-table">
                                    <tbody>
                                        <?php
                                        $unread_query = "SELECT * FROM notify WHERE status=0 LIMIT 0,10";
                                        $unread_result = mysqli_query($con, $unread_query);
                                        while ($unread_row = mysqli_fetch_array($unread_result)) {
                                            $pro_id = $unread_row["pro_id"];
                                            $pro_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM products WHERE pro_id=$pro_id"));
                                            ?>
                                            <tr>
                                                <td class="taskDesc">
                                                    <i class="icon-info-sign"></i> <?php echo $pro_det["product_name"] . " " . $unread_row["text"]; ?>
                                                </td>
                                                <td class="taskStatus"><span class="in-progress">In Progress <i style="opacity: 0.5" class="icon-info-sign"></i></span></td>
                                                <td class="taskOptions"><a href="#" onclick="readNotify('<?php echo encrydata($unread_row["no_id"]) ?>')" class="tip-top" data-original-title="Mark As Read"><i class="icon-ok"></i></a> <a href="#" onclick="deleteNotify('<?php echo encrydata($unread_row["no_id"]) ?>')" class="tip-top" data-original-title="Delete"><i class="icon-remove"></i></a></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div id="tab2" class="tab-pane">
                                <table class="notify_table table table-striped table-bordered">
                                    <tbody>
                                        <?php
                                        $read_query = "SELECT * FROM notify WHERE status=1 LIMIT 0,10";
                                        $read_result = mysqli_query($con, $read_query);
                                        while ($read_row = mysqli_fetch_array($read_result)) {
                                            $pro_id = $read_row["pro_id"];
                                            $pro_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM products WHERE pro_id=$pro_id"));
                                            ?>
                                            <tr>
                                                <td class="taskDesc">
                                                    <i class="icon-plus-sign"></i> <?php echo $pro_det["product_name"] . " " . $read_row["text"]; ?>
                                                </td>
                                                <td class="taskStatus"><span class="done">Done <i style="opacity: 0.5" class="icon-check"></i></span></td>
                                                <td class="taskOptions"><a href="#" onclick="deleteNotify('<?php echo encrydata($read_row["no_id"]) ?>')" class="tip-top" data-original-title="Delete"><i class="icon-remove"></i></a></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div id="tab3" class="tab-pane">
                                <table class="notify_table table table-striped table-bordered">
                                    <tbody>
                                        <?php
                                        $all_query = "SELECT * FROM notify LIMIT 0,10";
                                        $all_result = mysqli_query($con, $all_query);
                                        while ($all_row = mysqli_fetch_array($all_result)) {
                                            $pro_id = $all_row["pro_id"];
                                            $pro_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM products WHERE pro_id=$pro_id"));
                                            if ($all_row["status"] == 1) {
                                                ?>
                                                <tr>
                                                    <td class="taskDesc">
                                                        <i class="icon-plus-sign"></i> <?php echo $pro_det["product_name"] . " " . $all_row["text"]; ?>
                                                    </td>
                                                    <td class="taskStatus"><span class="done">Done <i style="opacity: 0.5" class="icon-check"></i></span></td>
                                                    <td class="taskOptions"><a href="#" onclick="deleteNotify('<?php echo encrydata($all_row["no_id"]) ?>')" class="tip-top" data-original-title="Delete"><i class="icon-remove"></i></a></td>
                                                </tr>
                                                <?php
                                            } else {
                                                ?>
                                                <tr>
                                                    <td class="taskDesc">
                                                        <i class="icon-info-sign"></i> <?php echo $pro_det["product_name"] . " " . $all_row["text"]; ?>
                                                    </td>
                                                    <td class="taskStatus"><span class="in-progress">In Progress  <i style="opacity: 0.5" class="icon-info-sign"></i></span></td>
                                                    <td class="taskOptions"><a href="#" onclick="readNotify('<?php echo encrydata($all_row["no_id"]) ?>')" class="tip-top" data-original-title="Mark As Read"><i class="icon-ok"></i></a> <a href="#" onclick="deleteNotify('<?php echo encrydata($all_row["no_id"]) ?>')" class="tip-top" data-original-title="Delete"><i class="icon-remove"></i></a></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
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
        <script src="../js/select2.min.js"></script> 
        <script src="../js/jquery.dataTables.min.js"></script> 
        <script src="../js/maruti.js"></script> 
        <script src="../js/maruti.tables.js"></script>
        <script>
                                                function deleteNotify(no_id) {
                                                    $.ajax({
                                                        url: "del_not.php",
                                                        Type: "GET",
                                                        data: {'no': no_id},
                                                        success: function () {
                                                            $("body").load("alerts.php").fadeIn("slow");
                                                        }
                                                    });
                                                }
                                                function readNotify(no_id) {
                                                    $.ajax({
                                                        url: "red_not.php",
                                                        Type: "GET",
                                                        data: {'no': no_id},
                                                        success: function () {
                                                            $("body").load("alerts.php").fadeIn("slow");
                                                        }
                                                    });
                                                }
        </script>
    </body>
    </html>
    <?php
} else {
    header("location:../");
}