
<?php
// include("pdf.php");
require('fpdf/fpdf.php');
$name = 'raja';
session_start();
$pnr = $_SESSION['pnr'];
$train_num = $_SESSION['train_num'];
$train_name = $_SESSION['train_name'];
$chart_prepared = $_SESSION['chart_prepared'];
$to_station = $_SESSION['to_station'];
$to_station_code = $_SESSION['to_station_code'];
$passengers = $_SESSION['passengers'];
$boarding_point = $_SESSION['boarding_point'];
$train_start_date = $_SESSION['train_start_date'];
$total_passengers = $_SESSION['total_passengers'];
$from_station = $_SESSION['from_station'];
$from_station_code = $_SESSION['from_station_code'];
$class = $_SESSION['class'];
$doj = $_SESSION['doj'];
// $reservation_upto = $_SESSION['reservation_upto'];



$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,"JOURNEY DETAILS",1,1,'C');
$pdf->Cell(0,10,"HOSTEL : TAGORE BHAVAN",1,1);
//$pdf->Cell(60,10,"Hello {$name}",1,1,'C');
$pdf->Cell(100,10,"Pnr number : {$pnr}",1,1);
$pdf->Cell(100,10,"Train number : {$train_num}",1,1);
$pdf->Cell(100,10,"Train name : {$train_name}",1,1);
$pdf->Cell(100,10,"From station : {$from_station}",1,1);
$pdf->Cell(100,10,"To station : {$to_station_code}",1,1);
$pdf->Cell(100,10,"Doj : {$doj}",1,1);
$pdf->Cell(100,10,"Boarding point : {$boarding_point}",1,1);
$pdf->Cell(100,10,"Total Passengers : {$total_passengers}",1,1);
$pdf->Cell(100,10,"Class : {$class}",1,1);
$pdf->Cell(100,10,"NAME : {$pnr}",1,1);
$pdf->Cell(100,10,"NAME : {$pnr}",1,1);
$pdf->Cell(100,10,"NAME : {$pnr}",1,1);
$pdf->Cell(100,10,"ROOM NO : AG-25",1,1);
$pdf->Cell(100,10,"ADMISSION NO:U14CO052",1,1);
$pdf->Cell(100,10,"CONTACT : 8128502451",1,1);

$pdf->Output();
?>