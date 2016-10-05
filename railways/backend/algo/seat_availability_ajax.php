<?php
include('db.php');
include('function.php');

$train_num = $_REQUEST['train_num'];
$source_code = $_REQUEST['source'];
$dest_code = $_REQUEST['destination'];
$doj = $_REQUEST['doj'];
$class = $_REQUEST['user_class'];
$quota = $_REQUEST['quota'];


// print_r($train_num);
// print_r($source_code);
// print_r($dest_code);
// print_r($doj);
// print_r($class);
// print_r($quota);

$current_status_api_data = seat_availability($train_num,$source_code,$dest_code,$doj,$class,$quota);
// print_r($current_status_api_data);
$error = $current_status_api_data['error'];
if($error == "")
{
	$current_status = $current_status_api_data['availability'][0]['status'];	
	print_r($current_status);
}
else
{
	print_r("some error occured");
}
// print_r($current_status);


?>