<?php
include('db.php');
session_start();
$train_name       = $_SESSION['train_name'];
$chart_prepared   = $_SESSION['chart_prepared'];
$to_station       = $_SESSION["to_station"];
$passengers       = $_SESSION['passengers'];
$boarding_point   = $_SESSION["boarding_point"];
$pnr              = $_SESSION['pnr'];
$response_code    = $_SESSION['response_code'];
$train_start_date = $_SESSION['train_start_date'];
$total_passengers = $_SESSION['total_passengers'];
$train_num        = $_SESSION['train_num'];
$from_station     = $_SESSION["from_station"];
$class            = $_SESSION['class'];
$error            = $_SESSION['error'];
$doj              = $_SESSION['doj'];
$reservation_upto = $_SESSION['reservation_upto'];
$booking_status   = $_SESSION["booking_status"];
$coach_position   = $_SESSION["coach_position"];
$current_status   = $_SESSION["current_status"];
$current_status   = "W/L";

print_r($from_station['code']);
print_r($to_station['code']);
?>


<html>
    <head>
        <script type="text/javascript">
            current_status = "<?php echo $current_status; ?>";
        </script>

    </head>
    <body>
<div>
    <a id="button" href="../backend/algo/check_alternet.php">Show Alternate</a>
</div>
    <script type="text/javascript" src="../js/alternate.js"></script>
    </body>

</html>

<?php
print_r($from_station);
print_r($to_station);

print_r($current_status);
print_r($train_start_date);
?>






<?php
include("db.php");
include("../function.php");

$train_name       = $pnr_status_api_data['train_name'];
$chart_prepared   = $pnr_status_api_data['chart_prepared'];
$to_station       = $pnr_status_api_data['reservation_upto'];
$to_station_code  = $to_station['code'];
$passengers       = $pnr_status_api_data['passengers'];
$boarding_point   = $pnr_status_api_data['boarding_point'];
$pnr              = $pnr_status_api_data['pnr'];
$response_code    = $pnr_status_api_data['response_code'];
$train_start_date = $pnr_status_api_data['train_start_date'];
$total_passengers = $pnr_status_api_data['total_passengers'];
$train_num        = $pnr_status_api_data['train_num'];
$from_station     = $pnr_status_api_data['from_station'];
$from_station_code= $from_station['code'];
$class            = $pnr_status_api_data['class'];
$error            = $pnr_status_api_data['error'];
$doj              = $pnr_status_api_data['doj'];
$reservation_upto = $pnr_status_api_data['reservation_upto'];
$passengers[0]['current_status'] = "w/L";
?>



