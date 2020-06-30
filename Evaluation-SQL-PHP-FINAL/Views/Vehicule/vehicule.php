<table class="table mt-5">
  <thead>
    <tr>
      <th scope="col">Id_vehicule </th>
      <th scope="col">Marque </th>
      <th scope="col">Modele </th>
      <th scope="col">Couleur </th>
      <th scope="col">Immatriculation </th>
      <th scope="col">Modification </th>
      <th scope="col">Suppresion </th>

    </tr>
  </thead>
  <tbody>
    <?php
    /**
    * Je crée un dossier ressources pour y mettre mes images, css et js

    */
      foreach ($afficher as $vehicule) {
        echo "<tr>";
        echo "<td>" .$vehicule->getIdVehicule(). "</td>";
        echo "<td>" .$vehicule->getMarque(). "</td>";
        echo "<td>" .$vehicule->getModele(). "</td>";
        echo "<td>" .$vehicule->getCouleur(). "</td>";
        echo "<td>" .$vehicule->getImmatriculation(). "</td>";
        echo "<td> <a href='?action=edit&vehiculeId=".$vehicule->getIdVehicule()."'><img width='20' src='./Ressources/images/update.png'></a></td>";
        echo "<td> <a class='deleteVehicule' href='#delete".$vehicule->getIdVehicule()."'><img width='20' src='./Ressources/images/delete.png'></a></td>";
        echo "</tr>";
      }
    ?>
  </tbody>
</table>
<button><a href="?action=addAbonne">Ajouter ce vehicule</a></button>