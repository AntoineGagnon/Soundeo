<?php

class Modele {

    /**
     * Construct won't be called inside this class and is uncallable from
     * the outside. This prevents instantiating this class.
     * This is by purpose, because we want a static class.
     */
    public function __construct() {
        
    }

    public function ajouterTitre($Id, $Nom, $Duree, $AlbumId, $Date, $AvisF, $AvisD) {
        $dE = new DALEcriture();
        $dL = new DALLecture();
        $t = new Titre($Id, $Nom, $Duree, $dL->getAlbum($AlbumId), $Date, $AvisF, $AvisD);
        $dE->ajouterTitre($t);
    }

    public function ajouterAlbum($id, $nom, $jaquette, $annee, $artisteId, $compositeur, $redacteur) {
        $dE = new DALEcriture();
        $dL = new DALLecture();
        $a = new Album($id, $nom, $jaquette, $annee, $dL->getArtiste($artisteId), $compositeur, $redacteur);
        $dE->ajouterAlbum($a);
    }

    public function ajouterArtiste($id, $nom, $prenom) {
        $a = new Artiste($id, $nom, $prenom);
        $d = new DALEcriture();
        $d->ajouterArtiste($a);
    }

    public function ajouterCommentaire($Auteur,$TitreID,$Text)
    {
        $d = new DALEcriture();
        $com = new Commentaire(null,$Auteur,$TitreID,$Text,null);
        $d->ajouterCommentaire($com);
    }

    public function getTopTitre() {
        $d = new DALLecture();
        return $d->getTopTitre();
    }

    public function getDetailsTitre($id) {
        $d = new DALLecture();
        return $d->getTitre($id);
    }

    public function getCommentaires($id)
    {
        $d = new DALLecture();
        return $d->getCommentaires($id);
    }

    public function getListeArtiste()
    {        
        $d = new DALLecture();
        return $d->getListeArtiste();
    }

    public function getListeAlbum()
    {        
        $d = new DALLecture();
        return $d->getListeAlbum();
    }

    public function getListeTitre()
    {        
        $d = new DALLecture();
        return $d->getListeTitre();
    }
    
    public function supprimerTitre($idTitre)
    {        
        $d = new DALEcriture();
        return $d->supprimerTitre($idTitre);
    }
        
    public function supprimerArtiste($idTitre)
    {        
        $d = new DALEcriture();
        return $d->supprimerArtiste($idTitre);
    }
        
    public function supprimerAlbum($idTitre)
    {        
        $d = new DALEcriture();
        return $d->supprimerAlbum($idTitre);
    }
        
    public function supprimerCommentaire($id)
    {        
        $d = new DALEcriture();
        return $d->supprimerCommentaire($id);
    }

    public function estInscrit($email, $pass)
    {        
        $d = new DALLecture();
        return $d->estInscrit($email, $pass);
    }

    public function ajouterAvisF($idTitre)
    {        
        $d = new DALEcriture();
        return $d->ajouterAvisF($idTitre);
    }

    public function ajouterAvisD($idTitre)
    {        
        $d = new DALEcriture();
        return $d->ajouterAvisD($idTitre);
    }
    
    public function listeComplete($page)
    {
        $d = new DALLecture();
        return $d->getListe($page);       
    }

    public function getNbPages()
    {
        $d = new DALLecture();
        $nbTitres = $d->getNbTitres();

        return ceil($nbTitres/10);
    }

    public function inscription($email, $pass)
    {
        $d = new DALEcriture();
        return $d->inscription($email, $pass);
    }

    public function getNextIDTitre()
    {
        $d = new DALLecture();
        return $d->getNextIDTitre();
    }
    
}

?>