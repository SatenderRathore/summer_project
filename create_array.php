<?php
$train_numbers = array();
$file = fopen('trains.txt', 'r');
for ($i=0; $i < 4371; $i++)
{ 
	$line = fgets($file);
	$train_num = substr($line, 0,5);
	array_push($train_numbers, $train_num);
}
print_r($train_numbers);
// while(! feof($file))
//   {
//   echo fgets($file). "<br />";
//   }


fclose($file);
?>