<?php

	session_start();

	if(isset($_SESSION['email']))
	{
		$email = $_SESSION['email'];
	}
	elseif(isset($_POST['email']))
	{
		$_SESSION['email'] = $_POST['email'];
		$email = $_SESSION['email'];
	}
	else
	{
		$email = '';
	}
		
	if(isset($_SESSION['nickname']))
	{
		$nickname = $_SESSION['nickname'];
	}
	elseif(isset($_POST['nickname']))
	{
		$_SESSION['nickname'] = $_POST['nickname'];
		$nickname = $_SESSION['nickname'];
	}
	else
	{
		$nickname = '';
	}
	
	$focus_id = null;

	if(isset($_GET['focus']))
	{
		$focus_id = $_GET['focus'];
	}

	var_dump($_SESSION);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Sessions - adresgegevens</title>
	</head>
	<body>
		<h1>Registratiegegevens</h1>
		<ul>
			<li>
				e-mail: <?= $email ?>
			</li>
			<li>
				nickname: <?= $nickname ?>
			</li>
		</ul>

		<h1>Deel 2: Adresgegevens</h1>
		<form method='post' action='sessions-overzicht.php'>
			<ul>
				<li>
					<label for='straat'>Straat: </label>
					<input type='text' name='straat' id='straat'
						<?php if($focus_id == 0): ?>
							autofocus
						<?php endif ?>>
				</li>
				<li>
					<label for='nummer'>Nummer: </label>
					<input type='number' name='nummer' id='nummer'
						<?php if($focus_id == 1): ?>
							autofocus
						<?php endif ?>>
				</li>
				<li>
					<label for='gemeente'>Gemeente: </label>
					<input type='text' name='gemeente' id='gemeente'
						<?php if($focus_id == 2): ?>
							autofocus
						<?php endif ?>>
				</li>
				<li>
					<label for='postcode'>Postcode: </label>
					<input type='number' name='postcode' id='postcode'
						<?php if($focus_id == 3): ?>
							autofocus
						<?php endif ?>>
				</li>
			</ul>
			<input type='submit' value='Volgende' id='volgende'>
		</form>
		<form action='destroy.php' method='POST'>
			<input type='submit' id='end-session' value='Eindig sessie'>
		</form>
	</body>
</html>