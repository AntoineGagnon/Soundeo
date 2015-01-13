<?php

class Titre {

    public $Id;
    public $Nom;
    public $Duree;
    public $Album;
    public $Date;
    public $AvisF;
    public $AvisD;

    public function __construct($ID, $Nom, $Duree, $Album, $Date, $AvisF, $AvisD) {
        $this->Id = $ID;
        $this->Nom = $Nom;
        $this->Duree = $Duree;
        $this->Album = $Album;
        $this->Date = $Date;
        $this->AvisF = $AvisF;
        $this->AvisD = $AvisD;
    }

}

?>