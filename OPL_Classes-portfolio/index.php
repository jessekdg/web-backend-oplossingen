<?php

	function autoload($class)
	{
		include 'classes/' . $class . '.php';
	}

	autoload('HTMLBuilder');
	autoload('Contact');
	autoload('Home');

	$bodypartial;

	if(isset($_GET['contact']) == 1)
	{
		$bodypartial = 'contact.partial';
	}
	else
	{
		$bodypartial = 'body.partial';
	}


	/*if(isset($_GET['content']) )
	{
		$bodypartial = $_GET['content'] . '.partial';
	}
	else
	{
		$bodypartial = 'body.partial';
	}
*/
	$bobTheBuilder = new HTMLBuilder('header.partial', $bodypartial, 'footer.partial');
	$bobTheBuilder->buildAll();

?>