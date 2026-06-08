<?php

require('fpdf.php');

$pdf = new FPDF('L','mm','A4');

$pdf->AddPage();

$pdf->SetFont('Arial','B',30);

$pdf->Cell(0,100,'LANDSCAPE TEST',1,1,'C');

$pdf->Output();

?>