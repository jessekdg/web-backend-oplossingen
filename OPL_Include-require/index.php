<?php
	
	require 'view/header-partial.html';
	include 'view/body-partial.php';
	require 'view/footer-partial.html';

?>

<!--
<!DOCTYPE html>
<html>
	<head>
		<title>include-require</title>
		<style>
			img {
				display: inline-block;
				width: 30%;
				float: left;
			}

			.artikel {
				background-color: grey;
				padding: 10px;
				border: 5px solid black;
				overflow: auto;
				width: 25%;
				height: 300px;
				margin-right: 1%;
				float: left;
			}
		</style>
	</head>
	<body>
		<?php foreach ($artikels as $id => $value) : ?>
			<div class='artikel'>
				<h1><?= $artikels[$id]['title'] ?></h1>
				<p><?= $artikels[$id]['text'] ?></p>
				<p>Kernwoorden: <i>
					<?php foreach($artikels[$id]['tags'] as $value) : ?>
						<?= $value ?> 
					<?php endforeach ?>
				</i></p>
			</div>
		<?php endforeach ?>
	</body>
</html>
-->