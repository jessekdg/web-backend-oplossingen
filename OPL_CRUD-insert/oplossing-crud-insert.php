<?php

	$feedback = array();

	if (isset($_POST['submit']))
	{
		try
		{
			$bierenDB = new pdo('mysql:host=localhost;dbname=bieren', 'root', '');

			$statement = $bierenDB->prepare('INSERT INTO brouwers 
				(brnaam, adres, postcode, gemeente, omzet)
				VALUES 
				( :brouwernaam, :adres, :postcode, :gemeente, :omzet )');

			$statement->bindValue(':brouwernaam', $_POST['brouwernaam']);
			$statement->bindValue(':adres', $_POST['adres']);
			$statement->bindValue(':postcode', $_POST['postcode']);
			$statement->bindValue(':gemeente', $_POST['gemeente']);
			$statement->bindValue(':omzet', $_POST['omzet']);

			if($statement->execute())
			{
				$feedback['type'] = 'success';
				$feedback['text'] = 'Brouwerij succesvol toegevoegd. Het unieke nummer van deze brouwerij is ' . $bierenDB->lastInsertId();
			}
			else
			{
				$feedback['type'] = 'error';
				$feedback['text'] = 'Toevoegen in database mislukt.';
			}
		}
		catch (PDOException $e)
		{
			$feedback['type'] = 'error';
			$feedback['text'] = 'Verbinding met de database mislukt.';
		}
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>CRUD Insert</title>
		<link rel='stylesheet' type='text/css' href='main.css'>
	</head>
	<body>

	<?php if ($feedback): ?>
		<p><?= $feedback['text'] ?></p>
	<?php endif ?>

	<h1>Voeg een brouwer toe</h1>
		<form action='#' method='post'>
			<label for='brouwernaam'>Brouwernaam:</label><br>
			<input type='text' name='brouwernaam'><br>

			<label for='adres'>Adres:</label><br>
			<input type='text' name='adres'><br>

			<label for='postcode'>Postcode:</label><br>
			<input type='text' name='postcode'><br>

			<label for='gemeente'>Gemeente:</label><br>
			<input type='text' name='gemeente'><br>

			<label for='omzet'>Omzet:</label><br>
			<input type='text' name='omzet'><br><br>

			<input type='submit' name='submit' value='Submit'>
		</form>
	</body>
</html>