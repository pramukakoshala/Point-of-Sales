<?php
session_start();
include '../valid_fun.php';
if (isset($_SESSION["type"]) && isset($_SESSION["id"]) && isset($_GET['i']) && $_GET['i'] != null) {
    include '../dbconnect.php';
    $jobId = validNumber(decrydata($_GET['i']), "../");
    ?>
    <html>
        <head>
            <title>Bill Preview | Receipt No: <?php echo $jobId ?></title>
            <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
            <link rel="stylesheet" href="css/3.4.0/bootstrap.min.css">
            <style>
                body {
                    background: #666;
                }
                #invoice-POS{
                    box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
                    padding:3mm;
                    margin: 0 auto;
                    width: 90mm;
                    background: #FFF;


                    ::selection {background: #f31544; color: #FFF;}
                    ::moz-selection {background: #f31544; color: #FFF;}
                    h1{
                        font-size: 1.5em;
                        color: #222;
                    }
                    h2{
                        font-size: .9em;
                        margin: 0;
                    }
                    h3{
                        font-size: 1.2em;
                        font-weight: 300;
                        line-height: 2em;
                    }
                    p{
                        font-size: .7em;
                        color: #666;
                        line-height: 1.2em;
                    }

                    /*                #top, #mid,#bot{  Targets all id with 'col-' 
                                        border-bottom: 1px solid #EEE;
                                    }
                    
                                    #top{min-height: 100px;}
                                    #mid{min-height: 80px;} 
                                    #bot{ min-height: 50px;}
                    
                                    #top .logo{
                                        float: left;
                                        height: 60px;
                                        width: 60px;
                                        background: url(http://michaeltruong.ca/images/logo1.png) no-repeat;
                                        background-size: 60px 60px;
                                    }*/
                    .clientlogo{
                        float: left;
                        height: 60px;
                        width: 60px;
                        background-size: 60px 60px;
                        border-radius: 50px;
                    }
                    /*                .info{
                                        display: block;
                                        float:left;
                                        margin-left: 0;
                                    }*/
                    .title{
                        float: right;
                    }
                    .title p{
                        text-align: right;
                    } 
                    table{
                        width: 100%;
                        border-collapse: collapse;
                    }
                    td{
                        padding: 5px 0 5px 15px;
                        border: 1px solid #EEE;
                    }
                    .tabletitle{
                        padding: 0px;
                        font-size: .5em;
                        background: #EEE;
                    }
                    .service{
                        border-bottom: 1px solid #EEE;
                    }
                    .item{
                        width: 50mm;
                    }
                    .itemtext{
                        font-size: .5em;
                    }


                }
            </style>
        </head>
        <body>
            <div id="invoice-POS">
                <?php
                if (isset($_GET['i'])) {
                    $query = "SELECT *  FROM `transaction` WHERE t_id=$jobId";
                    $result = mysqli_query($con, $query);
                    while ($row1 = mysqli_fetch_array($result)) {
                        $c_id = $row1['c_id'];
                        $sql1 = "SELECT c_id, SUM(balance)FROM transaction WHERE c_id=$c_id";
                        $result2 = mysqli_query($con, $sql1);
                        while ($row = mysqli_fetch_assoc($result2)) {
                            ?>
                            <center id="top" style=" margin-bottom: 0px;">
                                <h2>JMK SUPER</h2>
                            </center>

                            <div id="mid">
                                <div class="info">
                                    <p style="font-size: 14px;; text-align: center;"> 
                                        No. XXX, XXXXXXXXXX, XXXXXXXX,XXXXXX.</br>
                                        0XX-XXX-XXX</br>
                                        Receipt #<?php echo $row1['t_id']; ?> | Date: <?php echo $row1['transaction_date']; ?> | Customer #<?php echo $row1['c_id']; ?>
                                    </p>
                                </div>
                            </div><!--End Invoice Mid-->

                            <div id="bot">
                                <div id="table">
                                    <table>
                                        <tr class="tabletitle">
                                            <td class="item"  style="width: 70mm;"><h5><strong>Items</strong></h5></td>
                                            <td class="Hours" style="width: 10mm; text-align: left;"><h5><strong>Qty</strong></h5></td>
                                            <td class="Rate"><h5><strong>Amount(Rs.)</strong></h5></td>
                                        </tr>
                                        <?php
                                        $in_id = $row1['invoice'];
                                        $sql2 = "SELECT * FROM sales_order WHERE invoice=$in_id";
                                        $result1 = mysqli_query($con, $sql2);
                                        while ($row2 = mysqli_fetch_array($result1)) {
                                            $pro_id = $row2['pro_id'];
                                            $sql4 = "SELECT * FROM products WHERE pro_id=$pro_id";
                                            $result4 = mysqli_query($con, $sql4);
                                            while ($row4 = mysqli_fetch_array($result4)) {
                                                $cat_id = $row4['category_id'];
                                                $sql3 = "SELECT * FROM category WHERE category_id=$cat_id";
                                                $result3 = mysqli_query($con, $sql3);
                                                while ($row3 = mysqli_fetch_assoc($result3)) {
                                                    ?>
                                                    <tr class="service">
                                                        <td class="tableitem"><p class="itemtext" style="font-size: 0.9em;padding-top: 8px"><?php echo $row4['product_name']; ?> ( <?php echo $row2['unit_price']; ?> X <?php echo $row2['quantity']; ?> )</p></td>
                                                        <td class="tableitem"><p class="itemtext" style="font-size: 0.9em; text-align: left;"><?php echo dotInput($row2['quantity']); ?>
                                                                <?php
                                                                $Pending = $row3['unit'];
                                                                if ($Pending == 1) {
                                                                    echo '';
                                                                } else if ($Pending == 2) {
                                                                    echo 'Kg';
                                                                } else if ($Pending == 3) {
                                                                    echo 'L';
                                                                }
                                                                ?>
                                                            </p></td>
                                                        <td class="tableitem"><p class="itemtext" style="font-size: 0.9em; text-align: right;"><?php echo dotInput($row2['total']); ?></p></td>

                                                    </tr>
                                                    <?php
                                                }
                                            }
                                        }
                                        ?>
                                        <tr class="tabletitle">
                                            <td></td>
                                            <td style="font-size: 13px;"><strong></strong></td>
                                            <td style="text-align: right; font-size: 13px;"><strong></strong></td>
                                        </tr>
                                        <tr class="tabletitle">
                                            <td></td>
                                            <td style="font-size: 13px; width: 20%;"><strong>Sub Total</strong></td>
                                            <td style="text-align: right; font-size: 13px;"><strong><?php echo dotInput($row1['sub_total']); ?></strong></td>
                                        </tr>
                                        <tr class="tabletitle">
                                            <td></td>
                                            <td style="font-size: 13px;"><strong>Discount</strong></td>
                                            <td style="text-align: right; font-size: 13px;"><strong><?php echo dotInput($row1['discount']); ?></strong></td>
                                        </tr>
                                        <tr class="tabletitle">
                                            <td></td>
                                            <td style="font-size: 13px;"><strong>Total</strong></h5></td>
                                            <td style="text-align: right; font-size: 13px;"><strong><?php echo dotInput($row1['total']); ?></strong></td>
                                        </tr>
                                        <hr>
                                        <tr class="tabletitle">
                                            <td></td>
                                            <td style="font-size: 13px;"><strong>Paid</strong></td>
                                            <td style="text-align: right; font-size: 13px;"><strong><?php echo dotInput($row1['paid_amount']); ?></strong></td>
                                        </tr>
                                        <tr class="tabletitle">
                                            <td></td>
                                            <td style="font-size: 13px;"><strong>Balance</strong></td>
                                            <td style="text-align: right; font-size: 13px;"><strong><?php echo dotInput($row1['balance']); ?></strong></td>
                                        </tr>
                                        <tr class="tabletitle">
                                            <td></td>
                                            <td class="Rate"><h5><strong>Oustanding</strong></h5></td>
                                            <td class="payment" style="text-align: right;"><h5><?php echo dotInput($row['SUM(balance)']); ?></h5></td>
                                        </tr>
                                    </table>
                                </div>

                                <div id="legalcopy">
                                    <p class="legal" style="text-align: center;"><strong>Thank you for your business! Come Again!</strong> 
                                    </p>
                                    <hr>
                                    <p style="text-align: center; font-size: 11px;">Software by <strong>Tritcal International (Pvt) Ltd.</strong><br> Nugawela | www.tritcal.com | 081 20 50 437 | 0777 959 789</p>
                                </div>

                            </div><!--End InvoiceBot-->
                        </div><!--End Invoice-->
                    </body>
                </html>
                <?php
            }
        }
    } else {
        header("location:../");
    }
} else {
    header("location:../");
}
?>