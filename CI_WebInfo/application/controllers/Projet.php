<?php

class Projet extends CI_Controller {
    
    public function compte()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Acceuil/connection'));
        }

        $data['pageName'] = 'compte';

        $this->load->view('body/header_connected', $data);
        $this->load->view('compte/projet');
        $this->load->view('body/footer');
    }

   
}