<?php 

class Specialisation_formateur_model extends CI_Model {

   private $ref_id_formateur;
   private $ref_id_specialisation;

    public function __constructor($ref_id_formateur, $ref_id_specialisation) {
        $this->ref_id_formateur = $ref_id_formateur;
        $this->ref_id_specialisation = $ref_id_specialisation;
    }

    public function set_ref_id_formateur($newRef_id_formateur) {
        $this->ref_id_formateur = $newRef_id_formateur;
    }

    public function  get_ref_id_formateur() {
        return $this->ref_id_formateur;
    }

    public function set_ref_id_specialisation($newRef_id_specialisation) {
        $this->ref_id_specialisation = $newRef_id_specialisation;
    }

    public function get_ref_id_specialisation() {
        return $this->ref_id_specialisation;
    }

    //Fonction de simplification de l'utilisation de l'API PHP

    public function Initialize($array) {
        $this->ref_id_formateur = $array['ref_id_formateur'];
        $this->ref_id_specialisation = $array['ref_id_specialisation'];
    }

    public function add($data)
    {
        $this->load->database();
        $this->db->insert('p3_g1_specialisation_formateur', $data);
    }
}

?>