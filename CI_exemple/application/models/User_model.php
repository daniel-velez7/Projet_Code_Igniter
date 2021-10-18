<?php

if (!defined('BASEPATH')) exit('No direct script access
allowed');


class User_model extends CI_Model {
    
    public function liste()
    {
        $this->load->database();
        $requete = $this->db->query("SELECT * FROM users");
        $liste = $requete->result();
        return $liste;
    }

    public function select($id) {
        $this->load->database();
        $requete = $this->db->query("SELECT * FROM users where id=" . $id);
        $liste = $requete->result();
        return $liste;
    }

    public function add($data) {
        $this->load->database();
        $this->db->insert('users', $data);
    }

    public function update($id, $data) {
        $this->load->database();
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

    public function remove($id) {
        $this->load->database();
        $this->load->helper('url');

        $this->db->where('id', $id);
        $this->db->delete('users');
    }
}