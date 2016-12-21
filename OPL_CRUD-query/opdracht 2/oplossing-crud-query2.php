<?php

	$error = array();
	$selectedBrouwer = '';

	try
	{
		$bierenDB = new pdo('mysql:host=localhost;dbname=bieren', 'root', '');

		$statement = $bierenDB->prepare('SELECT brnaam, brouwernr FROM brouwers');
		$statement->execute();

		$brouwers = array();

		while ($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
			$brouwers[] = $row;
		}

		if (isset($_GET['brouwernr']))
		{
			$selectedBrouwer = $_GET['brouwernr'];

			$statementBieren = $bierenDB->prepare('SELECT bieren.naam FROM bieren WHERE bieren.brouwernr = :brouwernr');
			$statementBieren->bindParam(':brouwernr', $_GET['brouwernr']);
		}
		else
		{
			$statementBieren = $bierenDB->prepare('SELECT bieren.naam FROM bieren');
		}

		$statementBieren->execute();

		$titles = array();
		$titles[] = 'Aantal';

		for($i = 0; $i < $statementBieren->columnCount(); ++$i)
		{
			$titles[] = $statementBieren->getColumnMeta($i)['name'];
		}

		$bieren = array();

		while($row = $statementBieren->fetch(PDO::FETCH_ASSOC))
		{
			$bieren[] = $row['naam'];
		}
	}
	catch (PDOException $e)
	{
		$error['type'] = 'error';
		$error['text'] = 'Verbinding met de database mislukt.';
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>CRUD query 2</title>
		<link rel='stylesheet' type='text/css' href='main.css'>
	</head>
	<body>
		<form action='#' method='get'>
			<select name='brouwernr'>
				<?php foreach($brouwers as $key => $value): ?>
					<option value='<?= $value["brouwernr"] ?>'
						<?php if($selectedBrouwer == $value['brouwernr']): ?>
							selected
						<?php endif ?>>
						<?= $value['brnaam'] ?>
					</option>
				<?php endforeach ?>
			</select>
			<input type='submit' value='Geef mij alle bieren van deze brouwerij'>
		</form>

		<table>
			<thead>
				<tr>
					<?php foreach($titles as $value): ?>
						<th><?= $value ?></th>
					<?php endforeach ?>
				</tr>
			</thead>
			<tbody>
				<?php foreach($bieren as $key => $value): ?>
					<tr <?php if(($key + 1) % 2 !== 0): ?> class='odd'<?php endif ?>>
						<td><?= $key + 1 ?></td>
						<td><?= $value ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</body>
</html>