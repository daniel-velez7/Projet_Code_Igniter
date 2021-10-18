<?php 

class Stagiaire extends CI_Controller {
    
    public function index()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Acceuil/connection'));
        }

        $data['pageName'] = 'index';

        $this->load->view('header', $data);
        $this->load->view('index');
        $this->load->view('footer');
    }
}
