<?php

date_default_timezone_set("Asia/Colombo");

/* Change to the correct path if you copy this example! */
require __DIR__ . '/../../autoload.php';

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

if (isset($_GET["pay"])) {
    include '../../../dbconnect.php';

    $pay = decrydata($_GET["pay"]);

    $trans = mysqli_fetch_assoc(mysqli_query($con, "SELECT  * FROM `transaction` WHERE `t_id`=\"$pay\""));
    if ($trans != null) {

        $res_id = $trans['t_id'];
        $c_id = $trans['c_id'];
        $res_date = $trans['transaction_date'];
        $ous_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT SUM(paid_amount),SUM(total) FROM transaction WHERE c_id=$c_id AND `t_id` != \"$pay\""));
        $ous = $ous_det['SUM(total)'] - $ous_det['SUM(paid_amount)'];

        $chars_per_line = 40;
        $symbol_line = "";
        $symbol = "-";
        while ($chars_per_line > 0) {
            $symbol_line .= $symbol;
            $chars_per_line--;
        }
        $symbol_line .= "\n";

//BILL HEAD SECTION-----------------------------------

        $head_title = " WELAGEDARA TRADING COMPANY\n(PVT) LTD Alawathugoda\n";
        $sub_head = "General Hardware Merchants\n";
        $address = "No.524, Matale Road, Alawathugoda.\n";
        $phone = "TEL. 0662244749 | 0768547821\n";

        $head = $sub_head . $address . $phone . "\n\n";

        $oustanding = agestSumm("Outstanding", dotInput(round($ous, 2))) . "\n";
        $paid_amount = agestSumm("Paid Amount", dotInput(round(floatval($trans['total'])))) . "\n";
        $balance = agestSumm("Balance ", dotInput(round((floatval($ous) - floatval($trans['total'])), 2))) . "\n";

        $summary = "\n" . $oustanding . $paid_amount . $balance . "\n";

//BILL FOOTER SECTION---------------------------------
        // $tq = "\nThank you for your business!\n";
        $copyright = "Software By Tritcal International Inc. \n Kandy | 0812 050 437 | 0777 959 789\n\n\n";
        try {
            // Enter the share name for your USB printer here
//    $connector = POS-58-Series;
            $connector = new WindowsPrintConnector("EPSON-U220");

            /* Print a "Hello world" receipt" */
            $printer = new Printer($connector);
            $center = Printer::JUSTIFY_CENTER;
            $left = Printer::JUSTIFY_LEFT;
            $right = Printer::JUSTIFY_RIGHT;

            $printer->setJustification($center);
            //$printer->setTextSize(2, 3);
            $printer->selectPrintMode(Printer::MODE_DOUBLE_HEIGHT);
            $printer->text($head_title);
            $printer->selectPrintMode(Printer::MODE_FONT_B);
            $printer->setTextSize(1, 1);
            $printer->text($head);
            $printer->text($summary);
            $printer->text($symbol_line);
            $printer->text("Thank you for your business! Come Again! \n Returns accepted within 14 days \nof purchase.\n");
            $printer->text($symbol_line);
            $printer->text($copyright);
            $printer->text("\n");
            $printer->feed();
            $printer->cut();
            $printer->close();
        } catch (Exception $e) {
            echo "Couldn't print to this printer: " . $e->getMessage() . "\n";
        }
        ?>
        <script>
            window.close("");
        </script>
        <?php

    }
}