<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Seat Availability</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://gregfranko.com/jquery.selectBoxIt.js/css/jquery.selectBoxIt.css" />
        <link rel="stylesheet" type="text/css" href="../css/seat_availability.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="../js/bootstrap.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

        <script>
          $(function() {
            $( "#datepicker" ).datepicker( {
                numberOfMonths: 2,
                showButtonPanel: true,
                dateFormat: 'dd-mm-yy'
            });
          });
        </script>
	</head>

	<body >
		<div class="top">
			<div class="main-header">
				<div class="left-head col-md-2">
                    <div class="logo"><a href="index.php">Seat Jugaad</a></div>

				</div>
				<div class="mid-head col-md-8">
					<ul class="features">
                        <li><a href="./seat_availability.php">SEAT AVAILABILITY</a></li>
                        <li><a href="./index.php">PNR STATUS</a></li>
                        <li>FAIR ENQUIRY</li>
                        <li><a href="train_live_status.php">LIVE TRAIN STATUS</a></li>
                        <li>CANCELLED TRAINS</li>
                    </ul>

                <div class="middle">
                    <div class="mid-second">
                        <form id="availability" action="../backend/algo/check_seat_availability.php" method="POST">
                            <div class="mid-content">
                                <div class="details">
                                    <legend>From:</legend>
                                    <input class="" name="source" type="text" id="src" maxlength="10" data-type="text" data-required="true"/>
                                    <legend>To:</legend>
                                    <input class="" name="destination" type="text" id="dest" maxlength="10" data-type="text" data-required="true"/>
                                    <legend>Date:</legend>
                                    <input id="datepicker" name='doj' type="text" class="date-picker form-control" />
                                    <legend>Preferred Class:</legend>
                                    <select class="drop-down" name="class" id='travel_class'>
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
                                    <legend>Quota:</legend>
                                    <select class="drop-down" name="quota" id='quota'>
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
                                </div>
                                <div class="submit">
                                <input type="submit" value="Find Trains" src="../images/tick.png" alt="Submit" width="40" height="40" >
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
        <script src="http://gregfranko.com/jquery.selectBoxIt.js/js/jquery.selectBoxIt.min.js"></script>
        <script>
        $(function() {
            var selectBox = $("select").selectBoxIt();
        });
        </script>
    </body>



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


