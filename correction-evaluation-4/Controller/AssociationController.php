<?php

/**
 * 
 */

require_once './Model/Association.php';
require_once './Model/Vehicule.php';

class AssociationController
{
	
	public function listAssociation()
	{
		$assocation = new Association();

		$afficher_association = $assocation->showAssociation();

		require_once './View/Association/list_association_vehicule_conducteur.php';

	}

	public function addAssociation()
	{
		$association =  new Association();

		if (isset($_POST['submit'])) {
			$conducteur = $association->setIdConducteur($_POST['id_conducteur']);
			$vehicule = $association->setIdVehicule($_POST['id_vehicule']);

			$association->add($conducteur, $vehicule);

			var_dump($conducteur, $vehicule);die;
		}

		

		$listes_des_conducteurs = $association->findAll('conducteur');

		$listes_des_vehicules= $association->findAll('vehicule');

		require_once './View/Association/ajout_nouvelle_association.php';
	}

}