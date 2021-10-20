<?php

class Admission extends CI_Controller { 

    public function edit()
    {
        if ($this->session->connected == false) {
            redirect(site_url('Acceuil/connection'));
        }

        $data['pageName'] = 'admin';

        $this->load->view('body/header_connected', $data);
        $this->load->view('admin/admission-demandes');
        $this->load->view('body/footer');
    }
}