<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>LIVE-TRAIN-STATUS</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/train_live_status.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="../js/jquery-2.1.1.js"></script>
        <script src="../js/bootstrap.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

	</head>
	<body>
		<div class="top">
			<div class="main-header">
				<div class="left-head col-md-2">
	                <div class="logo">
	                    <a href="index.php">Seat Jugaad</a>
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
		<form method="post" action="train_live_status_redirect.php" name="FormView" id="FormView" class="train-details" >
			<div class="row">
				<div class="searchTitle" id="title">
					<h2 style="margin-top:0px;">Check Train Status</h2>
					Enter the Train Name or Number

				</div>
				<div class="formContainer">
					<div class="leftform">
						<label class="icon-placed">
							<img src="../images/train.png">
							TRAIN</label>
						<input type="text" name="train_num" id="train_num" placeholder="Enter Train No./ Name"  style="margin-left:5px; margin-top:0px; font-size:14px;height: 28px; border:none;width:80%;" required>
					</div>

					<div class="rightform">
						<button id="search_train_button" name = "submit" class="booking" type="submit">Search</button>
					
					</div>

				</div>
			</div>

		</form>
		<div class="results" id="results" style="max-height:600px;display:none;">
			<div id="fountainG" style="margin:20px auto;">
				<div id="fountainG_1" class="fountainG"></div>
				<div id="fountainG_2" class="fountainG"></div>
				<div id="fountainG_3" class="fountainG"></div>
				<div id="fountainG_4" class="fountainG"></div>
				<div id="fountainG_5" class="fountainG"></div>
				<div id="fountainG_6" class="fountainG"></div>
				<div id="fountainG_7" class="fountainG"></div>
				<div id="fountainG_8" class="fountainG"></div>
			</div>
		</div>
<!-- <div>hello</div> -->

	</body>
	        <script src="../js/train_live_status.js"></script>

</html>


<?php
session_start();
if(isset($_SESSION['submit']))
{
	$train_num = $_SESSION['train_num'];
	?>
	<script>
	submitForm();

	var trainNum = '<?php echo $train_num ?>';

////////////////////////ajax////////////////////////////////////////////////////////
// function loadDoc(trainNum)
// 	{
// 		var xhttp = new XMLHttpRequest();
// 		xhttp.onreadystatechange = function(){
// 			if(xhttp.readyState == 4 && xhttp.status == 200){
// 				document.getElementById("results").innerHTML = xhttp.responseText;
// 			}
// 		};
// 		xhttp.open("GET", "train_live_get_data.php?train_num=" + trainNum, true);
// 		xhttp.send();
// 	}
// loadDoc();
/////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////jquery and ajax///////////////////////

	function getData(trainNum)
	{
		var loading = $('#loading');
		loading.show();
		$.ajax({
			async : true,
			url : "train_live_get_data.php?train_num=" + trainNum,
			type :"GET",
			dataType : "html",
			success:function(data){
				loading.hide();
				$('#results').html(data);
			}
		});
		}

	getData(trainNum);
	///////////////////////////////////////////////////////////////////
	</script>
	<?php
	// unset($_POST['submit']);
	unset($_SESSION['submit']);
}
?>



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
    $(function autoSuggest(str) {
    $( "#train" ).autocomplete({
        source: <?php echo $js_array ?>,
            minLength: 3
        });
    });
</script>

<script>
// function autoSuggest(str) {
//     if (str.length == 0) {
//         document.getElementById("txtHint").innerHTML = "";
//         return;
//     } else {
//         var xmlhttp = new XMLHttpRequest();
//         xmlhttp.onreadystatechange = function() {
//             if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//                 document.getElementById("train").innerHTML = xmlhttp.responseText;
//             }
//         };
//         xmlhttp.open("GET", "test.php?q=" + str, true);
//         xmlhttp.send();
//     }
// }
</script>


<!-- php code starts here -->

<?php
    $json = file_get_contents('train_number_name.json');
    $data = json_decode($json,true);
    $new = array();
    for($i=0;$i<count($data);$i++)
    {
        // array_push($new, strtoupper($data[$i]['train_name'] . " - " . $data[$i]['train_number']));
        // if($data[$i]['train_name'] != "") //if train name is alse there
        // array_push($new, $data[$i]['train_number'] . "(" . $data[$i]['train_name'] . ")");
        // else// if train name is not there
        // {
        // 	array_push($new, $data[$i]['train_number']);
        // }
        if($data[$i]['train_name'] != "")//restrict the list to only where train names are also given in json file 
        {
       		array_push($new, $data[$i]['train_number']);//only for demo later name will also be included for which code is above in comment  	
        }
       

    }

?>

<script>
    <?php
    $js_array = json_encode($new);
    ?>
    $(function() {
    $( "#train_num" ).autocomplete({
        source: <?php echo $js_array ?>,
            minLength: 3
        });
    });
</script>


