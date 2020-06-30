<table class="table">
  <thead>
    <tr>
      <th scope="col">id_conducteur</th>
      <th scope="col">Prénom</th>
      <th scope="col">Nom</th>
      <th scope="col">Modification</th>
      <th scope="col">Supprimer</th>
    </tr>
  </thead>
  <tbody>
   <?php
   		foreach ($tous_les_conducteurs as $conducteur) {
   			
   			echo "<tr>";
   			echo "<td>" .$conducteur->getIdConducteur(). "</td>";
   			echo "<td>" .$conducteur->getPrenom(). "</td>";
   			echo "<td>" .$conducteur->getNom(). "</td>";
   			echo "<td> <img src='./Public/images/edit.png' width=40></td>";
   			echo "<td> <img src='./Public/images/delete.png' width=40></td>";
   			echo "</tr>";
   		}
   ?>
  </tbody>
</table>