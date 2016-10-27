<?php

	session_start();

	if(isset($_POST['submit'])) 
	{
		$email = $_SESSION['email'];
		$nickname = $_SESSION['nickname'];
	}


?>

<!DOCTYPE html>
<html>
	<head>
		<title>Sessions	</title>
	</head>
	<body>
		<form method='POST' action='adresgegevens.php'>
			<ul>
				<li>
					<label for='email'>e-mail: </label>
					<input type='emai' name='email' id='email'>
				</li>
				<li>
					<label for='nickname'>nicknaam: </label>
					<input type='text' name='nickname' id="nickname">
				</li>
			</ul>
			<input type="submit" value='Volgende' id='volgende'>
		</form>	

		<pre><?= $email . $nickname ?></pre>
	</body>
</html>