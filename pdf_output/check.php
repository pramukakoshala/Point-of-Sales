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

    if (true) {
        include_once('libs/fpdf.php');

        class PDF extends FPDF {

            function Header() {
                
            }

            function Footer() {
                
            }

        }

        $font = 'helvetica';
        $pdf = new PDF();
        $pdf->AddPage();
        $pdf->AddFont($font, '', '', true);
        $pdf->SetFont($font, '', 10);


        $date = "0 5 /1 0 /    1 9";
        $type = "Cash";
        $des = "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
        $amount = dotInput(10000);

        $cou = 1;
        $i = $l = 40;
        $str = "";
        $det = ucwords(trim($des));
        $det_count = strlen($det);
        while ($det_count > 0) {
            $str .= $det[$det_count - 1];
            if ($cou == $i) {
                $str .= "\n";
                $i += $l;
            }
            $cou++;
            $det_count--;
        }

        $pdf->SetX();
        $pdf->SetY(10);
        $pdf->write(5, $date);
        $pdf->SetX(20);
        $pdf->SetY(20);
        $pdf->write(5, $type);
        $pdf->SetX(30);
        $pdf->SetY(30);
        $pdf->Write(5, $str);
        $pdf->SetX(40);
        $pdf->SetY(40);
        $pdf->write(5, $amount);

        $pdf->Output();
    }
} 