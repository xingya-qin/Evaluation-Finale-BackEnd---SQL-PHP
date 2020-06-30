<?php

require './Models/Vehicule.php';

class VehiculeController
{
	
	public function nbVehicules()
	{
		$vehicule = new Vehicule();
		
		return $nbVehicules;
	}
	public function afficherLesVehicules()
	{
		$vehicule = new Vehicule();
		$afficher = $vehicule->afficherTousLesVehicules();


		$nbVehicules = $vehicule->nb();
		
		require_once "./Views/Vehicule/vehicule.php";
	}

	public function ajoutVehicule()
	{
		if(isset($_POST['submit'])){
			$vehicule = new Vehicule();

			$marque = $vehicule->setMarque($_POST['marque']);
			$modele = $vehicule->setModele($_POST['modele']);
            $couleur = $vehicule->setCouleur($_POST['couleur']);
            $immatriculation = $vehicule->setImmatriculation($_POST['immatriculation']);

			$vehicule->insert ($marque, $modele, $couleur, $immatriculation);
		}
		?>

	
		<form action="#" method="post">
		  <div class="form-group mt-5">
		    <label>Marque</label>
		    <input type="text" class="form-control" name="marque" required>
		  </div>
		  <div class="form-group">
		    <label>Modele</label>
		    <input type="text" class="form-control" name="modele" required>
		  </div>

		  <div class="form-group">
		    <label>Couleur</label>
		    <input type="text" class="form-control" name="couleur">
		  </div>
		  <div class="form-group">
		    <label>Immatriculation</label>
		    <input type="text" class="form-control" name="immatriculation">
		  </div>
		  <button type="submit" class="btn  btn-outline-secondary text-dark" name="submit">Ajouter ce vehicule</button>
		</form>

		<?php
	}

	public function show($id_vehicule)
	{
		$vehicule = new Vehicule();
		$vehiculeById = $vehicule->findById($id_vehicule);

		require_once "./Views/Vehicule/addVehicule.php";

		if (isset($_POST['submit'])) {
			foreach ($vehiculeById as $value) {
				$marque = $value->setMarque($_POST['marque']);
				$modele = $value->setModele($_POST['modele']);
				$couleur = $value->setCouleur($_POST['couleur']);
				$immatriculation = $vehicule->setImmatriculation($_POST['immatriculation']);

				$id_vehicule =  $value->getIdVehicule();

				return $value->update($id_vehicule, $marque, $modele, $couleur, $immatriculation);
			}
		}
	}

	/**** SUPPRIMER UN LIVRE VIA SON ID ***/

	public function delete($id_vehicule)
	{
		$vehicule = new Conducteur();
		return $vehicule->deleteById($id_vehicule);
	}


}