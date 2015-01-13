<?php require_once("./Vue/Header.php"); ?>


<div id="contenu" class="container">
	
	<div class="row">
		<div class="col-md-9">
		<?php if($methode == "artiste"){ ?>
			<form action="index.php" method="post" accept-charset="utf-8">
				<fieldset>
					<legend>Supprimer un Artiste</legend>
					<div class="control-group">
						<div class="control-group">
						  <label class="control-label" for="ArtisteId">Artiste</label>
						  <div class="controls">
						    <select id="ArtisteId" name="ArtisteId" class="input-xlarge">
						    	<?php  
						    		foreach ($data as $artiste){
						    			echo '<option value="' . $artiste->Id . ' ">' . $artiste->Nom . ' ' . $artiste->Prenom .' </option>';
                					}
						    	?>						      
						    </select>
						  </div>
						</div>
						<label class="control-label" for="submit"></label>
						<div class="controls">
							<button id="submit" name="submit" class="btn btn-primary">Valider</button>
						</div>

						<input type="hidden" name="action" value="supprimerArtiste">	
						<input type="hidden" name="form" value="1">		
					</div>						
				</fieldset>					
			</form>						
			</form>		
		</div> 
		<?php } elseif($methode == "album"){ ?>
				<form action="index.php" method="post" accept-charset="utf-8">
				<fieldset>
					<legend>Supprimer un Album</legend>
					<div class="control-group">
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
						<label class="control-label" for="submit"></label>
						<div class="controls">
							<button id="submit" name="submit" class="btn btn-primary">Valider</button>
						</div>

						<input type="hidden" name="action" value="supprimerAlbum">	
						<input type="hidden" name="form" value="1">		
					</div>						
				</fieldset>					
			</form>						
			</form>		
		</div> 
		
		<?php } elseif($methode == "titre"){ ?>
			<form action="index.php" method="post" accept-charset="utf-8">
				<fieldset>
					<legend>Supprimer un Titre</legend>
					<div class="control-group">
						<div class="control-group">
						  <label class="control-label" for="TitreId">Titre</label>
						  <div class="controls">
						    <select id="TitreId" name="TitreId" class="input-xlarge">
						    	<?php  
						    		foreach ($data as $titre){
						    			echo '<option value="' . $titre->Id . ' ">' . $titre->Nom . ' </option>';
                					}
						    	?>						      
						    </select>
						  </div>
						</div>
						<label class="control-label" for="submit"></label>
						<div class="controls">
							<button id="submit" name="submit" class="btn btn-primary">Valider</button>
						</div>

						<input type="hidden" name="action" value="supprimerTitre">	
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