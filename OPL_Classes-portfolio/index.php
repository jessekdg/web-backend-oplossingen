<?php

	function autoload($class)
	{
		include 'classes/' . $class . '.php';
	}

	autoload('HTMLBuilder');
	autoload('Contact');

	$bodypartial = '';

	if(isset($_GET['contact']) == 1)
	{
		$bodypartial = 'contact.partial';
	}
	else
	{
		$bodypartial = 'body.partial';
	}

	$bobTheBuilder = new HTMLBuilder('header.partial', $bodypartial, 'footer.partial');
	$bobTheBuilder->buildAll();

?>