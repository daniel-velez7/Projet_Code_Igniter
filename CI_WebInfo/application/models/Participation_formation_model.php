<?php 

class Participation_formation_model extends CI_Model {

    private $ref_id_stagiaire;
    private $ref_id_formation;

    public function set_ref_id_stagiaire($newRef_id_stagiaire) {
        $this->ref_id_stagiaire = $newRef_id_stagiaire;
    }

    public function get_ref_id_stagiaire() {
        return $this->ref_id_stagiaire;
    }

    public function set_ref_id_formation($newRef_id_formation) {
        $this->ref_id_formation = $newRef_id_formation;
    }

    public function get_ref_id_formation() {
        return $this->ref_id_formation;
    }

    //Fonction de simplification de l'utilisation de l'API PHP

   public function Initialize($array) {
        $this->ref_id_stagiaire = $array['ref_id_stagiaire'];
        $this->ref_id_formation = $array['ref_id_formation'];
    }

    public function add($data)
    {
        $this->load->database();
        $this->db->insert('p3_g1_participation_formation', $data);
    }
}
?>