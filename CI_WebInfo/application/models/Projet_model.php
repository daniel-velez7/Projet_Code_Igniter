<?php 

class Projet_model extends CI_Model {

    private $id;
    private $nom;
    private  $date_debut;
    private $date_fin;
    private  $ref_id_admin;

    private function set_id($newid) {
        $this->id = $newid;
    }

    private function get_id() {
        return $this->id;
    }

    private function set_nom($newNom) {
        $this->nom = $newNom;
    }

    private function get_nom() {
        return $this->nom;
    }

    private function  set_date_debut($newDate_debut) {
        $this->date_debut = $newDate_debut;
    }

    private function get_date_debut() {
        return $this->date_debut;
    }

    private function set_date_fin($newDate_fin) {
        $this->date_fin = $newDate_fin;
    }

    private function get_date_fin() {
        return $this->date_fin;
    }

    private function set_ref_id_admin($newRef_id_admin) {
        $this->ref_id_admin = $newRef_id_admin;
    }

    private function  get_ref_id_admin() {
        return $this->ref_id_admin;
    }

    //Fonction de simplification de l'utilisation de l'API PHP

    private function Initialize($array) {
        $this->id = $array['id'];
        $this->nom = $array['nom'];
        $this->date_debut = $array['date_debut'];
        $this->date_fin = $array['date_fin'];
        $this->ref_id_admin = $array['ref_id_admin'];
    }

    public function add($data)
    {
        $this->load->database();
        $this->db->insert('p3_g1_projet', $data);
    }

}


?>