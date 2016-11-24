<?php

	$textfile = file_get_contents('text.txt');
	$gegevens = explode(',', $textfile);
	$gegevens = array_chunk($gegevens, 2);
	$loginSuccesful = false;
	$message = 'default';
	$currentUsername = '';

	if(isset($_POST['verzenden']))
	{
		foreach($gegevens as $key => $user)
		{
			if($_POST['gebruikersnaam'] == $gegevens[$key][0] && $_POST['paswoord'] == $gegevens[$key][1])
			{
				$loginSuccesful = true;
				$currentUsername = $_POST['gebruikersnaam'];
				$message = 'inloggen gelukt';
				if( isset($_POST['onthoudmij']) )
				{
					setcookie('succesfulLogin', true, time() + 2592000);
				}
				else
				{
					setcookie('succesfulLogin', true);
				}
				header('location: cookies.php');
			}
			else
			{
				$message = 'inloggen mislukt';
				$loginSuccesful = false;
			}
		}
		
	}

	if( isset($_GET['logout']) )
	{
		setcookie('succesfulLogin', false);
		unset($_COOKIE['succesfulLogin']);
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Cookies</title>
	</head>
	<body>

	<pre><?= var_dump($gegevens) ?></pre>

	<?php if( isset($_COOKIE['succesfulLogin']) ): ?>
		<h1>Dashboard</h1>
		<p>Hallo <?= $currentUsername ?>, fijn dat je er weer bent!</p>
		<a href='cookies.php?logout=1'>Uitloggen</a>
	<?php else: ?>
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
			<input type='checkbox' name='onthoudmij' id='onthoudmij'>Onthoud mij
			<br>
			<input type='submit' value='Verzenden' name='verzenden'>
		</form>
	<?php endif; ?>
	</body>
</html>