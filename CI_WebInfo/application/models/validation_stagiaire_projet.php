<?php 

class Validation_Stagiaire_Projet {

   private $ref_id_stagiaire;
   private $ref_id_projet;
   private $motivation;

   public function __constructor($ref_id_stagiaire, $ref_id_projet, $motivation) {
        $this->ref_id_stagiaire = $ref_id_stagiaire;
        $this->ref_id_projet = $ref_id_projet;
        $this->motivation = $motivation;
    }

    public function set_ref_id_stagiaire($newRef_id_stagiaire) {
        $this->ref_id_stagiaire = $newRef_id_stagiaire;
    }

    public function get_ref_id_stagiaire() {
        return $this->ref_id_stagiaire;
    }

    public function set_ref_id_projet($newRef_id_projet) {
        $this->ref_id_projet = $newRef_id_projet;
    }

    public function get_ref_id_projet() {
        return $this->ref_id_projet;
    }

    public function  set_motivation($newMotivation) {
        $this->motivation = $newMotivation;
    }

    public function get_motivation() {
        return $this->motivation;
    }

    //Fonction de simplification de l'utilisation de l'API PHP

    public function  Initialize($array) {
        $this->ref_id_stagiaire = $array['ref_id_stagiaire'];
        $this->ref_id_projet = $array['ref_id_projet'];
        $this->motivation = $array['motivation'];
    }


}

?>