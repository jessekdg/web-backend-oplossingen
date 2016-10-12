<?php

	$getallen = array(1, 2, 3, 4, 5);
	$onevenGetallen = array();
	$hoeveelsteOneven = 0;

	$multiplied = $getallen[0] * $getallen[1] * $getallen[2] * $getallen[3] * $getallen[4];

	if($getallen[0] % 2 != 0)
	{
		$onevenGetallen[hoeveelsteOneven] = $getallen[0];
		$hoeveelsteOneven++;
	}

	if($getallen[1] % 2 != 0)
	{
		$onevenGetallen[hoeveelsteOneven] = $getallen[0];
		$hoeveelsteOneven++;
	}

	if($getallen[2] % 2 != 0)
	{
		$onevenGetallen[hoeveelsteOneven] = $getallen[0];
		$hoeveelsteOneven++;
	}

	if($getallen[3] % 2 != 0)
	{
		$onevenGetallen[hoeveelsteOneven] = $getallen[0];
		$hoeveelsteOneven++;
	}

	if($getallen[4] % 2 != 0)
	{
		$onevenGetallen[hoeveelsteOneven] = $getallen[0];
		$hoeveelsteOneven++;
	}

	var_dump($onevenGetallen);

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Arrays basis - deel 2</title>
	</head>
	<body>
		<h1>Deel 1</h1>
		<p>Alle getallen vermenigvuldigd: <?= $multiplied ?></p>
		<p>Oneven getallen: <?= print_r($onevenGetallen, true) ?></p>
	</body>
</html>