<?php

	$input1 = 3;
	$input2 = 8;

	$inputString = "PHP is zo goed als Chinees voor mij.";
	$stringUpper = "";
	$stringLength = null;
	$resultaatString = array();

	function BerekenS($getal1, $getal2)
	{
		return $getal1 + $getal2;
	}

	function Vermenigvuldig($getal1, $getal2)
	{
		return $getal1 * $getal2;
	}

	function IsEven($getal)
	{
		if($getal % 2 == 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	$isEven = (IsEven($input2) ? "even" : "oneven");

	function AnalyseerString($string)
	{
		$stringLength = strlen($string);
		$stringUpper = strtoupper($string);

		$resultaatString[0] = $stringLength;
		$resultaatString[1] = $stringUpper;

		return $resultaatString;
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Functions</title>
	</head>
	<body>
		<h1>Deel 1</h1>
		<p>De som van getal 1 en getal 2 is: <?= BerekenS($input1, $input2) ?></p>
		<p>Het product van getal 1 en 2 is: <?= Vermenigvuldig($input1, $input2) ?></p>
		<p>Getal is <?= $isEven ?></p>
		<p>Resultaat string functie: <?= implode(AnalyseerString($inputString)) ?></p>
	</body>
</html>