<?php

echo '<head>';
echo '<link rel="stylesheet" type="text/css" href="../../css/check_seat_availability.css">';
echo '</head>';
echo '<body>';
include('db.php');

//    $apikey = "uucxi9379";//satenderjpr@gmail.com
$apikey = "ttemb6830";//singhpalarashakti@gmail.com
//$apikey = "ootzm7275";//satendersvnit@gmail.com
//$apikey = "eumbm2216";//singhrathoresatender@gmail.com
//$apikey = "wqyoc1399"; //renurathorejpr@gmail.com
//$apikey = "budyl6423";//yashagarwaljpr@gmail.com
//$apikey = "zlzou2003";//satendersinghpalara@gmail.com
//$apikey = "iyihg4653";//jagdishsinghrjpr@gmail.com

    $source = $_POST['source'];
    $destination = $_POST['destination'];
    $doj = $_POST['doj'];
    $class = $_POST['class'];
    $quota = $_POST['quota'];

    //print_r($source);
    // print_r($destination);
    // print_r($doj);
    // print_r($class);
    // print_r($quota);

    //http://api.railwayapi.com/between/source/jp/dest/st/date/15-07-2016/apikey/uucxi9379/
    $trains_bw_stations_api = "http://api.railwayapi.com/between/source/" . $source . "/dest/" . $destination . "/date/" . $doj . "/apikey/" . $apikey ;
    $trains_bw_stations_api_call = file_get_contents($trains_bw_stations_api);
    $trains_bw_stations_api_data = json_decode($trains_bw_stations_api_call, true);
    //print_r($trains_bw_stations_api_data['train'][0]['name']);

    $all_trains = array();
    $trains = $trains_bw_stations_api_data['train'];

    foreach ($trains as $train_details)
    {
        array_push($all_trains, $train_details);
    }
    //print_r("all_trains:\n");
    //print_r($all_trains);
    //print_r($trains[0]['name']);
    //print_r($trains[0]['days'][0]['runs']);
    //print_r(count($all_trains));
//print_r($trains_bw_stations_api_data['train'][0]['classes']);
echo '<div class="container">';
    for($i = 0; $i < count($all_trains); $i++)
    {
        
        $train_name = $all_trains[$i]['name'];
        $train_num = $all_trains[$i]['number'];
        $days_of_run = $all_trains[$i]['days'];
        $departure_time = $all_trains[$i]['src_departure_time'];
        $arrival_time = $all_trains[$i]['dest_arrival_time'];
        $travel_time = $all_trains[$i]['travel_time'];
        $source = $all_trains[$i]['from'];
        $destination =$all_trains[$i]['to'];
        $class = $all_trains[$i]['classes'];
        
        echo '<div class="details">';
        echo '<p><strong>Train Name:</strong> ' . $train_name .' ('.$train_num.')'.'</p>';
        echo '<p><strong>Days of Run:</strong></p>';
        echo '<ul>';
        foreach($days_of_run as $days) {
            if($days['runs'] === 'Y') {
                echo '<li class="available"><strong>'.$days['day-code'].' </strong></li>';
            }
            else {
                echo '<li class="not-available">'.$days['day-code'].' </li>';
            }
        }
        echo '</ul>';
                
        echo '<p><strong>Arrival Time:</strong> ' . $departure_time .'</p>';
        echo '<p><strong>Departure Time:</strong> ' . $arrival_time .'</p>';
        echo '<p><strong>Travel Time:</strong> ' . $travel_time .' Hr</p>';
        echo '<p><strong>Source Station:</strong> ' . $source['code'] .'</p>';
        echo '<p><strong>Destination Station:</strong> ' . $destination['code'] .'</p>';
        
        echo '<p><strong>Available Classes:</strong></p>';
        echo '<ul>';
        foreach($class as $code) {
            if($code['available'] == 'Y') {
                echo '<li class="available"><strong>'.$code['class-code'].' '.'</strong></li>';
            }
            else {
                echo '<li class="not-available">'.$code['class-code'].' '.'</li>';
            }
        }
        echo '</ul>';
        echo '</div>';
    }
echo '</div>';
echo '</body>';
?>