<?php

	$rijen = 10;
	$kolommen = 10;


	/* onderstaande code is de basis, maar omdat er effectief html code geinjecteerd moet
	worden, zetten we dit in de html code.
	Op de plaatsen waar een rij/kolom toegevoegd moet worden, zetten we gewoon de nodige html code
	(tr of td).
	NODIG: php code in html afsluiten met ?> na de eerste akolade van de for loop, en nieuwe php code block
	starten om de sluitende akolade in te voegen.

	
	for($i = 0 ; $i < $rijen ; $i++)
	{
		voeg rij toe
		for($i = 0 ; $i < $kolommen ; $i++)
		{
			
		}
	}
*/
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Oplossing looping statements - for</title>
	</head>
	<body>
		<h1>Looping statements - for</h1>
		<table>

		<?php for ($i = 0; $i < $rijen; $i++) { ?>
				<tr>

					<?php for ($j = 0; $j < $kolommen; $j++) { ?>
						<td>kolom</td>
					<?php } ?>

				</tr>
		<?php } ?>
		
		</table>
	</body>
</html>