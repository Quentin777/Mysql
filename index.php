<?php
//try
//{
    // On se connecte à MySQL
    $pdo = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', '');
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $pdo -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $statement = $pdo->query("SELECT * FROM clients");
    $resultat = $statement-> fetchall();
    
    $statement = $pdo->query("
    	SELECT showTypes.type, genres.genre AS firstGenre, secGenres.genre AS secGenre
    	FROM showTypes, genres , genres AS secGenres
    	WHERE showTypes.id = genres.showTypesId AND showTypes.id = secGenres.showtypeId
    	");
    $resultatExo2 = $statement->fetchall();

    $pdo= null;
//}
    //$statement = $pdo->query('SELECT * FROM clients');
   // echo '<pre>';
   // var_dump($resultat);
   // echo '</pre>';

?>
<!DOCTYPE html>
<html>
<head>
	<title>exo pdo</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>

<h2> exo1 </h2>
<table>
<thead>
	<tr>
		<th>id</th>
		<th>nom</th>
		<th>Prénom</th>
		<th>Date de naissance</th>
		<th>card</th>
		<th>numero de carte</th>
</thead>	
<tbody>
<?php foreach ($resultat as $value): //boucle qui parcours la var resultat ?>

	<tr> 
	<td><?php echo $value->id; ?></td>
	<td><?php echo $value->lastName; ?></td>
	<td><?php echo $value->firstName; ?></td>
	<td><?php echo $value->birthDate; ?></td>
	<td><?php echo $value->card; ?></td>
	<td><?php echo $value->cardNumber; ?></td>
	</tr>
<?php endforeach; ?>
</tbody>
</table>

<h2>exo2</h2>
<!-- afficher tout les types de spectacle possible -->

<?php  
    $pdo = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', '');
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $pdo -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $showtab = $pdo->query('SELECT * FROM showTypes');
    $resul = $showtab-> fetchall();
?>

<table>
<thead>
	<tr>
		<th>id</th>
		<th>Genre</th>
		<th>Genre</th>
</thead>	
<tbody>
<?php foreach ($resultatExo2 as $value): //boucle qui parcours la var resultat ?>

	<tr> 
	<td><?php echo $value-> type; ?></td>
	<td><?php echo $value-> genre; ?></td>
	<td><?php echo $value-> genre;?></td>
	</tr>
<?php endforeach; ?>
</tbody>
</table>



</body>
</html>