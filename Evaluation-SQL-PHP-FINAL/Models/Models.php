<?php

/**
 * 
 */
class Models
{
	
	//Connection à la base **/
    public function getConnection()
    {
        try {
            $db = new PDO('mysql:host=localhost;dbname=vtc', "root", "");
        }
        catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
        return $db;
    }

    //get Articles

    public function findAllArticles() {
        $db = $this->getConnection();
        $conducteur = $db->prepare("SELECT * FROM conducteur");
        $conducteur->execute();
        $conducteur = $conducteur->fetchAll(PDO::FETCH_CLASS, "Conducteur");
        return $conducteur;
    }

    //get Abonné

    public function findAllVehicules() {
        $db = $this->getConnection();
        $vehicule = $db->prepare("SELECT * FROM vehicule");
        $vehicule->execute();
        $vehicule = $vehicule->fetchAll(PDO::FETCH_CLASS, "Vehicule");
        return $vehicule;
    }

    /* METHODES */
    public static function nb(){
        $db = $this->getConnection();
        $vehicule = $db->prepare("SELECT * FROM vehicule");
        $vehicule->execute();
        $vehicule = $vehicule->fetchAll(PDO::FETCH_CLASS, "Vehicule");
        return $vehicule;

    }
}
