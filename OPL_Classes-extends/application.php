<?php

	function autoload($class)
	{
		require 'classes/' . $class . '.php';
	}

	autoload('Animal');
	autoload('Lion');
	autoload('Zebra');

	$frog = new Animal('Kermit', 'male', 100);
	$cat = new Animal('Dikkie', 'male', 100);
	$dolphin = new Animal('Flipper', 'female', 100);

	$cat->changeHealth(-10);
	$dolphin->changeHealth(+10);

	$lion1 = new Lion('Simba', 'male', 100, 'Congo lion');
	$lion2 = new Lion('Scar', 'male', 100, 'Kenia lion');

	$zebra1 = new Zebra('Zeke', 'male', 100, 'Quagga');
	$zebra2 = new Zebra('Zana', 'female', 100, 'Selous');

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Classes extends</title>
	</head>
	<body>
		<h1>Instanties van de Animal class</h1>
		<p><?= $frog->getName() ?> is van het geslacht <?= $frog->getGender() ?> en heeft momenteel <?= $frog->getHealth() ?> levenspunten (special move: <?= $frog->doSpecialMove() ?>)</p>
		<p><?= $cat->getName() ?> is van het geslacht <?= $cat->getGender() ?> en heeft momenteel <?= $cat->getHealth() ?> levenspunten (special move: <?= $cat->doSpecialMove() ?>)</p>
		<p><?= $dolphin->getName() ?> is van het geslacht <?= $dolphin->getGender() ?> en heeft momenteel <?= $dolphin->getHealth() ?> levenspunten (special move: <?= $dolphin->doSpecialMove() ?>)</p>
		<hr>
		<h1>Instanties van de Lion class</h1>
		<p>De speciale move van <?= $lion1->getName() ?> (soort: <?= $lion1->getSpecies() ?>): <?= $lion1->doSpecialMove() ?> </p>
		<p>De speciale move van <?= $lion2->getName() ?> (soort: <?= $lion2->getSpecies() ?>): <?= $lion2->doSpecialMove() ?> </p>
		<hr>
		<h1>Instanties van de Zebra class</h1>
		<p>De speciale move van <?= $zebra1->getName() ?> (soort: <?= $zebra1->getSpecies() ?>); <?= $zebra1->doSpecialMove() ?></p>
		<p>De speciale move van <?= $zebra2->getName() ?> (soort: <?= $zebra2->getSpecies() ?>); <?= $zebra2->doSpecialMove() ?></p>
	</body>
</html>