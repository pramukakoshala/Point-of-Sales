<?php
session_start();

if (isset($_SESSION["id"]) && isset($_GET["d"])) {
    include '../valid_fun.php';

    $dep_id = decrydata($_GET["d"]);
    include 'code.php';
    //include connection file
    include '../dbconnect.php';
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

    $logo = '1.jpg';
    $date = date("Y-m-d");

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
    $pdf->write(0, 'Costing Report | ' . date("Y-m-d"));
    $pdf->Ln(16);
    $pdf->SetFont('Arial', 'B', 10);

    $pdf->Cell(30, 9, '#', 1, 0, 'C', true);
    $pdf->Cell(75, 9, 'Product Name', 1, 0, 'C', true);
    $pdf->Cell(25, 9, 'Quantity', 1, 0, 'C', true);
    $pdf->Cell(30, 9, 'Dealer Price', 1, 0, 'C', true);
    $pdf->Cell(30, 9, 'Unit Price', 1, 0, 'C', true);
    $pdf->SetFont($font2, '', 8);
    $pdf->Ln(9);

    $query = "SELECT * FROM products";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($result)) {
        $pro_id = $row['pro_id'];
        $is_in_dp = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM pro_dep WHERE pro_id=$pro_id AND `dep_id`=\"$dep_id\""));
        if ($is_in_dp != null) {
            $pdf->Cell(30, 8, $row["barcode"], 1, 0, 'C');
            $pdf->Cell(75, 8, $row["product_name"], 1, 0, 'L');
            $pdf->Cell(25, 8, $row["quantity"], 1, 0, 'C');
            $pdf->Cell(30, 8, dotInput($row["dealer_price"]), 1, 0, 'C');
            $pdf->Cell(30, 8, dotInput($row["unit_price"]), 1, 0, 'C');
            $pdf->Ln(8);
        }
    }
    $pdf->Output();
}
