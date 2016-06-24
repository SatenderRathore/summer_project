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
// $train_num = 12980;
echo count($passengers);
// $current_status   = "W/L";

// print_r($from_station['code']);
// print_r($to_station['code']);
?>


<!-- <html>
    <head>
        <script type="text/javascript">
            current_status = "<?php //echo $current_status; ?>";
        </script>

    </head>
    <body>

    <a id="button" href="../backend/algo/check_alternet.php">Show Alternate</a>

    <script type="text/javascript" src="../js/script.js"></script>
    </body>

</html>
 -->



<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>PNR-STATUS</title>

        <script src="../js/jquery-2.1.1.js"></script>
        <script src="../js/bootstrap.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/pnr_status.css">

	</head>
	<body>
		<div class="top">
			<div class="main-header">
				<div class="left-head col-md-2">
	                <div class="logo">
	                    <a href="#">Seat Jugaad</a>
	                </div>
				</div>
				<div class="mid-head col-md-8">
					<ul class="features">
                        <li>PNR STATUS</li>
                        <li>FAIR ENQUIRY</li>
                        <li>SEAT AVAILABILITY</li>
                        <li>LIVE TRAIN STATUS</li>
                        <li>CANCELLED TRAINS</li>
                    </ul>

				</div>
			</div>
		</div>
		<div class="container">
			<div class="content">
				<div class="mid-heading">
					<img src="../images/seat.png">
					<div id="heading-content" class="col-md-2">Journey Details</div>
				</div>

				<table class="table table-bordered tab" id="pnr_detail">
					<tr>
						<th class="col-md-1">Train No</th>
						<th class="col-md-3">Train Name</th>
						<th class="col-md-2">Boarding Date</th>
						<th class="col-md-1">From</th>
						<th class="col-md-1">To</th>
						<th class="col-md-2">Reserved Upto</th>
						<th class="col-md-2">Boading Point</th>
						<th class="col-md-1">Class</th>
					</tr>

				</table>

				<div class="passenger-list">
					<div class="mid-heading">
						<img src="../images/passenger.png">
						<div id="heading-content" class="col-md-4">Passenger List</div>
					</div>
					<table id="passengers" class="table table-hover tab" >
						<thead>
							<tr class="display">
								<th class="col-md-1">#</th>
								<th class="col-md-2">Booking Status</th>
								<th class="col-md-2">Current Status</th>
								<th class="col-md-2">SeatJugaad Status</th>
							</tr>
						</thead>
					</table>
				</div>
			    <div class="notify">
					<input type="email" class="mail" id="email" placeholder="Email Address">
					<button type="submit" class="btn btn-default confirm-mail" onclick="sendmail()">Notify On Confirm</button>
				</div>
			</div>

		</div>
	</body>
    <!-- // <script src="../js/pnrstatus.js"></script> -->
</html>




<script>
	function update_passenger_list(){
	var table = document.getElementById("passengers");
	var srno=[1,2,3,4];
	var totalPassengers = '<?php echo count($passengers)?>'
	var seatjugaad_status=[4,5,6,7];
	<?php $i = 0;?>

	for(var i=0;i<totalPassengers;i++)
	{
		var row=table.insertRow(i+1);
		var cell1=row.insertCell(0);
		var cell2=row.insertCell(1);
		var cell3=row.insertCell(2);
		var cell4=row.insertCell(3);
		cell1.innerHTML=i+1;
		cell2.innerHTML='<?php echo $passengers[$i]['booking_status'] ?>';
		cell3.innerHTML='<?php echo $passengers[$i]['current_status'] ?>';
		cell4.innerHTML=seatjugaad_status[i];
		console.log(cell1.innerHTML);
		<?php $i++;?>
	}
}

update_passenger_list();

function update_pnr_details(){
	var table = document.getElementById("pnr_detail");
	// var train_num=19482;
	var train_num = '<?php echo $train_num ?>';
	var train_name='<?php echo $train_name ?>';
	var boarding_date='<?php echo $doj ?>';
	var from='<?php echo $from_station['name'] . ' ( ' . $from_station['code'] . ' )' ?>';
	var to='<?php echo $to_station['name'] . ' ( '. $to_station['code'] . ' )'?>';
	var reserved_upto='<?php echo $reservation_upto['name'] . ' ( ' . $reservation_upto['code'].' )' ?>';
	var boarding_point='<?php echo $boarding_point['name'] . ' ( ' . $boarding_point['code']. ' )' ?>';
	var clas='<?php echo $class ?>';
	var row=table.insertRow(1);
	var cell1=row.insertCell(0);
	var cell2=row.insertCell(1);
	var cell3=row.insertCell(2);
	var cell4=row.insertCell(3);
	var cell5=row.insertCell(4);
	var cell6=row.insertCell(5);
	var cell7=row.insertCell(6);
	var cell8=row.insertCell(7);
	cell1.innerHTML=train_num;
	cell2.innerHTML=train_name;
	cell3.innerHTML=boarding_date;
	cell4.innerHTML=from;
	cell5.innerHTML=to;
	cell6.innerHTML=reserved_upto;
	cell7.innerHTML=boarding_point;
	cell8.innerHTML=clas;

}
update_pnr_details();





</script>