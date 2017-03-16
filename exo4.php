<?php
  $message = [];
   $donnee = [];
      $pdo= new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8','root','');
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
   $statement=$pdo->query('SELECT * FROM shows');
   $test= $statement->fetchAll();
    $statement=$pdo->query('SELECT * FROM genres');
   $genresspe = $statement->fetchAll();

  if(isset($_POST)&& !empty($_POST)){
   

      if(isset($_POST['nom']) && $_POST['nom']!='') {
          $donnee['title'] = $_POST['nom'];
      }else{
          $message['danger'][] = 'Merci de mettre un nom';
      }
      if(isset($_POST['prenom']) && $_POST['prenom']!='') {
          $donnee['performer'] = $_POST['prenom'];
      }else{
          $message['danger'][] = 'Merci de mettre un prénom';
      }
      if(isset($_POST['date'])) {
          $donnee['date'] = $_POST['date'];
      }else{
          $message['danger'][] = 'Merci de mettre une date de naissance';
      }
      if(isset($_POST['card'])) {
          $donnee['card'] = 1;
          if(isset($_POST['cardNumber'])){
              $donnee['cardNumber'] = $_POST['cardNumber'];
          }else{
              $message['danger'][] = 'Merci de mettre un numéro de carte';
          }
      }else{
          $donnee['card'] = 0;
          $donnee['cardNumber'] = null;
      }    
 

  if(empty($message)){

      $req = $pdo->prepare("INSERT INTO show
                            SET title= :title,
                            performer= :performer,
                            date= :date,
                            startTime = :startTime,
                            ");
      $req->execute($donnee);

      $message['success'][] = 'le client est bien ajouté';


   
  }
}
?>
<!DOCTYPE html>
<html>
<head>
<a href="index2.php">RETOUR</a>
  <link rel="stylesheet" type="text/css" href="style/style.css">
  <title>Ajout client</title>
</head>
<body>
  <ul>
      <?php
           foreach ($message as $key => $tableau) {
                  foreach ($tableau as $value) {
                      echo "<li class=\"$key\">$value</li>";
              }
          }
      ?>
  </ul>
  <form method="post" action="">
      <label for="titre">quel est le titre du spectacle</label>
      <select name=''>
        <?php
               foreach ($test as $value) {
                   echo '<option value="'.$value->id.'">'.$value->title.'</option>';
               }
           ?>
      </select>
      <label for="artiste">Quel est l'artiste</label>
      <select name=''>
        <?php
               foreach ($test as $value) {
                   echo '<option value="'.$value->id.'">'.$value->performer.'</option>';
               }
           ?>
      </select>

      <label for="artiste">genre</label>
       <select name=''>
        <?php
               foreach ($genresspe as $value) {
                   echo '<option value="'.$value->id.'">'.$value->genre.'</option>';
               }
           ?> 
      </select>

      <label for="artiste">genre2</label>
       <select name=''>
        <?php
               foreach ($genresspe as $value) {
                   echo '<option value="'.$value->id.'">'.$value->genre.'</option>';
               }
           ?>
      </select>



      <label for="artiste">Date du spectacle</label>
       <select name=''>
        <?php
               foreach ($test as $value) {
                   echo '<option value="'.$value->id.'">'.$value->date.'</option>';
               }
           ?>
      </select>

       <label for="artiste">heure du spectacle</label>
       <select name=''>
        <?php
               foreach ($test as $value) {
                   echo '<option value="'.$value->id.'">'.$value->startTime.'</option>';
               }
           ?>
      </select>
      <button type="submit">ok</button>
  </form>


</body>
</html>