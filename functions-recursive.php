<?php

	/*
	geerfd: 100.000 euro
	rentevoet: 8% per jaar (8.000 euro per jaar)
	verplicht 10 jaar op bank laten staan (180.000 euro na 10 jaar)
	*/

	$erfenis = 100000;
	$maxJaren = 10;
	$renteVoet = 0.08;

	function PlusRente1Jaar($bedrag, $rente)
	{
		static $jaar = 1;
		static $bedragPerJaar = array();

		if($jaar < $maxJaren)
		{
			$nieuwBedrag = $bedrag + $bedrag * $rente;
			$bedragPerJaar [$jaar ] = "Na " . $jaar . " jaar heeft Hans " . $nieuwBedrag . " euro.";
			$jaar++;

			return PlusRente1Jaar($nieuwBedrag, $rente);
		}
		else
		{
			return $bedragPerJaar;
		}
	}

	$bedragen = PlusRente1Jaar($erfenis, $renteVoet);

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Functions recursive</title>
	</head>
	<body>
		<h1>Deel 1</h1>
		<p>
			<?php
			foreach($bedragen as $message)
			{ ?>
				<p><?= $message ?></p>
			<?php 
			} ?>
		</p>
	</body>
</html>