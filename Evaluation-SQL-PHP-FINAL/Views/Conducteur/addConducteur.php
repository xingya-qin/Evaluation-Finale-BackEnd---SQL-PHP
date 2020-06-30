<?php
	foreach ($conducteurById as $conducteur) {
		?>
			<form action="#" method="post">
			  <div class="form-group mt-5">
			    <label>Prenom</label>
			    <input type="text" class="form-control" name="prenom" required value="<?php echo $conducteur->getPrenom(); ?>">
			  </div>
			  <div class="form-group">
			    <label>Nom</label>
			    <input type="text" class="form-control" name="nom" required value="<?php echo $conducteur->getNom(); ?>">
			  </div>
 
			  <button type="submit" class="btn btn-outline-secondary text-dark" name="submit">Submit</button>
			</form>
		
		<?php 
	}