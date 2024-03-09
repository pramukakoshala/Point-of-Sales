 
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

    //include connection file
    include '../dbconnect.php';
    include_once('libs/fpdf.php');

    class PDF extends FPDF {

// Page header
        function Header() {
            
        }

// Page footer
        function Footer() {
            
        }

    }

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
    $pdf->write(0, 'Sales Report');
    $pdf->SetFont($font, '', 10);
    $pdf->Ln(5);
    $pdf->write(0, date("Y-m-d"));
    $pdf->Ln(11);
    $pdf->SetFont('Arial', '', 10);

    if (isset($_GET["pro_id"]) && ($_GET["pro_id"] != 0) && isset($_GET["from"]) && isset($_GET["to"])) {

        $income = $qty = 0;

        $pro_id = $_GET["pro_id"];
        $from = strtotime($_GET["from"]);
        $to = strtotime($_GET["to"]);

        $pro_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM products WHERE pro_id=$pro_id"));
        $unit_price = floatval($pro_det["unit_price"]);
        $dealer_price = floatval($pro_det["dealer_price"]);
        $pro_name = ucwords($pro_det["product_name"]);
        $cat_id = intval($pro_det["category_id"]);
        $unit = intval(mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM category WHERE category_id=$cat_id"))["unit"]);
        $type = "Item/s";
        if ($unit == 2) {
            $type = "Kilogram (KG)";
        } elseif ($unit == 3) {
            $type = "Liter (L)";
        }

        $query = "SELECT * FROM sales_order WHERE pro_id=$pro_id";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result)) {
            $db_date = strtotime($row["date"]);
            if ($db_date >= $from && $db_date <= $to) {
                $qty += floatval($row["quantity"]);
                $income += floatval($row["total"]);
            }
        }
        $expense = $qty * $dealer_price;
        $profit = $income - $expense;

        $pdf->Cell(90, 8, "Product Code :", 1, 0, 'L', true);
        $pdf->Cell(100, 8, "#" . $pro_id, 1, 0, 'L');
        $pdf->Ln(8);
        $pdf->Cell(90, 8, "Product Name :", 1, 0, 'L', true);
        $pdf->Cell(100, 8, $pro_name, 1, 0, 'L');
        $pdf->Ln(8);
        $pdf->Cell(90, 8, "Time Period :", 1, 0, 'L', true);
        $pdf->Cell(100, 8, $_GET["from"] . " to " . $_GET["to"], 1, 0, 'L');
        $pdf->Ln(8);
        $pdf->Cell(90, 8, "Sold Quantity In " . $type . " :", 1, 0, 'L', true);
        $pdf->Cell(100, 8, $qty, 1, 0, 'L');
        $pdf->Ln(8);
        $pdf->Cell(90, 8, "Sold Amount (LKR) :", 1, 0, 'L', true);
        $pdf->Cell(100, 8, dotInput($income), 1, 0, 'L');
        $pdf->Ln(8);
        $pdf->Cell(90, 8, "Cost Of Sales (LKR) :", 1, 0, 'L', true);
        $pdf->Cell(100, 8, dotInput($expense), 1, 0, 'L');
        $pdf->Ln(8);
        $pdf->Cell(90, 8, "Profit (LKR) :", 1, 0, 'L', true);
        $pdf->Cell(100, 8, dotInput($profit), 1, 0, 'L');
        $pdf->Ln(8);
    }

    $pdf->Output();
}
