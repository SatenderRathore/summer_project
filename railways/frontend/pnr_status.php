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
