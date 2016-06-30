<?php
include("db.php");

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

     $doj = "20" . date('ymd');

     $train_live_status_api = 'http://api.railwayapi.com/live/train/' . $train_num . '/doj/' . $doj . '/apikey/' . $apikey;
     $train_live_status_api_call = file_get_contents($train_live_status_api);
     $train_live_status_api_data = json_decode($train_live_status_api_call,true);

     $start_station = $train_live_status_api_data['route'][0]['station_']['name'];
     $total_stations = 0;
     foreach ($train_live_status_api_data['route'] as $station)
     {
        $total_stations ++;
     }
     $end_station = $train_live_status_api_data['route'][$total_stations-1]['station_']['name'];

     $train_name_api = 'http://api.railwayapi.com/name_number/train/' . $train_num. '/apikey/' . $apikey ;
     $train_name_api_call = file_get_contents($train_name_api);
     $train_name_api_data = json_decode($train_name_api_call, true);

     $train_name = $train_live_status_api_data['name'];
     print_r($train_name);


?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/train_live_status.css">

</head>
<body>


<div class="traindetails" id="traindetail">
                <div class="toppart">
                    <span class="trainno"><?php echo $train_num?></span>
                    <select id="selectday" class="selectday" onchange="dayofstart"();>
                        <option value="0">2 days ago</option>
                        <option value="1">Yesterday</option>
                        <option value="2">Today</option>
                    </select>
                </div>
                <div class="trainname">Seat Jugaad Express</div>
                <div class="sourcedest"><?php echo $start_station ?> → <?php echo $end_station ?></div>
                <div class="traindesc"><?php echo $total_stations." Stations,1057 kms,16h 24m"?></div>

            </div>
            <div class="livestatus" id="livestatus" >
                <div class="currentsummary">
                    <img src="../images/train.png" style="opacity:0.5;">
                    <span class="currentposition">In between Vadodara and Surat</span>
                    <div class="currenttime">On Time</div>
                </div>
                <div class="runningstatus">
                    <div class="station">
                        <div class="metre"></div>
                        <div class="stationdetails" style="margin:10px 0 0 10px;">
                            <div class="station-name">BRC-Vadodara Jn</div>
                            <div class="desc">
                                <span class="status">Departed @ </span>
                                <span class="time">22:50 yesterday</span>
                            </div>

                        </div>

                    </div>
                    <div class="station">
                        <div class="metre"></div>
                        <div class="stationdetails">
                            <div class="station-name">BRC-Vadodara Jn</div>
                            <div class="desc">
                                <span class="status">Departed @ </span>
                                <span class="time">22:50 yesterday</span>
                            </div>

                        </div>

                    </div>
                    <div class="station">
                        <div class="metre"></div>
                        <div class="stationdetails">
                            <div class="station-name">BRC-Vadodara Jn</div>
                            <div class="desc">
                                <span class="status">Departed @ </span>
                                <span class="time">22:50 yesterday</span>
                            </div>

                        </div>

                    </div>
                    <div class="station">
                        <div class="metre"></div>
                        <div class="stationdetails">
                            <div class="station-name">BRC-Vadodara Jn</div>
                            <div class="desc">
                                <span class="status">Departed @ </span>
                                <span class="time">22:50 yesterday</span>
                            </div>

                        </div>

                    </div>
                    <div class="station">
                        <div class="metre"></div>
                        <div class="stationdetails">
                            <div class="station-name">BRC-Vadodara Jn</div>
                            <div class="desc">
                                <span class="status">Departed @ </span>
                                <span class="time">22:50 yesterday</span>
                            </div>

                        </div>

                    </div>
                    <div class="station">
                        <div class="metre"></div>
                        <div class="stationdetails">
                            <div class="station-name">BRC-Vadodara Jn</div>
                            <div class="desc">
                                <span class="status">Departed @ </span>
                                <span class="time">22:50 yesterday</span>
                            </div>

                        </div>

                    </div>
                    <div class="station" style="opacity:0.5;">
                        <div class="metre"></div>
                        <div class="stationdetails">
                            <div class="station-name">BRC-Vadodara Jn</div>
                            <div class="desc">
                                <span class="status">Departed @ </span>
                                <span class="time">22:50 yesterday</span>
                            </div>

                        </div>

                    </div>


                </div>
            </div>


</body>
</html>