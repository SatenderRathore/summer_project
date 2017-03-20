<?php
require('fpdf/fpdf.php');
// include('index.php');
session_start();
$pnr = $_SESSION['pnr'];
// print_r($_SESSOIN['pnr']);
// echo $_SESSION['pnr'];
$name = 'raja';

// print_r($train_num);
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,$pnr,0,0);
$pdf->Cell(0,10,"Train Name : ",0,1);
$pdf->Cell(0,10,$train_name,0,0);
$pdf->Cell(0,10,"Reservation upto : ",0,1);
$pdf->Cell(0,10,$to_station,0,0);
$pdf->Cell(0,10,"Boarding Point : ",0,1);
$pdf->Cell(0,10,$boarding_point,0,0);
$pdf->Output();

?>