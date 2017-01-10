<?php

	$feedback = array();
	$editing = false;

	try
	{
		$bierenDB = new pdo('mysql:dbname=bieren;host=localhost', 'root', '');

		if(isset($_POST['delete']))
		{
			$statementDelete = $bierenDB->prepare('
				DELETE FROM brouwers
				WHERE brouwernr = :brouwernr');

			$statementDelete->bindValue(':brouwernr', $_POST['delete']);

			if($statementDelete->execute())
			{


				$feedback['type'] = 'success';
				$feedback['text'] = 'De datarij werd goed verwijderd.';
			}
			else
			{
				$feedback['type'] = 'error';
				$feedback['text'] = 'De datarij kon niet verwijderd worden. Probeer opnieuw.';
			}
		}

		if(isset($_POST['edit']))
		{
			$editing = true;
		}

		if (isset($_POST['wijzigen']))
		{
			$statementEdit = $bierenDB->prepare('
				UPDATE brouwers
					SET brnaam = :brnaam,
						adres = :adres,
						postcode = :postcode,
						gemeente = :gemeente,
						omzet = :omzet
					WHERE brouwernr = :brouwernr');

			$statementEdit->bindValue(':brouwernr', $_POST['brouwernr']);
			$statementEdit->bindValue(':brnaam', $_POST['brnaam']);
			$statementEdit->bindValue(':adres', $_POST['adres']);
			$statementEdit->bindValue(':postcode', $_POST['postcode']);
			$statementEdit->bindValue(':gemeente', $_POST['gemeente']);
			$statementEdit->bindValue(':omzet', $_POST['omzet']);

			if($statementEdit->execute())
			{
				$feedback['type'] = 'success';
				$feedback['text'] = 'Aanpassing succesvol doorgevoerd.';
			}
			else
			{
				$feedback['type'] = 'error';
				$feedback['text'] = 'Aanpassing is niet gelukt. Probeer opnieuw of neem contact op met de <a href="mailto:spificator@hotmail.com">systeembeheerder</a> wanneer deze fout blijft aanhouden.';
			}
		}

		$statement = $bierenDB->prepare('
			SELECT * FROM brouwers');
		$statement->execute();

		$brouwers = array();
		while ($row = $statement->fetch( PDO::FETCH_ASSOC ))
		{
			$brouwers[] = $row;
		}

		$titles = array();
		for($i = 0; $i < $statement->columnCount(); ++$i)
		{
			$titles[] = $statement->getColumnMeta($i)['name'];
		}
	}
	catch (PDOException $e)
	{
		$feedback['type'] = 'error';
		$feedback['text'] = 'Connectie met de database is mislukt';
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>CRUD delete</title>
		<link rel='stylesheet' type='text/css' href='main.css'>
	</head>
	<body>
		<?php if($feedback): ?>
			<p class='<?= $feedback['type'] ?>'> ! <?= $feedback['text'] ?></p>
		<?php endif ?>

		<?php if($editing): ?>
			<h1>Brouwerij ------------ wijzigen</h1>
			<form action='<?= $_SERVER[ 'PHP_SELF' ] ?>' method='post'>
				<label for='brnaam'>Brouwernaam:</label>
				<input type='text' id='brnaam' name='brnaam'><br><br>
				<label for='adres'>Adres:</label>
				<input type='text' id='adres' name='adres'><br><br>
				<label for='postcode'>Postcode:</label>
				<input type='text' id='postcode' name='postcode'><br><br>
				<label for='gemeente'>Gemeente:</label>
				<input type='text' id='gemeente' name='gemeente'><br><br>
				<label for='omzet'>Omzet:</label>
				<input type='text' id='omzet' name='omzet'><br><br>
				<input type='submit' name='wijzigen' value='Submit'>
			</form>
		<?php endif ?>

		<h1>Overzicht van de brouwers</h1>
		<form action='<?= $_SERVER['PHP_SELF'] ?>' method='post'>
			<table>

				<thead>
					<tr>
						<th>#</th>
						<?php foreach($titles as $value): ?>
							<th><?= $value ?></th>
						<?php endforeach ?>
						<th></th>
					</tr>
				</thead>

				<tbody>
					<?php foreach ($brouwers as $key => $value): ?>
						<tr class='<?php if(($key + 1) % 2 !== 0): ?>odd<?php endif ?>'>
							<td><?= $key + 1 ?></td>
							<?php foreach($value as $foo): ?>
								<td><?= $foo ?>
							<?php endforeach ?>
							<td>
								<button type='submit' name='delete' class='deletebutton' 
								value='<?= $brouwers['brouwernr'] ?>'>
									<img src='icon-delete.png'>
								</button>
							</td>
							<td>
								<button type='submit' name='edit' value="<?= $brouwers['brouwernr'] ?>">
									<img src='icon-edit.png'>
								</button>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</form>
		<!-- <input type='image' name='delete' src='icon-delete.png' alt='submit'> -->
	</body>
</html>