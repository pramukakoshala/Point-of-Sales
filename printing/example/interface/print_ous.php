<?php

/* Change to the correct path if you copy this example! */
require __DIR__ . '/../../autoload.php';

use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

session_start();
if (isset($_GET["c_id"])) {

    include '../../../dbconnect.php';
    $c_id = $_GET["c_id"];
    $cus_name = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM customer WHERE c_id=$c_id"))["customer_name"];
    $res_date = date('Y-m-d H:i:s');
    $detils = mysqli_fetch_assoc(mysqli_query($con, "SELECT SUM(total),SUM(paid_amount),SUM(balance) FROM transaction WHERE c_id=$c_id"));
    
    $sum_tot = floatval($detils['SUM(total)']);
    $sum_pay = floatval($detils['SUM(paid_amount)']);
    $sum_bal = $sum_tot - $sum_pay;
    if ($_SESSION["tax_active"] == 1) {
        $temp_trans_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT c_id,SUM(total),SUM(paid_amount),SUM(balance) FROM temp_transaction WHERE c_id=$c_id"));
        $sum_tot += floatval($temp_trans_det['SUM(total)']);
        $sum_pay += floatval($temp_trans_det['SUM(paid_amount)']);
        $sum_bal += (floatval($temp_trans_det['SUM(total)']) - floatval($temp_trans_det['SUM(paid_amount)']));
    }
//BILL HEAD SECTION-----------------------------------

    $head_title = " WELAGEDARA TRADING COMPANY\n(PVT) LTD Alawathugoda\n";
    $sub_head = "General Hardware Merchants\n";
    $address = "No.524, Matale Road, Alawathugoda.\n";
    $phone = "TEL. 0662244749 | 0768547821\n";
    $recript = "Customer #" . $c_id . " | Date: " . $res_date;

    $head = $sub_head . $address . $phone . $recript . "\n\n";

//BILL BODY SECTION-----------------------------------

    $title = "Name: " . $cus_name . "\n\n";

    //58MM - 32 CHARS(In One Line)
    function agestSpace($title, $data, $maxChars) {
        //SET DEFAULT $maxChars--------------------
//        if (!isset($maxChars)) {
//            $maxChars = 32;
//        }
//        //HANDLING DATA TYPES ERRORS OF $data & $maxChars
//        if (getType($maxChars) == "string") {
//            $maxChars = intval($maxChars);
//        }
//        if (getType($data) == "integer") {
//            $data = strval($data);
//        }

        $space = "";
        //$title & $data Must Be Strings
        $tit_len = strlen(trim($title));
        $data_len = strlen(trim($data));
        $tot_space = $maxChars - ($tit_len + $data_len);
        while ($tot_space > 0) {
            $space .= " ";
            $tot_space--;
        }
        $title .= $space;
        $title .= $data;
        return $title;
    }

    $sub_total = agestSpace("Purchase Item Price: ", $sum_tot, 31) . "\n";
    $total = agestSpace("Paid Amount: ", $sum_pay, 31) . "\n";
    $oustanding = agestSpace("Oustanding Amount: ", $sum_bal, 31);

    $summary = $sub_total . $total . $oustanding . "\n\n";

//BILL FOOTER SECTION---------------------------------
    $tq = "Thank you for your business!\nCome Again!\n\n";
    $copyright = "Software - Tritcal International\nNugawela | 081 20 50 437\n\n\n";
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
        $printer->setTextSize(2, 2);
        $printer->selectPrintMode(Printer::MODE_DOUBLE_HEIGHT);
        $printer->text($head_title);
        $printer->selectPrintMode(Printer::MODE_FONT_B);
        $printer->setTextSize(1, 1);
        $printer->text($head);
        $printer->setJustification($left);
        $printer->text($title);
        $printer->text($summary);
        $printer->setJustification($center);
        $printer->text($tq);
        $printer->text($copyright);
        $printer->feed();
        $printer->cut();
        $printer->close();
    } catch (Exception $e) {
        echo "Couldn't print to this printer: " . $e->getMessage() . "\n";
    }
    header("location: ../../../kpi_reports/customer_oustanding.php");
} else {
    header("location: ../../../kpi_reports/customer_oustanding.php");
}