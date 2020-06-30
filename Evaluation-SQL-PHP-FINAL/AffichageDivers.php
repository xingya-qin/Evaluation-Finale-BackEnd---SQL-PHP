<?php
require 'Views/header.html';
 $pdo = new PDO('mysql:host=localhost;dbname=vtc','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

?>
    <div>

      <h1>Affichage divers</h1>

      <p>Afficher le nombre de conducteurs :</p>
      <?php
       
        $sql = $pdo->query("SELECT COUNT(*) FROM conducteur");
        $result = $sql->fetch(PDO::FETCH_ASSOC);
          foreach ($result as $value) {
            echo $value;
           }
      ?>
      
      <hr>

      <p>Afficher le nombre de vehicules :</p>

      <?php
      $sql = $pdo->query("SELECT COUNT(*) FROM vehicule");
      $result = $sql ->fetch(PDO::FETCH_ASSOC);
          foreach ($result as $value) {
            echo $value;
           }
        
      ?>
      <hr class="separate">

      <p>Afficher le nombre d’associations :</p>
      <?php
      $sql = $pdo->query('SELECT COUNT(*) FROM association_vehicule_conducteur');
      $result = $sql->fetch(PDO::FETCH_ASSOC);
      foreach ($result as $value) {
            echo $value;
           }
      ?>
      <hr>

      <p>Afficher les vehicules n’ayant pas de conducteur :</p>

      <?php
      $sql= $pdo->query('SELECT ass.*, veh.* FROM (vtc.association_vehicule_conducteur ass 
      RIGHT OUTER JOIN vtc.vehicule veh ON ass.id_vehicule = veh.id_vehicule)
      WHERE ass.id_association IS NULL');
      $results = $sql->fetchAll(PDO::FETCH_ASSOC);
      ?>
      <table class="table mt-5">
       <thead>
        <tr>
          <th scope="col">Id_vehicule </th>
          <th scope="col">Marque </th>
          <th scope="col">Modele </th>
          <th scope="col">Couleur </th>
          <th scope="col">Immatriculation </th>   
        </tr>
       </thead>
       <tbody>
        <?php 
        foreach ($results as $result){
          echo  "<tr>";
          echo  "<td>".$result['id_vehicule']."</td>";
          echo  "<td>".$result['marque']."</td>";
          echo  "<td>".$result['modele']."</td>";
          echo  "<td>".$result['couleur']."</td>";
          echo  "<td>".$result['immatriculation']."</td>";        
          echo "</tr>";
             }
          ?>
          </tbody>
        </table>
      
      <hr>

      <p>Afficher les conducteurs n’ayant pas de vehicule :</p>

      <?php
      $sql = $pdo->query('SELECT ass.*, con.* FROM (vtc.association_vehicule_conducteur ass 
      RIGHT OUTER JOIN vtc.conducteur con ON ass.id_conducteur = con.id_conducteur)
      WHERE ass.id_association IS NULL');
      $results = $sql->fetchAll(PDO::FETCH_ASSOC);
      ?>
        <table class="table mt-5">
       <thead>
        <tr>
          <th scope="col">Id_conducteur </th>
          <th scope="col">Prenom</th>
          <th scope="col">Nom</th>  
        </tr>
       </thead>
       <tbody>
        <?php 
        foreach ($results as $result){
          echo  "<tr>";
          echo  "<td>".$result['id_conducteur']."</td>";
          echo  "<td>".$result['prenom']."</td>";
          echo  "<td>".$result['nom']."</td>";       
          echo "</tr>";
             }
          ?>
          </tbody>
        </table>

      <hr>

      <p>Afficher les vehicules conduit par << Philippe Pandre>> :</p>
      <?php
      $sql = $pdo->query('SELECT * FROM (vtc.association_vehicule_conducteur
      INNER JOIN vtc.conducteur ON association_vehicule_conducteur.id_conducteur = conducteur.id_conducteur)
      INNER JOIN vtc.vehicule ON association_vehicule_conducteur.id_vehicule = vehicule.id_vehicule');
      $results = $sql->fetchAll(PDO::FETCH_ASSOC);
      ?>
       <table class="table mt-5">
       <thead>
        <tr>
          <th scope="col">Id_vehicule </th>
          <th scope="col">Marque </th>
          <th scope="col">Modele </th>
          <th scope="col">Couleur </th>
          <th scope="col">Immatriculation </th>   
        </tr>
       </thead>
       <tbody>
        <?php 
        foreach ($results as $result){

          if (($result['prenom'] == 'Philippe') and ($result['nom'] == 'Pandre'))
        {
          echo  "<tr>";
          echo  "<td>".$result['id_vehicule']."</td>";
          echo  "<td>".$result['marque']."</td>";
          echo  "<td>".$result['modele']."</td>";
          echo  "<td>".$result['couleur']."</td>";
          echo  "<td>".$result['immatriculation']."</td>";        
          echo "</tr>";
             }
          }   
          ?>
          </tbody>
        </table>

      <hr>
      <p>Afficher tous les conducteurs (meme ceux qui n'ont pas de correspondance) ainsi que les vehicules :</p>

      <?php
    
      $sql = $pdo->query('SELECT C.*, V.* from conducteur as c LEFT JOIN association_vehicule_conducteur as A ON A.id_conducteur = c.id_conducteur LEFT JOIN vehicule as V ON V.id_vehicule = A.id_vehicule');

      $results = $sql->fetchAll(PDO::FETCH_ASSOC);
      ?>
       <table class="table mt-5">
       <thead>
        <tr>
          <th scope="col">Modele</th>
          <th scope="col">Prenom</th> 
        </tr>
       </thead>
       <tbody>
        <?php 
        foreach ($results as $result){

          echo  "<tr>";
          if (isset($result['modele'])) {
              echo "<td>" .$result['modele']."</td>";
            };
          echo  "<td>".$result['prenom']."</td>"; 
          echo "</tr>";
             }
          ?>
          </tbody>
        </table>

      <hr>

      <p>Afficher les conducteurs et tous les vehicules (meme ceux qui n'ont pas de correspondance) :</p>

      <?php
      $sql = $pdo->query('SELECT C.*, V.* from vehicule as V LEFT JOIN association_vehicule_conducteur as A ON A.id_vehicule = V.id_vehicule LEFT JOIN conducteur as C ON C.id_conducteur = A.id_conducteur');
      $results = $sql->fetchAll(PDO::FETCH_ASSOC);
      ?>
       <table class="table mt-5">
       <thead>
        <tr>
          <th scope="col">Modele</th>
          <th scope="col">Prenom</th> 
        </tr>
       </thead>
       <tbody>
        <?php 
        foreach ($results as $result){

          echo  "<tr>";
          echo  "<td>".$result['modele']."</td>"; 
          if (isset($result['prenom'])) {
              echo "<td>" .$result['prenom']."</td>";
            };
          echo "</tr>";
             }
          ?>
          </tbody>
        </table>
     
      <hr>

      <p>Afficher tous les conducteurs et tous les vehicules, peu importe les correspondances :</p>

      <?php

      $sql = $pdo->query('SELECT V.modele, C.prenom from conducteur as C LEFT JOIN association_vehicule_conducteur AS A ON C.id_conducteur = A.id_conducteur LEFT JOIN vehicule AS V ON V.id_vehicule = A.id_vehicule
      UNION
      SELECT V.modele, C.prenom from vehicule as V LEFT JOIN association_vehicule_conducteur AS A ON V.id_vehicule = A.id_vehicule LEFT JOIN conducteur AS C ON C.id_conducteur = A.id_conducteur');

      $results = $sql->fetchAll(PDO::FETCH_ASSOC);
       ?>
       <table class="table mt-5">
       <thead>
        <tr>
          <th scope="col">Modele</th>
          <th scope="col">Prenom</th> 
        </tr>
       </thead>
       <tbody>
        <?php 
        foreach ($results as $result){

          echo  "<tr>";
          if (isset($result['modele'])) {
              echo "<td>" .$result['modele']."</td>";
            }
             else { 
              echo "<td> NULL </td>";
            };

          if (isset($result['prenom'])) {
            echo "<td>" .$result['prenom']. "</td>";
          }
            else { 
              echo "<td> NULL </td>";
            };
          echo "</tr>";
             }
          ?>
          </tbody>
        </table>
<?php
	require_once 'Views/footer.html';
?>

