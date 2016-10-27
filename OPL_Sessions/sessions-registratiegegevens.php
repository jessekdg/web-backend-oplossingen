<?php

	session_start();

	$email = '';
	$nickname = '';

	if(isset($_SESSION['email']))
	{
		$email = $_SESSION['email'];
	}

	if(isset($_SESSION['nickname']))
	{
		$nickname = $_SESSION['nickname'];
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
		<title>Sessions	- registratiegegevens</title>
	</head>
	<body>
		<form method='POST' action='sessions-adresgegevens.php'>
			<ul>
				<li>
					<label for='email'>e-mail: </label>
					<input type='emai' name='email' id='email'
						<?php if($focus_id == 0): ?>
							autofocus
						<?php endif ?>>
				</li>
				<li>
					<label for='nickname'>nicknaam: </label>
					<input type='text' name='nickname' id="nickname"
						<?php if($focus_id == 1): ?>
							autofocus
						<?php endif ?>>
				</li>
			</ul>
			<input type="submit" value='Volgende' id='volgende'>
		</form>	
		<form action='destroy.php' method='POST'>
			<input type='submit' id='end-session' value='Eindig sessie'>
		</form>
	</body>
</html>