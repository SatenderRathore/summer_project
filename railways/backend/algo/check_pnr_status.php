<?php

    include("db.php");
    $pnr = $_POST['pnr'];
    ////$pnr = "2418566933";
//    $apikey = "uucxi9379";//satenderjpr@gmail.com
    $apikey = "ttemb6830";//singhpalarashakti@gmail.com
    //$apikey = "ootzm7275";//satendersvnit@gmail.com
    //$apikey = "eumbm2216";//singhrathoresatender@gmail.com
    //$apikey = "wqyoc1399"; //renurathorejpr@gmail.com
    //$apikey = "budyl6423";//yashagarwaljpr@gmail.com
    //$apikey = "zlzou2003";//satendersinghpalara@gmail.com
    //$apikey = "iyihg4653";//jagdishsinghrjpr@gmail.com
    $pnr_status_api = "http://api.railwayapi.com/pnr_status/pnr/" . $pnr . "/apikey/" . $apikey ;
    $pnr_status_api_call = file_get_contents($pnr_status_api);

    $pnr_status_api_data= json_decode($pnr_status_api_call, true);

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
