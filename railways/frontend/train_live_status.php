<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>LIVE-TRAIN-STATUS</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/train_live_status.css">

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
						<input type="text" name="train_num" id="train" placeholder="Enter Train No./ Name" style="margin-left:5px; margin-top:0px; font-size:14px;height: 28px; border:none;width:80%;" required>
					</div>

					<div class="rightform">
						<button id="search_train_button" name = "submit" class="booking" type="submit">Search</button>

					<div id="loading" class="loading" style="display:none;"></div>

					</div>
				</div>
			</div>

		</form>
		<div class="results" id="results" style="max-height:265px;display:none;">
			<div class="traindetails" id="traindetail">
				<div class="toppart">
					<span class="trainno">12345</span>
					<select id="selectday" class="selectday" onchange="dayofstart"();>
						<option value="0">2 days ago</option>
						<option value="1">Yesterday</option>
						<option value="2">Today</option>
					</select>
				</div>
				<div class="trainname">Seat Jugaad Express</div>
				<div class="sourcedest">Surat → Jaipur Jn</div>
				<div class="traindesc">24 Stations,1057 kms,16h 24m</div>

			</div>
			<div class="livestatus" id="livestatus" >
				<div class="currentsummary">
					<img src="../images/train.png" style="opacity:0.5;">
					<span class="currentposition">In between Vadodara and Surat</span>
					<div class="currenttime">On Time</div>
				</div>

			</div>



		</div>


	</body>
	        <script src="../js/train_live_status.js"></script>

</html>

<?php
session_start();
if(isset($_SESSION['submit']))
{
	?>
	<script>
	submitForm();

	var trainNum = '<?php echo $_SESSION['train_num'] ?>';
	alert(trainNum);
	function getData(trainNum)
	{
		var loading = $('#loading');
		loading.show();
		$.ajax({
			async : true,
			url : "train_live_get_data.php?";
			type :"GET",
			dataType : "html",
			success:function(data){
				loading.hide();
				$('#liveStatus').text(data);
			}
		});
		}

	getData();
	</script>
	<?php
	// unset($_POST['submit']);
	unset($_SESSION['submit']);
}
?>