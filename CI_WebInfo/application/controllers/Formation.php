<?php

class Formation extends CI_Controller {

    public function compte()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Acceuil/connection'));
        }

        $data['pageName'] = 'compte';

        $this->load->view('body/header_connected', $data);
        $this->load->view('compte/formation');
        $this->load->view('body/footer');
    }

    public function edit()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Acceuil/connection'));
        }

        $data['pageName'] = 'admin';

        $this->load->view('body/header_connected', $data);
        $this->load->view('admin/formation');
        $this->load->view('body/footer');
    }
    
}