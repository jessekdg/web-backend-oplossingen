<?php
	$artikels = array(
		array(
			'title'=>'Iets over een kasteel',
			'text'=>'Een kasteel is heel interessant om over te schrijven, want het is een erg oud soort gebouw. Dat is zowat alles dat ik erover kan schrijven, maar ik moet nog enkele lijnen vullen om het op een artikel le laten lijken, dus lul ik nog maar wat voort. Kastelen zijn meestal gemaakt uit steen. Er kwamen enkele kastelen voor in die ene Monty Python film, weet je nog? Waaronder ook het bekende kasteel van AAARGGHH.',
			'tags'=>array('kasteel')
		),
		array(
			'title'=>'Iets over een gevecht',
			'text'=>'Ja ja, het was weer dik prijs in dat ene bekende Antwerps cafe vandaag. Een of andere paljas was goed zat en begon ruzie te zoeken met een groepje jongeren van bepaalde ethniciteit, en je kent die mensen natuurlijk he, die moeten meteen beginnen vechten. Alles is gelukkig nog goed gekomen want alle mensen van die ethniciteit zijn zo zwak als iets.',
			'tags'=>array('gevecht', 'antwerpen')
		),
		array(
			'title'=>'Iets over iets',
			'text'=>'Wanneer je eindelijk geen inspiratie meer hebt, is het het beste om gewoon te beginnen schrijven over het feit dat je geen inspiratie meer hebt. Op deze manier wordt de lezer in de war gebracht, en heeft hij of zij geen idee meer waar de tekst nu over moet gaan.',
			'tags'=>array('geen', 'inspiratie', 'meer')
		)
	);

?>

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