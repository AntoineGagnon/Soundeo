<?php require_once("./Vue/Header.php"); ?>


<div id="contenu" class="container">
	
	<div class="row">
		<div class="col-md-9">
			<div class="row">
				<header class="titreTop col-xs-16 col-sm-16 col-md-16 col-lg-16">
					<h2>Informations du titre : <?=$titre->Nom?> </h2>
				</header>

				<div class="col-xs-3 col-sm-3 col-md-5 col-lg-5">
					<img class="miniature" height="300" width="300" src=<?=$titre->Album->Jaquette?>>
				</div>
				<div class="col-xs-5 col-sm-5 col-md-7 col-lg-7" style="margin-top: 30px">
					<p>
						Album :  <?=$titre->Album->Nom?> <br/> 
						Durée : <?=$titre->Duree?> <br/> 
						Date : <?=$titre->Date?> <br/> 
						Avis Positif : <?=$titre->AvisF?> <a href="index.php?action=ajouterAvisF&titreId=<?=$titre->Id?>"><img src="./Ressources/Image/croixVerte" alt="croix verte"></a><br/> 
						Avis Négatif : <?=$titre->AvisD?> <a href="index.php?action=ajouterAvisD&titreId=<?=$titre->Id?>"><img src="./Ressources/Image/croix" alt="croix rouge"></a><br/>
						Auteur :  <?=$titre->Album->Artiste->Nom?> <br/>
						Compositeur :  <?=$titre->Album->Compositeur?> <br/>
						Rédacteur :  <?=$titre->Album->Redacteur?> <br/>


					</p>
					<audio src="./Ressources/Musique/<?=$titre->Id?>.mp3" preload controls></audio>


					<form class="form-horizontal" action="index.php" method="POST">
					<fieldset>

					<!-- Form Name -->
					<legend>Ajouter un commentaire</legend>

					<!-- Text input-->
					<div class="control-group">
					  <label class="control-label" for="Auteur">Auteur</label>
					  <div class="controls">
					    <input id="Auteur" name="Auteur" placeholder="" class="input-medium" type="text">
					  </div>
					</div>

					<!-- Textarea -->
					<div class="control-group">
					  <label class="control-label" for="Commentaire">Commentaire</label>
					  <div class="controls">                     
					    <textarea id="Commentaire" name="Commentaire" rows="10" cols="50"></textarea>
					  </div>
					</div>

					<!-- Button -->
					<div class="control-group">
					  <label class="control-label" for="valider"></label>
					  <div class="controls">
					    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-hand-up"></span> Poster</button>
					  </div>
					</div>

					</fieldset>
					<input type="hidden" name="action" value="ajouterCommentaire">
					<input type="hidden" name="titreId" value=<?=$titre->Id?>>		

					</form>
					</br>


					<?php 
						foreach ($commentaires as $com) {
							echo '<table border="1" style="background-color:#505050;border-collapse:collapse;border:1px solid #990000;color:#000000;width:100%; padding:20px;" cellpadding="3" cellspacing="3">
									<tr>
										<td>' . $com->Auteur . ' le ' . $com->Date ;
							if(FrontControlleur::estConnecte() && FrontControlleur::estModo())
								echo '<a href="?action=supprimerCommentaire&idCom=' . $com->ID . '&titreId=' . $titre->Id . '"><img src="Ressources/Image/croix.png"></a>' ;
							echo '</td>
									</tr>
									<tr>
										<td>'. $com->Text . '</td>
									</tr>
								</table>';
						}
					?>
				</div>

			</div>
		</div> 



		<?php 
		require_once("./Vue/Sidebar.php");
		require_once("./Vue/Footer.php"); 
		?>		