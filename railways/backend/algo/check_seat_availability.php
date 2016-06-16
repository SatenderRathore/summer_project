<?php
include('db.php');

    $source = $_POST['source'];
    $destination = $_POST['destination'];
    $doj = $_POST['doj'];
    $class = $_POST['class'];
    $quota = $_POST['quota'];

    print_r($source);
    print_r($destination);
    print_r($doj);
    print_r($class);
    print_r($quota);

    //http://api.railwayapi.com/between/source/jp/dest/st/date/15-07-2016/apikey/uucxi9379/
    $trains_bw_stations_api = "http://api.railwayapi.com/between/source/" . $source . "/dest/" . $destination . "/date/" . $doj . "/apikey/" . $apikey ;
    $trains_bw_stations_api_call = file_get_contents($trains_bw_stations_api);
    $trains_bw_stations_api_data = json_decode($trains_bw_stations_api_call, true);


?>