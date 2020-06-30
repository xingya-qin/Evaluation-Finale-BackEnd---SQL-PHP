<?php

/**
 * 
 */

require_once 'Model.php';

class Conducteur extends Model
{
	private $id_conducteur;
	private $prenom;
	private $nom;

	public function getIdConducteur()
	{
		return $this->id_conducteur;
	}

	public function getPrenom()
	{
		return $this->prenom;
	}

	public function setPrenom($prenom)
	{
		return $this->prenom = $prenom;
	}

	public function getNom()
	{
		return $this->nom;
	}

	public function setNom($nom)
	{
		return $this->nom = $nom;
	}

	public function findAll($table)
	{
		$connection_a_ma_base_de_donnnee = Model::getConnection();

		$sql = $connection_a_ma_base_de_donnnee->prepare("SELECT * FROM $table");

		$sql->execute();

		$resultat = $sql->fetchAll(PDO::FETCH_CLASS, 'Conducteur');

		return $resultat;
 		
	}

	public function add($prenom, $nom)
	{
		$connection_a_ma_base_de_donnnee = Model::getConnection();

		$requete = $connection_a_ma_base_de_donnnee->prepare("INSERT INTO conducteur (prenom, nom) VALUES ('$prenom', '$nom')");

		if(!$requete->execute()){
			die("Echec");
		}

		header("Location: index.php");
	}


	public function edit()
	{
		
	}

	public function delete()
	{
		
	}
}