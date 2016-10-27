<?php

	$getal = 6;
	$dag = "LEEG";

	switch($getal)
	{
		case 1:
			$dag = "maandag";
			break;
		case 2:
			$dag = "dinsdag";
			break;
		case 3:
			$dag = "woensdag";
			break;
		case 4:
			$dag = "donderdag";
			break;
		case 5:
			$dag = "vrijdag";
			break;
		case 6:
			$dag = "zaterdag";
			break;
		case 7:
			$dag = "zondag";
			break;
		default:
			$dag = "ongeldig getal";
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Oplossing conditional statements switch</title>
	</head>
	<body>
		<h1>Switch</h1>
		<p>Dag nummer <?= $getal ?>: <?= $dag ?></p>
	</body>
</html>