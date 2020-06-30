<?php
 /**
  * 
  */
 class Conducteur
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

  public function setPrenom($value)
  {
    return $this->prenom = $value;
  }
  public function getNom()
  {
    return $this->nom;
  }

  public function setNom($value)
  {
    return $this->nom = $value;
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

 	public function nb()
 	{
 		$baseDeDonne = $this->accesBaseDeDonnee();
 		$sql = $baseDeDonne->prepare("SELECT COUNT(*) FROM conducteur");

 		return $sql->execute();

 	}

 	public function afficherTousLesConducteurs()
 	{
 		$baseDeDonne = $this->accesBaseDeDonnee();
 		$sql = $baseDeDonne->prepare("SELECT * FROM conducteur");

 		$sql->execute();

 		$resultat = $sql->fetchAll(PDO::FETCH_CLASS, 'Conducteur');
 		
 		return $resultat;
 	}

 	public function insert ($prenom, $nom)
 	{
 		$baseDeDonne = $this->accesBaseDeDonnee();
 		$requete = $baseDeDonne->prepare(" INSERT INTO conducteur (prenom, nom) VALUES ('$prenom', '$nom')");

 		if(!$requete->execute()){
 			die("Houps, une erreur");
 		}

 		header("Location: index.php");
 	}

 	public function findById($id_conducteur)
 	{
 		$baseDeDonne = $this->accesBaseDeDonnee();
 		$sql = $baseDeDonne->prepare("SELECT * FROM conducteur WHERE id= ".$id_conducteur);

 		$sql->execute();

 		$getResultat = $sql->fetchAll(PDO::FETCH_CLASS, 'Conducteur');

 		return $getResultat;
 	}

 	public function update($id_conducteur, $prenom, $nom)
 	{
 		$baseDeDonne = $this->accesBaseDeDonnee();
 		$sql = $baseDeDonne->prepare("UPDATE conducteur SET prenom = '".$prenom."', nom = '" .$nom."' WHERE id = " .$id_conducteur);

 		if(!$sql->execute()){
 			die("Houps, une erreur");
 		}

 		header("Location: index.php");
 	}

 	//****DELETE ****/
    public function deleteById($id_conducteur) {
        $db = $this->accesBaseDeDonnee();
        $conducteur = $db->prepare("DELETE FROM conducteur WHERE id = ".$id_conducteur);

        if(!$conducteur->execute()){
 			die("Houps, une erreur");
 		}

 		header("Location: index.php");
    }
 }