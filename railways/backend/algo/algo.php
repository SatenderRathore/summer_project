<?php

include("db.php");

$pnr = $_POST['pnr'];
////$pnr = "2418566933";
//$apikey = "uucxi9379";//satenderjpr@gmail.com
//$apikey = "ttemb6830";//singhpalarashakti@gmail.com
//$apikey = "ootzm7275";//satendersvnit@gmail.com
// $apikey = "eumbm2216";//singhrathoresatender@gmail.com
//$apikey = "wqyoc1399"; //renurathorejpr@gmail.com
$apikey = "budyl6423";//yashagarwaljpr@gmail.com
//$apikey = "zlzou2003";//satendersinghpalara@gmail.com
//$apikey = "iyihg4653";//jagdishsinghrjpr@gmail.com
// $apikey = "okogk2695";//theyashagarwal21@gmail.com
/////////////////////////to check pnr status/////////////////////////////

$pnr_status_api = "http://api.railwayapi.com/pnr_status/pnr/" . $pnr . "/apikey/" . $apikey ;
$pnr_status_api_call = file_get_contents($pnr_status_api);

$pnr_status_api_data= json_decode($pnr_status_api_call, true);

$from_station = $pnr_status_api_data['boarding_point'];
$to_station = $pnr_status_api_data['to_station'];
$train_num = $pnr_status_api_data['train_num'];
$doj = $pnr_status_api_data['doj'];
$class = $pnr_status_api_data['class'];

$current_status = $pnr_status_api_data['passengers'][0]['current_status'];


if($current_status == 'CNF')
{
    session_start();
    $_SESSION["from_station"]     = $pnr_status_api_data['from_station'];
    $_SESSION["boarding_point"]   = $pnr_status_api_data['boarding_point'];
    $_SESSION["to_station"]       = $pnr_status_api_data['reservation_upto'];
    $_SESSION["booking_status"]   = $pnr_status_api_data['passengers'][0]['booking_status'];
    $_SESSION["coach_position"]   = $pnr_status_api_data['passengers'][0]['coach_position'];
    $_SESSION["current_status"]   = $pnr_status_api_data['passengers'][0]['current_status'];
    $_SESSION['class']            = $pnr_status_api_data['class'];
    $_SESSION['doj']              = $pnr_status_api_data['doj'];
    $_SESSION['total_passengers'] = $pnr_status_api_data['total_passengers'];
    $_SESSION['train_name']       = $pnr_status_api_data['train_name'];
    $_SESSION['train_num']        = $pnr_status_api_data['train_num'];
    $_SESSION['chart_prepared']   = $pnr_status_api_data['chart_prepared'];
    $_SESSION['train_start_date'] = $pnr_status_api_data['train_start_date'];
    $_SESSION['pnr']              = $pnr_status_api_data['pnr'];

    header("Location:../../frontend/pnr_status.php");
}

/////////////////////////////////////////////////
//$train_num = "12955";
///////////////////to check root of train //////////////////////////////
else
{
    $train_route_api = "http://api.railwayapi.com/route/train/" . $train_num . "/apikey/" . $apikey ;
    $train_route_api_call = file_get_contents("$train_route_api");
    $train_route_api_data = json_decode($train_route_api_call,true);
    $stations = $train_route_api_data['route'];
    /////////////////////////////////////////////////////////////////////////
    //echo $stations ;
                 //roots of train will be stored in $station_codes array for further use
    $station_codes = array();
    foreach($stations as $code)
    {
        //echo $code['code'];
        array_push($station_codes, $code['code']);
    }
    /////////////////function to find index of particular station stored in $station_codes array/////////////////////
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
    //print_r($station_codes);
    $source_index = index_of($from_station['code'],$station_codes);
    $dest_index = index_of($to_station['code'],$station_codes);
    //$source_index = "4";///////manual index
    //$dest_index = "18";

    //////////////////////////////////////////////////////////////////////////////main algo starts
    //for($i=$source_index;$i<=$dest_index; )
    $i = $source_index;
    $j = $source_index + 1 ;
    $avail_source = array();
    $avail_dest = array();
    //$avail_src = $station_codes[$i];
    //$avail_dest = $station_codes[$j];
    //$doj = "13-06-2016";////////manual doj and class to check the algorithm
    //$class = "3A";
    $k = 0;
    while($j<=$dest_index)
    {
        $var_source_code = $station_codes[$i];
        $var_dest_code = $station_codes[$j];

        //$check_seat_api = "http://api.railwayapi.com/check_seat/train/12980/source/" . $var_source_code . "/dest/" . $var_dest_code . "/date/13-06-2014/class/SL/quota/GN/apikey/" . $apikey;
        $check_seat_api = "http://api.railwayapi.com/check_seat/train/" . $train_num . "/source/" . $var_source_code . "/dest/" . $var_dest_code . "/date/" . $doj . "/class/" . $class . "/quota/GN/apikey/" . $apikey ;
        $check_seat_api_call = file_get_contents($check_seat_api);
        $check_seat_api_data = json_decode($check_seat_api_call, true);

        //echo "hello" . '<br>';
        //print_r($check_seat_api_data);

        if($check_seat_api_data['response_code'] == "200")
        {
            $status = $check_seat_api_data['availability'][0]['status'];
        }
        // else
        // {
        //     continue;
        // }
        //echo "status " . '<br>' ;
        //print_r($status);

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
            //$j = $j-1;
            if($check_seat_api_data['response_code'] == "200" && $i != $j - 1)
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
            //$j = $j + 1 ;
            //break;


        }
        // echo "i = ";
        //     print_r($i);
        //     echo "<br>";
        //     echo "j = ";
        //     print_r($j);
        //     echo "<br>";

    }
    //print_r($avail_source);
    //echo "hello" ;
    //print_r($avail_dest);
    for ($k = 0; $k < count($avail_source); $k++)
    {
        echo $avail_source[$k];
        echo " to ";
        echo $avail_dest[$k];
        echo '<br>';
    }

    // function seat_avail($train_num,$source,$dest,$doj,$class)
    // {//http://api.railwayapi.com/check_seat/train/12001/source/BPL/dest/NDLS/date/14-10-2014/class/CC/quota/GN/apikey/myapikey/
    //     $check_seat_api = "http://api.reilwayapi.com/check_seat/train/" . $train_num . "/source/" . $source . "/dest/" . $dest . "/date/" . $doj . "/class/" . $class . "/qouta/GN/apikey/" . $apikey ;
    //     $check_seat_api_call = file_get_contents($check_seat_api);
    //     $check_seat_api_data = json_decode($check_seat_api_call, true);

    // }

}
    ?>






















































































































































































































































