<?php

	session_start();

	if(isset($_SESSION['registration']))
	{
		$password = $_SESSION['registration']['userPassword'];
	}
	else
	{
		$password = '';
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Security login</title>
		<link rel='stylesheet' type='text/css' href='main.css'>
	</head>
	<body>
	<pre><?php var_dump($_SESSION) ?></pre>

	<?php if(isset($_SESSION['feedback'])): ?>
		<div class='<?= $_SESSION['feedback']['type'] ?>' id='feedback'>
			<?= $_SESSION['feedback']['text'] ?>
		</div>
	<?php endif ?>

	<h1>Registreren</h1>
	<form action='registratie-process.php' method='post'>
		<label for='email' name='email'>E-mail:</label><br>
		<input type='email' name='email'><br>
		<label for='password' name='password'>Paswoord:</label><br>
		<input type='<?= ($password != '') ? 'text' : 'password' ?>' name='password' value='<?= $password ?>'>
		<input type='submit' name='generate' value='Genereer een paswoord'><br><br>
		<input type='submit' name='submit' value='Registreer'>
	</form>
	</body>
</html>