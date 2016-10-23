<?php

	$artikels = array();

	/* http://www.hln.be/hln/nl/957/Binnenland/article/detail/2934501/2016/10/21/Explosie-op-militair-domein-in-Helchteren-blijkt-oefening.dhtml */
	$artikels[0] = 
	array(
		'Explosie op militair domein in Helchteren blijkt oefening',
		'Eerder werd melding gemaakt van een explosie op het militair domein in Helchteren. Maar nu blijkt dat een vliegtuig tijdens een oefening door de geluidsmuur is geknald. Van de zeven gewonde militairen waarover eerder werd bericht, blijkt geen sprake. De knal moet wel enorm zijn geweest, aangezien mensen tot in Kiewit melding maakten.',
		'img/explosie.jpg', 
		'Archiefbeeld uit 2012, toen zich al eens een ontploffing voordeed op het miltair domein van Helchteren'
	);
	
	/* http://www.hln.be/hln/nl/960/Buitenland/article/detail/2934291/2016/10/21/Russische-oorlogsvloot-rukt-op-naar-het-Kanaal-Britse-marine-volgt-op-de-voet.dhtml */
	$artikels[1] = 
	array(
		'Russische oorlogsvloot rukt op naar het Kanaal, Britse marine volgt op de voet',
		'Een konvooi Russische oorlogsschepen dat onderweg is naar de Middellandse Zee, zal door het Kanaal varen en wordt daarbij op de voet gevolgd door de Britse marine, daarbij ondersteund door de luchtmacht.',
		'img/oorlogsvloot.jpg',
		'Britse mariniers houden het Russische vliegdekschip Admiral Kuznetsov in de gaten.'
	);

	/* http://www.hln.be/hln/nl/957/Binnenland/article/detail/2934273/2016/10/21/Politierechter-tegen-Turkse-Kan-jij-na-20-jaar-nog-geen-Nederlands.dhtml */
	$artikels[2] = 
	array(
		'Politierechter tegen Turkse: "Kan jij na 20 jaar nog altijd geen Nederlands?"',
		'Laat er geen misverstand over bestaan: wie voor de politierechter verschijnt, heeft vermoedelijk iets mispeuterd. Meestal eigen schuld dikke bult, maar soms ook een ongelukkige samenloop van omstandigheden, gewoon brute pech of wordt de onschuld bewezen. Niet zelden proberen overtreders hun misstap te vergoelijken met op zijn minst merkwaardige uitvluchten. Onze reporters tekenden de voorbije week in de Vlaamse politierechtbanken enkele zaken op die dit ten overvloede illustreren.',
		'img/nederlands.jpg',
		'Politierechter Mireille Schreurs'
	);

	$artikelBestaat = true;
	$toonArtikel = false;

	if ( isset( $_GET['id'] ))
	{
		$id = $_GET['id'];

		if(array_key_exists($id, $artikels))
		{
			$artikelBestaat = true;
			$toonArtikel = true;
			$artikel = array($artikels[$id]);
		}
		else
		{
			$artikelBestaat = false;
		}
	}

?>