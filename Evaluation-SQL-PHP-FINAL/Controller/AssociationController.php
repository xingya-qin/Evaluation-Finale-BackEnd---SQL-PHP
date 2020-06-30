<?php

require_once './Models/Association.php';
require_once './Models/Models.php';

/**
 * 
 */
class AssociationController extends Models
{
	public function association()
	{
		if(isset($_POST['submit'])){
	    	$association = new Association();
	        $vehicule = $vehicule->setVehicule_id($_POST['id_vehicule']);
	        $conducteur = $association->setConducteur_id($_POST['id_conducteur']);

            $association->addAssociation($vehicule, $conducteur);
        }

		$listes_conducteurs = Models::findAllArticles();
		$listes_vehicules = Models::findAllVehicules();

		require_once "./Views/Association/addAssociation.php";
	}

	public function listAssociation()
	{
		$association = new Association();
		$afficher = $association->showAssociation();

		require_once "./Views/Association/association.php";
	}
}