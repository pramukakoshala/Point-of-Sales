 
<?php

//include connection file
include '../dbconnect.php';
session_start();

if (isset($_SESSION["id"]) && (isset($_GET["c_id"]) || isset($_GET["name"]) || isset($_GET["date"]))) {

    $c_id = 0;
    $c_name = "";
    $date = date("Y-m-d");
    if (isset($_GET["c_id"])) {
        $c_id = intval($_GET["c_id"]);
        $cus_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM customer WHERE c_id=$c_id"));
        $c_name = ucwords($cus_det["customer_name"]);
    }
    if (isset($_GET["name"])) {
        $c_name = trim($_GET["name"]);
    }
    if (isset($_GET["date"])) {
        $date = trim($_GET["date"]);
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

    include_once('libs/fpdf.php');

    class PDF extends FPDF {

// Page header
        function Header() {
            
        }

// Page footer
        function Footer() {
            
        }

    }

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
    $pdf->write(0, 'Transaction | ' . ucwords($c_name));
    $pdf->Ln(6);
    $pdf->SetFont($font, '', 10);
    $pdf->write(0, $date);
    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'B', 10);

    $pdf->Cell(10, 9, '#', 1, 0, 'C', true);
    $pdf->Cell(40, 9, 'Date', 1, 0, 'C', true);
    $pdf->Cell(22, 9, 'Invoice', 1, 0, 'C', true);
    $pdf->Cell(20, 9, 'Sub Total', 1, 0, 'C', true);
    $pdf->Cell(25, 9, 'Discount', 1, 0, 'C', true);
    $pdf->Cell(25, 9, 'Total', 1, 0, 'C', true);
    $pdf->Cell(25, 9, 'Paid Amount', 1, 0, 'C', true);
    $pdf->Cell(25, 9, 'Balance', 1, 0, 'C', true);
    $pdf->SetFont($font2, '', 8);
    $pdf->Ln(9);
    
    $table = "`transaction`";
    if (isset($_GET['trans']) && ($_SESSION["tax_active"] == 1)) {
        $table = "`temp_transaction`";
    }
    $index = 1;
    if (isset($_GET["c_id"]) && !isset($_GET["date"])) {
        $query = "SELECT * FROM $table WHERE c_id=$c_id ORDER BY t_id DESC";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result)) {
            $have_row = true;
            $pdf->Cell(10, 8, $index, 1, 0, 'C');
            $pdf->Cell(40, 8, $row["transaction_date"], 1, 0, 'C');
            $pdf->Cell(22, 8, $row["invoice"], 1, 0, 'C');
            $pdf->Cell(20, 8, dotInput($row["sub_total"]), 1, 0, 'C');
            $pdf->Cell(25, 8, dotInput($row["discount"]), 1, 0, 'C');
            $pdf->Cell(25, 8, dotInput($row["total"]), 1, 0, 'C');
            $pdf->Cell(25, 8, dotInput($row["paid_amount"]), 1, 0, 'C');
            $pdf->Cell(25, 8, dotInput($row["balance"]), 1, 0, 'C');
            $pdf->Ln(8);
            $index++;
        }
    } elseif (isset($_GET["name"]) && !isset($_GET["date"])) {
        $query = "SELECT * FROM customer cus, $table trans WHERE cus.c_id=trans.c_id AND cus.customer_name='$c_name' ORDER BY trans.t_id DESC";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result)) {
            $have_row = true;
            $pdf->Cell(10, 8, $index, 1, 0, 'C');
            $pdf->Cell(40, 8, $row["transaction_date"], 1, 0, 'C');
            $pdf->Cell(22, 8, $row["invoice"], 1, 0, 'C');
            $pdf->Cell(20, 8, dotInput($row["sub_total"]), 1, 0, 'C');
            $pdf->Cell(25, 8, dotInput($row["discount"]), 1, 0, 'C');
            $pdf->Cell(25, 8, dotInput($row["total"]), 1, 0, 'C');
            $pdf->Cell(25, 8, dotInput($row["paid_amount"]), 1, 0, 'C');
            $pdf->Cell(25, 8, dotInput($row["balance"]), 1, 0, 'C');
            $pdf->Ln(8);
            $index++;
        }
    } elseif (isset($_GET["c_id"]) && isset($_GET["date"])) {
        $query = "SELECT * FROM $table WHERE c_id=$c_id ORDER BY t_id DESC";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result)) {
            $db_date = explode(" ", $row["transaction_date"])[0];
            if ($db_date == $_GET["date"]) {
                $have_row = true;
                $pdf->Cell(10, 8, $index, 1, 0, 'C');
                $pdf->Cell(40, 8, $row["transaction_date"], 1, 0, 'C');
                $pdf->Cell(22, 8, $row["invoice"], 1, 0, 'C');
                $pdf->Cell(20, 8, dotInput($row["sub_total"]), 1, 0, 'C');
                $pdf->Cell(25, 8, dotInput($row["discount"]), 1, 0, 'C');
                $pdf->Cell(25, 8, dotInput($row["total"]), 1, 0, 'C');
                $pdf->Cell(25, 8, dotInput($row["paid_amount"]), 1, 0, 'C');
                $pdf->Cell(25, 8, dotInput($row["balance"]), 1, 0, 'C');
                $pdf->Ln(8);
                $index++;
            }
        }
    } elseif (isset($_GET["name"]) && isset($_GET["date"])) {
        $query = "SELECT * FROM customer cus, $table trans WHERE cus.c_id=trans.c_id AND cus.customer_name='$c_name' ORDER BY trans.t_id DESC";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result)) {
            $db_date = explode(" ", $row["transaction_date"])[0];
            if ($db_date == $_GET["date"]) {
                $have_row = true;
                $pdf->Cell(10, 8, $index, 1, 0, 'C');
                $pdf->Cell(40, 8, $row["transaction_date"], 1, 0, 'C');
                $pdf->Cell(22, 8, $row["invoice"], 1, 0, 'C');
                $pdf->Cell(20, 8, dotInput($row["sub_total"]), 1, 0, 'C');
                $pdf->Cell(25, 8, dotInput($row["discount"]), 1, 0, 'C');
                $pdf->Cell(25, 8, dotInput($row["total"]), 1, 0, 'C');
                $pdf->Cell(25, 8, dotInput($row["paid_amount"]), 1, 0, 'C');
                $pdf->Cell(25, 8, dotInput($row["balance"]), 1, 0, 'C');
                $pdf->Ln(8);
                $index++;
            }
        }
    } elseif (!isset($_GET["name"]) && isset($_GET["date"]) && !isset($_GET["name"])) {
        $query = "SELECT * FROM $table ORDER BY t_id DESC";
        $result = mysqli_query($con, $query);
        if (!$result) {
            echo mysqli_error($con);
        }
        while ($row = mysqli_fetch_array($result)) {
            $db_date = explode(" ", $row["transaction_date"])[0];
            if ($db_date == $_GET["date"]) {
                $have_row = true;
                $pdf->Cell(10, 8, $index, 1, 0, 'C');
                $pdf->Cell(40, 8, $row["transaction_date"], 1, 0, 'C');
                $pdf->Cell(22, 8, $row["invoice"], 1, 0, 'C');
                $pdf->Cell(20, 8, dotInput($row["sub_total"]), 1, 0, 'C');
                $pdf->Cell(25, 8, dotInput($row["discount"]), 1, 0, 'C');
                $pdf->Cell(25, 8, dotInput($row["total"]), 1, 0, 'C');
                $pdf->Cell(25, 8, dotInput($row["paid_amount"]), 1, 0, 'C');
                $pdf->Cell(25, 8, dotInput($row["balance"]), 1, 0, 'C');
                $pdf->Ln(8);
                $index++;
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
