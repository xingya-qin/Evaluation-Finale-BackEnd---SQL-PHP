<table class="table mt-5">
  <thead>
    <tr>
      <th scope="col">Id_conducteur </th>
      <th scope="col">Prenom </th>
      <th scope="col">Nom </th>
      <th scope="col">Modification </th>
      <th scope="col">Suppresion </th>
    </tr>
  </thead>
  <tbody>
    <?php
    /**
    * Je crée un dossier ressources pour y mettre mes images, css et js

    */
    	foreach ($afficher as $conducteur) {
	    	echo "<tr>";
        echo "<td>" .$conducteur->getIdConducteur(). "</td>";
	    	echo "<td>" .$conducteur->getPrenom(). "</td>";
	    	echo "<td>" .$conducteur->getNom(). "</td>";
	    	echo "<td> <a href='?action=edit&conducteurId=".$conducteur->getIdConducteur()."'><img width='20' src='./Ressources/images/update.png'></a></td>";
        echo "<td> <a class='deleteconducteur' href='#delete".$conducteur->getIdConducteur()."'><img width='20' src='./Ressources/images/delete.png'></a></td>";
	    	echo "</tr>";
    	}
    ?>
  </tbody>
</table>

<button><a href="?action=ajouter">Ajouter ce conducteur</a></button>