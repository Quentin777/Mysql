<?php
	$message = [];

if (isset($_POST) && !empty($_POST)){
	$donne=[];
	if (isset($_POST)['nom']) && $_POST['nom']!=''){
		$donne['lastName'] = $_POST['nom'];
	}else{
		$message[] ='merci de mettre un nom'
		}
	if (isset($_POST)['prenom']) && $_POST['prenom']!='') {
		$donne['firstName'] = $_POST['prenom'];
	}else{
		$message[] ='merci de mettre un prenom'
		}
	if (isset($_POST)['naissance'])&& $_POST['prenom']!='') {
		$donne['birthDate'] =$_POST['naissance'];
	}else{
		$message[] ='merci de mettre une date de naissance'
		}
	if (isset($_POST)['card'])) {
		$donne['card'] =  0;

		if (isset($_POST['numeCard'])) {
			$donne['cardNumber'] = $_POST['numeCard'];
		}else{
			$message[]='merci de mettre un numéro de carte';
		}
	}else{
		$donne['card'] = 0
		$donne['cardNumber'] = null;
	}

	if (empty($message)){
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
    	$message[]='le client est bien ajouté';
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
<?php foreach ($message as $key => $value) {
	echo "<li class="$key">'$value'</li>";
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