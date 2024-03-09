 
<?php

//include connection file
include '../dbconnect.php';
session_start();

if (isset($_SESSION["id"]) && (isset($_GET["v_id"]) || isset($_GET["name"]))) {

    $v_id = 0;
    $v_name = "";
    if (isset($_GET["v_id"])) {
        $v_id = intval($_GET["v_id"]);
        $ven_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM vendor WHERE v_id=$v_id"));
        $v_name = ucwords($ven_det["vendor_name"]);
    }
    if (isset($_GET["name"])) {
        $v_name = trim($_GET["name"]);
    }

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
    $pdf->write(0, 'Vendor Oustanding | ' . ucwords($v_name));
    $pdf->Ln(6);
    $pdf->SetFont($font, '', 10);
    $pdf->write(0, $date);
    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'B', 10);

    $pdf->Cell(10, 9, '#', 1, 0, 'C', true);
    $pdf->Cell(40, 9, 'Vendor Name', 1, 0, 'C', true);
    $pdf->Cell(22, 9, 'Billing Date', 1, 0, 'C', true);
    $pdf->Cell(20, 9, 'Rec. No', 1, 0, 'C', true);
    $pdf->Cell(25, 9, 'Item Count', 1, 0, 'C', true);
    $pdf->Cell(25, 9, 'Bill Amount', 1, 0, 'C', true);
    $pdf->Cell(25, 9, 'Paid Amount', 1, 0, 'C', true);
    $pdf->Cell(25, 9, 'Outstandng', 1, 0, 'C', true);
    $pdf->SetFont($font2, '', 8);
    $pdf->Ln(9);

    if (isset($_GET["v_id"])) {
        $ven_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM vendor WHERE v_id=$v_id"));
        $query = "SELECT * FROM vendor_payment WHERE v_id=$v_id";
        $result = mysqli_query($con, $query);

        while ($row = mysqli_fetch_array($result)) {
            $have_row = true;
            $pdf->Cell(10, 8, $row["id"], 1, 0, 'C');
            $pdf->Cell(40, 8, ucwords($ven_det["vendor_name"]), 1, 0, 'C');
            $pdf->Cell(22, 8, $row["date"], 1, 0, 'C');
            $pdf->Cell(20, 8, $row["ref_no"], 1, 0, 'C');
            $pdf->Cell(25, 8, $row["item_count"], 1, 0, 'C');
            $pdf->Cell(25, 8, dotInput($row["bill_amount"]), 1, 0, 'C');
            $pdf->Cell(25, 8, dotInput($row["paid_amount"]), 1, 0, 'C');
            $pdf->Cell(25, 8, dotInput(floatval($row["bill_amount"]) - floatval($row["paid_amount"])), 1, 0, 'C');
            $pdf->Ln(8);
        }
    }
    if (isset($_GET["name"])) {
        $ven_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM vendor WHERE vendor_name='$v_name'"));
        if ($ven_det != null) {
            $have_row = true;
            $v_id = $ven_det["v_id"];
            $query = "SELECT * FROM vendor_payment WHERE v_id=$v_id";
            $result = mysqli_query($con, $query);

            while ($row = mysqli_fetch_array($result)) {
                $pdf->Cell(10, 8, $row["id"], 1, 0, 'C');
                $pdf->Cell(40, 8, ucwords($v_name), 1, 0, 'C');
                $pdf->Cell(22, 8, $row["date"], 1, 0, 'C');
                $pdf->Cell(20, 8, $row["ref_no"], 1, 0, 'C');
                $pdf->Cell(25, 8, $row["item_count"], 1, 0, 'C');
                $pdf->Cell(25, 8, dotInput($row["bill_amount"]), 1, 0, 'C');
                $pdf->Cell(25, 8, dotInput($row["paid_amount"]), 1, 0, 'C');
                $pdf->Cell(25, 8, dotInput(floatval($row["bill_amount"]) - floatval($row["paid_amount"])), 1, 0, 'C');
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
