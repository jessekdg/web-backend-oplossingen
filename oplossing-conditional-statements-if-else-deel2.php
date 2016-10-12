<?php

	$seconden = 5648458;
	$minuut = 60;
	$uur = $minuut * 60; /* 360 */
	$dag = $uur * 24; /* 8.640 */
	$week = $dag * 7; /* 60.480 */
	$maand = $dag * 31; /* 267.840 */
	$jaar = $dag * 365; /* 3.153.600 */

	$minuten = floor( $seconden / $minuut );
	$uren = floor( $seconden / $uur );
	$dagen = floor( $seconden / $dag );
	$weken = floor( $seconden / $week );
	$maanden = floor( $seconden / $maand );
	$jaren = floor( $seconden / $jaar );

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Oplossing conditional statements if else deel 2</title>
	</head>
	<body>
		<h1>Jaren, maanden, weken, dagen, uren, minuten en seconden</h1>
		<p>In <?= $seconden ?> seconden:</p>
		<ul>
			<li>Minuten: <?= $minuten ?></li>
			<li>Uren: <?= $uren ?></li>
			<li>Dagen: <?= $dagen ?></li>
			<li>Weken: <?= $weken ?></li>
			<li>Maanden: <?= $maanden ?></li>
			<li>Jaren: <?= $jaren ?></li>
		</ul>
	</body>
</html>