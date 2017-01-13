<?php

	session_start();

	$emailValid = false;
	$emailUnique = true;

	try
	{
		$db = new pdo('mysql:host=localhost;dbname=opdracht-security-login', 'root', '');
	}
	catch(PDOException $e)
	{
		$_SESSION['feedback']['type'] = 'error';
		$_SESSION['feedback']['text'] = '&nbsp! Verbinding met database mislukt.';
	}

	if(isset($_POST['generate']))
	{
		$generatedPassword = generatePassword(true, true, false, 15);
		$_SESSION['registration']['userPassword'] = $generatedPassword;	
		header('Location: oplossing-security-login.php');
	}

	if(isset($_POST['submit']))
	{
		$_SESSION['registration']['userEmail'] = $_POST['email'];
		$_SESSION['registration']['userPassword'] = $_POST['password'];

		$email = $_SESSION['registration']['userEmail'];
		$password = $_SESSION['registration']['userPassword'];

		if(filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$emailValid = true;
			$emailUnique = checkEmailUnique($email, $db);

			if($emailUnique)
			{
				addUser($email, $password);
				setcookie('login', $email . ',' . hash('sha512', $email . $salt), time() + 2592000);
				/* HIER ZITTEN WE NU*/

				$_SESSION['feedback']['type'] = 'success';
				$_SESSION['feedback']['text'] = '&nbsp! Succesvol toegevoegd aan de database';

				header('Location: oplossing-security-login.php');
			}
			else
			{
				$_SESSION['feedback']['type'] = 'error';
				$_SESSION['feedback']['text'] = '&nbsp! Dit e-mailadres is reeds geregistreerd.';

				header('Location: oplossing-security-login.php');
			}
		}
		else
		{
			$emailValid = false;

			$_SESSION['feedback']['type'] = 'error';
			$_SESSION['feedback']['text'] = '&nbsp! Invalid email';

			header('Location: oplossing-security-login.php');
		}
	}

	function addUser($email, $password, $db)
	{
		$salt = uniqid(mt_rand(), true);

		$hashedPassword = hash('sha512', $salt . $password);

		$statement = $db->prepare('INSERT INTO users (email, salt, hashed_password, last_login_time) VALUES (:email, :salt, :hashed_password, :last_login_time)');

		$db->bindValue(':email', $email);
		$db->bindValue(':salt', $salt);
		$db->bindValue(':hashed_password', $hashedPassword);
		$db->bindValue(':last_login_time', NOW());

		$statement->execute();
	}

	function checkEmailUnique($email, $db)
	{
		$statement = $db->prepare('SELECT * FROM users WHERE email = :email');

		$statement->bindValue(':email', $email);
		$statement->execute();

		/* PDO STATEMENT ROW COUNT GEBRUIKEN */

		$emails = array();
		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
			$emails[] = $row;
		}

		foreach($emails as $value)
		{
			if($value == $_SESSION['userEmail'])
			{
				return false;
			}
			else
			{
				return true;
			}
		}
	}

	function generatePassword($capitals = false, $numbers = true, $specials = false, $length)
	{
		$characterPool = array();
		$generatedPasswordKeys = array();
		$generatedPasswordCharacters = array();
		$generatedPassword = '';

		/* maak array van specials, array van nummers, array van capitals
		en array van normale characters, voeg toe aan characterpool wat nodig is */
		$standardCharacters = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
		$capitalCharacters = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
		$numericCharacters = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
		$specialCharacters = array('&', 'é', '"', '(', '§', 'è', '!', 'ç', 'à', ')', '-', '<', '>', '|', '@', '#', '{', '[', '^', '}', ']', '$', '*', 'ù', 'µ', '£', '%', '~', '+', '=', ':', ';', '/');

		$characterPool = array_merge($characterPool, $standardCharacters);

		if($capitals) { $characterPool = array_merge($characterPool, $capitalCharacters); }
		if($numbers) { $characterPool = array_merge($characterPool, $numericCharacters); }
		if($specials) { $characterPool  = array_merge($characterPool, $specialCharacters); }

		$generatedPasswordKeys = array_rand($characterPool, $length);

		foreach($generatedPasswordKeys as $value)
		{
			array_push($generatedPasswordCharacters, $characterPool[$value]);
		}

		shuffle($generatedPasswordCharacters);

		$generatedPassword = implode('', array_map('strval', $generatedPasswordCharacters));

		return $generatedPassword;

	}

	/*echo generatePassword(true, true, false, 20);*/

?>