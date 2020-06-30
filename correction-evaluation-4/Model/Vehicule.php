<?php

/**
 * 
 */

require_once 'Model.php';

class Vehicule extends Model
{
	
	private $id_vehicule;
	private $marque;
	private $modele;
	private $couleur;
	private $immatriculation;

	public function getIdVehicule()
	{
		return $this->id_vehicule;
	}
	
	public function getMarque()
	{
		return $this->marque;
	}
	
	public function setMarque($marque)
	{
		return $this->marque = $marque;
	}
	
	public function getModele()
	{
		return $this->modele;
	}
	
	public function setModele($modele)
	{
		return $this->modele = $modele;
	}

	public function getCouleur()
	{
		return $this->couleur;
	}
	
	public function setCouleur($couleur)
	{
		return $this->couleur = $couleur;
	}

	public function getImmatriculation()
	{
		return $this->immatriculation;
	}
	
	public function setImmatriculation($immatriculation)
	{
		return $this->immatriculation = $immatriculation;
	}


	public function findAll($table)
	{
		
 		/**
 		* je recupére dans ma variable baseDeDonne, les accés à la base
 		* NB: ma classe Conducteur hérite de Models
 		*/
 		$baseDeDonne = Model::getConnection();

 		/**
 		*	Je prépare ma requéte SQL qui va juste me recuperer toutes les informations dans ma table conducteur
 		*/

 		$sql =  $baseDeDonne->prepare("SELECT * FROM $table");

 		$sql->execute();

 		$resultat = $sql->fetchAll(PDO::FETCH_CLASS, 'Vehicule');
 		
 		return $resultat;
	}

	public function add($marque,$modele, $couleur, $immatriculation)
	{
		$connection_a_ma_base_de_donnnee = Model::getConnection();

		$requete = $connection_a_ma_base_de_donnnee->prepare("INSERT INTO vehicule (marque, modele, couleur, immatriculation) VALUES ('$marque', 'modele', 'couleur', 'immatriculation')");

		if(!$requete->execute()){
			die("Echec");
		}

		header("Location: index.php?action=vehicule");
	}

	public function edit()
	{
		var_dump('edit');
	}

	public function delete()
	{
		var_dump('Supp');
	}
}