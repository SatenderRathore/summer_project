<?php
//echo"hello";
// include('db.php');
// print_r("hello");
// 

// $apikey = "uucxi9379";//satenderjpr@gmail.com
// $apikey = "ttemb6830";//singhpalarashakti@gmail.com
$apikey = "ootzm7275";//satendersvnit@gmail.com
//$apikey = "eumbm2216";//singhrathoresatender@gmail.com
//$apikey = "wqyoc1399"; //renurathorejpr@gmail.com
// $apikey = "budyl6423";//yashagarwaljpr@gmail.com
// $apikey = "zlzou2003";//satendersinghpalara@gmail.com
//$apikey = "iyihg4653";//jagdishsinghrjpr@gmail.com

 $apikey = "okogk2695";//theyashagarwal21@gmail.com
//$apikey = "ccjee6917";//sagarkeshri26@gmail.com
// $apikey = "dwmbs3983";//sagarkeshri@rocketmail.com

$train_num = $_REQUEST['train_num'];
$source_code = $_REQUEST['source'];
$dest_code = $_REQUEST['destination'];
$doj = $_REQUEST['doj'];
$class = $_REQUEST['user_class'];
$quota = $_REQUEST['quota'];

$current_status_api = "http://api.railwayapi.com/check_seat/train/" . $train_num . "/source/" . $source_code . "/dest/" . $dest_code . "/date/" . $doj . "/class/" . $class . "/quota/" . $quota . "/apikey/" . $apikey ;
$current_status_api_call = file_get_contents($current_status_api);
$current_status_api_data = json_decode($current_status_api_call, true);

$current_status = $current_status_api_data['availability'][0]['status'];
print_r($current_status);


//$q = $_GET['q'];
// print_r($train_num);
// print_r($source_code);
// print_r($destination);
// print_r($doj);
// print_r($user_class);
// print_r($quota);
// print_r($train_num);
?>