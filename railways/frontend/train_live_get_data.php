<?php
include("db.php");
// echo "hello ";
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
                    <span class="trainno">12345</span>
                    <select id="selectday" class="selectday" onchange="dayofstart"();>
                        <option value="0">2 days ago</option>
                        <option value="1">Yesterday</option>
                        <option value="2">Today</option>
                    </select>
                </div>
                <div class="trainname">Seat Jugaad Express</div>
                <div class="sourcedest">Surat → Jaipur Jn</div>
                <div class="traindesc">24 Stations,1057 kms,16h 24m</div>

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