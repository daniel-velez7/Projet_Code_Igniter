<?php

if (!defined('BASEPATH')) exit('No direct script access
allowed');


class Produit_model extends CI_Model {
    
    public function liste()
    {
        $this->load->database();
        $requete = $this->db->query("SELECT * FROM produits");
        $liste = $requete->result();
        return $liste;
    }

    public function select($id) {
        $this->load->database();
        $requete = $this->db->query("SELECT * FROM produits where id=" . $id);
        $liste = $requete->result();
        return $liste;
    }

    public function add($data) {
        $this->load->database();
        $this->db->insert('produits', $data);
    }

    public function update($id, $data) {
        $this->load->database();
        $this->db->where('id', $id);
        $this->db->update('produits', $data);
    }

    public function remove($id) {
        $this->load->database();
        $this->load->helper('url');

        $this->db->where('id', $id);
        $this->db->delete('produits');
    }
}
