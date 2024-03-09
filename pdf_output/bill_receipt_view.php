 
<?php

//session_start();

if (isset($_SESSION["id"])) {

    function dotInput($text) {
        $t = strval($text);
        $l = strlen($t);
        $have_dot = false;
        while ($l > 0) {
            if ($t[$l - 1] == ".") {
                $have_dot = true;
                break;
            }
            $l--;
        }
        if ($have_dot == false) {
            $t .= ".00";
        }
        return $t;
    }

    include 'code.php';
    if (isset($_GET["invoice"]) && isset($_GET["t"]) && isset($_GET["n"])) {
        $note = $_GET["n"];
        //include connection file
        include 'dbconnect.php';

        $invoice = $_GET["invoice"];
        if ($note == 0) {
            $trans_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM transaction WHERE invoice='$invoice'"));
            $t_id = $trans_det["t_id"];
            $t_date = $trans_det["transaction_date"];
        } else {
            $trans_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM non_acc_trans WHERE invoice='$invoice'"));
        }

        if ($trans_det != null) {
            $total_bill = $total_dis = 0;
            $c_id = intval($trans_det["c_id"]);
            $cus_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM customer WHERE c_id=$c_id"));
            include_once('libs/fpdf.php');

            class PDF extends FPDF {

// Page header
                function Header() {
                    $this->SetFont('Arial', 'B', 13);
                    $this->Ln(20);
                }

// Page footer
                function Footer() {
//                    // Position at 1.5 cm from bottom
//                    $this->SetY(-15);
//                    // Arial italic 8
//                    $this->SetFont('Arial', 'I', 8);
//                    $this->Cell(0, 10, 'PDF Genarated On 2018-7-8 | Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
                }

            }

            $logo = '1.jpg';
            $date = date("Y-m-d");

            $font = 'helvetica';
            $font2 = 'Arial';
            $pdf = new PDF();
            $pdf->AddPage();
            $pdf->AddFont($font, '', '', true);
            $pdf->SetFont($font, '', 10);
            $pdf->Image('1.jpg', 10, 5, 180);
            $pdf->Ln(1);
            $pdf->cell(190, 7, 'Issued To   : ' . $cus_det["customer_name"], 0, 0, 'L');
            $pdf->Ln(5);
            $pdf->cell(190, 7, 'Address      : ' . $cus_det["customer_address"], 0, 0, 'L');
            $pdf->Ln(5);
            $pdf->cell(190, 7, 'Contact No : ' . $cus_det["customer_mobile"], 0, 0, 'L');
            $pdf->Ln(5);
            $pdf->cell(190, 7, 'Invoice        : ' . $t_id, 0, 0, 'L');
            $pdf->Ln(5);
            $pdf->cell(190, 7, 'Date            : ' . $t_date, 0, 0, 'L');
            $pdf->Ln(8);

            $pdf->SetTextColor(0, 0, 0);
            $pdf->SetFillColor(240, 240, 240);

            $pdf->AliasNbPages();
            $pdf->SetFont($font2, 'B', 8);

            $pdf->Cell(10, 9, '', 0, 0, 'L', true);
            $pdf->Cell(90, 9, 'Description', 0, 0, 'L', true);
            $pdf->Cell(15, 9, 'Qty', 0, 0, 'C', true);
            $pdf->Cell(25, 9, 'Unit Price', 0, 0, 'R', true);
            $pdf->Cell(25, 9, 'Discount', 0, 0, 'R', true);
            $pdf->Cell(25, 9, 'Total', 0, 0, 'R', true);
            $pdf->SetFont($font2, '', 8);
            $pdf->Ln(9);

            $index = 1;
            $sql = "SELECT * FROM sales_order WHERE invoice=$invoice";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($result)) {
                $sales_id = intval($row["sales_id"]);
                $pro_id = intval($row["p_id"]);
                $pro_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM products WHERE p_id=$pro_id"));
                $pro_name = $pro_det["product_name"];
                $pro_code = $pro_det["p_id"];
                if (intval($_GET["t"]) == 1) {
                    $unit_price = $pro_det["b_price"];
                } else if (intval($_GET["t"]) == 2) {
                    $unit_price = $pro_det["g_price"];
                } else {
                    $unit_price = $pro_det["y_price"];
                }
                $qty = $row["quantity"];
                $total = $row["total"];
                $dis = 0;
//                $dis_row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM temp_dis WHERE sales_id=$sales_id"));
//                if ($dis_row != null) {
//                    $dis = $dis_row["dis_amount"];
//                }

                $pdf->Cell(10, 7, $index, 0, 0, 'L');
                $pdf->Cell(90, 7, $pro_det["pro_type"] . " - " . $pro_name, 0, 0, 'L');
                $pdf->Cell(15, 7, dotInput($qty), 0, 0, 'C');
                $pdf->Cell(25, 7, dotInput($unit_price), 0, 0, 'R');
                $pdf->Cell(25, 7, dotInput($dis), 0, 0, 'R');
                $pdf->Cell(25, 7, dotInput($total), 0, 0, 'R');
                $pdf->Ln(7);

                $index++;
            }
            $symbol = "";
            $l = 200;
            while ($l > 0) {
                $symbol .= "-";
                $l--;
            }

            $visa = $check = "0.00";
//            if ($trans_det["pay_type"] == 1) {
            $cash = dotInput($trans_det["total"]);
//            } else if ($trans_det["pay_type"] == 2) {
//                $visa = dotInput($trans_det["paid_amount"]);
//            } else {
//                $check = dotInput($trans_det["paid_amount"]);
//            }

            $pdf->Cell(190, 7, $symbol, 0, 0, 'R');

            $pdf->Ln(10);
            $pdf->SetFont($font2, 'B', 10);
            $pdf->Cell(110, 5, "", 0, 0, 'L');
            $pdf->Cell(35, 5, "", 0, 0, 'L');
            $pdf->Cell(10, 5, "", 0, 0, 'C');
            $pdf->Cell(35, 5, "", 0, 0, 'R');
            $pdf->Ln(5);
            $pdf->SetFont($font2, 'B', 10);
            $pdf->Cell(110, 5, "", 0, 0, 'L');
            $pdf->Cell(35, 5, "Total Amount (LKR)", 0, 0, 'L');
            $pdf->Cell(10, 5, ":", 0, 0, 'C');
            $pdf->Cell(35, 5, dotInput($trans_det["total"]), 0, 0, 'R');
            $pdf->Ln(5);
            $pdf->SetFont($font2, 'B', 10);
            $pdf->Cell(110, 5, "", 0, 0, 'L');
            $pdf->Cell(35, 5, "Balance", 0, 0, 'L');
            $pdf->Cell(10, 5, ":", 0, 0, 'C');
            $pdf->Cell(35, 5, dotInput($trans_det["balance"]), 0, 0, 'R');
            $pdf->SetFont($font2, '', 10);

            $pdf->Ln(-17);
            $pdf->Ln(7);
            $pdf->Cell(105, 20, "", 1, 0, 'L');
            $pdf->Cell(10, 50, "", 0, 0, 'C');
            $pdf->Cell(80, 50, "", 0, 0, 'L');
            $pdf->Ln(3);
            $pdf->SetX(10);
            $pdf->SetFont($font2, '', 8);
            $pdf->Write(5, "Make All Cheques Payable To oyo trading (pvt) ltd.\n");
            $pdf->SetX(10);
            $pdf->Write(5, "If you have any questions regarding this invoice contact oyotradin@gmail.com.");
            $pdf->SetX(10);
            $pdf->Ln(5);
            $pdf->Write(5, "Thank you for your business");
            $pdf->Output();
        }
    }
}
