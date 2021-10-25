<?php 

class Specialisation_model extends CI_Model{

    private $id;
    private $nom;
    private $id_competence;

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

    public function select_all()
    {
        $this->load->database();
        $this->db->select('*');
        $this->db->from('p3_g1_specialisation');
        $query = $this->db->get();
        return $query->result();
    }

    public function add($data)
    {
        $this->load->database();
        $this->db->insert('p3_g1_specialisation', $data);
    }
   
}
?>