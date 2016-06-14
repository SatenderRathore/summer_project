<?php
include('db.php');
session_start();
$from_station     = $_SESSION["from_station"];
$boarding_point   = $_SESSION["boarding_point"];
$to_station       = $_SESSION["to_station"];
$booking_status   = $_SESSION["booking_status"];
$coach_position   = $_SESSION["coach_position"];
$current_status   = $_SESSION["current_status"];
$class            = $_SESSION['class'];
$doj              = $_SESSION['doj'];
$total_passengers = $_SESSION['total_passengers'];
$train_name       = $_SESSION['train_name'];
$train_num        = $_SESSION['train_num'];
$chart_prepared   = $_SESSION['chart_prepared'];
$train_start_date = $_SESSION['train_start_date'];
$pnr              = $_SESSION['pnr'];


print_r($from_station);
print_r($to_station);

print_r($current_status);
print_r($train_start_date);
?>