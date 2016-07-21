<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>PNR-STATUS</title>
        <script src="../js/jquery-2.1.1.js"></script>
        <script src="../js/bootstrap.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>  

        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/new_seat_availability_result.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

        <!--datepicker-->
        <link href="../datepicker/dist/css/datepicker.min.css" rel="stylesheet" type="text/css">
		<script src="../datepicker/dist/js/datepicker.min.js"></script>	
		<script src="../datepicker/dist/js/i18n/datepicker.en.js"></script>

		<script>
			// Initialization
			//$('#date').datepicker([options])
			// Access instance of plugin
			$('#date').data('datepicker')

		</script>
        <!--  -->
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
                        <li><a href="index.php">PNR STATUS</a></li>
                        <li>FAIR ENQUIRY</li>
                        <li><a href="./seat_availability.php">SEAT AVAILABILITY</a></li>
                        <li><a href="train_live_status.php">LIVE TRAIN STATUS</a></li>
                        <li>CANCELLED TRAINS</li>
                    </ul>

				</div>
			</div>
		</div>
		<div class="contain">
			<form id="availability" action="#" class="search" method="POST">
				<table class="table table-bordered">
					<thead>
						<tr>
							<td style="padding:20px 18px; border:none; width:15%;margin-bottom:10px;">
								<div class="heading">FROM</div>
								<input class="" id="src" name="source" type="text" required>
							</td>

							<td style="padding-top:45px; border:none; width:1%;">
								<div class="swap" onclick="swap();">
									
								</div>
							</td>

							<td style="padding:20px 18px; border:none; width:15%;">
								<div class="heading">TO</div>
								<input class="" id="dest" type="text" required>
							</td>

							<td style="padding:20px 18px; border:none; width:15%;">
								<div class="heading">CLASS</div>
								<select class="drop-down" name="class" id='travel_class' >
	                                <option value=ALL  selected  >All Classes</option>
	                                <option value=1A  >First AC</option>
	                                <option value=2A  >Second AC</option>
	                                <option value=3A  >Third AC</option>
	                                <option value=FC  >First Class</option>
	                                <option value=3E  >Third Economy</option>
	                                <option value=SL  >Sleeper</option>
	                                <option value=CC  >Chair Car</option>
	                                <option value=2S  >Second Seater</option>
	                            </select>
							</td>
							<td style="padding:20px 18px; border:none; width:15%;">
								<div class="heading">DATE</div>
								<input id="date" type="text"  class="datepicker-here" data-language='en'>
								<script>
									$('#date').datepicker({
										language: 'en',
										minDate: new Date()
										//maxDate: minDate.getDate()+120
									})
								</script>
							</td>
							<td style="padding:20px 18px; border:none; width:15%;">
								<div class="heading">QUOTA</div>
								<select class="drop-down" name="quota" id='quotadesc'>
                                    <option value=GN >General</option>
                                    <option value=CK >Tatkal</option>
                                    <option value=LD >Ladies</option>
                                    <option value=PT >Premium Tatkal</option>
                                    <option value=DF >Defence</option>
                                    <option value=FT >Foreign Tourist</option>
                                    <option value=SS >Lower Berth</option>
                                    <option value=YU >Yuva</option>
                                    <option value=DP >Duty Pass</option>
                                    <option value=HP >Handicaped</option>
                                    <option value=PH >Parliament House</option>
                                </select>
							</td>
							<td style="padding:20px 18px; border:none; width:15%;">
								<button id="search_train_button" name = "submit" class="submit" type="submit">SEARCH</button>
								<button id="search_train_button" value="reset" class="clear" type="reset">CLEAR</button>
							</td>

						</tr>
					</thead>
				</table>
			</form>
			
			<div class="summary">
			</div>

			<div class="result">
				<table class="table table-hover tab" id="trains_list">
					<thead>
						<tr>
							<th class="col-md-2">Train Details</th>
							<th class="col-md-1">Departure</th>
							<th class="col-md-1">Arrival</th>
							<th class="col-md-1">Duration</th>
							<th class="col-md-2">Days Of Run</th>
							<th class="col-md-1">Classes</th>
							<th class="col-md-2">Current Status</th>
							<th class="col-md-2">SeatJugaad Status</th>
							<th class="col-md-1">Alternates</th>
						</tr>
					</thead>

				</table>


			</div>

		</div>
	






	</body>
	<script src="../js/new_seat_availability_result.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
</html>

<!-- php code starts here -->

<?php
    $json = file_get_contents('station_list.json');
    $data = json_decode($json,true);
    $new = array();
    for($i=0;$i<count($data);$i++)
    {
        array_push($new, strtoupper($data[$i]['station'] . " - " . $data[$i]['station_code']));
    }
?>

<script>
    <?php
    $js_array = json_encode($new);
    ?>
    $(function() {
    $( "#src, #dest" ).autocomplete({
        source: <?php echo $js_array ?>,
            minLength: 3
        });
    });
</script>