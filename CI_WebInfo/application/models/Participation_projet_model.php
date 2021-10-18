<?php 

class Participation_Projet extends CI_Model {

   private $ref_id_stagiaire;
   private  $ref_id_projet;

   public function __constructor($ref_id_stagiaire, $ref_id_projet) {
        $this->ref_id_stagiaire = $ref_id_stagiaire;
        $this->ref_id_projet = $ref_id_projet;
    }

    public function set_ref_id_stagiaire($newRef_id_stagiaire) {
        $this->ref_id_stagiaire = $newRef_id_stagiaire;
    }

    public function  get_ref_id_stagiaire() {
        return $this->ref_id_stagiaire;
    }

    public function set_ref_id_projet($newRef_id_projet) {
        $this->ref_id_projet = $newRef_id_projet;
    }

    public function get_ref_id_projet() {
        return $this->ref_id_projet;
    }

    //Fonction de simplification de l'utilisation de l'API PHP

    public function  Initialize($array) {
        $this->ref_id_stagiaire = $array['ref_id_stagiaire'];
        $this->ref_id_projet = $array['ref_id_projet'];
    }


}

?>