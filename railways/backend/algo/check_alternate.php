<?php
// $string = "NOT AVAILABLE 18";
// $pos = strpos($string, 'AVAILABLE');
// print_r($pos);
// printf("%d",$pos);
// if($pos == 4)
// {
//     print_r("hello");

// }
// else
// {
//     print_r("hello world");
// }


// print_r($string);
// print_r(strlen($string));
// $string = substr($string, 0,9);
// print_r($string);
// print_r(strlen($string));
// strpos($status, 'AVAILABLE');
    include("db.php");
    include("function.php");
    // session_start();
     
//-------------------------------------------------------------
     // $train_num = $_REQUEST['train_num'];
     // $from_station_code = $_REQUEST['source'];
     // $to_station_code = $_REQUEST['destination'];
     // $doj = $_REQUEST['doj'];
     // $class = $_REQUEST['user_class'];
     $train_num = '12956';
     $from_station_code = 'JP';
     $to_station_code = 'ST';
     $doj = '27-10-2016';
     $class = "SL";
     $quota = "GN";


//--------------------------------------------------------------
     $api_key_flag = 0;

     while(1)
     {
        $train_route_api_data = train_route($train_num);
        $response_code = $train_route_api_data['response_code'];
        if($response_code == 403)
        {
            $api_key_flag = 1;
            break;
        }
        if($response_code == 200)
        {
            break;
        }
     }

     if($api_key_flag == 1)
     {
        // print_r("change api key");
        die("change api key");
     }
     

     $stations = $train_route_api_data['route'];//all the stations for train

     $station_codes = array();
//--------function to store all station codes into an array------------------
     foreach($stations as $station)
     {
        array_push($station_codes, $station['code']);
     }
//-------------------function to find index of particular station stored in $station_codes array-------
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
//-------------------------------------------------------------------------------------------------------

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

        while(1)
        {
            $api_key_flag = 0;

            $check_seat_api_data = seat_availability($train_num,$var_source_code,$var_dest_code,$doj,$class,$quota);
            $response_code = $check_seat_api_data['response_code'];

            if($response_code == 403)
            {
                $api_key_flag = 1;
                break;
            }
            if($response_code == 200)
            {
                break;
            }
        }
        if($api_key_flag == 1)
        {
            // break;
            die("change api key");
        }
        

        // if($response_code == "200")//if everything went fine
        // {
            $status = $check_seat_api_data['availability'][0]['status'];
            $pos = strpos($status,'AVAILABLE');//for abailable and not available
            $rac = strpos($status, 'RAC');
            if($pos == 0 || $pos == 4 || $rac == 0)
            {
                if($j == $dest_index )
                {
                    if($pos == 0 || $rav == 0)
                    {
                        array_push($avail_source, $station_codes[$i]);
                        array_push($avail_dest, $station_codes[$j]);
                    }
                    break;
                }

                $j = $j + 1 ;

            }
            else
            {
                if($i != $j - 1)
                {
                    array_push($avail_source, $station_codes[$i]);
                    array_push($avail_dest, $station_codes[$j-1]);
                }

                if($k == $j)
                {
                    $j = $j +1;
                }
                if($i == $source_index && $j == $i+1)
                {
                    $i = $j;
                    $j = $j + 1;
                    continue;
                }
                $i = $j - 1 ;
                $k = $j;
            }

        // }



    }

    if($api_key_flag == 1)
    {   
        // print_r("change api key");
        // die("change api key");
    }


    if(sizeof($avail_source) == 0)
    {
        print_r("no alternate found");
    }
    for ($k = 0; $k < count($avail_source); $k++)
    {
        echo "hello";
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