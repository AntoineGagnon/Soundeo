<?php 

class DALEcriture
{
	
	public function ajouterTitre($t)
	{
		$dbs = BDD::getInstance();
		$req = $dbs->Executer("INSERT INTO `Titre`(`Nom`, `Duree`, `AlbumId`, `AvisF`, `AvisD`) VALUES (?, ?, ?, 0, 0)", array($t->Nom, $t->Duree, $t->Album->Id));
		$req->closeCursor();
	}

	public function ajouterAlbum($a)
	{
		$dbs = BDD::getInstance();
		$req = $dbs->Executer("INSERT INTO `Album`(`Nom`, `Jaquette`, `Annee`, `ArtisteId`, `Compositeur`, `Redacteur`) VALUES (?, ?, ?, ?, ?, ?)", array($a->Nom, $a->Jaquette, $a->Annee, $a->Artiste->Id, $a->Compositeur, $a->Redacteur));
		$req->closeCursor();
	}

	public function ajouterArtiste($a)
	{
		$dbs = BDD::getInstance();
		$req = $dbs->Executer("INSERT INTO `Artiste`(`Nom`, `Prenom`) VALUES (?, ?)", array($a->Nom, $a->Prenom));
		$req->closeCursor();
	}

	public function ajouterCommentaire($com)
	{
		$dbs = BDD::getInstance();
		$req = $dbs->Executer("INSERT INTO `Commentaire`(`Id`, `Text`, `TitreId`, `Auteur`, `Date`) VALUES (?,?,?,?,?)", array(null,$com->Text,$com->Titre,$com->Auteur,null));
		$req->closeCursor();
	}

	public function supprimerTitre($idTitre)
	{
		$dbs = BDD::getInstance();
		$req = $dbs->Executer("DELETE FROM Commentaire WHERE TitreId = ?",array($idTitre));
		$req = $dbs->Executer("DELETE FROM `Titre` WHERE Id = ?",array($idTitre));
		$req->closeCursor();
	}

	public function supprimerArtiste($idArtiste)
	{
		$dbs = BDD::getInstance();
		$req = $dbs->Executer("DELETE FROM `Album` WHERE ArtisteId = ?",array($idArtiste));
		$req = $dbs->Executer("DELETE FROM `Artiste` WHERE Id = ?",array($idArtiste));
		$req->closeCursor();
	}

	public function supprimerAlbum($idAlbum)
	{
		$dbs = BDD::getInstance();
		$req = $dbs->Executer("DELETE FROM `Titre` WHERE AlbumId = ?",array($idAlbum));
		$req = $dbs->Executer("DELETE FROM `Album` WHERE Id = ?",array($idAlbum));
		$req->closeCursor();
	}

	public function supprimerCommentaire($id)
	{
		$dbs = BDD::getInstance();
		$req = $dbs->Executer("DELETE FROM `Commentaire` WHERE Id = ?",array($id));
		$req->closeCursor();
	}

	public function ajouterAvisF($idTitre)
	{
		$dbs = BDD::getInstance();
		$req = $dbs->Executer("UPDATE Titre SET AvisF = AvisF + 1 WHERE Id = ?",array($idTitre));
	}

	public function ajouterAvisD($idTitre)
	{
		$dbs = BDD::getInstance();
		$req = $dbs->Executer("UPDATE Titre SET AvisD = AvisD + 1 WHERE Id = ?",array($idTitre));
	}

	public function inscription($email, $pass)
    {
		$dbs = BDD::getInstance();
		$req = $dbs->Executer("INSERT INTO `Utilisateur`(`login`, `motdepasse`, `role`) VALUES (?, ?, ?)", array($email, $pass, 1));
		$req->closeCursor();
    }

}
?>
