<?php 

class Specialisation extends CI_Model{

    private $id;
    private $nom;
    private $id_competence;

    public function __constructor($nom, $id_competence) {
        $this->nom = $nom;
        $this->id_competence = $id_competence;
    }

    public function  set_id($newid) {
        $this->id = $newid;
    }

    public function   get_id() {
        return $this->id;
    }

    public function  set_nom($newNom) {
        $this->nom = $newNom;
    }

    public function   get_nom() {
        return $this->nom;
    }

    public function   set_id_competence($newIdCompetence) {
        $this->id_competence = $newIdCompetence;
    }

    public function   get_id_competence() {
        return $this->id_competence;
    }

    //Fonction de simplification de l'utilisation de l'API PHP

    public function   Initialize($array) {
        $this->id = $array['id'];
        $this->nom = $array['nom'];
        $this->id_competence = $array['ref_id_competence'];
    }

   
}
?>