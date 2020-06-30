<?php

/**
 * 
 */

require_once './Model/Vehicule.php';

class VehiculeController
{
	
	public function listVehicule()
	{
		$liste_des_vehicules = new Vehicule();

		$tous_les_vehicules = $liste_des_vehicules->findAll('vehicule');

		require_once './View/Vehicule/listVehicule.php';
	}

	public function addVehicule()
	{
		if(isset($_POST['submit'])){

			$vehicule = new Vehicule();
			$marque = $vehicule->setMarque($_POST['marque']);
			$modele = $vehicule->setModele($_POST['modele']);
			$couleur = $vehicule->setCouleur($_POST['couleur']);
			$immatriculation = $vehicule->setImmatriculation($_POST['immatriculation']);

			$vehicule->add($marque,$modele, $couleur, $immatriculation);
		}
		require_once './View/Vehicule/ajout_nouveau_vehicule.php';
	}
}