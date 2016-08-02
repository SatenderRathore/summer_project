<?php
//-----------------------api keys----------------------------
	// $apikey = "uucxi9379";//satenderjpr@gmail.com
	// $apikey = "ttemb6830";//singhpalarashakti@gmail.com
	$apikey = "ootzm7275";//satendersvnit@gmail.com

	//$apikey = "eumbm2216";//singhrathoresatender@gmail.com

	//$apikey = "wqyoc1399"; //renurathorejpr@gmail.com
	//$apikey = "budyl6423";//yashagarwaljpr@gmail.com
	//$apikey = "zlzou2003";//satendersinghpalara@gmail.com
	//$apikey = "iyihg4653";//jagdishsinghrjpr@gmail.com

	//$apikey = "okogk2695";//theyashagarwal21@gmail.com

    // $apikey = "ccjee6917";//sagarkeshri26@gmail.com
    // $apikey = "dwmbs3983";//sagarkeshri@rocketmail.com
//-----------------------------------------------------------------


    $source = strtoupper($_POST['source']);
    $destination = strtoupper($_POST['destination']);
    $doj = $_POST['doj'];
    $user_class = $_POST['class'];
    $user_class_copy = $user_class;
    $user_quota = $_POST['quota'];
    $source = station_code($source);
    $destination = station_code($destination);


//------------------------function for default class-----------------------
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
//--------------------------------------------------------------------------

//----------------------------function for staton code----------------------------------------------
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
//--------------------------------------------------------------------------------------------------


//------------------------------------------------------------------------------------------------------------------------------------------------------
//http://api.railwayapi.com/between/source/jp/dest/st/date/15-07-2016/apikey/uucxi9379/
    $trains_bw_stations_api = "http://api.railwayapi.com/between/source/" . $source . "/dest/" . $destination . "/date/" . $doj . "/apikey/" . $apikey ;
    $trains_bw_stations_api_call = file_get_contents($trains_bw_stations_api);
    $trains_bw_stations_api_data = json_decode($trains_bw_stations_api_call, true);
//-------------------------------------------------------------------------------------------------------------------------------------------------------    
// $json = json_encode($trains_bw_stations_api_data);
   $json = $trains_bw_stations_api_call;
 //--------------------------above both two things are same----------------------------------------------------------------------------------------------
?>

<script>
	var json_js = <?php echo $json?>;
	var all_trains_js = json_js['train'];
</script>

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
        <link href="../css/datepicker.min.css" rel="stylesheet" type="text/css">
		<script src="../js/datepicker.min.js"></script>	
		<script src="../js/datepicker.en.js"></script>

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
										dateFormat: 'dd-mm-yy',
										language: 'en',
										minDate: new Date() ,
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
	<!-- <script src="../js/new_seat_availability_result.js"></script> -->
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

<script>
	
function swap()
{
	var src=document.getElementById('src').value;
	var dest=document.getElementById('dest').value;
	document.getElementById('src').value=dest;
	document.getElementById('dest').value=src;
}

function trainDetails()
{
	// <?php 
	// for($i = 0; $i < count($all_trains); $i++)
 //    {
 //        $train_name = $all_trains[$i]['name'];
 //        $train_num = $all_trains[$i]['number'];
 //        $days_of_run = $all_trains[$i]['days'];
 //        $departure_time = $all_trains[$i]['src_departure_time'];
 //        $arrival_time = $all_trains[$i]['dest_arrival_time'];
 //        $travel_time = $all_trains[$i]['travel_time'];
 //        $source = $all_trains[$i]['from'];
 //        $destination =$all_trains[$i]['to'];
 //        $class = $all_trains[$i]['classes'];
 //    }  
	// ?>
 //--------------------------------------------------------------------------------------------
	var total_trains = all_trains_js.length;
	for(var i=0;i<total_trains;i++)
	{
		//------------------------------------------------
		days_of_run = all_trains_js[i]['days'];
		len = days_of_run.length;
		var days = '';
		for(var j=0;j<len;j++)
		{
            if(days_of_run[j]['runs'] === 'Y')
            {
               day = days_of_run[j]['day-code'];
            }
            else
            {
            	day = days_of_run[j]['day-code'][0];
            }
            days = days.concat(day);
        }
        //----------------------------------------------------
    // function default_class($classes)
    // {
    //     foreach ($classes as $class)
    //     {
    //         if($class['available'] == "Y")
    //         {
    //             $default_class = $class['class-code'];
    //             break;
    //         }
    //     }
    //     return $default_class;
    // }
        //----------------------------------------------------
        function defaultClass(classes)
        {
        	var totalClasses = classes.length;
        //	console.log(totalClasses);
        	for(k=0;k<totalClasses;k++)
        	{
        		if(classes[k]['available'] == "Y")
        		{
        			var defaultClass = classes[k]['class-code'];
        			break;
        		}
        	}
        	return defaultClass;
        };
        //-----------------------------------------------------
        var class_array = all_trains_js[i]['classes'];
        var defaultClasss = defaultClass(class_array);

        var total_classes = class_array.length;
        var classess = '';
        for(l=0;l<total_classes;l++)
        {
        	if(class_array[l]['available'] == "Y")
			{
				if(class_array[l]['class-code'] == defaultClasss)
				{
					var c = 'b';

					c = c.concat(class_array[l]['class-code']);
					c = c.concat('b');
					classess = c;
				}
				else
				{
					classess = classess.concat(class_array[l]['class-code']);
				}
			}
		}
        
//---------------------------------------------------------------------------------------------------------------------------------------
		var table = document.getElementById("trains_list");

		var train_details=all_trains_js[i]['name'];
		var dept=all_trains_js[i]['src_departure_time'];
		var arr=all_trains_js[i]['dest_arrival_time'];
		var durr=all_trains_js[i]['travel_time'];
		var classes = classess;
		var cstatus="GNWL603/WL400";
		var sjstatus="No more booking";
		var row1=table.insertRow(i+1);
		var cell11=row1.insertCell(0);
		var cell12=row1.insertCell(1);
		var cell13=row1.insertCell(2);
		var cell14=row1.insertCell(3);
		var cell15=row1.insertCell(4);
		var cell16=row1.insertCell(5);
		var cell17=row1.insertCell(6);
		var cell18=row1.insertCell(7);
		cell11.innerHTML=train_details;
		cell12.innerHTML=dept;
		cell13.innerHTML=arr;
		cell14.innerHTML=durr;
		cell15.innerHTML=days;
		cell16.innerHTML=classes;
		cell17.innerHTML=cstatus;
		cell18.innerHTML=sjstatus;
	}
}
trainDetails(); 
</script>
