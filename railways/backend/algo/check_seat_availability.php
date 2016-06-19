<?php

echo '<head>';
echo '<link rel="stylesheet" type="text/css" href="../../css/check_seat_availability.css">';
echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>';

//echo '<script src="../../js/test.js"></script>';
echo '</head>';
echo '<body>';
include('db.php');

    //$apikey = "uucxi9379";//satenderjpr@gmail.com
//$apikey = "ttemb6830";//singhpalarashakti@gmail.com
//$apikey = "ootzm7275";//satendersvnit@gmail.com
//$apikey = "eumbm2216";//singhrathoresatender@gmail.com
//$apikey = "wqyoc1399"; //renurathorejpr@gmail.com
//$apikey = "budyl6423";//yashagarwaljpr@gmail.com
//$apikey = "zlzou2003";//satendersinghpalara@gmail.com
//$apikey = "iyihg4653";//jagdishsinghrjpr@gmail.com
$apikey = "okogk2695";//theyashagarwal21@gmail.com
    // $apikey = "ccjee6917";//sagarkeshri26@gmail.com
    // $apikey = "dwmbs3983";//sagarkeshri@rocketmail.com

    $source = $_POST['source'];
    $destination = $_POST['destination'];
    $doj = $_POST['doj'];
    $user_class = $_POST['class'];
    $user_quota = $_POST['quota'];



/////////////////////function for default class/////////////////
    function default_class($classes)
    {
        foreach ($classes as $class)
        {
            if($class['available'] == "Y")
            {
                $default_class = $class['class-code'];
                break;
            }
        }
        return $default_class;
    }
///////////////////////////////////////////////////////////
    //print_r($source);
    // print_r($destination);
    // print_r($doj);
    //print_r($user_class);
    // print_r($quota);

    //http://api.railwayapi.com/between/source/jp/dest/st/date/15-07-2016/apikey/uucxi9379/
    $trains_bw_stations_api = "http://api.railwayapi.com/between/source/" . $source . "/dest/" . $destination . "/date/" . $doj . "/apikey/" . $apikey ;
    $trains_bw_stations_api_call = file_get_contents($trains_bw_stations_api);
    $trains_bw_stations_api_data = json_decode($trains_bw_stations_api_call, true);


    if($trains_bw_stations_api_data['response_code'] != '200')
    {
?>
        <script>alert("some error occured");//redirect to some page</script>
<?php
    }
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

    session_start();
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

///////////////////if user select all class then default class will be given///////////////
        if($user_class == "ALL")
        {
            $user_class = default_class($class);
        }

        //print_r($class);

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
        echo '</p>';

//        echo '<p>' . $days_of_run .'</p>';
        echo '<p class=">' . $departure_time .'</p>';
        echo '<p>' . $arrival_time .'</p>';
        echo '<p>' . $travel_time .'</p>';
        echo '<p>' . $source['code'] .'</p>';
        echo '<p>' . $destination['code'] .'</p>';
//        echo '<p>' . $class .'</p>';
        echo '<p class="available">';

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
        echo '</p>';


        $loading_id = "loading" . $i;
        echo '<div class="button" onclick="loadDoc(\'' . $train_num . '\'' . ',' . '\'' . $source['code'] . '\'' . ',' . '\'' . $destination['code'] . '\'' . ',' . '\'' . $doj . '\'' . ',' . '\'' . $user_class . '\'' . ',' . '\'' . $user_quota . '\'' . ',' . '\'' . $i . '\''. ')">Check Status</div>';
        echo '<div id="'.$loading_id.'" class="loading" style="display:none;"></div>';
        echo '<div id="'.$i.'"><h2></h2></div>';
        /////////////////code for alternet options
        //session_start();
        $_SESSION['train_num'] = $train_num;
        $_SESSION['from_station'] = $source;
        $_SESSION['to_station'] = $destination;
        $_SESSION['doj'] = $doj;
        $_SESSION['class'] = $user_class;
        //echo "hello";
        //print_r($_SESSION['train_num']);

        echo '<div><h2><a href = "check_alternet.php">link</a></h2></div>';

        /////////////////
        echo '</ul>';

        echo '</div>';


    }
echo '</div>';
echo '</body>';

?>

<script>
function loadDoc(train_num,source,destination,doj,user_class,quota,id) {
    var loading = $('#loading' + id);
    loading.show();
    $.ajax( {
        async: true,
        url: "test.php?train_num=" + train_num + "&source=" + source + "&destination=" + destination + "&doj=" + doj + "&user_class=" + user_class + "&quota=" + quota,
        type: "GET",
        dataType: "html",
        success:function(data){
            loading.hide();
            $('#' + id).text(data);
        }
    });
}
//    "use strict";
//  var xhttp = new XMLHttpRequest();
////var loading = document.getElementById("loading");
////    loading.style.display = 'inline-block';
//  xhttp.onreadystatechange = function() {
//    if (xhttp.readyState == 4 && xhttp.status == 200) {
////        loading.style.display = 'none';
//      document.getElementById(id).innerHTML = xhttp.responseText;
//    }
//  };
//      xhttp.open("GET", "test.php?train_num=" + train_num + "&source=" + source + "&destination=" + destination + "&doj=" + doj + "&user_class=" + user_class + "&quota=" + quota, true);
//      xhttp.send();
</script>-

