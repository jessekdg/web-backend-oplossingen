<?php

	global $md5HashKey;

	global $parameter1;
	global $parameter2;
	global $parameter3;


	/* Manier 1: zoals voorheen */
	function ProcentVoorkomst1($argument)
	{
		$md5HashKey = "d1fa402db91a7a93c4f414b8278ce073";
		$hashKeyConverted = str_split($md5HashKey, 1);

		$parameter1 = "2";

		static $teller = 0;

		for($i = 0; $i < strlen($md5HashKey); $i++)
		{
			if($hashKeyConverted[$i] == $parameter1)
			{
				$teller++;
			}
		}

		return $teller / strlen($md5HashKey) * 100;
	}

	/* Manier 2: als STATIC variabele gebruiken */
	function ProcentVoorkomst2($argument)
	{
		static $md5HashKey = "d1fa402db91a7a93c4f414b8278ce073";
		$hashKeyConverted = str_split($md5HashKey, 1);

		$parameter2 = "8";

		static $teller = 0;

		for($j = 0; $j < strlen($md5HashKey); $j++)
		{
			if($hashKeyConverted[$j] == $parameter2)
			{
				$teller++;
			}
		}

		return $teller / strlen($md5HashKey) * 100;
	}

	/* Manier 3:  */
	function ProcentVoorkomst3($argument)
	{
		$md5HashKey = "d1fa402db91a7a93c4f414b8278ce073";
		$hashKeyConverted = str_split($md5HashKey, 1);

		$parameter3 = "a";

		static $teller = 0;

		for($k = 0; $k < strlen($md5HashKey); $k++)
		{
			if($hashKeyConverted[$k] == $parameter3)
			{
				$teller++;
			}
		}

		return $teller / strlen($md5HashKey) * 100;
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Functions gevorderd</title>
	</head>
	<body>
		<h1>Deel 1</h1>
		<p>Functie 1: De needle '2' komt <?= ProcentVoorkomst1($parameter1) ?>% voor in de hash key 'd1fa402db91a7a93c4f414b8278ce073'</p>
		<p>Functie 2: De needle '8' komt <?= ProcentVoorkomst2($parameter2) ?>% voor in de hash key 'd1fa402db91a7a93c4f414b8278ce073'</p>
		<p>Functie 3: De needle 'a' komt <?= ProcentVoorkomst3($parameter3) ?>% voor in de hash key 'd1fa402db91a7a93c4f414b8278ce073'</p>
	</body>
</html>