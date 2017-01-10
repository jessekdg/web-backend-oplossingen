<?php

	$feedback =	array();
	
	try
	{
		$db = new pdo('mysql:host=localhost;dbname=bieren', 'root', '' );

		$orderColumn = 'bieren.biernr';
		$order = 'ASC';

		if (isset($_GET['orderBy']))
		{
			$orderArray	= explode('-', $_GET['orderBy']);
			$orderColumn = $orderArray[0];

			$order = $orderArray[1];
		}

		$orderQuery	= 'ORDER BY ' . $orderColumn . ' ' . $order;

		if (isset($_GET['orderBy']))
		{
			$order = ($orderArray[1] != 'DESC') ? 'DESC' : 'ASC';
		}

		$query =	'SELECT 
						bieren.biernr,
						bieren.naam,
						brouwers.brnaam,
						soorten.soort,
						bieren.alcohol 
					FROM bieren INNER JOIN brouwers
						ON bieren.brouwernr	= brouwers.brouwernr
						INNER JOIN soorten
						ON bieren.soortnr = soorten.soortnr ' . $orderQuery;

		$bierenQuery = query($db, $query) ;

		$statement = $db->prepare
		('
			SELECT 
				bieren.biernr,
				bieren.naam,
				brouwers.brnaam,
				soorten.soort,
				bieren.alcohol 
			FROM bieren INNER JOIN brouwers
				ON bieren.brouwernr	= brouwers.brouwernr
				INNER JOIN soorten
				ON bieren.soortnr = soorten.soortnr ' . $orderQuery
		);

		$bierenFieldnames = $bierenQuery['fieldnames'];
		$bierenCleanFieldnames = processFieldnames( $bierenFieldnames );
		$bieren	=$bierenQuery['data'];

	}
	catch (PDOException $e)
	{
		$feedback['type'] =	'error';
		$feedback['text'] =	'Kon niet verbinden met de database';
	}
	
	function query($db, $query)
	{
		$statement = $db->prepare($query);
		$statement->execute();

		$fieldnames	= array();
		for ( $i = 0; $i < $statement->columnCount(); ++$i )
		{
			$fieldnames[] =	$statement->getColumnMeta($i)['name'];
		}

		$data =	array();
		while( $row = $statement->fetch(PDO::FETCH_ASSOC))
		{
			$data[]	= $row;
		}

		$returnArray['fieldnames'] = $fieldnames;
		$returnArray['data'] = $data;

		return $returnArray;
	}

	function processFieldnames($array)
	{

		$cleanFieldnames = array();

		foreach($array as $value)
		{
			switch($value)
			{
				case 'biernr':
					$name =	'Biernummer (PK)';
					break;

				case 'naam':
					$name =	'Bier';
					break;

				case 'brnaam':
					$name =	'Brouwer';
					break;

				case 'soort':
					$name =	'Soort';
					break;

				case 'alcohol':
					$name =	'Alcoholpercentage';
					break;

				default:
					$name =	$value;
					break;
			}

			$cleanFieldnames[] = $name;
		}

		return $cleanFieldnames;
	}
	
?>


<!DOCTYPE html>
<html>
	<head>
		<title>CRUD query order by</title>
		<link rel='stylesheet' type='text/css' href='main.css'>
	</head>
<body>
	<?php if ($feedback): ?>
		<div>
			<?= $feedback['text'] ?>
		</div>
	<?php endif ?>

	<h1>CRUD query order by</h1>
	<table>	
		<thead>
			<tr>
				<?php foreach ($bierenCleanFieldnames as $key => $cleanFieldname): ?>
					<th class="order <?= ( $order == 'ASC' 
								&& $orderColumn == $bierenFieldnames[ $key ] ) 
								? 'descending' : 'ascending' ?> 
								<?= ( $orderColumn == $bierenFieldnames[ $key ] ) 
								? 'selected' : '' ?>">
								<a href="<?= $_SERVER['PHP_SELF'] ?>?orderBy=<?= $bierenFieldnames[ $key ] ?>-<?= $order ?>">
									<?= $cleanFieldname ?>
								</a>
					</th>
				<?php endforeach ?>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($bieren as $key => $value): ?>
				<tr class="<?= (($key + 1) % 2 != 0 ) ? 'odd' : '' ?>">
					<?php foreach ($value as $value2): ?>
						<td><?= $value2 ?></td>
					<?php endforeach ?>
					<td>
						<button type='submit' name='delete'>
							<img src='icon-delete.png'>
						</button>
					</td>
					<td>
						<button type='submit' name='edit'>
							<img src='icon-edit.png'>
						</button>
					</td>
				</tr>
			<?php endforeach ?>	
		</tbody>
	</table>
</body>
</html>