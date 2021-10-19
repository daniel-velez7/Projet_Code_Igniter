<?php 

class Intervenant extends CI_Controller {
    
    public function index()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Acceuil/connection'));
        }

        $data['pageName'] = 'index';

        $this->load->view('header_connected', $data);
        $this->load->view('index');
        $this->load->view('footer');
    }

    public function search(){
        if ($this->session->connected == false) {
            redirect(site_url('Acceuil/connection'));
        }

        $data['pageName'] = 'index';

        $this->load->view('header_connected', $data);
        $this->load->view('search/intervenant');
        $this->load->view('footer');
    }
}