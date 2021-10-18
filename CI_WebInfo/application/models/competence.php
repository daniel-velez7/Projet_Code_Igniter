<?php

class Competence {

    private $id;
    private $nom;

    public function constructor($nom) {
        $this->nom = $nom;
    }

    public function set_id($newid) {
        $this->id = $newid;
    }

    public function get_id() {
        return $this->id;
    }

    public function set_nom($newNom) {
        $this->nom = $newNom;
    }

    public function get_nom() {
        return $this->nom;
    }

    public function Initialize($array) {
        $this->id = $array['id'];
        $this->nom = $array['nom'];
    }

}

?>