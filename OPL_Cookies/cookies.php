<?php

	$textfile = file_get_contents('text.txt');
	$gegevens = explode(',', $textfile);
	$loginSuccesful = false;
	$message = 'default';

	if(isset($_POST['verzenden']))
	{
		if($_POST['gebruikersnaam'] == $gegevens[0] && $_POST['paswoord'] == $gegevens[1])
		{
			$message = 'inloggen gelukt';
		}
		else
		{
			$message = 'inloggen mislukt';
		}
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Cookies</title>
	</head>
	<body>
		<h1>Inloggen</h1>
		<p><?= $message ?></p>
		<form method='POST' action='#'>
			<ul>
				<li>
					<label for ='gebruikersnaam'>Gebruikersnaam: </label>
					<input type='text' name='gebruikersnaam' id='gebruikersnaam'>
				</li>
				<li>
					<label for='paswoord'>Paswoord: </label>
					<input type='password' name='paswoord' id='paswoord'>
				</li>
			</ul>
			<input type='submit' value='Verzenden' name='verzenden'>
		</form>
	</body>
</html>