<?php

	$textfile = file_get_contents('text.txt');
	$gegevens = explode(',', $textfile);
	$loginSuccesful = false;
	$message = 'default';

	if(isset($_POST['verzenden']))
	{
		if($_POST['gebruikersnaam'] == $gegevens[0] && $_POST['paswoord'] == $gegevens[1])
		{
			$loginSuccesful = true;
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
	<?php if( isset($_COOKIE['succesfulLogin']) ): ?>
		<h1>Dashboard</h1>
		<p>U bent ingelogd.</p>
			<!-- TEST COOKIE COUNT
			<?php if( isset($_COOKIE['succesfulLogin']) ): ?>
				<p>Cookie set: <?= $_COOKIE['succesfulLogin'] ?></p>
			<?php endif; ?>
			-->
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