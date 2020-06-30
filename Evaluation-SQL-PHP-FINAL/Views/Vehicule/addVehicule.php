<?php  foreach ($vehiculeById as $vehicule)
  { ?>
 
 <form action="#" method="post">
    <div class ="row">
        <div class="form-group col-6">
            <label>Marque</label>
            <input type="text" class="form-control" placeholder="marque" name="marque" required value="<?php echo $vehicule->getMarque(); ?>"> 
        </div>
        <div class="form-group col-6">
            <label>Modele</label>
            <input type="text" class="form-control"  placeholder="modele" name="modele" required value="<?php echo $vehicule->getModele(); ?>"> 
        </div>
    </div>
    <div class ="row">    
        <div class="form-group col-6">
            <label>Couleur</label>
            <input type="text" class="form-control"  placeholder="couleur" name="couleur" required value="<?php echo $vehicule->getCouleur(); ?>"> 
        </div>
        <div class="form-group col-6">
            <label>Immatriculation</label>
            <input type="text" class="form-control"  placeholder="immatriculation" name="immatriculation" required value="<?php echo $vehicule->getImmatriculation(); ?>">
        </div>
    </div>
  <button type="submit" class="btn btn-outline-secondary text-dark mb-5" name="submit">Ajouter ce vehicule </button>
</form>

  <?php } ?>