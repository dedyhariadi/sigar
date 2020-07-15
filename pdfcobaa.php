<?php
require('fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','L',16);
$pdf->Cell(40,10,'Hello World!' );
$pdf->Output();
?>
