<?php 

$apikey = "fvatr8579";//railwayapi1@gmail.com

function get_pnr_status($pnr)
{
	$apikey = "fvatr8579";//railwayapi1@gmail.com

	$pnr_status_api = "http://api.railwayapi.com/pnr_status/pnr/" . $pnr . "/apikey/" . $apikey ;
    $pnr_status_api_call = file_get_contents($pnr_status_api);
    $pnr_status_api_data= json_decode($pnr_status_api_call, true);
    return $pnr_status_api_data;
}

function trains_bw_station($source,$dest,$doj)
{
	$apikey = "fvatr8579";//railwayapi1@gmail.com

	$trains_bw_stations_api = "http://api.railwayapi.com/between/source/" . $source . "/dest/" . $destination . "/date/" . $doj . "/apikey/" . $apikey ;
    $trains_bw_stations_api_call = file_get_contents($trains_bw_stations_api);
    $trains_bw_stations_api_data = json_decode($trains_bw_stations_api_call, true);

    return $trains_bw_stations_api_data;
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