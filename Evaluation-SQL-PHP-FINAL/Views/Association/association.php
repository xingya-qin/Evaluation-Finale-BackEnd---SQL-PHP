<table class="table mt-5">
  <thead>
    <tr>
      <th scope="col">Id_association </th>
      <th scope="col">Conducteur </th>
      <th scope="col">Vehicule </th>
      <th scope="col">Modification </th>
      <th scope="col">Suppresion </th>
    </tr>
  </thead>
  <tbody>

    <?php
    /**
    * Je crée un dossier ressources pour y mettre mes images, css et js

    */
    	foreach ($afficher as $association) {

	    	echo "<tr>";
	    	echo "<td>" .$association->getAssociation_id(). "</td>";
	    	echo "<td>" .$association->prenom." - " .$association->nom. "<br>" .$association-> getConducteur_id(). "</td>";
        echo "<td>" .$association->marque." - " .$association->modele. "<br>" .$association-> getVehicule_id(). "</td>";
        echo "<td> <a href='?action=edit&livreId=".$association->getAssociation_id()."'><img width='20' src='./Ressources/images/update.png'></a></td>";
        echo "<td> <a class='deleteLivre' href='#delete".$association->getAssociation_id()."'><img width='20' src='./Ressources/images/delete.png'></a></td>";
	    	echo "</tr>";
    	}
    ?>
  </tbody>
</table>

<button><a href="?action=association">Ajouter ce association</a></button>