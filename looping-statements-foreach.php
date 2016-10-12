<?php

	$text = file_get_contents(text-file.txt);
	$textChars = str_split($text, 1);
	$textChars = sort($textChars);
	$textChars = array_reverse($textChars);

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Oplossing looping statements - foreach</title>
	</head>
	<body>
		<h1>Looping statements - foreach</h1>
		<p></p>
	</body>
</html>