<?php

class Formateur_model extends CI_Model {

    private $id;
    private $nom;
    private $prenom;
    private $cv;
    private $photo;
    private $email;
    private $mdp;

    public function set_id($newid) {
        $this->id = $newid;
    }

    public function get_id() {
        return $this->id;
    }

    public function set_nom($newNom) {
        $this->nom = $newNom;
    }

    public function get_nom() {
        return $this->nom;
    }

    public function set_prenom($newPrenom) {
        $this->prenom = $newPrenom;
    }

    public function get_prenom() {
        return $this->prenom;
    }

    public function set_cv($newCV) {
        $this->cv = $newCV;
    }

    public function get_cv() {
        return $this->cv;
    }

    public function set_photo($newPhoto) {
        $this->photo = $newPhoto;
    }

    public function get_photo() {
        return $this->photo;
    }

    public function set_email($newEmail) {
        $this->email = $newEmail;
    }

    public function get_email() {
        return $this->email;
    }

    public function set_mdp($newMdp) {
        $this->mdp = $newMdp;
    }

    public function get_mdp() {
        return $this->mdp;
    }

    //Fonction de simplification de l'utilisation de l'API PHP

    public function Initialize($array) {
        $this->id = $array['id'];
        $this->nom = $array['nom'];
        $this->prenom = $array['prenom'];
        $this->cv = $array['cv'];
        $this->photo = $array['photo'];
        $this->email = $array['email'];
        $this->mdp = $array['mdp'];
    }

    public function add($data)
    {
        $this->load->database();
        $this->db->insert('p3_g1_formateur', $data);
    }

    public function update($data)
    {
        $this->load->database();

        $this->db->where('id', $data['id']);
        $this->db->update('p3_g1_formateur', $data);
    }

    public function delete($id)
    {
        $this->load->database();
        $this->db->where('id', $id);
        $this->db->delete('p3_g1_formateur');
    }

}

?>