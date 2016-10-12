<?php

	$dieren = array("Aap", "Hond", "Vogelbekdier", "Zeehond", "Vogel");
	$aantalElementen = count($dieren);
	$teZoekenDier = "Hond";
	$message = "";

	if(in_array($teZoekenDier, $dieren))
	{
		$message = " zit in de array.";
	}
	else
	{
		$message = " zit niet in de array.";
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Oplossing arrays functions</title>
	</head>
	<body>
		<h1>Deel 1</h1>
		<p>Aantal elementen in array: <?= $aantalElementen ?></p>
		<p><?= $teZoekenDier ?><?= $message ?></p>
	</body>
</html>