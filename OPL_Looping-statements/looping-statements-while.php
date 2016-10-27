<?php

	$getal = 1;
	$i = 0;
	$i2 = 0;
	$tePrinten = array();
	$tePrinten2 = array();

	while($i <= 99)
	{
		$tePrinten[$i] = $getal;

		if($getal % 3 == 0 && $getal > 40 && $getal < 80)
		{
			$tePrinten2[$i2] = $getal;
			$i2++;
		}

		$getal++;
		$i++;
	}

	$message = implode(", ", $tePrinten);
	$message2 = implode(", ", $tePrinten2);

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Oplossing looping statements - while</title>
	</head>
	<body>
		<h1>Deel 1</h1>
		<p><?= $message ?></p>
		<p><?= $message2 ?></p>
	</body>
</html>