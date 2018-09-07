<?php

	require_once( 'responsivity-class.php' );
	$responsivity = new ResponsivityTool();

	$device_entered = empty($_GET['device']) ? true : false;

?>
<!DOCTYPE html>
<html>
	<head>

		<title>Responsivity</title>
		<link rel="stylesheet" href="css/style.css" type="text/css">
		<link rel="shortcut icon" href="responsivity-favicon.png" />
		<link rel="stylesheet" id="fontawesome-css" href="font-awesome/css/font-awesome.min.css" type="text/css" media="all">

	</head>
	<body>

		<div id="container">

			<?php

				if (!isset($_GET['device'])) $_GET['device'] = array();
				foreach ($_GET['device'] as $device_name) {

					// Put the device
					$responsivity->put_device($device_name);

					// If rotatable, add landscape mode
					if ( $device_name != "Custom" && $responsivity->devices[$device_name]["rotate"] ) $responsivity->put_device($device_name, true);

				}

			?>

		</div>


		<div id="functions">

			<!-- STOPPER -->
			<div id="stopper" class="inactive">
				<i class="fa fa-thumb-tack" aria-hidden="true"></i>
			</div>

			<!-- RELOADER -->
			<div id="reloader" class="inactive">
				<i class="fa fa-refresh" aria-hidden="true"></i>
			</div>

			<!-- OPTIONS -->
			<div id="optioner" class="<?php echo $device_entered ? "active" : "inactive"; ?>">
				<i class="fa fa-gear" aria-hidden="true"></i>

				<?php $responsivity->print_form(); ?>

			</div>

		</div>


		<script src="js/jquery-2.2.2.min.js"></script>
		<script src="js/script.js"></script>
	</body>
</html>