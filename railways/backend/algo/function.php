<?php 

$apikey = "fvatr8579";//railwayapi1@gmail.com

function get_pnr_status($pnr)
{
	$apikey = "fvatr8579";//railwayapi1@gmail.com
	// $apikey = "uucxi9379";//for check error

	$pnr_status_api = "http://api.railwayapi.com/pnr_status/pnr/" . $pnr . "/apikey/" . $apikey ;
    $pnr_status_api_call = file_get_contents($pnr_status_api);
    $pnr_status_api_data= json_decode($pnr_status_api_call, true);
    return $pnr_status_api_data;
}

function trains_bw_station($source,$destination,$doj)
{
	$apikey = "fvatr8579";//railwayapi1@gmail.com
	$apikey = "zqdor3834";

	$trains_bw_stations_api = "http://api.railwayapi.com/between/source/" . $source . "/dest/" . $destination . "/date/" . $doj . "/apikey/" . $apikey ;
    $trains_bw_stations_api_call = file_get_contents($trains_bw_stations_api);
    $trains_bw_stations_api_data = json_decode($trains_bw_stations_api_call, true);

    return $trains_bw_stations_api_data;
}

function seat_availability($train_num,$source_code,$dest_code,$doj,$class,$quota)
{
	$apikey = "fvatr8579";//railwayapi1@gmail.com
	$apikey = "zqdor3834";
	$seat_availability_api = "http://api.railwayapi.com/check_seat/train/" . $train_num . "/source/" . $source_code . "/dest/" . $dest_code . "/date/" . $doj . "/class/" . $class . "/quota/" . $quota . "/apikey/" . $apikey ;
    $seat_availability_api_call = file_get_contents($seat_availability_api);
    $seat_availability_api_data = json_decode($seat_availability_api_call, true);

    return $seat_availability_api_data;

}

function train_live_status($train_num)
{
	 $apikey = "fvatr8579";//railwayapi1@gmail.com

	 $doj = "20" . date('ymd');

	 $train_live_status_api = 'http://api.railwayapi.com/live/train/' . $train_num . '/doj/' . $doj . '/apikey/' . $apikey;
     $train_live_status_api_call = file_get_contents($train_live_status_api);
     $train_live_status_api_data = json_decode($train_live_status_api_call,true);

     return $train_live_status_api_data;
}

function train_number_to_name($train_num)
{
	$apikey = "fvatr8579";//railwayapi1@gmail.com
	
	$train_name_api = 'http://api.railwayapi.com/name_number/train/' . $train_num. '/apikey/' . $apikey ;
    $train_name_api_call = file_get_contents($train_name_api);
    $train_name_api_data = json_decode($train_name_api_call, true);	

    return $train_name_api_data;
}


?>








<?php
//-----------------------api keys----------------------------
	// $apikey = "uucxi9379";//satenderjpr@gmail.com
	// $apikey = "ttemb6830";//singhpalarashakti@gmail.com
	// $apikey = "ootzm7275";//satendersvnit@gmail.com

	// $apikey = "eumbm2216";//singhrathoresatender@gmail.com

	// $apikey = "wqyoc1399"; //renurathorejpr@gmail.com
	//$apikey = "budyl6423";//yashagarwaljpr@gmail.com
	// $apikey = "zlzou2003";//satendersinghpalara@gmail.com
	// $apikey = "iyihg4653";//jagdishsinghrjpr@gmail.com

	// $apikey = "okogk2695";//theyashagarwal21@gmail.com


    //$apikey = "ccjee6917";//sagarkeshri26@gmail.com
    // $apikey = "dwmbs3983";//sagarkeshri@rocketmail.com
// $apikey = "fvatr8579";//railwayapi1@gmail.com
?>