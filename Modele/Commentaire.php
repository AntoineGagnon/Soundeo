<?php

require_once('Titre.php');

class Commentaire {

    public $ID;
    public $Auteur;
    public $Titre;
    public $Text;
    public $Date;

    public function __construct($ID, $Auteur, $Titre, $Text,$Date) {
        $this->ID = $ID;
        $this->Auteur = $Auteur;
        $this->Titre = $Titre;
        $this->Text = $Text;
        $this->Date = $Date;
    }

}
