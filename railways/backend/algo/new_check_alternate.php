<?php
    include("db.php");
    // session_start();
     // $apikey = "uucxi9379";//satenderjpr@gmail.com
     // $apikey = "ttemb6830";//singhpalarashakti@gmail.com
     //$apikey = "ootzm7275";//satendersvnit@gmail.com
     // $apikey = "eumbm2216";//singhrathoresatender@gmail.com
     // $apikey = "wqyoc1399"; //renurathorejpr@gmail.com
     // $apikey = "budyl6423";//yashagarwaljpr@gmail.com
     // $apikey = "zlzou2003";//satendersinghpalara@gmail.com
     $apikey = "iyihg4653";//jagdishsinghrjpr@gmail.com
     // $apikey = "okogk2695";//theyashagarwal21@gmail.com
     // $apikey = "ccjee6917";//sagarkeshri26@gmail.com
     // $apikey = "dwmbs3983";//sagarkeshri@rocketmail.com


     $train_num = $_REQUEST['train_num'];
     $from_station_code = $_REQUEST['from_station_code'];
     $to_station_code = $_REQUEST['to_station_code'];
     $doj = $_REQUEST['doj'];
     $class = $_REQUEST['class'];

     // $train_num =

     $train_route_api = "http://api.railwayapi.com/route/train/" . $train_num . "/apikey/" . $apikey ;
     $train_route_api_call = file_get_contents("$train_route_api");
     $train_route_api_data = json_decode($train_route_api_call,true);

     $stations = $train_route_api_data['route'];

     $station_codes = array();
     foreach($stations as $code)
     {
        array_push($station_codes, $code['code']);
     }
//     function to find index of particular station stored in $station_codes array/////////////////////
     function index_of($code,$station_codes)
     {
        $i = 0;
        foreach($station_codes as $value)
        {
            if($value == $code)
            {
                return $i ;
            }
            $i++;

        }
    }

     $source_index = index_of($from_station_code,$station_codes);
     $dest_index = index_of($to_station_code,$station_codes);

     $i = $source_index;
     $j = $source_index + 1 ;
    $avail_source = array();
    $avail_dest = array();

    $k = 0;
    while($j<=$dest_index)
    {
        $var_source_code = $station_codes[$i];
        $var_dest_code = $station_codes[$j];

        $check_seat_api = "http://api.railwayapi.com/check_seat/train/" . $train_num . "/source/" . $var_source_code . "/dest/" . $var_dest_code . "/date/" . $doj . "/class/" . $class . "/quota/GN/apikey/" . $apikey ;
        $check_seat_api_call = file_get_contents($check_seat_api);
        $check_seat_api_data = json_decode($check_seat_api_call, true);

        if($check_seat_api_data['response_code'] == "200")
        {
            $status = $check_seat_api_data['availability'][0]['status'];

            if(strpos($status, 'AVAILABLE') !== false)
            {
                if($j == $dest_index)
                {
                    array_push($avail_source, $station_codes[$i]);
                    array_push($avail_dest, $station_codes[$j]);
                }

                $j = $j + 1 ;

            }
            else
            {
                if($check_seat_api_data['response_code'] == "200" && $i != $j - 1)///////////remove 200 condition form this line
                {
                    array_push($avail_source, $station_codes[$i]);
                    array_push($avail_dest, $station_codes[$j-1]);
                }

                if($k == $j)
                {
                    $j = $j +1;
                }
                $i = $j - 1 ;
                $k = $j;
            }

        }



        }
    for ($k = 0; $k < count($avail_source); $k++)
    {
        echo $avail_source[$k];
        echo " to ";
        echo $avail_dest[$k];
        echo '<br>';
    }


// session_start();
// $_SESSION['avail_source'] = $avail_source;
// $_SESSION['avail_dest'] = $avail_dest;

// //header("Location:../../frontend/show_alternet.php");

?>