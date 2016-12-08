<?php

	function autoload($class)
	{
		include 'classes/' . $class . '.php';
	}

	autoload('Percent');

	$getal1 = 150;
	$getal2 = 100;

	$percentClass = new Percent($getal1, $getal2);

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Classes begin</title>
		<style>
			table, th, td { border: 1px solid black; }
			td { padding: 5px; }
		</style>
	</head>
	<body>
	<h1>Hoe staat <?= $getal1 ?> in verhouding met <?= $getal2 ?>?</h1>
		<table>
			<tr>
				<td>Relatief:</td>
				<td><?= $percentClass->relative ?></td>
			</tr>
			<tr>
				<td>Procentueel:</td>
				<td><?= $percentClass->hundred ?>%</td>
			</tr>
			<tr>
				<td>Nominaal:</td>
				<td><?= $percentClass->nominal ?></td>
			</tr>
		</table>
	</body>
</html>