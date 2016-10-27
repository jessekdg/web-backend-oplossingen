<?php

	$erfenis = 100000;
	$maxJaren = 10;
	$renteVoet = 0.08;

	function PlusRente1Jaar($bedrag, $rente, $jaren)
	{
		static $jaar = 1;
		static $bedragPerJaar = array();

		if($jaar <= $jaren)
		{
			$nieuwBedrag = floor($bedrag + $bedrag * $rente);
			$bedragPerJaar [$jaar] = "Na " . $jaar . " jaar heeft Hans " . $nieuwBedrag . " euro.";
			$jaar++;

			return PlusRente1Jaar($nieuwBedrag, $rente, $jaren);
		}
		else
		{
			return $bedragPerJaar;
		}
	}

	$berekening = PlusRente1Jaar($erfenis, $renteVoet, $maxJaren);

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
			foreach($berekening as $message)
			{ ?>
				<p><?= $message ?></p>
			<?php 
			} ?>
		</p>
	</body>
</html>