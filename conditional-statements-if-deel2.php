<?php

	$getal		=	6		;
	$dag		=	""		;

	if($getal == 1) 
	{ 
		$dag = "maandag"; 
	} 

	if($getal == 2) 
	{ 
		$dag = "dinsdag"; 
	} 

	if($getal == 3) 
	{ 
		$dag = "woensdag"; 
	} 

	if($getal == 4) 
	{ 
		$dag = "donderdag"; 
	} 

	if($getal == 5) 
	{ 
		$dag = "vrijdag"; 
	} 

	if($getal == 6) 
	{ 
		$dag = "zaterdag"; 
	} 

	if($getal == 7) 
	{ 
		$dag = "zondag"; 
	}

	/* Alles in hoofdletter behalve a */
	$dag = strtoupper($dag);
	$dag2 = str_replace('A', 'a', $dag);

	/* Alles in hoofdletter behalve laatste a */
	$posLastA = strrpos($dag, 'A');
	$dag3 = substr_replace($dag, 'a', $posLastA, 1);
	/* de string waarin wordt vervangen is $dag, de letter moet veranderen in een 'a', en de verandering moet beginnen op de positie van de laatste A
	   mag ook maar duren voor 1 character, anders verdwijnt laatste letter ook */
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<h1>Deel 2 (alles hoofdletter behalve 'a')</h1>
	<p>Het is vandaag <?= $dag2 ?></p>

	<h1>Deel 2 (alles hoofdletter behalve laatste 'a')</h1>
	<p>Het is vandaag <?= $dag3 ?></p>
</body>
</html>