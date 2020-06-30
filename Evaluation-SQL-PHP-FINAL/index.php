<?php

require 'Views/header.html';
require_once 'Controller/ConducteurController.php';
require_once 'Controller/VehiculeController.php';
require_once 'Controller/AssociationController.php';

$conducteur = new ConducteurController();

/* Verification des informations des conducteurs */
if(isset($_GET['action'])){
	if ($_GET['action'] == 'ajouter') {
		$conducteur->ajoutConducteur();
	}
	elseif ($_GET['action'] == 'edit') {
		$conducteur->show($_GET['conducteurId']);
	}
	elseif ($_GET['action'] == 'delete') {
		$conducteur->delete($_GET['conducteurId']);
	}
}
else{
	$conducteur->afficherLesConducteurs();
}


/* Verification des informations des vehicules */
$vehicule = new VehiculeController();

/* Verification des informations de mon url */
if(isset($_GET['action'])){

	if ($_GET['action'] == 'Vehicule') {
		$vehicule->afficherLesVehicules();
	}
	if ($_GET['action'] == 'addAbonne') {
		$vehicule->ajoutVehicule();
	}
	elseif ($_GET['action'] == 'edit') {
		$vehicule->show($_GET['vehiculeId']);
	}
	elseif ($_GET['action'] == 'delete') {
		$vehicule->delete($_GET['vehiculeId']);
	}
}


/* Verification des informations des abonnes */
$association = new AssociationController();

if(isset($_GET['action'])){
	if ($_GET['action'] == 'association') {
		$association->association();
	}
	elseif ($_GET['action'] == 'listAssociation') {
		$association->listAssociation();
	}
}

require_once 'Views/footer.html';