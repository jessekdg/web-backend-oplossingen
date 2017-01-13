<?php

	session_start();

	if(isset($_POST['generate']))
	{
		$generatedPassword = generatePassword(true, true, false, 15);
		$_SESSION['registration']['userEmail'] = $_POST['email'];
		$_SESSION['registration']['userPassword'] = $generatedPassword;

		header('Location: oplossing-security-login.php');
	}

	if(isset($_POST['submit']))
	{

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