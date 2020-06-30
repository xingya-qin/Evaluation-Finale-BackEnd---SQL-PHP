<table class="table">
  <thead>
    <tr>
      <th scope="col">id_association</th>
      <th scope="col">Conducteur</th>
      <th scope="col">Véhicule</th>
      <th scope="col">Modification</th>
      <th scope="col">Supprimer</th>
    </tr>
  </thead>
  <tbody>
   <?php
   		foreach ($afficher_association as $association) {
   			
   			echo "<tr>";
   			echo "<td>" .$association->getIdAssociation(). "</td>";
   			echo "<td>" . $association->prenom ." " . $association->nom ."</td>";
   			echo "<td>" .$association->marque. " ".$association->modele."</td>";
   			echo "<td> <img src='./Public/images/edit.png' width=40></td>";
   			echo "<td> <img src='./Public/images/delete.png' width=40></td>";
   			echo "</tr>";
   		}
   ?>
  </tbody>
</table>