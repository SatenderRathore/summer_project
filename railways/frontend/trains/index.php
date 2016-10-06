<?php
include("../../backend/algo/function.php");
session_start();

    // $source = strtoupper($_POST['source']);
    // $destination = strtoupper($_POST['destination']);
    // $doj = $_POST['doj'];
    // $user_class = $_POST['class'];
    // $user_class_copy = $user_class;
    // $user_quota = $_POST['quota'];
    // $source = station_code($source);
    // $destination = station_code($destination);


    $full_source = $_SESSION['full_source'];
    $full_destination = $_SESSION['full_destination'];
    $source = $_SESSION['source'] ;
    $destination = $_SESSION['destination'];
    $doj = $_SESSION['doj'];
    $user_class = $_SESSION['user_class'];
    $user_class_copy = $_SESSION['user_class_copy'];
    $user_quota = $_SESSION['user_quota'];
    $source = $_SESSION['source'];
    $destination = $_SESSION['destination'];

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
$station_list_json = file_get_contents('station_list.json');
$data = json_decode($station_list_json,true);
$new = array();
for($i=0;$i<count($data);$i++)
{
    array_push($new, strtoupper($data[$i]['station'] . " - " . $data[$i]['station_code']));
}


//--------------------------------------------------------------------------------------------------
//http://api.railwayapi.com/between/source/jp/dest/st/date/15-07-2016/apikey/uucxi9379/
    // $trains_bw_stations_api = "http://api.railwayapi.com/between/source/" . $source . "/dest/" . $destination . "/date/" . $doj . "/apikey/" . $apikey ;
    // $trains_bw_stations_api_call = file_get_contents($trains_bw_stations_api);
    // $trains_bw_stations_api_data = json_decode($trains_bw_stations_api_call, true);
$trains_bw_stations_api_data = trains_bw_station($source,$destination,$doj);
$trains_bw_stations_json = json_encode($trains_bw_stations_api_data);
   // $json = $trains_bw_stations_api_call;
 //--------------------------above both two things are same------------------------------------------


?>

<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>PNR-STATUS</title>
        <script src="../../js/jquery-2.1.1.js"></script>
        <script src="../../js/bootstrap.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>  

        <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../../css/new_seat_availability_result.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

        <!--datepicker-->
        <link href="../../css/datepicker.min.css" rel="stylesheet" type="text/css">
		<script src="../../js/datepicker.js"></script>	
		<script src="../../js/datepicker.en.js"></script>

		<script>
			// Initialization
			//$('#date').datepicker([options])
			// Access instance of plugin
			// $('#date').data('datepicker')
			
								

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
			<div class="row">
			<form id="availability" action="#" class="search" method="POST">
				<table class="table borderless">
					<thead>
						<tr>
							<td class="col-md-2 col-lg-2 col-sm-2" style=" border:none; margin-bottom:10px;">
								<div class="heading">FROM</div>
								<input class="" id="src" name="source" type="text" required>
							</td>

							<td style=" border:none; padding-top:2.7%; padding-right:1%;">
								<div class="swap" onclick="swap(); ">
									
								</div>
							</td>

							<td class="col-md-2 col-lg-2 col-sm-2" style=" border:none; ">
								<div class="heading">TO</div>
								<input class="" id="dest" type="text" required>
							</td>

							<td class="col-md-2 col-lg-2 col-sm-2" style=" border:none;">
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
							<td class="col-md-1 col-lg-2 col-sm-2" style=" border:none; ">
								<div class="heading">DATE</div>
								<input id="date" type="text"  class="datepicker-here" data-language='en'>
								
							</td>
							<td class="col-md-2 col-lg-2 col-sm-2" style=" border:none; ">
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
							<td class="col-md-2 col-lg-2 col-sm-2" style=" border:none;">
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
							<th class="col-md-3">Train Details</th>
							<th class="col-md-1">Departure</th>
							<th class="col-md-1">Arrival</th>
							<th class="col-md-1">Duration</th>
							<th class="col-md-2">Days Of Run</th>
							<th class="col-md-2">Classes</th>
							<th id = "cstatus" class="col-md-2">Current Status</th>
							<th class="col-md-1">Alternates</th>
						</tr>
					</thead>

				</table>


			</div>
			</div>
		</div>

	
	</body>
	<!-- <script src="../js/new_seat_availability_result.js"></script> -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
</html>

<!-- javascript code starts here -->
<script>
	var trains_bw_stations_json_js = <?php echo $trains_bw_stations_json?>;
	var all_trains_js = trains_bw_stations_json_js['train'];
	// console.log(all_trains_js[0]['classes']);

    <?php
    $js_array = json_encode($new);
    ?>
    $(function() {
    $( "#src, #dest" ).autocomplete({
        source: <?php echo $js_array ?>,
            minLength: 3
        });
    });

	
	function swap()
		{
			var src = document.getElementById('src').value;
			var dest = document.getElementById('dest').value;

			document.getElementById('src').value=dest;
			document.getElementById('dest').value=src;
		}


	function showDetails()
		{
			document.getElementById('src').value = '<?php echo $full_source ?>';
			document.getElementById('dest').value = '<?php echo $full_destination ?>';
			
			document.getElementById('date').setAttribute('value','<?php echo $doj ?>');
			
		}
	showDetails();

	var total_prev_class;
	function trainDetails()
		{
			//wrong meathod
			// console.log('<?php //echo $_SESSION['source']?>');
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
		 	var all_class_ids = new Array();
		        		
			var total_trains = all_trains_js.length;
			// to store prev class selected
			total_prev_class = total_trains;
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
		               day = days_of_run[j]['day-code'][0].fontcolor("green") + ' ';
		               // day.concat(' ');
		            }
		            else
		            {
		            	day = days_of_run[j]['day-code'][0].fontcolor("#bbb") + ' ';
		            	// day.concat(' ');
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
		        var classlist = document.createElement("div");
		        var x=0;
		        for(l=0;l<total_classes;l++)
		        {
		        	       	
		        	if(class_array[l]['available'] == "Y")
					{
						var idd = (10*i) + x; 
						all_class_ids.push(idd);
						if(class_array[l]['class-code'] == defaultClasss)
						{
							c = class_array[l]['class-code'];

							var span = document.createElement("span");
							var node = document.createTextNode(c);
							span.appendChild(node);
							span.setAttribute("id", idd);
							
						}
						else
						{
							c = class_array[l]['class-code'];
							var span = document.createElement("span");
							var node = document.createTextNode(c);
							span.appendChild(node);
							span.setAttribute("id", idd);
		       				
						}
						x++;
						classlist.appendChild(span);
					}

				}
				// console.log(classlist);
		        

		        var train_num = all_trains_js[i]['number'];
		        var source = all_trains_js[i]['from']['code'];
		        var dest = all_trains_js[i]['to']['code'];
		        var doj = '<?php echo $doj ?>';
		        var user_class = '<?php echo $user_class?>';

		        if(user_class=='ALL')
		        {
		        	user_class = defaultClass(all_trains_js[i]['classes']);
		        }

		        var user_quota = '<?php echo $user_quota?>';

				//---------------------------------------------------------------------------------------------------------------------------------------
				
				var table = document.getElementById("trains_list");

				var train_details=all_trains_js[i]['name'];
				var dept=all_trains_js[i]['src_departure_time'];
				var arr=all_trains_js[i]['dest_arrival_time'];
				var durr=all_trains_js[i]['travel_time'];
				var classes = classess;
				var cstatus=1;
				var sjstatus="No more booking";
				var row=table.insertRow(i+1);
				var cell11=row.insertCell(0);
				var cell12=row.insertCell(1);
				var cell13=row.insertCell(2);
				var cell14=row.insertCell(3);
				var cell15=row.insertCell(4);
				var cell16=row.insertCell(5);
				var cell17=row.insertCell(6);
				var cell18=row.insertCell(7);
				cell11.innerHTML=train_details + '(' + train_num + ')';
				cell12.innerHTML=dept;
				cell13.innerHTML=arr;
				cell14.innerHTML=durr;
				cell15.innerHTML=days;
				//cell16.innerHTML=classes;
				cell16.setAttribute("id","classesss"+i);
				//cell17.setAttribute("id", i);
				// cell17.innerHTML='status';
				// cell18.innerHTML='a';
				cell17.setAttribute("id","image" + i);
				document.getElementById("classesss"+i).appendChild(classlist);

				
				loadDoc(train_num,source,dest,doj,user_class,user_quota,i,0);

				var class_ids_length = all_class_ids.length;
			
				for(k=0;k<class_ids_length;k++)
				{	
					var span_id = all_class_ids[k];
					document.getElementById(span_id).style.cursor = "pointer";
					document.getElementById(span_id).addEventListener("click",printData);	    	
				}

			}

		}
	trainDetails(); 
	// to store prev class selected
	var prev_class=[];
	// console.log(total_prev_class);
	function printData()
		{
			// console.log(this);
			train_index = parseInt(this.id/10);

			var train_num = all_trains_js[train_index]['number'];
		    var source = all_trains_js[train_index]['from']['code'];
		    var dest = all_trains_js[train_index]['to']['code'];
		    var doj = '<?php echo $doj ?>';
			var user_class = this.innerHTML;
		    var user_quota = '<?php echo $user_quota?>';

		 	if(prev_class[train_index])
		 	{
		 		// console.log(prev_class[train_index]);
		 		document.getElementById(prev_class[train_index]).style.color = "#36d8f4";
		 	}
		 	else
		 	{
		 		//console.log(train_index);
		 		document.getElementById(train_index*10).style.color = "#36d8f4";
		 	}
		 	document.getElementById(this.id).style.color = "blue";
		    
			//console.log(train_num +source +dest+doj+ user_class+user_quota +train_index);

			prev_class[train_index]=this.id;
			// console.log(prev_class[train_index]);

			loadDoc(train_num,source,dest,doj,user_class,user_quota,train_index,1);


		}

	function loadDoc(train_num,source,destination,doj,user_class,quota,id,value)
		{    
			var loading = $('#image'+id);
		    loading.html('');

		    // to mark starting class of each row
			// var arguments.callee.val = arguments.callee.val || -10;
			
		    /*if(arguments.callee.val)
			{
				arguments.callee.val=0;
			}
			else
			{
				arguments.callee.val=arguments.callee.val+10;
			}*/
			var val = id*10;
			// console.log(val);
			if(document.getElementById(val)&&(value==0))
			{
				document.getElementById(val).style.color = "blue";
			}
			

			var bar =document.createElement("div");
			bar.setAttribute("class",  "progress");
			bar.style.width = "80%";
			var inbar = document.createElement("div");
			inbar.setAttribute("class",  "progress-bar progress-bar-striped active");
			inbar.style.width = "100%";
			bar.appendChild(inbar);
			document.getElementById("image"+id).appendChild(bar);


		    loading.show();
		    $.ajax( {
		        async: true,
		        url: "../../backend/algo/seat_availability_ajax.php?train_num=" + train_num + "&source=" + source + "&destination=" + destination + "&doj=" + doj + "&user_class=" + user_class + "&quota=" + quota,
		        type: "GET",
		        dataType: "html",
		        success:function(data){
		        //loading.hide();
		        loading.css('background','');
		        $('#image' +id).text(data);
		        }
		    });
		}

	// function getData(train_num, source, destination, doj, user_class, quota,id)
	// 	{
	// 		var xhttp = new XMLHttpRequest();
	// 		xhttp.onreadystatechange = function(){
	// 			if(xhttp.readyState == 4 && xhttp.status == 200){
	// 				document.getElementById(id).innerHTML = xhttp.responseText;
					
	// 				//---------------- below are faliures---------------

	// 				// return xhttp.responseText;
	// 				// cell17.innerHTML = xhttp.responseText;
	// 				// returnedData = xhttp.responseText;
	// 				// callback.apply(this,[returnedData]);
	// 				// var table = document.getElementById("cstatus");
	// 				// var row=table.insertRow(i+1);
	// 				// cell17=row.insertCell(0);
	// 				// cell17.innerHTML = xhttp.responseText;
	// 				//---------------------------------------------------


	// 			}
	// 		};
	// 		xhttp.open("GET", "../../backend/algo/test.php?train_num=" + train_num + "&source=" + source + "&destination=" + destination + "&doj=" + doj +"&user_class=" + user_class + "&quota=" + quota, true);
	// 		xhttp.send();
	// 	}
	
</script>
