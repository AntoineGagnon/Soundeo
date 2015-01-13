<?php require_once("./Vue/Header.php"); ?>


<div id="contenu" class="container">
	
	<div class="row">
		<div class="col-md-9">
		<?php if($methode == "artiste"){ ?>

			<form action="index.php" method="post" accept-charset="utf-8">
				<fieldset>
					<legend>Ajouter un Artiste</legend>
					<div class="control-group">
						<label class="control-label" for="Nom">Nom</label>
						<div class="controls">
							<input id="Nom" name="Nom" type="text" placeholder="Nom" class="input-xlarge">					    
						</div>
						<label class="control-label" for="Prenom">Prenom</label>
						<div class="controls">
							<input id="Prenom" name="Prenom" type="text" placeholder="Prenom" class="input-xlarge">					    
						</div>
						<label class="control-label" for="submit"></label>
						<div class="controls">
							<button id="submit" name="submit" class="btn btn-primary">Valider</button>
						</div>
						<input type="hidden" name="action" value="ajouterArtiste">	
						<input type="hidden" name="form" value="1">		
					</div>						
				</fieldset>
			</form>	

		</div> 
		<?php } elseif($methode == "album"){ ?>
			<form action="index.php" method="post" accept-charset="utf-8">
				<fieldset>
					<legend>Ajouter un Album</legend>
					<div class="control-group">
						<label class="control-label" for="Nom">Nom</label>
						<div class="controls">
							<input id="Nom" name="Nom" type="text" placeholder="Nom" class="input-xlarge">					    
						</div>
						<label class="control-label" for="Annee">Année</label>
						<div class="controls">
							<input id="Annee" name="Annee" type="text" placeholder="Annee" class="input-xlarge">					    
						</div>
						<div class="control-group">
						  <label class="control-label" for="ArtisteId">Artiste</label>
						  <div class="controls">
						    <select id="ArtisteId" name="ArtisteId" class="input-xlarge">
						    	<?php  
						    		foreach ($data as $artiste){
						    			echo '<option value="' . $artiste->Id . ' ">' . $artiste->Nom . ' ' . $artiste->Prenom . ' </option>';
                					}
						    	?>						      
						    </select>
						  </div>
						</div>
						<label class="control-label" for="Jaquette">Jaquette</label>
						<div class="controls">
							<input id="Jaquette" name="Jaquette" type="text" placeholder="Jaquette" class="input-xlarge">					    
						</div>
						<label class="control-label" for="Compositeur">Compositeur</label>
						<div class="controls">
							<input id="Compositeur" name="Compositeur" type="text" placeholder="Compositeur" class="input-xlarge">					    
						</div>
						<label class="control-label" for="Redacteur">Rédacteur</label>
						<div class="controls">
							<input id="Redacteur" name="Redacteur" type="text" placeholder="Redacteur" class="input-xlarge">					    
						</div>
						<label class="control-label" for="submit"></label>
						<div class="controls">
							<button id="submit" name="submit" class="btn btn-primary">Valider</button>
						</div>
						<input type="hidden" name="action" value="ajouterAlbum">	
						<input type="hidden" name="form" value="1">		
					</div>						
				</fieldset>					
			</form>		
		</div> 
		<?php } elseif($methode == "titre"){ ?>
			<form action="index.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
				<fieldset>
					<legend>Ajouter un Titre</legend>
					<div class="control-group">
						<label class="control-label" for="Nom">Nom</label>
						<div class="controls">
							<input id="Nom" name="Nom" type="text" placeholder="Nom" class="input-xlarge">					    
						</div>
						<label class="control-label" for="Duree">Durée</label>
						<div class="controls">
							<input id="Duree" name="Duree" type="text" placeholder="Duree" class="input-xlarge">					    
						</div>
						<div class="control-group">
						  <label class="control-label" for="AlbumId">Album</label>
						  <div class="controls">
						    <select id="AlbumId" name="AlbumId" class="input-xlarge">
						    	<?php  
						    		foreach ($data as $album){
						    			echo '<option value="' . $album->Id . ' ">' . $album->Nom . ' </option>';
                					}
						    	?>						      
						    </select>
						  </div>
						</div>
						</br>
						<label class="control-label" for="fichier">Fichier au format mp3</label>
						<div class="controls">
							<input type="file" name="fichier" id="fichier"/>				    
						</div>
						
						<label class="control-label" for="submit"></label>
						<div class="controls">
							<button id="submit" name="submit" class="btn btn-primary">Valider</button>
						</div>

						<input type="hidden" name="action" value="ajouterTitre">	
						<input type="hidden" name="form" value="1">		
					</div>						
				</fieldset>					
			</form>						
			</form>		
		</div> 
		<?php }?>

<?php 
require_once("./Vue/Sidebar.php");
require_once("./Vue/Footer.php"); 
?>		