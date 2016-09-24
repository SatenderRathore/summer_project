<?php
	session_start();

	$full_source = strtoupper($_POST['source']);
    $full_destination = strtoupper($_POST['destination']);
    $doj = $_POST['doj'];
    $user_class = $_POST['class'];
    $user_class_copy = $user_class;
    $user_quota = $_POST['quota'];
    $source = station_code($full_source);
    $destination = station_code($full_destination);


    $_SESSION['full_source'] = $full_source;
    $_SESSION['full_destination'] = $full_destination;
    $_SESSION['source'] = $source;
    $_SESSION['destination'] = $destination;
    $_SESSION['doj'] = $doj;
    $_SESSION['user_class'] = $user_class;
    $_SESSION['user_class_copy'] = $user_class_copy;
    $_SESSION['user_quota'] = $user_quota;
    $_SESSION['source'] = $source;
    $_SESSION['destination'] = $destination;
// print_r($user_class);
// echo $_SESSION['source'];
    header('Location: ../../frontend/new_seat_availability_result.php');

function station_code($station_name)
{
    $json = file_get_contents('station_list.json');
    $data = json_decode($json, true);
    $new = array();
    for($i=0;$i<count($data);$i++)
    {
        array_push($new, strtoupper($data[$i]['station'] . " - " . $data[$i]['station_code']));
    }
    $count = 0;
    foreach ($new as $station)
    {
        if($station_name == $station)
        {
            break;
        }
        $count++;
    }
    return $data[$count]['station_code'];
}


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

?>