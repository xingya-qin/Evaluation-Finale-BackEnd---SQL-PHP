<?php

/**
 * 
 */

require_once 'Model.php';

class Association extends Model
{
	private $id_association;
	private $id_conducteur;
	private $id_vehicule;

	public function getIdAssociation()
	{
		return $this->id_association;
	}

	public function getIdConducteur()
	{
		return $this->id_conducteur;
	}

	public function setIdConducteur($conducteur)
	{
		return $this->id_conducteur = $conducteur;
	}
	

	public function getIdVehicule()
	{
		return $this->id_vehicule;
	}

	public function setIdVehicule($vehicule)
	{
		return $this->id_vehicule = $vehicule;
	}

	public function showAssociation()
	{
		$connection_a_ma_base_de_donnnee = Model::getConnection();

		$sql = $connection_a_ma_base_de_donnnee->prepare("SELECT * FROM association_vehicule_conducteur assoc JOIN vehicule v ON assoc.id_vehicule = v.id_vehicule JOIN conducteur c ON c.id_conducteur = assoc.id_conducteur");


		$sql->execute();

		$resultat = $sql->fetchAll(PDO::FETCH_CLASS, 'Association');

		return $resultat;
	}

	public function findAll($table)
	{
		$connection_a_ma_base_de_donnnee = Model::getConnection();

		$sql = $connection_a_ma_base_de_donnnee->prepare("SELECT * FROM $table");

		$sql->execute();

		$resultat = $sql->fetchAll(PDO::FETCH_CLASS, $table);

		return $resultat;
	}

	public function add($conducteur, $vehicule)
	{
		$connection_a_ma_base_de_donnnee = Model::getConnection();

		$requete = $connection_a_ma_base_de_donnnee->prepare("INSERT INTO association_vehicule_conducteur (id_conducteur, id_vehicule) VALUES ('$conducteur', '$vehicule')");

		if(!$requete->execute()){
			die("Echec");
		}

		header("Location: index.php?action=association");
	}


	public function edit()
	{
		
	}

	public function delete()
	{
		
	}
}