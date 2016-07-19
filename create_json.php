<?php 

    // $apikey = "sajnq6002";//renurjpr@gmail.com
    // $apikey = "yjfne2878";//jyopalara@gmail.com
     // $apikey = "hbfmx5628";//satenderjpr@gmail.com
     // $apikey = "ttemb6830";//singhpalarashakti@gmail.com
     // $apikey = "ootzm7275";//satendersvnit@gmail.com
     // $apikey = "eumbm2216";//singhrathoresatender@gmail.com
     // $apikey = "wqyoc1399"; //renurathorejpr@gmail.com
     // $apikey = "budyl6423";//yashagarwaljpr@gmail.com
     // $apikey = "zlzou2003";//satendersinghpalara@gmail.com
     // $apikey = "iyihg4653";//jagdishsinghrjpr@gmail.com
     // $apikey = "iyihg4653";//theyashagarwal21@gmail.com
     // $apikey = "ccjee6917";//sagarkeshri26@gmail.com
     // $apikey = "dwmbs3983";//sagarkeshri@rocketmail.com
// Array ( [0] => 12723 [1] => 22416 [2] => 12724 [3] => 12707 [4] => 15909 [5] => 15609 [6] => 18242 [7] => 11266 [8] => 58702 [9] => 54703 [10] => 07509 [11] => 09416 [12] => 09427 [13] => 09018 [14] => 14804 [15] => 04804 [16] => 09421 [17] => 19130 [18] => 02713 [19] => 19420 [20] => 09417 [21] => 12931 [22] => 12267 [23] => 12298 [24] => 09425 [25] => 19223 [26] => 02207 [27] => 19606 [28] => 09407 [29] => 09413 [30] => 09420 [31] => 09411 [32] => 09409 [33] => 12844 [34] => 18406 [35] => 07017 [36] => 12958 [37] => 19415 [38] => 19944 [39] => 19407 [40] => 16501 [41] => 12547 [42] => 12195 [43] => 09612 [44] => 12036 [45] => 15055 [46] => 12954 [47] => 12320 [48] => 13168 [49] => 01436 [50] => 12342 [51] => 12341 [52] => 12548 [53] => 52575 [54] => 15696 [55] => 22646 [56] => 22645 [57] => 16326 [58] => 11096 [59] => 11095 [60] => 16502 [61] => 59440 [62] => 59439 [63] => 19405 [64] => 09419 [65] => 11050 [66] => 59441 [67] => 59442 [68] => 09649 [69] => 12196 [70] => 05712 [71] => 22996 [72] => 09611 [73] => 09619 [74] => 09602 [75] => 09601 [76] => 13424 [77] => 05286 [78] => 12983 [79] => 05104 [80] => 05238 [81] => 12990 [82] => 09627 [83] => 04042 [84] => 18208 [85] => 19609 [86] => 09640 [87]);
//http://api.railwayapi.com/name_number/train/00118/apikey/ttemb6830/


$train_numbers = array();
$file = fopen('dynamic.txt', 'r');
for ($i=0; $i < 97; $i++)
{ 
	$line = fgets($file);
	$train_numb = substr($line, 0,5);
	array_push($train_numbers, $train_numb);
}
// print_r($train_numbers);
fclose($file);

      for($i=0;$i<98;$i++)
      {
    	// $train_num = '12956';
    	$train_num = $train_numbers[$i];
		$train_name_api = 'http://api.railwayapi.com/name_number/train/' . $train_num . '/apikey/' . $apikey;
		$train_name_api_call = file_get_contents($train_name_api);
    	$train_name_api_data = json_decode($train_name_api_call,true);

    	$train_num = $train_name_api_data['train']['number'];
    	$train_name = $train_name_api_data['train']['name'];
		$data_to_append = '{' . '"train_number":"' . $train_num . '","train_name":"' . $train_name . '"},';
		print_r($data_to_append);

		file_put_contents('train.php', $data_to_append . PHP_EOL, FILE_APPEND);
	}
?>