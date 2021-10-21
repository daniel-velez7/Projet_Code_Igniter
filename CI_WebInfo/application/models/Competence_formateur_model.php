<?php

class Competence_formateur_model extends CI_Model {

    private $ref_id_formateur;
    private $ref_id_competence;

    public function set_ref_id_formateur($newRef_id_formateur) {
        $this->ref_id_formateur = $newRef_id_formateur;
    }

    public function get_ref_id_formateur() {
        return $this->ref_id_formateur;
    }

    public function set_ref_id_competence($newRef_id_competence) {
        $this->ref_id_competence = $newRef_id_competence;
    }

    public function get_ref_id_competence() {
        return $this->ref_id_competence;
    }

    public function Initialize($array) {
        $this->ref_id_formateur = $array['ref_id_formateur'];
        $this->ref_id_competence = $array['ref_id_competence'];
    }

    public function add($data)
    {
        $this->load->database();
        $this->db->insert('p3_g1_competence_formateur', $data);
    }

}

?>