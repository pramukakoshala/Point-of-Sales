<?php
session_start();
include 'code.php';
$message = "";
if (count($_POST) > 0) {
    $result = mysqli_query($con, "SELECT * FROM users WHERE user_name='" . $_POST["user_name"] . "'");
    $row = mysqli_fetch_assoc($result);
    if ($row != null) {
        if (password_verify($_POST["password"], $row['password'])) {
            $this_date = date("Y-m-d h:i A");
            mysqli_query($con, "UPDATE users SET last_logined='$this_date' WHERE id=" . $row['id']);
            $_SESSION["id"] = $row['id'];
            $_SESSION["type"] = $row['type'];
            $_SESSION["name"] = $row['name'];
            $_SESSION["dep_id"] = $row['dep_id'];
            $_SESSION["tax_active"] = $row['tax_active'];
        } else {
            $message = "Invalid Password!";
        }
    } else {
        $message = "Invalid Username!";
    }
}
if (isset($_SESSION["id"]) && isset($_SESSION["type"])) {
    if ($_SESSION["type"] == 3) {
        header("Location:dashboard.php");
    } elseif ($_SESSION["type"] == 1) {
        if (!isset($_SESSION["from_index"])) {
            $_SESSION["from_index"] = 1;
        }
        header("Location:customer/cus_main.php");
    } else {
        header("Location:product/pro_main.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>JMK SUPER</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/fullcalendar.css" />
        <link rel="stylesheet" href="css/maruti-style.css" />
        <link rel="stylesheet" href="css/maruti-media.css" class="skin-color" />
    </head>
    <body>
        <div class="row-fluid">
            <div class="span3"></div>
            <div class="span6">
                <div id="content" style="padding: 2%;">
                    <div class="widget-box">
                        <div class="widget-title" >
                            <span class="icon">
                                <i class="icon-lock"></i>
                            </span>
                            <h5>-------------------------------------- <code>Familier POS</code> Please Login Your System --------------------------------------------</h5>
                            <h6 class="alert alert-danger" id="err_message" style="text-align: center;"><?php echo $message ?></h6>
                        </div>
                        <div class="widget-content" style=" margin-top: 2%; height: 150px;">
                            <form class="form-horizontal" method="post" name="basic_validate">
                                <div class="control-group">
                                    <div class="controls">
                                        <input type="text" name="user_name" id="user_name" placeholder="Enter Your Username" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <input type="password" name="password" id="password" placeholder="Enter Your Password" required/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <input type="submit" class="btn btn-success" style="width: 54%;"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="quick-actions_homepage">
                        <ul class="quick-actions">
                            <li> <a href="#"> <i class="icon-dashboard"></i> Billing Manage </a> </li>
                            <li> <a href="#"> <i class="icon-shopping-bag"></i> Stock Manage</a> </li>
                            <li> <a href="#"> <i class="icon-people"></i> Oustanding Mangae </a> </li>
                        </ul>
                    </div>
                    <div class="row-fluid">
                        <div id="footer" class="span12"> 2014 - <?php echo date("Y"); ?> &copy; Familier POS. Develop by <a href="https://tritcal.com">Tritcal International (Pvt) Ltd</a> </div>
                    </div>
                    <div class="progress progress-striped active" style="margin-top: 2%">
                        <div class="bar" style="width: 100%;"></div>
                    </div>
                </div>
            </div>
            <div class="span4"></div>
        </div>
        <script src="js/excanvas.min.js"></script> 
        <script src="js/jquery.min.js"></script> 
        <script src="js/jquery.ui.custom.js"></script> 
        <script src="js/bootstrap.min.js"></script> 
        <script src="js/jquery.flot.min.js"></script> 
        <script src="js/jquery.flot.resize.min.js"></script> 
        <script src="js/jquery.peity.min.js"></script> 
        <script src="js/fullcalendar.min.js"></script> 
        <script src="js/maruti.js"></script> 
        <script src="js/maruti.dashboard.js"></script> 
        <script src="js/maruti.chat.js"></script> 


        <script type="text/javascript">
            // This function is called from the pop-up menus to transfer to
            // a different page. Ignore if the value returned is a null string:
            function goPage(newURL) {

                // if url is empty, skip the menu dividers and reset the menu selection to default
                if (newURL != "") {

                    // if url is "-", it is this page -- reset the menu:
                    if (newURL == "-") {
                        resetMenu();
                    }
                    // else, send page to designated URL            
                    else {
                        document.location.href = newURL;
                    }
                }
            }

            // resets the menu selection upon entry to this page:
            function resetMenu() {
                document.gomenu.selector.selectedIndex = 2;
            }
        </script>
    </body>
</html>
