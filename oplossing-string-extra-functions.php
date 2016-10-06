<?php

	/*Deel 1*/
	$fruit 			= 	"kokosnoot"											;
	$fruitLength 	= 	strlen($fruit)										;
	$fruitPosition	=	stripos($fruit, "o")								;
	/*stripos() ipv strpos() omdat deze check voor de eerste occurence*/

	/*Deel 2*/
	$fruit2			=	"ananas"											;
	$fruit2Position	=	strrpos($fruit2, "a")								;
	/*strrpos() check voor de laatste occurence*/
	$fruit2Caps		=	strtoupper($fruit2)									;

	/*Deel 3*/
	$lettertje		=	'e'													;
	$cijfertje		=	3													;
	$langsteWoord	=	"zandzeepsodemineralenwatersteenstralen"			;
	$lengsteWeerd	=	str_replace($lettertje, $cijfertje, $langsteWoord)	;

?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<h1>Deel 1</h1>
	<p>Lengte string fruit: <?= $fruitLength ?></p>
	<p>Positie eerste 'o': <?= $fruitPosition ?></p>

	<h1>Deel 2</h1>
	<p>Positie laatste 'a': <?= $fruit2Position ?></p>
	<p>In all caps: <?= $fruit2Caps ?></p>

	<h1>Deel 3</h1>
	<p>H3t langste woord ter wereld: <?= $lengsteWeerd ?></p>
</body>
</html>