<?php
include('db.php');
include('function.php');

$train_num = $_REQUEST['train_num'];
$source_code = $_REQUEST['source'];
$dest_code = $_REQUEST['destination'];
$doj = $_REQUEST['doj'];
$class = $_REQUEST['user_class'];
$quota = $_REQUEST['quota'];

$i = 1;
while(1)
{
	$current_status_api_data = seat_availability($train_num,$source_code,$dest_code,$doj,$class,$quota);
	$response_code = $current_status_api_data['response_code'];
	if($response_code == 200)
	{
		$current_status = $current_status_api_data['availability'][0]['status'];
		print_r($current_status);
		break;	
	}
	// print_r("a");
	$i++;
}
// print_r("attempt = ");
// print_r($i);

// $current_status_api_data = seat_availability($train_num,$source_code,$dest_code,$doj,$class,$quota);
// print_r($current_status_api_data);
// $error = $current_status_api_data['error'];
// if($error == "")
// {
	// $current_status = $current_status_api_data['availability'][0]['status'];	
	// print_r($current_status);
// }
// else
// {
	// print_r("some error occured");
// }
// print_r($current_status);


?>