<?php

class Animation_formation_model extends CI_Model {

    private $ref_id_formateur;
    private $ref_id_formation;

    public function set_ref_id_formateur($newRef_id_formation) {
        $this->ref_id_formateur = $newRef_id_formation;
    }

    public function get_ref_id_formateur() {
        return $this->ref_id_formateur;
    }

    public function set_ref_id_formation($newRef_id_formation) {
        $this->ref_id_formation = $newRef_id_formation;
    }

    public function get_ref_id_formation() {
        return $this->ref_id_formation;
    }

    public function Initialize($array) {
        $this->ref_id_formateur = $array['ref_id_formateur'];
        $this->ref_id_formation = $array['ref_id_formation'];
    }

    public function add($data)
    {
        $this->load->database();
        $this->db->insert('p3_g1_animation_formation', $data);
    }
}

?>