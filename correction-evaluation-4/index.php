<?php

require_once 'View/header.html';
require_once 'Controller/ConducteurController.php';

require_once 'Controller/VehiculeController.php';

require_once 'Controller/AssociationController.php';

$conducteur = new ConducteurController();

$vehicule = new VehiculeController();

$association = new AssociationController();

if (isset($_GET['action'])) {
	if($_GET['action'] == 'vehicule'){
		$vehicule->listVehicule();
		$vehicule->addVehicule();
	}
	elseif ($_GET['action'] == 'association') {
		$association->listAssociation();
		$association->addAssociation();
	}
}else{
	$conducteur->listConducteur();
	$conducteur->addConducteur();
}
