<?php 

class DALLecture
{
	public function getTitre($id)
	{
		$dbs = BDD::getInstance();
		$req = $dbs->Executer("SELECT * FROM Titre WHERE id = ?", array($id));
		$data = $req->fetch();
		$titre = new Titre($data['Id'], $data['Nom'], $data['Duree'], DALLecture::getAlbum($data['AlbumId']), $data['Date'], $data['AvisF'], $data['AvisD']);
		$req->closeCursor();
		return $titre;
	}

	public function getAlbum($id)
	{
		$dbs = BDD::getInstance();
		$req = $dbs->Executer("SELECT * FROM Album WHERE id = ?", array($id));
		$data = $req->fetch();
		$album = new Album($data['Id'], $data['Nom'], $data['Jaquette'], $data['Annee'], DALLecture::getArtiste($data['ArtisteId']), $data['Compositeur'], $data['Redacteur']);
		$req->closeCursor();
		return $album;
	}

	public function getArtiste($id)
	{
		$dbs = BDD::getInstance();
		$req = $dbs->Executer("SELECT * FROM Artiste WHERE id = ?", array($id));
		$data = $req->fetch();
		$artiste = new Artiste($data['Id'], $data['Nom'], $data['Prenom']);
		$req->closeCursor();
		return $artiste;
	}

	public function getTopTitre()
	{
        $topTitres = array();
		$dbs = BDD::getInstance();
		$req = $dbs->Executer("SELECT * FROM Titre ORDER BY AvisF DESC LIMIT 10" );

                $data = $req->fetchAll();

                foreach ($data as $ligne){
                    $titre = new Titre($ligne['Id'], $ligne['Nom'], $ligne['Duree'], DALLecture::getAlbum($ligne['AlbumId']), $ligne['Date'], $ligne['AvisF'], $ligne['AvisD']);
                    array_push($topTitres, $titre);
                }
                
		$req->closeCursor();
		return $topTitres; 

	}

	public function getCommentaires($idTitre)
	{
		$commentaires = array();
		$dbs = BDD::getInstance();
		$req = $dbs->Executer("SELECT * FROM Commentaire WHERE TitreID = ?",array($idTitre));
        $data = $req->fetchAll();
        foreach ($data as $ligne){
            $commentaire = new Commentaire($ligne['Id'], $ligne['Auteur'], $ligne['TitreId'], $ligne['Text'], $ligne['Date']);
            array_push($commentaires, $commentaire);
        }
                
		$req->closeCursor();
		return $commentaires; 
	}

	public function getListeArtiste()
	{
		$artistes = array();
		$dbs = BDD::getInstance();
		$req = $dbs->Executer("SELECT * FROM Artiste",array());
        $data = $req->fetchAll();
        foreach ($data as $ligne){
            $artiste = new Artiste($ligne['Id'], $ligne['Nom'], $ligne['Prenom']);
            array_push($artistes, $artiste);
        }
                
		$req->closeCursor();
		return $artistes; 
	}
	
	public function getListeAlbum()
	{
		$albums = array();
		$dbs = BDD::getInstance();
		$req = $dbs->Executer("SELECT * FROM Album",array());
        $data = $req->fetchAll();
        foreach ($data as $ligne){
			$album = new Album($ligne['Id'], $ligne['Nom'], $ligne['Jaquette'], $ligne['Annee'], DALLecture::getArtiste($ligne['ArtisteId']), $ligne['Compositeur'], $ligne['Redacteur']);
            array_push($albums, $album);
        }
                
		$req->closeCursor();
		return $albums; 
	}

	public function getListeTitre()
	{
		$titres = array();
		$dbs = BDD::getInstance();
		$req = $dbs->Executer("SELECT * FROM Titre",array());
        $data = $req->fetchAll();
        foreach ($data as $ligne){
			$titre = new Titre($ligne['Id'], $ligne['Nom'], $ligne['Duree'], DALLecture::getAlbum($ligne['AlbumId']), $ligne['Date'], $ligne['AvisF'], $ligne['AvisD']);
            array_push($titres, $titre);
        }
                
		$req->closeCursor();
		return $titres; 
	}

	public function estInscrit($email, $pass)
	{		
		$dbs = BDD::getInstance();
		$req = $dbs->Executer("SELECT role FROM Utilisateur WHERE login = ? AND motdepasse = ?",array($email, $pass));
		return $req->fetchColumn();
	}

	public function getListe($page){
		$Titres = array();
		$dbs = BDD::getInstance();
		$strReq = "SELECT * FROM Titre ORDER BY Nom LIMIT " . $page*10 . ",10";
		$req = $dbs->Executer($strReq);
        $data = $req->fetchAll();

                foreach ($data as $ligne){
                    $titre = new Titre($ligne['Id'], $ligne['Nom'], $ligne['Duree'], DALLecture::getAlbum($ligne['AlbumId']), $ligne['Date'], $ligne['AvisF'], $ligne['AvisD']);
                    array_push($Titres, $titre);
                }
                
		$req->closeCursor();
		return $Titres; 
	}

	public function getNbTitres(){
		$dbs = BDD::getInstance();
		$req = $dbs->Executer("SELECT count(*) FROM Titre");
		return $req->fetchColumn();
	}

	public function getNextIDTitre()
	{
		$dbs = BDD::getInstance();
		$req = $dbs->Executer("SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'projet' AND TABLE_NAME = 'Titre'");
		return $req->fetchColumn();
	}

}
?>
