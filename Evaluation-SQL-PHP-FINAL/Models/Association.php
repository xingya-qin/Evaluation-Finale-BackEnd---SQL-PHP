<?php

/**
 * 
 */
class Association
{
	public $id_association;
	private $id_vehicule;
	private $id_conducteur;

  public function getAssociation_id(){
    return $this->id_association;
  }

	public function getVehicule_id(){
		return $this->id_vehicule;
	}

	public function setVehicule_id($id_vehicule){
		return $this->id_vehicule = $id_vehicule;
	}

	public function getConducteur_id(){
		return $this->id_conducteur;
	}

	public function setConducteur_id($conducteur_id){
		return $this->id_conducteur = $id_conducteur;
	}

	public function accesBaseDeDonnee()
   	{
   		try{
  			$db =new PDO('mysql:host=localhost;dbname=vtc', "root", "");
  		}
  		catch(PDOException $e){
  			print "Erreur!";
  			die;
  		}
  		return $db;
   }

   /** SHOW LISTE DES ABONNES **/
  public function showAssociation()
  {
    $baseDeDonne = $this->accesBaseDeDonnee();
    //$sql = $baseDeDonne->prepare("SELECT * FROM emprunt");
    $sql = $baseDeDonne->prepare("SELECT * FROM vtc.association_vehicule_conducteur 
    	INNER JOIN vtc.vehicule ON association_vehicule_conducteur.id_vehicule = vehicule.id_vehicule
    	INNER JOIN vtc.conducteur ON association_vehicule_conducteur.id_conducteur = conducteur.id_conducteur");

    //var_dump($sql);die;
    $sql->execute();

    $resultat = $sql->fetchAll(PDO::FETCH_CLASS, 'Association');
    return $resultat;
  }

  /** Ajout nouvel abonne */
   public function addAssociation($id_vehicule, $id_conducteur)
  {
    $baseDeDonne = $this->accesBaseDeDonnee();
    $requete = $baseDeDonne->prepare(" INSERT INTO association_vehicule_conducteur (id_vehicule, id_conducteur) VALUES ('$id_vehicule', '$id_conducteur')");

    if(!$requete->execute()){
      die("Houps, une erreur");
    }

    header("Location: index.php?action=listEmprunt");
  }
}