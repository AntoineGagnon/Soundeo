<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Artiste
 *
 * @author angagnon3
 */
class Artiste {

    public $Id;
    public $Nom;
    public $Prenom;

    public function __construct($id, $nom, $prenom) {
        $this->Id = $id;
        $this->Nom = $nom;
        $this->Prenom = $prenom;
    }

    public function afficherArtiste() {
        echo "$this->Nom $this->Prenom a produit $this->NbAlbums albums </br>";
    }

}

?>