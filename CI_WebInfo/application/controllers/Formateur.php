<?php 

class Formateur extends CI_Controller {
    
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

    public function search()
    {
        $data['pageName'] = 'index';

        $this->load->view('header', $data);
        $this->load->view('search/formateur');
        $this->load->view('footer');
    }

    public function account()
    {
        $data['pageName'] = 'index';

        $this->load->view('header', $data);
        $this->load->view('compte/formateur');
        $this->load->view('footer');
    }
}