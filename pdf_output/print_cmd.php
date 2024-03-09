<?php
$filename = "doc.pdf";
$pdf->Output($filename, 'F');
$printcmd = "java -classpath C:/xampp/htdocs/w/fuel_s/2/print.jar org.apache.pdfbox.PrintPDF -silentPrint -printerName hp_jet C:/xampp/htdocs/w/fuel_s/2/doc.pdf";
exec($printcmd);