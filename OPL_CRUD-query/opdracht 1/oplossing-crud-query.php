<?php

	$error = array();

	try
	{
		$bierenDB = new pdo('mysql:host=localhost;dbname=bieren', 'root', '');

		$statement = $bierenDB->prepare(' 
			SELECT * FROM bieren 
			INNER JOIN brouwers
			ON bieren.brouwernr = brouwers.brouwernr
			WHERE bieren.naam LIKE "Du%" AND brouwers.brnaam LIKE "%a%"');
		$statement->execute();

		$bierenArray = array();

		while($row = $statement->fetch( PDO::FETCH_ASSOC ))
		{
			$bierenArray[] = $row;
		}

		$titles = array();
		$titles[] = 'biernr (PK)';

		foreach($bierenArray[0] as $key => $value)
		{
			$titles[] = $key;
		}
	}
	catch (PDOEXception $e)
	{
		$error['type'] = 'error';
		$error['text'] = 'De connectie met de database is mislukt';
	}
	

?>

<!DOCTYPE html>
<html>
	<head>
		<title>CRUD query</title>
		<link rel='stylesheet' type='text/css' href='main.css'>
	</head>
	<body>
		<?php if ($error): ?>
			<p><?= $error['text'] ?></p>
		<?php endif ?>
		<h1>Overzicht van de bieren</h1>
		<table>
			<thead>
				<tr>
					<?php foreach($titles as $value): ?>
						<th><?= $value ?></th>
					<?php endforeach ?>
				</tr>
			</thead>
			<tbody>
				<?php foreach($bierenArray as $key => $value): ?>
					<tr <?php if(($key + 1) % 2 == 0): ?>
							class='even'
						<?php endif ?>>
						<td><?= $key + 1 ?></td>
						<?php foreach($value as $value2): ?>
							<td><?= $value2 ?></td>
						<?php endforeach ?>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</body>
</html>