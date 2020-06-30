<form method="post">

  <div class="form-group col-md-4">
      <label for="inputState">Conducteur</label>
      <select id="inputState" class="form-control" name="id_conducteur">
      	<?php
      		foreach ($listes_des_conducteurs as $conducteur) {
      			echo "<option selected value=".$conducteur->getidConducteur().">". $conducteur->getPrenom() ." ". $conducteur->getNom() ."</option>";
      		}
      	?>
      </select>
    </div>


	<div class="form-group col-md-4">
      <label for="inputState">Véhicule</label>
      <select id="inputState" class="form-control" name="id_vehicule">
        <option selected>Choose...</option>
        <?php
      		foreach ($listes_des_vehicules as $vehicule) {
      			echo "<option selected value=".$vehicule->getIdVehicule().">". $vehicule->getMarque() ." ". $vehicule->getModele() ."</option>";
      		}
      	?>
      </select>
    </div>

  <button type="submit" class="btn btn-primary" name="submit">Ajouter ce conducteur</button>
</form>