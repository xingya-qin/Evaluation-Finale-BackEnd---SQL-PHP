<?php

/**
 * 
 */

require_once './Model/Conducteur.php';

class ConducteurController
{
	
	public function listConducteur()
	{
		$liste_des_conducteurs = new Conducteur();

		$tous_les_conducteurs = $liste_des_conducteurs->findAll('conducteur');

		require_once './View/Conducteur/listeConducteur.php';
	}

	public function addConducteur()
	{
		if(isset($_POST['submit'])){

			$conducteur = new Conducteur();
			$prenom = $conducteur->setPrenom($_POST['prenom']);
			$nom = $conducteur->setNom($_POST['nom']);
			
			$conducteur->add($prenom, $nom);
		}
		require_once './View/Conducteur/ajout_nouveau_conducteur.php';
	}
}