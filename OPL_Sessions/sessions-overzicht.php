<?php

	session_start();

	if(isset($_POST['straat']))
	{
		$_SESSION['straat'] = $_POST['straat'];
		$straat = $_SESSION['straat'];
	}
	else
	{
		$straat = '';
	}
	
	if(isset($_POST['nummer']))
	{
		$_SESSION['nummer'] = $_POST['nummer'];
		$nummer = $_SESSION['nummer'];
	}
	else
	{
		$nummer = '';
	}

	if(isset($_POST['gemeente']))
	{
		$_SESSION['gemeente'] = $_POST['gemeente'];
		$gemeente = $_SESSION['gemeente'];
	}
	else
	{
		$gemeente = '';
	}

	if(isset($_POST['postcode']))
	{
		$_SESSION['postcode'] = $_POST['postcode'];
		$postcode = $_SESSION['postcode'];
	}
	else
	{
		$postcode = '';
	}
	
	if(isset($_SESSION['nickname']))
	{
		$nickname = $_SESSION['nickname'];
	}
	else
	{
		$nickname = '';
	}
	
	if(isset($_SESSION['email']))
	{
		$email = $_SESSION['email'];
	}
	else
	{
		$email = '';
	}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Sessions - overzicht</title>
	</head>
	<body>
		<h1>Overzicht</h1>
		<ul>
			<li>
				Nickname: <?= $nickname ?> | 
				<a href='sessions-registratiegegevens.php?focus=0'>Wijzig</a>
			</li>
			<li>
				E-mail: <?= $email ?> | 
				<a href='sessions-registratiegegevens.php?focus=1'>Wijzig</a>
			</li>
			<li>
				Straat: <?= $straat ?> | 
				<a href='sessions-adresgegevens.php?focus=0'>Wijzig</a>
			</li>
			<li>
				Nummer: <?= $nummer ?> | 
				<a href='sessions-adresgegevens.php?focus=1'>Wijzig</a>
			</li>
			<li>
				Gemeente: <?= $gemeente ?> | 
				<a href='sessions-adresgegevens.php?focus=2'>Wijzig</a>
			</li>
			<li>
				Postcode: <?= $postcode ?> | 
				<a href='sessions-adresgegevens.php?focus=3'>Wijzig</a>
			</li>
		</ul>
		<form action='destroy.php' method='POST'>
			<input type='submit' id='end-session' value='Eindig sessie'>
		</form>
	</body>
</html>