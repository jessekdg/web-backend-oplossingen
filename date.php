<?php

	$hour = 22;
	$minute = 35;
	$second = 25;
	$month = 1;
	$day = 21;
	$year = 1904;

	$timestamp = mktime($hour, $minute, $second, $month, $day, $year);
	$date = date('j F Y, g:i:s a', $timestamp);

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Date</title>
		<p>
			<b>Timestamp:</b>
			<?= $timestamp ?>
		</p>
		<p>
			<b>Date:</b>
			<?= $date ?>
		</p>
	</head>
	<body>
		
	</body>
</html>