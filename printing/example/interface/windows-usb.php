<?php

date_default_timezone_set("Asia/Colombo");

/* Change to the correct path if you copy this example! */
require __DIR__ . '/../../autoload.php';

use Mike42\Escpos\EscposImage;
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

session_start();
include '../../../valid_fun.php';
$ous = 0;
$t = 1;

//10 35
function agestSumm($name, $amount, $add_one_space = false, $Titlelen = 14, $Totallen = 37) {
    $nameLen = strlen(trim($name));
    $gap1 = $Titlelen - $nameLen;
    $amLen = strlen(trim(strval($amount)));
    $gap1_space = "";
    while ($gap1 > 0) {
        $gap1_space .= " ";
        $gap1--;
    }
    if ($add_one_space != false) {
        $gap1_space .= " ";
    }
    $new_txt = trim($name) . $gap1_space . " :";
    $nex_txt_len = strlen($new_txt);
    $gap2 = $Totallen - ($nex_txt_len + $amLen);
    $gap2_space = "";
    while ($gap2 > 0) {
        $gap2_space .= " ";
        $gap2--;
    }
    $new_txt = $new_txt . $gap2_space . trim(strval($amount));
    return $new_txt;
}

if (isset($_GET["invoice"])) {
    include '../../../dbconnect.php';

    $chars_per_line = 48;
    $symbol_line = "";
    $symbol = "-";
    while ($chars_per_line > 0) {
        $symbol_line .= $symbol;
        $chars_per_line--;
    }
    $symbol_line .= "\n";

    $table = "`transaction`";
    if (isset($_GET["sec"]) && ($_SESSION["tax_active"] == 1)) {
        $table = "`temp_transaction`";
    }

    $invoice = $_GET["invoice"];
    $trans = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM $table WHERE invoice='$invoice'"));
    $res_id = $trans['t_id'];
    $c_id = $trans['c_id'];
    $res_date = $trans['transaction_date'];
    $ous_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT SUM(paid_amount),SUM(total) FROM transaction WHERE c_id=$c_id AND invoice!='$invoice'"));
    $ous = $ous_det['SUM(total)'] - $ous_det['SUM(paid_amount)'];

    if ($_SESSION["tax_active"] == 1) {
        $temp_trans_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT c_id,SUM(total),SUM(paid_amount),SUM(balance) FROM temp_transaction WHERE c_id=$c_id"));
//        $sum_tot += floatval($temp_trans_det['SUM(total)']);
//        $sum_pay += floatval($temp_trans_det['SUM(paid_amount)']);
        $ous += (floatval($temp_trans_det['SUM(total)']) - floatval($temp_trans_det['SUM(paid_amount)']));
    }


//BILL HEAD SECTION-----------------------------------

    $head_title = " JMK SUPER\n\n";
    $sub_head = "\n";
    $address = "No.145/2, Victoria view, Anuragama,\n";
    $phone = "Kapuliyaddha. TEL. 0776984853 | 0812071236\n";
    $recript = "Receipt #" . $res_id . " | Date: " . $res_date;

    $head = $address . $phone . $recript . "\n\n";

//BILL BODY SECTION-----------------------------------
    $item_title = "   Items";
    $qty = "Qty";
    $amount = " Amount";

    $item_len = strlen($item_title);
    $item_space = $qty_apace = "";
    while ($item_len < 31) {
        $item_space .= " ";
        $item_len++;
    }
    $qty_len = strlen($qty);
    while ($qty_len < 10) {
        $qty_apace .= " ";
        $qty_len++;
    }
    $item_title .= $item_space;
    $qty .= $qty_apace;

    $item_row = $item_title . $qty . $amount . "\n" . $symbol_line;


    $total_sales = mysqli_fetch_row(mysqli_query($con, "SELECT MAX(sales_id) FROM sales_order"))[0];
    while ($total_sales > 0) {
        $row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM sales_order WHERE sales_id=$total_sales"));
        if ($row != null) {
            $tb_invo = $row["invoice"];
            if ($tb_invo == $invoice) {
                $tem_pn = "";
                $pro_id = $row["pro_id"];
                $pro_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM products WHERE pro_id=$pro_id"));
                $pro_name = $t . ". " . trim($pro_det['product_name']) . " ( " . round(floatval($pro_det['unit_price']), 2) . " X " . trim($row["quantity"]) . " )";
                $qty = trim($row["quantity"]);
                $amount = $row["total"];
                $rec_date = $row["date"];
                $len = strlen($pro_name);
                $len2 = strlen($qty);
                $am_len = strlen(strval(trim($amount)));
                $am_space = "";
                $more_addon = 6 - $am_len;
                while ($more_addon > 0) {
                    $am_space .= " ";
                    $more_addon--;
                }
                $amount = $am_space . $amount;
                if ($len2 < 8) {
                    $space2 = "";
                    $a = 8 - $len2;
                    while ($a > 0) {
                        $space2 .= " ";
                        $a--;
                    }
                    $qty .= $space2;
                } else {
                    $qty .= "  ";
                }
                if ($len > 29) {
                    $i = 0;
                    $loop = 58;
                    while ($i < $len) {
                        if ($i <= $loop) {
                            $tem_pn .= $pro_name[$i];
                            if ($i == 29) {
                                $tem_pn .= " " . $qty . dotInput($amount) . "\n   ";
                                $loop = 58;
                            }
                        }
                        if ($i == 58) {
                            $tem_pn .= "..";
                        }
                        $i++;
                    }
                    $item_row .= $tem_pn . "\n";
                } elseif ($len == 29) {
                    $item_row .= $pro_name . "  " . $qty . dotInput($amount) . "\n";
                } else {
                    $space = "";
                    $a = 31 - $len;
                    while ($a > 0) {
                        $space .= " ";
                        $a--;
                    }
                    $item_row .= $pro_name . $space . $qty . dotInput($amount) . "\n";
                }
                $item_row .= $symbol_line;
                $t++;
            }
        }
        $total_sales--;
    }
    if ($trans['paid_amount'] == "") {
        $pa = '0.00';
    } else {
        $pa = $trans['paid_amount'] . ".00";
    }

    $sub_total = agestSumm("Sub Total", dotInput(round(floatval($trans['sub_total'])))) . "\n";
    $discount = agestSumm("Discount", dotInput(round(floatval($trans['discount'])))) . "\n";
    $total = agestSumm("Total", dotInput(round(floatval($trans['total'])))) . "\n";
    $total2 = agestSumm("Bill Amount", number_format(floatval($trans['total']) + $ous, 2, ".", ",")) . "\n";
    $paid = agestSumm("Paid", dotInput(round(floatval($pa)))) . "\n";
    $balance = agestSumm("Balance ", dotInput(round(floatval($trans['balance'])))) . "\n";
    $oustanding = agestSumm("Outstanding", dotInput(round($ous, 2))) . "\n";

    $summary = "\n" . $sub_total . $discount . $paid . $balance . "\n";

//BILL FOOTER SECTION---------------------------------
    // $tq = "\nThank you for your business!\n";
    $copyright = "Software By Tritcal International Inc. \n Kandy | 0812 050 437 | 0777 959 789\n\n";
    try {
        // Enter the share name for your USB printer here
//    $connector = POS-58-Series;
        $connector = new WindowsPrintConnector("EPSON-TM-T81");

        /* Print a "Hello world" receipt" */
        $printer = new Printer($connector);
        $center = Printer::JUSTIFY_CENTER;
        $left = Printer::JUSTIFY_LEFT;
        $right = Printer::JUSTIFY_RIGHT;
        $tux = EscposImage::load("logo.png", false);

        if (!isset($_GET['sec'])) {

            $printer->setJustification($center);
            $printer->bitImage($tux);
            #$printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
            #$printer->setTextSize(2, 2);
            #$printer->text($head_title);
            $printer->selectPrintMode(Printer::MODE_FONT_A);
            $printer->setTextSize(1, 1);
            $printer->text($head);
            $printer->setJustification($left);
            $printer->text($item_row);
            $printer->setJustification($center);
            $printer->text($summary);
            $printer->setJustification($center);
            $printer->text($symbol_line);
            //$printer->setTextSize(2, 2);
            $printer->selectPrintMode(Printer::MODE_DOUBLE_HEIGHT);
            $printer->text("Total (Rs.) :   " . number_format(floatval($trans['total']) + $ous, 2, ".", ",") . "\n");
            $printer->selectPrintMode(Printer::MODE_FONT_A);
            $printer->setTextSize(1, 1);
            $printer->text($symbol_line);
            $printer->text("Thank you for your business! Come Again! \n Returns not accepted\n");
            $printer->text($symbol_line);
            $printer->text($copyright);
//            $printer->text($symbol_line . "\n\n");
//            $printer->setTextSize(2, 3);
//            $printer->selectPrintMode(Printer::MODE_DOUBLE_HEIGHT);
//            $printer->text($head_title);
//            $printer->selectPrintMode(Printer::MODE_FONT_B);
//            if ($ous > 0) {
//                $printer->setTextSize(1, 1);
//                $printer->text($head);
//                $printer->text("\n");
//                $printer->text($total2);
//                $printer->text($oustanding . "\n\n");
//                $printer->text($symbol_line);
//                $printer->text('Signature');
//            }
        } else {

            $summary = "\n" . $sub_total . $discount . $paid . $balance . "\n";

            $printer->setJustification($center);
            $printer->setTextSize(2, 3);
//            $printer->text($head_title);
            $printer->setTextSize(1, 1);
            $printer->text("Receipt No:" . $res_id . "\n");
            $printer->setJustification($left);
            $printer->text($item_row);
            $printer->setJustification($center);
            $printer->text($summary);
            $printer->setJustification($center);
            $printer->text($symbol_line);
            $printer->setTextSize(2, 2);
            $printer->text("Total (Rs.) :   " . number_format(floatval($trans['total']) + $ous, 2, ".", ",") . "\n");
            $printer->setTextSize(1, 1);
            $printer->text($symbol_line);
            $printer->text("Thank you for your business! Come Again!");
            $printer->text($symbol_line);
        }

        $printer->feed(5);
        $printer->cut();
        $printer->pulse();
        $printer->close();
    } catch (Exception $e) {
        echo "Couldn't print to this printer: " . $e->getMessage() . "\n";
    }
    if (($_GET["type"] == 1)) {
        ?>
        <script>
            window.location.href = "../../../billing.php";
        </script>
        <?php

    } else if ($_GET["type"] == 2) {
        ?>
        <script>
            window.location.href = "../../../kpi_reports/transaction_report.php";
        </script>
        <?php

    }
}