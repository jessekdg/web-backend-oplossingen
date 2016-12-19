<?php

	session_start();

	function autoload($class)
	{
		include 'classes/' . $class . '.php';
	}

	autoload('Message');

	$isValid = false;

	try
	{
		if ( isset( $_POST['submit'] ) )
		{
				if ( isset( $_POST['code'] ) )
				{
					if (strlen($_POST['code']) == 8)
					{
						$isValid = true;
					}
					else
					{
						throw new Exception ('VALIDATION-CODE-LENGTH');
					}
				}
				else
				{
					throw new Exception ('SUBMIT-ERROR');
				}
		}
		else
		{

		}
	}
	catch (Exception $e)
	{
		$messageCode = $e->getMessage();
		$message = array();
		$createMessage = false;

		switch ($messageCode)
		{
			case 'SUBMIT-ERROR':
				$message['type'] = 'error';
				$message['text'] = 'Er werd met het formulier geknoeid.';
				break;

			case 'VALIDATION-CODE-LENGTH':
				$message['type'] = 'error';
				$message['text'] = 'De kortingscode heeft niet de juiste lengte.';
				$createMessage = true;
				break;
		}

		if($createMessage)
		{
			createMessage($message);
		}

		logToFile($message);
	}

	function logToFile ($message)
	{
		$timestamp = '[' . date('H:i:s', time()) . ']';
		$ip = $_SERVER['REMOTE_ADDR'];
		$errorType = $message['type'];
		$errorMessage = $message['text'];

		$fullMessage = $timestamp . '-' . $ip . '- type: [' . $errorType . '] ' . $errorMessage . "\n\r";

		file_put_contents('log.txt', $fullMessage);
	}

	function createMessage($message)
	{
		$_SESSION['message'] = $message;
	}

	function showMessage()
	{
		if (isset( $_SESSION['message'] ))
		{
			return $_SESSION['message'];
			unset( $_SESSION['message'] );
		}
		else
		{
			return false;
		}
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>GET</title>
	</head>
	<body>
		<h1>Geef uw kortingscode op</h1>
		<hr><br>
		<?php if (!$isValid): ?>
			<?php if($message): ?>
				<p><?= $message['text'] ?></p>
			<?php endif ?>

			<form action='#' method='post'>
				<label for='code'>Kortingscode</label><br>
				<input type='text' id='code' name='code'><br>
				<input type='submit' name='submit'>
			</form>
		<?php else: ?>
			<p>Korting toegekend!</p>
		<?php endif ?>
	</body>
</html>