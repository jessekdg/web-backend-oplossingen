<?php

	$feedback = array();

	try
	{
		$bierenDB = new pdo('mysql:dbname=bieren;host=localhost', 'root', '');

		$statement = $bierenDB->prepare('
			SELECT * FROM brouwers');
		$statement->execute();

		$brouwers = array();
		while ($row = $statement->fetch( PDO::FETCH_ASSOC ))
		{
			$brouwers = $row;
		}

		$titles = array();
		for($i = 0; $i < $statement->columnCount(); ++$i)
		{
			$titles[] = $statement->getColumnMeta($i)['name'];
		}

		if(isset($_POST['delete']))
		{
			$statementDelete = $bierenDB->prepare('
				DELETE FROM brouwers
				WHERE brouwernr = :brouwernr');

			$statementDelete->bindValue(':brouwernr', $_POST['delete']);

			if($statementDelete->execute())
			{


				$feedback['type'] = 'success';
				$feedback['text'] = 'De datarij werd goed verwijderd.'
			}
			else
			{
				$feedback['type'] = 'error';
				$feedback['text'] = 'De datarij kon niet verwijderd worden. Probeer opnieuw.'
			}
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
			<p><?= $feedback['text'] ?></p>
		<?php endif ?>

		<h1>Overzicht van de brouwers</h1>
		<table>
			<thead>

			</thead>
			<tbody>

			</tbody>
		</table>
		<!-- <input type='image' name='delete' src='icon-delete.png' alt='submit'> -->
	</body>
</html>