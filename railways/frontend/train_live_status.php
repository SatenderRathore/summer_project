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
                        <li><a href="train_live_status.html">LIVE TRAIN STATUS</a></li>
                        <li>CANCELLED TRAINS</li>
                    </ul>
				</div>
			</div>
		</div>
		<form method="post" name="FormView" id="FormView" class="train-details" >
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
						<input type="text" name="trainno" id="train" placeholder="Enter Train No./ Name" style="margin-left:5px; margin-top:0px; font-size:14px;height: 28px; border:none;width:80%;" required>
					</div>

					<div class="rightform">
						<button id="search_train_button" name = "submit" class="booking" type="submit">Search</button>
					</div>
				</div>
			</div>

		</form>
		<div class="results" style="max-height:265px;display:none;">
			<div class="trainidentifier" id="trainidentifierdiv">


			</div>



		</div>

	</body>
	        <script src="../js/train_live_status.js"></script>

</html>

<?php

if(isset($_POST['submit']))
{
	?>
	<script>submitForm();</script>
	<?php
	// unset($_POST['submit']);
}
?>