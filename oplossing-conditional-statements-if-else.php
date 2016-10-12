<?php
	
	$jaartal		=		2018	;
	$schrikkel 		=		TRUE	;
	$geenOfEen		=		"LEEG"	;

	/* als het jaartal niet deelbaar is door 4 */
	if(($jaartal % 4 == 0 && $jaartal % 100 != 0) || $jaartal % 400 == 0)
	{
		$schrikkel = TRUE;
	}
	else
	{
		$schrikkel = FALSE;
	}

	if($schrikkel)
	{
		$geenOfEen = "een";
	}
	else
	{
		$geenOfEen = "geen";
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Oplossing conditional statements if else</title>
	</head>
	<body>
		<h1>Deel 1</h1>
		<p><?= $jaartal ?> is <?= $geenOfEen ?> schrikkeljaar.</p>
	</body>
</html>