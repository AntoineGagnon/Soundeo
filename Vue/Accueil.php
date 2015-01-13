<?php require_once("./Vue/Header.php"); ?>

<div id="contenu" class="container">
	
	<div class="row">
		<div class="col-md-9">
			<div class="row">
				<header class="titreTop col-xs-16 col-sm-16 col-md-16 col-lg-16">
					<h2>Le TOP 10 Des Titres les plus appréciés</h2>
				</header>
				<?php 
					foreach ($titres as $titre) {
						echo '
							<div class="titre col-xs-16 col-sm-16 col-md-12 col-lg-12">
								<div class="row">
									<div class="col-xs-3 col-sm-3 col-md-2 col-lg-2">
										<img class="miniature" height="120" width="120" src='. $titre->Album->Jaquette . '>
									</div>
									<div class="col-xs-5 col-sm-5 col-md-7 col-lg-7">
										<h3>' . $titre->Album->Nom . ' -> ' . $titre->Nom . '</h3>
										<p>' . $titre->Date . '</p>
									</div>
									<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 avis">
										<p>Avis : <FONT COLOR="green"> ' . $titre->AvisF . ' </FONT>|<FONT COLOR="red" > ' . $titre->AvisD . ' </FONT></p>
										<br/>
										<br/>
										<a href="?action=detail&titreId=' . $titre->Id . '">Détails</a>
										';
										if(FrontControlleur::estConnecte() && FrontControlleur::estAdmin()){
											echo '<form action="index.php" method="get" accept-charset="utf-8">
												<input type="hidden" name="id" value="' . $titre->Id . '">
												<input type="hidden" name="action" value="supprimerTitre">	
												<input type="hidden" name="form" value="1">
												<button id="submit" name="submit" ><img src="Ressources/Image/croix.png"></a></button>
											</form>';
										}
						echo '				</p>
									</div>
								</div>
							</div>
						';
					}

	 			?>	
			</div>
		</div> 


<?php 
require_once("./Vue/Sidebar.php");
require_once("./Vue/Footer.php"); 
?>		

