<?php

	$feedback = array();

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
							
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</form>
		<!-- <input type='image' name='delete' src='icon-delete.png' alt='submit'> -->
	</body>
</html>