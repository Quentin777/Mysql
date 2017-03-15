<?php
	$erreur = [];

if (isset($_POST) && !empty($_POST)){
	$donne=[];
	if (isset($_POST)['nom']) && $_POST['nom']!=''){
		$donne[] = $_POST['nom'];
	}else{
		$erreur[] ='merci de mettre un nom'
		}
	if (isset($_POST)['prenom']) && $_POST['prenom']!='') {
		$donne[] = $_POST['prenom'];
	}else{
		$erreur[] ='merci de mettre un prenom'
		}
	if (isset($_POST)['naissance'])&& $_POST['prenom']!='') {
		$donne[] =$_POST['naissance'];
	}else{
		$erreur[] ='merci de mettre une date de naissance'
		}
	if (isset($_POST)['card'])) {
		$donne[] =  0;
		$donne[] = null;

		if (isset($_POST['numeCard'])) {
			$numeCard = $_POST['numeCard'];
		}else{
			$erreur[]='merci de mettre un numéro de carte';
		}
	}else{
		$card = 0
	}

	if (empty($erreur)){
		$pdo = new PDO ('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', '');
		$pdo -> setAttribute(
			PDO::ATTR_ERRMODE, 
			PDO::ERRMODE_EXCEPTION); 
    	$pdo -> setAttribute(
    		PDO::ATTR_DEFAULT_FETCH_MODE, 
    		PDO::FETCH_OBJ);
    	$statement = $pdo->prepare(
    	INSERT INTO clients 
		SET lastName = :lastName, 
			  firstName= :firstName, 
			  birthDate= :birthDate,
			  card = :card,
			  cardNumber = :cardNumber,
			  ;)
    	$statement->execute($donne);
    	$erreur[]='le client est bien ajouté';


	}
	echo "post effectué";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Formulaire client</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
<h1> ajout de client </h1>
<?php foreach ($erreur as $value) {
	echo "<li>'$value'</li>";
}
?>
<form method="post" action="">
	<input type="text" name="nom" placeholder="nom">
	<input type="text" name="prenom" placeholder="prenom">
	<input type="date" name="naissance">
	<label for="card"> le client a-t'ils une carte de fidélité</label> <!-- pour mettre un texte devant checkbox-->
	<input type="checkbox" name="card" id="card">
	<input type="number" name="numeCard" placeholder="numéro de la carte">
	<button type="submit">Ok</button>
</form>

</body>
</html>