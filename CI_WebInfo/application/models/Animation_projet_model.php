<?php

class Animation_Projet {

    private $ref_id_intervenant;
    private $ref_id_projet;

    public function constructor($ref_id_intervenant, $ref_id_projet) {
        $this->ref_id_intervenant = $ref_id_intervenant;
        $this->ref_id_projet = $ref_id_projet;
    }

    public function set_ref_id_intervenant($newRef_id_intervenant) {
        $this->ref_id_intervenant = $newRef_id_intervenant;
    }

    public function get_ref_id_intervenant() {
        return $this->ref_id_intervenant;
    }

    public function set_ref_id_projet($newRef_id_projet) {
        $this->ref_id_projet = $newRef_id_projet;
    }

    public function get_ref_id_projet() {
        return $this->ref_id_projet;
    }

    //Fonction de simplification de l'utilisation de l'API PHP

    public function Initialize($array) {
        $this->ref_id_intervenant = $array['ref_id_intervenant'];
        $this->ref_id_projet = $array['ref_id_projet'];
    }

}

?>