<?php

require_once 'Artiste.php';

/**
 * Description of Artiste
 *
 * @author angagnon3
 */
class Album {

    public $Id;
    public $Nom;
    public $Annee;
    public $Jaquette;
    public $Artiste;
    public $Compositeur;
    public $Redacteur;

    public function __construct($id, $nom, $jaquette, $annee, $artiste, $compositeur, $redacteur) {
        $this->Id = $id;
        $this->Nom = $nom;
        $this->Jaquette = $jaquette;
        $this->Annee = $annee;
        $this->Artiste = $artiste;
        $this->Compositeur = $compositeur;
        $this->Redacteur = $redacteur;
    }

    public function afficherAlbum() {
        echo "<strong> $this->Nom </strong> par $this->Artiste - $this->Annee "
        . "</br> Nom editeur : $this->Editeur </br> Nombre pistes : $this->NbTitre </br> ";
    }

}

?>