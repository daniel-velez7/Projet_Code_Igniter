<?php 

class Validation_stagiaire_projet_model extends CI_Model {

   private $ref_id_stagiaire;
   private $ref_id_projet;
   private $motivation;

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

    public function select_all()
    {
        $this->load->database();
        $this->db->select('*');
        $this->db->from('p3_g1_validation_stagiaire_projet');
        $query = $this->db->get();
        return $query->result();
    }

    public function add($data)
    {
        $this->load->database();
        $this->db->insert('p3_g1_validation_stagiaire_projet', $data);
    }

}

?>