 
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

    if (isset($_GET["sel_date"])) {
        $date = $_GET["sel_date"];
    } else {
        $date = date("Y-m-d");
    }

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
    $pdf->write(0, 'Profit Report');
    $pdf->SetFont($font, '', 10);
    $pdf->Ln(5);
    $pdf->write(0, $date);
    $pdf->Ln(11);
    $pdf->SetFont('Arial', '', 10);

    $date_arr = $sold_arr = $cost_arr = $ous_arr = [];
    if (isset($_GET["sel_date"])) {
        $sel_date = trim($_GET["sel_date"]);
        $query = "SELECT * FROM transaction ORDER BY t_id DESC";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result)) {
            $db_date = trim(explode(" ", $row["transaction_date"])[0]);
            if ($db_date == $sel_date) {
                $balance = floatval($row["balance"]);
                $cost = 0;
                $db_date = trim(explode(" ", $row["transaction_date"])[0]);
                $invoice = trim($row["invoice"]);
                $sales_result = mysqli_query($con, "SELECT * FROM sales_order WHERE invoice=$invoice");
                while ($sales_row = mysqli_fetch_assoc($sales_result)) {
                    $qty = $sales_row["quantity"];
                    $pro_id = intval($sales_row["pro_id"]);
                    $pro_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM products WHERE pro_id=$pro_id"));
                    if ($pro_det != null) {
                        $cost += ($qty * floatval($pro_det["dealer_price"]));
                    }
                }
                $l = count($date_arr);
                $have_date = false;
                $unic_index = 0;
                while ($l > 0) {
                    if ($date_arr[$l - 1] == $db_date) {
                        $unic_index = $l - 1;
                        $have_date = true;
                        break;
                    }
                    $l--;
                }


                $oustanding = floatval($row["total"]) - floatval($row["paid_amount"]);

                if ($have_date != true) {
                    $date_arr[] = $db_date;
                    $sold_arr[] = floatval($row["total"]);
                    $cost_arr[] = $cost;
                    $ous_arr[] = $oustanding;
                } else {
                    $sold_arr[$unic_index] += floatval($row["total"]);
                    $cost_arr[$unic_index] += $cost;
                    $ous_arr[$unic_index] += $oustanding;
                }
            }
        }
        $total_days = count($date_arr);

        while ($total_days > 0) {

            $pdf->Cell(90, 8, "Date :", 1, 0, 'L', true);
            $pdf->Cell(100, 8, $date_arr[$total_days - 1], 1, 0, 'L');
            $pdf->Ln(8);
            $pdf->Cell(90, 8, "Sold Amount (LKR) :", 1, 0, 'L', true);
            $pdf->Cell(100, 8, dotInput($sold_arr[$total_days - 1]), 1, 0, 'L');
            $pdf->Ln(8);
            $pdf->Cell(90, 8, "Cost Amount (LKR) :", 1, 0, 'L', true);
            $pdf->Cell(100, 8, dotInput($cost_arr[$total_days - 1]), 1, 0, 'L');
            $pdf->Ln(8);
            $pdf->Cell(90, 8, "Profit (LKR) :", 1, 0, 'L', true);
            $pdf->Cell(100, 8, dotInput(abs($sold_arr[$total_days - 1] - $cost_arr[$total_days - 1])), 1, 0, 'L');
            $pdf->Ln(8);
            $pdf->Cell(90, 8, "Customer Outstanding (LKR) :", 1, 0, 'L', true);
            $pdf->Cell(100, 8, dotInput($ous_arr[$total_days - 1]), 1, 0, 'L');
            $pdf->Ln(8);

            $total_days--;
        }
    } else {
        $query = "SELECT * FROM transaction ORDER BY t_id DESC";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result)) {
            $balance = floatval($row["balance"]);
            $cost = 0;
            $db_date = trim(explode(" ", $row["transaction_date"])[0]);
            $invoice = trim($row["invoice"]);
            $sales_result = mysqli_query($con, "SELECT * FROM sales_order WHERE invoice=$invoice");
            while ($sales_row = mysqli_fetch_assoc($sales_result)) {
                $qty = $sales_row["quantity"];
                $pro_id = intval($sales_row["pro_id"]);
                $pro_det = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM products WHERE pro_id=$pro_id"));
                if ($pro_det != null) {
                    $cost += ($qty * floatval($pro_det["dealer_price"]));
                }
            }
            $l = count($date_arr);
            $have_date = false;
            $unic_index = 0;
            while ($l > 0) {
                if ($date_arr[$l - 1] == $db_date) {
                    $unic_index = $l - 1;
                    $have_date = true;
                    break;
                }
                $l--;
            }

            $oustanding = floatval($row["total"]) - floatval($row["paid_amount"]);

            if ($have_date != true) {
                $date_arr[] = $db_date;
                $sold_arr[] = floatval($row["total"]);
                $cost_arr[] = $cost;
                $ous_arr[] = $oustanding;
            } else {
                $sold_arr[$unic_index] += floatval($row["total"]);
                $cost_arr[$unic_index] += $cost;
                $ous_arr[$unic_index] += $oustanding;
            }
        }
        $total_days = count($date_arr);

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(30, 8, "Date", 1, 0, 'C', true);
        $pdf->Cell(38, 8, "Sold Amount (LKR)", 1, 0, 'C', true);
        $pdf->Cell(38, 8, "Cost Amount (LKR)", 1, 0, 'C', true);
        $pdf->Cell(33, 8, "Profit (LKR)", 1, 0, 'C', true);
        $pdf->Cell(51, 8, "Customer Outstanding (LKR)", 1, 0, 'C', true);
        $pdf->Ln(8);
        $pdf->SetFont('Arial', '', 10);

        while ($total_days > 0) {

            $pdf->Cell(30, 8, $date_arr[$total_days - 1], 1, 0, 'C');
            $pdf->Cell(38, 8, dotInput($sold_arr[$total_days - 1]), 1, 0, 'C');
            $pdf->Cell(38, 8, dotInput($cost_arr[$total_days - 1]), 1, 0, 'C');
            $pdf->Cell(33, 8, dotInput(abs($sold_arr[$total_days - 1] - $cost_arr[$total_days - 1])), 1, 0, 'C');
            $pdf->Cell(51, 8, dotInput($ous_arr[$total_days - 1]), 1, 0, 'C');
            $pdf->Ln(8);

            $total_days--;
        }
    }

    $pdf->Output();
}
