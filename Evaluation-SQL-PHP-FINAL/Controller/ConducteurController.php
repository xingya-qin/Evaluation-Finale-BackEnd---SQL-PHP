<?php

require './Models/Conducteur.php';

class ConducteurController
{
	public function nbConducteurs()
	{
		$conducteur = new Conducteur();
		
		return $nbConducteurs;
	}

	public function afficherLesConducteurs()
	{
		$conducteur = new Conducteur();
		$afficher = $conducteur->afficherTousLesConducteurs();


		$nbConducteurs = $conducteur->nb();
		
		require_once "./Views/Conducteur/conducteur.php";
	}

	public function ajoutConducteur()
	{
		if(isset($_POST['submit'])){
			$conducteur = new Conducteur();

			$prenom = $conducteur->setPrenom($_POST['prenom']);
			$nom = $conducteur->setNom($_POST['nom']);
			

			$conducteur->insert($prenom, $nom);
		}
		?>

		
		<form action="#" method="post">
		  <div class="form-group mt-5">
		    <label>Prenom</label>
		    <input type="text" class="form-control" name="prenom" placeholder="prenom" required>
		  </div>
		  <div class="form-group">
		    <label>Nom</label>
		    <input type="text" class="form-control" name="nom" placeholder="nom" required>
		  </div>
		  <button type="submit" class="btn btn-outline-secondary text-dark" name="submit">Ajouter ce conducteur</button>
		</form>

		<?php
	}

	public function show($id_conducteur)
	{
		$conducteur = new Conducteur();
		$conducteurById = $conducteur->findById($id_conducteur);

		require_once "./Views/Conducteur/addConducteur.php";

		if (isset($_POST['submit'])) {
			foreach ($conducteurById as $value) {
				$prenom = $value->setPrenom($_POST['prenom']);
				$nom = $value->setNom($_POST['nom']);

				$id_conducteur = $value->getIdConducteur();

				return $value->update($id_conducteur, $prenom, $nom);
			}
		}
	}

	/**** SUPPRIMER UN LIVRE VIA SON ID ***/

	public function delete($id_conducteur)
	{
		$conducteur = new Conducteur();
		return $conducteur->deleteById($id_conducteur);
	}


}