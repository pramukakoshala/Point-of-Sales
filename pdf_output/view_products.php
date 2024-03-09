 
<?php

session_start();

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

    include '../code.php';
    if (isset($_GET["invoice"])) {
        //include connection file
        include '../dbconnect.php';

        $company = 1;
        $invoice = $_GET["invoice"];
        $trans_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM transaction WHERE invoice='$invoice'"));
        if ($trans_det != null) {
            $sales_row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM sales_order WHERE invoice='$invoice'"));
            $pro_id = $sales_row["pro_id"];
            $company = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM products WHERE pro_id=$pro_id"))["company"];
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

            if ($company == 2) {
                $com_num = "001";
                $logo = '1.jpg';
            } else {
                $com_num = "002";
                $logo = '2.jpg';
            }
            $date = date("Y-m-d");

            $font = 'helvetica';
            $font2 = 'Arial';
            $pdf = new PDF();
            $pdf->AddPage();
            $pdf->AddFont($font, '', '', true);
            $pdf->SetFont($font, '', 10);
            $pdf->Image($logo, 10, 5, 120);
            $pdf->SetFont($font, 'B', 12);
            $pdf->Ln(7);
            $pdf->cell(0, -30, 'Invoice', 0, 0, 'R');
            $pdf->SetFont($font, '', 10);
            $pdf->Ln(7);
            $pdf->cell(0, -30, $com_num . "-" . $trans_det["t_id"], 0, 0, 'R');
            $pdf->Ln(7);
            $pdf->cell(0, -30, 'Date: ' . $date, 0, 0, 'R');
            $pdf->Ln(-8);

            $pdf->SetTextColor(0, 0, 0);
            $pdf->SetFillColor(240, 240, 240);

            $pdf->AliasNbPages();
            $pdf->SetFont($font2, 'B', 8);

            $pdf->Cell(20, 9, '   Code', 0, 0, 'L', true);
            $pdf->Cell(80, 9, 'Description', 0, 0, 'L', true);
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
                $pro_id = intval($row["pro_id"]);
                $pro_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM products WHERE pro_id=$pro_id"));
                $pro_name = $pro_det["product_name"];
                $pro_code = $pro_det["barcode"];
                $unit_price = $pro_det["unit_price"];
                $qty = $row["quantity"];
                $total = $row["total"];
                $dis = 0;
                $dis_row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM temp_dis WHERE sales_id=$sales_id"));
                if ($dis_row != null) {
                    $dis = $dis_row["dis_amount"];
                }

                $pdf->Cell(20, 7, $index . ". " . $pro_code, 0, 0, 'L');
                $pdf->Cell(80, 7, $pro_name, 0, 0, 'L');
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


            $cash = $visa = $check = "0.00";
            if ($trans_det["pay_type"] == 1) {
                $cash = dotInput($trans_det["paid_amount"]);
            } else if ($trans_det["pay_type"] == 2) {
                $visa = dotInput($trans_det["paid_amount"]);
            } else {
                $check = dotInput($trans_det["paid_amount"]);
            }

            $pdf->Cell(190, 7, $symbol, 0, 0, 'R');

            $pdf->Ln(10);
            $pdf->SetFont($font2, 'B', 10);
            $pdf->Cell(110, 5, "", 0, 0, 'L');
            $pdf->Cell(35, 5, "Total Bill (LKR)", 0, 0, 'L');
            $pdf->Cell(10, 5, ":", 0, 0, 'C');
            $pdf->Cell(35, 5, dotInput($trans_det["total"]), 0, 0, 'R');
            $pdf->Ln(8);
            $pdf->SetFont($font2, '', 10);
            $pdf->Cell(110, 5, "", 0, 0, 'L');
            $pdf->Cell(35, 5, "Cash", 0, 0, 'L');
            $pdf->Cell(10, 5, ":", 0, 0, 'C');
            $pdf->Cell(35, 5, $cash, 0, 0, 'R');
            $pdf->Ln(5);
            $pdf->Cell(110, 5, "", 0, 0, 'L');
            $pdf->Cell(35, 5, "Visa", 0, 0, 'L');
            $pdf->Cell(10, 5, ":", 0, 0, 'C');
            $pdf->Cell(35, 5, $visa, 0, 0, 'R');
            $pdf->Ln(5);
            $pdf->Cell(110, 5, "", 0, 0, 'L');
            $pdf->Cell(35, 5, "Cheque", 0, 0, 'L');
            $pdf->Cell(10, 5, ":", 0, 0, 'C');
            $pdf->Cell(35, 5, $check, 0, 0, 'R');
            $pdf->Ln(5);
            $pdf->SetFont($font2, 'B', 10);
            $pdf->Cell(110, 5, "", 0, 0, 'L');
            $pdf->Cell(35, 5, "Balance (LKR)", 0, 0, 'L');
            $pdf->Cell(10, 5, ":", 0, 0, 'C');
            $pdf->Cell(35, 5, dotInput($trans_det["balance"]), 0, 0, 'R');
            $pdf->SetFont($font2, '', 10);

            $pdf->Ln(-33);
            $pdf->Ln(7);
            $pdf->Cell(100, 35, "", 1, 0, 'L');
            $pdf->Cell(10, 50, "", 0, 0, 'C');
            $pdf->Cell(80, 50, "", 0, 0, 'L');
            $pdf->Ln(3);
            $pdf->SetX(12);
            $pdf->SetFont($font2, 'B', 10);
            $pdf->Write(5, "Customer: ");
            $pdf->SetFont($font2, '', 10);
            $pdf->Write(5, $cus_det["customer_name"] . "\n");
            $pdf->SetX(12);
            $pdf->SetFont($font2, 'B', 10);
            $pdf->Write(5, "Mobile No: ");
            $pdf->SetFont($font2, '', 10);
            $pdf->Write(5, $cus_det["customer_mobile"] . "\n");
            $pdf->SetX(12);
            $pdf->SetFont($font2, 'B', 10);
            $pdf->Write(5, "More Details: \n");
            $pdf->SetFont($font2, '', 10);
            $pdf->SetX(12);
            $str = "";
            $cou = 1;
            $i = $l = 52;

            $det = ucwords(trim($trans_det["des"]));
            $det_count = strlen($det);
            while ($det_count > 0) {
                $str .= $det[$det_count - 1];
                if ($cou == $i) {
                    $str .= "\n  ";
                    $i += $l;
                }
                $cou++;
                $det_count--;
            }
            $pdf->Write(5, $str);
            $pdf->Output();
        }
    }
}
?>