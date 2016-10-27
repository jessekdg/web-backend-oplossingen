<?php

	$text = file_get_contents("text-file.txt");
	$textChars = str_split($text, 1);
	sort($textChars);
	$textChars = array_reverse($textChars);

	$textCharsCounted = array_count_values($textChars);

	$aantalVerschillende = 0;
	$huidigCharacter = null;

	foreach($textCharsCounted as $character)
	{
		if($character != $huidigCharacter)
		{
			$huidigCharacter = $character;
			$aantalVerschillende++;
		}
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Oplossing looping statements - foreach</title>
	</head>
	<body>
		<h1>Looping statements - foreach</h1>
		<p>Er zijn <?= $aantalVerschillende ?> verschillende characters.</p>

		<?php 
		foreach($textCharsCounted as $character => $aantalIteraties)
		{ ?>
		<p><?= $character . " komt " . $aantalIteraties . " keer voor." ?></p>
		<?php
		} ?>
	</body>
</html>