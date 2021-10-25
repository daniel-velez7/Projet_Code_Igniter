<?php

class Formation_model extends CI_Model {

    private $id;
    private $titre;
    private $description;
    private $nb_heure;
    private $date_debut;
    private $date_fin;
    private $ref_id_admin;

    public function set_id($newid) {
        $this->id = $newid;
    }

    public function get_id() {
        return $this->id;
    }

    public function set_titre($newTitre) {
        $this->titre = $newTitre;
    }

    public function get_titre() {
        return $this->titre;
    }

    public function set_description($newDescription) {
        $this->description = $newDescription;
    }

    public function get_description() {
        return $this->description;
    }

    public function set_nb_heure($newNb_heure) {
        $this->nb_heure = $newNb_heure;
    }

    public function get_nb_heure() {
        return $this->nb_heure;
    }

    public function set_date_debut($newDate_debut) {
        $this->date_debut = $newDate_debut;
    }

    public function get_date_debut() {
        return $this->date_debut;
    }

    public function set_date_fin($newDate_fin) {
        $this->date_fin = $newDate_fin;
    }

    public function get_date_fin() {
        return $this->date_fin;
    }

    public function set_ref_id_admin($newRef_id_admin) {
        $this->ref_id_admin = $newRef_id_admin;
    }

    public function get_ref_id_admin() {
        return $this->ref_id_admin;
    }

    //Fonction de simplification de l'utilisation de l'API PHP

    public function Initialize($array) {
        $this->id = $array['id'];
        $this->titre = $array['titre'];
        $this->description = $array['description'];
        $this->nb_heure = $array['nb_heure'];
        $this->date_debut = $array['date_debut'];
        $this->date_fin = $array['date_fin'];
        $this->ref_id_admin = $array['ref_id_admin'];
    }

    public function select_all()
    {
        $this->load->database();
        $this->db->select('*');
        $this->db->from('p3_g1_formation');
        $query = $this->db->get();
        return $query->result();
    }

    public function select_by_id($id) 
    {
        $this->load->database();
        $this->db->where('id', $id);
        $this->db->select('*');
        $this->db->from('p3_g1_formation');
        $query = $this->db->get();
        return $query->result();
    }

    public function add($data)
    {
        $this->load->database();
        $this->db->insert('p3_g1_formation', $data);
    }
}

?>