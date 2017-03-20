<?php
require('fpdf/fpdf.php');
include('index.php');
$name = 'raja';
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,"PNR : ",0,1);
$pdf->Cell(0,10,$pnr,0,0);
$pdf->Cell(0,10,"Train No : ",0,0);
$pdf->Cell(0,10,$train_num,0,0);
$pdf->Cell(0,10,"Train Name : ",0,1);
$pdf->Cell(0,10,$train_name,0,0);
$pdf->Cell(0,10,"Reservation upto : ",0,1);
$pdf->Cell(0,10,$to_station,0,0);
$pdf->Cell(0,10,"Boarding Point : ",0,1);
$pdf->Cell(0,10,$boarding_point,0,0);

// $pdf->Cell(0,10,$train_num,0,1);
//$pdf->Cell(60,10,"Hello {$name}",1,1,'C');
$pdf->Cell(100,10,"NAME : {$name}",1,1);
$pdf->Cell(100,10,"ROOM NO : AG-25",1,1);
$pdf->Cell(100,10,"ADMISSION NO:U14CO052",1,1);
$pdf->Cell(100,10,"CONTACT : 8128502451",1,1);

$pdf->Output();

?>