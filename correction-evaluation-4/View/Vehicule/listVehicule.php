<table class="table">
  <thead>
    <tr>
      <th scope="col">id_vehicule</th>
      <th scope="col">Marque</th>
      <th scope="col">Modéle</th>
      <th scope="col">Couleur</th>
      <th scope="col">Immatriculation</th>
    </tr>
  </thead>
  <tbody>
   <?php
   		foreach ($tous_les_vehicules as $vehicule) {
   			
   			echo "<tr>";
   			echo "<td>" .$vehicule->getIdvehicule(). "</td>";
   			echo "<td>" .$vehicule->getMarque(). "</td>";
   			echo "<td>" .$vehicule->getModele(). "</td>";
   			echo "<td>" .$vehicule->getCouleur(). "</td>";
   			echo "<td>" .$vehicule->getImmatriculation(). "</td>";
   			echo "<td> <img src='./Public/images/edit.png' width=40></td>";
   			echo "<td> <img src='./Public/images/delete.png' width=40></td>";
   			echo "</tr>";
   		}
   ?>
  </tbody>
</table>