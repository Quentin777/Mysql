<?php
	$message = [];

if (isset($_POST) && !empty($_POST)) {
	$donner=[];

	if (isset($_POST["nom"]) && $_POST['nom']!='') {
			$donner['lastname'] = $_POST["nom"];
		}else{
			$erreur[] = 'merci de mettre un nom';
		}
		if (isset($_POST["prenom"]) && $_POST['prenom']!='') {
			$donner['firstName'] = $_POST["prenom"];
		}else{
			$erreur[] = 'merci de mettre un prenom';
		}
		if (isset($_POST["naissance"]) && $_POST['naissance']!='') {
			$donner['birthDate'] = $_POST["naissance"];
		}else{
			$erreur[] = 'merci de mettre une date naissance';
		}
		if (isset($_POST["card"])) {
			$donner['card'] = 1;
		
				if (isset($_POST["numeCard"])) {
				$donner['cardNumber'] = $_POST["numeCard"];
				}else{
				$erreur[] = 'merci de mettre un numéro carte';
				}
		}else{
			$donner['card'] = 0;
			$donner['cardNumber'] = null;
		}

if (empty($erreur)) {
			/*INSERT TO INTO nomdelatable SET*/
			$statement = $pdo->prepare("
				INSERT INTO clients
				SET lastname = :lastname,
				firstName = :firstName,
				birthDate = :birthDate,
				card = :card,
				cardNumber = :cardNumber");
/*			echo "<pre>";
var_dump($donner);*/
			$statement->execute($donner);
$erreur[] = "<div class='list-group-item list-group-item-success'>le client est bien ADD'</div>";
			
		}
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
<ul>

<?php foreach ($message as $key => $tableau) {
		foreach ($erreur as $value) {
			echo "<li class='list-group-item list-group-item-danger'> $value <li> <br>" ;
	}
}
?>
</ul>
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