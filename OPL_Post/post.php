<?php

	$password = 'squirrel';
	$username = 'timmy';
	$message = '';
	$submit = null;

	if(isset($_POST['submit']))
	{
		if($_POST['username'] == $username && $_POST['password'] == $password)
		{
			$message = 'Welkom';
		}
		else
		{
			$message = 'Er ging iets mis bij het inloggen. Probeer opnieuw.';
		}
	}
	else
	{

	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>POST</title>
	</head>
	<body>
		<form method='POST' action='post.php'>
			<label for='username'>Username: </label>
			<input type='text' name='username' id='username'>
			<br><br>
			<label for='password'>Password: </label>
			<input type='password' name='password' id='password'>
			<br><br>
			<input type='submit' name='submit'>
		</form>
		<p><?= $message ?></p>
	</body>
</html>