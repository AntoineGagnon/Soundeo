<?php

class ControlleurModerateur
{
	public function supprimerCommentaire()
	{
		$titreId = Validation::nettoyerString($_REQUEST['titreId']);
		$id = Validation::nettoyerString($_REQUEST['idCom']);
		$m = new Modele();

		if(!Validation::estUnInt($id))
			$Erreurs[] = "Id de commentaire invalide";
		if(!Validation::estUnInt($titreId)){
			$Erreurs[] = "Id de titre invalide";			
			$titres = $m->getTopTitre();
			require_once("./Vue/Accueil.php");		
		}
		if(empty($Erreurs)){
			$m->supprimerCommentaire($id);
		}
		
		$titre = $m->getDetailsTitre($titreId);
		$commentaires = $m->getCommentaires($titreId);
		require_once("./Vue/Informations.php");
	}


}
?>