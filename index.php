<?php
//try
//{
    // On se connecte à MySQL
    $pdo = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', '');
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $pdo -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $statement = $pdo->query("SELECT * FROM clients LIMIT 5,5"); // recup à partir de l'id 5 et affiche 5 dans la table sql
   // $statement = $pdo->query("SELECT * FROM clients WHERE card = 1"); // recup a partir de l'id 1 (carte fidelité)
    $resultat = $statement-> fetchall();

   // $statement = $pdo->query("
   // 	SELECT showTypes.type, genres.genre AS firstGenre, secGenres.genre AS secGenre
   // 	FROM showTypes, genres , genres AS secGenres
   // 	WHERE showTypes.id = genres.showTypesId AND showTypes.id = secGenres.showtypeId
   // 	ORDER BY genres.id
   // 	");
    $resultatExo2 = $statement->fetchall();

    $statement = $pdo->query("SELECT * FROM clients");
    $resultatExoe = $statement -> fetchall();

    $statement = $pdo->query("
    	SELECT firstName,lastName 
    	FROM clients 
    	WHERE lastName 
    	LIKE 'M%' 
    	ORDER BY lastName
    	");
    $resultatExo5 = $statement->fetchall();

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
	</tr>
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
<!--
<table>
<thead>
	<tr>
		<th>id</th>
		<th>Genre</th>
		<th>Genre</th>
</thead>	
<tbody>
<?php //foreach ($resultatExo2 as $value): //boucle qui parcours la var resultat ?>

	<tr> 
	<td><?php //echo $value-> type; ?></td>
	<td><?php// echo $value-> firstGenre; ?></td>
	<td><?php //echo $value-> secGenre;?></td>
	</tr>
<?php //endforeach; ?>
</tbody>
</table>-->

<h2>exo 5</h2>

<!-- savoir si on a une carte de fidelité ou non avec l'id 1 ou 0 -->

<?php foreach ($resultatExo5 as $value) :?>

<p><u>nom:</u> <?=$value->lastName?> <u>Prénom :</u> <?=$value->firstName?></p>


<?php endforeach; ?>


<h2>exo6</h2>
<!-- afficher le titre de tout les spectacle ainsi que la date et l'heure et trier les tries by order alphabethique-->


spectacle par artiste, le date à tel heure

</body>
</html>