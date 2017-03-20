<?php
require('fpdf/fpdf.php');
$name = 'raja';



$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,"SARDAR VALLABHBHAI NATIONAL INSTITUTE OF TECHNOLOGY",1,1,'C');
$pdf->Cell(0,10,"HOSTEL : TAGORE BHAVAN",1,1,'C');
//$pdf->Cell(60,10,"Hello {$name}",1,1,'C');
$pdf->Cell(100,10,"NAME : {$name}",1,1);
$pdf->Cell(100,10,"ROOM NO : AG-25",1,1);
$pdf->Cell(100,10,"ADMISSION NO:U14CO052",1,1);
$pdf->Cell(100,10,"CONTACT : 8128502451",1,1);

$pdf->Output();

?>