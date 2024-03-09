 
<?php

//include connection file
include '../dbconnect.php';
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

    include 'code.php';
    include_once('libs/fpdf.php');

    class PDF extends FPDF {

// Page header
        function Header() {
            // $this->SetFont('Arial', 'B', 13);
            //$this->Ln(20);
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

    $date = date("Y-m-d");
    $have_row = false;

    $font = 'helvetica';
    $font2 = 'Arial';
    $pdf = new PDF();
    $pdf->AddPage();
    $pdf->AddFont($font, '', '', true);
    $pdf->SetFont($font, '', 10);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFillColor(240, 240, 240);
    $pdf->Rect(0, 0, 250, 20, 'F');
    $pdf->SetFont($font, 'B', 15);
    $pdf->write(0, 'Customer Oustanding');
    $pdf->Ln(6);
    $pdf->SetFont($font, '', 10);
    $pdf->write(0, $date);
    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'B', 10);

    $pdf->Cell(15, 9, '#', 1, 0, 'C', true);
    $pdf->Cell(65, 9, 'Customer Name', 1, 0, 'C', true);
    $pdf->Cell(35, 9, 'Total Amount', 1, 0, 'C', true);
    $pdf->Cell(40, 9, 'Total Paid Amount', 1, 0, 'C', true);
    $pdf->Cell(35, 9, 'Outstading Amount', 1, 0, 'C', true);
    $pdf->SetFont($font2, '', 8);
    $pdf->Ln(9);

    $sql3 = "SELECT * FROM customer WHERE c_id != 1 ORDER BY c_id DESC";
    $result3 = mysqli_query($con, $sql3);
    while ($row3 = mysqli_fetch_assoc($result3)) {
        $c_id = $row3['c_id'];
        foreach ($con->query("SELECT c_id,SUM(total),SUM(paid_amount),SUM(balance)
                                            FROM transaction WHERE c_id=$c_id") as $row) {
            $sql1 = "SELECT * FROM customer WHERE c_id=$c_id";
            $result2 = mysqli_query($con, $sql1);
            while ($row2 = mysqli_fetch_assoc($result2)) {
                $have_row = true;
                $pdf->Cell(15, 8, "Cus-" . $row2['c_id'], 1, 0, 'C');
                $pdf->Cell(65, 8, ucwords($row2['customer_name']), 1, 0, 'C');
                $pdf->Cell(35, 8, dotInput($row['SUM(total)']), 1, 0, 'C');
                $pdf->Cell(40, 8, dotInput($row['SUM(paid_amount)']), 1, 0, 'C');
                $pdf->Cell(35, 8, dotInput($row['SUM(balance)']), 1, 0, 'C');
                $pdf->Ln(8);
            }
        }
    }
    if ($have_row != true) {
        $pdf->Cell(10, 8, "-", 1, 0, 'C');
        $pdf->Cell(40, 8, "-", 1, 0, 'C');
        $pdf->Cell(22, 8, "-", 1, 0, 'C');
        $pdf->Cell(20, 8, "-", 1, 0, 'C');
        $pdf->Cell(25, 8, "-", 1, 0, 'C');
        $pdf->Cell(25, 8, "-", 1, 0, 'C');
        $pdf->Cell(25, 8, "-", 1, 0, 'C');
        $pdf->Cell(25, 8, "-", 1, 0, 'C');
    }
    $pdf->Output();
}
